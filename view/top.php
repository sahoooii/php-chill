<div class="parallax">
	<a href="../chill-control/login.php">
		<h2 class="parallax top">Wanna Chill?</h2>
	</a>
</div>

<div class="contents">
	<div class="container">
		<h3>Register Here<i class="fas fa-cocktail"></i></h3>
		<?php
        foreach ($msg as $value) : ?>
		<div>
			<a href="../chill-control/login.php"
				class="success-msg"><?php echo $value; ?>
				<i class="far fa-comment-dots"></i></a>
		</div>
		<?php endforeach; ?>

		<div class="register">
			<form method="POST" action="../chill-control/top_control.php" enctype="multipart/form-data">
				<div class="user">
					<label>User Name: <br>
						<input type="text" name="user_name" class="user_info"
							value="<?php echo $user['user_name']; ?>">
					</label>
				</div>
				<div class="user">
					<label>Email: <br>
						<input type="text" name="email" class="user_info"
							value="<?php echo $user['email']; ?>">
					</label>
				</div>
				<div class="user">
					<label>Phone Number: <br>
						<input type="text" name="tel" class="user_info"
							value="<?php echo $user['tel']; ?>">
					</label>
				</div>
				<div class=" user">
					<label>Password: <br>
						<input type="password" name="password" class="user_info"
							value="<?php echo $user['password']; ?>">
					</label>
				</div>
				<div class="user">
					<label class="user">Icon: <br>
						<input type="file" name="new_img" class="img_font">
					</label>
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
				</div>
				<div class="btn">
					<input type="submit" class="add" value="Submit">
				</div>

				<?php if (count($err_msg)) : ?>
				<ul>
					<?php foreach ($err_msg as $value) : ?>
					<ul>
						<li>
							<p class="err-msg">
								<?php echo $value; ?>
							</p>
						</li>
					</ul>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</form>
		</div>
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
