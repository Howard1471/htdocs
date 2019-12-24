<?php


class Menuing
{

    public function __construct(){

    }

    protected $mainMenuArray = [
        'Home',
        'About',
        'News',
        'Diary',
        'Articles',
        'Contact',

        ];

    protected $mainURLs = [
        'index.php',
        'views/about/about.php',
        'views/news/news.php',
        'views/diary/diary.php',
        'views/articles/articles.php',
        'views/contact/contact.php',
        'views/login/login_start.php',

    ];

    public function getMainMenu()
    {
        return $this->mainMenuArray;
    }
    public function getMainURLs()
    {
        return $this->mainURLs;
    }


    protected $adminMenuArray = [
        'Home',
        'Diary input',
        'News Input',

    ];

    protected $adminURLs = [
        'index.php',
        'views/diary/diary.php',
        'views/news/news.php',

    ];

    public function getAdminMenuArray()
    {
        return $this->adminMenuArray;
    }
    public function getAdminURLs()
    {
        return $this->adminURLs;
    }



}