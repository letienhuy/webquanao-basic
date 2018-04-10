<?php
    include('file_cat/top.php');
    $loi=array();
    $loi['user']=$loi['email']=$loi['tieude']=$loi['textarea']=$loi['gui']=null;
    $user=$email=$tieude=$textarea=null;
    if(isset($_POST['ok'])){
        if($_POST['user']==null){
            $loi['user']='* Xin vui lòng điền họ và tên';
        }
        else{
            $user=$_POST['user'];
        }
        if($_POST['email']==null){
            $loi['email']='* Xin vui lòng điền email';
        }
        else{
            $email=$_POST['email'];
        }
        if($_POST['tieude']==null){
            $loi['tieude']='* Xin vui lòng điền tiêu đề';
        }
        else{
            $tieude=$_POST['tieude'];
        }
        if($_POST['textarea']==null){
            $loi['textarea']='* Xin vui lòng điền nội dung';
        }
        else{
            $textarea=$_POST['textarea'];
        }
       if($user & $email & $tieude & $textarea){
            $sql="insert into lienhe (hoten,email,tieude,noidung) values ('$user','$email','$tieude','$textarea')";
            if(mysql_query($sql)){
                $loi['gui']='* Gửi thư thành công';
            }
            else {
                echo "Xay ra loi";
            }

       } 
    }
?>
   	
    <div id="lienhe">
        <div id="lienhe_top"><p>Liên hệ với chúng tôi</p></div>
        <div style="margin-top: 20px; margin-left: 8px;;"><p>Tất cả các thông tin được đánh dấu * là bắt buộc.</p></div>
        <form method="post" action="">
        <table id="table_lh">
            <tr>
                <td>Họ và tên *</td>
            </tr>
            <tr>
                <td><input  type="text" name="user"/></td>
                <td style="color: red;"><?php echo $loi['user']; ?></td>
            </tr>
                <tr>
                <td>Email *</td>
            </tr>
            <tr>
                <td><input  type="email" name="email"/></td>
                   <td style="color: red;"><?php echo $loi['email']; ?></td>
            </tr>
                <tr>
                <td>Tiêu đề *</td>
            </tr>
            <tr>
                <td><input  type="text" name="tieude"/></td>
                   <td style="color: red;"><?php echo $loi['tieude']; ?></td>
            </tr>
                <tr>
                <td>Nội dung *</td>
            </tr>
            <tr>
                <td><textarea name="textarea"></textarea></td>
                   <td style="color: red;"> <?php echo $loi['textarea']; ?></td>
            </tr>
            <tr>
                <td><input type="submit" name="ok" value="Gửi" style="width: 100px; height: 35px; margin-top: 25px;"/></td>
            </tr>
            <tr>
                <td style="color:#00FF40;"><?php echo $loi['gui'];?></td>
            </tr>
        </table>
        </form>
    </div>
    
<?php 
    include('file_cat/footer.php');
?>