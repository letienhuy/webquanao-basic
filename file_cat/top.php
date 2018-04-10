<?php
    ob_start();
    session_start();
?>
<?php
    include('ketnoi.php');
    $user = null;
    if(isset($_SESSION['userid'])){
        $user = mysql_fetch_array(mysql_query("select * from user where ID='{$_SESSION['userid']}'"));
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thực Tập Web bán hàng</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="bootstrap.min.js"></script>
</head>
	<body>
	<div id="wrapper">
    	<div id="top">
        	<div id="top-left">
            	<ul >
                	<li><a href="#"><img src="images/images/google.png" /></a></li>
                    <li><a href="#"><img src="images/images/facebook.png" /></a></li>
                </ul>
            </div>
                
                 <div id="top-right">
                <div style="color:  #FF8000;">
            	<ul>
                    <?php 
                    if($user){
                        echo '<li>Xin chào: '.$user['mail'].'</li>';
                        echo '<li>|</li>';
                        if($user['level'] == 2){
                            echo '<li><b><a href="admin" style="color: #f00;">Admin Cpanel</a></b></li>';
                            echo '<li>|</li>';                            
                        }
                        echo '<li><a href="doithongtin.php">Sửa thông tin</a></li>';
                        echo '<li>|</li>';
                        echo '<li><a href="logout.php">Thoát</a></li>';
                    }else{
                       echo '<li><a href="dangnhap.php">Đăng nhập</a></li>
                                <li>|</li>
                                <li ><a href="dangki.php">Đăng ký</a></li>';
                    }
                    ?>
                </ul>
        
                </div>
            </div>
        </div>
        <div id="logo">
        	<div id="logo-left">
	<span>NgocHieuShop</span>
	</div>
            <a href="giohang.php"><div id="shopcart"><img src="images/images/shopcart.png"/>
                <div id="text_cart">
                    <p style="margin-top: -10px; color: gray;">Sản phẩm</p>
                    <div style="margin-left:18px;color: white; width: 20px; height: 20px; background-color: #F36F36; border-radius: 12px; text-align: center; margin-top: 5px;"><?php 
                    if(isset($_SESSION["giohang"])){
                        $cart=$_SESSION['giohang'];
                        echo count($cart); 
                    }
                    else{
                        echo "0";
                        }
                    ?></div>
                </div>
            </div>
            </a>
            <div id="logo-right2">
            	<div >
                <form id="timkiem" action="timkiem.php" method="get">
                    <input  id="text-form" type="text" name="timkiem" placeholder="Tìm kiếm sản phẩm" width="200px" height="30px"/>
                    <input type="submit" id="bottom-search">
                </form>
                </div>
            </div>
            <div id="logo-right3">
            	<div><div id="anh"><img src="images/images/call2.png" /></div>SUPPORT : 0979433225</div>
            </div>
        </div>
        <div id="menu">
        	<ul >
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="gioithieu.php">Giới thiệu</a>
                <li><a href="gioithieu.php">Danh mục</a>
                        <ul class="submenu">
                            <?php
                                $sql="select * from chuyenmuc";
                                $query=mysql_query($sql);
                                while($row=mysql_fetch_assoc($query)){
                                echo "<li><a href='thoitrang.php?id=$row[chuyenmuc_id]'>$row[chuyenmuc]</a></li>";
                                }?>
                        </ul>
            </li>
                       <?php
                    $sql="select * from chuyenmuc limit 3 ";
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query)){
                    echo "<li><a href='thoitrang.php?id=$row[chuyenmuc_id]'>$row[chuyenmuc]</a></li>";
                       }?>
                <li><a href="lienhe.php">Liên Hệ</a></li>       
            </ul>
        </div>
        <div id="content">
        <div id="left">
        <div id="content-left">
           	<h3 style="margin-top:20px; margin-left:-50px;">Quần áo nữ</h3>
            <ul>
            	<li><a href="aosominu.php">Thời trang nữ </a></li>
                <li><a href="aosominu.php">Áo thun nữ </a></li>
                <li><a href="aosominu.php">Áo khoác,vest nữ</a></li>
                <li><a href="aosominu.php">Váy,đầm</a></li>
            </ul>
            
            <h3 style="margin-top:10px; margin-left:-36px;">Quần áo nam</h3>
            <ul>
            	<li><a href="aosominam.php">Thời trang nam</a> </li>
                <li><a href="aosominam.php">Áo thun nam </a></li>
                <li><a href="aosominam.php">Áo khoác,vest nam</a></li>
                <li><a href="aosominam.php">Quần jean,quần âu</a></li>
            </ul>
        </div>
        <div id="lh_1">
            <div id="lg_lh"><p>Liên Hệ Hỗ Trợ</p></div>
            <img src="images/images/giolamviec.png" width='200px' height='100px' style="margin-bottom: 20px;" />
         </div>
        </div>

        <?php
        function paginate($index, $total, $limit, $param = null){
            $page = ceil($total/$limit);
            echo '<div class="paginate">';
            for($i = 1; $i <= $page; $i++){
               if($index == $i){
                echo'<span class="active">'.$i.'</span>';
               } else {
                echo'<a href="?'.$param.'&page='.$i.'"><span>'.$i.'</span></a>';
               }
            }
            echo '</div>';
        }
        ?>