<?php
    session_start();
    $id=$_GET['id'];
    if(isset($_SESSION['giohang'][$id])){
        $soluong=$_SESSION['giohang'][$id]+1;
    }
    else {
        $soluong=1;
    }
    $_SESSION['giohang'][$id]=$soluong;
    header("location: giohang.php");
    
?>
