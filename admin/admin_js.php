<script type="text/javascript">
	function get_page(place){
		var into_div = _('into_div');
		into_div.innerHTML = "<span class='spinner-border wepink m-2'></span>";
		// into_div.innerHTML = '<i class="fa fa-spin fa-spinner fa-4x"></i>';
		 var xhttp;
		 xhttp = new XMLHttpRequest();
		 xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			  	into_div.innerHTML = this.responseText;
			  }
		 };
		 xhttp.open("GET","admin_req/xml"+place+".php", true);
	 	xhttp.send();
	}
	function register_student(){
		var infofdok = _('infofdok');
		var adm_no = _('adm_no').value;
		var stuuname = _('stuuname').value;
		var stupsw = _('stupsw').value;
		var classi = _('classi').value;
		var classa = _('classa').value;
		var ready_stud = 0;
		var form101 = _('form101');
		if(adm_no == "" || stuuname == "" || stupsw == "" || classi == "" || classa == ""){
			infofdok.innerHTML = '<div class="alert alert-danger">All Fields are required</div>';
		}else{
			ready_stud = 1;
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					form101.innerHTML = "";
					infofdok.innerHTML = this.responseText;
				}
			};
			xhttp.open("GET","admin_scripts/add-students.php?adm_no="+adm_no+"&&stuuname="+stuuname+"&&stupsw="+stupsw+"&&classa="+classa+"&&classi="+classi,true);
			xhttp.send();
		}
	}
	function edit_acount(){
		var fsdo9fkso = _('fsdo9fkso');
		var form102 = _('form102');
		var aemail = _('aemail').value;
		var apsw = _('apsw').value;
		var save_red = 0;
		if(aemail == "" || apsw == ""){
			fsdo9fkso.innerHTML = '<div class="alert alert-danger">All Fields are required</div>';
		}else{
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					form102.innerHTML = "";
					fsdo9fkso.innerHTML = this.responseText;
				}
			};
			xhttp.open("GET","admin_scripts/edit-account.php?aemail="+aemail+"&&apsw="+apsw,true);
			xhttp.send();

		}
	}
	function attend_to_record(id){
		var record_table = _(id+"table");
		var record_details = _(id+"details");
		record_details.innerHTML = '<i class="fa fa-spin fa-spinner"></i>';
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					record_details.innerHTML = this.responseText;
				}
			};
			xhttp.open("GET","admin_scripts/attend_to_request.php?record_id="+id,true);
			xhttp.send();


	}
	function unattend_to_record(id){
		var record_table = _(id+"table");
		var record_details = _(id+"details");
		record_details.innerHTML = '<i class="fa fa-spin fa-spinner"></i>';
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					record_details.innerHTML = this.responseText;
				}
			};
			xhttp.open("GET","admin_scripts/unattend_to_request.php?record_id="+id,true);
			xhttp.send();


	}
	function add_money(){
		
			var xhttp,an,pay_amount,form103,kfo9sfks;
			kfo9sfks = _('kfo9sfks');
			form103 = _('form103');
			an = _('student').value;
			ok9j9 = _('amount').value;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					form103.innerHTML = "";
					kfo9sfks.innerHTML = this.responseText+"";
				}
			};
			xhttp.open("GET","admin_scripts/sdokf0idsjfu8sd0fu9G8YPH9uJOHP9H9UPlhp9Hnp9hp9HOK.php?amount=new_money&&an="+an+"&&dsf9gi9dsfgu80pi08="+ok9j9,true);
			xhttp.send();


	}
	function get_user_money(an,div){
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					_(div).innerHTML = this.responseText;
				}
			};
			xhttp.open("GET","admin_scripts/get_user_money.php?an="+an,true);
			xhttp.send();
	}
	function item_avail(item_id){
		var available_span = _(item_id+'available_span');
		available_span.innerHTML = '<i class="fa fa-circle q2w3 text-success" onclick="item_not_avail('+item_id+');" title="Available"></i>';
		secret_ajax('admin_req/xmlitem-avail.php?item_id='+item_id);
	}
	function item_not_avail(item_id){
		var available_span = _(item_id+'available_span');
		available_span.innerHTML = '<i class="fa fa-circle q2w3 text-danger" onclick="item_avail('+item_id+');" title="Not Available"></i>';
		secret_ajax('admin_req/xmlitem-not-avail.php?item_id='+item_id);
	}
	function get_infot(uname,uclass){
		swal.fire(uname,uclass);
	}
	/* Get the documentElement (<html>) to display the page in fullscreen */
	 var elem = document.documentElement;

	/* View in fullscreen */
	function openFullscreen() {
	   if (elem.requestFullscreen) {
	    elem.requestFullscreen();
	   } else if (elem.mozRequestFullScreen) { /* Firefox */
	     elem.mozRequestFullScreen();
	  } else if (elem.webkitRequestFullscreen)  { /* Chrome, Safari and Opera */
	    elem.webkitRequestFullscreen();
	  } else if (elem.msRequestFullscreen)  { /* IE/Edge */
	    elem.msRequestFullscreen();
	  }
	}

	/* Close fullscreen */
	function closeFullscreen() {
	   if (document.exitFullscreen) {
	    document.exitFullscreen();
	   } else if (document.mozCancelFullScreen) { /* Firefox */
	     document.mozCancelFullScreen();
	  } else if (document.webkitExitFullscreen)  { /* Chrome, Safari and Opera */
	    document.webkitExitFullscreen();
	   } else if (document.msExitFullscreen) { /* IE/Edge */
	     document.msExitFullscreen();
	  }
	}
	function open_more_options(){
		Swal.fire({
		  html: '',
		  showConfirmButton: false,
		});
	}
</script>