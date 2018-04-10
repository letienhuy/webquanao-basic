
<?php
	session_start();
       $id=$_GET['id'];
       include('ketnoi.php');
       $sql="select * from quangcao where id='$id'";
       $query=mysql_query($sql);
       $data=array();
       while($row=mysql_fetch_assoc($query)){
            $data['tenanh']=$row['tenanh'];
       }
       if(isset($_POST['ok'])){
            if($_FILES['fileanh']['error']>0){
                header('location: quanlyquangcao.php');
            }
            else{
                $tmp=$_FILES['fileanh']['tmp_name'];
                $dir='images/images/'.$_FILES['fileanh']['name'];
                $sql="update quangcao set tenanh='$dir' where id='$id'";
                if($query=mysql_query($sql)){
                    move_uploaded_file($tmp,$dir);
                    header('location: quanlyquangcao.php');
                }
                else{
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
        <div id="suaqc">
            <fieldset>
                <legend>Sửa quảng cáo</legend>
                <form method="post" enctype="multipart/form-data">
                    <table>
                    <tr>
                        <td>Ảnh cũ</td>
                        <td><img src="<?php echo '../'.$data['tenanh'];?>" width="150px" height="100px"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Ảnh quảng cáo</td>
                        <td ><input type="file" name="fileanh" style="width: 150px;"></td>
                     </tr>
                    <tr><td></td>
                        <td ><input type="submit" name="ok" value="Sửa"/></td></tr>
                    </table>
                </form>
            </fieldset>
        </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>