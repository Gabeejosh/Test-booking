<?php
class db{
    public static $conn;
    public static $dbconnect;
    public static function dbconnect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $db="movie";
        try{
        $conn = mysqli_connect($servername, $username, $password, $db);
        return db::$conn=$conn;
        }
        catch(PDOException $e)
        {
            echo "error message : ".$e->getMessage();
        }
    }
}
$conn=new db();