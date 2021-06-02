<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
	$upload_dir = '../upload/';

	# 파일 추가 되었는지 확인
	$is_file_empty= "select file_name from board where num=$num"; 


	# 만약 처음 추가하는 파일이라면,
	if (!$is_file_empty) {

		$upfile_name	 = $_FILES["upfile"]["name"];
		$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
		$upfile_type     = $_FILES["upfile"]["type"];
		$upfile_size     = $_FILES["upfile"]["size"];
		$upfile_error    = $_FILES["upfile"]["error"];


		if ($upfile_name && !$upfile_error)
		{
			$file = explode(".", $upfile_name);
			$file_name = $file[0];
			$file_ext  = $file[1];

			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name;
			$copied_file_name = $new_file_name.".".$file_ext;      
			$uploaded_file = $upload_dir.$copied_file_name;

			if( $upfile_size  > 10000000 ) {
					echo("
					<script>
					alert('업로드 파일 크기가 지정된 용량(10MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
					history.go(-1)
					</script>
					");
					exit;
			}

			if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
			{
					echo("
						<script>
						alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
						history.go(-1)
						</script>
					");
					exit;
			}
		}
		else 
		{
			$upfile_name      = "";
			$upfile_type      = "";
			$copied_file_name = "";
		}

		$con = mysqli_connect("localhost", "root", "s6139350!", "diary");
		$sql = "insert into board (id, name, subject, content, file_name, file_type, file_copied) ";
		$sql .= "values('$userid', '$username', '$subject', '$content', ";
		$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	

		$sql = "update board set subject='$subject', content='$content', file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name'";
		$sql .= " where num=$num";
		mysqli_query($con, $sql);
		mysqli_close($con);     
	}
	// 파일 변화 없
	else {
		$con = mysqli_connect("localhost", "root", "s6139350!", "diary");
		$sql = "update board set subject='$subject', content='$content'";
		$sql .= " where num=$num";
		mysqli_query($con, $sql);
		mysqli_close($con);     
	}

    echo "
	      <script>
	          location.href = '../board_list_screen.php?page=$page';
	      </script>
	  ";
?>