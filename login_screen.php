<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daily</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f1def33959.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- 메뉴바 css-->
    <link rel="stylesheet" href="./css/navbar.css" />
    <!-- 로그인 css -->
    <link rel="stylesheet" href="./css/login.css" />
    <script src="./js/main.js" defer></script>
    <script src="./js/login.js" defer></script>
  </head>

  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>

    <!--  로그인 -->
    <section>
      <div id="main_content">
        <div id="login_box">
          <div id="login_title">
            <div class="login_title__icon"><i class="fab fa-ethereum"></i></div>
            <div class="login_title__text">Sign in to Daily</div>
          </div>
          <!-- 여기 둥근 박스 처리하기-->
          <div id="login_form">
            <form name="login_form" method="post" action="./php/login.php">
              <ul>
                <li>
                  <div id="login_form__username">ID</div>
                  <input type="text" name="id" placeholder="ID" />
                </li>
                <li>
                  <div id="login_form__password">Password</div>
                  <input type="password" id="pass" name="pass" placeholder="Password" />
                </li>
                <!-- pass -->
              </ul>
              <div id="login_btn">
                <a href="#" class="login">Sign in</a>
                <!-- <a href="#"><img src="./img/login.png" onclick="check_input()" /></a> -->
              </div>
            </form>
          </div>
          <!-- login_form end -->
          <div class="create-account">
            <span>New to Daily?</span>
            <a href="sign_up_screen.php" class="create-account__text">Create an account</a>
          </div>
        </div>
        <!-- login_box -->
      </div>
      <!-- main_content -->
    </section>
    <footer>
      <!-- <?php include "footer_screen.php";?> -->
    </footer>
    <!-- 로그인 end -->
  </body>
</html>
