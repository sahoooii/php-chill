<div class="parallax">
	<a href="../chill-control/login.php">
		<h2 class="parallax top">Wanna Chill?</h2>
	</a>
</div>

<div class="contents">
	<div class="container">
		<!-- Register screen表示 -->
		<h3>Register Here<i class="fas fa-cocktail"></i></h3>
		<div class="register">
			<form method="POST" action="../chill-control/top_control.php" enctype="multipart/form-data">
				<div class="user">
					<label>User Name: <br>
						<input type="text" name="user_name" class="user_info" placeholder="6文字以上の英数字で入力..."
							value="<?php if (isset($user['user_name'])) : echo $user['user_name']; endif; ?>">
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
						<input type="text" name="email" class="user_info"  placeholder="Emailを入力..."
							value="<?php if (isset($user['email'])) : echo $user['email']; endif; ?>">
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
						<input type="text" name="tel" class="user_info"  placeholder="電話番号を入力..."
							value="<?php if (isset($user['tel'])) : echo $user['tel']; endif; ?>">
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
						<input type="password" name="password" class="user_info"  placeholder="6文字以上の英数字で入力..."
							value="<?php if (isset($user['password'])) : echo $user['password']; endif; ?>">
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
					<label class="user">Icon: <br>
						<input type="file" name="new_img" accept='.png,.jpeg,.jpg' class="img_font" required>
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
						<select name="status" class="status">
							<option value="disabled" style="display:none;" <?php if (empty($user['status'])) {
							    echo 'selected;';
							} ?>>SELECT
							</option>
							<option value="0" <?php echo array_key_exists('status', $_POST) && $_POST['status'] === '0' ? 'selected' : ''; ?>>Private
							</option>
							<option value="1" <?php echo array_key_exists('status', $_POST) && $_POST['status'] === '1' ? 'selected' : ''; ?>>Public
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

				<div class="btn">
					<input type="submit" class="add" value="Submit">
				</div>
			</form>
		</div>
		<!-- Registerに成功したらLogin画面に -->
		<?php if ($success) {
		    header('Location: ./login_control.php');
		    exit;
		} ?>
	</div>
</div>

<div class="parallax bottom">
	<a href="../chill-control/login.php">
		<h2 class="parallax">Chill Out?</h2>
	</a>
	<footer>
		<p>&copy; Chill All Rights Reserved.</p>
	</footer>
</div>
