<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");
    $query = "select * from resume natural join recruiting";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where app_name like '%$search_keyword%' ";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>지원자명</th>
            <th>채용공고</th>
            <th>전공</th>    
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td><a href='resume_view.php?resume_ID={$row['resume_ID']}'>{$row['app_name']}</a></td>";
            echo "<td>{$row['rec_ID']}</td>";
            echo "<td>{$row['major']}</td>";
            echo "<td>
                <a href='resume_form.php?resume_ID={$row['resume_ID']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['resume_ID']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(resume_ID) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "resume_delete.php?resume_ID=" + resume_ID;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
