

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
                    <label for="start_date">開始日</label>
                    <input type="date" name="start_date" id="start_date" value="2022-11-01" min="2022-11-01" max="2040-12-31">
                    <label for="birthday">生年月日</label>
                    <input type="date" name="birthday" id="birthday" value="2000-01-01" min="1980-01-01" max="2040-12-31">
                    <label for="age">年齢</label>
                    <input type="text" name="age" id="age" placeholder="age">
                    <label for="sex">性別</label>
                    <input type="sex" name="sex" id="sex" placeholder="sex">
                    <label for="sports_event">競技種目</label>
                    <input type="text" name="sports_event" id="sports_event" placeholder="sports_event">
                    <label for="team">所属チーム</label>
                    <input type="text" name="team" id="team" placeholder="team">
                    <label for="goal">目標</label>
                    <input type="text" name="goal" id="goal" placeholder="goal">
                    <form action="" method="post" class="upload_content_form" enctype="multipart/form-data">
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
