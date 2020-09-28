<?php
Class LocationModel{
    public static function getpopLocation(){
        $data = DB::fetch('SELECT * FROM `location` WHERE `status` = 1 ');
        return $data;
    }
    public static function getAllLocation(){
        $data = DB::fetch('SELECT * FROM `location`');
        return $data;
    }
    public static function countLocationAcc($locationId){
        $data = DB::fetch("SELECT location.id,location.strName,location.strCover,location.status,(SELECT COUNT(*)
	  FROM accommodations WHERE nLocationID = '13') FROM `location` WHERE location.id = '13' AND `status` = '1'");
        return $data;
    }
    public static function getByName($name){
        $data = DB::fetch("SELECT * FROM `location` WHERE `strName` LIKE '%".$name."%'");
        return $data;
    }
    public static function getById($name){
        $data = DB::fetch("SELECT * FROM `location` WHERE `strName` = '".$name."'");
        return $data;
    }
}