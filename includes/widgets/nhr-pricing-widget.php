<?php

class NHR_Pricing_Widget extends \Elementor\Widget_Base

{
    public function get_name()
    {
        return 'nhr_pricing_widget';
    }

    public function get_title()
    {
        return esc_html__('NHR Pricing Widget', 'nhr-pricing-widget');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['general', 'nhr-widgets-category'];
    }

    public function get_keywords()
    {
        return ['test', 'nhr-practice-lwhh'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'nhr_pricing_content_section',
            [
                'label' => esc_html__('Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'nhr_pricing_widget_style',
            [
                'label' => esc_html__('Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__('Default', 'textdomain'),
                    'blue' => esc_html__('Blue', 'textdomain'),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'style_select_hidden',
            [
                'label' => esc_html__('', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'style_select_hidden',

            ]
        );

        $this->add_control(
            'nhr_pricing_widget_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Pricing Plans', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'dummy',
            [
                'label' => esc_html__('', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'dummy',

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'nhr_pricing_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Price Title', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'nhr_pricing_price',
            [
                'label' => esc_html__('Price', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 100,
                'step' => 5,
                'default' => 10,
            ]
        );
        $repeater->add_control(
            'nhr_pricing_content',
            [
                'label' => esc_html__('Content', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Price Content', 'textdomain'),
                'show_label' => true,
            ]
        );
        $repeater->add_control(
            'nhr_pricing_content_items',
            [
                'label' => esc_html__('Items', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Items', 'textdomain'),
                'show_label' => true,
            ]
        );
        $repeater->add_control(
            'items_hidden_selector',
            [
                'label' => esc_html__('', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'items_hidden_selector',

            ]
        );

        $repeater->add_control(
            'nhr_pricing_btn',
            [
                'label' => esc_html__('Button', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Buy Now', 'textdomain'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'nhr_pricing_btn_link',
            [
                'label' => esc_html__('Button Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]

        );

        $this->add_control(
            'nhr_pricing_widget_box',
            [
                'label' => esc_html__('Pricing List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ nhr_pricing_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $style = $this->get_settings('nhr_pricing_widget_style');

        if ('default' == $style): ?>
            <section class="fdb-block" style="background-image: url(imgs/hero/red.svg);">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1 class="text-white"><?php echo $settings["nhr_pricing_widget_title"] ?></h1>
            </div>
        </div><?php
if ($settings['nhr_pricing_widget_box']) {
            echo '<div class="row mt-5 align-items-center">';
            foreach ($settings['nhr_pricing_widget_box'] as $item):
            ?>


            <div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
                <div class="fdb-box p-4">
                    <h2><?php echo $item['nhr_pricing_title'] ?></h2>
                    <p class="lead"><?php echo $item['nhr_pricing_content']; ?></p>

                    <p class="h1 mt-5 mb-5"><?php apply_filters('pricing_prefix', '$');
            echo $item['nhr_pricing_price'];?></p>

                    <p><a href="<?php echo esc_url($item['nhr_pricing_btn_link']['url']) ?>" class="btn btn-dark"><?php echo $item['nhr_pricing_btn'] ?></a></p>
                </div>
            </div>

            <?php
endforeach;
            echo '</div>';
        }
        ?>

        </div>
    </div>
</section>
        <?php else: ?>


<section class="fdb-block">
<div class="container">
  <div class="row text-center">
    <div class="col">
      <h1><?php echo $settings["nhr_pricing_widget_title"] ?></h1>
    </div>
  </div>
<?php
if ($settings['nhr_pricing_widget_box']) {
            echo '<div class="row mt-5 align-items-top">';
            foreach ($settings['nhr_pricing_widget_box'] as $item):
            ?>
            <div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center elementor-repeater-item-<?php echo esc_attr($item['_id']) ?>">
              <div class="bg-gray pb-5 pt-5 pl-4 pr-4 rounded">
                  <h3><strong><?php echo $item['nhr_pricing_title'] ?></strong></h3>
                  <p class="h1 mt-5">
                      <?php apply_filters('pricing_prefix', '$');
            echo $item['nhr_pricing_price'];?> <span class="lead">/ month</span>
                  </p>
                  <p>
                      <?php echo $item['nhr_pricing_content']; ?>
                  </p>
                  <hr>
                  <p><?php
$list_items = explode("\n", trim($item['nhr_pricing_content_items']));
            foreach ($list_items as $list_item) {
                if ($list_item) {
                    echo "<p><em>{$list_item}</em></p>";
                }
            }
            ?></p>
                  <p class="text-center pt-5"><a href="<?php echo esc_url($item['nhr_pricing_btn_link']['url']) ?>"
                          class="btn btn-primary">
                          <?php echo $item['nhr_pricing_btn'] ?>
                      </a>
                  </p>
              </div>
            </div>
<?php endforeach;
            echo '</div>';
        }?>
</div>
</section>
       <?php endif;

    }

    protected function _content_template()
    {
        ?>

<# if(settings.nhr_pricing_widget_style == 'default'){ #>
  <section class="fdb-block" style="background-image: url(imgs/hero/red.svg);">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1 class="text-white">{{{settings.nhr_pricing_widget_title}}}</h1>
            </div>
        </div>
<# if (settings.nhr_pricing_widget_box.length) {#>
          <div class="row mt-5 align-items-center">
            <#  _.each( settings.nhr_pricing_widget_box, function( item ) { #>

            <div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
                <div class="fdb-box p-4">
                    <h2>{{{item.nhr_pricing_title}}}</h2>
                    <p class="lead">{{{item.nhr_pricing_content}}}</p>

                    <p class="h1 mt-5 mb-5"><?php apply_filters('pricing_prefix', '$');?>
        {{{item.nhr_pricing_price}}}</p>

                    <p><a href="{{{item.nhr_pricing_btn_link.url}}}" class="btn btn-dark">{{{item.nhr_pricing_btn}}}</a></p>
                </div>
            </div>
            <# }); #>
            </div>
            <# } #>

        </div>
    </div>
</section>
<# }else{ #>

<section class="fdb-block">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1>{{{ settings.nhr_pricing_widget_title }}}</h1>
            </div>
        </div>
        <# if ( settings.nhr_pricing_widget_box.length ) { #>
            <div class="row mt-5 align-items-top">
                <# _.each( settings.nhr_pricing_widget_box, function( item ) { #>
                    <div
                        class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center elementor-repeater-item-{{ item._id }}">
                        <div class="bg-gray pb-5 pt-5 pl-4 pr-4 rounded">
                            <h3><strong>{{{ item.nhr_pricing_title }}}</strong></h3>
                            <p class="h1 mt-5">
                                <?php apply_filters('pricing_prefix', '$');?>{{{item.nhr_pricing_price}}} <span
                                    class="lead">/ month</span>
                            </p>
                            <p>{{{ item.nhr_pricing_content }}}</p>
                            <hr>


                            <p class="text-center pt-5"><a href="{{{ item.nhr_pricing_btn_link.url }}}"
                                    class="btn btn-primary">{{{item.nhr_pricing_btn}}}</a></p>
                        </div>
                    </div>
                    <# }); #>
            </div>
            <# } #>
    </div>
</section>

<# } #>

<?php
}

}
