<?php include('file_cat/top.php'); ?>
<?php
	if($user){
		header("location: index.php");
	}
	$ho=$ten=$mail=$matkhau=$nhaplai=$ngay=$thang=$nam=$gt=$phone=$diachi= null;
	$loi = $tc = array();
	$loi['msg'] = $tc['msg' ]= null;
	if(isset($_POST["submit"])){
		//khai bao xem nguoi dung da nhap username chua
		if($_POST['ho']=="" || $_POST['ten']=="" ||$_POST['mail']=="" || 
		$_POST['password']=="" || $_POST['password2']=="" || $_POST['ngay']=="ngay"||
		$_POST['thang']=="thang" || $_POST['nam']=="nam" || $_POST['gt']=="" || $_POST['phone']=="" || $_POST['diachi']==""){
			$loi['msg'] = 'Xin vui lòng điền đầy đủ thông tin';
		}
		else {
			$ho=$_POST['ho'];
			$ten=$_POST['ten'];
			$mail=$_POST['mail'];
			$matkhau=$_POST['password'];
			$nhaplai=$_POST['password2'];
			$ngay=$_POST['ngay'];
			$thang=$_POST['thang'];
			$nam=$_POST['nam'];
			$gt=$_POST['gt'];
            $phone=$_POST['phone'];
            $diachi=$_POST['diachi'];
			}
		if(strlen($matkhau) < 6){
			$loi['msg'] = 'Mật khẩu phải ít nhất 6 kí tự';
		}
		elseif($matkhau!=$nhaplai){
			$loi['msg'] = 'Hai mật khẩu không giống nhau';
		}
		elseif($ho && $ten && $matkhau && $mail && $ngay && $thang && $nam && $phone && $diachi){
            if(isset($_POST['submit'])){
            $result=mysql_query("select* from user where mail='$mail'");
            if (mysql_num_rows($result)==0){
            $sql="insert into user (ho,ten,mail,matkhau,ngaysinh,gioitinh,phone,diachi,level) value ('$ho','$ten','$mail','$matkhau','$nam/$thang/$ngay','$gt','$phone','$diachi',1)";
                if (mysql_query($sql)){
                        $tc['msg'] = 'Đăng kí tài khoản thành công';
                    }
                  }  
             else {
                $loi['msg'] = 'Tài khoản người dùng đã được sử dụng'; 
                  }           
    				
	    }
        }
        }
		?>
	<div id="content-center">
		<div id="login">
			<span class="title">Đăng ký</span>
			<form method="post">
			<?php
            if(!is_null($loi['msg'])){
                echo '<div class="alert alert-danger">'.$loi['msg'].'</div>';
            }
            if(!is_null($tc['msg'])){
                echo '<div class="alert alert-success">'.$tc['msg'].'</div>';
            }
			?>
				<input type="text" placeholder="Email" name="mail">
				<input type="password" placeholder="Mật khẩu" name="password">	
				<input type="password" placeholder="Nhập lại mật khẩu" name="password2">	
				<input type="text" placeholder="Họ" name="ho">
				<input type="text" placeholder="Tên" name="ten">
				<input type="text" placeholder="Số điện thoại" name="phone">
				<div class="inline">
				<select name="ngay">
					<option value="ngay">Ngày</option>
					<?php 
					for($a=1;$a<=31;$a++){
						echo "<option value='$a'>$a</option>";			
						}
				?>
				</select>
				<select name="thang">
					<option value="thang">Tháng</option>
					<?php 
					for($b=1;$b<=12;$b++){
						echo "<option value='$b'>$b</option>";			
						}
				?>
				</select>
				<select name="nam">
					<option value="nam">Năm</option>
					<?php 
					for($c=1960;$c<=2016;$c++){
						echo "<option value='$c'>$c</option>";			
						}
				?>
				</select>
				</div>
				<div class="inline">
				<input type="radio" name="gt" value="0"> Nữ
				<input type="radio" name="gt" value="1"> Nam
				</div>
				<input type="text" placeholder="Địa chỉ" name="diachi" />
				<p>
					<input type="submit" name="submit" value="Đăng ký" class="btn btn-success" />
			</form>
		</div>
	</div>
	<?php
include ('file_cat/footer.php');
?>