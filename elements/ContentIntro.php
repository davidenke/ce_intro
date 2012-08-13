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
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;


/**
 * Class ContentIntro
 *
 * Front end content element "intro".
 * @copyright  David Enke 2012
 * @author     David Enke <http://www.davidenke.de>
 * @package    Intro
 */
class ContentIntro extends \ContentElement {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_intro';

	/**
	 * Video added
	 * @var bool
	 */
	protected $blnHasVideo = true;

	/**
	 * Image width
	 * @var int
	 */
	protected $intWidth;

	/**
	 * Image height
	 * @var int
	 */
	protected $intHeight;

	/**
	 * Video types
	 * @var array
	 */
	protected $arrVideoTypes = array();


	/**
	 * Return if the image does not exist
	 * @return string
	 */
	public function generate() {
		if ($this->imageSRC == '')
			return '';

		if (!is_numeric($this->imageSRC))
			return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';

		$objFile = \FilesModel::findByPk($this->imageSRC);

		if ($objFile === null || !is_file(TL_ROOT . '/' . $objFile->path))
			return '';

		$this->imageSRC = $objFile->path;

		switch ($this->imageSize) {
			default:
			case '1280 x 720':
				$this->intWidth = 1280;
				$this->intHeight = 720;
				break;
			case '1024 x 576':
				$this->intWidth = 1024;
				$this->intHeight = 576;
				break;
		}
		return parent::generate();
	}


	/**
	 * Generate the content element
	 */
	protected function compile() {
		if ($this->addM4v && (!strlen($this->videoSRCm4v) || !is_file(TL_ROOT . '/' . $this->videoSRCm4v))
		&& ($this->addWebm && (!strlen($this->videoSRCwebm) || !is_file(TL_ROOT . '/' . $this->videoSRCwebm)))
		&& ($this->addOgv && (!strlen($this->videoSRCogv) || !is_file(TL_ROOT . '/' . $this->videoSRCogv))))
			$this->blnHasVideo = false;

		if ($this->blnHasVideo) {
			if ($this->addM4v && strlen($this->videoSRCm4v) && is_file(TL_ROOT . '/' . $this->videoSRCm4v)) {
				$this->Template->videom4v = $this->videoSRCm4v;
				$this->arrVideoTypes[] = 'm4v';
			}
			if ($this->addWebm && strlen($this->videoSRCwebm) && is_file(TL_ROOT . '/' . $this->videoSRCwebm)) {
				$this->Template->videowebm = $this->videoSRCwebm;
				$this->arrVideoTypes[] = 'webm';
			}
			if ($this->addOgv && strlen($this->videoSRCogv) && is_file(TL_ROOT . '/' . $this->videoSRCogv)) {
				$this->Template->videoogv = $this->videoSRCogv;
				$this->arrVideoTypes[] = 'ogv';
			}
		}

		if (!sizeof($this->arrVideoTypes))
			$this->blnHasVideo = false;

		$this->Template->image = $this->getImage($this->imageSRC, $this->intWidth, $this->intHeight);
		$this->Template->sizes = array($this->intWidth, $this->intHeight);
		$this->Template->types = $this->arrVideoTypes;
		$this->Template->video = $this->blnHasVideo;
		$this->Template->loop = $this->loop;
	}
}

?>