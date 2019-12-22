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
		$this->ConnectToDatabase();
	}

	/***********************************************************************************************/

    /**
     * ConnectToTable()
     * makes the database connection and connects to the database
     * Returns true if both are successfull.
     */
    protected function ConnectToDatabase()
	{

		$Connect_status = false;
		//Connect to host
		try {
			$this->link = mysqli_connect($this->host, $this->user, $this->pwd, $this->dbName);
		} catch (mysqli_sql_exception $e) {
			dd("Connect DB Exception : ". $e->getMessage());
            $this->Connect_status = false;
            return;
		}

		//connect to the database
		try {
			$db_Selection = mysqli_select_db($this->dbName);
		} catch (mysqli_sql_exception $e) {
			dd("Select DB Exception : ". $e->getMessage());
            $this->Connect_status = flase;
            return;
		}
		$this->Connect_status = true;
	}
    //Expose the connection status.
	public function getConnectionStatus()
    {
        return $this->Connect_status;
    }

    //SELECT
    public function selectQuery($queryStr)
    {
        if($this->Connect_status == true) {
            $result = mysqli_query( $queryStr );
        } else {
            return null;
        }


    }


    //UPDATE
    //INSERT
    //DELETE


}

