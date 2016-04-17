<?php 
	require_once("head.html");
	
	if(!empty($_GET)){
		$errors = array();
		if(!empty($_GET["pilt"])) {
			$errors[] = "Aitäh, et te valisite pildi!";
		}
	} else {
		$errors[] = "Palun valige pilt!";
	}
?>
<h3>Valiku tulemus</h3>
<?php if(!empty($errors)):?>
	<?php foreach($errors as $err):?>
		<p style="color:#ff0066"><?php echo $err;?></p>
	<?php endforeach;?>
<?php endif;?>
