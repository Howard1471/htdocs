<?php


class TimeAndDateServices
{
    protected $nowTime;

    //constructor gets now()
    public function __construct()
    {
        $nowTime = date("Y-m-d H:i:s");
    }

    public function getNowTime()
    {
        return $this->nowTime;
    }

    /**
     * setSQLDate takes a UK format date ( dd/mm/yyyy) and converts it into a SQL
     * style date and time yyyy-mm-dd hh:mm:ss
     * @param $newDate
     * @return string
     */
    public function getSQLDate()
    {
        return substr($this->nowTime, 0, 10);
    }

    public function getDateUKFormat()
    {
        //yyyy-mm-dd
        return substr($this->nowTime, 8, 2)."/".
            substr($this->nowTime, 5, 2)."/".
            substr($this->nowTime, 0, 4);
    }

    /**
     * convertUKtoSQLDat takes a UK format date ( dd/mm/yyyy) and converts it into a SQL
     * style date and time yyyy-mm-dd hh:mm:ss
     * @param $ukDate
     * @return string
     */
    public function convertUKtoSQLDat( $ukDate )
    {
        //dd/mm/yyyyy
        return substr($ukDate, 6, 4)."-".
            substr($ukDate, 4, 2)."-".
            substr($ukDate, 0, 2)." 00:00:00";
     }

}