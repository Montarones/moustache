
<?php


require('date.php');

$date= new Date();
$year = date('Y');
$dates= $date->getAll($year);

?>

<div class="periods">
<div class="year"> <?php echo $year; ?> </div>
<div class="months">
<ul> <?php foreach($date->months as $m)
{
	?> <li><?php echo substr($m,0,3) ?> </li> <?php
} ?>
</ul>
</div>


 <pre> 
 <?php print_r($dates); ?> 
 </pre>











<body onload="timedRefresh(2000);">
<script type="text/javaScript">
    function timedRefresh(timeoutPeriod) {
	 setTimeout("window.location.reload(true);",timeoutPeriod);
    }
</script>


