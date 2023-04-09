<table class="table table-bordered blueTable">
	<thead>
		<tr bgcolor="#5cd65c" style="color:black">
		  <th scope="col">Ingame</th>
		  <th scope="col">Mệnh Giá</th>
		  <th scope="col">Thẻ</th>
		  <th scope="col">Trạng Thái</th>
		</tr>
	</thead>  
  <?php 
include("../api/config.php");

$query = $conn->query("SELECT * FROM `trans_log` ORDER BY `id` DESC LIMIT 10");
if($query->num_rows > 0){ 
    while($row = $query->fetch_array()){
	    if ($row['status'] == 1){
			$status = '<span class="badge badge-success" style="font-size:100%;color:white;">Thành Công</span>';
	    } else if ($row['status'] == 2){
			$status = '<span class="badge badge-danger" style="font-size:100%;color:white;">Thất Bại</span>';
		} else if ($row['status'] == 3){
			$status = '<span class="badge badge-info" style="font-size:100%;color:white;">Sai Mệnh Giá</span>';
		} else {
		    $status = '<span class="badge badge-info" style="font-size:100%;color:white;">Chờ Duyệt</span>';
		}
		echo '
	    <tbody>
			<td>'.$row['name'].'</td>
			<td>'.number_format($row['amount']).'đ</td>
			<td>'.$row['type'].'</td>
			<td>'.$status.'</td>
		</tbody>
		';
	}
} else {
	echo '
	<tbody>
		<td colspan="6" align="center"><span class="btn btn-success" style="font-size:100%;color:white;"><< Lịch Sử Trống >></span></td>
	</tbody>
	';
}
  ?>
  
		</table>
