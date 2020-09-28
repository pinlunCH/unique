<?php

Class ActionController extends Controller
{
    function home(){
        $message = "this is home page";
        $location = LocationModel::getpopLocation();
        // $numPropeties = LocationModel::countLocationAcc();
        $type = TypeModel::getAll();
        $newAdded = AccommodationModel::getLatest();
        include("Views/home.php");
    }
    function about(){
        $message = "this is about page";

        include("Views/why.php");
    }
    function register(){
        $message = "this is register page";
        if(isset($_GET['needtoLogin'])){
            $_SESSION['needtoLogin'] = $_GET['needtoLogin'];
        }
        include("Views/login.php");
    }
    function doLogin(){
        $user = UsersModel::getUser($_POST['exist_strEmail'],$_POST['exist_strPassword']);
        if($user)
        {
            $_SESSION['userid'] = $user['id'];
            if($_SESSION['needtoLogin']){
                header('location:index.php?controller=action&action=accommodations&acom='.$_SESSION['accID']);
            }else{
                header('location: index.php?controller=action');
            }
        }else{
            header('location: index.php?controller=action&action=register&notexist=true');
        }
    }
    function doRegister(){
        $user = UsersModel::registerUser($_POST['register_firstname'],$_POST['register_lastname'],$_POST['register_email'],$_POST['register_password']);
    }
    function booking(){
        $user = UsersModel::getUserBysession($_SESSION["userid"]);
        $upComing = UsersModel::getUpcoming($user);
        $pass = UsersModel::getPass($user);
        $matching = UsersModel::matchRateBooking($pass[0]['id']);

        include('Views/mybooking.php');
    }
    function insertRating(){
        UsersModel::leaveRate($_POST['bookingID'],$_POST['location'],$_POST['comfort'],$_POST['cleanliness'],$_POST['value']);
    }
    function logout(){
        session_destroy();
        header('location: index.php?controller=action');
    }
    function accommodations(){
        if(isset($_GET['acom'])){
            $data = AccommodationModel::getByID($_GET['acom']);
            $imgs = AccommodationModel::getImage($_GET['acom']);
            $facilities = AccommodationModel::getFacilities($_GET['acom']);
            $_SESSION['accID'] = $_GET['acom'] ;
        }
        
        include('Views/eachAccommodation.php');
    }
    public function searchResult()
    {   
        (isset($_POST['nDestination']))? $_POST['nDestination'] : "";
        (isset($_POST['type']))? $_POST['type'] : "";
        (isset($_POST['nOfPeople']))? $_POST['nOfPeople'] : "";
        (isset($_POST['destination']))? $_POST['destination'] : "";
        (isset($_POST['checkin']))? $_POST['checkin']: "";
        (isset($_POST['checkout']))? $_POST['checkout'] : "";
    
        $data = AccommodationModel::searching($_POST['destination'],$_POST['nDestination'],$_POST['type'],$_POST['nOfPeople'],$_POST['checkin'],$_POST['checkout']);

        include('Views/searchResult.php');
    }
    public function searchLocation()
    {   
        if(isset($_GET['location'])){
            $data = AccommodationModel::getByLocation($_GET['location']);            
        }else{
            // get all
        }
        include('Views/searchLocation.php');
    }
    public function searchType()
    {   
        if(isset($_GET['type'])){
            $data = AccommodationModel::getByType($_GET['type']);            
        }
        include('Views/searchType.php');
    }
    public function checkAvailability()
    {  
        $data = BookingModel::checkAvailable($_POST['checkin_checking'],$_POST['checkout_checking'],$_POST['acom']);
        return $data;
    }
    public function processBooking()
    {  
        if(!isset($_SESSION['userid'])){
            header('location:index.php?controller=action&action=register&needtoLogin=true');
        }else{
            $data = AccommodationModel::getByID($_GET['acom']);
            $_SESSION['checkin'] = $_POST['checkin_checking'];
            $_SESSION['checkout'] = $_POST['checkout_checking'];
            $_SESSION['noGuest'] = $_POST['nOfPeople__checking'];
            include('Views/bookingprocess.php');
        }
    }
    public function payment()
    {
        include('Views/paymentprocess.php');
    }
    public function createBooking()
    {
        BookingModel::insertBooking($_SESSION['accID'],$_SESSION['checkin'],$_SESSION['checkout'],$_SESSION['noGuest'],$_SESSION['userid'],'1000.00',$_SESSION['accLocation']);
        header('location: index.php?controller=action&action=success&confirm=true&payment=true&success=true');
    }
    public function success()
    {
        include('Views/successprocess.php');
    }
    public function errorMsg()
    {
        echo "wrong";
    }
    function checkSearchForm(){
        
    }

}