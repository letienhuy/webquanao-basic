<?php
    $id=$_GET['id'];
    $id2=$_GET['id2'];
    include('../ketnoi.php');
    if($query=mysql_query("delete from hoadon where id_hoadon='$id'") && $query=mysql_query("delete from chitiet_hoadon where id_hoadon='$id2'") ){
        echo "Xoa thanh cong";
        header("location:quanlydonhang.php");
    }
    else{
        echo "xay ra loi";
    }
?>