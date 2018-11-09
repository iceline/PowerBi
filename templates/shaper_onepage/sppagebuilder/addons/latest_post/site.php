<?php

/**
 * @package Onepage
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

require_once JPATH_ROOT . '/components/com_sppagebuilder/helpers/articles.php';

class SppagebuilderAddonLatest_post extends SppagebuilderAddons {

    public function render() {
        $class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
        $title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
        $heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';

        $item_limit = (isset($this->addon->settings->item_limit) && $this->addon->settings->item_limit) ? $this->addon->settings->item_limit : '';
        $ordering = (isset($this->addon->settings->ordering) && $this->addon->settings->ordering) ? $this->addon->settings->ordering : 'latest';
        $post_type = (isset($this->addon->settings->post_type) && $this->addon->settings->post_type) ? $this->addon->settings->post_type : '';
        $catid = (isset($this->addon->settings->category) && $this->addon->settings->category) ? $this->addon->settings->category : '';

        $items = SppagebuilderHelperArticles::getArticles($item_limit, $ordering, $catid, TRUE, $post_type);


        //start output
        $output = '<div class="sppb-addon sppb-addon-latest-posts ' . $class . '">';
        $output .= '<div class="sppb-addon-content">';
        $output .= '<div class="latest-posts clearfix">';

        foreach (array_chunk($items, 2) as $items) {
            $output .='<div class="sppb-row">';

            foreach ($items as $item) {

                $image = '';
                //image
                if (isset($item->image_thumbnail) && $item->image_thumbnail) {
                    $image = JURI::root() . $item->image_thumbnail;
                } elseif (isset($images->image_intro) && !empty($images->image_intro)) {
                    $image = $images->image_intro;
                } elseif (isset($images->image_fulltext) && !empty($images->image_fulltext)) {
                    $image = $images->image_fulltext;
                }

                $output .= '<div class="latest-post sppb-column sppb-col-sm-6" >';

                $output .= '<div class="latest-post-inner">';

                $output .= '<a href="' . $item->link . '">';
                if ($image) {
                    $output .= '<div class="img-hexagon">';
                    $output .= '<div>';
                    $output .= '<div style="background-image: url(\'' . $image . '\')"></div>';
                    $output .= '</div>';
                    $output .= '</div>'; // /.img-hexagon
                }
                $output .= '</a>';

                $output .= '<h4 class="entry-title"><a href="' . $item->link . '">' . $item->title . '</a></h4>';
                $output .= '<div class="entry-meta"><span class="entry-date"> ' . JHtml::_('date', $item->created, 'DATE_FORMAT_LC3') . '</span></div>';

                $output .= '</div>';

                $output .= '</div>';
            } // END:: items foreach

            $output .= '</div>'; // END:: row
        } // END:: array_chunk

        $output .= '</div>'; // /.latest-posts
        $output .= '</div>'; // /.sppb-addon-content
        $output .= '</div>'; // /.sppb-addon-latest-posts

        return $output;
    }

}
