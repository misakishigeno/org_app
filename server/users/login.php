<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="login_main">
        <?php include_once __DIR__ . '/../common/_header.php' ?>

        <main class="content_center wrapper">
            <div class="login_content">
                <h2 class="login_title">login</h2>
                <form class="login_form" action="" method="post">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <div class="button_area">
                        <input type="submit" value="ログイン" class="btn submit-btn">
                        <a href="login.php" class="btn link-btn">新規ユーザー登録</a>

                    </div>
                </form>
            </div>



        </main>

    </div>



    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
