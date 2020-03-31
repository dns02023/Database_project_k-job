<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>K-job</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="recruiting_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">K-job</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="채용 공고를 검색해보세요.">
                    
                </li>
                <li><a href='enterprise_list.php'>기업 정보</a></li>
                <li><a href='recruiting_list.php'>채용 공고</a></li>
                <li><a href='resume_list.php'>이력서 모아보기</a></li>
                <li><a href='review_list.php'>기업 리뷰 모아보기</a></li>
                <li><a href='resume_form.php'>이력서 작성하기</a></li>
                <li><a href='review_form.php'>기업 리뷰 작성하기</a></li>
            </ul>
        </div>
    </div>
</form>