<?php

/**
 * @package Onepage
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2015 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

class SppagebuilderAddonSocial_icons extends SppagebuilderAddons {
    public function render() {
    	$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
    	$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';

    	//output start
	    $output = '';
	    if ($title) {
	        $output .= '<div class="sppb-addon-title-wrapper">';
	        $output .= '<h3 class="sppb-addon-title"> ' . $title . '</h3>';
	        $output .= '</div>';
	    }

	    $output .= '<div class="sppb-social-icons ' . $class . '" >';
	    
	    foreach ($this->addon->settings->sp_social_icons_item as $key => $social_item) {
			$output .= '<span style="display:inline-block;">';
		    $output .= '<a href="' . $social_item->url . '">';
		    $output .= '<i class="fa ' . $social_item->icon . ' "></i>';
		    $output .= '</a>';
		    $output .= '</span>';
	    }

	    $output .= '</div>'; //END:: /.sppb-social-icon-wrapper

	    return $output;

 	}
}


// AddonParser::addAddon('sp_social_icons', 'sp_social_icons_addon');
// AddonParser::addAddon('sp_social_icons_item', 'sp_social_icons_item_addon');

// function sp_social_icons_addon($atts, $content) {

//     extract(spAddonAtts(array(
//         'title' => '',
//         "class" => '',
//                     ), $atts));

//     $output = '';

//     if ($title) {
//         $output .= '<div class="sppb-addon-title-wrapper">';
//         $output .= '<h3 class="sppb-addon-title"> ' . $title . '</h3>';
//         $output .= '</div>';
//     }

//     $output .= '<div class="sppb-social-icons ' . $class . '" >';
//     $output .= AddonParser::spDoAddon($content);
//     $output .= '</div>'; //END:: /.sppb-social-icon-wrapper




//     return $output;
// }

// function sp_social_icons_item_addon($atts) {

//     extract(spAddonAtts(array(
//         "title" => '',
//         "icon" => '',
//         "url" => '',
//                     ), $atts));

//     $output = '<span style="display:inline-block;">';
//     $output .= '<a href="' . $url . '">';
//     $output .= '<i class="fa ' . $icon . ' "></i>';
//     $output .= '</a>';
//     $output .= '</span>';


//     return $output;
// }
