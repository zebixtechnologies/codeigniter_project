 <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/custome_form/css/Dyanmic_forms.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/custome_form/css/custom-mobile-theme.css">

<? foreach($formInfo as $info){?>
	<a href="<?=base_url().'home/formview/'.$info->adId?>"><img src="<?=base_url().$info->bannerImage?>" alt="<?=$info->adTitle?>" title="<?=$info->adName?>"></a><br/><hr/>
<?}?>