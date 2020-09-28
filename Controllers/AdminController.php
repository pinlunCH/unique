<?php

Class AdminController extends Controller
{
    function login(){
        include("Views/adminLogin.php");
    }
    function doLogin(){
        $user = AdminModel::adminGetUser($_POST['strUsername'],$_POST['strPassword']);
        if($user)
        {
            $_SESSION['userid'] = $user['id'];
                header('location: index.php?controller=admin&action=dashboard');
        }else{
            header('location: index.php?controller=admin&action=login&error=true');
        }
    }
    function dashboard(){
        $user = AdminModel::getUserBysession($_SESSION['userid']);
        if($user){
            include('Views/dashboard.php');
        }else{
            header('location: index.php?controller=admin&action=login&error=true');
        }
    }
    function accommodations(){
        $data = AccommodationModel::getAdminAll();
        include('Views/accommodation.php');
    }
    function accForm(){
        if(isset($_GET['id'])){
            $data = AccommodationModel::getByIDAD($_GET['id']);
        }
        if(!isset($data)){
            $result = array("id"=>"","strName"=>"",  "checkInTime"=>"", "nPrice"=>"","strAddress"=>"","checkoutTime"=>"","nGuests"=>"","nBedroom"=>"","nBath"=>"","strDetails"=>"","strCover"=>"","type"=>"","location"=>"");
        }
        $type = TypeModel::getAll();
        $location = LocationModel::getAllLocation();
        include('Views/accForm.php');
    }
    function accSave(){
        move_uploaded_file($_FILES["coverphoto"]["tmp_name"], "assets/".$_FILES["coverphoto"]["name"]);
        $_POST['coverphoto'] = $_FILES["coverphoto"]["name"];
        if(!$_POST['pageID']){
            AccommodationModel::insert($_POST['strName'],$_POST['nLocation'],$_POST['nType'],$_POST['price'],$_POST['address'],$_POST['checkin'],$_POST['checkout'],$_POST['guest'],$_POST['bedroom'],$_POST['bath'],$_POST['detail'],$_POST['coverphoto']);
        }else{
            AccommodationModel::update($_POST['pageID'],$_POST['strName'],$_POST['nLocation'],$_POST['nType'],$_POST['price'],$_POST['address'],$_POST['checkin'],$_POST['checkout'],$_POST['guest'],$_POST['bedroom'],$_POST['bath'],$_POST['detail'],$_POST['coverphoto']);
        }
        header('location:index.php?controller=admin&action=accommodations&success=true');
    }
    function type(){
        $type_data = TypeModel::getAll();
        include('Views/type.php');
    }
    function typeForm(){
        if(isset($_GET['id'])){
            $data = TypeModel::getByIdAD($_GET['id']);
        }
        if(!isset($data)){
            $result = array("id"=>"","strName"=>"",  "strCover"=>"");
        }
        include('Views/typeForm.php');
    }
    function typeSave(){
        move_uploaded_file($_FILES["coverphoto"]["tmp_name"], "assets/".$_FILES["coverphoto"]["name"]);
        $_POST['coverphoto'] = $_FILES["coverphoto"]["name"];
        if(!$_POST['pageID']){
            TypeModel::insert($_POST['strName'],$_POST['coverphoto']);
        }else{
            TypeModel::update($_POST['pageID'],$_POST['strName'],$_POST['coverphoto']);
        }
        header('location:index.php?controller=admin&action=type&success=true');
    }
    function logout(){
        session_destroy();
        header('location: index.php?controller=admin&action=login');
    }
    public function errorMsg()
    {
        echo "wrong";
    }
}