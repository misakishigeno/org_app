<?php
// 関数ファイルを読み込む
require_once __DIR__ . '/../../common/functions.php';

// セッション開始
session_start();

$upload_file = '';
$upload_tmp_file = '';
$errors = [];
$image = '';



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
        $path = '../../images/users/today' . $image;

        if ((move_uploaded_file($upload_tmp_file, $path)) &&
            insert_photo($current_user['id'], $image)
        ) {
            header('Location: index.php');
            exit;
        }
}
}


?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../../common/_head.html' ?>

<body>
    <div class="upmain">
        <?php include_once __DIR__ . '/../../common/_header.php' ?>


        <main class="main_content content_center wrapper">
            <div class="form_flex">
                <?php include_once __DIR__ . '/../../common/_errors.php' ?>

                <form action="" method="post" class="upload_content_form" enctype="multipart/form-data">
                    <label class="upload_content_label" for="file_upload">
                        <span class="plus_icon"><i class="fas fa-plus-circle"></i></span>
                        <span class="upload_text">写真をアップロード</span>
                    </label>
                    <input class="input_file" type="file" id="file_upload" name="image">
                    <input type="submit" value="追加" class="upload_submit">
                </form>
            </div>
        </main>



        <?php include_once __DIR__ . '/../../common/_footer.html' ?>
    </div>
</body>


</html>
