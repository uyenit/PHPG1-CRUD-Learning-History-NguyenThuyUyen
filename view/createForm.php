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

  $myFile = fopen("../resource/learningHistory.txt", "a") or die ("Cannot open file: " .$myFile);
  $line = $id . "#" . $yearFrom . "#" . $yearTo . "#" . $schoolName . "#" . $schoolAddress . "#" . $idStudent . "\n";
  echo $line;
  fwrite($myFile, $line);
}

?>

<div class="container-fluid">
  <table>
    <form action="createForm.php" method="post">
      <tr>
        <td>ID: </td>
        <td><input type="text" name="id"></td>
      </tr>
      <tr>
        <td>year from: </td>
        <td><input type="text" name="yearFrom"></td>
      </tr>
      <tr>
        <td>year to: </td>
        <td><input type="text" name="yearTo"></td>
      </tr>
      <tr>
        <td>school name: </td>
        <td><input type="text" name="schoolName"></td>
      </tr>
      <tr>
        <td>school address: </td>
        <td><input type="text" name="schoolAddress"></td>
      </tr>
      <tr>
        <td>ID student: </td>
        <td><input type="text" name="idStudent" value="101"></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" value="submit">Submit</button></td>
      </tr>
    </form>
  </table>
</div>


<?php
include_once("footer.php"); ?>
