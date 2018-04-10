<?php
	session_start();
    include('../ketnoi.php');
    $id=$_GET['id'];
    $sql="select * from lienhe where id_lh='$id'";
    $query=mysql_query($sql);
    $data=array();
    while($row=mysql_fetch_assoc($query)){
        $data['time']=$row['time'];
        $data['hoten']=$row['hoten'];
        $data['email']=$row['email'];
        $data['tieude']=$row['tieude'];
        $data['noidung']=$row['noidung'];
    }
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
        
            <li><a href="../quanlysanpham/quanlysanpham.php">Quản lý sản phẩm</a></li>
       
           <li ><a href="../quanlylienhe/quanlylienhe.php" >Quản lý liên hệ</a></li>
            <li><a href="../quanlyquangcao.php">Quản lý quảng cáo</a></li>
            <li><a href="../quanlydonhang/quanlydonhang.php">Quản lý hoá đơn</a></li>
        </ul>
    </div>
    <div id="view">
    <fieldset>
    <legend>Xem bình luận</legend>
        <form method="post" action="view.php">
            <table>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="user" value="<?php echo $data['hoten'] ?>"></td>
                </tr>
                  <tr>
                    <td>Thời gian</td>
                    <td><input type="text" name="user" value="<?php echo $data['time'] ?>"></td>
                </tr>
                  <tr>
                    <td>Email</td>
                    <td><input type="text" name="user" value="<?php echo $data['email'] ?>"></td>
                </tr>
                  <tr>
                    <td>Tiêu đề</td>
                    <td><input type="text" name="user" value="<?php echo $data['tieude'] ?>"></td>
                </tr>
                  <tr>
                    <td>Nội dung</td>
                    <td><textarea><?php echo $data['noidung'] ?></textarea></td>
                </tr>
            </table>
        </form>
  </fieldset>
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>