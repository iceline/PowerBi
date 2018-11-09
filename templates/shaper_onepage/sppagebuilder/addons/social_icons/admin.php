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
        'addon_name' => 'sp_social_icons',
        'category' => 'onepage',
        'title' => JText::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_ICONS'),
        'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_SOCIAL_ICONS_DESC'),
        'attr' => array(
            'general' => array(
                'title' => array(
                    'type' => 'text',
                    'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                    'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
                    'std' => ''
                ),
                'class' => array(
                    'type' => 'text',
                    'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
                    'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
                    'std' => ''
                ),
                //Repetable
                'sp_social_icons_item' => array(
                    'title' => JText::_('COM_SPPAGEBUILDER_ADDON_REPEATABLE_ITEMS'),
                    'attr' => array(
                        'title' => array(
                            'type' => 'text',
                            'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                            'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
                            'std' => 'Title of the icon'
                        ),
                        'icon' => array(
                            'type' => 'icon',
                            'title' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_ICON_NAME'),
                            'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_ICON_NAME_DESC'),
                            'std' => ''
                        ),
                        'url' => array(
                            'type' => 'text',
                            'title' => JText::_('COM_SPPAGEBUILDER_ADDON_URL'),
                            'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_URL_DESC'),
                            'placeholder' => 'http://www.facebook.com/joomshaper',
                            'std' => '',
                        ),
                    )
                ),
            ),
        )
    )
);

