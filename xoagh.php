<?php
    session_start();
    $id=$_GET['id'];
    
    if(isset($_SESSION['giohang'])){
    if($id == 0 ){
		unset($_SESSION['giohang']);	
		header('location: giohang.php');	
				}
	else{	
        unset($_SESSION['giohang'][$id]);
        header('location: giohang.php');
		}
    }
    else{
        header('location: giohang.php');
    }
?>