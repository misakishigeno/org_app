<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <div class="condition_main">
        <?php include_once __DIR__ . '/../common/_header.php' ?>

        <div class="condition_content">
            <h2 class="condition_title">Condition</h2>
            <form class="condition_form" action="" method="post">
                <label class="cdlabel" for="trdate">Training Date</label>
                <input type="date" name="trdate" id="trdate" value="<?php echo date('Y-m-d'); ?>" min="2022-11-01" max="2040-12-31">
                <label class="cdlabel" for="weight">Weight</label>
                <input type="number" step="0.1" name="weight" id="weight" value="55.0" min="30" max="80" placeholder="kg">kg
                <label class="cdlabel" for="temp">Temperature</label>
                <input type="number" step="0.1" name="temp" id="temp" value="36.0" min="34.0" max="42.0" placeholder="℃">℃
                <label class="cdlabel" for="defe">Dafecation</label>
                <input type="radio" neme="defe" value="yes">Yes
                <input type="radio" name="defe" value="no">No
                <label class="cdlabel" for="event">Event</label>
                <input type="text" name="event" id="event" placeholder="Today's event">
                <label class="cdlabel" for="meal">Meal</label>
                <input type="checkbox" name="meal" id="meal" value="breakfast">Breakfast
                <input type="checkbox" name="meal" id="meal" value="lunch">Lunch
                <input type="checkbox" name="meal" id="meal" value="dinner">Dinner
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
