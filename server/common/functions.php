<?php
require_once __DIR__ . '/config.php';
// 接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//signupバリデーション
function signup_validate($email, $name, $password, $start_date, $birthday, $age, $sex, $sports_event, $team, $goal)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($name)) {
        $errors[] = MSG_NAME_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    if (empty($start_date)) {
        $errors[] = MSG_START_DATE_REQUIRED;
    }

    if (empty($birthday)) {
        $errors[] = MSG_BIRTHDAY_REQUIRED;
    }

    if (empty($age)) {
        $errors[] = MSG_AGE_REQUIRED;
    }
    if (empty($sex)) {
        $errors[] = MSG_SEX_REQUIRED;
    }

    if (empty($sports_event)) {
        $errors[] = MSG_SPORTS_EVENT_REQUIRED;
    }

    if (empty($team)) {
        $errors[] = MSG_TEAM_REQUIRED;
    }

    if (empty($goal)) {
        $errors[] = MSG_GOAL_REQUIRED;
    }



    if (
        empty($errors) &&
        check_exist_user($email)
    ) {
        $errors[] = MSG_EMAIL_DUPLICATE;
    }

    return $errors;
}


//insert_user

function insert_user($email, $name, $password, $start_date, $birthday, $age, $sex, $sports_event, $team, $goal, $image)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        INSERT INTO
            users
            (email, name, password, start_date, birthday, age, sex, sports_event, team, goal, image)
        VALUES
            (:email, :name, :password, :start_date, :birthday, :age, :sex, :sports_event, :team, :goal, :image);
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password', $pw_hash, PDO::PARAM_STR);
        $stmt->bindValue(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        $stmt->bindValue(':age', $age, PDO::PARAM_STR);
        $stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
        $stmt->bindValue(':sports_event', $sports_event, PDO::PARAM_STR);
        $stmt->bindValue(':team', $team, PDO::PARAM_STR);
        $stmt->bindValue(':goal', $goal, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);


        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function check_exist_user($email)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT 
         * 
    FROM 
        users 
    WHERE 
        email = :email;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user)) {
        return true;
    } else {
        return false;
    }
}


//loginバリデーション----------------------------------------


function login_validate($email, $password)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    return $errors;
}

//メールアドレス重複エラー
function find_user_by_email($email)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
         *
    FROM
        users
    WHERE
        email = :email;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//メールアドレスorパスワードの間違い

function user_login($user)
{
    $_SESSION['current_user']['id'] = $user['id'];
    $_SESSION['current_user']['name'] = $user['name'];
    header('Location: ../photos/index.php');
    exit;
}

//画像アップロードバリデーション


function insert_validate($upload_file)
{
    $errors = [];

    if (empty($upload_file)) {
        $errors[] = MSG_NO_IMAGE;
    } else {
        if (check_file_ext($upload_file)) {
            $errors[] = MSG_NOT_ABLE_EXT;
        }
    }

    return $errors;
}


function check_file_ext($upload_file)
{
    $file_ext = pathinfo($upload_file, PATHINFO_EXTENSION);
    return !in_array($file_ext, EXTENTION) ? true : false;
}


//画像名をデータベースに保存する
function insert_photo($user_id, $image)
{
    try {
        $dbh = connect_db();
        $sql = <<<EOM
        INSERT INTO 
            photos
            (user_id, image) 
        ALUES 
            (:user_id, :image);
        EOM;
        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
