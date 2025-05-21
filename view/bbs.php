<?php require VIEW_COMPONENT_PATH . 'bbsNavbar.php';
; ?>

<div class="contents">
	<div class="container">
		<main>
			<div class="avatar">
				<img class="avatar-icon" src="<?php echo $icon_data[0]['img'];?>">
			</div>

			<form method="post" enctype="multipart/form-data">
				<div class="text">
					<textarea class="comment" type="text" name="comment" placeholder="What's happening?"></textarea>
				</div>
				<div class="img-up">
					<!-- <i class="far fa-images"></i> -->
					<input type="file" name="new_img" value="" accept='.png,.jpeg,.jpg'>
				</div>

				<?php foreach ($err_msg as $value) : ?>
					<div class="err-msg-container">
						<p class="err-msg"><?php echo $value; ?>
						</p>
					</div>
					<?php endforeach; ?>
					<?php foreach ($msg as $value) : ?>
					<p class="msg"><?php echo $value; ?>
					</p>
				<?php endforeach; ?>

				<input type="hidden" name="sql_kind" value="insert">
				<div class="btn">
					<input type="submit" name="submit" value="Submit" class="add">
				</div>
			</form>

			<p class="result">
				<span><?php echo count($result_data); ?></span>tweets
			</p>

			<?php foreach ($data as $value) : ?>
			<form method="post" class="delete_form">
				<div class="comment-all">
					<div>
						<div class="user">
							<img class="user_icon" src="<?php echo $value['iconImg'];?>">
							<span class="name">
								<?php echo $value['user_name']; ?>
							</span>
						</div>
						<span
							class="date"><?php echo $value['date']; ?>
						</span>
					</div>
					<div class="comment-text">
						<div>
							<span><?php echo $value['comment']; ?></span>
						</div>
						<div>
							<?php if ($value['img'] !== "") : ?>
							<img src="<?php echo $value['img']; ?>"
								class="img-size">
							<?php endif; ?>
						</div>
						<!-- Delete Button -->
						<?php if ($value['user_id'] === $user_id) : ?>
							<input type="submit" value="&#xf2ed;" class="btn-del fas">
							<input type="hidden" name="comment_id"
								value="<?php echo $value['comment_id']; ?>">
							<input type="hidden" name="sql_kind" value="delete">
						<?php endif; ?>
					</div>
				</div>
			</form>
			<?php endforeach; ?>

			<div class="pagination">
				<?php if ($page > 1) : ?>
				<div class="back">
					<a class="page"
						href="?page=<?php echo($page - 1); ?>">Back<i
							class="fas fa-backward"></i>
					</a>
				</div>
				<?php endif; ?>
				<?php if ($page * $pageNum < count($result_data)) : ?>
					<div class="next">
						<a class="page"
							href="?page=<?php echo($page + 1); ?>">Next<i
								class="fas fa-forward"></i>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</main>
	</div>
</div>

<script>
	'use strict';

	$(function() {
		$('.delete_form').submit(function() {
			return confirm("Tweetを削除しますか?");
		});
	});
</script>
