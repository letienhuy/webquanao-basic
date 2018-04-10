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

    echo "<div id='top'>Welcome Admin <a href='../logout.php' style='color:white;font-size:15px;'>(Logout)</a></div>";
		}
	else{
		header('location:../login.php');
		}	
		?>
    <div id="menu" style="font-size: 14px;">
        <ul>
            <li><a href="quanlythanhvien.php">Quản lý thành viên</a></li>
        
            <li><a href="quanlychuyenmuc/quanlychuyenmuc.php">Quản lý chuyên mục</a></li>
       
            <li><a href="quanlysanpham/quanlysanpham.php">Quản lý sản phẩm</a></li>
       
            <li style=""><a href="quanlylienhe/quanlylienhe.php" style="">Quản lý liên hệ</a></li>
            <li><a href="quanlyquangcao.php">Quản lý quảng cáo</a></li>
           <li><a href="quanlydonhang/quanlydonhang.php">Quản lý hoá đơn</a></li>
            
        </ul>
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>