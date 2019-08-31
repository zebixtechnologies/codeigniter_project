 <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/custome_form/css/Dyanmic_forms.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/custome_form/css/custom-mobile-theme.css">

<? foreach($formInfo as $info){?>
	<div class="container dotted-back">
		<div class="row clearfix">
			<div class="formContent">
	<form method="post" action="<?=base_url().'home/thanks'?>" id="user_form_view">
	<input type="hidden" name="pub" value="<?=$pub?>" />
	<input type="hidden" name="StatusID" value="<?=$StatusID?>" />
	<input type="hidden" name="cteationTime" value="<?=$cteationTime?>" />
	<input type="hidden" name="advID" value="<?=$advID?>" />
	<input type="hidden" name="adId" value="<?=$adId?>" />
	<input type="hidden" name="formId" value="<?=$info->formId?>" />
	
				<div class="jqm">
				<div class="formLogo">
					<?if($info->adverFromIcon !=''){?>
						<img src="<?=base_url().$info->adverFromIcon;?>">
						<?}?>				
				</div>
					<?=htmlspecialchars_decode($info->formData);?>
				</div>
			</div>
		</div>
	</div>
	</form>
<?}?>

<script>
	$(document).ready(function(){
		$('#user_form_view').validate();
	})
</script>