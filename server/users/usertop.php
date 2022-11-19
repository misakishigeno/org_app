<?php

// セッション開始
session_start();

$current_user = '';

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}
?>



<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="user_top_main">
        <?php include_once __DIR__ . '/../common/_header.php' ?>
        <div class="wrapper">
            <img class="sub-image" src="../images/myself.jpg" alt="自分の写真">
            <p>My Name</p>
            <p>目標：●●●●</p>
        </div>
        <div class="container">
            <article class="main">
                <h2 class="date">Today</h2>

                <!--今日の日付表示-->
                <span id="view_today"></span>
                <!--javascript-->
                <script src="../js/toppage.js"></script>


                <!--カレンダー https://nyanblog2222.com/programming/javascript/2749/-->
                <div class="wrapper">
                    <!-- xxxx年xx月を表示 -->
                    <h1 id="header"></h1>

                    <!-- ボタンクリックで月移動 -->
                    <div id="next-prev-button">
                        <button id="prev" onclick="prev()">‹</button>
                        <button id="next" onclick="next()">›</button>
                    </div>

                    <!-- カレンダー -->
                    <div id="calendar">

                        <!--カレンダーjavaSclipt-->
                        <script src="../js/toppage.js"></script>
                    </div>
                </div>
        </div>



    </div>
    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
