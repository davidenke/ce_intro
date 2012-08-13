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
 * @author     David Enke <enke@pingundpong.de>
 * @package    Frontend
 * @license    LGPL
 * @filesource
 */


/**
 * Class ContentIntro
 *
 * Front end content element "intro".
 * @copyright  David Enke 2012
 * @author     David Enke <enke@pingundpong.de>
 * @package    Controller
 */
class ContentIntro extends ContentElement {

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
	 * Video types
	 * @var array
	 */
	protected $arrVideoTypes = array();


	/**
	 * Return if the image does not exist
	 * @return string
	 */
	public function generate()
	{
		if (!strlen($this->imageSRC) || !is_file(TL_ROOT . '/' . $this->imageSRC))
			return '';

		return parent::generate();
	}


	/**
	 * Generate the content element
	 */
	protected function compile() {
		$this->Template->image = $this->imageSRC;

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

		$this->Template->types = $this->arrVideoTypes;
		$this->Template->video = $this->blnHasVideo;
	}
}

?>