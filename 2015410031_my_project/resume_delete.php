﻿<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");

$resume_ID = $_GET['resume_ID'];

mysqli_query($conn, "set autocommit = 0");	//refinement, autocommit 해제
mysqli_query($conn, "set transation isolation level serializable");	//refinement, isolation level 설정
mysqli_query($conn, "begin");	//refinement, begins a transation

$ret = mysqli_query($conn, "delete from resume where resume_id = $resume_ID");


if(!$ret)
{
	mysqli_query($conn, "rollback"); //refinement, 이력서 삭제 query 수행 실패. 수행 전으로 rollback
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	mysqli_query($conn, "commit"); //refinement, 이력서 삭제 query 수행 성공. 수행 내역 commit
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=resume_list.php'>";
}

?>

