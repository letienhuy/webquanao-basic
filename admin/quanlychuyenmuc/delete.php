<?php
    include("../ketnoi.php");
    $id=$_GET['id'];
    $sql="delete from chuyenmuc where chuyenmuc_id='$id' ";
    if(mysql_query($sql)){
        echo 'Xóa thành công';
        header("location:quanlychuyenmuc.php");
    }
    else {
        echo "Xãy ra l?i";
    }
?>