<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  David Enke 2012
 * @author     David Enke <davidenke@develab.de>
 * @package    Frontend
 * @license    LGPL
 * @filesource
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addM4v';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addWebm';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addOgv';
$GLOBALS['TL_DCA']['tl_content']['palettes']['text'] = str_replace(',text', ',intro,text', $GLOBALS['TL_DCA']['tl_content']['palettes']['text']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['intro'] = '{type_legend},type,headline;{source_legend},imageSRC,addM4v,addWebm,addOgv;{protected_legend:hide},protected';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['fullsize'] = 'fullsizeSRC';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addM4v'] = 'videoSRCm4v';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addWebm'] = 'videoSRCwebm';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addOgv'] = 'videoSRCogv';

$GLOBALS['TL_DCA']['tl_content']['fields']['intro'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['intro'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['addM4v'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addM4v'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr', 'submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['addWebm'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addWebm'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr', 'submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['addOgv'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addOgv'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr', 'submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['imageSRC'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imageSRC'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'jpg,jpeg', 'mandatory'=>true, 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['videoSRCm4v'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['videoSRCm4v'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'m4v', 'mandatory'=>true, 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['videoSRCwebm'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['videoSRCwebm'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'webm', 'mandatory'=>true, 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['videoSRCogv'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['videoSRCogv'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'ogv', 'mandatory'=>true, 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['fullsize']['eval']['tl_class'] = 'clr';
$GLOBALS['TL_DCA']['tl_content']['fields']['fullsize']['eval']['submitOnChange'] = true;
$GLOBALS['TL_DCA']['tl_content']['fields']['fullsizeSRC'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fullsizeSRC'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'jpg,jpeg', 'mandatory'=>true, 'tl_class'=>'clr')
);

?>