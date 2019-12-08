<?php 
//create the database tables at the start of the activation process
//Based in the admin folder, permissions has already been checked

if (!defined('ABSPATH')){
	exit;
	}
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

global $wpdb;
	
function hmklogin_createAllTables(){
	//Call this to create all the database tables
	
	$charset_collate = $wpdb->get_charset_collate();
	hmklogin_createMembers( $charset_collate );
	hmklogin_createPositions ( $charset_collate );

}
function hmklogin_deleteAllTables(){
	//Call this to drop all the database tables
	hmklogin_deletetable( "members" );

}

function hmklogin_createMembers( $charset ){
	//create the members table
	$tablename = $wpdb->prefix."members";
	$queryStr = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			member_ref int(11),
			callsign tinytext,
			firstname tinytext,
			surname tinytext,
			position int(11),
			admin tinyint(1),
			email tinytext,
			contact tinytext,
			locator tinytext,
			PRIMARY KEY (member_ref) )$charset;";
	dbDelta( $queryStr );	
}
function hmklogin_createPositions ( $charset ){
	//create the Positions table
	$tablename = $wpdb->prefix."positions";
	$queryStr = "CREATE TABLE IF NOT EXISTS ".$tablename."(
			position_ref int(11),
			position tinytext,
			role tinytext,
			PRIMARY KEY (position_ref) )$charset;";
	dbDelta( $queryStr );	
}

function hmklogin_insertPositions(){
	//Inserts the standard positions and roles into positions table
	$tablename = $wpdb->prefix."positions";
	
		
	
	
}



function hmklogin_deletetable( $targetTable ){
	//Drop the table
	//Only call this on uninstall
	$tablename = $wpdb->prefix.$targetTable;
	$queryStr = "DROP TABLE ".$tablename;
	dbDelta( $queryStr );	
}



?>
