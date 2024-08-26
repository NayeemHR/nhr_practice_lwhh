<?php

class Nhr_Practice_Repeater extends \Elementor\Widget_Base

{
    public function get_name()
    {
        return 'nhr_practice_repeater';
    }

    public function get_title()
    {
        return esc_html__('NHR Repeater LWHH', 'nhr-practice-lwhh');
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
            'content_section',
            [
                'label' => esc_html__('Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__('Title', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_content',
                        'label' => esc_html__('Content', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'textdomain'),
                        'show_label' => false,
                    ],
                    [
                        'name' => 'list_color',
                        'label' => esc_html__('Color', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'textdomain'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['list']) {
            echo '<dl>';
            foreach ($settings['list'] as $index => $item) {
                $key = $this->get_repeater_setting_key('list_title', 'list', $index);
                $this->add_inline_editing_attributes($key, 'none');
                echo '<dt ' . $this->get_render_attribute_string($key) . ' class="elementor-repeater-item-' . esc_attr($item['_id']) . '">' . $item['list_title'] . '</dt>';
                echo '<dd>' . $item['list_content'] . '</dd>';
            }
            echo '</dl>';
        }
    }

    protected function _content_template()
    {
        ?>
        <# if ( settings.list.length ) {

            #>
			<dl>
			<# _.each( settings.list, function( item, index ) {
                var key = view.getRepeaterSettingKey('list_title', 'list', index);
                view.addInlineEditingAttributes(key, 'none');
                #>
				<dt {{{ view.getRenderAttributeString(key)}}}class="elementor-repeater-item-{{ item._id }}">{{{ item.list_title }}}</dt>
				<dd>{{{ item.list_content }}}</dd>
			<# }); #>
			</dl>
		<# } #>

        <?php
}

}
