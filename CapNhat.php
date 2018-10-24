<?php
include ("Lib/DB.php");
$id = '';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "SELECT * FROM book WHERE id = '$id'";
$result = Database::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
if ($id === $row['id']){
    $sql = "UPDATE `book` SET `add`= 2 WHERE id = '$id'";
    $result = Database::ExecuteQuery($sql);
    Database::ChangeURL("index.php");
}
?>