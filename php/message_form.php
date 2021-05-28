<?php
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>
<div id="message_box">
    <div class="login_title__icon"><i class="fab fa-ethereum"></i></div>
    <h3 id="write_title">
            Send a Message
    </h3>
    <!-- 실제로 입력 하는 부분 -->
    <div id="message_box__input_box">
        <ul class="top_buttons">
            <li><span><a href="message_box.php?mode=rv" class="top_buttons__rv">받은 쪽지함 </a></span></li>
            <li><span><a href="message_box.php?mode=send" class="top_buttons__send">보낸 쪽지함</a></span></li>
        </ul>
        <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
            <div id="write_msg">
                <ul>
                <li>
                    <span class="col1">보내는 사람</span>
                    <span class="col2"><?=$userid?></span>
                </li>	
                <li>
                    <span class="col1">수신 아이디</span>
                    <span class="col2"><input name="rv_id" type="text"></span>
                </li>	
                <li>
                    <span class="col1">제목</span>
                    <span class="col2"><input name="subject" type="text"></span>
                </li>	    	
                <li id="text_area">	
                    <span class="col1">내용</span>
                    <span class="col2">
                        <textarea name="content"></textarea>
                    </span>
                </li>
                </ul>
            </div>	    	
        </form>
        
    </div>
    <button type="button" onclick="check_input()">보내기</button>
</div> <!-- message_box -->
