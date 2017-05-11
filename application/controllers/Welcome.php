<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('status');
		$this->load->helper('date');
		$this->load->helper('cookie');
		$this->load->library('user_agent');
    }

    public function rules(){
    	$this->load->view('rules');
    }

	public function home(){
		$this->load->view('home');
	}

	public function login(){
		$invalid['message'] = '';
		$this->load->view('login', $invalid);
	}

	public function index(){
		$this->load->view('welcome');
	}

	public function update(){ //for updating session data after each successful submisssion
		$id = $this->session->userdata('id');
		$stats = $this->status->getId($id);
		$this->session->set_userdata($stats[0]);
		redirect('welcome/level');
	}

	public function level5Encrypt(){
		if($this->input->post('submit')){
			$c = $this->input->post('test');
			$new='';
			for($i=0; $i<strlen($c); ++$i){
				$new .= chr(ord($c[$i])+$i);
			}
			$data['text'] = '<b>Level 5</b><br><br><br>Our blooming Network Security Analyst Sam has encrypted his password. The encryption system is publically available and can be accessed with this form:<br>Please enter a string to have it encrypted.<br>';
			$data['level'] = $this->session->userdata('level')+1;
			$data['encrypted'] = $new;
			$this->load->view('levels', $data);
			// echo $new;
		}
	}

	public function level11Encrypt(){
		if($this->input->post('submit')){
			$c = $this->input->post('test');
			$new='';
			for($i=0; $i<strlen($c); ++$i){
				$ascii = ord($c[$i]);
				$first = rand(1,$ascii/2);
				$int1 = $ascii-$first;
				$second = rand(1,$int1/2);
				$third = $int1-$second;
				$new.='.'.$first.'.'.$second.'.'.$third;
			}
			$data['text'] = "<b>Level 10</b><br><br>Hello esteemed hacker, I hope you have some decent cryptography skills. I have some text I need decrypted.<br>I have done some information gathering on my network and I have recovered some data. However, it is encrypted and I cannot seem to decode it using any of my basic decryption tools. I have narrowed it down to the algorithm used to encrypt it, but it is beyond my scope.<br>Enter text to encrypt it.<br>";
				$data['level'] = $this->session->userdata('level')+1;
				$data['encrypted'] = $new;
				$this->load->view('levels', $data);
		}
	}

	public function level(){
		switch ($this->session->userdata('level')+1) {
			case '1': //source be with you
				$data['text'] = '<b>Level 1</b><br><br> I would change the world if GOD provided me the Source code of it !<br><br>';
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '2': //forgot to upload passwd script (empty password field)
				$data['text'] = '<b>Level 2</b><br><br>Our new blooming Network Security Ananlyst set up a password protection script. He made it load the real password from an unencrypted text file and compare it to the password the user enters. However, he <span style="color:yellow;">forgot</span> to upload the password file... !<br>Can you guess the string to get past this login form<br><br>';
				$data['level'] = $this->session->userdata('level')+1;
				$data['encrypted'] = '';
				$this->load->view('levels', $data);
				break;

			case '3': //cookie manipulation
				redirect('welcome/levelInput');
				break;

			case '4': //QR Code + morse code
				$data['text'] = '<b>Level 4</b><br><br><br><IMG SRC='.base_url('images/level_4.png').'><br><br><br>';
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '5': //encryption : c[i]+i
				$data['text'] = '<b>Level 5</b><br><br><br>Our blooming Network Security Analyst Sam has encrypted his password. The encryption system is publically available and can be accessed with this form:<br>Please enter a string to have it encrypted.<br>';
				$data['level'] = $this->session->userdata('level')+1;
				$data['encrypted'] = '';
				$this->load->view('levels', $data);
				break;

			case '6': //user agent manipulation
				echo 'in level 6';
				$data['text'] = "<b>Level 6</b><br><br><br>You need to get access to the contents of this <a href=".base_url('')."index.php/welcome/levelInput style='color:red;'>SITE</a>. In order to achieve this, however, you must buy the <span style='color:yellow;'>p0wnBrowser</span> web browser. Since it is too expensive, you will have to <span style='color:yellow;'>fool</span> the system in some way, so that it let you read the site's contents.<br>";
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '7': //deeper source
				$data['text'] = "<b>Level 7</b><br><br> I changed the world. Now i want to go Deeper and Style up hell too!! Don't worry GOD's with us ;)<br><br>";
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '8': //t9 cipher
				$data['text'] = "<b>Level 8</b><br><br>Missing my Nokia 1100<br><br><b style='font-family: sans-serif;'>84470470207263660787464</b><br><br>";
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '9': //directory+cookie
				$data['text'] = "<b>Level 9</b><br><br>A good friend of mine studies at <a href=".base_url('')."index.php/welcome/levelInput style='color:red;'>Acme University</a>, in the Computer Science and Telecomms Department. Unfortunately, her grades are not that good. You are now thinking 'This is big news!'... Hmmm, maybe not. What is big news, however, is this: The network administrator asked for 1,00,000 Rupees to change her marks into A's. This is obviously a case of administrative authority abuse. Hence... a good chance for public exposure...<br>I need to get into the site as admin and upload a script in the web-root directory, that will present all required evidence for the University's latest 're-marking' practices!<br>Can you get the admin level access for me...<br>Good Luck!<br><br>";
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '10': //html+directory
				$data['text'] = "<b>Level 10</b><br><br>Our agents (hackers) informed us that there reasonable suspicion that  the site of this <a href=".base_url('')."level_9/ style='color:red;' target='_blank'>Logistics Company</a> is a blind for a human organs'  smuggling organisation.<br> This organisation attracts its victims through advertisments for jobs  with very high salaries. They choose those ones who do not have many  relatives, they assasinate them and then sell their organs to very rich  clients, at very high prices.<br> These employees are registered in the secret files of the company as 'special clients'!<br> One of our agents has been hired as by the particular company. Unfortunately, since 01/01/2017 he has gone missing.<br> We know that our agent is alive, but we cannot contact him. Last time he  communicated with us, he mentioned that we could contact him at the  e-mail address the company has supplied him with, should there a problem  arise.<br> The problem is that when we last talked to him, he had not a company  e-mail address yet, but he told us that his e-mail can be found through  the company's site.<br> The only thing we remember is that he was hired on Friday the 13th!<br> You have to find his e-mail address and send it to us by using the input filed given below.<br> Good luck!!!<br><br>";
				$data['level'] = $this->session->userdata('level')+1;
				$this->load->view('levels', $data);
				break;

			case '11': //encrytion : sum of numbers == ascii
				$data['text'] = "<b>Level 11</b><br><br>Hello esteemed hacker, I hope you have some decent cryptography skills. I have some text I need decrypted.<br>I have done some information gathering on my network and I have recovered some data. However, it is encrypted and I cannot seem to decode it using any of my basic decryption tools. I have narrowed it down to the algorithm used to encrypt it, but it is beyond my scope.<br>Enter text to encrypt it.<br>";
				$data['level'] = $this->session->userdata('level')+1;
				$data['encrypted'] = '';
				$this->load->view('levels', $data);
				break;

			case '12'://robots.txt
				$data['text'] = '<b>Level 12</b><br><br><br><IMG SRC='.base_url('images/robot.jpg').'><br><br><br>';
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
				break;

			default:
				# code...
				break;

		}
	}

	public function loginInput(){
		if ($this->input->post('submit')){
			$this->load->helper('url');
			$this->load->model('status');
			$this->load->library('form_validation');
            $this->form_validation->set_rules('Contestant-Id', 'Contestant-Id', 'trim|required|min_length[6]|max_length[6]');
			if ($this->form_validation->run() == FALSE){
				$invalid['message'] = '';
                $this->load->view('login', $invalid);
            }
            else{
				$id = $this->input->post('Contestant-Id');
				$stats = $this->status->getId($id);
				if($stats){
					$this->session->set_userdata($stats[0]);
					set_cookie($cookie);
					redirect('welcome/level');
				}
				else{
					echo 'not exist';
					$invalid['message'] = 'Enter a valid Contestant-Id';
					$this->load->view('login', $invalid);
				}
				echo '<br>';
            }
		}
	}

	public function levelInput(){
		$level = $this->session->userdata('level')+1;
		if($this->input->post('submit') || $level==3 || $level==6 || $level==9){
			$id = $this->session->userdata('id');
			$flag = $this->input->post('flag');
			switch ($level) {
				case '1':
					if($flag == 'takemetonextlevel'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = '<b>Level 1</b><br><br> I would change the world if GOD provided me the Source code of it !<br><br> <p style="color:yellow;">Errrhh! Try Again!</p>';
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;
				
				case '2':
					if($flag==''){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');	
					}
					else{
						$data['text'] = '<b>Level 2</b><br><br>Our new blooming Network Security Ananlyst Sam set up a password protection script. He made it load the real password from an unencrypted text file and compare it to the password the user enters. However, he <span style="color:yellow;">forgot</span> to upload the password file... !<br>Can you guess the string to get past this login form<br><br> <p style="color:yellow;">Errrhh! Try Again!</p>';
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;

				case '3':
					$c = get_cookie('suspect');
					if(get_cookie('suspect')=='1'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = '<b>Level 3</b><br><br><br><IMG SRC='.base_url('images/cookie_love.gif').'><br><br><br>';
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;

				case '4':
					if($flag == 'MORSE'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = '<b>Level 4</b><br><br><br><IMG SRC='.base_url('images/level_4.png').'><br><br><br><p style="color:yellow;">Errrhh! Try Again!</p>';
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;

				case '5':
					if($flag=='chronicle'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = '<b><b>Level 5</b><br><br><br>Our blooming Network Security Analyst Sam has encrypted his password. The encryption system is publically available and can be accessed with this form:<br>Please enter a string to have it encrypted.<br><p style="color:yellow;">Errrhh! Try Again!</p>';
						$data['level'] = $this->session->userdata('level')+1;
						$data['encrypted'] = '';
						$this->load->view('levels', $data);
					}
					break;

				case '6':
					$agent = $this->agent->agent_string();
					if($agent=='p0wnBrowser'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$this->load->view('pawn');
					}
					break;

				case '7':
					if($flag == 'thisaintacolor'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = "<b>Level 7</b><br><br> I changed the world. Now i want to go Deeper and Style up hell too!! Don't worry GOD's with us ;)<p style='color:yellow;'>Errrhh! Try Again!</p>";
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;

				case '8':
					if($flag == 'this is a random string'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = "<b>Level 8</b><br><br>Missing my Nokia 1100<br><br><b style='font-family: sans-serif;'>84470470207263660787464</b><br><br><p style='color:yellow;'>Errrhh! Try Again!</p>";
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;

				case '9':
					if($this->input->post('submit')){
						$sId=$this->input->post('sId');
						if($sId=='Kat'){
							$cookie = array('name'   => 'userLevel',
								    'value'  => 'user',
								    'expire' => 0,
								    'secure' => FALSE
								);
							set_cookie($cookie);
							$c=get_cookie('userLevel');
							if($c=='admin'){
								$this->status->setStatus($id,$level);
								redirect('welcome/update');
							}
							else
								$this->load->view('acmeMarks');
						}
						else
							$this->load->view('acme');
					}
					else
						$this->load->view('acme');
					break;

				case '10':
					if($flag == 'Friday13@JasonLives.com'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = "<b>Level 10</b><br><br>Our agents (hackers) informed us that there reasonable suspicion that  the site of this <a href=".base_url('')."level_9/ style='color:red;' target='_blank'>Logistics Company</a> is a blind for a human organs'  smuggling organisation.<br> This organisation attracts its victims through advertisments for jobs  with very high salaries. They choose those ones who do not have many  relatives, they assasinate them and then sell their organs to very rich  clients, at very high prices.<br> These employees are registered in the secret files of the company as 'special clients'!<br> One of our agents has been hired as by the particular company. Unfortunately, since 01/01/2017 he has gone missing.<br> We know that our agent is alive, but we cannot contact him. Last time he  communicated with us, he mentioned that we could contact him at the  e-mail address the company has supplied him with, should there a problem  arise.<br> The problem is that when we last talked to him, he had not a company  e-mail address yet, but he told us that his e-mail can be found through  the company's site.<br> The only thing we remember is that he was hired on Friday the 13th!<br> You have to find his e-mail address and send it to us by using the input filed given below.<br> Good luck!!!<br><br><p style='color:yellow;'>Errrhh! Try Again!</p>";
						$data['level'] = $this->session->userdata('level')+1;
						$this->load->view('levels', $data);
					}
					break;

				case '11':
					if($flag=='asciimaaki'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = '<b>Level 11</b><br><br>Hello esteemed hacker, I hope you have some decent cryptography skills. I have some text I need decrypted.<br>I have done some information gathering on my network and I have recovered some data. However, it is encrypted and I cannot seem to decode it using any of my basic decryption tools. I have narrowed it down to the algorithm used to encrypt it, but it is beyond my scope.<br>Enter text to encrypt it.<br><p style="color:yellow;">Errrhh! Try Again!</p>';
						$data['level'] = $this->session->userdata('level')+1;
						$data['encrypted'] = '';
						$this->load->view('levels', $data);
					}
					break;

				case '12':
					if($flag=='robotsarethefuture'){
						$this->status->setStatus($id,$level);
						redirect('welcome/update');
					}
					else{
						$data['text'] = '<b>Level 12</b><br><br><br><IMG SRC='.base_url('images/robot.jpg').'><br><br><br><p style="color:yellow;">Errrhh! Try Again!</p>';
						$data['level'] = $this->session->userdata('level')+1;
						$data['encrypted'] = '';
						$this->load->view('levels', $data);
					}
					break;

				default:
					# code...
					break;
			}
		}
	}
}