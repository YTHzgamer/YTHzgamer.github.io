<?php
//=====================CODE BY NGUYENTHANHLOC===================//
include 'config.php'; 
    if(isset($_POST['submit'])) {
        if(!isset($_POST['ten']) || !isset($_POST['card_type']) || !isset($_POST['card_amount']) || !isset($_POST['serial']) || !isset($_POST['pin'])) {
            $err = 'Bạn cần nhập đầy đủ thông tin';
        }else{
            $name = $_POST['ten'];
            $type = $_POST['card_type'];
            $amount = $_POST['card_amount'];
            $seri = $_POST['serial'];
            $pin = $_POST['pin'];
            
            if($name == '' || $type == '' || $amount == '' || $seri == '' || $pin == '') {
                $err = 'Bạn cần nhập đầy đủ thông tin';
            
            //if(strlen($type) < 6 || strlen($type) > 30 || strlen($amount) < 6|| strlen($amount) > 30){
                // $err = 'Bạn cần nhập 10 > 20 kí tự';
            }else{
                include 'config.php'; 
            $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `gachthe` WHERE `code`='$pin' AND `serial`='$seri'"), 0);
				if(empty($pin) || empty($seri)) {
				$err = 'Bạn cần nhập đầy đủ thông tin';
				}else{ if($check >= 1){
				    $err = 'Thẻ đã tồn tại hoặc đang được xử lý vui lòng không gửi quá nhiều lần';
				}else{
				$name = $_POST['ten'];  
				$tr = 'Đợi Xử Lý';
			mysql_query("INSERT INTO `gachthe` (`code`, `serial`, `menhgia`, `loaithe`, `uid`, `tinhtrang`) VALUES ('".$pin."','".$seri."','".$amount."','".$type."','".$name."','".$tr."')");
				$err = 'Yêu cầu của bạn đang được Xử lý!';
				}
				}
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nạp Thẻ Chậm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-12">
                <form method="POST" action="">
                   <div class="form-group">
                        <label>Họ Tên:</label>
                        <input type="text" class="form-control" name="ten" id="ten" />
                    </div>
                    <div class="form-group">
                        <label>Loại thẻ:</label>
                        <select class="form-control" name="card_type">
                            <option value="">Chọn loại thẻ</option>
                            <option value="0">Viettel</option>
                            <option value="1">Vinafone</option>
                            <option value="2">Mobifone</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mệnh giá:</label>
                        <select class="form-control" name="card_amount">
                            <option value="">Chọn mệnh giá</option>
                            <option value="10000">10.000</option>
                            <option value="20000">20.000</option>
                            <option value="30000">30.000</option>
                            <option value="50000">50.000</option>
                            <option value="100000">100.000</option>
                            <option value="200000">200.000</option>
                            <option value="300000">300.000</option>
                            <option value="500000">500.000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số seri:</label>
                        <input type="text" class="form-control" name="serial" />
                    </div>
                    <div class="form-group">
                        <label>Mã thẻ:</label>
                        <input type="text" class="form-control" name="pin" />
                    </div>
                    <div class="form-group">
                <?php echo (isset($err)) ? '<div class="alert alert-danger" role="alert">'.$err.'</div>' : ''; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-sm btn-warning btn-block" name="submit">Gửi Thẻ</button>
                    </div>
                </form>
            </div>
            
            
            <div class="col-md-12">
                	
<table class="table table-hover">
   <tr>
	   <th>STT</th>
	   <th>Tên</th>
	   <!--<th>Mã Thẻ</th>-->
	    <!--<th>Serial Thẻ</th>-->
	   <th>Mệnh giá</th>
	    <th>Loại thẻ</th>
	   <th>Tình Trạng</th>
   </tr>
<tbody>
<?php
include 'config.php'; 
$getloaithe = array('Viettel','Vinaphone','Mobifone');
$TOM_result = mysql_query("SELECT * FROM `gachthe` WHERE `id` ORDER by id DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){ ?>
<tr>
   <th scope="row">#<?php echo $gettom['id']; ?></th>
   <th><?php echo $gettom['uid']; ?></th>
   <!--<td>< ?php echo $gettom['code']; ?></td>
   <!--<td>< ?php echo $gettom['serial']; ?></td>-->
   <td><?php echo number_format($gettom['menhgia']); ?> <sup>VNĐ</sup></td>
   <td><?php echo $getloaithe[$gettom['loaithe']]; ?></td>
   <td><?php echo $gettom['tinhtrang']; ?></td>
</tr>                 
<?php }?>
</tbody>
</table>
</div>


</div>
            
            <!-- /./ row -->
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>