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

    echo "<div id='top'>Welcome Admin <a href='../../logout.php' style='color:white;font-size:15px;'>(Logout)</a></div>";
		}
	else{
		header('location:../../login.php');
		}	
		?>
    <div id="menu">
        <ul>
            <li><a href="../quanlythanhvien.php">Quản lý thành viên</a></li>
      
            <li><a href="../quanlychuyenmuc/quanlychuyenmuc.php">Quản lý chuyên mục</a></li>
      
            <li><a href="quanlysanpham.php">Quản lý sản phẩm</a></li>
       
            <li ><a href="../quanlylienhe/quanlylienhe.php" >Quản lý liên hệ</a></li>
            <li><a href="../quanlyquangcao.php">Quản lý quảng cáo</a></li>
            <li><a href="../quanlydonhang/quanlydonhang.php">Quản lý hoá đơn</a></li>
        </ul>
    </div>
    <div id="qlsp">
        <table width="850px" id="sp">
            <tr>
                <td colspan="5"></td>
                <td colspan="2"><a href="themsp.php" >Thêm sản phẩm</a></td>
            </tr>
            <tr>   
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Chuyên mục</th>
                <th>Hình ảnh</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php 
                include('../ketnoi.php');
                $sql="select a.tensp,a.gia,b.chuyenmuc,a.hinhanh,a.id from sanpham as a ,chuyenmuc as b where a.chuyenmuc_id=b.chuyenmuc_id order by id desc";
                $query = mysql_query($sql);
                $stt=0;
              while($row=mysql_fetch_assoc($query)){
                $stt++;
            ?>
            <tr>
                <td><?php echo $stt ;?></td>
                <td><?php echo $row['tensp']; ?></td>
                <td><?php echo $row['gia'] ;?></td>
                <td><?php echo $row['chuyenmuc']?></td>
                <td ><img src="<?php echo $row['hinhanh'];?>" width="100px" height="100px" /></td>
                <td style="width: 65px;"><a href="Suasp.php?id=<?php echo $row['id'];?>" >Edit</a></td>
                <td><a href="xoa.php?id=<?php echo $row['id'];?>" >Delete</a></td>
            </tr>
                
              <?php } ;?> 
        </table>
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>