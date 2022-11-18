<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

// 変数の初期化
$email = '';
$name = '';
$password = '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');

    $errors = signup_validate($email, $name, $password);
}
?>


<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="signup_main">
        <?php include_once __DIR__ . '/../common/_header.php' ?>
        <main class="content_center wrapper">

            <?php include_once __DIR__ . '/../common/_errors.php' ?>

            <form action="" method="post">
                <table class="stable">
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="email">メールアドレス</label></th>
                        <td class="std"><input type="email" name="email" id="email" placeholder="Email" value="<?= h($email) ?>></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="name">ユーザー名</label></th>
                        <td class="std"><input type="text" name="name" id="name" placeholder="User Name" value="<?= h($name) ?>></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="password">パスワード</label></th>
                        <td class="std"><input type="password" name="password" id="password" placeholder="Password"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="start_date">開始日</label></th>
                        <td class="std"><input type="date" name="start_date" id="start_date" value="2022-11-01" min="2022-11-01" max="2040-12-31"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="birthday">生年月日</label></th>
                        <td class="std"><input type="date" name="birthday" id="birthday" value="2000-01-01" min="1980-01-01" max="2040-12-31"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="age">年齢</label></th>
                        <td class="std"><input type="text" name="age" id="age" placeholder="age"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="sex">性別</label></th>
                        <td class="std"><input type="radio" neme="sex" value="male">男
                            <input type="radio" name="sex" value="female">女
                        </td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="sports_event">競技種目</label></th>
                        <td class="std"><input type="text" name="sports_event" id="sports_event" placeholder="sports_event"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="team">所属チーム</label></th>
                        <td class="std"><input type="text" name="team" id="team" placeholder="team"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="goal">目標</label></th>
                        <td class="std"><input type="text" name="goal" id="goal" placeholder="goal"></td>
                    </tr>
                </table>

                <div class="btn-area">
                    <input type="submit" value="START" class="btn submit-btn">
                    <a href="login.php" class="btn link-btn">ログインはこちら</a>
                </div>

            </form>


    </div>


    </main>

    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
