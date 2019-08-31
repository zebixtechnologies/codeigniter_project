<?php
// this variable should appear if we've refreshed ourselves
$refresh_times = isset($_GET['bounce'])?$_GET['bounce']:'';
 $bounce_location='';
$redirectURL = 'http://www.keyverticals.com/products/breastact.html';
 
// If we've already been refreshed, then go (i.e. $refresh_times = 1)
if ( is_numeric($refresh_times) )
{
 // Is the referer cleared?
 if (!isset($_SERVER['HTTP_REFERER']))
 {
    $bounce_location=$redirectURL;
 }
}
else
{
   // echo "<meta http-equiv=\"refresh\" content=\"0;url=http://www.keyverticals.com/products/breastact.html\">";    
    echo '<script type="text/javascript">location.href="http://www.keyverticals.com/products/breastact.html";</script>';
}
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8703398-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>