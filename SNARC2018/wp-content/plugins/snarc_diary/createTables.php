<?php 
//create the database tables at the start of the activation process
//Based in the admin folder, permissions has already been checked

if (!defined('ABSPATH')){
	exit;
	}
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

global $wpdb;
	
function acw_Prototype_createAllTables(){
	//Call this to create all the database tables

	
	$charset_collate = $wpdb->get_charset_collate();
	acw_Prototype_createdaditems( $charset_collate );
	acw_Prototype_creategiftboxes ( $charset_collate );
	acw_Prototype_creategiftboxesused( $charset_collate );
}
function acw_Prototype_deleteAllTables(){
	//Call this to drop all the database tables
	acw_Prototype_deletetable( "daditems" );
	acw_Prototype_deletetable( "giftboxes" );
	acw_Prototype_deletetable( "giftboxes_used" );
}

function acw_Prototype_createdaditems( $charset ){
	//create the acw_daditems table
	$tablename = $wpdb->prefix."daditems";
	$queryStr = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			productId varchar(15),
			reference varchar(10),
			productName varchar(30),
			imageSource varchar(30),
			price decimal(5,2),
			length decimal(5,2),
			width decimal(5, 2),
			ranking int(11),
			PRIMARY KEY (productId) )$charset;";
	dbDelta( $queryStr );	
}
function acw_Prototype_creategiftboxes( $charset ){
	//Create the giftboxes table
	$tablename = $wpdb->prefix."giftboxes";
	$queryStr = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			boxtype int(11),
			name varchar(5),
			unitlength int(11),
			unitwidth int(11),
			area int(11),
			ranking int(11)
			PRIMARY KEY (boxtype)
			)$charset;";
	dbDelta( $queryStr );			
}
function acw_Prototype_creategiftboxesused( $charset ){
	//Create the giftboxes_used table
	$tablename = $wpdb->prefix."giftboxes_used";
	$queryStr = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			visitorId varchar(33),
			boxtype int(11),
			PRIMARY KEY (visitorId)
			)$charset;";
	dbDelta( $queryStr );		
	
}

function acw_Prototype_deletetable( $targetTable ){
	//Drop the daditems table
	//Only call this on uninstall
	$tablename = $wpdb->prefix.$targetTable;
	$queryStr = "DROP TABLE ".$tablename;
	dbDelta( $queryStr );	
}



?>
