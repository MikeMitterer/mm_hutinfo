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
require_once(PATH_tslib.'class.tslib_pibase.php');

class tx_mmhutinfo_pi2 extends mmlib_extfrontend {
	var $prefixId 		= 'tx_mmhutinfo_pi2';		// Same as class name
	var $scriptRelPath 	= 'pi2/class.tx_mmhutinfo_pi2.php';	// Path to this script relative to the extension dir.
	var $pi_checkCHash 	= TRUE;
	
	
	/**
	 * Main method of your PlugIn
	 *
	 * @param	string		$content: The content of the PlugIn
	 * @param	array		$conf: The PlugIn Configuration
	 * @return	The content that should be displayed on the website
	 */
	function main($content,$conf)	{
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
					
				'google_centerpos_long.' 		=> array (
					'value'	=> 'sMAIN:google_centerpos_long',
					),
				'google_centerpos_lat.' 		=> array (
					'value'	=> 'sMAIN:google_centerpos_lat',
					),
				'google_centerpos_zoom.' 		=> array (
					'value'	=> 'sMAIN:google_centerpos_zoom',
					),
					
				'google_width.' 		=> array (
					'value'	=> 'sMAIN:google_width',
					),
					
				'google_height.' 		=> array (
					'value'	=> 'sMAIN:google_height',
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
		
		$SQL['select'] 				= 'tx_mmhutinfo_hut.*';
		$SQL['from']				= 'tx_mmhutinfo_hut';
		$SQL['order_by']			= ''; // Defaultsettings are made in setup.txt (order)
		$SQL['group_by']			= '';
    	//$SQL['limit']				= ($pointer * $results_at_a_time) . ',' . $results_at_a_time;
		
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
		
		$WHERE['google']			= "google_longitude > 0.0 and google_latitude > 0.0";
		
		// Show alwayes all records, independ of the fe_group settings
		$WHERE['enable_fields']		= $this->enableFields($this->getTableName(),null,$showHidden,array('fe_group'));
		//$WHERE['showuid']			= $this->piVars['showUID'] ? "AND tx_dam.uid='" . $this->piVars['showUID'] . "''" : '';
		$WHERE['statement']			= $strWhereStatement;
		
		//t3lib_div::debug($WHERE,'where');
		
		$SQL['where']				= $this->implodeWithoutBlankPiece('AND ',$WHERE);
		
		$showLastQuery = false;
		if($showLastQuery) {
			$GLOBALS['TYPO3_DB']->debugOutput = true;
			$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;
		}
		
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			$SQL['select'],
			$SQL['from'],
			$SQL['where'],             
			$SQL['group_by'],
			$SQL['order_by'],
			$SQL['limit']
			);	

		if($showLastQuery) t3lib_div::debug($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery,"lastBuiltQuery=");			

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
			case "google_centerpos_long":
			case "google_centerpos_lat":
			case "google_centerpos_zoom":
				$result = mmlib_extfrontend::getFieldContent($fieldname);
				//t3lib_div::debug($result,$fieldname);
				break;
				
			case "name":
				$result = mmlib_extfrontend::getFieldContent($fieldname);
				
				$singlePid = 0;
				if(isset($this->conf['singlePid']) && $this->conf['singlePid'] != '') $singlePid = $this->conf['singlePid'];
				
				$result = $this->pi_linkTP($result,
					array("tx_mmhutinfo_pi1[showUid]" => $this->internal['currentRow']['uid']),
					$this->allowCaching,$singlePid);
				
				//t3lib_div::debug($result,$fieldname);
				break;	
					
			default:
				$result = mmlib_extfrontend::getFieldContent($fieldname);
				break;
			}
	
	$this->mmlib_cache->setBuffer($fieldname,$result);
	return $result;
	}
	
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mm_hutinfo/pi2/class.tx_mmhutinfo_pi2.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/mm_hutinfo/pi2/class.tx_mmhutinfo_pi2.php']);
}

?>