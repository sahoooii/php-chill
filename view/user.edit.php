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
            <div class="edit">
                <?php
                    foreach ($err_msg as $value) : ?>
                <p class="err_msg"><?php echo $value; ?>
                </p>
                <?php endforeach; ?>
                <?php
                    foreach ($msg as $value) : ?>
                <p class="success-msg"><?php echo $value; ?>
                </p>
                <?php endforeach; ?>

                <?php
                foreach ($data as $value) : ?>
                <form method="POST" class="row" enctype="multipart/form-data">
                    <div class="icon">
                        <img class="item-img"
                            src="<?php echo $value['img']; ?>">
                    </div>
                    <div class="user">
                        <label>User Name: <br>
                            <input type="text" name="user_name" class="user_info"
                                value="<?php echo $value['user_name']; ?>">
                        </label>
                    </div>
                    <div class="user">
                        <label>Email: <br>
                            <input type="text" name="email" class="user_info"
                                value="<?php echo $value['email']; ?>">
                        </label>
                    </div>
                    <div class="user">
                        <label>Phone Number: <br>
                            <input type="text" name="tel" class="user_info"
                                value="<?php echo $value['tel']; ?>">
                        </label>
                    </div>
                    <div class="user">
                        <label>Password: <br>
                            <input type="password" name="password" class="user_info"
                                value="<?php echo $value['password']; ?>">
                        </label>
                    </div>
                    <div class="user">
                        <label>Icon: <br>
                            <input type="file" name="new_img" class="img_font">
                        </label>
                    </div>
                    <div class="user privacy">
                        <label>Privacy:
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
