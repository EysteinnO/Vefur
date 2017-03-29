<?php

/**
 * Class SongsController
 * This is a demo Controller class.
 *
 * If you want, you can use multiple Models or Controllers.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Data;

class DataController
{
    public function index()
    {
        // Instance new Model (Song)
        $Data = new Data();
        // getting all songs and amount of songs
        $datas = $Data->getAllData();
        $Data->insertAllData();
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/data/data.php';
        require APP . 'view/_templates/footer.php';
    }
}