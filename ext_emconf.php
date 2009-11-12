<?php

########################################################################
# Extension Manager/Repository config file for ext: "mm_hutinfo"
#
# Auto generated 02-07-2008 16:42
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Hut-Manager',
	'description' => 'Gives informations about hut\'s or cottages',
	'category' => 'plugin',
	'author' => 'Mike Mitterer',
	'author_email' => 'office@bitcon.at',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:74:{s:9:"ChangeLog";s:4:"cf18";s:10:"README.txt";s:4:"9fa9";s:9:"Thumbs.db";s:4:"c3dc";s:12:"ext_icon.gif";s:4:"1bdc";s:17:"ext_localconf.php";s:4:"8236";s:14:"ext_tables.php";s:4:"15db";s:14:"ext_tables.sql";s:4:"5b0f";s:19:"flexform_ds_pi1.xml";s:4:"3694";s:26:"icon_tx_mmhutinfo_area.gif";s:4:"475a";s:28:"icon_tx_mmhutinfo_extmap.gif";s:4:"475a";s:25:"icon_tx_mmhutinfo_hut.gif";s:4:"475a";s:30:"icon_tx_mmhutinfo_hutguide.gif";s:4:"475a";s:30:"icon_tx_mmhutinfo_property.gif";s:4:"475a";s:30:"icon_tx_mmhutinfo_province.gif";s:4:"475a";s:35:"icon_tx_mmhutinfo_touristregion.gif";s:4:"475a";s:26:"icon_tx_mmhutinfo_type.gif";s:4:"475a";s:30:"icon_tx_mmhutinfo_windrose.gif";s:4:"87e2";s:16:"locallang_db.xml";s:4:"2d29";s:7:"tca.php";s:4:"3b72";s:28:"doc/FirstStepsWithPlugin.txt";s:4:"3341";s:26:"doc/SQL-ImportCommands.txt";s:4:"4ec0";s:27:"doc/datenuebernahme.sql.txt";s:4:"0f5f";s:28:"doc/datenuebernahme1.sql.txt";s:4:"d2b8";s:33:"doc/generate_feusers_fegroups.txt";s:4:"85d8";s:14:"doc/manual.sxw";s:4:"e376";s:19:"doc/wizard_form.dat";s:4:"441a";s:20:"doc/wizard_form.html";s:4:"d121";s:30:"pi1/class.tx_mmhutinfo_pi1.php";s:4:"5d36";s:17:"pi1/locallang.xml";s:4:"de0b";s:24:"pi1/static/editorcfg.txt";s:4:"3046";s:20:"pi1/static/setup.txt";s:4:"33c9";s:33:"pi1/static/mailformplus/setup.txt";s:4:"a06b";s:22:"pi1/res/list_view.html";s:4:"b6e2";s:42:"pi1/res/single_view-mit altem kontakt.html";s:4:"22bc";s:35:"pi1/res/single_view-mit-google.html";s:4:"c4f9";s:24:"pi1/res/single_view.html";s:4:"095b";s:23:"pi1/res/css/hutinfo.css";s:4:"ffeb";s:24:"pi1/res/css/mailform.css";s:4:"5836";s:22:"pi1/res/css/tabber.css";s:4:"a4c1";s:28:"pi1/res/javascript/tabber.js";s:4:"0b1e";s:35:"pi1/res/mailformplus/form_edit.html";s:4:"b2c2";s:36:"pi1/res/mailformplus/translation.php";s:4:"9f88";s:24:"pi1/res/images/Thumbs.db";s:4:"968d";s:33:"pi1/res/images/background_rc3.gif";s:4:"d124";s:33:"pi1/res/images/background_rc4.gif";s:4:"240a";s:28:"pi1/res/images/dot_gruen.gif";s:4:"71b5";s:30:"pi1/res/images/icon_betten.gif";s:4:"79c8";s:29:"pi1/res/images/icon_brief.gif";s:4:"91da";s:30:"pi1/res/images/icon_kueche.gif";s:4:"e71e";s:29:"pi1/res/images/icon_offen.gif";s:4:"373c";s:31:"pi1/res/images/icon_telefon.gif";s:4:"5f76";s:28:"pi1/res/images/icon_way1.gif";s:4:"1833";s:28:"pi1/res/images/icon_way2.gif";s:4:"a25f";s:28:"pi1/res/images/icon_way3.gif";s:4:"612b";s:28:"pi1/res/images/icon_way4.gif";s:4:"5731";s:32:"pi1/res/images/icon_windrose.gif";s:4:"87e2";s:34:"pi1/res/images/corner2/corner.html";s:4:"23a0";s:43:"pi1/res/images/corner2/images/corner_01.gif";s:4:"926a";s:43:"pi1/res/images/corner2/images/corner_02.gif";s:4:"55d9";s:43:"pi1/res/images/corner2/images/corner_03.gif";s:4:"651a";s:43:"pi1/res/images/corner2/images/corner_04.gif";s:4:"71f2";s:30:"pi1/res/images/corner/box.html";s:4:"bbfc";s:42:"pi1/res/images/corner/images/corner_01.gif";s:4:"a184";s:42:"pi1/res/images/corner/images/corner_02.gif";s:4:"4cfa";s:42:"pi1/res/images/corner/images/corner_03.gif";s:4:"2dee";s:42:"pi1/res/images/corner/images/corner_04.gif";s:4:"d12d";s:27:"pi1/res/images/box/box.html";s:4:"bbfc";s:36:"pi1/res/images/box/images/box_01.gif";s:4:"6060";s:36:"pi1/res/images/box/images/box_02.gif";s:4:"8411";s:36:"pi1/res/images/box/images/box_03.gif";s:4:"8244";s:36:"pi1/res/images/box/images/box_04.gif";s:4:"d9b1";s:21:"ExtData/PShop/box.psd";s:4:"3546";s:23:"ExtData/PShop/icons.psd";s:4:"0d67";s:29:"ExtData/PShop/icons_klein.psd";s:4:"fe42";}',
	'suggests' => array(
	),
);

?>