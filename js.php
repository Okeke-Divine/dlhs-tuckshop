<script type="text/javascript">
	function goto(dir){
		return window.location = dir;
	}
	function _(el){
		return document.getElementById(el);
	}
	function sidebar(command){
		var sidebar_me = _('sidebar_me');
		sidebar_me.style.transition = "0.5s";
		if(command == "open"){
			sidebar_me.style.left = "0px";
		}else{
			sidebar_me.style.left = "-1000px";
		}
	}
	function searchmyFunction(event) {
		var searchmyInput = _('searchmyInput').value;
		var kc = event.code;
  		if(kc == "Enter"){
  			goto('store?search='+searchmyInput);
    	}
	}
	function add_to_cart(item_name,item_id){
		var add_to_cart = _('add_to_cart');
		var quantity = _('quantity');
		if(quantity.value == ""){
			alert('Add a valid quantity!');
		}else{
			add_to_cart.innerHTML = "<i class='fa fa-spin fa-spinner'></i>";
			add_to_cart.disabled = "disabled";
			add_to_cart.style.cursor = "not-allowed";

			  var xhttp;
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
				add_to_cart.innerHTML = "<i class='fa  fa-shopping-cart'></i> Added to cart";
	         	 swal.fire('Success','<b>'+item_name+'</b> has been successfully added to cart.','success');
			    }
			  };
			  xhttp.open("GET","xml.z-add_to_cart_dfdfsg.php?item_id="+item_id+"&&quantity="+quantity.value, true);
			  xhttp.send();

			
		}
		
	}
	function remove_from_cart(item_id,item_name,sub_total,cart_id){
			var item_main_id = _(cart_id+'div');
			var item_btn_id = _(item_id+'btn');
			var cart_total = _('cart_total');
			let new_cart_total = cart_total.innerHTML-sub_total;
			cart_total.innerHTML = new_cart_total;
			item_btn_id.innerHTML = "<i class='fa fa-spin fa-spinner'></i>";
			 var xhttp;
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
					item_main_id.style.display = "none";
	         	 	swal.fire('Success','<b>'+item_name+'</b> has been successfully removed from cart.','success');
			    }
			  };
			  xhttp.open("GET","xml.z-remove_from_cart_dfdfsg.php?cart_id="+cart_id, true);
			  xhttp.send();
	}
	function pay_for_goods(){
		var pay_btn = _('pay_btn');
		pay_btn.disabled = "disabled";
		pay_btn.style.cursor = "not-allowed";
		  	xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
					pay_btn.innerHTML = '<i class="fa fa-money-check"></i> Paid';
	         	 	swal.fire('Success',this.responseText,'success');
			    }
			  };
			  xhttp.open("GET","xml.z-pay_for_goods_dfdfsg.php", true);
			  xhttp.send();
	
	}
	function secret_ajax(page){
		var xhttp;
		
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
         	 
		    }
		  };
		  xhttp.open("GET",page, true);
		  xhttp.send();
	}
</script>