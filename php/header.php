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
        <a href="main_screen.php">Daily</a>
      </div>
      <ul class="navbar__menu">
        <li><a href="main_screen.php">Home</a></li>
        <!-- 나중에 board_list_screen.php로 바꿀 예정 -->
        <li><a href="board_list_screen.php">Gallery</a></li>
        <li><a href="./donate_screen.php">Donate</a></li>
        <li><a href="./message_screen.php">Message</a></li>
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
            <i class="fas fa-user-plus"></i>
          </a>
        </li>
        <li>
          <!-- 로그인 -->
          <a href="login_screen.php">
          <i class="fas fa-sign-in-alt"></i>
          </a>
        </li>
      </ul>     
      <?php
      }
      ?>
      <div class="navbar__toggleBtn">
        <i class="fas fa-bars"></i>
    </div>
    </nav>