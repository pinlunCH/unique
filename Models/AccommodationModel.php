<?php
Class AccommodationModel
{

	public static function getAll()
	{
		$data = DB::fetch("SELECT * FROM accommodations");
		return $data;
	}
	public static function getAdminAll()
	{
		$data = DB::fetch("SELECT accommodations.id,
		accommodations.strName,
        accommodations.`checkInTime`,
        accommodations.`nPrice`,
        accommodations.`strAddress`,
        accommodations.`checkoutTime`,
        accommodations.`nGuests`,
        accommodations.`nBedroom`,
        accommodations.`nBath`,
        accommodations.`strDetails`,
        accommodations.`strCover`, 
		type.strName AS type,
		location.strName AS location
		FROM accommodations 
		LEFT JOIN type ON accommodations.nTypeID = type.id
		LEFT JOIN location on accommodations.`nLocationID` = location.id
		");
		return $data;
	}
	public static function insert($name,$location,$type,$price,$address,$checkin,$checkout,$guests,$bed,$bath,$detail,$cover){
		$data = DB::insert("INSERT INTO `accommodations`(
			`id`,
			`strName`,
			`nLocationID`,
			`nTypeID`,
			`nPrice`,
			`strAddress`,
			`checkInTime`,
			`checkoutTime`,
			`nGuests`,
			`nBedroom`,
			`nBath`,
			`strDetails`,
			`strCover`
		)
		VALUES(
			NULL,
			'".$name."',
			'".$location."',
			'".$type."',
			'".$price."',
			'".$address."',
			'".$checkin."',
			'".$checkout."',
			'".$guests."',
			'".$bed."',
			'".$bath."',
			'".$detail."',
			'".$cover."'
		)");
	}
	public static function update($id,$name,$location,$type,$price,$address,$checkin,$checkout,$guests,$bed,$bath,$detail,$cover){
		$data = DB::update("UPDATE `accommodations` 
		SET 
		`strName` = '".$name."', 	
		`nLocationID` = '".$location."',
		`nTypeID` = '".$type."',
		`nPrice` = '".$price."', 
		`strAddress` = '".$address."',
		`checkInTime` = '".$checkin."',
		`checkoutTime` = '".$checkout."',
		`nGuests` = '".$guests."',
		`nBedroom` = '".$bed."',	
		`nBath` = '".$bath."',
		`strDetails` = '".$detail."',
		`strCover` = '".$cover."'	
		WHERE accommodations.id = '".$id."'
		");
	}

	public static function searching($destination,$ndestination,$type,$nGuset,$checkin,$checkout)
	{
		$data = DB::fetch("SELECT
		accommodations.id,
		accommodations.strName,
        accommodations.`checkInTime`,
        accommodations.`nPrice`,
        accommodations.`strAddress`,
        accommodations.`checkoutTime`,
        accommodations.`nGuests`,
        accommodations.`nBedroom`,
        accommodations.`nBath`,
        accommodations.`strDetails`,
        accommodations.`strCover`,
		location.strName AS location,
		type.strName AS type
	FROM
		accommodations
		LEFT JOIN location ON accommodations.nLocationID = location.id
		LEFT JOIN type ON accommodations.nTypeID = type.id
	WHERE
		`nLocationID` = '".$ndestination."' or `nTypeID` = '".$type."' AND `nGuests` >= '".$nGuset."'");
		$_SESSION['destination'] = $destination;
		$_SESSION['nDestination'] = $ndestination;
		$_SESSION['nGuest'] = $nGuset;
		$_SESSION['checkin'] = $checkin;
		$_SESSION['checkout'] = $checkout;

		return $data;
	}
	public static function getLatest()
	{
		$data = DB::fetch("SELECT
		accommodations.id,
		accommodations.`strName`,
		accommodations.strCover,
		location.strName AS location
	FROM
		accommodations
	LEFT JOIN location ON accommodations.nLocationID = location.id
	ORDER BY
		accommodations.id
	DESC LIMIT 4");
		return $data;
	}
	public static function getImage($accId)
	{
		$data = DB::fetch("SELECT * FROM image WHERE nAccommmdationID = '".$accId."'");
		return $data;
	}
	public static function getFacilities($accId)
	{
		$data = DB::fetch("SELECT * FROM facilities WHERE `nAccommodationsID` = '".$accId."'");
		return $data;
	}

	public static function getByLocation($locationID)
	{
		$data = DB::fetch("SELECT accommodations.*,location.strName AS location FROM accommodations LEFT JOIN location ON accommodations.nLocationID = location.id WHERE nLocationID ='".$locationID."'");
		return $data;
	}

	public static function getByType($typeID)
	{
		$data =	DB::fetch("SELECT accommodations.*,type.strName AS type FROM accommodations LEFT JOIN type ON accommodations.nTypeID = type.id WHERE nTypeID ='".$typeID."'");
		if(!$data){
			header('location:index.php?controller=action&action=searchType&noresult=true');
		}
		return $data;
	}

	public static function getByIDAD($whichID)
	{
		$data =	DB::fetch("SELECT
		accommodations.*,
		location.strName AS location
		
	FROM
		`accommodations`
	RIGHT JOIN location ON accommodations.nLocationID = location.id
	WHERE
		accommodations.id = '".$whichID."'");
		

		return $data[0];
	}
	public static function getByID($whichID)
	{
		$data =	DB::fetch("SELECT
		accommodations.*,
		location.strName AS location
		
	FROM
		`accommodations`
	RIGHT JOIN location ON accommodations.nLocationID = location.id
	WHERE
		accommodations.id = '".$whichID."'");
		

		return $data;
	}
}

?>
<!-- SELECT
    accommodations.id,
    accommodations.`strName`,
    location.strName AS location,
    cover.strFileName AS img
FROM
    accommodations
LEFT JOIN location ON accommodations.nLocationID = location.id
RIGHT JOIN (SELECT * FROM image LIMIT 1) AS cover ON accommodations.id = cover.nAccommmdationID
ORDER BY
    accommodations.id
DESC
LIMIT 4 -->
<!-- SELECT
		accommodations.id,
		accommodations.`strName`,
		location.strName AS location,
        image.strFileName AS coverPhoto
	FROM
		accommodations
	LEFT JOIN location ON accommodations.nLocationID = location.id
    RIGHT JOIN image ON  image.nAccommmdationID= accommodations.id
	ORDER BY
		accommodations.id
	DESC LIMIT 4 -->