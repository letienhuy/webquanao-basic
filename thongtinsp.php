<?php
    include("file_cat/top.php");
    $id=$_GET['id'];
    $sql="select * from sanpham"
?>
    
    <?php
                    $sql="select * from sanpham where id='$id' ";
                    $query=mysql_query($sql);
                    while($data=mysql_fetch_assoc($query)){
     
    ?>
    <div id="content-center">
        <div id="menu_sp">
            <span> <?php echo $data['tensp'];?></span>
        </div>
        <div id="sp_01">
            <div id="sp_01_1">
                <img src="admin/quanlysanpham/<?php echo $data['hinhanh']?>" width="210px" height="280px"/>
            </div>
            <div id="sp_01_2">
                <span class="namesp">Sản phẩm - <?php echo $data['tensp'];?></span>
                <span class="price">Giá : <?php echo $data['gia'];?> đ</span>
                <a href="themgiohang.php?id=<?php echo $data['id']?>">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i>  THÊM VÀO GIỎ HÀNG</button>
                </a>
            </div>
        </div>
        <div id="tt_1">
        <span class="title">Thông tin sản phẩm</span>
        <ul>
            <li>Chất liệu  : <?php echo $data['chatlieu'];?></li>
            
            <li>Năm sản xuất : <?php echo $data['namsx'];?></li>
            
            <li>Xuất xứ : <?php echo $data['xuatxu'];?></li>
            
            <li>Màu sắc : <?php echo $data['mausac'];?> </li>
            
            <li>Kích thước :  <?php echo $data['kichthuoc'];?> </li>
            <?php } ?>
        </ul>
        </div>
    </div>

<?php
    include("file_cat/footer.php");
?>