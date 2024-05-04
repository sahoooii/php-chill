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
        <form method="post" action="../chill-control/login_control.php">
            <div>
                <label class="user-info">User Email:<br> <input type="text" name="email" class="user"
							value="<?php if (isset($user['email'])) : echo $user['email']; endif; ?>">
                </label>
            </div>
            <div>
                <label class="user-info">Password:<br>
                    <input type="password" name="password" class="user"
							value="<?php if (isset($user['password'])) : echo $user['password']; endif; ?>">
                </label>
            </div>
            <div class="btn">
                <input type="submit" value="Login" class="add">
            </div>
        </form>
        <?php
        foreach ($err_msg as $value) : ?>
        <ul>
            <li>
                <p class="err-msg"><?php echo $value; ?>
                </p>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>
</div>
