<div class="container">
	<div class="admin-container">
		<h1>Chill User管理ページ</h1>
		<!-- SHow Message -->
		<?php foreach ($err_msg as $value) : ?>
		<div class="err-msg-container">
			<p class="err-msg">
				<?php echo $value; ?>
			</p>
		</div>
		<?php endforeach; ?>
		<?php foreach ($msg as $value) : ?>
		<p class="msg">
			<?php echo $value; ?>
		</p>
		<?php endforeach; ?>

		<div>
			<a class="nemu" href="./logout.php">ログアウト</a>
		</div>
		<h2>User情報一覧</h2>
		<table>
			<tr>
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
			<tr class="status-false">
				<?php } else { ?>
			<tr>
				<?php } ?>

				<td class="name_width">
					<?php echo $value['user_name']; ?>
				</td>
				<td class="email-width">
					<?php echo $value['email']; ?>
				</td>
				<td class="tel-width">
					<?php echo $value['tel']; ?>
				</td>
				<!-- <td class="status-width"><?php echo $value['status']; ?>
				</td> -->
				<td class="status-width">
					<?php if ($value['status'] === '1') {
					    echo 'Public';
					} elseif ($value['status'] === '0') {
					    echo 'Private';
					}?>
				</td>
				<td class="date">
					<?php echo substr($value['created_at'], 0, -3); ?>
				</td>
				<td class="date">
					<?php echo substr($value['updated_at'], 0, -3); ?>
				</td>
				<!-- Here -->
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
				<!-- <pre>
				<?php var_dump($value['user_id']) ?>
				</pre> -->
			</tr>
			<?php } ?>
		</table>
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
