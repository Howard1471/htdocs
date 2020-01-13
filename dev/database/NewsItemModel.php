<?php


class NewsItemModel
{

    protected $databaseModel;
    protected $connectionStatus;//getConnectionStatus()

    public function __construct()
    {
        $this->databaseModel = new Snarc_Database();
        $this->connectionStatus = $this->databaseModel->getConnectionStatus();
    }

    // return the success of the connection (true/false)
    public function getConnectionStatus()
    {
        return $this->connectionStatus;
    }


    //Insert an item into the news Item table, returns true/false
    public function insertNewsItem( $newsItem )
    {
        //$newsItem: [title, author, date, text]
        $columnStr = " ( newstitle, newsdate, newsauthor, newstext ) ";
        $valuesStr = " ('" . $newsItem['title'] . "','" . $newsItem['date'] . "','" . $newsItem['author'] . "','" . $newsItem['text'] . "')";

        $queryStr = "INSERT INTO snarc_newsitems" . $columnStr . " VALUES " . $valuesStr;

        $result = $this->databaseModel->insertQuery($queryStr);
        return $result;
    }

    public function getAllNewsItems()
    {
        $queryStr = "Select * from snarc_newsitems";
        $result = $this->databaseModel->selectQuery($queryStr);
        if($result === false){
            return null;
        } else {
            return $result;
        }
    }
    public function getLimitedNewsItems()
    {
        $queryStr = "Select * from snarc_newsitems LIMIT 8";
        $result = $this->databaseModel->selectQuery($queryStr);
        if($result === false){
            return null;
        } else {
            return $result;
        }
    }

    public function getNewsItem( $newsRef )
    {
        $queryStr = "Select * from snarc_newsitems where newsitem_id = ". $newsRef;
        $result = $this->databaseModel->selectQuery($queryStr);
        if($result === false){
            return null;
        } else {
            return $result;
        }
    }
    function console_log($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
        $msg = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';

        echo $msg;
    }
}
