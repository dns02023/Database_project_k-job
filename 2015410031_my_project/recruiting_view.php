﻿<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");

if (array_key_exists("rec_ID", $_GET)) {
    $rec_ID = $_GET["rec_ID"];
    $query = "select * from recruiting natural join enterprise natural join duty where rec_ID = $rec_ID";
    $res = mysqli_query($conn, $query);
    $recruiting = mysqli_fetch_assoc($res);
    if (!$recruiting) {
        msg("채용공고가 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>채용 정보 상세 보기</h3>

        <p>
            <label for="rec_ID">채용 코드</label>
            <input readonly type="text" id="rec_ID" name="rec_ID" value="<?= $recruiting['rec_ID'] ?>"/>
        </p>

        <p>
            <label for="ent_ID">기업 코드</label>
            <input readonly type="text" id="ent_ID" name="ent_ID" value="<?= $recruiting['ent_ID'] ?>"/>
        </p>

        <p>
            <label for="ent_name">기업명</label>
            <input readonly type="text" id="ent_name" name="ent_name" value="<?= $recruiting['ent_name'] ?>"/>
        </p>

        <p>
            <label for="location">소재지</label>
            <input readonly type="text" id="location" name="location" value="<?= $recruiting['location'] ?>"/>
        </p>

        <p>
            <label for="duty_ID">직무 코드</label>
            <input readonly type="text" id="duty_ID" name="duty_ID" value="<?= $recruiting['duty_ID'] ?>"/>
        </p>

        <p>
            <label for="duty_name">직무명</label>
            <input readonly type="text" id="duty_name" name="duty_name" value="<?= $recruiting['duty_name'] ?>"/>
        </p>

        <p>
            <label for="eligibility">지원자격</label>
            <input readonly type="text" id="eligibility" name="eligibility" value="<?= $recruiting['eligibility'] ?>"/>
        </p>
    </div>
<? include("footer.php") ?>