<div class="container">
	<div class="admin-container">
		<h1>Chill Admin</h1>
		<div class="info">
			<!-- SHow Message -->
			<div class="msg-container">
				<?php foreach ($err_msg as $value) : ?>
				<p class="msg">
					<?php echo $value; ?>
				</p>
				<?php endforeach; ?>
				<?php foreach ($msg as $value) : ?>
				<p class="msg">
					<?php echo $value; ?>
				</p>
				<?php endforeach; ?>
			</div>
			<div>
				<a class="nemu" href="./logout.php">Logout</a>
			</div>
		</div>

		<table>
			<tr>
				<th>ID</th>
				<th>User Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Status</th>
				<th>Registered at</th>
				<th>Updated at</th>
				<th>Delete</th>
			</tr>
			<tr>
				<?php foreach ($data as $value) {
				    if($value['status'] === '0') { ?>
			<tr class="private">
				<?php } else { ?>
			<tr>
				<?php } ?>
				<td>
					<?php
				            if ($value['email'] !== $_ENV['DB_ADMIN_EMAIL']) {
				                echo $value['user_id'];
				            }
				    ?>
				</td>
				<td>
					<?php echo $value['user_name']; ?>
				</td>
				<td>
					<?php echo $value['email']; ?>
				</td>
				<td>
					<?php echo $value['tel']; ?>
				</td>
				<td>
					<?php if ($value['status'] === '1') {
					    echo 'Public';
					} elseif ($value['status'] === '0') {
					    echo 'Private';
					}?>
				</td>
				<td>
					<?php echo substr($value['created_at'], 0, -3); ?>
				</td>
				<td>
					<?php echo substr($value['updated_at'], 0, -3); ?>
				</td>
				<!-- Delete Account Button -->
				<form method="post" class="delete_form">
					<td class="delete-width">
						<?php if ($value['email'] !== $_ENV['DB_ADMIN_EMAIL']) : ?>
						<input type="submit" value="&#xf2ed;" class="btn-del fas">
						<input type="hidden" name="user_id"
							value="<?php echo $value['user_id']; ?>">
						<input type="hidden" name="sql_kind" value="delete">
						<?php endif; ?>
					</td>
				</form>
			</tr>
			<?php } ?>
		</table>
	</div>

	<div class="pagination">
		<?php if ($page > 1) : ?>
		<div class="back">
			<a class="page"
				href="?page=<?php echo($page - 1); ?>">Back<i
					class="fas fa-backward"></i>
			</a>
		</div>
		<?php endif; ?>
		<?php if ($page * $pageNum < count($result)) : ?>
			<div class="next">
				<a class="page"
					href="?page=<?php echo($page + 1); ?>">Next<i
						class="fas fa-forward"></i>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>

<script>
	'use strict';

	$(function() {
		$('.delete_form').submit(function() {
			return confirm("このアカウントを削除しますか?");
		});
	});
</script>
