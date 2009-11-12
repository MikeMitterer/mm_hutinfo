<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_hutguide=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_extmap=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_area=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_property=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_type=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_province=1
');
t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_mmhutinfo_hut=1
');

  ## Extending TypoScript from static template uid=43 to set up userdefined tag:
t3lib_extMgm::addTypoScript($_EXTKEY,'editorcfg','
	tt_content.CSS_editor.ch.tx_mmhutinfo_pi1 = < plugin.tx_mmhutinfo_pi1.CSS_editor
',43);


t3lib_extMgm::addPItoST43($_EXTKEY,'pi1/class.tx_mmhutinfo_pi1.php','_pi1','list_type',1);


t3lib_extMgm::addTypoScript($_EXTKEY,'setup','
	tt_content.shortcut.20.0.conf.tx_mmhutinfo_hut = < plugin.'.t3lib_extMgm::getCN($_EXTKEY).'_pi1
	tt_content.shortcut.20.0.conf.tx_mmhutinfo_hut.CMD = singleView
',43);
?>