<?php
session_start();
$num = $_POST['number'];
$let = $_POST['letter'];
$link = mysqli_connect("localhost", "root", "", "classlists");
$result = mysqli_query($link, "SELECT * FROM `students` WHERE `number` = '$num' AND `letter` = '$let'");
$_SESSION['class'] = "SELECT * FROM `students` WHERE `number` = '$num' AND `letter` = '$let'";
$i = 1;
/*while ($row = mysqli_fetch_array($result)){
    print("<tr>
      <th scope="row"> " . $i . " </th>
      <td>".$row['FIO']."</td>
    </tr>");
}*/
$link->close();
header("location: ../classlist.php");
?>