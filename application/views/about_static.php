<script type="text/javascript">
  $(document).ready(function(){
     $('body').removeClass('homeindex');
  });
</script>
 <div id="nav_current_back" class="clearfix">
	
</div>
       

<div class="container dotted-back">
	 <!-- content--> 
		<div class="container dotted-back">
			<div class="row clearfix">
				<h1 class="pagehead"><?=$page_name;?></h1>
               <?=str_replace('{base_url}',base_url(),$page);?>
		</div>
	  </div>        
        <!-- content--> 
</div>

<script>
	$(document).ready(function(){
		$('.aboutus').addClass('active');
		$('<?=$activeStatus?>').addClass('active');
	})
</script>