<?php
    include('file_cat/top.php');
?>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <div id="timkiem">
      <div id="top_tk">Kết quả tìm kiếm</div>
        <?php
            $timkiem=$_GET['timkiem'];
            $start = 0;
            $limit = 9;
            $total = mysql_num_rows(mysql_query("select * from sanpham where tensp like '%$timkiem%'"));
            if(isset($_GET['page'])){
                if($_GET['page'] <= 1){
                    $_GET['page'] = 1;
                }
                $start = ($_GET['page']-1)*$limit;
            } else {
                $_GET['page'] = 1;
            }
            $query=mysql_query("select * from sanpham where tensp like '%$timkiem%' limit $start, $limit");
            if(mysql_num_rows($query)==0 ){
                echo "<div id='tb_tk1'>Không có kết quả tìm kiếm với từ khóa: <font color='red'>'$timkiem'</div>";
            }
            else if($timkiem== null){
                echo "<div id='tb_tk2'>Bạn chưa nhập nội dung vào thanh tìm kiếm</div>";
            }
            else {
                $number=mysql_num_rows($query);
                echo "  <h3>Tìm thấy <font color='red'>$total </font>sản phẩm với từ khóa: <font color='red'>'$timkiem'</font></h3>";
            echo " <div class='sanpham'>";
                 echo"<ul>";
                 while ($row=mysql_fetch_assoc($query)){
                    echo "<li><a href='thongtinsp.php?id=$row[id]'><img src='admin/quanlysanpham/$row[hinhanh]' width='130' height='150'/><p align='center'>$row[tensp]</p><p align='center' style='color: red;'>$row[gia]</p></a></li>";
                 }
                echo "</ul>";
                paginate($_GET['page'], $total, $limit, "timkiem=$timkiem");
            echo "</div>";
            }
      
        ?>
    </div>
<?php
    include('file_cat/footer.php');
?>