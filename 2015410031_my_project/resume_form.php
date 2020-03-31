﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");
$mode = "입력";
$action = "resume_insert.php";

if (array_key_exists("resume_ID", $_GET)) {
    $resume_ID = $_GET["resume_ID"];
    $query =  "select * from resume where resume_ID = $resume_ID";
    $res = mysqli_query($conn, $query);
    $resume = mysqli_fetch_array($res);
    if(!$resume) {
        msg("이력서가 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "resume_modify.php";
}

$recruitings = array();

$query = "select * from recruiting";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $recruitings[$row['rec_ID']] = $row['rec_ID'];
}
?>
    <div class="container">
        <form name="resume_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="resume_ID" value="<?=$resume['resume_ID']?>"/>
            <h3>이력서 정보<?=$mode?></h3>
            <p>
                <label for="rec_ID">채용코드</label>
                <select name="rec_ID" id="rec_ID">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($recruitings as $id => $name) {
                            if($id == $resume['rec_ID']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="app_name">지원자명</label>
                <input type="text" placeholder="성명 입력" id="app_name" name="app_name" value="<?=$resume['app_name']?>"/>
            </p>

            <p>
                <label for="major">전공</label>
                <input type="text" placeholder="전공 입력" id="major" name="major" value="<?=$resume['major']?>"/>
            </p>
            
            

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("rec_ID").value == "-1") {
                        alert ("채용공고를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("app_name").value == "") {
                        alert ("성명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("major").value == "") {
                        alert ("전공을 입력해 주십시오"); return false;
                    }
                    
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>