<?php
	session_start();
    $id=$_GET['id'];
    include("ketnoi.php");
    $query=mysql_query("select * from user where ID='$id' ");
    $row=array();
    while($data=mysql_fetch_assoc($query)){
        $row['ho'] =$data['ho'];
        $row['ten']=$data['ten'];
        $row['mail']=$data['mail'];
        $row['phone']=$data['phone'];
        $row['ngaysinh']=$data['ngaysinh'];
        $row['gioitinh']=$data['gioitinh'];
        $row['diachi']=$data['diachi'];
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html"  charset="utf-8"/>
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
        
             <li ><a href="quanlylienhe/quanlylienhe.php">Quản lý liên hệ</a></li>
            <li><a href="quanlyquangcao.php">Quản lý quảng cáo</a></li>
            <li><a href="quanlydonhang/quanlydonhang.php">Quản lý hoá đơn</a></li>
        </ul>
    </div>
    
     <div id="xemtv">
        <fieldset>
            <legend>Thông tin thành viên</legend>
            <form method="post">
                <table>
                    <tr>
                        <td>Họ và tên</td>
                        <td><input type="text" value="<?php echo $row['ho']." ".$row['ten'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" value="<?php echo $row['mail'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" value="<?php echo $row['phone'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td><input type="text" value="<?php echo $row['ngaysinh'];?>"/></td>
                    </tr>
                    <tr>
                        <td>Giới Tính</td>
                        <td>
                           <font color='red'> Nam </font> <input <?php if($row['gioitinh']==1){ echo "checked='checked'"; }?> type="radio" name="gt" value="1"/>
                           <font color='red'> Nữ  </font> <input <?php if($row['gioitinh']==0){ echo "checked='checked'"; }?>type="radio" name="gt" value="0"/>
        
                        </td>
                        
                    </tr>
                      <tr>
                        <td>Địa chỉ</td>
                        <td><textarea><?php echo $row['diachi'];?></textarea></td>
                    </tr>
                </table>
            </form>
        </fieldset>
     </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>