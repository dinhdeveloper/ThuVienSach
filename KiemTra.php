<?php
/**
 * Created by PhpStorm.
 * User: Dinht
 * Date: 10/24/2018
 * Time: 7:50 AM
 */
include ("Lib/DB.php");
$un = ''; //định nghĩa un là id


if (isset($_POST["un"])){
    $un = $_POST["un"];
}
$sql = "SELECT * FROM book WHERE id = '$un'";
$result = Database::ExecuteQuery($sql);
$dong = mysqli_num_rows($result);
echo $dong;
?>
