<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

// 変数の初期化
$email = '';
$name = '';
$password = '';
$start_date = '';
$birthday = '';
$age = '';
$sex = '';
$sports_event = '';
$team = '';
$goal = '';

$upload_file = '';
$upload_tmp_file = '';
$image = '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // アップロードした画像のファイル名
    $upload_file = $_FILES['image']['name'];
    // サーバー上で一時的に保存されるテンポラリファイル名
    $upload_tmp_file = $_FILES['image']['tmp_name'];

    $errors = insert_validate($upload_file);
    //ファイル名の変更（重複がないように）
    if (empty($errors)) {
        $image = date('YmdHis') . '_' . $upload_file;
        //アップロードした画像をファイルへ移動
        $path = '../images/users/profile' . $image;
    }

    $email = filter_input(INPUT_POST, 'email');
    $name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');
    $start_date = filter_input(INPUT_POST, 'start_date');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $age = filter_input(INPUT_POST, 'age');
    $sex = filter_input(INPUT_POST, 'sex');
    $sports_event = filter_input(INPUT_POST, 'sports_event');
    $team = filter_input(INPUT_POST, 'team');
    $goal = filter_input(INPUT_POST, 'goal');

    $errors = signup_validate($email, $name, $password, $start_date, $birthday, $age, $sex, $sports_event, $team, $goal,);

    if ((move_uploaded_file($upload_tmp_file, $path)) &&
        empty($errors) &&
        insert_user($email, $name, $password, $start_date, $birthday, $age, $sex, $sports_event, $team, $goal, $image)
    ) {
        header('Location: index.php');
        exit;
    }
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

            <form action="" method="post" enctype="multipart/form-data">
                <table class="stable">
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="email">メールアドレス</label></th>
                        <td class="std"><input type="email" name="email" id="email" placeholder="Email" value="<?= h($email) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="name">ユーザー名</label></th>
                        <td class="std"><input type="text" name="name" id="name" placeholder="User Name" value="<?= h($name) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="password">パスワード</label></th>
                        <td class="std"><input type="password" name="password" id="password" placeholder="Password" value="<?= h($password) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="start_date">開始日</label></th>
                        <td class="std"><input type="date" name="start_date" id="start_date" value="2022-11-01" min="2022-11-01" max="2040-12-31" value="<?= h($start_date) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="birthday">生年月日</label></th>
                        <td class="std"><input type="date" name="birthday" id="birthday" value="2000-01-01" min="1980-01-01" max="2040-12-31" value="<?= h($birthday) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="age">年齢</label></th>
                        <td class="std"><input type="text" name="age" id="age" placeholder="age" value="<?= h($age) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="sex">性別</label></th>
                        <td class="std"><input type="radio" neme="sex" value="male" value="<?= h($sex) ?>">男
                            <input type="radio" name="sex" value="female" value="<?= h($sex) ?>">女
                        </td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="sports_event">競技種目</label></th>
                        <td class="std"><input type="text" name="sports_event" id="sports_event" placeholder="sports_event" value="<?= h($sports_event) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="team">所属チーム</label></th>
                        <td class="std"><input type="text" name="team" id="team" placeholder="team" value="<?= h($team) ?>"></td>
                    </tr>
                    <tr class="str">
                        <th class="sth"><label class="sulabel" for="goal">目標</label></th>
                        <td class="std"><input type="text" name="goal" id="goal" placeholder="goal" value="<?= h($goal) ?>"></td>
                    </tr>
                    <tr class="str str2">
                        <th class="sth"><label class="sulabel" for="image">プロフィール画像</label></th>
                        <td class="std"><input type="file" name="image" id="image" value="<?= h($image) ?>"></td>
                    </tr>


                </table>

                <div class="btn_area">
                    <input type="submit" value="START" class="btn submit-btn">
                    <a href="login.php" class="btn link-btn">ログインはこちら</a>
                </div>

            </form>


    </div>


    </main>

    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
