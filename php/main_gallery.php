<section class="board">
   	<div id="board_box">
	    <h3>
        🏆️Trend
		  </h3>
          <div class="selectBtn"><a href="main_screen_by_date.php">최신글</a></div>
	    <ul id="board_list">
				<li>
          <!-- 각각의 게시물 카드 -->
                <?php
                    if (isset($_GET["page"]))
                        $page = $_GET["page"];
                    else
                        $page = 1;

                    $con = mysqli_connect("localhost", "root", "s6139350!", "diary");
                    $sql = "select * from board order by hit desc"; // 조회수 많은 순서
                    $result = mysqli_query($con, $sql);
                    $total_record = mysqli_num_rows($result); // 전체 글 수

                    $scale = 12;
                    // $scale = 1;

                    // 전체 페이지 수($total_page) 계산 
                    if ($total_record % $scale == 0)     
                        $total_page = floor($total_record/$scale);      
                    else
                        $total_page = floor($total_record/$scale) + 1; 

                    // 표시할 페이지($page)에 따라 $start 계산  
                    $start = ($page - 1) * $scale;      
                    $number = $total_record - $start;

                for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
                {
                    mysqli_data_seek($result, $i);
                    // 가져올 레코드로 위치(포인터) 이동
                    $row = mysqli_fetch_array($result);
                    // 하나의 레코드 가져오기
                    $num         = $row["num"];
                    $id          = $row["id"];
                    $name        = $row["name"];
                    $subject     = $row["subject"];
                    $regist_day  = $row["regist_day"];
                    $hit         = $row["hit"];
                    $file_type   = $row["file_type"];
                    $file_copied = $row["file_copied"];
                    $content     = $row["content"];
                    //======================================= 이미지 처리
                    if ($file_type == "image/jpeg" || $file_type == "image/png") {
                        $image_file_image = "<img src='upload/{$file_copied}' class='image_file'>";
                    }
                    else {
                        $image_file_image = "<img src='img/Daily.jpg' class='image_file'>";
                    }
                    //=======================================
                ?>
                <li>
                    <div class="card">
                    <a href="board_view_screen.php?num=<?=$num?>&page=<?=$page?>">
                        <div class="image_file"><?php echo $image_file_image; ?></div>
                        <div class="board_list_block">
                            <!-- <span class="col1"><?=$number?></span> -->
                            <div class="row1"><?=$subject?></div>
                            <div class="row2">
                                <span class="name">글쓴이 · <?=$name?></span>
                                <!-- hit: 조회수 -->
                                <span class="hits">조회수 · <?=$hit?></span>
                            </div>
                            <div class="row3"><?=$content?></div>
                        </div>
                    </a>
                  </div>
                </li>	
            <?php
                $number--;
            }
            mysqli_close($con);
            ?>
				</li>
      </ul>
			<ul id="page_num"> 	
        <?php
            if ($total_page>=2 && $page >= 2)	
            {
                $new_page = $page-1;
                echo "<li><a href='main_screen.php?page=$new_page'>◀</a> </li>";
            }		

            // 게시판 목록 하단에 페이지 링크 번호 출력
            for ($i=1; $i<=$total_page; $i++)
            {
                if ($page == $i)     // 현재 페이지 번호 링크 안함
                {
                    echo "<li><b>$i</b></li>";
                }
                else
                {
                    echo "<li><a href='main_screen.php?page=$i'>$i</a></li>";
                }
            }
            if ($total_page>=2 && $page != $total_page)		
            {
                $new_page = $page+1;	
                echo "<li> <a href='main_screen.php?page=$new_page'>▶</a></li>";
            }
        ?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<li>
                <?php 
                    if($userid) {
                ?>
					<button onclick="location.href='board_form_screen.php'">글쓰기</button>
                <?php
                    } else {
                ?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
                <?php
                    }
                ?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section> 
