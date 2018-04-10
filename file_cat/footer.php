

<div id="content-right">
<?php
    include('ketnoi.php');
    $sql="select* from quangcao ORDER BY id DESC";
    $query = mysql_query($sql);
    while($row=mysql_fetch_assoc($query)){
    
?>
    <div class="img1" ><a href="#"><img src='<?php echo "$row[tenanh]"; ?>' width="180px" height="230"></a></div>
<?php } ?>    
</div>
        </div>
        <div id="footer">
        	<div class="bottom">
                <ul>
                	<h3>VỀ CHÚNG TÔI</h3>
                	<li><a href="#">Giới thiểu về NgocHieuShop</a></li>
                    <li><a href="#">Quy chế hoạt động</a></li>
                    <li><a href="#">Các mức chế tài vi phạm</a></li>
                </ul>
            </div>
            <div class="bottom">
            	
                <ul>
                	<h3>DÀNH CHO NGƯỜI MUA</h3>
                	<li><a href="#">Bảo vệ người mua</a></li>
                    <li><a href="#">Quy định đối với người mua</a></li>
                    <li><a href="#">Giải quyết khiếu nại</a></li>
                    <li><a href="#">Hướng dẫn người mua</a></li>
                </ul>
            </div>
            <div class="bottom">
            	
                <ul>
                	<li><h3>DÀNH CHO NGƯỜI BÁN</h3></li>
                	<li><a href="#">Mở shop trên fanshop</a></li>
                    <li><a href="#">Quy định đối với người bán</a></li>
                    <li><a href="#">Chính sách bán hàng</a></li>
                    <li><a href="#">Hệ thông kiểm duyệt</a></li>
                </ul>
            </div>
            <div class="bottom" id="footer-right">
            	
                <ul>
                	<li><h3>Copyright © <?php echo date('Y'); ?> NgocHieuShop</h3></li>
                	<li><a href="#">Địa chỉ: Km12 Phú Diễn, Từ Liêm, Hà Nội.
</a></li>
                    <li><a href="#">Số ĐKKD: 123456789</a></li>
                </ul>
            </div>
        </div>
</body>
</html>
<?php ob_end_flush(); ?>