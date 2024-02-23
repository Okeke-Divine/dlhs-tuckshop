<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-plus-circle"></i>
	Add Student
</div>
<hr>
<div class="p-2 wd100">

	<div id="infofdok"></div>

<div id="form101">
	<label for="adm_no" class="mt-2">Admission Number</label>
	<input type="text" name="adm_no" placeholder="Admission Number..." class="form-control" id="adm_no">

	<label for="stuuname" class="mt-2">Student Fullname</label>
	<input type="text" name="stuuname" placeholder="Student Fullname..." class="form-control" id="stuuname">

	<label for="stupsw" class="mt-2">Student Password</label>
	<input type="text" name="stupsw" placeholder="Student Password" class="form-control" id="stupsw" value="12345678">

	<label for="classi" class="mt-2">Class</label>
	<select name="classi" class="custom-select mt-1" id="classi">
		<option value="">Select Class</option>
		<option value="JS1">JS1</option>
		<option value="JS2">JS2</option>
		<option value="JS3">JS3</option>
		<option value="SS1">SS1</option>
		<option value="SS2">SS2</option>
		<option value="SS3">SS3</option>
	</select>

	<label for="classa" class="mt-2">Arm</label>
	<select name="classa" class="custom-select mt-1" id="classa">
		<option value="">Select Class Arm</option>
		<option value="Diamond">Diamond</option>
		<option value="Gold">Gold</option>
		<option value="Emerald">Emerald</option>
		<option value="Jasper">Jasper</option>
	</select>

	<span class="right mt-4 mb-4">
		<button class="btn btn-primary" onclick="register_student()"><i class="fa fa-plus-circle"></i> Register Student</button>
	</span>
</div>

</div>