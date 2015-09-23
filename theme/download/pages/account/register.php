<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2><?=lang('register.title');?></h2>
		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			 <?php
			 if(!isset($_POST['checkbox']))
				 $_POST['checkbox'] = false;
			 if(!isset($_POST['newsletter']))
				 $_POST['newsletter'] = false;
			 if(!isset($msg))
				 $msg = '';
			 if(!isset($l_msg))
				 $l_msg = '';


			 if(isset($_POST['register'])){
				 // Get all form data
				 $data = (object) array(
					 'first_name' => $_POST['first_name'],
					 'insertion' => $_POST['insertion'],
					 'last_name' => $_POST['last_name'],
					 'date' => $_POST['date'],
					 'email' => $_POST['email'],
					 'gender' => $_POST['gender'],
					 'password' => $_POST['password'],
					 'password_r' => $_POST['password_r'],
					 'checkbox' => $_POST['checkbox'],
					 'newsletter' => $_POST['newsletter']
				 );
				 
				 // Check if password 
				 if($data->password != $data->password_r){
					 // Error report
					 $msg = "<span style='color: red;'>".$lang->get('register.messages.passwords')."</span>";
				 } else if(!$_POST['checkbox']){
					 // Error report
					 $msg = "<span style='color: red;'>".$lang->get('register.messages.terms')."</span>";
				 } else {
					 // Check if password same
					 $result = $account->registerUser($data);
					 // Succes message
					 if($result == 0) {
						 $msg = "<span style='color: red;'>".$lang->get('register.messages.exists')."</span>";
					 } else {
						 $msg = "<span style='color: green;'>".$lang->get('register.messages.success')."</span>";
					 }
				 }
			 } else {
				 $_POST['first_name'] = '';
				 $_POST['insertion'] = '';
				 $_POST['last_name'] = '';
				 $_POST['date'] = '';
				 $_POST['email'] = '';
			 }




			 // Echo message
			 echo $msg;
			 ?>
			<form id="registration_form" method="post">
				<div>
					<label>
						<input name="first_name" value="<?=$_POST['first_name'];?>" placeholder="<?=lang('register.first_name');?>" type="text" tabindex="1" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input name="insertion" value="<?=$_POST['insertion'];?>" placeholder="<?=lang('register.insertion');?>" type="text" tabindex="2">
					</label>
				</div>
				<div>
					<label>
						<input name="last_name" value="<?=$_POST['last_name'];?>" placeholder="<?=lang('register.last_name');?>" type="text" tabindex="2" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input name="date" style="color:#999999;" value="<?=$_POST['date'];?>" type="date" tabindex="3" required>
					</label>
				</div>
				<div>
					<label>
						<input name="email" value="<?=$_POST['email'];?>" placeholder="<?=lang('register.email');?>" type="email" tabindex="3" required>
					</label>
				</div>
				<div class="sky-form">
					<div class="sky_form1">
						<ul >
							<li><label class="radio left"><input name="gender" type="radio" value="m" checked=""><i></i><?=lang('register.gender_m');?></label></li>
							<li><label class="radio"><input name="gender" type="radio" value="f"><i></i><?=lang('register.gender_v');?></label></li>
							<li><label class="radio"><input name="gender" type="radio" value="u"><i></i><?=lang('register.gender_un');?></label></li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div>
					<label>
						<input name="password" placeholder="<?=lang('register.password');?>"type="password" tabindex="4" required>
					</label>
				</div>						
				<div>
					<label>
						<input name="password_r" placeholder="<?=lang('register.password_r');?>" type="password" tabindex="4" required>
					</label>
				</div>
				<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="newsletter" checked ><i></i><?=lang('register.newsletter');?>
				</div>
				<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i><?=lang('register.terms', array('name' => $config->dbconfig->title));?>
				</div>
				<div>
					<input type="submit" name="register" value="<?=lang('register.button');?>" id="register-submit">
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2><?=lang('register.login.title');?></h2>
		 <div class="registration_form">
			 <?php
			 if(isset($_POST['login'])){

				 // Result
				 $result = $account->loginUser($_POST['l_email'], $_POST['l_password']);

				 // Result
				 if($result == 0){
					 $l_msg = "<span style='color: red;'>".$lang->get('register.login.messages.error')."</span>";
				 } else if($result == 1){
					 $l_msg = "<span style='color: green;'>".$lang->get('register.login.messages.success')."</span>";
				 }

			 } else {
				 $_POST['l_email'] = '';
				 $_POST['l_password'] = '';
			 }

			 // Echo message
			 echo $l_msg;
			 ?>
		 <!-- Form -->
			<form id="login_form" method="post">
				<div>
					<label>
						<input name="l_email" placeholder="<?=lang('register.login.email');?>" value="<?=$_POST['l_email'];?>"  type="email" tabindex="3" required>
					</label>
				</div>
				<div>
					<label>
						<input name="l_password" placeholder="<?=lang('register.login.password');?>" value="<?=$_POST['l_password'];?>" type="password" tabindex="4" required>
					</label>
				</div>						
				<div>
					<input type="submit" name="login" value="<?=lang('register.login.signin');?>" id="login-submit">
				</div>
				<div class="forget">
					<a href="#"><?=lang('register.login.forgotpass');?></a>
				</div>
			</form>
			<!-- /Form -->
			</div>
	</div>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>