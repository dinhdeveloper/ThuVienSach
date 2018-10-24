<?php
/**
 * Created by PhpStorm.
 * User: Dinht
 * Date: 10/23/2018
 * Time: 11:22 AM
 */

class Database {
    public static function ExecuteQuery($sql)
    {
        $connection = mysqli_connect('localhost','root','','sach','3306') or
        die ("couldn't connect to localhost");
        mysqli_query($connection, "set names 'utf8'");
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        return $result;
    }
    public static function ChangeURL($url){
        echo "<script type='text/javascript'> location='$url'; </script>";
    }
}

?>