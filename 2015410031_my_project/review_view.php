<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");

if (array_key_exists("review_ID", $_GET)) {
    $review_ID = $_GET["review_ID"];
    $query = "select * from review natural join enterprise where review_ID = $review_ID";
    $res = mysqli_query($conn, $query);
    $review = mysqli_fetch_assoc($res);
    if (!$review) {
        msg("리뷰가 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>기업 리뷰 상세 보기</h3>

        <p>
            <label for="review_ID">리뷰 코드</label>
            <input readonly type="text" id="review_ID" name="review_ID" value="<?= $review['review_ID'] ?>"/>
        </p>

        <p>
            <label for="ent_ID">기업 코드</label>
            <input readonly type="text" id="ent_ID" name="ent_ID" value="<?= $review['ent_ID'] ?>"/>
        </p>

        <p>
            <label for="ent_name">기업명</label>
            <input readonly type="text" id="ent_name" name="ent_name" value="<?= $review['ent_name'] ?>"/>
        </p>

        <p>
            <label for="location">소재지</label>
            <input readonly type="text" id="location" name="location" value="<?= $review['location'] ?>"/>
        </p>


        <p>
            <label for="grade">평점</label>
            <input readonly type="number" id="grade" name="grade" value="<?= $review['grade'] ?>"/>
        </p>
    </div>
<? include("footer.php") ?>