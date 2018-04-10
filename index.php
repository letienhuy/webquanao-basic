<?php include('./file_cat/top.php'); ?>
         <div id="content-center">
            <div class="sanpham">
                <span class="title">Sản phẩm mới</span>
           	    <ul>
                    <?php
                         $start = 0;
                         $limit = 9;
                         $total = mysql_num_rows(mysql_query("select * from sanpham"));
                         if(isset($_GET['page'])){
                             if($_GET['page'] <= 1){
                                 $_GET['page'] = 1;
                             }
                             $start = ($_GET['page']-1)*$limit;
                         } else {
                             $_GET['page'] = 1;
                         }
                        $sql="select * from sanpham order by ID limit $start, $limit";
                        $query=mysql_query($sql);
                        while($row=mysql_fetch_assoc($query)){
                            
                    ?>
                	<li><a href="thongtinsp.php?id=<?php echo $row['id']?>"><img src="<?php echo 'admin/quanlysanpham/'.$row['hinhanh']?>" width="130" height="150"/><p align="center"><?php echo $row['tensp']?> </p><hr><p align="center" style="color: red;"><?php echo $row['gia']?>đ</p></a></li>
                    <?php } ?> 
                </ul>
                <?php paginate($_GET['page'], $total, $limit); ?>
                <span class="title">Sản phẩm bán chạy</span>
           	    <ul>
                    <?php
                        $sql="select * from sanpham where chuyenmuc_id=5 order by rand() limit 9";
                        $query=mysql_query($sql);
                        while($row=mysql_fetch_assoc($query)){
                            
                    ?>
                	<li><a href="thongtinsp.php?id=<?php echo $row['id']?>"><img src="<?php echo 'admin/quanlysanpham/'.$row['hinhanh']?>" width="130" height="150"/><p align="center"><?php echo $row['tensp']?> </p><hr><p align="center" style="color: red;"><?php echo $row['gia']?>đ</p></a></li>
                    <?php } ?> 
                </ul>
               <span class="title">Sản phẩm hot</span>
               <ul>
                	     <?php
                        $sql="select * from sanpham where chuyenmuc_id=4 order by rand() limit 9";
                        $query=mysql_query($sql);
                        while($row=mysql_fetch_assoc($query)){
                            
                         ?>
                    <li><a href="thongtinsp.php?id=<?php echo $row['id']?>"><img src="<?php echo 'admin/quanlysanpham/'.$row['hinhanh']?>" width="130" height="150"/><p align="center"><?php echo $row['tensp']?> </p><hr><p align="center" style="color: red;"><?php echo $row['gia']?>đ</p></a></li>
                        <?php } ?>              
               </ul>
                
            </div>
         </div>
         <?php include('./file_cat/footer.php'); ?>
