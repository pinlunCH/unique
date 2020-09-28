<?php

Class AdminModel
{
    public static function adminGetUser($email,$password){
		$cleanEmail = DB::getClean($email);
		$cleanPassword = DB::getClean($password);
		$data = DB::fetch("SELECT * FROM admin_users WHERE strEmail = '".$cleanEmail."' AND strPassword = '".$cleanPassword."' ");

		return $data[0];

    }
    public static function getUserBysession($id)
	{
        $data = DB::fetch("SELECT* FROM admin_users WHERE id = '".$id."'");
        return $data[0];
	}
}