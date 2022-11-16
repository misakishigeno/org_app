

<?php
include_once __DIR__ . '/../common/functions.php';
$name = '';
$email = '';
$pass_word = '';
$errors = signup_varidation($name, $email, $pass_word);

//もしえらーがなかったらdbに登録

?>


<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="signup_main">
    <?php include_once __DIR__ . '/../common/_header.php' ?>
    <main class="content_center wrapper">
        <div class="wrapper">
        <pre><?= var_dump($errors) ?></pre>
                <form action="" method="post">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <label for="name">ユーザー名</label>
                    <input type="text" name="name" id="name" placeholder="User Name">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <div class="btn-area">
                        <input type="submit" value="START" class="btn submit-btn">
                        <a href="login.php" class="btn link-btn">ログインはこちら</a>
                    </div>
                </form>
        </div>
    </div>


    </main>

    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
