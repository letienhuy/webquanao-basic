
<?php
	session_start();
    $loi=array();
    $loi['anh']=null;
    if(isset($_POST['ok'])){
       if($_FILES['fileanh']['error']>0){
            $loi['anh']="* Xin vui lòng chọn quảng cáo cần thêm";
       }
       else{
        $name=$_FILES['fileanh']['name'];
        $tmp=$_FILES['fileanh']['tmp_name'];
        $dir="images/images/".$name;
        include('ketnoi.php');
        $sql="insert into quangcao (tenanh) values ('$dir')";
        if($query=mysql_query($sql)){
            move_uploaded_file($tmp,$dir);
            header('location: quanlyquangcao.php');
        }
        else {
            echo 'Xay ra loi';
        }
        }
    }
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />

	<title>Thêm quảng cáo</title>
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
        <div id="themqc">
            <fieldset>
                <legend>Thêm quảng cáo</legend>
                <form method="post" enctype="multipart/form-data">
                    <table>
                    <tr>
                        <td style="width: 100px;">Ảnh quảng cáo</td>
                        <td ><input type="file" name="fileanh" style="width: 150px;"></td>
                        <td><font color='red'><?php echo $loi['anh'];?></font></td>
                     </tr>
                    <tr><td></td>
                        <td ><input type="submit" name="ok" value="Thêm"/></td></tr>
                    </table>
                </form>
            </fieldset>
        </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>