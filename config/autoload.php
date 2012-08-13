<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Intro
 * @link    http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'Contao\ContentIntro' => 'system/modules/ce_intro/elements/ContentIntro.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_intro'   => 'system/modules/ce_intro/templates'
));
