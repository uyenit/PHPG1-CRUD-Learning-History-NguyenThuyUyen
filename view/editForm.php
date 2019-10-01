<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learningHistory.php");
// var_dump($_REQUEST);
if ($_REQUEST != null) {
  $id = $_REQUEST["id"];
  $yearFrom = $_REQUEST["yearFrom"];
  $yearTo = $_REQUEST["yearTo"];
  $schoolName = $_REQUEST["schoolName"];
  $schoolAddress = $_REQUEST["schoolAddress"];
  $idStudent = $_REQUEST["idStudent"];

  if (isset($_REQUEST["submit"]) != null) {
    // var_dump($_REQUEST);
    $data = file("../resource/learningHistory.txt");
    $pos = -1;
    foreach ($data as $key => $value) {
      $temp = explode("#", $value);
      if ($temp[0] == $id) {
        $pos = $key;
        break;
      }
    }
    if ($pos != -1) {
      $data[$pos] = $id . "#" . $yearFrom . "#" . $yearTo . "#" . $schoolName . "#" . $schoolAddress . "#" . $idStudent . "\r\n";
      $myFile = fopen("../resource/learningHistory.txt", "w") or die("Cannot open file: " . $myFile);
      foreach ($data as $key => $value) {
        fwrite($myFile, $value);
      }
      fclose($myFile);
      echo "Edit successfully";
    } else {
      echo "Edit fail";
    }
  }
}

?>

<div class="container-fluid">
  <table>
    <form action="editForm.php" method="post">
      <?php
      echo "<tr>";
      echo "<td>ID: </td>";
      echo "<td><input type='text' name='id' value='$id'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>year from: </td>";
      echo "<td><input type='text' name='yearFrom' value='$yearFrom'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>year to: </td>";
      echo "<td><input type='text' name='yearTo' value='$yearTo'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>school name: </td>";
      echo "<td><input type='text' name='schoolName' value='$schoolName'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>school address: </td>";
      echo "<td><input type='text' name='schoolAddress' value='$schoolAddress'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>ID student: </td>";
      echo "<td><input type='text' name='idStudent' value='$idStudent'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td></td>";
      echo "<td><button type='submit' name='submit' value='submit'>Submit</button></td>";
      echo "</tr>";
      ?>
    </form>
  </table>
</div>


<?php
include_once("footer.php"); ?>
