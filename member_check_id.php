<!DOCTYPE html>
<head>
    <meta charset="utf-8">
        <style>
            body {
                font-family: "Gothic A1", sans-serif;
            }
            h3 {
            padding-left: 5px;
            border-left: solid 5px rgb(255, 159, 172);
            }
            #close {
            margin:20px 0 0 80px;
            cursor:pointer;
            }
            li {
                list-style: none;
            }
            span {
            background-color: #263343;
            color: #f0f4f5;
            width: 100%;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: smaller;
            margin-left: 5px;
            }
        </style>
</head>
<body>
    <h3>아이디 중복체크</h3>
        <p>
            <?php
                $id = $_GET["id"];

                if(!$id) 
                {
                    echo("<li>아이디를 입력해 주세요.</li>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "eunseo", "1205", "couple diary");               
                    $sql = "select * from members where id='$id'";
                    $result = mysqli_query($con, $sql);
                    $num_record = mysqli_num_rows($result);
                    if ($num_record)
                    {
                        echo "<li>".$id." 아이디는 중복됩니다.</li>";
                        echo "<li>다른 아이디를 사용해 주세요.</li>";
                    }
                    else
                    {
                        echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
                    }                  
                    mysqli_close($con);
                }
            ?>
        </p>
    <div id="close">
        <span class="close" onclick="javascript:self.close()">닫기</span>
    </div>
</body>
</html>

