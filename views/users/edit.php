

<?php require "./views/layouts/header.php"; ?>
 <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Sửa user</h3>
		</div>
		
		<div class="panel-body">
			<?php if(isset($_SESSION['error'])) :?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Lỗi !!</strong> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
				</div>
			<?php endif ?>
			<form action="index.php?controllerName=UserController&action=update&id=<?php echo $user['id'] ?>" method="POST" role="form">
				
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" id="" placeholder="Tên " name="name" value="<?php echo $user['name'] ?>">
					<?php if(isset($error['name'])) :?>
						<p class="text-danger"><?php echo $error['name']; ?></p>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" id="" placeholder="Email " name="email"  value="<?php echo $user['email'] ?>">
					<?php if(isset($error['email'])) :?>
						<p class="text-danger"><?php echo $error['email']; ?></p>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="">Address</label>
					<input type="text" class="form-control" id="" placeholder="Địa chỉ " name="address" value="<?php echo $user['address'] ?>">
					<?php if(isset($error['address'])) :?>
						<p class="text-danger"><?php echo $error['address']; ?></p>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="">Birthday</label>
					<input type="date" class="form-control" id="" placeholder="Năm sinh " name="birthday" value="<?php echo $user['birthday'] ?>">
					<?php if(isset($error['birthday'])) :?>
						<p class="text-danger"><?php echo $error['birthday']; ?></p>
					<?php endif; ?>
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="index.php?controllerName=UserController&action=index" class="btn btn-success">Quay về</a>
			</form>
		</div>
	</div>
</div>

<?php require "./views/layouts/footer.php"; ?>
