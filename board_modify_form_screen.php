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
    <!-- 글쓰기 css -->
    <link rel="stylesheet" href="./css/board_form.css" />

    <script src="./js/main.js" defer></script>

    <script>
      function check_input() {
        if (!document.board_form.subject.value)
        {
            alert("제목을 입력하세요!");
            document.board_form.subject.focus();
            return;
        }
        document.board_form.submit();
      }
    </script>

  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>
    <section>
   	<div id="board_box">
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "root", "s6139350!", "diary");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];
?>

	    <form  name="board_form" method="post" action="./php/board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
        <ul id="board_form">	
	    	<span class="board_form__title">
                <input name="subject" type="text" placeholder ="제목을 입력하세요" value="<?=$subject?>">
            </span>
            <!-- 파일도 다시 첨부할 수 있도록 할 수는 없을까? -->
            <?php 
                if (!$file_name) {
                  // error (사진 수정이 안됨)
                    // echo "<span class='board_form__image_file' id='target_file'><input type='file' name='upfile'></span>";
                }
                else {
                    echo "<span class='board_form__image_file' id='target_file'>📂 $file_name</span>";
                }
            ?>
            <textarea name="content" placeholder="당신의 이야기를 적어보세요..."><?=$content?></textarea>
          </ul>
          <ul class="buttons">
            <div class="buttons__box">
              <li><button type="button" onclick="location.href='board_list_screen.php'" class="board_listBtn">↶ 목록보기</button>
              </li>
              <li><button type="button" onclick="check_input()" class="saveBtn">수정하기</button></li>
            </div>
          </ul>     
	    </form>
	</div> <!-- board_box -->
</section> 
  </body>
</html>
