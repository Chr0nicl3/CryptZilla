<!DOCTYPE html>
<html lang="en">
<head>
	<TITLE>CryptZilla</TITLE>
</head>
<body background="<?php echo base_url('images/level_8/background.jpg'); ?>" style="text-align: center;">
	<p><img src="<?php echo base_url('images/level_8/logo.png'); ?>"></p>
	<p>
	<br>
	Enter student-Id:
	</p>
	<?php
		$this->load->helper('form');
		$input = array('name' => 'sId',
						'id' => 'sId',
						'size' => '40',
						'style' => 'color:black; background-color:white;',
						'type' => 'password');
		echo form_open('welcome/levelInput');
		echo form_input($input);
		echo form_submit('submit', 'Submit');
		echo form_close();
	?>
<!-- </center> -->
</body>
</html>