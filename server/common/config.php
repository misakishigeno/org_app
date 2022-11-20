<?php
// 接続に必要な情報を定数として定義
define('DSN', 'mysql:host=db;dbname=org_app_db;charset=utf8');
define('USER', 'org_app_admin');
define('PASSWORD', '1234'); 

define('EXTENTION', ['jpg', 'jpeg', 'png', 'gif', 'webp']);

define('MSG_NO_IMAGE', '画像を選択してください');
define('MSG_NOT_ABLE_EXT', '選択したファイルの拡張子が有効ではありません');

define('MSG_EMAIL_REQUIRED', 'メールアドレスが未入力です');
define('MSG_NAME_REQUIRED', 'ユーザー名が未入力です');
define('MSG_PASSWORD_REQUIRED', 'パスワードが未入力です');
define('MSG_START_DATE_REQUIRED', '開始日が未入力です');
define('MSG_BIRTHDAY_REQUIRED', '生年月日が未入力です');
define('MSG_AGE_REQUIRED', '年齢が未入力です');
define('MSG_SEX_REQUIRED', '性別が未入力です');
define('MSG_SPORTS_EVENT_REQUIRED', '競技種目が未入力です');
define('MSG_TEAM_REQUIRED', '所属チームが未入力です');
define('MSG_GOAL_REQUIRED', '目標が未入力です');
define('MSG_IMAGE_REQUIRED', '画像が未選択です');
define('MSG_EMAIL_DUPLICATE', 'そのメールアドレスは既に会員登録されています');
define('MSG_EMAIL_PASSWORD_NOT_MATCH', 'メールアドレスかパスワードが間違っています');
