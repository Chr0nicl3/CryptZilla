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
	<script language='JavaScript'>
	function TriggeredKey(e)
	{
	    var keycode;
	    if (window.event) keycode = window.event.keyCode;
	    if (window.event.keyCode != 13 ) return false;
	}
	</script>
	?>
</head>
<?php 
	if($level==7){
		echo "<style type='text/css'>
				.design{
					width:75px;
					height:100px;
					background-color:#008032;
					color:#7468697361696e7461636f6c6f72;
					border:solid;
					margin:0, auto;
				}
				.style{
					width:75px;
					height:100px;
					background-color:#005434;
					color:#000;
					border:solid;
					margin:0, auto;
				}
			</style>";
	}
?>
<body onkeydown="TriggeredKey(this)">
	 <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
	  <div class="container-fluid">
	    <ul class="nav navbar-nav">
	      <!-- <li class="active"><a href="#">Home</a></li> -->
	      <li><a href="<?php echo base_url(''); ?>index.php/welcome/rules"><p class='navbar-options'><span class='navbar-first'>R</span>ULES()</p></a></li>
	      <li class="current"><a href="<?php echo base_url(''); ?>index.php/welcome/level"><p class='navbar-options'><span class='navbar-first'>L</span>EVELS()</p></a></li>
	    </ul>
	  </div>
	</nav>
<br><br><br><br>
	<div class='outer'>
		<div class='middle'>
			<div class='txt'>
				<p>
					<?php
						echo $text;
					?>
				</p>
				<p>	
					
					<?php
						$current = $level;
						if($current==5||$current==11){
							$input = array('name' => 'test',
											'id' => 'test',
											'size' => '40',
											'style' => 'color:black; background-color:white;',
											'type' => 'password');
							echo form_open('welcome/level'.$current.'Encrypt');
							echo form_input($input);
							echo "<br><br>";
							echo form_submit('submit', '< Encrypt >', "class='btn btn-primary btn-large btn-custom'");
							echo form_close();
						}
						if($current==5)
							echo "You have recovered his encrypted password. It is:<br><b style='font-family: sans-serif;'>citrrnism</b><br>Decrypt the password and enter it below to advance to the next level.<br><b>Password:</b>";
						if($current==11)
							echo "If you can decrypt this data and send me the original text, it would be much appreciated. Thank you.<br>Encrypted Data:<br><b style='font-family: sans-serif;'>.17.17.63.30.12.73.45.8.46.46.18.41<br>.45.25.35.46.9.54.7.23.67.22.8.67.15.32.60.1.45.59</b><br><br>";
						if($current==1||$current==2||$current==4||$current==5||$current==7||$current==8||$current==10||$current==11||$current==12){
							$this->load->library('form_validation');
							echo validation_errors();
							$input = array('name' => 'flag',
											'id' => 'flag',
											'size' => '40',
											'style' => 'color:black; background-color:white;',
											'type' => 'password');
							echo form_open('welcome/levelInput');
							echo form_input($input);
						}
					?>

					<br><br>
				</p>
				<?php
					if($current==1||$current==2||$current==4||$current==5||$current==7||$current==8||$current==10||$current==11||$current==12){
						echo form_submit('submit', '< Submit >', "class='btn btn-primary btn-large btn-custom'");
						echo form_close();
					}
				?>
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
<?php
	if($level==1||$level==7){
		echo '<!-- End Of File -->';
		for ($i=0; $i < 250; $i++) { 
			echo "\n";
		}
		if($level==1)
			echo "<!--Oh! you came all the way down here.. :) Here's the Flag: takemetonextlevel-->";
		else{
			echo "<script type='text/javascript'>
					if (document.addEventListener) { // IE >= 9; other browsers
				        document.addEventListener('contextmenu', function(e) {
				            alert('No Right-Clicks This Time. ~.~'); //here you draw your own menu
				            e.preventDefault();
				        }, false);
				    }
				</script>";
			echo "<!--You Again ! .. ~_~ Try this: onceagain-->";
		}
	}

	if(($level==5||$level==11) && $encrypted!=''){
		echo "<script type='text/javascript'>alert('$encrypted');</script>";
	}
?>