<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-plus-circle"></i>
	Add Item
</div>
<hr>
<div class="wd100 p-2">
	<form method="POST" enctype="multipart/form-data">

		<label for="item_name">Item Name</label>
		<input type="text" placeholder="Item Name" class="mb-2 form-control" id="item_name" name="item_name" required="">

		<label for="item_price">Item Price</label>
		<input type="number" placeholder="Item Price" class="form-control mb-2" id="item_price" name="item_price" required="">

		<label for="fileToUpload">Item Image</label>
		<input type="file" placeholder="Item Image" class="mb-2 wd100 p-2 border br-5" id="fileToUpload" name="fileToUpload" required="">

		<button class="btn btn-primary" type="submit"><i class="fa fa-plus-circle"></i> Add</button>


	</form>
</div>