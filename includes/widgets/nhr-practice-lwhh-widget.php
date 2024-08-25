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
        ?>
        <div class="nhr-practice-lwhh-heading">
            <h2 class="nhr-practice-lwhh-heading-title"><?php echo esc_html($heading_title); ?></h2>
            <p class="nhr-practice-lwhh-heading-subtitle"><?php echo esc_html($heading_subtitle); ?></p>
        </div>
        <?php
}

}
