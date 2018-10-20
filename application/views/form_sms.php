			
<!DOCTYPE html>
<html>
	<head>
		<title>Halaman SMS Gateway</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.min.css">
		<style type="text/css">
			html, body {
				font-size: 14px;
				font-family: sans-serif;
				background-color: #cfd8e2;
			}

			#notifications {
			    cursor: pointer;
			    position: fixed;
			    right: 0px;
			    z-index: 9999;
			    bottom: 0px;
			    margin-bottom: 22px;
			    margin-right: 15px;
			    min-width: 300px; 
			    max-width: 800px;  
			}
		</style>
	</head>
	<body>
		<div class="container">
			<section class="content-header">
		            <h1>
		              <b>SMS GATEWAY</b>
		            </h1>
		        </section>

			<div id="notifications">
            	<?php echo $this->session->flashdata('msg'); ?>
            </div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Tulis Baru</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('sms/kirim_sms') ?>" method="post">
	            		<div class="row">
							<div class='col-xs-12'>
								<div class='box'>
									<div class='box-header'>
										<h3 class='box-title'><b>Tulis Baru</b></h3>
									
										<div class='box box-primary'>
											<table class='table table-bordered' width="100%">
												<tr>
													<td>No.HP: <?php echo form_error('no_hp'); ?></td>
													<td width="30%"><input type="number" class="form-control" placeholder="No HP" name="mobile[]" required="" maxlength="12" size="12"></td>
													<td align="center">Isi Pesan: <?php echo form_error('message'); ?></td>
													<td rowspan="2" width="45%"><textarea name="message" class="form-control" placeholder="Masukkan Pesan" required="" style="height: 100px;"></textarea></td>
												</tr>
												<tr>
													<td>No.HP: <?php echo form_error('mobile'); ?></td>
													<td><input type="number" class="form-control" placeholder="No HP" name="mobile[]" maxlength="12" size="12"></td>
												</tr>
												<tr>
						                            <td colspan='2'>
						                              <button type="submit" class="btn btn-primary">Kirim</button> 
						                              <button type="reset">Reset</button>
						                            </td>
						                            <td colspan='2'>
						                              <span>Sisa Credit: <?php echo $credit[6]; ?></span><br>
						                              <span>Masa Aktif: <?php echo $m_aktif; ?></span>
						                            </td>
						                        </tr>
											</table>
										</div>
									</div>
								</div>
							</div>
	            		</div>
	            	</form>
				</div>
			</div>
		</div>	

		<script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
		<script>   
		    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
		</script>

	</body>
</html>