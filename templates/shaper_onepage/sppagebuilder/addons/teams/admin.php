<?php

/**
 * @package Onepage
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2015 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

SpAddonsConfig::addonConfig(
        array(
            'type' => 'repeatable',
            'addon_name' => 'sp_teams',
            'category' => 'onepage',
            'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TEAMS'),
            'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_TEAMS_DESC'),
            'attr' => array(
                'general' => array(
                    'autoplay' => array(
                        'type' => 'select',
                        'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY'),
                        'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CAROUSEL_AUTOPLAY_DESC'),
                        'values' => array(
                            1 => JText::_('JYES'),
                            0 => JText::_('JNO'),
                        ),
                        'std' => 1,
                    ),
                    'arrows' => array(
                        'type' => 'select',
                        'title' => JText::_('COM_SPPAGEBUILDER_ADDON_SF_SHOW_ARROWS'),
                        'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_SF_SHOW_ARROWS_DESC'),
                        'values' => array(
                            1 => JText::_('JYES'),
                            0 => JText::_('JNO'),
                        ),
                        'std' => 1,
                    ),
                    'before_text' => array(
                        'type' => 'textarea',
                        'title' => JText::_('COM_SPPAGEBUILDER_ADDON_BEFORE_TEXT'),
                        'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_BEFORE_TEXT_DESC'),
                        'std' => ''
                    ),
                    'class' => array(
                        'type' => 'text',
                        'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
                        'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
                        'std' => ''
                    ),
                    //Repetable
                    'sp_teams_item' => array(
                        'title' => JText::_('COM_SPPAGEBUILDER_ADDON_REPEATABLE_ITEMS'),
                        'attr' => array(
                            'image' => array(
                                'type' => 'media',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_PHOTO'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_PHOTO_DESC'),
                            ),
                            'title' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_NAME_DESC'),
                                'placeholder' => 'John Doe',
                                'std' => 'John Doe',
                            ),
                            'designation' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_DESIGNATION_DESC'),
                                'placeholder' => 'CEO & Founder',
                                'std' => 'CEO & Founder',
                            ),
                            'introtext' => array(
                                'type' => 'textarea',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_INTROTEXT'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_INTROTEXT_DESC'),
                                'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
                            ),
                            'facebook' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_FACEBOOK'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_FACEBOOK_DESC'),
                                'placeholder' => 'http://www.facebook.com/joomshaper',
                                'std' => 'http://www.facebook.com/joomshaper',
                            ),
                            'twitter' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_TWITTER'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_TWITTER_DESC'),
                                'placeholder' => 'http://twitter.com/joomshaper',
                                'std' => 'http://twitter.com/joomshaper',
                            ),
                            'google_plus' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_GOOGLE_PLUS'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_GOOGLE_PLUS_DESC'),
                                'placeholder' => 'http://plus.google.com/+Joomshapers',
                                'std' => 'http://plus.google.com/+Joomshapers',
                            ),
                            'youtube' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_YOUTUBE'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_YOUTUBE_DESC'),
                            ),
                            'linkedin' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_LINKEDIN'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_LINKEDIN_DESC'),
                            ),
                            'pinterest' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_PINTEREST'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_PINTEREST_DESC'),
                            ),
                            'flickr' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_FLICKR'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_FLICKR_DESC'),
                            ),
                            'dribbble' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_DRIBBBLE'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_DRIBBBLE_DESC'),
                            ),
                            'behance' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_BEHANCE'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_BEHANCE_DESC'),
                            ),
                            'instagram' => array(
                                'type' => 'text',
                                'title' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_INSTAGRAM'),
                                'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_PERSON_INSTAGRAM_DESC'),
                            ),
                        )
                    ),
                )
            ),
        )
);

