<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

// セッション開始
session_start();

// 変数の初期化
$condition_date = '';
$weight = '';
$temperature = '';
$defecation = '';
$event = '';
$meal = '';

$errors = [];


$current_user = '';

if (empty($_SESSION['current_user'])) {
    header('Location: login.php');
    exit;
}

$current_user = $_SESSION['current_user'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = filter_input(INPUT_POST, 'user_id');
    $condition_date = filter_input(INPUT_POST, 'condition_date');
    $weight = filter_input(INPUT_POST, 'weight');
    $temperature = filter_input(INPUT_POST, 'temperature');
    $defecation = filter_input(INPUT_POST, 'defecation');
    $event = filter_input(INPUT_POST, 'event');
    $meal = filter_input(INPUT_POST, 'meal');

    $errors = condition_validate($user_id, $condition_date, $weight, $temperature, $defecation, $event, $meal);

    if (
        empty($errors) &&
        insert_condition($use_id, $condition_date, $weight, $temperature, $defecation, $event, $meal)
    ) {
        header('Location: enjoint.php');
        exit;
    }
}

function user_condition($user)
{
    $_SESSION['current_user']['id'] = $user['id'];
    $_SESSION['current_user']['name'] = $user['name'];
    header('Location: usertop.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="condition_main">
        <?php include_once __DIR__ . '/../common/_header.php' ?>

        <div class="condition_content">
            <h2 class="condition_title">Condition</h2>

            <?php include_once __DIR__ . '/../common/_errors.php' ?>


            <form class="condition_form" action="" method="post">
                <label class="cdlabel" for="condition_date">Date</label>
                <input type="date" name="condition_date" id="condition_date" min="2022-11-01" max="2040-12-31" value="<?= h($condition_date) ?>">

                <label class="cdlabel" for="weight">Weight</label>
                <input type="number" step="0.1" name="weight" id="weight" value="55.0" min="30" max="80" value="<?= h($weight) ?>">kg

                <label class="cdlabel" for="temperature">Temperature</label>
                <input type="number" step="0.1" name="temperature" id="temperature" value="36.0" min="34.0" max="42.0" value="<?= h($temperature) ?>">℃

                <label class="cdlabel" for="defecation">Defecation</label>
                <input type="radio" name="defecation" value="1" <?php if ($defecation == 1) echo  "checked" ?>>Yes
                <input type="radio" name="defecation" value="2" <?php if ($defecation == 2) echo  "checked" ?>>No

                <label class="cdlabel" for="event">Event</label>
                <input type="text" name="event" id="event" placeholder="Today's event" value="<?= h($event) ?>">

                <label class="cdlabel" for="meal">Meal</label>
                <input type="checkbox" class="meal" id="meal" name="meal" value="0" <?php if ($meal == 1) echo  "checked" ?>>Breakfast
                <input type="checkbox" class="meal" id="meal" name="meal" value="1" <?php if ($meal == 2) echo  "checked" ?>>Lunch
                <input type="checkbox" class="meal" id="meal" name="meal" value="2" <?php if ($meal == 3) echo  "checked" ?>>Dinner
                <input type="checkbox" class="meal" id="meal" name="meal" value="3" <?php if ($meal == 4) echo  "checked" ?>>Not eating
                <div class="button_area">
                    <input type="submit" value="NEXT >> Training" class="btn submit-btn">
                    <a href="login.php" class="btn link-btn">新規ユーザー登録</a>

                </div>
            </form>
        </div>


    </div>



    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
