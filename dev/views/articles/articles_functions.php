<?php
	/**
     ***  Articles Functions ***************************************************************************
     * Old php code to handle articles in the old website
     */
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
