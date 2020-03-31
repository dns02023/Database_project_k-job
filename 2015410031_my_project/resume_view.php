<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");

if (array_key_exists("resume_ID", $_GET)) {
    $resume_ID = $_GET["resume_ID"];
    $query = "select * from recruiting natural join enterprise natural join duty natural join resume where resume_ID = $resume_ID";
    $res = mysqli_query($conn, $query);
    $resume = mysqli_fetch_assoc($res);
    if (!$resume) {
        msg("리뷰가 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>이력서 정보 상세 보기</h3>

        <p>
            <label for="resume_ID">이력서 코드</label>
            <input readonly type="text" id="resume_ID" name="resume_ID" value="<?= $resume['resume_ID'] ?>"/>
        </p>

        <p>
            <label for="app_name">지원자명</label>
            <input readonly type="text" id="app_name" name="app_name" value="<?= $resume['app_name'] ?>"/>
        </p>

        <p>
            <label for="rec_ID">채용 코드</label>
            <input readonly type="text" id="rec_ID" name="rec_ID" value="<?= $resume['rec_ID'] ?>"/>
        </p>

        <p>
            <label for="ent_ID">기업 코드</label>
            <input readonly type="text" id="ent_ID" name="ent_ID" value="<?= $resume['ent_ID'] ?>"/>
        </p>

        <p>
            <label for="ent_name">기업명</label>
            <input readonly type="text" id="ent_name" name="ent_name" value="<?= $resume['ent_name'] ?>"/>
        </p>

        <p>
            <label for="location">소재지</label>
            <input readonly type="text" id="location" name="location" value="<?= $resume['location'] ?>"/>
        </p>

        <p>
            <label for="duty_ID">직무 코드</label>
            <input readonly type="text" id="duty_ID" name="duty_ID" value="<?= $resume['duty_ID'] ?>"/>
        </p>

        <p>
            <label for="duty_name">직무명</label>
            <input readonly type="text" id="duty_name" name="duty_name" value="<?= $resume['duty_name'] ?>"/>
        </p>

        <p>
            <label for="major">전공</label>
            <input readonly type="text" id="major" name="major" value="<?= $resume['major'] ?>"/>
        </p>



    </div>
<? include("footer.php") ?>