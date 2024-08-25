<?php

class Nhr_Practice_Lwhh_Filter extends \Elementor\Widget_Base

{
    public function get_name()
    {
        return 'nhr_practice_lwhh';
    }

    public function get_title()
    {
        return esc_html__('NHR Practice LWHH', 'nhr-practice-lwhh');
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
            'heading_section',
            [
                'label' => esc_html__('Content', 'nhr-projects-filter'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__('Heading Title', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Heading Title', 'nhr-practice-lwhh'),
                'placeholder' => esc_html__('Type your title here', 'nhr-practice-lwhh'),
            ]
        );
        $this->add_control(
            'heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Heading Subtitle', 'nhr-practice-lwhh'),
                'placeholder' => esc_html__('Type your subtitle here', 'nhr-practice-lwhh'),
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style Section', 'nhr-practice-lwhh'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Heading Color', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nhr-practice-lwhh-heading-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => esc_html__('Heading Subtitle Color', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nhr-practice-lwhh-heading-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'aligment',
            [
                'label' => esc_html__('Content Alignment', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                    'left' => esc_html__('Left', 'nhr-practice-lwhh'),
                    'center' => esc_html__('Center', 'nhr-practice-lwhh'),
                    'right' => esc_html__('Right', 'nhr-practice-lwhh'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .nhr-practice-lwhh-heading' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $heading_title = $settings['heading_title'];
        $heading_subtitle = $settings['heading_subtitle'];
        /**
         *   Inline Editing
         */

        $this->add_inline_editing_attributes('heading_title', 'none'); // we can also use 'basic' or 'advanced' in place of 'none'
        $this->add_inline_editing_attributes('heading_subtitle', 'none');
        $this->add_render_attribute('heading_title', ['class' => 'nhr-practice-lwhh-heading-title']);
        $this->add_render_attribute('heading_subtitle', ['class' => 'nhr-practice-lwhh-heading-subtitle']);

        echo '<div class="nhr-practice-lwhh-heading">
                <h2 ' . $this->get_render_attribute_string('heading_title') . ' >' . esc_html($heading_title) . '</h2>
                <p ' . $this->get_render_attribute_string('heading_subtitle') . ' >' . esc_html($heading_subtitle) . '</p>
            </div>';
    }

    protected function _content_template()
    {
        ?>
        <#
            console.log(settings);
            view.addInlineEditingAttributes('heading_title', 'none');
            view.addInlineEditingAttributes('heading_subtitle', 'none');
            view.addRenderAttribute('heading_title', 'class', 'nhr-practice-lwhh-heading-title');
            view.addRenderAttribute('heading_subtitle', 'class', 'nhr-practice-lwhh-heading-subtitle');
        #>
        <div class="nhr-practice-lwhh-heading">
            <h2 {{{ view.getRenderAttributeString('heading_title')}}}>{{{settings.heading_title}}}</h2>
            <p {{{ view.getRenderAttributeString('heading_subtitle')}}}>{{{settings.heading_subtitle}}}</p>
        </div>
        <?php
}

}
