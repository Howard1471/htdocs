<?php
global $DiaryDate, $DiaryTitle, $DiaryText;
global $NewsDate, $NewsTitle, $NewsText, $NewsReporter;
global $host,$user,$pwd,$DBname,$Connect_status;
global $Sitename, $username;
global $Callsign, $Firstname, $Surname, $Position, $Email, $Contact, $Admin_Status, $locator;
global $ArticleRef, $DocTitle, $UploadFile, $DocAuthor, $ArticleDate, $ArticleLive, $TempFile, $OldFilename, $NewFileToUpload;
global $EventRef, $EventName, $UploadFile, $Sponsor, $SEventDate, $SEventLive, $TempFile;
global $HyperlinkRef, $HyperlinkTitle, $Hyperlink, $HyperlinkBy, $HyperlinkWhen, $HyperlinkVisible;
global $Acallsign, $Aheadline1, $Atext1, $Aheadline2, $Atext2, $Aheadline3, $Atext3, $Aheadline4, $Atext4;

class Snarc_Database
{


	protected $host = "localhost";
	protected $user = "howkee33_dbase";
	protected $pwd = "R@d10Clu65";
	protected $dbName = "howkee33_dbase";
	protected $Connect_status = false;
	protected $link;
	protected $db_Selection;

	protected $Sitename = "snarc";

	public function __construct()
	{
		$this->ConnectToTable();
	}

	/***********************************************************************************************/
	protected function ConnectToTable()
	{

		$Connect_status = false;
		//Connect to database
		try {
			$this->link = mysqli_connect($this->host, $this->user, $this->pwd, $this->dbName);
		} catch ( mysqli_sql_exception $e){
			dd("Failed to open the database Connection");
		}

		try {
			$db_Selection = mysqli_select_db($this->dbName);
		} catch ( mysqli_sql_exception $e ){
		dd("Failed to select the database");
	}

		if (!@mysql_select_db($DBname)) {
			header("Location: ../Error_Trap.php?Errno=2");
			exit;
		} else { //Database connection ok, connect to user table
			$Connect_status = true;
		}//end of else
	}

	function CheckUserLogin()
	{
		global $username, $password, $accesslevel, $token;

		$QueryStr = "SELECT * FROM `snarc_admins`  WHERE username = '" . $username . "'";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //No matching user has been found
		{
			header("Location: ../Error_Trap.php?Errno=30");
			exit;
		} else //From here onwards the user is validated
		{
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//ValidatePassword( $username, $password )
				//if ( $password != $row[1] ) //Users Password does not match
				if (!ValidatePassword($username, $password)) {
					header("Location: ../Error_Trap.php?Errno=3");
					exit;
				} else {
					$accesslevel = $row[2];
					$token = $row[3];
				}
			}//end of while loop
			$user_array = array('user_id' => $username, 'token_id' => $token);
			session_start();
			$_SESSION['user_token'] = $user_array;
		}//end of else
	}

	function Checktoken()
	{
		global $host, $user, $pwd, $DBname, $Connect_status;
	}
	/***********************************************************************************************/
// About Page specific functions
	/***********************************************************************************************/

	/*CREATE TABLE snarc_about ( Acallsign TINYTEXT Aheadline1 TINYTEXT, Atext1 LONGTEXT, Aheadline2 TINYTEXT, Atext2 LONGTEXT, Aheadline3 TINYTEXT, Atext3 LONGTEXT, Aheadline4 TINYTEXT, Atext4 LONGTEXT, );
    */
	function getAboutentry($Target)
	{
		global $Acallsign, $Aheadline1, $Atext1, $Aheadline2, $Atext2, $Aheadline3, $Atext3, $Aheadline4, $Atext4;
		global $Sitename;

		$QueryStr = "SELECT * FROM " . $Sitename . "_" . $Target;
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			echo "\nDEBUG getAboutEntry('" . $Target . "') : Query returned FALSE - nothing found.";
			exit();
			$Acallsign = "No Callsign";
			$Aheadline1 = "Nothing Recorded";
			$Atext1 = "Nothing Recorded";
			$Aheadline2 = "Nothing Recorded";
			$Atext2 = "Nothing Recorded";
			$Aheadline3 = "Nothing Recorded";
			$Atext3 = "Nothing Recorded";
			$Aheadline4 = "Nothing Recorded";
			$Atext4 = "Nothing Recorded";
			//CreateAboutEntry($Target);
		} else {
			if (mysql_num_rows($result) != 1) {
				//echo "\nDEBUG getAboutEntry('".$Target."') : Query returned TRUE but no rows - nothing Recorded.";
				//exit();
				$Acallsign = "No Callsign";
				$Aheadline1 = "Nothing Recorded";
				$Atext1 = "Nothing Recorded";
				$Aheadline2 = "Nothing Recorded";
				$Atext2 = "Nothing Recorded";
				$Aheadline3 = "Nothing Recorded";
				$Atext3 = "Nothing Recorded";
				$Aheadline4 = "Nothing Recorded";
				$Atext4 = "Nothing Recorded";
				CreateAboutEntry($Target);
			} else {
				//echo "\nDEBUG getAboutEntry('".$Target."') : Query returned TRUE but no entries - entry found.";
				//exit();
				while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
					//Entry-ref is not read in
					$Acallsign = $row[1];
					$Aheadline1 = $row[2];
					$Atext1 = $row[3];
					$Aheadline2 = $row[4];
					$Atext2 = $row[5];
					$Aheadline3 = $row[6];
					$Atext3 = $row[7];
					$Aheadline4 = $row[8];
					$Atext4 = $row[9];
				}//end of while loop
			}
		}
	}

	function UpdateAboutentry($Target)
	{
//Update the about/home entry with new values
		global $Acallsign, $Aheadline1, $Atext1, $Aheadline2, $Atext2, $Aheadline3, $Atext3, $Aheadline4, $Atext4;
		global $Sitename;

		/* Entry_ref, Acallsign, Aheadline1, Atext1, Aheadline2, Atext2, Aheadline3, Atext3, Aheadline4, Atext4 */

		$QueryStr = "UPDATE " . $Sitename . "_" . $Target . " SET  Acallsign='" . $Acallsign . "',Aheadline1='" . $Aheadline1 . "',Atext1='" . $Atext1 . "',Aheadline2='" . $Aheadline2 . "',Atext2='" . $Atext2 . "',Aheadline3='" . $Aheadline3 . "',Atext3='" . $Atext3 . "',Aheadline4='" . $Aheadline4 . "',Atext4='" . $Atext4 . "' WHERE Entry_ref = 1";
		//UpdateAboutEntry();
		//'exit();
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			header("Location: ../Error_Trap.php?Errno=20");
		} else {
			//Get the data back and display it
			//echo "<br>Diary Updated, Getting details from Database<br>";
			getAboutentry($Target);
		}
	}

	/***********************************************************************************************************************/
	function CreateAboutEntry($Target)
	{
		//The initial table entry must be present in order to read/update later
		global $Acallsign, $Aheadline1, $Atext1, $Aheadline2, $Atext2, $Aheadline3, $Atext3, $Aheadline4, $Atext4;
		global $Sitename;

		$QueryStr = "INSERT INTO " . $Sitename . "_" . $Target . " VALUES ( 1,'" . $Acallsign . "', '" . $Aheadline1 . "', '" . $Atext1 . "', '" . $Aheadline2 . "', '" . $Atext2 . "', '" . $Aheadline3 . "', '" . $Atext3 . "', '" . $Aheadline4 . "', '" . $Atext4 . "')";
		$result = mysql_query($QueryStr);
		if ($result == false) {
			header("Location: ../Error_Trap.php?Errno=85");
			exit();
		}

		return $result;
	}
	/***********************************************************************************************/
// Diary specific functions
	/***********************************************************************************************/
	function getdiaryentry()
	{
		global $DiaryDate, $DiaryTitle, $DiaryText;

		/* Get the current Diary details from the database **/
		$QueryStr = "SELECT * FROM `snarc_diary`";
		$result = mysql_query($QueryStr);

		if ($result == FALSE) //Nothing returned.
		{
			$DiaryText = "Nothing recorded";
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				$DiaryDate = $row[1];
				$DiaryTitle = $row[2];
				$DiaryText = $row[3];
				//$new_text = str_replace("'", "\'", $row[3]);
				//$new_text = str_replace("-", "\-", $new_text);
			}//end of while loop
		}
	}

	function UpdateDiary()
	{
//Update the diary entry with new values
		global $DiaryDate, $DiaryTitle, $DiaryText;
		global $Sitename;

		$QueryStr = "UPDATE " . $Sitename . "_diary SET diary_date='" . $DiaryDate . "', diary_title='" . $DiaryTitle . "', diary_text='" . $DiaryText . "' WHERE table_ref= 1 ";
		$result = mysql_query($QueryStr);

		if ($result == FALSE) //Nothing returned.
		{
			header("Location: ../Error_Trap.php?Errno=20");
		} else {
			//Get the data back and display it
			getdiaryentry();
		}
	}
	/************************************************************************************************/
	/***********************************************************************************************/
// News specific functions
	/***********************************************************************************************/
	function GetNewsEntry()
	{
		global $NewsDate, $NewsTitle, $NewsText, $NewsReporter;

		/* Get the current Diary details from the database **/
		$QueryStr = "SELECT * FROM `snarc_news`";
		$result = mysql_query($QueryStr);

		if ($result == FALSE) //Nothing returned.
		{
			$DiaryText = "Nothing recorded";
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				$NewsDate = $row[1];
				$NewsTitle = $row[2];
				$NewsText = $row[3];
				$NewsReporter = $row[4];
				//$new_text = str_replace("'", "\'", $row[3]);
				//$new_text = str_replace("-", "\-", $new_text);
			}//end of while loop
		}
	}

	function UpdateNews()
	{
//Update the diary entry with new values
		global $NewsDate, $NewsTitle, $NewsText, $NewsReporter;

		$QueryStr = "UPDATE snarc_news SET news_date='" . $NewsDate . "', news_title='" . $NewsTitle . "', news_text='" . $NewsText . "', news_reporter='" . $NewsReporter . "' WHERE table_ref= 1 ";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			echo "\nNothing recorded";
		} else {
			//Get the data back and display it
			//echo "<br>Diary Updated, Getting details from Database<br>";
			GetNewsEntry();
		}
	}

	function ConvertToShortDate()
	{
//Take the standard DATETIME from mysql and return the short dd/mm/yyyy format
//Need to reconfigure for a string as the date, as it's not used for anything other than display
		global $DiaryDate;
		$shortdate = $DiaryDate;
		return $shortdate;
	}
	/***********************************************************************************************/
	/***********************************************************************************************/
// Membership details
	/***********************************************************************************************/
	function InsertMember()
	{
		//insert the full set of member detail and return tru if successful, false if not
		//Do check for existing record
		//Need to check login for admin permissions

		global $Sitename, $username;
		global $Callsign, $Firstname, $Surname, $Position, $Email, $Contact, $Admin_Status, $locator;

//set up return variable to fail if not inserted
		$result = false;

//Trap non admin Users
		if (!CheckAdminMember($username)) {
			//Check user doing insert is an admin and able to add members
			header("Location: ../Error_Trap.php?Errno=71");
			return false;
		}

		if (CheckMember($Callsign) == false) //Tests for existing member
		{
			$QueryStr = "INSERT INTO " . $Sitename . "_members ( callsign ,firstname, surname, position, admin, email, contact, locator  ) 
					VALUES('" . $Callsign . "','" . $Firstname . "','" . $Surname . "','" . $Position . "','" . $Admin_Status . "','" . $Email . "','" . $Contact . "','" . $locator . "')";
			$result = mysql_query($QueryStr);
		} else {
			//header("Location: ../Error_Trap.php?Errno=71");
			return false;
		}

		return $result;
	}

	function UpdateMember()
	{
		//Need to check users login for admin permissions
		//Return true if successful
		global $Sitename, $username;
		global $Callsign, $Firstname, $Surname, $Position, $Email, $Contact, $Admin_Status, $locator;

//set up return variable to fail if not updated
		$result = false;
//Can only update if a record already exists
		if (CheckMember($Callsign)) {
			$QueryStr = "UPDATE " . $Sitename . "_members SET  firstname='" . $Firstname . "', surname='" . $Surname . "', position='" . $Position . "', admin='" . $Admin_Status . "', email='" . $Email . "', contact='" . $Contact . "', locator='" . $locator . "' WHERE callsign='" . $Callsign . "';";
			$result = mysql_query($QueryStr);
		}
		return $result;
	}

	function DeleteMember($TargetCall)
	{
		//Delete a members entry
		//Need to check users login for admin permissions
		//Cannot delete yourself
		// "DELETE FROM ".$Sitename."_members WHERE callsign='".$Callsign."';";
		global $Sitename, $username;
//set up return variable to fail if not updated
		$result = false;
//Can only udelete if a record already exists
		if (CheckMember($TargetCall)) ;
		{
			$QueryStr = "DELETE FROM " . $Sitename . "_members WHERE callsign='" . $TargetCall . "';";
			$result = mysql_query($QueryStr);
		}
		return $result;
	}

	function CheckMember($TargetCall)
	{
		global $Sitename;
		//check if member exists and return true/false
		//"SELECT * FROM ".$Sitename."_members WHERE callsign='".$TargetCall."';";
		$QueryStr = "SELECT * FROM " . $Sitename . "_members WHERE callsign='" . $TargetCall . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		}
		if (mysql_num_rows($result) != 1) {
			return false;
		}
		return true;
	}

	function GetMember($TargetCall)
	{
		//Get the member details from the table
		//$TargetCall MUST exist or function returns FALSE
		//The successful Result string is Concantenation of all records
		global $Sitename;
		//check if member exists and return true/false
		//"SELECT * FROM ".$Sitename."_members WHERE callsign='".$TargetCall."';";
		$QueryStr = "SELECT * FROM " . $Sitename . "_members WHERE callsign='" . $TargetCall . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Leave out $row[0] as this is just the primary key reference
				//Callsign'Firstname'Surname'Pos#'Admin#'Email'Contact
				$ReturnStr = $row[1] . "'" . $row[2] . "'" . $row[3] . "'" . $row[4] . "'" . $row[5] . "'" . $row[6] . "'" . $row[7];
			}//end of while loop
		}
		return $ReturnStr;
	}

	function CheckAdminMember($TargetCall)
	{
		//check if Admin member exists and return true/false
		//"SELECT * FROM ".$Sitename."_members WHERE callsign='".$TargetCall."';";
		global $Sitename;
//	$QueryStr = "SELECT * FROM `snarc_admins`  WHERE username = '".$username."'";

		$QueryStr = "SELECT * FROM " . $Sitename . "_admins WHERE username='" . $TargetCall . "';";
		$result = mysql_query($QueryStr);
		if (mysql_num_rows($result) == 0) //Nothing returned.
		{
			//echo "<br>Nothing found in ".$Sitename."_admins for ".$TargetCall."<br>";
			return false;
		} else {
			//echo "<br>Callsign found in ".$Sitename."_admins for ".$TargetCall."<br>";
			return true;
		}
	}

	function GetPosition($Position_Number)
	{
		//Returns the string representation of the position
		global $Sitename;
		$QueryStr = "SELECT * FROM " . $Sitename . "_positions WHERE position_ref='" . $Position_Number . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return "Not Specified";
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Return the position title
				$ReturnStr = $row[1];
			}//end of while loop
		}
		return $ReturnStr;

	}

	function ListMembers()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		//Only list Callsign, firstname, position
		$QueryStr = "SELECT * FROM " . $Sitename . "_members ORDER BY callsign;";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			//List all the names
			echo "<tr><td colspan = '4'>&nbsp;</td></tr>";
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//member_ref,Callsign,Firstname,Surname,Pos#,Admin#,Email,Contact,locator
				echo "<tr><td id='Td_7'>" . $row[1] . "</td><td id='Td_8'>" . $row[2] . "</td><td id='Td_7a'>";
				echo GetPosition($row[4]);
				//if ($row[4] == '1') {echo "Chairman";}
				//if ($row[4] == '2') {echo "Secretary";}
				//if ($row[4] == '3') {echo "Treasurer";}
				//if ($row[4] == '4') {echo "Web Admin";}
				//if ($row[4] == '5') {echo "Member";}
				echo "</td><td id='Td_8a'>" . $row[8] . "</td></tr>";
			}//end of while loop
		}

	}

	/***********************************************************************************************/
	function GetFormattedDate()
	{
		$TodaysDate = getdate();
		//print_r ($TodaysDate);
		$TodaysDateStr = $TodaysDate['mday'] . " " . $TodaysDate['month'] . " " . $TodaysDate['year'];
		return $TodaysDateStr;
	}

	function GetStoredDate()
	{
		//Format 'YYYY-MM-DD HH:MM:SS'
		$TodaysDate = getdate();
		$TodaysDateStr = $TodaysDate['year'] . "-" . $TodaysDate['mon'] . "-" . $TodaysDate['mday'] . " 00:00:00";
		return $TodaysDateStr;
	}

	function DisplayDate($specified_date)
	{
		//Date comes in as yyyy-mm-dd

		$DateStrMonths = array("none", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$DateStrYear = intval(substr($specified_date, 0, 4));
		$DateStrDay = intval(substr($specified_date, 8, 2));


		$DisplayDateStr = $DateStrDay . " " . $DateStrMonths[intval(substr($specified_date, 5, 2))] . " " . $DateStrYear;
		return $DisplayDateStr;
	}

	function Text_to_SQL($TargetStr)
	{
		//Covert text to sql compatible
		return str_replace("'", "''", $TargetStr);
	}

	function SQL_to_Text($TargetStr)
	{
		//Convert SQL text to normal
		return str_replace("''", "'", $TargetStr);
	}

	function Build_SQL_Date($TargetStr)
	{
//	Take the string date "NN January 2016" and convert to Format 'YYYY-MM-DD HH:MM:SS'
		$Month_values = array("none", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$Month_Numbers = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

//Date comes in as delimited string ( $_POST['seventdateday']."/".$_POST['seventdatemonth']."/".$_POST['seventdateyear'] )
//list($ArticleRef, $DocTitle, $UploadFile, $DocAuthor, $ArticleDate, $ArticleLive  ) = split(",", $ArticleStr, 6);
		list ($SEDate_Day, $SEDate_Month, $SEDate_Year) = split("/", $TargetStr, 3);

//Match the month
		for ($i = 0; $i <= 12; $i++) {
			if ($SEDate_Month == $Month_values[$i]) {
				return $SEDate_Year . "-" . $Month_Numbers[$i] . "-" . $SEDate_Day . " 00:00:00";
			}
		}

		return "2016-01-01 00:00:00";
	}

	/***********************************************************************************************/
	function HashPassword($userpassword)
	{
		//Generate a hashed password
		$hashedpwd = password_hash($userpassword, PASSWORD_BCRYPT);
		return $hashedpwd;
	}

	function AddAdmin($Callsign, $password)
	{
		//Add a user to the admin list
		global $Sitename, $username;

		//Hash the password
		$HashedPwd = HashPassword($password);
		$QueryStr = "INSERT INTO " . $Sitename . "_admins (username, password, admin_level, token, unused2) 
	                          VALUES ('" . $Callsign . "', '" . $HashedPwd . "', '1', 'abcdefghijklmnopqrstuvwxyz123456', NULL)";
		$result = mysql_query($QueryStr);
		return $result;
	}

	function DeleteAdmin($TargetCall)
	{
		// Delete the user from the Admin Table
		global $Sitename, $username;
		$QueryStr = "DELETE FROM " . $Sitename . "_admins WHERE username='" . $TargetCall . "';";
		$result = mysql_query($QueryStr);
		return $result;
	}

	function UpdateAdminUser($username, $password)
	{
		//This relates to Admin Users only
		$QueryStr = "UPDATE snarc_admins SET password='" . $password . "' WHERE username = '" . $username . "' ";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			return $result;
		} else {
			return true;
		}
	}

	function ValidatePassword($username, $PwdUnderTest)
	{
		global $Sitename;
		$tablePwd = "";
		//fetch the users password from the table
		$QueryStr = "SELECT * FROM " . $Sitename . "_admins WHERE username = '" . $username . "'";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			header("Location: ../Error_Trap.php?Errno=31");
			return $result;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				$tablePwd = $row[1];
			}//end of while loop
		}
		//test the password
		$VerifyResult = password_verify($PwdUnderTest, $tablePwd);
		return $VerifyResult;
	}
	/***********************************************************************************************/
	/***********************************************************************************************/
	/**************************************** File upload functions ********************************/
// variables posted
// File to Upload "file1"
// 
//Upload process, returns True if successfull
	function upload_pdf()
	{
		global $UploadFile, $TempFile, $DocTitle, $DocAuthor;

//upload_max_filesize should be set to 5M	
		$TargetDir = "../Articles/";
		$mimeType = "application/pdf; charset=binary";

		//set up the MIME type to check for.
		exec("file -bi " . $TempFile, $out);
		if ($out != $mimeType) {
			//echo "<br>MIME type correct for ".$UploadFile."<br>";

			// preserve file from temporary directory
			$success = move_uploaded_file($TempFile, $TargetDir . $UploadFile);
			if (!$success) {
				header("Location: ../Error_Trap.php?Errno=42"); //PDF Error
			} else {
				chmod($TargetDir . $UploadFile, 0755);
			}

		} else {
			header("Location: ../Error_Trap.php?Errno=43"); //PDF Error
		}
		//header("Location: ../Error_Trap.php?Errno=40"); //PDF Error
	}

	function upload_CheckExistance($TargetFile)
	{
		//Test for filename already existing
		return (file_exists($TargetFile));
	}

	function upload_DeleteFile($TargetFile)
	{
		//Delete the target file if it exists
		if (upload_CheckExistance($TargetFile)) {
			unlink($TargetFile);
		}
	}
	/******************************************************************************************************/
	/******************************************************************************************************/
	/*****  Articles Functions ****************************************************************************/
	function insert_Article()
	{
		//Insert the article data into the database
		global $ArticleRef, $DocTitle, $UploadFile, $DocAuthor, $ArticleDate, $ArticleLive, $TempFile;
		global $Sitename, $username;

		if (!CheckAdminMember($username)) {
			//Check user doing insert is an admin and able to add members
			header("Location: ../Error_Trap.php?Errno=71");
			return false;
		} else {

			$QueryStr = "INSERT INTO " . $Sitename . "_article (article_title, article_filename, article_author, article_date, article_live )
			VALUES ( '" . $DocTitle . "','" . $UploadFile . "','" . $DocAuthor . "','" . GetStoredDate() . "'," . $ArticleLive . " )";
			$result = mysql_query($QueryStr);
			if (!$result) {
				echo "<br>" . $DocTitle . "<br>" . $UploadFile . "<br>" . $DocAuthor . "<br>" . GetStoredDate() . "<br>";
				exit();
				//header("Location: ../Error_Trap.php?Errno=44");
			}
		}
		return $result;
	}

	function ListArticles()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		//Only list Callsign, firstname, position
		$QueryStr = "SELECT * FROM " . $Sitename . "_article ORDER BY article_date;";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			//List all the names
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Ref,title,filename,author,date,visible
				if ($row[5] == '1') {
					echo "<tr><td id='Td_1'><a href='Articles/" . $row[2] . "' target='_blank'>" . $row[1] . "</a>"; //
					echo "</td><td id='Td_2'>" . $row[3] . "</td><td id='Td_3'>" . DisplayDate($row[4]);
					echo "</td></tr>";


				}
			}//end of while loop
		}
//echo "<a href='http://www.rsgb.org.uk' target='_blank'>www.rsgb.org.uk</a>";		
	}

	function ListAllArticles()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		//Only list Callsign, firstname, position
		$QueryStr = "SELECT * FROM " . $Sitename . "_article ORDER BY article_ref;";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			return false;
		} else {
			echo "<br><table width='705' border='0' cellspacing='0' cellpadding='0'>";
			echo "<tr><td width = '20'>#</td><td width = '300'><strong>Article Title</td><td width = '200'><strong>Author</td><td width = '150'><strong>Updated</td></tr>";
			//List all the names
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Ref,title,filename,author,date,visible


				echo "<tr><td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</a>"; //<a href='Articles/".$row[2]."' target='_blank'>
				echo "</td><td>" . $row[3] . "</td><td>" . DisplayDate($row[4]);
				if ($row[5] == '0') {
					echo " X ";
				}
				echo "</td></tr>";

			}//end of while loop
			echo "</table><br>";
		}

	}

	function TestArticle($ArticleRef)
	{
		global $Sitename;
		//Test the database for the article number
		//Return false if reference does not exists
		$QueryStr = "SELECT * FROM " . $Sitename . "_article WHERE article_ref = '" . $ArticleRef . "';";
		$result = mysql_query($QueryStr);
		if (mysql_num_rows($result) == 0) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			return true;
		}
	}

	function Fetch_Article_details($TargetRef)
	{
		// Fetch details for given ref in form od a comma seperated string
		// Reference MUST exist or a lank string is returned
		global $Sitename;
		$QueryStr = "SELECT * FROM " . $Sitename . "_article WHERE article_ref='" . $TargetRef . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Leave out $row[0] as this is just the primary key reference
				//Article fields
				$ReturnStr = $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "," . $row[5];
			}//end of while loop
		}
		return $ReturnStr;
	}

	function Fetch_ArticleFilename($TargetRef)
	{
		global $Sitename, $username;
		// get just the article filename
		$QueryStr = "SELECT article_filename FROM " . $Sitename . "_article WHERE article_ref='" . $TargetRef . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				$ReturnStr = $row[0];
			}//end of while loop
		}
		return $ReturnStr;
	}

	function update_Article()
	{
		//Update the record for the article being edited
		//This function does nothing with the Article file itself

		// Update the following
		// article_title, author, date, visibility
		global $Sitename, $username;
		global $ArticleRef, $DocTitle, $UploadFile, $DocAuthor, $ArticleDate, $ArticleLive, $TempFile, $OldFilename, $NewFileToUpload;
		//Test to ensure an admin user is doing this
		if (!CheckAdminMember($username)) {
			//Check user doing insert is an admin and able to add members
			header("Location: ../Error_Trap.php?Errno=71");
			return false;
		} else {


			$QueryStr = "UPDATE " . $Sitename . "_article SET article_title ='" . $DocTitle . "', 
													article_author = '" . $DocAuthor . "',
													article_filename = '" . $UploadFile . "', 
													article_date = '" . GetStoredDate() . "', 
													article_live = " . $ArticleLive . " 
													WHERE article_ref = " . $ArticleRef . " ;";
			/*echo "<br>Query String:<br>".$QueryStr;*/


			$result = mysql_query($QueryStr);
			//echo $QueryStr;
			if (!$result) {
				header("Location: ../Error_Trap.php?Errno=45");
				//echo "<br>Failed to Update:<br>Reference : ".$ArticleRef."<br>".$DocTitle."<br>".$DocAuthor."<br>".GetStoredDate( )."<br>";
				exit();
			}
		}

		return $result;

	}

	function UpdateArticleFile()
	{
		//Update the file, deleting the old version if it exists ($FiletoDelete)
		//Update the database, for the ginev targetref, changing the filename only
		global $Sitename, $username;
		global $ArticleRef, $DocTitle, $UploadFile, $DocAuthor, $ArticleDate, $ArticleLive, $TempFile, $OldFilename;

//upload_max_filesize should be set to 5M	
		$TargetDir = "../Articles/";
		$mimeType = "application/pdf; charset=binary";

		//set up the MIME type to check for.
		exec("file -bi " . $TempFile, $out);
		if ($out != $mimeType) {
			//echo "<br>MIME type correct for ".$UploadFile."<br>";

			// preserve file from temporary directory
			$success = move_uploaded_file($TempFile, $TargetDir . $UploadFile);
			if (!$success) {
				header("Location: ../Error_Trap.php?Errno=42"); //PDF Error
			}

		} else {
			header("Location: ../Error_Trap.php?Errno=43"); //PDF Error
		}

		//$QueryStr = "UPDATE ".$Sitename."_article SET article_filename ='".$UploadFile."' WHERE article_ref=".$ArticleRef."';";
		//$result = mysql_query($QueryStr);
//Return the $success variable instead of the $result one. 	
		return $success;
	}

	function Delete_Article($TargetRef)
	{
		//Delete the file and remove the database entry
		global $Sitename, $username;
		$TargetDir = "../Articles/";
//set up return variable to fail if not updated
		$result = false;
//Can only udelete if user is an admin
		if (CheckAdminMember($username)) ;
		{
			//Delete the target file if it exists
			$TargetFile = $TargetDir . Fetch_ArticleFilename($TargetRef);
			if (upload_CheckExistance($TargetFile)) {
				unlink($TargetFile);
			}


			$QueryStr = "DELETE FROM " . $Sitename . "_article WHERE article_ref='" . $TargetRef . "';";
			$result = mysql_query($QueryStr);
		}
		return $result;

	}
	/******************************************************************************************************/
	/******************************************************************************************************/
	/*****  Special Events Functions **********************************************************************/

// Order of fields - Reference, sevent_date, sevent_name, sevent_sponsor, sevent_filename, sevent_live
// global $EventRef,  $SEventDate, $EventName, $Sponsor, $UploadFile, $SEventLive, $TempFile;
	function Insert_SEvent()
	{
		//Insert the article data into the database
		global $EventRef, $EventName, $UploadFile, $Sponsor, $SEventDate, $SEventLive, $TempFile;
		global $Sitename, $username;

		if (!CheckAdminMember($username)) {
			//Check user doing insert is an admin and able to add members
			header("Location: ../Error_Trap.php?Errno=71");
			return false;
		} else {
			//Order of fields - sevent_date, sevent_name, sevent_sponsor, sevent_filename, sevent_live
			$QueryStr = "INSERT INTO " . $Sitename . "_events (sevent_date, sevent_name, sevent_sponsor, sevent_filename, sevent_live )
			VALUES ( '" . $SEventDate . "','" . $EventName . "','" . $Sponsor . "','" . $UploadFile . "'," . $SEventLive . " )";
			$result = mysql_query($QueryStr);
			if (!$result) {

				//echo "<br>".$EventName."<br>".$UploadFile."<br>".$Sponsor."<br>".$SEventDate." - ".DisplayDate( $SEventDate )."<br>";

				//header("Location: ../Error_Trap.php?Errno=44");
			}
		}
		return $result;
	}

	function ListSEvents()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		//Only list Callsign, firstname, position
		$QueryStr = "SELECT * FROM " . $Sitename . "_events ORDER BY sevent_date;";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			//List all the names
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Ref,date,event,sponsor,filename,visible
				//disply - date,event (Link filename),sponsor				
				if ($row[5] == '1') {
					echo "<tr>";
					echo "<td id='Td_5'>" . DisplayDate($row[1]) . "</td>";
					echo "<td id='Td_4'><a href='Events/" . $row[4] . "' target='_blank'>" . $row[2] . "</a></td>"; //
					echo "<td id='Td_6'>" . $row[3] . "</td>";
					echo "</tr>";
				}
			}//end of while loop
		}
//echo "<a href='http://www.rsgb.org.uk' target='_blank'>www.rsgb.org.uk</a>";		
	}

	function ListAllSEvents()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		$QueryStr = "SELECT * FROM " . $Sitename . "_events ORDER BY sevent_date;";
		$result = mysql_query($QueryStr);

		if ($result == FALSE) //Nothing returned.
		{
			return false;
		} else {
			echo "<br><table width='750' border='0' cellspacing='0' cellpadding='0'>";
			echo "<tr><td width = '30'>#</td>";
			echo "<td width = '150'><strong>Date</td>";
			echo "<td width = '275'><strong>Event</td>";
			echo "<td width = '165'><strong>Sponsor</td>";
			echo "<td width = '20'><strong>Show</td></tr>";

			//List all the names
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Ref,title,filename,author,date,visible


				echo "<tr>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . DisplayDate($row[1]) . "</td>";
				echo "<td><a href='Events/" . $row[4] . "' target='_blank'>" . $row[2] . "</a></td>"; //
				echo "<td>" . $row[3] . "</td>";
				echo "<td>";
				if ($row[5] == '0') {
					echo " ";
				} else {
					echo " Y ";
				}
				echo "</td></tr>";

			}//end of while loop
			echo "</table><br>";
		}
	}

	function Delete_SEvent($TargetRef)
	{
		//Delete the file and remove the database entry
		global $Sitename, $username;
		$TargetDir = "../Events/";
//set up return variable to fail if not updated
		$result = false;
//Can only udelete if user is an admin
		if (CheckAdminMember($username)) ;
		{
			//Delete the target file if it exists
			$TargetFile = $TargetDir . Fetch_EventFilename($TargetRef);
			if (upload_CheckExistance($TargetFile)) {
				unlink($TargetFile);
			}


			$QueryStr = "DELETE FROM " . $Sitename . "_events WHERE sevent_ref='" . $TargetRef . "';";
			$result = mysql_query($QueryStr);
		}
		return $result;
	}

	function Fetch_EventFilename($TargetRef)
	{
		global $Sitename, $username;
		// get just the article filename
		$QueryStr = "SELECT sevent_filename FROM " . $Sitename . "_events WHERE sevent_ref='" . $TargetRef . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				$ReturnStr = $row[0];
			}//end of while loop
		}
		return $ReturnStr;
	}

	function Fetch_Event_details($TargetRef)
	{
		// Fetch details for given ref in form od a comma seperated string
		// Reference MUST exist or a lank string is returned
		global $Sitename;
		$QueryStr = "SELECT * FROM " . $Sitename . "_events WHERE sevent_ref='" . $TargetRef . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Event fields Reference, sevent_date, sevent_name, sevent_sponsor, sevent_filename, sevent_live
				$ReturnStr = $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "," . $row[5];
			}//end of while loop
		}
		return $ReturnStr;
	}

	function TestEvent($TargetRef)
	{
		global $Sitename;
		//Test the database for the article number
		//Return false if reference does not exists
		$QueryStr = "SELECT * FROM " . $Sitename . "_events WHERE sevent_ref = '" . $TargetRef . "';";
		$result = mysql_query($QueryStr);
		if (mysql_num_rows($result) == 0) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			return true;
		}
	}

	function update_Event()
	{
		//Update the record for the Special Event being edited
		//This function does nothing with the Event file itself

		// Update the following
		// article_title, author, date, visibility
		global $Sitename, $username;
		global $EventRef, $SEventDate, $EventName, $Sponsor, $UploadFile, $SEventLive, $TempFile, $OldFilename;
		//Test to ensure an admin user is doing this
		if (!CheckAdminMember($username)) {
			//Check user doing insert is an admin and able to add members
			header("Location: ../Error_Trap.php?Errno=71");
			return false;
		} else {

// Order of fields - Reference, sevent_date, sevent_name, sevent_sponsor, sevent_filename, sevent_live
// global $EventRef,  $SEventDate, $EventName, $Sponsor, $UploadFile, $SEventLive, $TempFile;				

			$QueryStr = "UPDATE " . $Sitename . "_events SET sevent_date = '" . GetStoredDate() . "', 
													sevent_name ='" . $EventName . "', 
													sevent_sponsor = '" . $Sponsor . "',
													sevent_filename = '" . $UploadFile . "', 
													sevent_live = " . $SEventLive . " 
													WHERE sevent_ref = " . $EventRef . " ;";
			/*echo "<br>Query String:<br>".$QueryStr;*/


			$result = mysql_query($QueryStr);
			//echo $QueryStr;
			if (!$result) {
				//header("Location: ../Error_Trap.php?Errno=45");
				echo "<br>Failed to Update:<br>Reference : " . $EventRef . "<br>" . $EventName . "<br>" . $Sponsor . "<br>" . GetStoredDate() . "<br>";
				exit();
			}
		}

		return $result;
	}

	function UpdateEventFile()
	{
		//Update the file, deleting an old version if it exists ($FiletoDelete)
		//Update the database, for the ginev targetref, changing the filename only
		global $EventRef, $SEventDate, $EventName, $Sponsor, $UploadFile, $SEventLive, $TempFile, $OldFilename;
		global $Sitename, $username;

//upload_max_filesize should be set to 5M	
		$TargetDir = "../Events/";
		$mimeType = "application/pdf; charset=binary";

		//set up the MIME type to check for.
		exec("file -bi " . $TempFile, $out);
		if ($out != $mimeType) {
			//echo "<br>MIME type correct for ".$UploadFile."<br>";

			// preserve file from temporary directory
			$success = move_uploaded_file($TempFile, $TargetDir . $UploadFile);
			if (!$success) {
				header("Location: ../Error_Trap.php?Errno=42"); //PDF Error
			}

		} else {
			header("Location: ../Error_Trap.php?Errno=43"); //PDF Error
		}

		//$QueryStr = "UPDATE ".$Sitename."_article SET article_filename ='".$UploadFile."' WHERE article_ref=".$ArticleRef."';";
		//$result = mysql_query($QueryStr);
//Return the $success variable instead of the $result one. 	
		return $success;
	}

	function upload_Event_pdf()
	{
		global $UploadFile, $TempFile, $EventName, $Sponsor;

//upload_max_filesize should be set to 5M	
		$TargetDir = "../Events/";
		$mimeType = "application/pdf; charset=binary";

		//set up the MIME type to check for.
		exec("file -bi " . $TempFile, $out);
		if ($out != $mimeType) {
			//echo "<br>MIME type correct for ".$UploadFile."<br>";

			// preserve file from temporary directory
			$success = move_uploaded_file($TempFile, $TargetDir . $UploadFile);
			if (!$success) {
				header("Location: ../Error_Trap.php?Errno=42"); //PDF Error
			} else {
				chmod($TargetDir . $UploadFile, 0755);
			}

		} else {
			header("Location: ../Error_Trap.php?Errno=43"); //PDF Error
		}
		//header("Location: ../Error_Trap.php?Errno=40"); //PDF Error
	}
	/******************************************************************************************************/
	/******************************************************************************************************/
	/*****  Hyperlink Functions **********************************************************************/

// Order of fields - Hlink_ref, Hlink_title, Hlink_url, Hlink_user, Hlink_date, Hlink_live
// global $HyperlinkRef, $HyperlinkTitle, $Hyperlink, $HyperlinkBy, $HyperlinkWhen, $HyperlinkVisible;
	function InsertHlink()
	{
		//insert the full set of HyperLink detail and return tru if successful, false if not
		//Need to check login for admin permissions

		global $Sitename, $username;
		global $HyperlinkRef, $HyperlinkTitle, $Hyperlink, $HyperlinkBy, $HyperlinkWhen, $HyperlinkVisible;

//set up return variable to fail if not inserted
		$result = false;

//Trap non admin Users
		if (!CheckAdminMember($username)) {
			//Check user doing insert is an admin and able to add members
			header("Location: ../Error_Trap.php?Errno=71");
			return false;
		}


		$QueryStr = "INSERT INTO " . $Sitename . "_links ( Hlink_title, Hlink_url, Hlink_user, Hlink_date, Hlink_live  ) 
					VALUES('" . $HyperlinkTitle . "','" . $Hyperlink . "','" . $HyperlinkBy . "','" . $HyperlinkWhen . "','" . $HyperlinkVisible . "')";
		$result = mysql_query($QueryStr);

		return $result;
	}

	function ListHlinks()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		//Only list Callsign, firstname, position
		$QueryStr = "SELECT * FROM " . $Sitename . "_links ORDER BY Hlink_ref;";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			//List all the names
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Hlink_ref, Hlink_title, Hlink_url, Hlink_user, Hlink_date, Hlink_live
				if ($row[5] == '1') {
					echo "<tr><td id='Td_9' >";
					echo "<a href=" . $row[2] . " target='_blank'>" . $row[1] . "</a><br>"; //
					echo "</td></tr>";
				}
			}//end of while loop
		}
//echo "<a href='http://www.rsgb.org.uk' target='_blank'>www.rsgb.org.uk</a>";		
	}

	function ListAllHlinks()
	{
		global $Sitename;
		//Function lists all the members in a table
		//Only echo the rows and columns
		//Only list Callsign, firstname, position
		$QueryStr = "SELECT * FROM " . $Sitename . "_links ORDER BY Hlink_ref;";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			return false;
		} else {
			echo "<br><table width='750' border='0' cellspacing='0' cellpadding='0'>";
			echo "<tr><td width = '20'>#</td><td width = '700'><strong>Hyperlink Title</td><td width = '20'><strong>Visible</td></tr>";
			//List all the names
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Ref,title,filename,author,date,visible


				echo "<tr><td>" . $row[0] . "</td>";    // Reference
				echo "<td>" . $row[1] . "</td><td>";        // title
				if ($row[5] == '0') {
					echo " X ";
				} else {
					echo " Y ";
				}
				echo "</td></tr>";

			}//end of while loop
			echo "</table><br>";
		}

	}

	function DeleteHlink($TargetRef)
	{
		//Delete a Hyperlink entry
		//Need to check users login for admin permissions
		//Cannot delete yourself
		// "DELETE FROM ".$Sitename."_members WHERE callsign='".$Callsign."';";
		global $Sitename, $username;
//set up return variable to fail if not updated
		$result = false;
//Can only udelete if a record already exists
		if (CheckHlink($TargetRef)) ;
		{
			$QueryStr = "DELETE FROM " . $Sitename . "_links WHERE Hlink_ref='" . $TargetRef . "';";
			$result = mysql_query($QueryStr);
		}
		return $result;
	}

	function UpdateHlink()
	{
		//Need to check users login for admin permissions
		//Return true if successful
		global $Sitename, $username;
		global $HyperlinkRef, $HyperlinkTitle, $Hyperlink, $HyperlinkBy, $HyperlinkWhen, $HyperlinkVisible;

//set up return variable to fail if not updated
		$result = false;
//Can only update if a record already exists

		$QueryStr = "UPDATE " . $Sitename . "_links SET  Hlink_title='" . $HyperlinkTitle . "', Hlink_url='" . $Hyperlink . "', Hlink_user='" . $HyperlinkBy . "', Hlink_date='" . $HyperlinkWhen . "', Hlink_live='" . $HyperlinkVisible . "' WHERE Hlink_ref='" . $HyperlinkRef . "';";
		$result = mysql_query($QueryStr);

		return $result;
	}

	function GetHlink($TargetRef)
	{
		//Get the member details from the table
		//$TargetCall MUST exist or function returns FALSE
		//The successful Result string is Concantenation of all records
		global $Sitename;
		//check if member exists and return true/false
		//"SELECT * FROM ".$Sitename."_members WHERE callsign='".$TargetCall."';";
		$QueryStr = "SELECT * FROM " . $Sitename . "_links WHERE Hlink_ref='" . $TargetRef . "';";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		} else {
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				//Leave out $row[0] as this is just the primary key reference
				//Hlink_ref, Hlink_title, Hlink_url, Hlink_user, Hlink_date, Hlink_live
				$ReturnStr = $row[1] . "'" . $row[2] . "'" . $row[3] . "'" . $row[4] . "'" . $row[5];
			}//end of while loop
		}
		return $ReturnStr;
	}

	function CheckHlink($TargetRef)
	{
		global $Sitename;
		//check if reference exists and return true/false
		$QueryStr = "SELECT * FROM " . $Sitename . "_links WHERE Hlink_ref=" . $TargetRef . ";";
		$result = mysql_query($QueryStr);
		if ($result == FALSE) //Nothing returned.
		{
			//header("Location: ../Error_Trap.php?Errno=103");
			return false;
		}
		if (mysql_num_rows($result) != 1) {
			return false;
		}
		return true;
	}


	/******************************************************************************************************
	 *******************************************************************************************************/
	function RandomPassword($Wordlength)
	{
		//Generate a random word length
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randstring = "";
		for ($i = 0; $i < $Wordlength; $i++) {
			$randchar = $characters[rand(0, strlen($characters))];
			$randstring = $randstring . $randchar;
		}
		return $randstring;
	}

	function RandomToken()
	{
		//Generate a 32char random token
		$RandToken = RandomPassword(32);
		return $RandToken;
	}
	/***********************************************************************************************/
	/***********************************************************************************************/
}
?>
