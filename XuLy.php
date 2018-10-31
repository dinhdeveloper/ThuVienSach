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
        $soluong = $row['quantity'];
        $soluong++;
        $sql = "UPDATE `book` SET `add`= 1,`quantity` = '$soluong' WHERE id = '$id'";
        $result = Database::ExecuteQuery($sql);
        echo '<script>alert("Thêm Thành Công")</script>';
        Database::ChangeURL("index.php");
    }
?>
