<header>
	<div class="header-box">
		<div class="header-title">
			<img class="logo d-none d-md-block" src="./img/Chill.png" alt="chill_logo">
			<a href="top.php" class="navbar-brand">
				<h2>Wanna<i class="fas fa-cocktail"></i>?
				</h2>
			</a>
		</div>
	</div>
</header>

<div class="contents-login">
	<div class="login">
		<h3>Login Here</h3>
		<form method="post" action="../chill-control/login_control.php">
			<div class="user_container">
				<div class="user">
					<label>Email:<br> <input type="text" name="email" class="user_info"
							placeholder="Your Email..."
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
					<label>Password:<br>
						<input type="password" name="password" class="user_info" placeholder="Your Password..."
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

				<div class="btn">
					<input type="submit" value="Login" class="add">
				</div>
			</div>


		</form>
	</div>
</div>
