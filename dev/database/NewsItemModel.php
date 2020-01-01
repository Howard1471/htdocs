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


    //Insert an item into the news Item table
    public function insertNewsItem( $newsItem )
    {
        //$newsItem: [title, author, data, text]



    }




}