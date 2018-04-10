<?php
    session_start();
?>
<?php
    include('file_cat/top.php');
        if(isset($_POST['submit']))
        {
        foreach($_POST['now'] as $k=>$v)
            {
        if( $v == 0)
                {
        unset ($_SESSION['giohang'][$k]);
             }
        else if($v > 0 )
                {
        $_SESSION['giohang'][$k]=$v;
                }
            }
        header("location:giohang.php");
        }
?>

	
<div id="giohang">
    <div style="border-radius:5px ;color:white; font-size: 20px; font-weight:bold; background-color:rgb(123, 123, 198); text-align: center; width: 520px ; height: 50px;margin-left: 9px;
margin-top: 20px; line-height: 50px;">
        <p>GIỎ HÀNG</p>
    </div>
    <form action="" method="post">
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th width='50px'>Số lượng</th>
            <th>Tổng tiền</th>
            <th width='60px'>Xóa Sản phẩm</th>
        </tr>
        <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
            $mangid=array();
            $thanhtien=null;
            $ok=1;
            if(isset($_SESSION['giohang'])){
             foreach($_SESSION['giohang'] as $key=>$value){
                if(isset($key)){
                    $ok=2;
                }
            }
            }
            if($ok==2){
             foreach($_SESSION['giohang'] as $key=>$value){
                $mangid[]=$key;
                }
            $mangid2=implode($mangid,',');
            $sql="select * from sanpham where id in ($mangid2)";
            $query=mysql_query($sql);
            while($row=mysql_fetch_assoc($query)){
            $anh=$row['hinhanh'];
			$thanhtien+=$_SESSION['giohang'][$row['id']]*$row['gia'];
            $gia=number_format($row['gia'],3).' đ';
            $tensp=$row['tensp'];
            $soluong+=$_SESSION['giohang'][$row['id']];
            
        echo "<tr>";
           echo "<td><a href=thongtinsp.php?id=$row[id]>$row[tensp]</a></td>";
           echo  "<td><img src='admin/quanlysanpham/$anh' width='100px' height='60px' style='border-radius:6px'></td>";
           echo "<td>".number_format($row[gia],3)." đ</td>";
           
           echo "<td><input type='text' name='now[$row[id]]' value=".$_SESSION[giohang][$row[id]]." style='width: 70px; text-align: center;'/></td>";
           
           echo "<td>".number_format($_SESSION[giohang][$row[id]]*$row[gia],3)." đ</td>";
           echo "<td><a href='xoagh.php?id=$row[id]'><img  id='img' src='images/images/delete-24.ico'/></a></td>";
        echo "</tr>";
                }
        
          $_SESSION['tien']=$thanhtien;
        echo "<tr style='background: white;'>" ;  
        echo "    <td colspan='2'><a href='index.php' style='text-decoration: none;font-size: 15px; font-weight: bold; '><div id='shop'>Tiếp tục mua hàng</div></a></td>";
        echo    "<td colspan='1'></td>";
        echo    "    <td colspan='3' style='text-align: center; color: red; font-weight: bold;'>Thành Tiền : ".number_format($thanhtien,3)." đ </td>";
        echo    "</tr>";
        echo    "<tr style='background: white;'>";
        echo    "<td colspan='3'><a href='xoagh.php?id=0' id='dl_all'>Delete All</a> <input type='submit' name='submit' value='Cập nhật' id='capnhat_gh'></td>";
        echo    "    <td colspan='3'><div id='thtt'><a href='thanhtoan.php'>Tiến hành đặt hàng</a></div></td>";
        echo    "</tr>"; 
        }
        else {
            echo '<tr><td colspan="6">Giỏ hàng của bạn đang trống!</td></tr>';
        }
        ?>
    </table>
    </form>
</div>
<?php
    include('file_cat/footer.php');
?>