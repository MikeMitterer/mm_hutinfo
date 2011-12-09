<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Mike Mitterer <office@bitcon.at>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Plugin 'MM Hut-Manager' for the 'mm_hutinfo' extension.
 *
 * @author	Mike Mitterer <office@bitcon.at>
 */


require_once(t3lib_extMgm::extPath('mm_bccmsbase').'lib/class.mmlib_extfrontend.php');

class tx_mmhutinfo_pi1 extends mmlib_extfrontend {
	var $prefixId 		= 'tx_mmhutinfo_pi1';		// Same as class name
	var $scriptRelPath 	= 'pi1/class.tx_mmhutinfo_pi1.php';	// Path to this script relative to the extension dir.
	var $pi_checkCHash 	= TRUE;
    //$this->$cache = 0;
    //$this->pi_USER_INT_obj = 1;

	/**
	 * Main method of your PlugIn
	 *
	 * @param	string		$content: The content of the PlugIn
	 * @param	array		$conf: The PlugIn Configuration
	 * @return	The content that should be displayed on the website
	 */
	function main($content,$conf)	{
		//t3lib_div::debug($conf,'$conf');
		$conf = $this->initPlugin($conf);

		// Overwrites the Configsettings
		if(isset($this->piVars['viewmode'])) 		$this->conf['view_mode'] = $this->piVars['viewmode'];
		if(strlen(trim($this->piVars['sword']))) 	$this->conf['view_mode'] = 'list';
		if($this->conf['view_mode'] == 'tree') 		unset($this->piVars['mode']);

		if(isset($this->piVars['showUid'])) $this->setViewType('singleView');

		//$content .= $this->getCategoryTree();
		//t3lib_div::debug($GLOBALS["TSFE"]->fe_user,'fe_user');

		//t3lib_div::debug($conf,'$conf');
		$content .= $this->getContentForView($view);


		return $this->pi_wrapInBaseClass($content);
	}

	/**
	 * Do some initialisation work
	 *
	 * @param	[array]			$conf:TS Configuration for this plugin
	 *
	 * @return	[array]			returns the configuration-Array
	 */
	function initPlugin($conf) {
		$aInitData['tablename'] 	= 'tx_mmhutinfo_hut';
		$aInitData['uploadfolder'] 	= 'tx_mmhutinfo';
		$aInitData['extensionkey'] 	= 'mm_hutinfo';

		// Optional
		$aInitData['flex2conf'] 		= $this->getFLEXConversionInfo();

		// Will be used in getDataFromForeignTable
		// Records will alwayes be showen. FEUsers is used only for editing
		$this->internal['overruleFEUser'] = true;

		$conf = $this->initFromArray($conf,$aInitData);

		//$this->cattree = t3lib_div::makeInstance('mmlib_tree');
		//$this->cattree->init($this);

		return $conf;
		}

	/**
	 * The array ties together the static-TS configuration and the Flex Form
	 * If data is set in both areas then FlexForm settings have the priority.
	 *
	 * @return	[array]	- Information about the TS2Flex connection
	 */
	function getFLEXConversionInfo()
		{
		return array(
			'singlePid'			=> 'sMAIN:single_pid',
			'typodbfield.' 		=> array (
				'gkey.' 		=> array (
					'value'	=> 'sMAIN:google_code',
					),
				'mailform_edit_page.' => array (
					'value'	=> 'sMAIN:mailform_edit_page',
					),
				),
			);
		}

	/**
	 * Executes the main-query from the ListView.
	 * Select all the Files from a specific Kategory ($this->piVars['mode'])
	 *
	 * @param	[boolean]		$fCountRecords: Just count the records
	 * @param	[string]		$strWhereStatement: Optional additional WHERE clauses put in the end of the query
	 *
	 * @return	[integer]	pointer MySQL result pointer / DBAL object
	 */
	function execQuery($fCountRecords = 0,$strWhereStatement = '')
		{
		$results_at_a_time 			= t3lib_div::intInRange($this->internal['results_at_a_time'],1,1000);
		$pointer 					= intval($this->piVars['pointer']);

		$SQL['select'] 				= 'tx_mmhutinfo_hut.*,tx_mmhutinfo_area.name as area_name,tx_mmhutinfo_province.name as province_name';
		$SQL['from']				= 'tx_mmhutinfo_hut,tx_mmhutinfo_area,tx_mmhutinfo_province';
		$SQL['order_by']			= ''; // Defaultsettings are made in setup.txt (order)
		$SQL['group_by']			= '';
    	$SQL['limit']				= ($pointer * $results_at_a_time) . ',' . $results_at_a_time;

		// order_by can be overwritten by the piVar[order]
		if(isset($this->internal["orderBy"]) && t3lib_div::inList($this->internal["orderByList"],$this->internal["orderBy"])) {
			$SQL['order_by'] = $this->internal["orderBy"] . ($this->internal["descFlag"] ? ' DESC' : ''	);
		}

		if($fCountRecords == true) {
			$SQL['select'] 		= 'count(*)';
			$SQL['limit']		= '';
		}

		$showHidden 				= ($this->piVars['specialPrev'] ? $this->piVars['specialPrev'] : 0);
		//t3lib_div::debug($showHidden,'$showHidden');

		// Show alwayes all records, independ of the fe_group settings
		$WHERE['enable_fields']		= $this->enableFields($this->getTableName(),null,$showHidden,array('fe_group'));
		$WHERE['showuid']			= $this->piVars['showUID'] ? "AND tx_dam.uid='" . intval($this->piVars['showUID']) . "''" : '';
		$WHERE['statement']			= $strWhereStatement;
		$WHERE['join']				= ' AND (tx_mmhutinfo_hut.area_uid = tx_mmhutinfo_area.uid AND
										tx_mmhutinfo_hut.province_uid = tx_mmhutinfo_province.uid)';

		//t3lib_div::debug($WHERE,'where');

		if(isset($this->piVars['filterfield']) && isset($this->piVars['filterid']))  {
			$filterfield = $GLOBALS['TYPO3_DB']->quoteStr($this->piVars['filterfield'],$this->getTableName());
			//t3lib_div::debug($filterfield,'$filterfield');
			$WHERE['filter']		= " AND tx_mmhutinfo_hut." . $filterfield . "='" . t3lib_div::intval_positive($this->piVars['filterid']) . "'";
			//t3lib_div::debug($WHERE['filter'],'$WHERE[filter]');
		}

		$SQL['where']				= $this->implodeWithoutBlankPiece('AND ',$WHERE);


		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			$SQL['select'],
			$SQL['from'],
			$SQL['where'],
			$SQL['group_by'],
			$SQL['order_by'],
			$SQL['limit']
			);

		// Only for debugging...
		if(!$res)
			{
			t3lib_div::debug('----------- SQL Statement ---------------',1);
			t3lib_div::debug(mysql_error(),1);
			t3lib_div::debug($SQL);
			t3lib_div::debug('++++++++++++++++++++++++++++++++++++++++++',1);
			}
	return $res;
	}

	function getFieldContent($fieldname)	{
		static $recursCheck = false;
		$result 			= '';

		if(($bufferdResult = $this->mmlib_cache->getFromBuffer($fieldname)) != null) {
			return $bufferdResult;	}

		switch($fieldname) {
			case 'area':
				$result = $this->getDataFromForeignTable('area_uid','tx_mmhutinfo_area','name');
				if(is_array($result)) $result = implode(',', $result);
				break;

			case 'province':
				$result = $this->getDataFromForeignTable('province_uid','tx_mmhutinfo_province','name');
				if(is_array($result)) $result = implode(',', $result);
				break;

			case 'provincedesc':
				$result = $this->getDataFromForeignTable('province_uid','tx_mmhutinfo_province','description');
				if(is_array($result)) $result = implode(',', $result);
				$result = $this->getAutoFieldContent($fieldname,$result);
				break;

			case 'provinceimage':
				$image = $this->getDataFromForeignTable('province_uid','tx_mmhutinfo_province','image');
				if(is_array($image)) $image = implode(',', $image);
				$result = $this->getAutoFieldContent($fieldname,$image);
				break;

			case 'country':
				$result = $this->getDataFromForeignTable('province_uid','tx_mmhutinfo_province','country');
				if(is_array($result)) $result = implode(',', $result);
				//t3lib_div::debug("hallo");
				break;

			case 'huttype':
				//t3lib_div::debug("hallo");
				$result = $this->getDataFromForeignTable('type_uid','tx_mmhutinfo_type','name');
				if(is_array($result)) $result = implode(',', $result);
				break;

			case 'difficultytext':
				$internalfield = 'difficulty';
				$index = mmlib_extfrontend::getFieldContent($internalfield,$this->internal['currentRow'][$internalfield]);
				$result = trim($this->getBL($internalfield,$index));
				break;

			case 'area_image':
				$image = $this->getDataFromForeignTable('area_uid','tx_mmhutinfo_area','picture');
				if(is_array($image)) $image = implode(',', $image);
				$result = $this->getAutoFieldContent($fieldname,$image);
				break;

			case 'area_desc':
				$result = $this->getDataFromForeignTable('area_uid','tx_mmhutinfo_area','description');
				if(is_array($result)) $result = implode(',', $result);
				$result = $this->getAutoFieldContent($fieldname,$result);
				break;

			case 'hg_name':
				$result = $this->getDataFromForeignTable('hutguide_uid','tx_mmhutinfo_hutguide','name');
				if(is_array($result)) $result = implode(',', $result);
				break;

			case 'hg_description':
				$result = $this->getDataFromForeignTable('hutguide_uid','tx_mmhutinfo_hutguide','description');
				if(is_array($result)) $result = implode(',', $result);
				break;

			case 'hg_preview':
				$image = $this->getDataFromForeignTable('hutguide_uid','tx_mmhutinfo_hutguide','preview');
				if(is_array($image)) $image = implode(',', $image);
				$result = $this->getAutoFieldContent($fieldname,$image);
				break;

			case 'panorama':
				$image = $this->getDataFromForeignTable('hutguide_uid','tx_mmhutinfo_hutguide','panorama');
				if(is_array($image)) $image = implode(',', $image);
				$result = $this->getAutoFieldContent($fieldname,$image);
				break;

			case 'hg_link':
				$file = $this->getDataFromForeignTable('hutguide_uid','tx_mmhutinfo_hutguide','pdf');
				if(is_array($file)) $file = implode(',', $file);
				$result = $this->getAutoFieldContent($fieldname,$file);
				break;

			case 'editbutton':
				if($recursCheck == false) {;
					$recursCheck = true;
					$recordgroup = intval(mmlib_extfrontend::getFieldContent('fe_group'));
					if(isset($GLOBALS["TSFE"]->fe_user->user['usergroup']) && $recordgroup != 0) {
						$fegroup = $GLOBALS["TSFE"]->fe_user->user['usergroup'];
						if(t3lib_div::inList($fegroup,$recordgroup)) {
							$result = $this->_getColContents(0,false,'###EDIT_FORM###',array('editbutton'),1,true);
						}
					}
				}
				$recursCheck = false;
				break;

			case 'md5':
				$result = $this->getRecordMD5($this->getTableName(),mmlib_extfrontend::getFieldContent('pureuid'));
				if($result == null) $result = '';
				break;

			case 'touristregion':
				$result = $this->getDataFromForeignTable('touristregion_uid','tx_mmhutinfo_touristregion','name');
				if(is_array($result)) $result = implode(',', $result);
				break;

			case 'touristregdesc':
				$result = $this->getDataFromForeignTable('touristregion_uid','tx_mmhutinfo_touristregion','description');
				if(is_array($result)) $result = implode(',', $result);
				$result = $this->getAutoFieldContent($fieldname,$result);
				break;

			case 'touristreglink':
				$result = $this->getDataFromForeignTable('touristregion_uid','tx_mmhutinfo_touristregion','link');
				if(is_array($result)) $result = implode(',', $result);
				$result = $this->getAutoFieldContent($fieldname,$result);
				break;

			case 'touristregimage':
				$image = $this->getDataFromForeignTable('touristregion_uid','tx_mmhutinfo_touristregion','picture');
				if(is_array($image)) $image = implode(',', $image);
				$result = $this->getAutoFieldContent($fieldname,$image);
				break;

			case 'google':
				if(intval(mmlib_extfrontend::getFieldContent('google_longitude')) > 0 ||
					intval(mmlib_extfrontend::getFieldContent('google_latitude')) > 0) {
					$result = $this->_getColContents(0,false,'###GOOGLEBLOCK###',array('google'));
					}
				break;
			case 'openmarker':
				if(mmlib_extfrontend::getFieldContent('opendesc') != "") {
					$result = $this->_getColContents(0,false,'###OPENBLOCK###',array($fieldname));
					}
				break;
			case 'bedsmarker':
				if(mmlib_extfrontend::getFieldContent('bedsdesc') != "") {
					$result = $this->_getColContents(0,false,'###BEDSBLOCK###',array($fieldname));
					}
				break;
			case 'kitchenmarker':
				if(mmlib_extfrontend::getFieldContent('kitchen_description') != "") {
					$result = $this->_getColContents(0,false,'###KITCHENBLOCK###',array($fieldname));
					}
				break;
			case 'heightmarker':
				if(mmlib_extfrontend::getFieldContent('height') != "") {
					$result = $this->_getColContents(0,false,'###HEIGHTBLOCK###',array($fieldname));
					}
				break;


			case 'way1':
			case 'way2':
			case 'way3':
			case 'way4':
			case 'way5':
			case 'way6':
			case 'way7':
				$result = $this->getWayDescription($fieldname);
				break;

			default:
				$result = mmlib_extfrontend::getFieldContent($fieldname);
				break;
			}

	$this->mmlib_cache->setBuffer($fieldname,$result);
	return $result;
	}

	/**
	* Returns the content for the specific way
	*/
	function getWayDescription($fieldname) {
		static $wayRecurseCheck = array();

		$waynumber 	= intval(preg_replace("#\D*#",'',$fieldname));
		$content	= '';

		if(isset($wayRecurseCheck[$waynumber]) && $wayRecurseCheck[$waynumber] == true) return $content;
		$wayRecurseCheck[$waynumber] = true;

		// The name of the firstfield ist waydescription and not waydescription1
		if($waynumber == 1) $contentnumber = '';
		else $contentnumber = $waynumber;

		//t3lib_div::debug($waynumber,'$waynumber=');
		$content = $this->getFieldContent('waydescription' . $contentnumber);
		if(trim($content) != '') {
			$content = $this->_getColContents(0,false,'###WAYBLOCK' . $waynumber . '###',array('way1', 'way2','way3','way4','way5','way6','way7' ));
			//t3lib_div::debug($content,'$content=');
		}

		$wayRecurseCheck[$waynumber] = false;
		return $content;
	}

	function getSubTableLinkWidget($content,$localconf) {
		$conf = $localconf['localconf.'];
		$this->initPlugin($conf);

		//$uid = (isset($localconf['startuid']) ? $localconf['startuid'] : 0);
		//t3lib_div::debug($localconf,1);

		$tablename			= $conf['tablename'];
		$fieldname			= $conf['fieldname'];
		$filterfield		= $conf['filterfield'];
		$elementtype		= $conf['elementtype'];
		$firstentry			= $conf['firstcomboentry'];
		$label				= $conf['label'];
		$linkfield			= $conf['linkfield'];
		$linktarget			= $conf['linktarget'];
		$targetpageid		= $conf['targetpageid'];

		$entry2remove		= array();
		$tempEntry2remove 	= explode(',',$conf['entry2remove']);
		foreach($tempEntry2remove as $value) {
			$entry2remove[] = trim($value);
		}

		//t3lib_div::debug($conf,'$conf');

		return $this->createSubTableLinkWidget($tablename,$fieldname,$filterfield,$elementtype,$firstentry,$label,$entry2remove,$linkfield,$linktarget,$targetpageid);

		//return $this->createSubTableLinkWidget('tx_mmhutinfo_hutguide','name','hutguide_uid','combo');
	}

}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mm_hutinfo/pi1/class.tx_mmhutinfo_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mm_hutinfo/pi1/class.tx_mmhutinfo_pi1.php']);
}

?>