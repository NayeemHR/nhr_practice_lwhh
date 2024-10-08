<?php
namespace NHR_Practice_Elementor_Addon;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class Plugin
{
    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '3.21.0';
    const MINIMUM_PHP_VERSION = '7.4';

    private static $_instance = null;
    public static function instance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }
    public function __construct()
    {

        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }

    }

    public function is_compatible()
    {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return false;
        }

        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return false;
        }

        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return false;
        }

        return true;

    }

    public function admin_notice_missing_main_plugin()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'nhr-practice-lwhh'),
            '<strong>' . esc_html__('Elementor Test Addon', 'nhr-practice-lwhh') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'nhr-practice-lwhh') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function admin_notice_minimum_elementor_version()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'nhr-practice-lwhh'),
            '<strong>' . esc_html__('Elementor Test Addon', 'nhr-practice-lwhh') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'nhr-practice-lwhh') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function admin_notice_minimum_php_version()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'nhr-practice-lwhh'),
            '<strong>' . esc_html__('Elementor Test Addon', 'nhr-practice-lwhh') . '</strong>',
            '<strong>' . esc_html__('PHP', 'nhr-practice-lwhh') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function init()
    {

        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        // add_action('elementor/controls/register', [$this, 'register_controls']);
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'pricing_editor_assets']);
    }

    public function widget_styles()
    {
        wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
        wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
        wp_enqueue_style('froala-css', '//cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/2.0.1/css/froala_blocks.min.css');

    }

    public function pricing_editor_assets()
    {
        wp_enqueue_script('main-js', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery'), time(), true);
    }

    public function add_elementor_widget_categories($elements_manager)
    {

        $elements_manager->add_category(
            'nhr-widgets-category',
            [
                'title' => esc_html__('NHR Widgets Category', 'nhr-practice-lwhh'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    public function register_widgets($widgets_manager)
    {
        require_once __DIR__ . '/widgets/nhr-practice-lwhh-widget.php';
        $widgets_manager->register(new \Nhr_Practice_Lwhh_Filter());
        require_once __DIR__ . '/widgets/nhr-practice-repeater.php';
        $widgets_manager->register(new \Nhr_Practice_Repeater());
        require_once __DIR__ . '/widgets/nhr-pricing-widget.php';
        $widgets_manager->register(new \NHR_Pricing_Widget());
    }

    public function register_controls($controls_manager)
    {

    }

}
