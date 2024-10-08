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
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'include' => [],
                'default' => 'large',
            ]
        );
        // $this->add_group_control(
        //     \Elementor\Group_Control_Image_Size::get_type(),
        //     [
        //         'default' => 'large',
        //         'name' => 'imagexz',

        //     ],
        // );

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
        $this->add_control(
            'font_popover_toggle',
            [
                'label' => esc_html__('Font', 'textdomain'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__('Default', 'textdomain'),
                'label_on' => esc_html__('Custom', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->start_popover();
        $this->add_control(
            'font_family',
            [
                'label' => esc_html__('Font H1', 'textdomain'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "'Open Sans', sans-serif",
                'selectors' => [
                    '{{WRAPPER}} .nhr-practice-lwhh-heading-title' => 'font-family: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'size',
            [
                'label' => esc_html__('Size', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .nhr-practice-lwhh-heading-title' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->end_controls_section();

        $this->start_controls_section(
            'Extra Section',
            [
                'label' => esc_html__('Extra Section', 'nhr-practice-lwhh'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'country_select',
            [
                'label' => esc_html__('Select Your Fav. Country', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => [
                    'Bangladesh' => esc_html__('Bangladesh', 'nhr-practice-lwhh'),
                    'India' => esc_html__('India', 'nhr-practice-lwhh'),
                    'USA' => esc_html__('USA', 'nhr-practice-lwhh'),
                ],
                'default' => ['USA'],
            ]
        );
        $this->add_control(
            'country_text_align',
            [
                'label' => esc_html__('Alignment', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'nhr-practice-lwhh'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'nhr-practice-lwhh'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'nhr-practice-lwhh'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .country-style' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_style',
            [
                'label' => esc_html__('Border Style', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    '' => esc_html__('Default', 'nhr-practice-lwhh'),
                    'none' => esc_html__('None', 'nhr-practice-lwhh'),
                    'solid' => esc_html__('Solid', 'nhr-practice-lwhh'),
                    'dashed' => esc_html__('Dashed', 'nhr-practice-lwhh'),
                    'dotted' => esc_html__('Dotted', 'nhr-practice-lwhh'),
                    'double' => esc_html__('Double', 'nhr-practice-lwhh'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .country-style' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'custom_dimension',
            [
                'label' => esc_html__('Image Dimension', 'nhr-practice-lwhh'),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => esc_html__('Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'nhr-practice-lwhh'),
                'default' => [
                    'width' => '',
                    'height' => '',
                ],
            ]
        );

        $this->add_control(
            'gallery',
            [
                'label' => esc_html__('Gallery', 'textdomain'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .nhr-practice-lwhh-heading-subtitle',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .nhr-practice-lwhh-heading-subtitle',
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
                <p ' . $this->get_render_attribute_string('heading_subtitle') . ' >' . esc_html($heading_subtitle) . '</p>';
        // Get image URL
        // echo '<img src="' . $settings['image']['url'] . '">';
        // echo wp_get_attachment_image($settings['image']['id'], 'thumbnail');
        // echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'imagexz', 'imagezz');
        echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');

        echo '</div>';
        if ($settings['country_select']) {
            echo '<ul class="country-style">';
            foreach ($settings['country_select'] as $item) {
                echo '<li>' . $item . '</li>';
            }
            echo '</ul>';
        }
        // image dimension
        echo '<ul>
        <li>Width:' . $settings['custom_dimension']['width'] . '</li>
        <li>Height:' . $settings['custom_dimension']['height'] . '</li>
        </ul>';

        echo '<h4>Gallery</h4>';
        foreach ($settings['gallery'] as $image) {
            echo '<img src="' . esc_attr($image['url']) . '">';
        }
        echo '<h4>Icon</h4>';
        echo '<div class="my-icon-wrapper">';
        \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
        echo '</div>';
    }

    protected function _content_template()
    {
        ?>
        <#

        view.addInlineEditingAttributes('heading_title', 'none');
        view.addInlineEditingAttributes('heading_subtitle', 'none');
        view.addRenderAttribute('heading_title', 'class', 'nhr-practice-lwhh-heading-title');
        view.addRenderAttribute('heading_subtitle', 'class', 'nhr-practice-lwhh-heading-subtitle');


		const image = {
			id: settings.image.id,
			url: settings.image.url,
			size: settings.thumbnail_size,
			dimension: settings.thumbnail_custom_dimension,
			model: view.getEditModel()
		};
		const image_url = elementor.imagesManager.getImageUrl( image );

		#>

        <div class="nhr-practice-lwhh-heading">
            <h2 {{{ view.getRenderAttributeString('heading_title')}}}>{{{settings.heading_title}}}</h2>
            <p {{{ view.getRenderAttributeString('heading_subtitle')}}}>{{{settings.heading_subtitle}}}</p>
            <img src="{{ image_url }}">
        </div>

        <# if ( settings.country_select.length ) { #>
			<ul class="country-style">
			<# _.each( settings.country_select, function( item ) { #>
				<li>{{{ item }}}</li>
			<# } ) #>
			</ul>
		<# } #>
        <!-- Image Dimension  -->
        <ul>
            <li>Width:{{{settings.custom_dimension.width}}}</li>
            <li>Height:{{{settings.custom_dimension.height}}}</li>
        </ul>

        <h4>Gallery</h4>
        <#
        _.each( settings.gallery, function(image) {
            const image_gallry = {
                id: image.id,
                url: image.url,
                size: 'thumbnail',
            };
            const image_url = elementor.imagesManager.getImageUrl( image_gallry );
         #>
			<img src="{{ image_url }}">
		<# }); #>

        <h4>Icon</h4>
        <#
		const iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' );
		#>
		<div class="my-icon-wrapper">
			{{{ iconHTML.value }}}
		</div>

        <?php
}

}
