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
    <link rel="stylesheet" href="./css/board_view.css" />
    <script src="./js/main.js" defer></script>

    <!-- 좋아요 표시 클릭 함수 -->
    <script>
     function clickLike() {
      const button = document.querySelector(".likeBtn")
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
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "root", "s6139350!", "diary");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];
    $like         = $row["like"];
    // 첨부 파일이 이미지인 경우, 미리보기 화면에 해당 이미지를 띄운다
    if ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/jpg") {
        $image_file_image = "<img src='upload/{$file_copied}' class='image_file'>";
        }
        else {
        $image_file_image = NULL;
        }
    //=======================================
      $content = str_replace(" ", "&nbsp;", $content);
	    $content = str_replace("\n", "<br>", $content);

    // 방문자 조회수 쿠키로 판별 (마지막 접속 이후 24시간이 지나야 조회수 1 증가)
    $hit_cookie_name = $num."_hit";
    if(!(isset($_COOKIE[$hit_cookie_name]))) {                      //쿠키가 없으면
        $new_hit = $hit + 1;                                    // 조회수 1 증가 
        $sql = "update board set hit=$new_hit where num=$num";  
        mysqli_query($con, $sql);
      } 
    setcookie("$hit_cookie_name", true, time() + (60*60*24));       // 매번 클릭 때마다 쿠키 시간 다시 초기화


    mysqli_query($con, $sql);
	// $new_hit = $hit + 1;
	// $sql = "update board set hit=$new_hit where num=$num";   
?>		
	    <ul id="view_content">
			<li>
				<span class="row1"><?=$subject?></span>
			</li>
      <li>
        <div class="row2">
          <!-- 좋아요 표시 -->
          <?php 
          $like_cookie_name = $num."_like";
          if(!(isset($_COOKIE[$like_cookie_name]))) { // 좋아요 누른 적이 없으면
            $like_icon = "far";
            // setcookie("$like_cookie_name", true, time() + 86400*365); // 1년동안 쿠키 유지
          } else {
            $like_icon = "fas";
          }
          ?>
          <span><?=$name?> · <?=$regist_day?></span>
          <button class="likeBtn" onclick=clickLike()>
              <i class="<?=$like_icon?> fa-heart"></i>
              <span><?=$like?></span>
          </button>
          <!-- 좋아요 표시 end -->
        </div>
      </li>
      <li>
        <div class="row3">
          <div class="image_file"><?php echo $image_file_image; ?></div>
          <div class="content"><?=$content?></div>
        </div>
			</li>
      <!-- 하단에 첨부파일 -->
      <li>		
        <div class="file">
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "upload/".$real_name;
						// $file_size = filesize($file_path);

						echo "<span>📂 $file_name</span>
			       		<a href='./php/board_download.php?num=$num&
                 real_name=$real_name&
                 file_name=$file_name&
                 file_type=$file_type'>[저장]</a><br><br>";
          }
				?>
        </div>
      </li>
	    </ul>
	    <ul class="buttons">
        <div class="button_left">
          <button onclick="location.href='board_list_screen.php?page=<?=$page?>'">↶ 목록보기</button>
        </div>
        <div class="button_right">
          <button onclick="location.href='board_form_screen.php'">글쓰기</button>
          <button onclick="location.href='board_modify_form_screen.php?num=<?=$num?>&page=<?=$page?>'">수정</button>
          <button onclick="location.href='./php/board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button>
        </div>
		</ul>
	</div> <!-- board_box -->
</section> 
<!-- 댓글 쓰기 -->
<section>

</section>
  </body>
</html>


