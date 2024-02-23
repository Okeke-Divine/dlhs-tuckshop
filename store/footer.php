<br>
	<footer class="bg-dark mt-2 p-2 text-light">
		<marquee> <b>DLHS <?php echo $campus_name; ?></b> | <b>MOTTO</b>: leadership with distinction...</marquee>
	</footer>


<div class="tell_the_time" id="timers0">
		<?php echo date("h:ia"); ?>
</div>


<script type="text/javascript">
	get_timers0();
	function get_timers0(){
			var xhttp;
		  	xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	_('timers0').innerHTML = this.responseText;
					setTimeout(get_timers0,6000);
			    }
			  };
			xhttp.open("GET","time.php", true);
			xhttp.send();
	}
</script>