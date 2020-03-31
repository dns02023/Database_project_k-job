<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect("localhost", "db2015410031", "dns02023@naver.com", "db2015410031");
    $query = "select * from enterprise natural join recruiting natural join duty";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where ent_name like '%$search_keyword%' or duty_name like '%$search_keyword%'";
    
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
            <th>기업</th>
            <th>직무</th>
            <th>지원자격</th>            
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td><a href='recruiting_view.php?rec_ID={$row['rec_ID']}'>{$row['ent_name']}</a></td>";
            echo "<td>{$row['duty_name']}</td>";
            echo "<td>{$row['eligibility']}</td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
</div>
<? include("footer.php") ?>
