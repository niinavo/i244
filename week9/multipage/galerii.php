<?php 
	require_once("head.html");
	$pildid = array (
		array("link" => "pildid/nameless1.jpg", "alt" => "nimetu 1"),
		array("link" => "pildid/nameless2.jpg", "alt" => "nimetu 2"),
		array("link" => "pildid/nameless3.jpg", "alt" => "nimetu 3"),
		array("link" => "pildid/nameless4.jpg", "alt" => "nimetu 4"),
		array("link" => "pildid/nameless5.jpg", "alt" => "nimetu 5"),
		array("link" => "pildid/nameless6.jpg", "alt" => "nimetu 6")
	);
?>
<h3>Fotod</h3>
<div id="gallery">
	<?php foreach($pildid as $key => $pilt_): ?>
		<img src="<?php echo $pilt_['link']; ?>" alt="<?php echo $pilt_['alt']; ?>"/>
	<?php endforeach; ?>
</div>
<?php
	require_once("foot.html");
?>