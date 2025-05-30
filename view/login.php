<?php
$navbar_link = '/';
require __DIR__ . '/components/navbar.php';
?>

<div class="contents-login">
	<div class="login">
		<h3>Login Here</h3>
		<form method="post" action="/login_control">
			<div class="user_container">
				<div class="user">
					<label>Email:<br>
					<input type="text" name="email" class="user_info"
							placeholder="Your Email..."
							autocomplete="off"
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
						<input type="password" name="password" class="user_info" placeholder="Your Password..." autocomplete="off"
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

				<!-- If not matched user info -->
				<?php if (isset($err_msg['fail'])) : ?>
				<ul class="err-msg-container">
					<li>
						<p class="err-msg">
							<?php echo $err_msg['fail']; ?>
						</p>
					</li>
				</ul>
				<?php endif; ?>

				<div class="btn">
					<input type="submit" value="Login" class="add">
				</div>
			</div>
		</form>
	</div>
</div>
