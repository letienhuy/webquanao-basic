<?php
    session_start();
?> 
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />

	<title>Untitled 2</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
    <?php
        if($_SESSION['level']==2){
            echo "<div id='top'> Welcome Admin <a href='../../logout.php' style='color:white;font-size:15px;'>(Logout)</a> </div>";
        }
        else{
            header('location:../../login.php');
        }
    ?>
    <div id="menu">
        <ul>
            <li><a href="../quanlythanhvien.php">Quản lý thành viên</a></li>
        
            <li><a href="quanlychuyenmuc.php">Quản lý chuyên mục</a></li>
        
            <li><a href="../quanlysanpham/quanlysanpham.php">Quản lý sản phẩm</a></li>
        
            <li ><a href="../quanlylienhe/quanlylienhe.php" >Quản lý liên hệ</a></li>
            <li><a href="../quanlyquangcao.php">Quản lý quảng cáo</a></li>
            <li><a href="../quanlydonhang/quanlydonhang.php">Quản lý hoá đơn</a></li>
        </ul>
    </div>
    <div  style="margin: 10px 0px 10px 0px; height: 146px;" >
        <fieldset style="width: 250px; margin: auto; height:100px; height: 125px;">
            <legend>Thêm chuyên mục</legend>
            <form style="padding-top: 20px; text-align: center;" method="post" action="">
                       Name: <input type="text" name="chuyenmuc"/><br />
                       Link: <input type="text" name="link"/ style="margin-left: 10px;"><br />
                        <input type="submit" value="Thêm" name="ok" style="margin:10px 0px 0px 47px;">
            </form>
        </fieldset>
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>
<?php
    include("../ketnoi.php");
    if(isset($_POST['ok'])){
    $chuyenmuc=$_POST['chuyenmuc'];
    $link=$_POST['link'];
    $sql="insert into chuyenmuc (chuyenmuc,link) value ('$chuyenmuc','$link')";
    if(mysql_query($sql)){
        header("location:quanlychuyenmuc.php");
    }
    else{
        echo "Xãy ra lỗi ";
    }
    }
?>