<?php
Class BookingModel{
    public static function getAll(){
        $data = DB::fetch('SELECT * FROM booking');
        return $data;
    }
    public static function checkAvailable($checkin,$checkout,$accID)
	{
		$data = DB::fetch("SELECT
        *
    FROM
        booking
    WHERE
        nAccommodationID = '".$accID."' AND(
            checkin <= '".$checkin."' AND '".$checkout."' AND checkout >= '".$checkin."' AND '".$checkout."'
        )
        ");
        print_r($data);
    }
    public static function insertBooking($accID,$checkin,$checkout,$nOfGuest,$userID,$amtPaid,$location)
    {
  
        $result = DB::fetch("SELECT location.id FROM location WHERE strName = '".$location."'");
        $locationID = $result[0]['id'];
        $data = DB::insert("INSERT INTO `booking`(
            `id`,
            `nAccommodationID`,
            `checkin`,
            `checkout`,
            `nGuests`,
            `nUserID`,
            `nAmountPaid`,
            `nLocation`
        )
        VALUES(
            NULL,
            '".$accID."',
            '".$checkin."',
            '".$checkout."',
            '".$nOfGuest."',
            '".$userID."',
            '".$amtPaid."',
            '".$locationID."'
        )");
        

    }
}