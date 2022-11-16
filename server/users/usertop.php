<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/../common/_head.html' ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ENJOINT TOP</title>
</head>

<body>
    <div class="top_main">
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

                <img class="main-image" src="images/chair.jpg" alt="椅子">
                <div class="wrapper">
                    <h2 class="main-title">about</h2>
                    <div class="main-body">
                        <img class="sub-image" src="../images/myself.jpg" alt="自分の写真">
                        <p>
                            〇〇大学〇〇学部〇〇学科の〇〇と申します。<br>私は、UIやUXを考慮したデザインについては、どのような人にも優越している自信があります。ウェブサイト上では、形式化されやすい傾向は多いものと考えられますが、さらなるユーザービリティの向上や、競合他社に差をつけられるか、また、デザイン性などを特段意識していくとともにウェブデザインを実践していく所存です。
                        </p>
                    </div>
                </div>
            </article>
            <footer>
                <div class="wrapper">
                    <small>&copy; 2019 My Name</small>
                </div>
            </footer>
        </div>

    </div>
    <?php include_once __DIR__ . '/../common/_footer.html' ?>
</body>

</html>
