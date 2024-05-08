<header>
	<div class="header-box">
		<div class="header-title">
			<nav class="navbar navbar-expand-md navbar-light">
				<img class="logo d-none d-md-block" src="./img/Chill.png" alt="chill_logo">
				<a href="?page=1" class="navbar-brand">
					<h2>Wanna<i class="fas fa-cocktail"></i>?</h2>
				</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div id="menu" class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<div class="nav-items">
							<li class="nav-item">
								<img class="icon"
									src="<?php echo $icon_data[0]['img'];?>">
							</li>
							<div class="user-items">
								<li class="nav-item">
									<a href="user_edit_control.php"
										class="nav-link"><?php echo $user_name ?>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="./logout.php"><i class="fas fa-sign-out-alt">Logout</i>
									</a>
								</li>
							</div>
						</div>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</header>

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
					<input type="file" name="new_img" value="">
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
				Tweets<?php echo count($result_data); ?>件
			</p>
			<?php foreach ($data as $value) : ?>
			<form method="post" class="delete_form">
				<div class="comment-all">
					<div>
						<span class="name">
							<?php echo $value['user_name']; ?>
						</span><br>
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

			<div class="pasination">
				<?php if ($page > 1) : ?>
				<div class="back">
					<a class="page"
						href="?page=<?php echo($page - 1); ?>">Back<i
							class="fas fa-backward"></i>
					</a>
				</div>
				<?php endif; ?>
				<?php if ($page * 5 < count($result_data)) : ?>
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
			return confirm("Do you really want to delete?");
		});
	});
</script>
