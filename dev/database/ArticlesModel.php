<?php


class ArticlesModel
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

    public function insertArticle( $articleArray)
    {
        //Article Array: [ title, author, date, filename, email, level ]

        $columnStr = " ( articletitle, articleauthor, articledate, articlefile, articletype, articlelevel ) ";
        $valuesStr = " ('" . $articleArray['title'] . "','" . $articleArray['author'] . "','"
            . $articleArray['date'] . "','" . $articleArray['file']. "',"
            . $articleArray['email']. "," . $articleArray['level']. ")";

        $queryStr = "INSERT INTO snarc_articles" . $columnStr . " VALUES " . $valuesStr;

        $this->console_log($queryStr);
        $result = $this->databaseModel->insertQuery($queryStr);
        return $result;
    }

    public function getAllArticles()
    {
        $queryStr = "Select * from snarc_articles";
        $result = $this->databaseModel->selectQuery($queryStr);
        if($result === false){
            return null;
        } else {
            return $result;
        }
    }
    public function getArticle( $articleRef )
    {
        $queryStr = "Select * from snarc_articles where newsitem_id = ". $articleRef;
        $result = $this->databaseModel->selectQuery($queryStr);
        if($result === false){
            return null;
        } else {
            return $result;
        }
    }

    private function console_log($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
        $msg = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';

        echo "<script>".$msg."</script>";
    }
}