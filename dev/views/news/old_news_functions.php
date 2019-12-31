<?php
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
