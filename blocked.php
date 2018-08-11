<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}

?>


<?php include './connection/api.php';?> 
<?php include './connection/actions/unblock_user.php';?>
<html>
<head>

	<?php include('./include/header.php'); ?>
</head>
<body>
	<?php include('./include/navigation_bar.php'); ?>

	<div class='container-fluid'>

		<div class='row'>
			<div class='col-3'>
			</div>

			<div class='col-6'>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col"></th>
						</tr>
					</thead>

					<tbody>
						<?php $result = get_blocked_user()   ?>
                        <?php while($res=mysqli_fetch_assoc($result)){?>
                        	<tr>
                        	<td><?php echo $res['blocked_user_id']?></td>
                        	<td><?php echo $res['email'] ?></td>
                        	<td><form method='post'>
                        		<input type="hidden" name="blocked_user_id" value='<?php echo $res['blocked_user_id']?>'>
                        		<button class="btn btn-success btn-sm" name="btn-unblock" id="btn-unblock" >Unblock
                        		</button>
                        	</form></td>
                        	</tr>

                        <?php } ?>

					</tbody>
				</table>

				</div>


				<div class='col-3'>


				</div>


			</div>


		</div>


	</body>
	</html>