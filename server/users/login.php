<?php
// 関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

// セッション開始
session_start();

$email = '';
$password = '';
$errors = [];

// ログイン判定
if (isset($_SESSION['current_user'])) {
    header('Location: user.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $errors = login_validate($email, $password);

    if (empty($errors)) {
        $user = find_user_by_email($email);

        //password_verify関数を使って、入力されたパスワード($password)とメールアドレスを基にデータベースから取得したパスワード($user['password'])が適合するか調べる
        if (!empty($user) && password_verify($password, $user['password'])) {
            user_login($user);
            
        } else {
            $errors[] = MSG_EMAIL_PASSWORD_NOT_MATCH;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="login_main">
        <?php include_once __DIR__ . '/../common/_header.php' ?>

        <main class="content_center wrapper">
            <div class="login_content">

                <?php include_once __DIR__ . '/../common/_errors.php' ?>

                <form class="login_form" action="" method="post">
                    <label class="lilabel" for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="<?= h($email) ?>">
                    <label class="lilabel" for="password">パスワード</label>
                    <input type="password" name="password" id="password" placeholder="Password" value="<?= h($email) ?>">
                    <div class="button_area">
                        <input type="submit" value="login" class="btn submit-btn">
                        <a href="signup.php" class="btn link-btn">新規ユーザー登録</a>

                    </div>
                </form>
            </div>



        </main>

    </div>



    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
