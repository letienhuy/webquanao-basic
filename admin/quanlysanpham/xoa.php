<?php
    include("../ketnoi.php");
    $id=$_GET['id'];
    $sql="delete from sanpham where id='$id'";
    if (mysql_query($sql))
    header("location:quanlysanpham.php")
?>