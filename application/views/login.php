<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
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
	      <!-- <li class="active"><a href="#">Home</a></li> -->
	      <li class='current'><a href=#><p class='navbar-options'><span class='navbar-first'>C</span>rypt<span class='navbar-first'>Z</span>illa</p></a></li>
	    </ul>
	  </div>
	</nav>
<br><br><br><br>
	<div class='outer'>
		<div class='middle'>
			<div class='txt'>
				<p>  
					<br>
					<span style="color: yellow; font-size: 40px;">Enter Contestant-Id</span> 
				</p>
				<p>
					<?php
						if($message){
							echo $message;
						}
					?>
				</p>
				<p>
					
					<?php
						$this->load->helper('form');
						$this->load->library('form_validation');
						echo validation_errors();
						$input = array('name' => 'Contestant-Id',
										'id' => 'c_id',
										'size' => '10',
										'style' => 'color:black; background-color:white;cursor: ;');
						echo form_open('welcome/loginInput');
						echo form_input($input);
					?>

					<br><br>
				</p>
				<span>
				<a href="#" class="btn btn-primary btn-large btn-custom" onclick="learn()">
					< Learn More >
				</a>
				<?php
					echo form_submit('submit', '< Submit >', "class='btn btn-primary btn-large btn-custom'");
					echo form_close();
				?>
				</span>
			</div>
		</div>
	</div>
	<br><br><br>


<footer>
	<p class="text-left">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</footer>	

<script>
	function learn(){
		alert("\tYou just got trolled ! \nDon't Keep Poking .. Just Login !\n\t\t XD XD");
	}
</script>


</body>
</html>