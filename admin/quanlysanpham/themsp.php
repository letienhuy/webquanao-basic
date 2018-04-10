<?php
	session_start();
 ?>

<?php
     $loi=array();
    $loi['anh']=null;
    include("../ketnoi.php");
    if(isset($_POST['ok'])){
        if($_FILES['anh']['error']>0){
            $loi['anh']="* Xin vui lòng chọn ảnh cần thêm";
       }
     else{
    $tensp=$_POST['username'];
    $gia=$_POST['gia'];
    $loaisp=$_POST['loaisp'];
    $chatlieu=$_POST['chatlieu'];
    $namsx=$_POST['namsx'];
    $xuatxu=$_POST['xuatxu'];
    $mausac=$_POST['mausac'];
    $kichthuoc=$_POST['kichthuoc'];
    $dir="sp/".$_FILES["anh"]['name'];
    move_uploaded_file($_FILES['anh']['tmp_name'],"sp/".$_FILES["anh"]['name']);
    $sql="insert into sanpham (tensp,gia,chuyenmuc_id,hinhanh,chatlieu,namsx,xuatxu,mausac,kichthuoc) value ('$tensp','$gia','$loaisp','$dir','$chatlieu','$namsx','$xuatxu','$mausac','$kichthuoc')";
    if($query = mysql_query($sql)){
            header("location:quanlysanpham.php");
        }
        else {
            echo "Xảy ra lỗi";
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
       
        <fieldset style="height: 325px;">
        <legend>Thêm sản phẩm</legend>
            <form  method="post" id="formthemsp" enctype="multipart/form-data">
           
                <input type="text" placeholder="Tên sản phẩm" name="username"/>
                <input type="text" placeholder="Giá" name="gia"/>
                <select name="loaisp">
                  
                <option value="2">Thời trang nam</option>
                <option value="3">Thời trang nữ</option>
                <option value="4">Sản phẩm mới</option>
                <option value="5">Sản phẩm bán chạy</option>
                
                </select>
                <input type="file" name="anh"/>
                <input type="text" name="chatlieu" placeholder="Chất liệu"/>
                <input type="number" name="namsx" placeholder="Năm sản xuất"/>
                <input type="text" name="xuatxu" placeholder="Xuất xứ"/>
                <input type="text" name="mausac" placeholder="Màu sắc"/>
                <input type="text" name="kichthuoc" placeholder="Kích thước"/>
                <input type="submit" value="Thêm" name="ok"/>
            </form>
                
        </fieldset>
        <center><?php echo $loi['anh'];?></center>
    </div>
    <div id="footer">Copyright NgocHieuShop</div>
</body>
</html>