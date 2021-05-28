<!-- 로그인 상태 판단 & nav -->
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>		

<nav class="navbar">
      <div class="navbar__logo">
        <i class="fab fa-ethereum"></i>
        <a href="main.php">Couple Diary</a>
      </div>
      <ul class="navbar__menu">
        <li><a href="main_screen.php">Home</a></li>
        <li><a href="#">Gallary</a></li>
        <li><a href="#">Schedule</a></li>
        <li><a href="#">Diary</a></li>
        <li><a href="#">Message</a></li>
      </ul>
      <!-- 만약 사용자라면, 마이페이지 & 로그아웃-->
      <?php
        if($userid) {
      ?>     
      <ul class="navbar__user">
        <li>
          <!-- 로그아웃 -->
          <a href="./php/logout.php">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
        <li>
          <!-- 마이페이지 -->
          <a href="mypage_screen.php"> 
            <i class="fas fa-user"></i>
          </a>
        </li>
      </ul>

      <!-- 만약 사용자가 아니라면, 회원가입 & 로그인 -->
      <?php
      } else {
      ?> 
      <ul class="navbar__user">
        <li>
          <!-- 회원가입 -->
          <a href="sign_up_screen.php">
            <i class="far fa-plus-square"></i>
          </a>
        </li>
        <li>
          <!-- 로그인 -->
          <a href="login_screen.php">
            <i class="fas fa-user"></i>
          </a>
        </li>
      </ul>     
      <?php
      }
      ?>
      <a href="" class="navbar__toggleBtn">
        <i class="fas fa-bars"></i>
      </a>
    </nav>
