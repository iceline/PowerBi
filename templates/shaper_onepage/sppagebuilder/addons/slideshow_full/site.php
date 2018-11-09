<?php

/**
 * @package Varsita
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2015 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

class SppagebuilderAddonSlideshow_full extends SppagebuilderAddons {

    public function render() {
        $autoplay = (isset($this->addon->settings->autoplay) && $this->addon->settings->autoplay) ? $this->addon->settings->autoplay : '';
        $controllers = (isset($this->addon->settings->controllers) && $this->addon->settings->controllers) ? $this->addon->settings->controllers : '';
        $arrows = (isset($this->addon->settings->arrows) && $this->addon->settings->arrows) ? $this->addon->settings->arrows : '';
        $class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';


        //Check Auto Play
        $slide_autoplay = ($autoplay) ? 'data-sppb-slide-ride="true"' : '';
        $slide_controllers = ($controllers) ? 'data-sppb-slidefull-controllers="true"' : '';


        //output
        $output = '<div class="sppb-addon sppb-slider-wrapper sppb-slider-fullwidth-wrapper owl-theme' . $class . '">';
        $output .= '<div class="sppb-slider-item-wrapper">';
        $output .= '<div id="slide-fullwidth" class="owl-carousel" ' . $slide_controllers . ' ' . $slide_autoplay . ' >';

        foreach ($this->addon->settings->sp_slideshow_full_item as $key => $slide_item) {

            // if have bg
            $bg_image = ($slide_item->bg) ? 'style="background-image: url(' . JURI::base() . $slide_item->bg . ');"' : '';

            $output .= '<div class="sppb-slideshow-fullwidth-item item">';
            $output .= '<div class="sppb-slide-item-bg sppb-slideshow-fullwidth-item-bg" ' . $bg_image . '>';
            $output .= '<div class="container">';
            $output .= '<div class="sppb-slideshow-fullwidth-item-text">';

            if (($slide_item->title) || ($slide_item->content)) {

                $sub_title = ($slide_item->sub_title) ? '<small class="sppb-slidehsow-sub-title">' . $slide_item->sub_title . '</small>' : '';

                if ($slide_item->title) {
                    $output .= '<h1 class="sppb-fullwidth-title"> ' . $slide_item->title . $sub_title . ' </h1>';
                }

                if ($slide_item->content) {
                    $output .= '<p class="details">' . $slide_item->content . '</p>';
                }

                if (($slide_item->button_url && $slide_item->button_text)) {
                    $output .= '<div class="sppb-fw-slider-button-wrapper"> ';
                    if ($slide_item->button_text && $slide_item->button_url) {
                        //$output .= '<a target="' . $slide_item->target . '" href="' . $slide_item->button_one_url . '" class="sppb-slideshow-fullwidth-read-more"> <span>' . $slide_item->button_one_text . '</span></a>';
                        $output .= '<a href="' . $slide_item->button_url . '" class="sppb-slideshow-fullwidth-read-more"> <span>' . $slide_item->button_before_icon . $slide_item->button_text . $slide_item->button_after_icon . '</span></a>';
                    }

                    $output .= '</div>';
                }
            }

            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item-text
            $output .= '</div>'; // END:: /.container
            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item-bg
            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item
        }

        $output .= '</div>'; //END:: /.sppb-slider-items
        $output .= '</div>'; // END:: /.sppb-slider-item-wrapper
        // has next/previous arrows
        if ($arrows) {
            $output .= '<div class="customNavigation">';
            $output .= '<div class="container">';
            $output .= '<a class="sppbSlidePrev"><i class="fa fa-angle-left"></i></a>';
            $output .= '<a class="sppbSlideNext"><i class="fa fa-angle-right"></i></a>';
            $output .= '</div>';
            $output .= '</div>'; // END:: /.customNavigation
        }

        $output .= '</div>'; // /.sppb-slider-wrapper
        // has dot controls
        if ($controllers) {
            $output .='<div class="owl-dots">';
            $output .='<div class="owl-dot active"><span></span></div>';
            $output .='<div class="owl-dot"><span></span></div>';
            $output .='<div class="owl-dot"><span></span></div>';
            $output .='</div>';
        }

        return $output;
    }

    public function scripts() {
        $app = JFactory::getApplication();
        $base_path = JURI::base() . '/templates/' . $app->getTemplate() . '/js/';
        return array($base_path . 'owl.carousel.min.js', $base_path . 'addon.slider.js');
    }

    public function stylesheets() {
        $app = JFactory::getApplication();
        $base_path = JURI::base() . '/templates/' . $app->getTemplate() . '/css/';
        return array($base_path . 'owl.carousel.css', $base_path . 'owl.theme.css', $base_path . 'owl.transitions.css', $base_path . 'slide-animate.css');
    }

    public function css() {
        $addon_id = '#sppb-addon-' . $this->addon->id;
        $addont_styles = '';
        $addont_styles .= (isset($this->addon->settings->background) && $this->addon->settings->background) ? 'background: ' . $this->addon->settings->background . '; ' : '';
        $addont_styles .= (isset($this->addon->settings->color) && $this->addon->settings->color) ? 'color: ' . $this->addon->settings->color . '; ' : '';

        $css = '';
        if ($addont_styles) {
            $css .= $addon_id . ' .sppb-slider-fullwidth-wrapper .sppb-slider-item-wrapper {';
            $css .= $addont_styles;
            $css .= '}';
        }

        return $css;
    }

}
