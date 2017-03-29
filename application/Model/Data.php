<?php

namespace Mini\Model;

use Mini\Core\Model;

class Data extends Model
{

    public function getAllData()
    {
        $sql = "SELECT dataID, readCO, readAlc, readTemp, readHumid FROM arduino";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function insertAllData()
    {
        if(isset($_POST['fetch'])) {
            try {
                if (isset($_GET['data'])) {
                    $data1 = $_GET['data'];
                    $data2 = $_GET['data2'];
                    $data3 = $_GET['data3'];
                }
            }
            catch (Exception $e)
            {
                echo $e;
            }
            $sql = "INSERT INTO arduino(readCO, readAlc, readTemp) VALUES ('$data', '$data2', '$data3')";
            $query = $this->db->prepare($sql);
            try {
                $query->execute();
            } catch (Exception $e) {
                echo $e;
            }
        }
    }
}