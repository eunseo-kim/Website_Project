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
    <!-- 쪽지 보내기 css를 한번 더 사용 -->
    <link rel="stylesheet" href="./css/message_response_form.css" />
    <script src="./js/main.js" defer></script>
    <!-- 쪽지 보내기 js 재사용 -->
    <script src="./js/message.js" defer></script>
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>
    <!-- 답장 보내기 -->
    <section>
   	<div id="message_box">
	    <h3 id="write_title">
      ✉️ 답장 보내기
		</h3>
      <?php
          $num  = $_GET["num"];

          $con = mysqli_connect("localhost", "eunseo", "1205", "diary");    
          $sql = "select * from message where num=$num";
          $result = mysqli_query($con, $sql);

          $row = mysqli_fetch_array($result);
          $send_id      = $row["send_id"];
          $rv_id      = $row["rv_id"];
          $subject    = $row["subject"];
          $content    = $row["content"];

          $subject = "RE: ".$subject; 

          $content = str_replace("\n", "\n", $content);
          $content = "\n\n\n----------------------------- Original Message -----------------------------\n".$content;

          $result2 = mysqli_query($con, "select name from members where id='$send_id'");
          $record = mysqli_fetch_array($result2);
          $send_name    = $record["name"];
      ?>		
	    <form  name="message_form" method="post" action="./php/message_insert.php?send_id=<?=$userid?>">
	    	<input type="hidden" name="rv_id" value="<?=$send_id?>">
	    	<div id="write_msg">
	    	    <ul>
				<li>
					<span class="col1">보낸 사람</span>
					<span class="col2"><?=$userid?></span>
				</li>	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
				<li>
					<span class="col1">받는 사람</span>
					<span class="col2"><?=$send_name?>(<?=$send_id?>)</span>
				</li>	
	    		<li>
	    			<span class="col1">제목</span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1"><span class="col1_textarea">내용</span></span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
        </ul>
      </div>
      <button type="button" onclick="check_input()">보내기</button>
    </form>
	</div> <!-- message_box -->
</section> 
  </body>
</html>
