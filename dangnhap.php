<?php include('file_cat/top.php'); ?>
<?php
	if($user){
		header("location: index.php");
	}
	$mail = $pass= null;
	$loi  = array();
	$loi['msg'] =  null;
	if(isset($_POST["submit"])){
		//khai bao xem nguoi dung da nhap username chua
		if($_POST['mail']==""){
			$loi['msg'] = 'Xin vui lòng nhập email';
		} elseif($_POST['pass']==""){
			$loi['msg'] = 'Xin vui lòng nhập mật khẩu';
		}
		else {
			$mail=$_POST['mail'];
			$pass=$_POST['pass'];
		}
		if($mail && $pass){
            $result=mysql_query("select* from user where mail='$mail' and matkhau='$pass'");
            if (mysql_num_rows($result)==0){
				$loi['msg'] = 'Tài khoản này không tồn tại'; 
                  }  
             else {
				$data = mysql_fetch_array($result);
				$_SESSION['userid'] = $data['ID'];
				if($data['level'] == 2){
					$_SESSION['level'] = 2;
					header("location: admin/index.php");
				} else {
					header("location: index.php");
				}                
        	}           			
	    }
    }
		?>
	<div id="content-center">
		<div id="login">
			<span class="title">Đăng nhập</span>
			<form method="post">
			<?php
            if(!is_null($loi['msg'])){
                echo '<div class="alert alert-danger">'.$loi['msg'].'</div>';
            }
			?>
				<input type="text" placeholder="Email" name="mail">
				<input type="password" placeholder="Mật khẩu" name="pass">
				<input type="submit" name="submit" value="Đăng nhập" class="btn btn-success" />
			</form>
		</div>
	</div>
	<?php
include ('file_cat/footer.php');
?>