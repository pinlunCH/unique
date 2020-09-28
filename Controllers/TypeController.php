<?php
Class TypeController{
    function getAll(){
        $data = TypeModel::getAll();
        include('Views/json.php');
    }
}