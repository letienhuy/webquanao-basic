<?php
	session_start();
if($_SESSION['userid']){
	session_destroy();
	header('location:dangnhap.php');
	}
else if($_SESSION['level']){
    unset ($_SESSION['level']);
	header('location:dangnhap.php');
}            
else {
	header('location:dangnhap.php');
	}	
?>