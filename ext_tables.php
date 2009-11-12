<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_hutguide");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_hutguide");

$TCA["tx_mmhutinfo_hutguide"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hutguide',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
//		"default_sortby" => "ORDER BY crdate",
		"sortby" => "sorting",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_hutguide.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, description, preview, pdf",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_extmap");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_extmap");

$TCA["tx_mmhutinfo_extmap"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
		"default_sortby" => "ORDER BY crdate",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_extmap.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, publisher, mapnumber, description, isbn, preview",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_area");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_area");

$TCA["tx_mmhutinfo_area"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_area',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
		"sortby" => "sorting",	
		//"default_sortby" => "ORDER BY crdate",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_area.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, description, picture",
	)
);

t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_touristregion");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_touristregion");

$TCA["tx_mmhutinfo_touristregion"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_touristregion',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
		"sortby" => "sorting",	
//		"default_sortby" => "ORDER BY crdate",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_touristregion.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, description, picture",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_property");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_property");

$TCA["tx_mmhutinfo_property"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_property',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
		"sortby" => "sorting",	
//		"default_sortby" => "ORDER BY crdate",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_property.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, description, symbol",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_type");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_type");

$TCA["tx_mmhutinfo_type"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_type',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
		"default_sortby" => "ORDER BY name",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_type.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, description",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_province");


t3lib_extMgm::addToInsertRecords("tx_mmhutinfo_province");

$TCA["tx_mmhutinfo_province"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_province',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
//		"default_sortby" => "ORDER BY crdate",	
		"sortby" => "sorting",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_province.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, name, description, country, image",
	)
);


t3lib_extMgm::allowTableOnStandardPages("tx_mmhutinfo_hut");

$TCA["tx_mmhutinfo_hut"] = Array (
	"ctrl" => Array (
		'title' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut',		
		'label' => 'name',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',	
		'transOrigPointerField' => 'l18n_parent',	
		'transOrigDiffSourceField' => 'l18n_diffsource',	
		"default_sortby" => "ORDER BY name",	
		"delete" => "deleted",	
		"enablecolumns" => Array (		
			"disabled" => "hidden",	
			"starttime" => "starttime",	
			"endtime" => "endtime",	
			"fe_group" => "fe_group",
		),
		"dynamicConfigFile" => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		"iconfile" => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_mmhutinfo_hut.gif",
	),
	"feInterface" => Array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, starttime, endtime, fe_group, name, description, hcity, type_uid, property_uid, map_uid, hutguide_uid, image, company, person, tel1, tel2, tel3, fax1, fax2, mobile1, mobile2, email1, email2, web, street, areacode, city, province_uid, area_uid, google_longitude, google_latitude, google_description, kitchen_description, height, opendesc, beds, camp, waydescription, difficulty, walkingtime, length, altitude, waydescription2, waydescription3, waydescription4, waydescription5, free1, free2, free3, copyright, readyforprint",
	)
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';


t3lib_extMgm::addPlugin(Array('LLL:EXT:mm_hutinfo/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');


t3lib_extMgm::addStaticFile($_EXTKEY,'pi1/static/','MM Hut-Manager');
t3lib_extMgm::addStaticFile($_EXTKEY,'pi1/static/mailformplus/','MM Hut-Manager-Mailform settings');

// add FlexForm field to tt_content
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY."_pi1"]='pi_flexform';

t3lib_extMgm::addPiFlexFormValue($_EXTKEY."_pi1", 'FILE:EXT:mm_hutinfo/flexform_ds_pi1.xml');

?>