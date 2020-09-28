<?php

Class DB{

    var $host = "";
    var $username = "";
    var $password = "";
    var $dbname = "";
    
    public function __construct()
    {
        $dbIf = parse_ini_file("../../../dbconfig3.ini");
        $this->host = $dbIf["servername"];
        $this->username = $dbIf["username"];
        $this->password = $dbIf["password"];
        $this->dbname = $dbIf["dbname"];
    }
    public function con()
    {
        $mySqli = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        return $mySqli;  
    }
    public static function getClean($smt)
    {
        $oDB = new Db();
        $con = $oDB->con();
        $cleanSmt = $con-> real_escape_string($smt);
        return $cleanSmt;
    }
    public static function fetch($sql)
    {
        $oDB = new Db();
        $con = $oDB->con();
        $results = $con->query($sql);
        while( $row = mysqli_fetch_assoc($results) )
        {
            $data[] = $row;
        }
        return $data;
    }
    public static function insert($sql)
    {
        $oDB = new Db();
        $con = $oDB->con();
        $results = $con->query($sql);
    }
    public static function update($sql)
    {
        $oDB = new Db();
        $con = $oDB->con();
        $results = $con->query($sql);
    }
}