<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");
$mode = "입력";
$action = "review_insert.php";

if (array_key_exists("review_ID", $_GET)) {
    $review_ID = $_GET["review_ID"];
    $query =  "select * from review natural join enterprise where review_ID = $review_ID";
    $res = mysqli_query($conn, $query);
    $review = mysqli_fetch_array($res);
    if(!$review) {
        msg("리뷰가 존재하지 않습니다.");
    }
}

$enterprises = array();

$query = "select * from enterprise";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $enterprises[$row['ent_ID']] = $row['ent_name'];
}
?>
    <div class="container">
        <form name="review_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="review_ID" value="<?=$review['review_ID']?>"/>
            <h3> 기업리뷰 <?=$mode?></h3>
            <p>
                <label for="ent_ID">기업</label>
                <select name="ent_ID" id="ent_ID">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($enterprises as $id => $name) {
                            if($id == $review['ent_ID']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            
            <p>
                <label for="grade">평점</label>
                <input type="number" placeholder="0에서 9사이의 정수로 입력" id="grade" name="grade" value="<?=$review['grade']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("ent_ID").value == "-1") {
                        alert ("평가할 기업을 선택해주세요."); return false;
                    }
                    else if(document.getElementById("grade").value == "") {
                        alert ("평점을 입력해 주세요."); return false;
                    }
                    else if(document.getElementById("grade").value < 0) {
                        alert ("0부터 9까지의 정수를 입력해주세요."); return false;
                    }
                    else if(document.getElementById("grade").value > 9) {
                        alert ("0부터 9까지의 정수를 입력해주세요."); return false;
                    }
                    
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>