 <? /* <div id="nav_current_back" class="clearfix">
	<div class="navsubheader row">
		<nav id="nav_current" class="products twelvecol last">
					<a class="ourcompany" href="<?=base_url().'home/ourcompany'?>"><span class="arrow"></span>Our Company</a>
                    <a class="howorks" href="<?=base_url().'home/verticalworks'?>">How KeyVerticals Works</a>
                    <a class="oureporting" href="<?=base_url().'home/oureporting'?>">Our Reporting Platform</a>
                    <a class="datareporting"  href="<?=base_url().'home/datareporting'?>">Data Reporting</a>
                    <a class="focused" href="<?=base_url().'home/highfocused'?>">Highly Focused Source</a>
				</nav>
	</div>
</div>
      */ ?>
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

<script>
	$(document).ready(function(){
		$('.resources').addClass('active');
		
	})
</script>