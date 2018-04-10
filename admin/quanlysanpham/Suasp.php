<?php
	session_start();
 ?>

<?php
    include("../ketnoi.php");
    $id=$_GET['id'];
    $sql="select * from sanpham where id='$id'";
    $query=mysql_query($sql);
    $data=array();
    while($row=mysql_fetch_assoc($query)){
        $data['tensp']=$row['tensp'];
        $data['gia']=$row['gia'];
        $data['hinhanh']=$row['hinhanh'];
        $data['chuyenmuc_id']=$row['chuyenmuc_id'];
        $data['chatlieu']=$row['chatlieu'];
        $data['namsx']=$row['namsx'];
        $data['xuatxu']=$row['xuatxu'];
        $data['kichthuoc']=$row['kichthuoc'];
        $data['mausac']=$row['mausac'];
        $data['id']=$row['id'];
    }
    if(isset($_POST['ok'])){
        $tensp=$_POST['username'];
        $gia=$_POST['gia'];
        $loaisp=$_POST['loaisp'];
        $chatlieu=$_POST['chatlieu'];
        $namsx=$_POST['namsx'];
        $xuatxu=$_POST['xuatxu'];
        $mausac=$_POST['mausac'];
        $kichthuoc=$_POST['kichthuoc'];
        $tmp=$_FILES['anh']['tmp_name'];
        $dir="sp/".$_FILES["anh"]['name'];
      if($_FILES['anh']['error']>0){
            $update="update sanpham set tensp='$tensp',gia='$gia',chuyenmuc_id='$loaisp',chatlieu='$chatlieu',namsx='$namsx',xuatxu='$xuatxu',mausac='$mausac',kichthuoc='$kichthuoc' where id='$id'";
            if(mysql_query($update)){
                header('location: quanlysanpham.php');
            }
            else {
                echo "Xay ra loi";
            }
      }  
      
      else {
            $update="update sanpham set tensp='$tensp',gia='$gia',chuyenmuc_id='$loaisp',hinhanh='$dir',chatlieu='$chatlieu',namsx='$namsx',xuatxu='$xuatxu',mausac='$mausac',kichthuoc='$kichthuoc' where id='$id'";
            if(mysql_query($update)){
                header('location:quanlysanpham.php');
            }
            else{
                echo "Xay ra loi";
            }
            move_uploaded_file($tmp,$dir);
      }
      }
    
    
 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="GallerySoft.info" />

	<title>Untitled 2</title>
    <link rel="stylesheet" type="text/css" href="style - Copy.css">
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
    <div id="themsp">
       
        <fieldset style="height:480px;"  >
        <legend>Sữa sản phẩm</legend>
            <form  method="post" id="formthemsp" enctype="multipart/form-data">
                <table>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" placeholder="Tên sản phẩm" name="username" value="<?php echo $data['tensp'];?>"/></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="text" placeholder="Giá" name="gia" value="<?php echo $data['gia'];?>" /></td>
                </tr>
                <tr>
                    <td>Chuyên mục</td>
                    <td><select name="loaisp">
                    
                    <option <?php if($data['chuyenmuc_id']==2){echo 'selected="selected"';}?> value="2">Thời trang nam</option>
                    <option <?php if ($data['chuyenmuc_id']==3){ echo 'selected="selected"';}?> value="3">Thời trang nữ</option>
                    <option <?php if($data['chuyenmuc_id']==4){ echo 'selected="selected"'; } ?> value="4">Sản phẩm mới</option>
                    <option  <?php if($data['chuyenmuc_id']==5){ echo 'selected="selected"'; } ?> value="5">Sản phẩm bán chạy</option>
                </select>
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh cũ</td>
                    <td><img src="<?php echo $data['hinhanh']; ?>" width="100px" height="100px"/><br /></td>
                </tr>
                <tr>
                    <td>Hình ảnh mới</td>
                    <td><input type="file" name="anh" /></td>
                </tr>
                <tr>
                    <td>Chất liểu</td>
                    <td><input type="text" name="chatlieu" value="<?php echo $data['chatlieu']?>"/></td>
                </tr>
                <tr>
                    <td>Năm sản xuất</td>
                    <td><input type="number" name="namsx" value="<?php echo $data['namsx']?>"/></td>
                </tr>
                <tr>
                    <td>Xuất xứ</td>
                    <td><input type="text" name="xuatxu" value="<?php echo $data['xuatxu']?>"/></td>
                </tr>
                <tr>
                    <td>Màu sắc</td>
                    <td><input type="text" name="mausac" value="<?php echo $data['mausac']?>" /></td>
                </tr>
                <tr>
                    <td>Kích thước</td>
                    <td><input type="text" name="kichthuoc" value="<?php echo $data['kichthuoc']?>" /></td>
                </tr>
                
                <tr><td colspan="2"><input type="submit" value="Sửa" name="ok" style="margin-left:199px;width: 80px; height: 30px;margin-top: 15px;color: black;"/></td></tr>
                </table>
            </form>
        </fieldset>
    
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>