<?php
	session_start();
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />

	<title>Untitled 2</title>
    <link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
	<?php
		if($_SESSION['level']==2){

    echo "<div id='top'>Welcome Admin <a href='../../logout.php' style='color:white;font-size:15px;'>(Logout)</a></div>";
		}
	else{
		header('location:../login.php');
		}	
		?>
    <div id="menu">
        <ul>
            <li><a href="../quanlythanhvien.php">Quản lý thành viên</a></li>
        
            <li><a href="../quanlychuyenmuc/quanlychuyenmuc.php">Quản lý chuyên mục</a></li>
       
            <li><a href="../quanlysanpham/quanlysanpham.php">Quản lý sản phẩm</a></li>
       
            <li ><a href="../quanlylienhe/quanlylienhe.php" >Quản lý liên hệ</a></li>
            
            <li><a href="../quanlyquangcao.php">Quản lý quảng cáo</a></li>
            
            <li><a href="quanlydonhang.php">Quản lý hoá đơn</a></li>
        </ul>
    </div>
    <div id="donhang">
        <table style="border: 1px solid black;">
        <tr>
            <th>STT</th>
            <th>Ngày mua</th>
            <th>Họ và Tên</th>
            <th>Phone</th>
            <th>Tộng Tiền</th>
            <th>Xem</th>
            <th>Xóa</th>
        </tr>
        <?php
            include('../ketnoi.php');
            $sql="select *from hoadon order by id_hoadon desc";
            $query=mysql_query($sql);
            $stt=0;
            while($row=mysql_fetch_assoc($query)){
                $stt++;
        ?>
        <tr>
            <td><?php echo $stt; ?></td>
            <td><?php echo $row['ngaymua'];?></td>
            <td><?php echo $row['hoten_nm'];?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['tongtien']?></td>
            <td><a href="xemdonhang.php?id=<?php echo $row['id_hoadon']?>">Xem</a></td>
            <td><a href="xoadonhang.php?id=<?php echo $row['id_hoadon']?>">Delete</a></td>
        </tr>
        <?php } ?>
        </table>
        
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>