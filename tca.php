<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA["tx_mmhutinfo_hutguide"] = Array (
	"ctrl" => $TCA["tx_mmhutinfo_hutguide"]["ctrl"],
	"interface" => Array (
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,description,preview,pdf"
	),
	"feInterface" => $TCA["tx_mmhutinfo_hutguide"]["feInterface"],
	"columns" => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_hutguide',
				'foreign_table_where' => 'AND tx_mmhutinfo_hutguide.pid=###CURRENT_PID### AND tx_mmhutinfo_hutguide.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hutguide.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hutguide.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'preview' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hutguide.preview',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'show_thumbs' => 1,
			)
		),
		'pdf' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hutguide.pdf',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'pdf',
				'disallowed' => 'php,php3',
				'max_size' => 20000000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'panorama' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hutguide.panorama',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'show_thumbs' => 1,
			)
		),

	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], preview, pdf,panorama')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_mmhutinfo_extmap'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_extmap']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,publisher,mapnumber,description,isbn,preview'
	),
	'feInterface' => $TCA['tx_mmhutinfo_extmap']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_extmap',
				'foreign_table_where' => 'AND tx_mmhutinfo_extmap.pid=###CURRENT_PID### AND tx_mmhutinfo_extmap.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'publisher' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap.publisher',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'mapnumber' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap.mapnumber',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'isbn' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap.isbn',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'preview' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_extmap.preview',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, publisher, mapnumber, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], isbn, preview')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_mmhutinfo_area'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_area']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,description,picture'
	),
	'feInterface' => $TCA['tx_mmhutinfo_area']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_area',
				'foreign_table_where' => 'AND tx_mmhutinfo_area.pid=###CURRENT_PID### AND tx_mmhutinfo_area.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_area.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_area.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'picture' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_area.picture',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], picture')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);

$TCA['tx_mmhutinfo_touristregion'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_touristregion']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,description,picture'
	),
	'feInterface' => $TCA['tx_mmhutinfo_touristregion']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_touristregion',
				'foreign_table_where' => 'AND tx_mmhutinfo_touristregion.pid=###CURRENT_PID### AND tx_mmhutinfo_touristregion.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_touristregion.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_touristregion.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'link' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_touristregion.link',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
		         'wizards' => array(
					'link' => Array(
					    'type' => 'popup',
					    'title' => 'Link',
					    'icon' => 'link_popup.gif',
					    'script' => 'browse_links.php?mode=wizard',
					    'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
						),
		           ),
			  )
		),

		'picture' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_touristregion.picture',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 1500,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], link, picture')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);

$TCA['tx_mmhutinfo_property'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_property']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,description,symbol'
	),
	'feInterface' => $TCA['tx_mmhutinfo_property']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_property',
				'foreign_table_where' => 'AND tx_mmhutinfo_property.pid=###CURRENT_PID### AND tx_mmhutinfo_property.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_property.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_property.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'symbol' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_property.symbol',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], symbol')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_mmhutinfo_type'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_type']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,description'
	),
	'feInterface' => $TCA['tx_mmhutinfo_type']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_type',
				'foreign_table_where' => 'AND tx_mmhutinfo_type.pid=###CURRENT_PID### AND tx_mmhutinfo_type.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_type.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_type.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts]')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_mmhutinfo_province'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_province']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,description,country,image'
	),
	'feInterface' => $TCA['tx_mmhutinfo_province']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_province',
				'foreign_table_where' => 'AND tx_mmhutinfo_province.pid=###CURRENT_PID### AND tx_mmhutinfo_province.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_province.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_province.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'country' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_province.country',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'image' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_province.image',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array (
		'0' => Array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, name, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], country, image')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);


$TCA['tx_mmhutinfo_hut'] = Array (
	'ctrl' => $TCA['tx_mmhutinfo_hut']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,starttime,endtime,fe_group,name,description,type_uid,property_uid,map_uid,hutguide_uid,company,person,tel1,fax,mobile,street,city,province_uid,area_uid,google_longitude,google_latitude,google_description,kitchen_description,height,open,beds,camp,waydescription,difficulty,walkingtime_min,length_km,altitude,free1,free2,free3,copyright,readyforprint'
	),
	'feInterface' => $TCA['tx_mmhutinfo_hut']['feInterface'],
	'columns' => Array (
		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tx_mmhutinfo_hut',
				'foreign_table_where' => 'AND tx_mmhutinfo_hut.pid=###CURRENT_PID### AND tx_mmhutinfo_hut.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array (
			'config' => Array (
				'type' => 'passthrough'
			)
		),
		'hidden' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'starttime' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'default' => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => Array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'checkbox' => '0',
				'default' => '0',
				'range' => Array (
					'upper' => mktime(0,0,0,12,31,2020),
					'lower' => mktime(0,0,0,date('m')-1,date('d'),date('Y'))
				)
			)
		),
		'fe_group' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
					Array('LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login', -1),
					Array('LLL:EXT:lang/locallang_general.xml:LGL.any_login', -2),
					Array('LLL:EXT:lang/locallang_general.xml:LGL.usergroups', '--div--')
				),
				'foreign_table' => 'fe_groups',
				'foreign_table_where' => 'ORDER BY title asc'
			)
		),
		'prioritize' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.prioritize',
			'config' => Array (
				'type' => 'check',
			)
		),
		'name' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.name',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'number' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.number',
			'config' => Array (
				'type' => 'input',
				'size' => '5',
				'eval' => 'num',
			)
		),

		'colorcode' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.colorcode',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
		         'wizards' => array(
		               'colorpick' => array(
		                   'type' => 'colorbox',
		                   'title' => 'Color picker',
		                   'script' => 'wizard_colorpicker.php',
		                  'dim' => '20x20',
		                  'tableStyle' => 'border: solid 1px black; margin-left: 20px;',
		                  'JSopenParams' => 'height=550,width=365,status=0,menubar=0,scrollbars=1',
		                 'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
		               ),
		           ),
			)
		),

		'description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'type_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.type_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_type',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_type.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_type',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'property_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.property_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_property',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_property.uid',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 99,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_property',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'hcity' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.city',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'map_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.map_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_extmap',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_extmap.uid',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 2,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_extmap',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'hutguide_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.hutguide_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_hutguide',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_hutguide.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_hutguide',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'company' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.company',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'person' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.person',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'tel1' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tel1',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'tel2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tel2',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'tel3' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tel3',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'fax1' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.fax1',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'fax2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.fax2',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'mobile1' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.mobile1',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'mobile2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.mobile2',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'email1' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.email1',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'email1' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.email1',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'email2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.email2',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'web' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.web',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'street' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.street',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'areacode' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.areacode',
			'config' => Array (
				'type' => 'input',
				'size' => '10',
			)
		),
		'city' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.city',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)

		),
		'province_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.province_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_province',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_province.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_province',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'area_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.area_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_area',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_area.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_area',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'touristregion_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.touristregion_uid',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'tx_mmhutinfo_touristregion',
				'foreign_table_where' => 'ORDER BY tx_mmhutinfo_touristregion.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_mmhutinfo_touristregion',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),

		'google_longitude' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.google_longitude',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'nospace',
			)
		),
		'google_latitude' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.google_latitude',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'nospace',
			)
		),
		'google_description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.google_description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'kitchen_description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.kitchen_description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'height' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.height',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'opendesc' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.opendesc',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'bedsdesc' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.bedsdesc',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),

		'beds' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.beds',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'int,nospace',
			)
		),
		'camp' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.camp',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'int,nospace',
			)
		),
		'waydescription' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'difficulty' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.difficulty',
			'config' => Array (
				'type' => 'radio',
				'items' => Array (
					Array('LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.difficulty.I.0', '0'),
					Array('LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.difficulty.I.1', '1'),
					Array('LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.difficulty.I.2', '2'),
					Array('LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.difficulty.I.3', '3'),
				),
			)
		),
		'walkingtime' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.walkingtime',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'length' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.length',
			'config' => Array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'altitude' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.altitude',
			'config' => Array (
				'type' => 'input',
				'size' => '4',
				'max' => '4',
				'eval' => 'int',
				'checkbox' => '0',
				'range' => Array (
					'upper' => '1000',
					'lower' => '10'
				),
				'default' => 0
			)
		),
		'waydescription2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription2',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'waydescription3' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription3',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'waydescription4' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription4',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'waydescription5' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription5',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'waydescription6' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription6',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'waydescription7' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.waydescription7',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
			)
		),
		'imageway' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.imageway',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 8,
				'minitems' => 0,
				'maxitems' => 5,
				'show_thumbs' => 1,
			)
		),
		'free1' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.free1',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'free2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.free2',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'free3' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.free3',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'copyright' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.copyright',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'readyforprint' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.readyforprint',
			'config' => Array (
				'type' => 'check',
			)
		),

		'image' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.image',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 3,
				'minitems' => 0,
				'maxitems' => 3,
				'show_thumbs' => 1,
			)
		),
		'image2' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.image2',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 3000,
				'uploadfolder' => 'uploads/tx_mmhutinfo',
				'size' => 8,
				'minitems' => 0,
				'maxitems' => 5,
				'show_thumbs' => 1,
			)
		),
		'image2description' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.image2description',
			'config' => Array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),

	),
	// http://typo3.org/documentation/document-library/core-documentation/doc_core_api/4.0.0/view/4/2/
	// http://typo3.org/documentation/document-library/core-documentation/doc_core_api/4.0.0/view/4/4/
	// Ganz unten - showitem
	'types' => Array (
		'0' => Array('showitem' => '
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.geneneral,
		sys_language_uid;;;;1-1-1,
		l18n_parent,
		l18n_diffsource,
		hidden;;1,
		prioritize,
		name,
		number,
		colorcode,
		type_uid;;;;1-1-1,
		description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		opendesc,
		property_uid,
		hcity;;;;1-1-1,
		province_uid,
		area_uid,
		touristregion_uid,
		hutguide_uid,
		map_uid,
		height;;;;1-1-1,
		open,
		bedsdesc,
		beds,
		camp,
		image,
		image2,
		image2description,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.kitchen,
		kitchen_description,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.huttel,
		person,
		tel1,
		fax1,
		mobile1,
		email1,
		web,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.owner,
		company;;;;1-1-1,
		tel2,
		tel3,
		fax2,
		mobile2,
		email2,
		street,
		areacode,
		city,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.google,
		google_longitude;;;;1-1-1,
		google_latitude,
		google_description,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.waydescription,
		waydescription;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts];1-1-1,
		difficulty,
		walkingtime,
		length,
		altitude,
		waydescription2;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		waydescription3;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		waydescription4;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		waydescription5;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		waydescription6;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		waydescription7;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts],
		imageway,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.freefields,
		free1;;;;1-1-1,
		free2,
		free3,
		--div--;LLL:EXT:mm_hutinfo/locallang_db.xml:tx_mmhutinfo_hut.tab.misc,
		copyright;;;;1-1-1,
		readyforprint
		')
	),
	'palettes' => Array (
		'1' => Array('showitem' => 'starttime, endtime, fe_group')
	)
);
$TCA['tx_mmhutinfo_hut']['ctrl']['dividers2tabs'] = 1;

?>