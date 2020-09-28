<?php
Class TypeModel{
    public static function getAll(){
        $data = DB::fetch('SELECT * FROM `type`');
        return $data;
    }
    public static function getById($id){
        $data = DB::fetch('SELECT * FROM `type` WHERE id = "'.$id.'"');
        return $data;
    }
    public static function getByIdAD($id){
        $data = DB::fetch('SELECT * FROM `type` WHERE id = "'.$id.'"');
        return $data[0];
    }
    public static function insert($name,$cover){

        $data = DB::fetch('INSERT INTO `type`(
			`id`,
			`strName`,
			`strCover`
		)
		VALUES(
			NULL,
			"'.$name.'",
			"'.$cover.'"
		)');
        return $data;
    }
    public static function update($id,$name,$cover){
        $data = DB::fetch('UPDATE `type` 
		SET 
		`strName` = "'.$name.'", 	
		`strCover` = "'.$cover.'"	
        WHERE type.id = "'.$id.'"');
        return $data;
    }
}