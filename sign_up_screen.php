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
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f1def33959.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- 메뉴바 css-->
    <link rel="stylesheet" href="./css/navbar.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <!-- 회원가입 css -->
    <link rel="stylesheet" href="./css/sign_up.css" />
    <script>
      function check_id() {
          window.open("./php/member_check_id.php?id=" + document.member_form.id.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=no");
        //    .open("/php/member_check_id.php?id=" + document.member_form.id.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=no");
        }

        function check_input() {
          if (!document.member_form.pass.value) {
            alert("비밀번호를 입력하세요!");
            document.member_form.pass.focus();
            return;
          }

          if (!document.member_form.pass_confirm.value) {
            alert("비밀번호확인을 입력하세요!");
            document.member_form.pass_confirm.focus();
            return;
          }

          if (!document.member_form.name.value) {
            alert("이름을 입력하세요!");
            document.member_form.name.focus();
            return;
          }

          if (!document.member_form.email1.value) {
            alert("이메일 주소를 입력하세요!");
            document.member_form.email1.focus();
            return;
          }

          if (!document.member_form.email2.value) {
            alert("이메일 주소를 입력하세요!");
            document.member_form.email2.focus();
            return;
          }

          if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            document.member_form.pass.focus();
            document.member_form.pass.select();
            return;
          }

          document.member_form.submit();
        }

        function reset_form() {
          document.member_form.id.value = "";
          document.member_form.pass.value = "";
          document.member_form.pass_confirm.value = "";
          document.member_form.name.value = "";
          document.member_form.email1.value = "";
          document.member_form.email2.value = "";

          document.member_form.id.focus();

          return;
        }

    </script>
    <script src="./js/main.js" defer></script>
    <!-- <script src="./js/sign_up.js" defer></script> -->
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>

    <!--  회원가입 -->
    <section>
      <div id="main_content">
      <h2>Create your account</h2>

        <div id="join_box">
          <!-- member_insert.php 연결 -->
          <form name="member_form" method="post" action="./php/member_insert.php">
              <div class="form id row1">아이디</div>
              <div class="form id insert_id">
                <input type="text" name="id" />
                <button class="check_id" onclick="check_id()">중 복 확 인</button>
              </div>
              <!-- <div class="col3">
                <a href="#"><img src="./img/check_id.gif" onclick="check_id()" /></a>
              </div> -->

              <div class="form pass row1">비밀번호</div>
              <div class="form insert_pass">
                <input type="password" name="pass" />
            </div>
              <div class="for pass row1">비밀번호 확인</div>
              <div class="form insert_pass">
                <input type="password" name="pass_confirm" />
              </div>
              <div class="form name row1">이름</div>
              <div class="form insert_name">
                <input type="text" name="name" />
              </div>
              <div class="form email row1">이메일
                <!-- <div class="col2"><input type="text" name="email" /></div> -->
                <div class="form email1"><input type="text" name="email1" /> @</div>
                <div class="form email2"><input type="text" name="email2" /></div>
              </div>
            <div class="form buttons">
              <span class="saveBtn" onclick="check_input()">저장하기</span>
              <span class="resetBtn" onclick="reset_form()">취소하기</span>
              <!-- <img style="cursor: pointer" src="./img/button_save.gif" onclick="check_input()" />&nbsp;
              <img id="reset_button" style="cursor: pointer" src="./img/button_reset.gif" onclick="reset_form()" /> -->
            </div>
          </form>
        </div>
        <!-- join_box -->
      </div>
      <!-- main_content -->
    </section>
    <?php include "./php/footer.php";?>
  </body>
</html>
