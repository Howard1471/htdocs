<?php


class MenuService
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

    protected $shortMenuArray = [
        'Home',
        'About',
        'Diary',
        'Contact',
    ];
    protected $shortURLs = [
        'index.php',
        'views/about/about.php',
        'views/diary/diary.php',
        'views/contact/contact.php',
    ];
    public function getShortMenu()
    {
        return $this->shortMenuArray;
    }
    public function getShortURLs()
    {
        return $this->shortURLs;
    }


    protected $adminMenuArray = [
        'Home',
        'Diary',
        'News',
        'Articles',
        'Email',
        'Logout',
    ];

    protected $adminURLs = [
        'index.php',
        'admin/diaryinput.php',
        'admin/newsinput.php',
        'admin/articlesetup.php',
        'admin/emailsetup.php',
        'index.php',
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
