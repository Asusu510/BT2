
<?php require "./views/layouts/header.php"; ?>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary ">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách user</h3>

		</div>
		<div class="panel-body">
			<a href="index.php?controllerName=UserController&action=create" class="btn btn-success pull-right">Thêm mới</a>
			
		</div>
	
		<table class="table table-bordered ">
			<thead>
				<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Gender</th>
						<th>Birthday</th>
						<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($users)) : ?>
					<?php foreach($users as $user) : ?>
						<tr>
							<td><?php echo $user['id'] ?></td>
							<td><?php echo $user['name'] ;?></td>
							<td><?php echo $user['email'] ;?></td>
							<td><?php echo $user['address'] ?></td>
							<td>
								<span class="btn btn-xs">
									<?php echo $user['gender']  == 1 ? 'Nam' : 'Nữ'?>
										
								</span>
							</td>
							<td><?php echo $user['birthday'] ?></td>
							<td>
								<a href="index.php?controllerName=UserController&action=edit&id=<?php echo $user['id']?>" class="btn btn-info">Sửa</a>
								<a href="index.php?controllerName=UserController&action=delete&id=<?php echo $user['id'] ?>" class="btn btn-danger">Xóa</a>
								

							</td>
						</tr>
					<?php endforeach; ?>
				<?php  endif ?>
			</tbody>
		</table>
	
	</div>

</div>

<?php require "./views/layouts/footer.php"; ?>
