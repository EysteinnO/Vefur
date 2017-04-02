<?php

namespace Mini\Controller;

use Mini\Model\Data;

class DataController
{
    public function index()
    {
        //Class initialized
        $Data = new Data();
        $datas = $Data->getAllData();
        $Data->insertAllData();
        require APP . 'view/_templates/header.php';
        require APP . 'view/data/data.php';
        require APP . 'view/_templates/footer.php';
    }
}