<?php 
	require_once("head.html");
	$valipilt = array (
		array("link" => "pildid/nameless1.jpg", "alt" => "nimetu 1"),
		array("link" => "pildid/nameless2.jpg", "alt" => "nimetu 2"),
		array("link" => "pildid/nameless3.jpg", "alt" => "nimetu 3"),
		array("link" => "pildid/nameless4.jpg", "alt" => "nimetu 4"),
		array("link" => "pildid/nameless5.jpg", "alt" => "nimetu 5"),
		array("link" => "pildid/nameless6.jpg", "alt" => "nimetu 6")
	);
?>
<h3>Vali oma lemmik :)</h3>
<form action="tulemus.php" method="GET">
	<?php foreach($valipilt as $key => $pilt): ?>
	<p>
		<?php $count = $key + 1; ?>
		<label for="<?php echo 'p{$count}'; ?>">
			<img src="<?php echo $pilt['link']; ?>" alt="<?php echo $pilt['alt']; ?>" height="100" />
		</label>
		<input type="radio" value="<?php echo $count; ?>" id="<?php echo 'p{$count}'; ?>" name="pilt"/>
	</p>
	<?php endforeach; ?>
	<br/>
	<input type="submit" value="Valin!"/>
</form>
<?php
	require_once("foot.html");
?>
