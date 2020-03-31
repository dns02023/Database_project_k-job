﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");

$ent_ID = $_POST['ent_ID'];
$grade = $_POST['grade'];

mysqli_query($conn, "set autocommit = 0");	//refinement, autocommit 해제
mysqli_query($conn, "set transation isolation level serializable");	//refinement, isolation level 설정
mysqli_query($conn, "begin");	//refinement, begins a transation

$ret = mysqli_query($conn, "insert into review (ent_ID, grade) values('$ent_ID', '$grade')");
if(!$ret)
{
	mysqli_query($conn, "rollback"); //refinement, 기업리뷰 등록 query 수행 실패. 수행 전으로 rollback
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); //refinement, 기업리뷰 등록 query 수행 성공. 수행 내역 commit
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=review_list.php'>";
}

?>

