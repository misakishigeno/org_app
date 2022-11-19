<header class="page_header">
    <h1>
        <a class="logo" href="/users/usertop.php">
            ENJOINT
        </a>
    </h1>

    <div class="right_content">
        <div class="login_info">
            <?php if (!empty($current_user)) : ?>
                <p>
                    <?= $current_user['name'] ?>
                </p>
                <a class="header_logout_button" href="/users/logout.php" class="nav-link"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></a>
            <?php else : ?>
                <a class="header_login_button" href="/login.php" class="nav-link">ログイン</a>
            <?php endif; ?>
        </div>
    </div>
</header>
