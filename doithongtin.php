<?php include('file_cat/top.php'); ?>
<?php
	if(!$user){
		header("location: index.php");
	}
	$ho=$ten=$mail=$ngay=$thang=$nam=$gt=$phone=$diachi= null;
	$loi = $tc = array();
	$loi['msg'] = $tc['msg' ]= null;
	if(isset($_POST["submit"])){
		if($_POST['ho']=="" || $_POST['ten']==""  ||  $_POST['ngay']=="ngay"||
		$_POST['thang']=="thang" || $_POST['nam']=="nam" || $_POST['gt']=="" || $_POST['phone']=="" || $_POST['diachi']==""){
			$loi['msg'] = 'Xin vui lòng điền đầy đủ thông tin';
		}
		else {
			$ho=$_POST['ho'];
			$ten=$_POST['ten'];
			$ngay=$_POST['ngay'];
			$thang=$_POST['thang'];
			$nam=$_POST['nam'];
			$gt=$_POST['gt'];
            $phone=$_POST['phone'];
            $diachi=$_POST['diachi'];
			}
			if($ho && $ten  && $ngay && $thang && $nam && $phone && $diachi){
				if(isset($_POST['submit'])){
					$sql="update user set ho='$ho', ten='$ten', ngaysinh='$nam-$thang-$ngay', gioitinh='$gt', phone='$phone', diachi='$diachi' where ID = '{$user['ID']}'";
					if (mysql_query($sql)){
							$tc['msg'] = 'Thông tin mới đã được lưu thành công';
						} else {
							$loi['msg'] = 'Có lỗi xảy ra, xin vui lòng thử lại'; 
						}  
				}
        }
    }
		?>
	<div id="content-center">
		<div id="login">
			<form method="post">
				<?php
            if(!is_null($loi['msg'])){
                echo '<div class="alert alert-danger">'.$loi['msg'].'</div>';
            }
            if(!is_null($tc['msg'])){
                echo '<div class="alert alert-success">'.$tc['msg'].'</div>';
			}
			$ngaysinh = explode('-', $user['ngaysinh']);
			?>
			<span class="title">Thay đổi thông tin</span>
					<input type="text" placeholder="Họ" name="ho" value="<?php echo $user['ho'];?>">
					<input type="text" placeholder="Tên" name="ten"  value="<?php echo $user['ten'];?>">
					<input type="text" placeholder="Số điện thoại" name="phone"  value="<?php echo $user['phone'];?>">
					<div class="inline">
						<select name="ngay">
							<option value="ngay">Ngày</option>
							<?php 
					for($a=1;$a<=31;$a++){
						if($a == $ngaysinh[2])
							echo "<option value='$a' selected>$a</option>";	
						else
							echo "<option value='$a'>$a</option>";												
						}
				?>
						</select>
						<select name="thang">
							<option value="thang">Tháng</option>
							<?php 
					for($b=1;$b<=12;$b++){
						if($b == $ngaysinh[1])
							echo "<option value='$b' selected>$b</option>";	
						else
							echo "<option value='$b'>$b</option>";												
						}
				?>
						</select>
						<select name="nam">
							<option value="nam">Năm</option>
							<?php 
					for($c=1960;$c<=2016;$c++){
						if($c == $ngaysinh[0])
							echo "<option value='$c' selected>$c</option>";	
						else
							echo "<option value='$c'>$c</option>";												
						}
				?>
						</select>
					</div>
					<div class="inline">
						<input type="radio" name="gt" value="0" <?php if(!$user['gioitinh']) echo 'checked';?>> Nữ
						<input type="radio" name="gt" value="1"  <?php if($user['gioitinh']) echo 'checked';?>> Nam
					</div>
					<textarea name="diachi"> <?php echo $user['diachi'];?></textarea>
					<p>
						<input type="submit" name="submit" value="Lưu thông tin" class="btn btn-success" />
			</form>
		</div>
	</div>
	<?php
include ('file_cat/footer.php');
?>