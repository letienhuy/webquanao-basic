<?php
    include('file_cat/top.php');
    
?>
	
         <div id="content-center">
            <?php
                $id=$_GET['id'];
                $start = 0;
                $limit = 9;
                $total = mysql_num_rows(mysql_query("select * from sanpham  where chuyenmuc_id='$id'"));
                if(isset($_GET['page'])){
                    if($_GET['page'] <= 1){
                        $_GET['page'] = 1;
                    }
                    $start = ($_GET['page']-1)*$limit;
                } else {
                    $_GET['page'] = 1;
                }
                $sql="select * from chuyenmuc where chuyenmuc_id='$id' limit $start, $limit";
                $query=mysql_query($sql);
                while($row=mysql_fetch_assoc($query)){
                    
            ?>
         	<div id="quangcao"><?php echo $row['chuyenmuc']?></div>
            <?php
                }
            ?>
            <div class="sanpham">
            	<ul>
                    <?php
                       $sql="select * from sanpham  where chuyenmuc_id='$id' order by id desc ";
                       $query=mysql_query($sql);
                       while($row=mysql_fetch_assoc($query)){
                            
                    ?>
                	<li><a href="thongtinsp.php?id=<?php echo $row['id']?>"><img  style="border-radius: 5px;"src="<?php echo 'admin/quanlysanpham/'.$row['hinhanh'];?>" width="130" height="150"/><p align="center"><?php echo $row['tensp']?> </p><p align="center" style="color: red;"><?php echo $row
                    ['gia'];?></p></a></li>
                    <?php
                        }
                    ?>
                </ul>
                
                <?php paginate($_GET['page'], $total, $limit); ?>
            </div>
         </div>
<?php
    include('file_cat/footer.php');
?>
