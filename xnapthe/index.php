<!DOCTYPE html>
   <html>
      <head>
		<meta charset="UTF-8">
		<title>Bruhazard | Donate</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
	    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
		<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
		<link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<button onclick="window.location.href = 'http://j4fsmp.ml/home';"><img src="https://cdn.discordapp.com/attachments/757574328710725763/998532226121748531/Untitled.png" /></button>  
	</head>
  <body>
<style type="text/css">
body
{
background-image:url('https://wallpaperaccess.com/full/2801922.jpg');
}
  .disclaimer { display: none; }
</style>
      <script type="text/javascript"> new WOW().init(); </script>
        <div class="container">
</br>
		   <div id="status"></div>
		<div class="row" style="margin-top: 30px;">
			<div class="col-md-5">
				<form method="POST" action="#" id="myform">
				     <tbody>
					 <tr bgcolor="199883">
					     <td colspan="2" align="center"><h3 style="color:#FF0051;">Thông tin</h3> </td>
					 </tr>
					 <tr>
						<b><td><label><p style="color:#ff80bf">Your Ingame</label></td></b>
						<td><input type="text" class="form-control" name="username" required /></td>
					</tr>
					<tr>
						<b><td><label>Loại thẻ</label></td></b>
						<td><select class="form-control" name="card_type" required>
							<option value="">Loại thẻ</option>
							 <?php 
							 
							 
	                    $cdurl = curl_init("https://thesieutoc.net/card_info.php"); 
                       	curl_setopt($cdurl, CURLOPT_FAILONERROR, true); 
	                    curl_setopt($cdurl, CURLOPT_FOLLOWLOCATION, true); 
	                    curl_setopt($cdurl, CURLOPT_RETURNTRANSFER, true); 
						curl_setopt($cdurl,CURLOPT_CAINFO, __DIR__ .'/api/curl-ca-bundle.crt');
						curl_setopt($cdurl,CURLOPT_CAPATH, __DIR__ .'/api/curl-ca-bundle.crt');
	                    $obj = json_decode(curl_exec($cdurl), true); 
	                    curl_close($cdurl);
						$length = count($obj);
						for ($i = 0; $i < $length; $i++) {
							if ($obj[$i]['status'] == 1){
								echo '<option value="'.$obj[$i]['name'].'">'.$obj[$i]['name'].'</option> ';
							}
						}
							?>
						</select></td>
					</tr>
					<tr>
						<b><td><label>Mệnh giá</label></td></b>
						<td><select class="form-control" name="card_amount" required>
							<option value="">Chọn mệnh giá</option>
							<option value="10000">10.000</option>
							<option value="20000">20.000</option>
							<option value="30000">30.000 </option>
							<option value="50000">50.000</option>
							<option value="100000">100.000</option>
							<option value="200000">200.000</option>
							<option value="300000">300.000</option>
							<option value="500000">500.000</option>
						</select></td>
					</tr>
					<tr>
						<b><td><label>Seri</label></td></b>
						<td><input type="text" class="form-control" name="serial" required /></td>
					</tr>
					<tr>
						<b><td><label>Mã thẻ</label></td></b>
						<td><input type="text" class="form-control" name="pin" required /></td>
					</tr>
					<tr>
					     <br>
						<td colspan="2" align="center"><button type="submit" class="btn btn-success btn-block" name="submit">Donate</button></td>
					</tr>
					</tbody>
				</table>	
				</form>
				<script type="text/javascript">

	
    $("#myform").submit(function(e) {
		$("#status").html("<img src='./assets/load.gif' width='30%' />");
        e.preventDefault();
        $.ajax({
                url: "./ajax/card.php",
                type: 'post',
                data: $("#myform").serialize(),
                success: function(data) {
                   $("#status").html(data);
                   document.getElementById("myform").reset(); 
				   $("#load_hs").load("./ajax/history.php");
                }
        });

    });

 
</script>
			</div>
		<div class="col-md-7">
      <div id="load_hs" class="card-body table-responsive">
		 <center><img src='./assets/load.gif' width='50%' /></center>
	  </div>
	  <script>
		$("#load_hs").load("./ajax/history.php");
		setInterval(function(){
		$("#load_hs").load("./ajax/history.php");
		},10000);
		</script>
    </div>
  </div>
</div>  
			 </div>
		</div>
	</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        </body>	
</html>		
