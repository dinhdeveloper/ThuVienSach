<?php
/**
 * Created by PhpStorm.
 * User: Dinht
 * Date: 10/23/2018
 * Time: 11:03 AM
 */
include("Lib/DB.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>
<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <img src="Lib/backgroud.jpg" alt="" style="">-->
    <title>Thư Viện Sách</title>
    <link rel="icon" href="Lib/backgroud.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--     <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.min.js">
    <link rel="stylesheet" href="jquery/jquery-3.3.1.js">
    <link rel="stylesheet" href="jquery/jquery-3.3.1.min.js">

    <script>
        $(document).ready(function(){
            $("#bookname").blur(function () {
                var bookname = $("#bookname").val();
                $.ajax({
                    url:"KiemTra.php",
                    type: "get",
                    dataType: "text",
                    data:{
                        un:bookname,
                    },
                    success:function (data) {
                        if (data == 1) {
                            $("#kiemtra").css("color", "red").html("Mã đã tồn tại");
                        }
                        else {
                            $("#kiemtra").css("color", "blue").html("Hợp lệ");
                        }
                    }
                })
            })
        });
    </script> -->
</head>
<body>
<div class="container">
    <h1 class="display-4" style="text-align: center; color: red">
        THƯ VIỆN SÁCH HỌC VIỆN
    </h1><br>
    <div class="row">
        <div class="col-md-5">
            <h4 style="color: blue"><u>SÁCH TRONG DATABASE</u></h4><br>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">BOOK NAME</th>
                    <th scope="col">XÓA</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM `book` WHERE (`add` = 1 OR `add` = 0)";
                $result = Database::ExecuteQuery($sql);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']?></th>
                        <td><?php echo $row['bookname']?></td>
                        <td><a href="CapNhat.php?id=<?php echo $row['id']?>"><img src="Lib/delete.png"></a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h4 style="color: blue"><u>SÁCH HIỆN CÓ</u></h4><br>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">BOOK NAME</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM `book` WHERE `add` =1";
                $result = Database::ExecuteQuery($sql);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']?></th>
                        <td><?php echo $row['bookname']?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <h4 style="color: blue"><u>THÊM SÁCH</u></h4><br>
            <form class="form-inline" method="get">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="bookname" class="sr-only">ID</label>
                    <input type="text" class="form-control" id="id" placeholder="ID" name="id">
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="bookname" class="sr-only">Book Name</label>
                    <input type="text" class="form-control" id="bookname" placeholder="Tên Sách" name="bookname">
                </div>
                <div id="kiemtra"></div>
                <button type="submit" class="btn btn-primary mb-2" name="submit" style="margin-left:20px">Gửi</button>
            </form>
            <?php
            if (isset($_REQUEST['submit'])) {
                $id = $_GET['id'];
                $bookname = $_GET['bookname'];
//                $add = $_POST['add'];
                if ($id == "") {
                    echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
                } else {
                    $sql = "INSERT INTO book(id,bookname)
					VALUES ('$id','$bookname')";
                    $result = Database::ExecuteQuery($sql);
                    echo '<script>alert("Thêm thành công")</script>';
                    Database::ChangeURL("index.php");
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
