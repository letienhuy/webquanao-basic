<?php
    include('file_cat/top.php');
    $tc=array();
    $loi=array();
    $name=$phone=$email=$diachi=$b=null;
    $loi['msg']=$tc['msg']=null;
    if(isset($_POST['submit'])){
        if($_POST['name']==null){
            $loi['msg']='Xin vui lòng điền họ và tên';
        }
        else{
            $name=$_POST['name'];
        }
        
        
        if($_POST['phone']==null){
            $loi['msg']='Xin vui lòng nhập số điện thoải';
        }
        else{
            $phone=$_POST['phone'];
        }
        
        
        if($_POST['email']==null){
            $loi['msg']='Xin vui lòng điền email';
        }
        else{
            $email=$_POST['email'];
        }
        
        
        if($_POST['diachi']==null){
            $loi['msg']='Xin vui lòng điền địa chỉ';
        }
        else{
            $diachi=$_POST['diachi'];
        }
        
        
        if($user && $phone && $email && $diachi){
            $price = number_format($_SESSION['tien'],3)." đ";
            if(isset($_SESSION['giohang'])){
            $sql="insert into hoadon (hoten_nm,diachi,email,phone,tongtien) values ('$name','$diachi','$email','$phone','$price')";
            $query=mysql_query($sql);
            $idhd = mysql_insert_id();
            foreach($_SESSION['giohang'] as $key=>$value){
                mysql_query("insert into chitiet_hoadon (id_hoadon,id_sp,soluong) values ('$idhd','$key','$value')");
               }
               $tc['msg']='Bạn đã đặt hàng thành công. Chúng tôi sẽ kiểm tra và gửi hàng cho bạn sớm nhất. Xin cảm ơn!';
            } else{
                $loi['msg']='Có lỗi xảy ra, vui lòng thử lại !';
            }
            unset($_SESSION['giohang']);
        }
    }

?>
    

    <div id="content-center">
        <div style="border-radius:5px ;color:white; font-size: 20px; font-weight:bold; background-color:rgb(123, 123, 198); text-align: center; width: 510px ; height: 50px; line-height: 50px; float: left;">
        <p>ĐẶT HÀNG</p>
    </div>
        <div id="login">
            <form method="post" action="thanhtoan.php">
            <?php
            if(!is_null($loi['msg'])){
                echo '<div class="alert alert-danger">'.$loi['msg'].'</div>';
            }
            if(!is_null($tc['msg'])){
                echo '<div class="alert alert-success">'.$tc['msg'].'</div>';
            }
            ?>
                <label for="">Họ tên người nhận:</label>
                <input type="text" name="name" value="<?php echo $user['ho'].' '.$user['ten']; ?>" >
                <label for="">Số điện thoại:</label>
                <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
                <label for="">Địa chỉ email:</label>
                <input type="text" name="email" value="<?php echo $user['mail']; ?>" >
                <label for="">Địa chỉ nhận hàng:</label>
                <textarea name="diachi"><?php echo $user['diachi']; ?></textarea>
                <label for="">Hình thức thanh toán:</label>
                <input type="radio" checked> Thanh toán khi nhận hàng
                <input class="btn btn-success" type="submit" name="submit" value="ĐẶT HÀNG NGAY"  />    
            </form>
        </div>
    </div>
<?php
    include('file_cat/footer.php');
?>