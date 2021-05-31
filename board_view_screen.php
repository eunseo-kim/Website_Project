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
    <script src="./js/main.js" defer></script>
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>
    <section>
   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "eunseo", "1205", "diary");
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
    $cookie_name = $num;
    if(!(isset($_COOKIE[$cookie_name]))) {                      //쿠키가 없으면
        $new_hit = $hit + 1;                                    // 조회수 1 증가 
        $sql = "update board set hit=$new_hit where num=$num";  
        mysqli_query($con, $sql);
      } 
    setcookie("$cookie_name", true, time() + (60*60*24));       // 매번 클릭 때마다 쿠키 시간 다시 초기화


    mysqli_query($con, $sql);
	// $new_hit = $hit + 1;
	// $sql = "update board set hit=$new_hit where num=$num";   
?>		
	    <ul id="view_content">
			<li>
				<span class="row1"><b>제목 :</b> <?=$subject?></span>
			</li>
            <li>
                <!-- 좋아요 표시 -->
                <span><?=$name?> · <?=$regist_day?></span>
                <button class="row2" onclick=>
                    <span><i class="fas fa-heart"></i><?=$like?></span>
                </button>
            </li>
            <li>
                <div class="image_file"><?php echo $image_file_image; ?></div>
            </li>
			<li>
				<?=$content?>
			</li>
            <!-- 하단에 첨부파일 -->
            <li>		
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/".$real_name;
						// $file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			           	}
				?>
            </li>
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='board_list_screen.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='board_modify_form_screen.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<li><button onclick="location.href='board_form_screen.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 
<!-- 댓글 쓰기 -->
<section>

</section>
  </body>
</html>
