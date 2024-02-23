<?php
include("auth.php");
?>
<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-money-bill"></i>
	Add Money
</div>
<hr>
<div class="wd100 p-2">
	
	<div id="kfo9sfks"></div>

<div id="form103">
	<div id="user_amount"></div>
	<label for="student">Select Student</label>
	<select class="mb-2 custom-select" onchange="get_user_money(this.value,'user_amount');" id="student">
		<option value="">Select Student</option>
		<?php

			$get_student = mysqli_query($conn,"SELECT * FROM $student ORDER BY username");
			while($row1 = mysqli_fetch_array($get_student)){
				$uid = $row1['id'];
				$uuname = $row1['username'];
				$uan = $row1['admission_number'];
				?>
				<option value="<?php echo $uan; ?>"><?php echo $uuname; ?></option>
				<?php
			}

		?>
	</select>
	<label for="amount">Add Amount (&#8358;)</label>
	<input type="number" id="amount" value="0" class="mb-2 form-control" placeholder="Add Amount" name="">

	<span class="right mt-4 mb-4">
		<button class="btn btn-primary" onclick="add_money()"><i class="fa fa-plus-circle"></i> Add Money</button>
	</span>
</div>


</div>