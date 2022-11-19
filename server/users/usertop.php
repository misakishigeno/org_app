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

        <div class="container">
            <article class="main">

                <!--今日の日付表示-->
                <span id="view_today"></span>
                <!--javascript-->
                <script src="../js/toppage.js"></script>

                <a href="condition.php" class="btn1 btn-svg">
                    <svg>
                        <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                    </svg>
                    <span>Write down <i class="fa-solid fa-feather"></i></span>
                </a>


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
