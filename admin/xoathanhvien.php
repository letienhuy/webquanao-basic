<?php
    include("ketnoi.php");
    $id=$_GET['id'];
    $sql="delete from user where id='$id'";
    if(mysql_query($sql)){
        echo 'Xóa Xong';
        header("location:quanlythanhvien.php");
    }
    else{
        echo "Xảy ra lỗi";
    }
?>