<?php
Class LocationController{
    function getByName(){
        $name = $_GET['name'];
        $data = LocationModel::getByName($name);
        include('Views/json.php');
    }
}