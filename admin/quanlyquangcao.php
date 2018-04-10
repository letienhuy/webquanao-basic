
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
    <div id="menu">
        <ul>
            <li><a href="quanlythanhvien.php">Quản lý thành viên</a></li>
            <li><a href="quanlychuyenmuc/quanlychuyenmuc.php">Quản lý chuyên mục</a></li>
            <li><a href="quanlysanpham/quanlysanpham.php">Quản lý sản phẩm</a></li>
            <li ><a href="quanlylienhe/quanlylienhe.php" >Quản lý liên hệ</a></li>
            <li><a href="quanlyquangcao.php">Quản lý quảng cáo</a></li>
            <li><a href="quanlydonhang/quanlydonhang.php">Quản lý hoá đơn</a></li>
        </ul>
    </div>
    <div id="quangcao">
            <table>
                <tr>
                    <td colspan="3"></td>
                    <td align='center'><a href="themqc.php">Thêm quảng cáo</a></td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php
                    include('ketnoi.php');
                    $sql="select * from quangcao";
                    $query=mysql_query($sql);
                        $stt=0;
                    while($row=mysql_fetch_assoc($query)){
                        $stt++;
                ?>
                <tr>
                    <td><?php echo $stt?></td>
                    <td><img src="<?php echo '../'.$row['tenanh']?>" width="250px" height="150px"/></td>
                    <td><a href="Suaqc.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td style="width: 140px;"><a href="xoaqc.php?id=<?php echo $row['id']?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>