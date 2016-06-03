<h1>Subscribe </h1>
<div class="signUp">

	<form action="index.php" method="post" class="">
		<
		<?php if(isset($_SESSION['errors']['email'])): ?>
			<div class="error">
				<p><?php echo $_SESSION['errors']['email']; ?>
				</p>
			</div>
			<div>
		<?php endif; ?>
			<div>
				<label for="email">Email</label>
				 <input type="email" 
				 		id="email"
				 		name="email"
				 		placeholder="me@company.com" 
				 		value=" <?php echo isset($_SESSION['old_datas']['email']) ? $_SESSION['old_datas']['email'] : ''; ?>">
			 </div>



		<?php if(isset($_SESSION['errors']['name'])): ?>
			<div class="error">
				<p><?php echo $_SESSION['errors']['name']; ?>
				</p>
			</div>
		<?php endif; ?>
			<div>
		    <label for="name">Nom</label>
			    <input type="text" 
			    		id="name" 
			    		name="name" 
			    		placeholder="Jony"  
			    		value=" <?php echo isset($_SESSION['old_datas']['name']) ? $_SESSION['old_datas']['name'] : ''; ?>">
			  </div>





		<?php if (isset($_SESSION['errors']['password'])): ?>
			<div class="error">
				<p><?php echo $_SESSION['errors']['password']; ?>
				</p>
			</div>
		<?php endif; ?>
			 <div>
			    <label for="password">Password</label>
			    <input type="password" id="password" name="password"  value="
				    <?php echo  isset($_SESSION['old_datas']['password']) ?  $_SESSION['old_datas']['password'] : ''; ?>">
		    </div>
		    <div>
		    <button class="button" type="submit">Envoyer</button>
		    </div>
		    <div >
		        <input type="hidden" name="a" value="postRegister">
		        <input type="hidden" name="e" value="auth">
		    </div>
	</form>

	<?php if(isset($_SESSION['errors'])){
			unset($_SESSION['errors']); 
			}?>

	<?php if(isset($_SESSION['old_datas'])){
		unset($_SESSION['old_datas']);
	}?>
</div>