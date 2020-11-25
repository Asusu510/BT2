


<?php require "./views/layouts/header.php"; ?>
 <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thêm mới user</h3>
		</div>
		
		<div class="panel-body">
			<?php if(isset($_SESSION['error'])) :?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Lỗi !!</strong> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
				</div>
			<?php endif ?>
			<form action="index.php?controllerName=UserController&action=store" method="POST" role="form">
				
				
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" id="" placeholder="Tên " name="name">
					<?php if(isset($error['name'])) :?>
						<p class="text-danger"><?php echo $error['name']; ?></p>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" id="" placeholder="Email " name="email">
					<?php if(isset($error['email'])) :?>
						<p class="text-danger"><?php echo $error['email']; ?></p>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" id="" placeholder="Mật khẩu " name="password">
					<?php if(isset($error['password'])) :?>
						<p class="text-danger"><?php echo $error['password']; ?></p>
					<?php endif; ?>

				</div>
				<div class="form-group">
					<label for="">Address</label>
					<input type="text" class="form-control" id="" placeholder="Địa chỉ " name="address">
					<?php if(isset($error['address'])) :?>
						<p class="text-danger"><?php echo $error['address']; ?></p>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="">Birthday</label>
					<input type="date" class="form-control" id="" placeholder="Năm sinh " name="birthday">
					<?php if(isset($error['birthday'])) :?>
						<p class="text-danger"><?php echo $error['birthday']; ?></p>
					<?php endif; ?>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="gender"  value="1" checked >
						male
					</label>
					<label>
						<input type="radio" name="gender"  value="0" >
						female
					</label>
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="index.php?controllerName=UserController&action=index" class="btn btn-success">Quay về</a>
			</form>
		</div>
	</div>
</div>

<?php require "./views/layouts/footer.php"; ?>