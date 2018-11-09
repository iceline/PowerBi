<?php

/**
 * @package Onepage
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2015 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

class SppagebuilderAddonTeams extends SppagebuilderAddons {

    public function render() {
        $autoplay = (isset($this->addon->settings->autoplay) && $this->addon->settings->autoplay) ? $this->addon->settings->autoplay : '';
        //$controllers = (isset($this->addon->settings->controllers) && $this->addon->settings->controllers) ? $this->addon->settings->controllers : '';
        $arrows = (isset($this->addon->settings->arrows) && $this->addon->settings->arrows) ? $this->addon->settings->arrows : '';
        $class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
        $team_items = (isset($this->addon->settings->sp_teams_item) && is_array($this->addon->settings->sp_teams_item)) ? $this->addon->settings->sp_teams_item : array();


        $before_text = (isset($this->addon->settings->before_text) && $this->addon->settings->before_text) ? $this->addon->settings->before_text : '';

        $output = '';

        if ($before_text) {
            // Before text
            $output .= '<div class="sppb-team-before-text sppb-text-center" >';
            $output .= '<p class="sppb-center sppb-lead">' . $before_text . '</p>';
            $output .= '</div>';
        }

        //Variables
        $carousel_autoplay = ($autoplay) ? 'data-sppb-ride="sppb-carousel"' : '';

        // Start carousel
        $output .= '<div class="sppb-teams-wrapper sppb-carousel sppb-slide ' . $class . '" ' . $carousel_autoplay . '>';
        $output .= '<div class="sppb-carousel-inner">';

        foreach (array_chunk($team_items, 3) as $chunk_key => $team_items) {
            $output .='<div class="sppb-item ' . ( ($chunk_key == 0) ? "active" : "") . ' ">';
            $output .='<ul class="sppb-teams">';

            //array items
            $count = count($team_items);

            foreach ($team_items as $key => $sppbTeam) {
                $output .= '<li class="sppb-team-wrapper ' . ( ($key == 0) ? "first-item  active" : "") . ( ($key == $count - 1) ? "last-item" : "") . ' ">';
                $output .= '<div class="sppb-team">';


                $output .= '<div class="sppb-team-image-wrapper">';
                $output .= '<img class="img-thumbnail sppb-img-responsive" src="' . $sppbTeam->image . '" alt=" ' . $sppbTeam->title . ' ">';
                $output .= '</div>'; //.sppb-team-image-wrapper


                $output .= '<div class="sppb-team-info">';
                // Has name
                if ($sppbTeam->title) {
                    $output .= '<h3 class="sppb-team-name"> ' . $sppbTeam->title . ' </h3>';
                }

                //has designation
                if ($sppbTeam->designation) {
                    $output .= '<p class="sppb-designation"> ' . $sppbTeam->designation . ' </p>';
                }

                //has intro text
                if ($sppbTeam->introtext) {
                    $output .= '<p class="sppb-introtext"> ' . $sppbTeam->introtext . ' </p>';
                }

                //has social
                if ($sppbTeam->facebook || $sppbTeam->twitter || $sppbTeam->google_plus || $sppbTeam->youtube || $sppbTeam->linkedin || $sppbTeam->pinterest || $sppbTeam->flickr || $sppbTeam->dribbble || $sppbTeam->behance || $sppbTeam->instagram
                ) {
                    $output .= '<div class="sppb-team-social-icons">';

                    // Has facebook
                    if ($sppbTeam->facebook) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->facebook . '" ><i class="fa fa-facebook"></i></a>';
                    }
                    // Has twitter
                    if ($sppbTeam->twitter) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->twitter . '" ><i class="fa fa-twitter"></i></a>';
                    }
                    // Has google plus
                    if ($sppbTeam->google_plus) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->google_plus . '" ><i class="fa fa-google-plus"></i></a>';
                    }
                    // Has youtube
                    if ($sppbTeam->youtube) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->youtube . '" ><i class="fa fa-youtube"></i></a>';
                    }
                    // Has linkedin
                    if ($sppbTeam->linkedin) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->linkedin . '" ><i class="fa fa-linkedin"></i></a>';
                    }
                    // Has pinterest
                    if ($sppbTeam->pinterest) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->pinterest . '" ><i class="fa fa-pinterest"></i></a>';
                    }
                    // Has flickr
                    if ($sppbTeam->flickr) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->flickr . '" ><i class="fa fa-flickr"></i></a>';
                    }
                    // Has dribbble
                    if ($sppbTeam->dribbble) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->dribbble . '" ><i class="fa fa-dribbble"></i></a>';
                    }
                    // Has behance
                    if ($sppbTeam->behance) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->behance . '" ><i class="fa fa-behance"></i></a>';
                    }
                    // Has instagram
                    if ($sppbTeam->instagram) {
                        $output .= '<a target="_blank" href="' . $sppbTeam->instagram . '" ><i class="fa fa-instagram"></i></a>';
                    }


                    $output .= '</div>';
                }



                $output .= '</div>'; //.sppb-team-info

                $output .= '</div>'; // ./sppb-team
                $output .= '</li>';
            }

            $output .='</ul>';
            $output .='</div>';
        }

        //$output .= AddonParser::spDoAddon($content);
        $output .= '</div>'; // /.sppb-carousel-inner

        if ($arrows) {
            $output .= '<a class="sppb-carousel-arrow left sppb-carousel-control" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>';
            $output .= '<a class="sppb-carousel-arrow right sppb-carousel-control" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>';
        }

        $output .= '</div>'; // /.sppb-carousel

        return $output;
    }

    public function css() {
        $addon_id = '#sppb-addon-' . $this->addon->id;
        $addont_styles = '';
        $addont_styles .= (isset($this->addon->settings->background) && $this->addon->settings->background) ? 'background: ' . $this->addon->settings->background . '; ' : '';
        $addont_styles .= (isset($this->addon->settings->color) && $this->addon->settings->color) ? 'color: ' . $this->addon->settings->color . '; ' : '';

        $css = '';
        if ($addont_styles) {
            $css .= $addon_id . ' .sppb-carousel-inner {';
            $css .= $addont_styles;
            $css .= '}';
        }

        return $css;
    }

    public function js() {
        $js = "jQuery(document).ready(function ($) {
            $('.sppb-teams li').mouseenter(function () {
                $('.sppb-teams li').removeClass('active');
                $(this).addClass('active');
            }).mouseleave(function () {
                $('.sppb-teams li').removeClass('active');
                $('.sppb-teams li.first-item').addClass('active');
            });
        });";
        return $js;
    }

}
