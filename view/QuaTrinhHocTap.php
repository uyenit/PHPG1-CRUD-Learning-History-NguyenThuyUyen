<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learningHistory.php");

$rsMockData = LearningHistory::getList("16T1021034");
$rsFromFile = LearningHistory::getListFromFile("101");
// var_dump($rsFromFile);
// var_dump($rsMockData);

// delete record
// var_dump($_REQUEST);
if ($_REQUEST != null) {
	$id = $_REQUEST["id"];
	echo $id;
	$data = file("../resource/learningHistory.txt");
	$pos = -1;
	foreach ($data as $key => $value) {
		$temp = explode("#", $value);
		if ($temp[0] == $id){
			$pos = $key;
			break;
		}
	}
	if ($pos != -1) {
		unset($data[$pos]);
		$myFile = fopen("../resource/learningHistory.txt", "w") or die("Cannot open file: " . $myFile);
		foreach ($data as $key => $value) {
			fwrite($myFile, $value);
		}
		fclose($myFile);
	}
}
?>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
				<a class="btn btn-outline-primary" href="createForm.php"><i class="fas fa-plus-circle"></i> Thêm</a>
			</div>
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Từ năm</th>
					<th scope="col">Đến năm</th>
					<th scope="col">Lớp</th>
					<th scope="col">Nơi học</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($rsFromFile as $key => $value) {
					$stt = $key + 1;
					echo "<tr>";
					echo "<th scope='row'>$stt</th>";
					echo "<td>$value->yearFrom</td>";
					echo "<td>$value->yearTo</td>";
					echo "<td>$value->schoolName</td>";
					echo "<td>$value->schoolAddress</td>";
					echo "<td class='d-flex'>";
					echo "<a href='editForm.php?yearFrom=$value->yearFrom&yearTo=$value->yearTo&schoolName=$value->schoolName&schoolAddress=$value->schoolAddress&idStudent=$value->idStudent&id=$value->id'
					class='btn btn-outline-success mr-3'><i class='far fa-edit'></i> Sửa</a>";
					echo "<a href='QuaTrinhHocTap.php?id=$value->id' class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i> Xóa</a>";
					echo "</td>";
					echo "</tr>";
				}
				?>
				<!-- <tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>Quang Thái</td>
					<td class="d-flex">
						<button class="btn btn-outline-success mr-3"><i class="far fa-edit"></i> Sửa</button>
						<button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Xóa</button>
					</td>
				</tr>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>Quang Thái</td>
					<td class="d-flex">
						<button class="btn btn-outline-success mr-3"><i class="far fa-edit"></i> Sửa</button>
						<button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Xóa</button>
					</td>
				</tr> -->

			</tbody>
		</table>
	</div>
</div>

<?php
include_once("footer.php"); ?>
