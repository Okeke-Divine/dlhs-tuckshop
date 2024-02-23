<?php
include("auth.php")
?>
<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-edit"></i>
	Edit Account	
</div>
<hr>
<div class="wd100 p-2">

<div id="fsdo9fkso"></div>

	<div id="form102">

		<label for="aemail">Admin Email</label>
		<input type="email" name="aemail" id="aemail" placeholder="Admin Email" class="form-control mb-2" value="<?php echo $email; ?>">

		<label for="apsw">Admin Password</label>
		<input type="text" name="apsw" id="apsw" placeholder="Admin Password" class="form-control mb-2" value="<?php echo $admin_password; ?>">

		<span class="right mt-4 mb-4">
			<button class="btn btn-primary" onclick="edit_acount()"><i class="fa fa-save"></i> Save</button>
		</span>

	</div>

</div>