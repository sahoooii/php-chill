<body>
	<header>
		<div class="header-box">
			<div class="header-title">
				<a href="bbs_control.php">
					<img class="logo d-none d-md-block" src="./img/Chill.png" alt="chill_logo">
				</a>
				<a href="bbs_control.php" class="navbar-brand">
					<h2>Wanna<i class="fas fa-cocktail"></i>?</h2>
				</a>
			</div>
		</div>
	</header>

	<div class="contents">
		<div class="container">
			<h3>Edit Your Page<i class="fas fa-cocktail"></i></h3>
			<div class="edit_container">
				<?php foreach ($msg as $value) : ?>
				<p class="success-msg">
					<?php echo $value; ?>
				</p>
				<?php endforeach; ?>

				<?php foreach ($data as $value) : ?>
				<form method="POST" enctype="multipart/form-data">
					<div class="icon">
						<img class="item-img"
							src="<?php echo $value['img']; ?>">
					</div>
					<div class="user">
						<label>User Name: <br>
							<input type="text" name="user_name" class="user_info"
								value="<?php echo $value['user_name']; ?>">
						</label>
							<!-- Error msg -->
						<?php if (isset($err_msg['user_name'])) : ?>
						<ul class="err-msg-container">
							<li>
								<p class="err-msg">
									<?php echo $err_msg['user_name']; ?>
								</p>
							</li>
						</ul>
						<?php endif; ?>
					</div>
					<div class="user">
						<label>Email: <br>
							<input type="text" name="email" class="user_info"
								value="<?php echo $value['email']; ?>">
						</label>
						<!-- Error msg -->
						<?php if (isset($err_msg['email'])) : ?>
						<ul class="err-msg-container">
							<li>
								<p class="err-msg">
									<?php echo $err_msg['email']; ?>
								</p>
							</li>
						</ul>
						<?php endif; ?>
					</div>
					<div class="user">
						<label>Phone Number: <br>
							<input type="text" name="tel" class="user_info"
								value="<?php echo $value['tel']; ?>">
						</label>
						<!-- Error msg -->
						<?php if (isset($err_msg['tel'])) : ?>
						<ul class="err-msg-container">
							<li>
								<p class="err-msg">
									<?php echo $err_msg['tel']; ?>
								</p>
							</li>
						</ul>
						<?php endif; ?>
					</div>
					<div class="user">
						<label>Password: <br>
							<input type="password" name="password" class="user_info"
								value="<?php echo $value['password']; ?>">
						</label>
						<!-- Error msg -->
						<?php if (isset($err_msg['password'])) : ?>
						<ul class="err-msg-container">
							<li>
								<p class="err-msg">
									<?php echo $err_msg['password']; ?>
								</p>
							</li>
						</ul>
						<?php endif; ?>
					</div>
					<div class="user">
						<label>Icon: <br>
							<input type="file" name="new_img" class="img_font">
						</label>
						<?php if (isset($err_msg['new_img'])) : ?>
						<ul class="err-msg-container">
							<li>
								<p class="err-msg">
									<?php echo $err_msg['new_img']; ?>
								</p>
							</li>
						</ul>
						<?php endif; ?>
					</div>
					<div class="user">
						<label class="user">Privacy:
							<i class="fas fa-unlock-alt"></i>
							<select name="status">
								<option value="0" <?php if ($value['status'] === '0') {
								    echo 'selected';
								} ?>>Private
								</option>
								<option value="1" <?php if ($value['status'] === '1') {
								    echo 'selected';
								} ?>>Public
								</option>
							</select>
						</label>
						<!-- Error msg -->
						<?php if (isset($err_msg['status'])) : ?>
						<ul class="err-msg-container">
							<li>
								<p class="err-msg">
									<?php echo $err_msg['status']; ?>
								</p>
							</li>
						</ul>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>

					<div class="btn">
						<input type="submit" class="add" value="Submit">
					</div>
					<input type="hidden" name="user_id"
						value="<?php echo $value['user_id']; ?>">
					<input type="hidden" name="sql_kind" value="update">
				</form>
			</div>
		</div>
	</div>
