#
# Table structure for table 'tx_mccookie_domain_model_cookie'
#
CREATE TABLE tx_mccookie_domain_model_cookie (

	message text,
	text_mehr_informationen varchar(255) DEFAULT '' NOT NULL,
	button_message varchar(255) DEFAULT '' NOT NULL,
	pid_data_privacy int(11) DEFAULT '0' NOT NULL,
	message_youtube text,
	text_mehr_informationen_youtube varchar(255) DEFAULT '' NOT NULL,
	button_message_youtube varchar(255) DEFAULT '' NOT NULL,
	pid_data_privacy_youtube int(11) DEFAULT '0' NOT NULL

);
