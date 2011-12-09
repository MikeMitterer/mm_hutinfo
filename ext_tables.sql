#
# Table structure for table 'tx_mmhutinfo_hutguide'
#
CREATE TABLE tx_mmhutinfo_hutguide (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	description text NOT NULL,
	preview blob NOT NULL,
	pdf blob NOT NULL,
	panorama blob NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_mmhutinfo_extmap'
#
CREATE TABLE tx_mmhutinfo_extmap (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	publisher tinytext NOT NULL,
	mapnumber tinytext NOT NULL,
	description text NOT NULL,
	isbn tinytext NOT NULL,
	preview blob NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_mmhutinfo_area'
#
CREATE TABLE tx_mmhutinfo_area (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	description text NOT NULL,
	picture blob NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_mmhutinfo_touristregion'
#
CREATE TABLE tx_mmhutinfo_touristregion (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	description text NOT NULL,
	picture blob NOT NULL,
	link tinytext NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'tx_mmhutinfo_property'
#
CREATE TABLE tx_mmhutinfo_property (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	description text NOT NULL,
	symbol blob NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_mmhutinfo_type'
#
CREATE TABLE tx_mmhutinfo_type (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	description text NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_mmhutinfo_province'
#
CREATE TABLE tx_mmhutinfo_province (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	description text NOT NULL,
	country tinytext NOT NULL,
	image blob NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);



#
# Table structure for table 'tx_mmhutinfo_hut'
#
CREATE TABLE tx_mmhutinfo_hut (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	fe_group int(11) DEFAULT '0' NOT NULL,
	prioritize tinyint(3) DEFAULT '0' NOT NULL,
	name tinytext NOT NULL,
	number tinytext NOT NULL,
	colorcode tinytext NOT NULL,
	description text NOT NULL,
	type_uid int(11) DEFAULT '0' NOT NULL,
	property_uid blob NOT NULL,
	map_uid blob NOT NULL,
	hutguide_uid int(11) DEFAULT '0' NOT NULL,
	hcity tinytext NOT NULL,
	company tinytext NOT NULL,
	person tinytext NOT NULL,
	tel1 tinytext NOT NULL,
	tel2 tinytext NOT NULL,
	tel3 tinytext NOT NULL,
	fax1 tinytext NOT NULL,
	fax2 tinytext NOT NULL,
	mobile1 tinytext NOT NULL,
	mobile2 tinytext NOT NULL,
	email1 tinytext NOT NULL,
	email2 tinytext NOT NULL,
	web tinytext NOT NULL,
	street tinytext NOT NULL,
	areacode tinytext NOT NULL,
	city tinytext NOT NULL,
	province_uid int(11) DEFAULT '0' NOT NULL,
	area_uid int(11) DEFAULT '0' NOT NULL,
	touristregion_uid int(11) DEFAULT '0' NOT NULL,
	google_longitude tinytext NOT NULL,
	google_latitude tinytext NOT NULL,
	google_description text NOT NULL,
	kitchen_description text NOT NULL,
	height tinytext NOT NULL,
	opendesc tinytext NOT NULL,
	bedsdesc tinytext NOT NULL,
	beds int(11) DEFAULT '0' NOT NULL,
	camp int(11) DEFAULT '0' NOT NULL,

	waydescription text NOT NULL,
	difficulty int(11) DEFAULT '0' NOT NULL,
	walkingtime tinytext NOT NULL,
	length tinytext NOT NULL,
	altitude int(11) DEFAULT '0' NOT NULL,

	waydescription2 text NOT NULL,
	waydescription3 text NOT NULL,
	waydescription4 text NOT NULL,
	waydescription5 text NOT NULL,
	waydescription6 text NOT NULL,
	waydescription7 text NOT NULL,
	imageway blob NOT NULL,

	free1 text NOT NULL,
	free2 text NOT NULL,
	free3 text NOT NULL,
	copyright text NOT NULL,
	readyforprint tinyint(3) DEFAULT '0' NOT NULL,

	image blob NOT NULL,
	image2 blob NOT NULL,
	image2description text NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
#	,KEY name
);
