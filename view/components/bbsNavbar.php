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
									<a href="/profile"
										class="nav-link"><?php echo $user_name ?>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt">Logout</i>
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
