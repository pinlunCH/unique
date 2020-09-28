<?php

Class UsersModel
{
	public static function getUser($email,$password)
	{
		$cleanEmail = DB::getClean($email);
		$cleanPassword = DB::getClean($password);
		$data = DB::fetch("SELECT * FROM users WHERE strEmail = '".$cleanEmail."' AND strPassword = '".$cleanPassword."' ");

		return $data[0];
	}
	public static function getUserBysession($id)
	{
		if(isset($_SESSION["userid"])){
			return $_SESSION["userid"];
		}else{
			header('location: index.php?controller=action&action=register&login=true');
		}
	}
	public static function registerUser($firstname,$lastname,$email,$password)
	{
		$cleanFirst = DB::getClean($firstname);
		$cleanLast = DB::getClean($lastname);
		$cleanEmail = DB::getClean($email);
		$cleanPassword = DB::getClean($password);
		$varifyEmail = UsersModel::checkEmail($cleanEmail);
		
		if($cleanFirst && $cleanLast && $cleanPassword && !$varifyEmail){
			$data = DB::insert("INSERT INTO `users` (`id`, `strFirstName`, `strLastName`, `strEmail`, `strPassword`) VALUES (NULL, '".$cleanFirst."', '".$cleanLast."', '".$cleanEmail."', '".$cleanPassword."')");
			$currantId = DB::fetch("SELECT MAX(id) as num FROM users");
			$_SESSION['userid'] = $currantId[0]['num'];
			if($_SESSION['needtoLogin']){
				header('location:index.php?controller=action&action=accommodations&acom='.$_SESSION['accID']);
			}else{
				header("location: index.php?controller=action&action=register");
			}
		}else{
			$userExists = (UsersModel::checkEmail($cleanEmail))?true:false;
			header("location: index.php?controller=action&action=register&error=true&userexists=".$userExists);
		}

	}
	public static function checkEmail($email)
	{
		$cleanEmail = DB::getClean($email);
		$data = DB::fetch("SELECT * FROM users WHERE strEmail='".$email."'");
		
		return $data;
	}

	public static function getUpcoming($id)
	{
		$upcoming = DB::fetch("SELECT
		booking.id,
		accommodations.id,
		accommodations.strName,
		booking.checkin,
		booking.checkout,
		booking.nGuests,
		booking.nUserID,
		booking.nAmountPaid,
		accommodations.strCover,
        location.strName AS location,
        accommodations.strAddress AS address,
        TIME_FORMAT(accommodations.checkInTime, '%h:%i %p') AS checkInTime,
        TIME_FORMAT(accommodations.checkoutTime, '%h:%i %p') AS checkoutTime
	FROM
		booking
	RIGHT JOIN accommodations ON booking.nAccommodationID = accommodations.id
    LEFT JOIN location ON booking.nLocation = location.id
	WHERE
		nUserID = '".$id."' AND checkin > CURDATE()");
		return $upcoming;
	}
	public static function getPass($id)
	{
		$pass = DB::fetch("SELECT
		booking.id,
		accommodations.strName,
		booking.checkin,
		booking.checkout,
		booking.nGuests,
		booking.nUserID,
		booking.nAmountPaid,
		accommodations.strCover,
        location.strName AS location
	FROM
		booking
	RIGHT JOIN accommodations ON booking.nAccommodationID = accommodations.id
    LEFT JOIN location ON booking.nLocation = location.id
	WHERE
		nUserID = '".$id."' AND checkout <= CURDATE()");
		return $pass;
	}
	public static function leaveRate($id,$location,$comfort,$cleanliness,$value)
	{
		$record = DB::insert("INSERT INTO `rating` (`id`, `nBookingID`, `locationRate`, `comfortRate`, `cleanlinessRate`, `valueRate`) VALUES (NULL, '".$id."', '".$location."', '".$comfort."', '".$cleanliness."', '".$value."')");
		header('location: index.php?controller=action&action=booking');
	}
	public static function matchRateBooking($id)
	{
		$rating = DB::fetch('SELECT * FROM rating WHERE nBookingID = "'.$id.'"');

		return $rating;
	}
}

?>