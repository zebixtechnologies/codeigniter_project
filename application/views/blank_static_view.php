<script type="text/javascript">
  $(document).ready(function(){
     $('body').removeClass('homeindex');
  });
</script>


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

