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
        header("location:../../login.php");
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
    <div id="edit">
    	  <?php
        include("../ketnoi.php");
		$id=$_GET['id'];
		if(isset($_POST['ok'])){
			$name=$_POST['them'];
            $link=$_POST['link'];
			$update="update chuyenmuc set chuyenmuc='$name',link='$link' where chuyenmuc_id='$id'";
			if(mysql_query($update)){
					echo "Thành công";
					header('location:quanlychuyenmuc.php');
				}
			else {
				echo "Xảy ra lỗi";
				}	
		}
		
		$sql="select * from chuyenmuc where chuyenmuc_id='$id'";
		$query=mysql_query($sql);
		$sua=array();
		while($row=mysql_fetch_assoc($query)){
				$sua['chuyenmuc_id']=$row['chuyenmuc_id'];
				$sua['chuyenmuc']=$row['chuyenmuc'];
                $sua['link']=$row['link'];
			}
		?>
        
        <fieldset style="height: 125px;">
        <legend>Chỉnh sửa chuyên mục</legend>
        <form method="post" style="text-align: center;" >
           
            Name: <input type="text" name="them" id="input1" value="<?php echo $sua['chuyenmuc'] ?>"/><br />
            Link: <input type="text" name="link" value="<?php echo $sua['link'];?>" style="margin-left: 10px;"/><br />
            <input type="submit" name="ok" value="Sửa"  style="padding:3px 7px 3px 7px ; margin-left:-56px; margin-top:5px ; color: black;"/>
    
        </form>
        </fieldset>
      
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>