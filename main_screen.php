<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daily</title>
    <!-- favicon 사용 -->
    <link rel="icon" href="./img/favicon.png"/>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <!-- 기본 font : Gothic A1 -->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/f1def33959.js" crossorigin="anonymous"></script>
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- 메뉴바 css-->
    <link rel="stylesheet" href="./css/navbar.css" />
    <link rel="stylesheet" href="./css/main_gallery.css" />
    <script src="./js/main.js" defer></script>
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>
    <?php include "./php/main_gallery.php";?>
  </body>
</html>
