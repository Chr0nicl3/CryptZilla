<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?>">
	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
	<title>CryptZilla</title>
</head>
<body >
	 <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
	  <div class="container-fluid">
	    <ul class="nav navbar-nav">
	      <li><a href="<?php echo base_url(''); ?>index.php/welcome/rules"><p class='navbar-options'><span class='navbar-first'>R</span>ULES()</p></a></li>
	      <li><a href="<?php echo base_url(''); ?>index.php/welcome/level"><p class='navbar-options'><span class='navbar-first'>L</span>EVELS()</p></a></li>
	    </ul>
	  </div>
	</nav>
<br><br><br><br>
	<div class='outer'>
		<div class='middle'>
			<div class='txt'>
				<p>
					<table class="table">
						<!-- <thead>
							<tr>
							<th>S</th>
							<th>Lastname</th>
							<th>Email</th>
							</tr>
						</thead> -->
						<tbody>
							<?php
								foreach ($id as $key => $value) {
									echo '<tr>
								<td>'.$value.'</td>
								<td>'.$level[$key].'</td>
							</tr>';
								}
							?>
							<!-- <tr>
								<td>John</td>
								<td>Doe</td>
								<td>john@example.com</td>
							</tr>
							<tr>
								<td>Mary</td>
								<td>Moe</td>
								<td>mary@example.com</td>
							</tr>
							<tr>
								<td>July</td>
								<td>Dooley</td>
								<td>july@example.com</td>
							</tr> -->
						</tbody>
					</table>
				</p>
				<p>	
					<br><br>
				</p>
			</div>
		</div>
	</div>
	<br><br><br>


<footer>
	<p style="color: white; text-align: center;">Event Sponsored by : <b style="color: red"><a href="http://www.lucideus.com" target="_blank" style="color: white; font-size: 25px;">< <span style="color: red;">L</span>ucideus <span style="color: red;">T</span>ech ></a></b></p></p>
	<p class="text-left">Page rendered in <strong>{elapsed_time}</strong> seconds.
</footer>	

</body>
</html>