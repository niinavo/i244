<?php
ini_set("display_errors", 1);
$backgroundcolor = "navy";
$textcolor = "lightblue";
$borderlinewidth = 10;
$borderstyle = "double";
$borderlinecolor = "green";
$borderradius = 25;
$kommentaar = "Kirjuta tekst";
if (isset($_POST['tekst']) && $_POST['tekst']!="") {
    $kommentaar=htmlspecialchars($_POST['tekst']);
}
if (isset($_POST['taustavarv']) && $_POST['taustavarv']!="") {
    $backgroundcolor=htmlspecialchars($_POST['taustavarv']);
}
if (isset($_POST['tekstivarv']) && $_POST['tekstivarv']!="") {
    $textcolor=htmlspecialchars($_POST['tekstivarv']);
}
if (isset($_POST['laius']) && $_POST['laius']!="") {
    $borderlinewidth=htmlspecialchars($_POST['laius']);
}
if (isset($_POST['borders']) && $_POST['borders']!="") {
    $borderstyle=htmlspecialchars($_POST['borders']);
}
if (isset($_POST['joonevarv']) && $_POST['joonevarv']!="") {
    $borderlinecolor=htmlspecialchars($_POST['joonevarv']);
}
if (isset($_POST['raadius']) && $_POST['raadius']!="") {
    $borderradius=htmlspecialchars($_POST['raadius']);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Kodutoo 10.</title>
</head>
<body>
<p id="vorm"><?php echo $kommentaar; ?></p>
<hr>
<form action="kodutoo_10_tekst.php" method="POST">
    <textarea name="tekst" rows="5" cols="40" placeholder="Kirjuta tekst"><?php if(!empty($_POST["tekst"])) echo htmlspecialchars($_POST["tekst"]); ?></textarea></br>
	<input type="color" name="taustavarv" <?php if(!empty($_POST["taustavarv"])) echo "value=\"".htmlspecialchars($_POST["taustavarv"])."\" "; ?> > Taustavarvus</br>
	<input type="color" name="tekstivarv"  <?php if(!empty($_POST["tekstivarv"])) echo "value=\"".htmlspecialchars($_POST["tekstivarv"])."\" "; ?>> Tekstivarvus<hr/>
	<input type="number" name="laius" min="1" max="20"  <?php if(!empty($_POST["laius"])) echo "value=\"".htmlspecialchars($_POST["laius"])."\" "; ?>> Piirjoone laius (0-20px)</br>
	<select name="borders">
        <option value="solid" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "solid") echo "selected"; ?>>solid</option>
		<option value="dashed" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "dashed") echo "selected"; ?>>dashed</option>
        <option value="dotted" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "dotted") echo "selected"; ?>>dotted</option>
		<option value="double" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "double") echo "selected"; ?>>double</option>
		<option value="groove" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "groove") echo "selected"; ?>>groove</option>
		<option value="ridge" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "ridge") echo "selected"; ?>>ridge</option>
		<option value="inset" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "inset") echo "selected"; ?>>inset</option>
		<option value="outset" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "outset") echo "selected"; ?>>outset</option>
        <option value="none" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "none") echo "selected"; ?>>none</option>
        <option value="hidden" <?php if(!empty($_POST["borders"]) &&$_POST["borders"] == "hidden") echo "selected"; ?>>hidden</option>
	</select></br>
	<input type="color" name="joonevarv"  <?php if(!empty($_POST["joonevarv"])) echo "value=\"".htmlspecialchars($_POST["joonevarv"])."\" "; ?>> Piirjoone varvus</br>
	<input type="number" name="raadius" min="0" max="100"  <?php if(!empty($_POST["raadius"])) echo "value=\"".htmlspecialchars($_POST["raadius"])."\" "; ?>> Piirjoone nurga raadius (0-100px)
	<hr>
	<input type="submit" value="esita">
</form>
<style type="text/css">
     body{
        font-size: 20px;}
    #vorm {
        background: <?php echo $backgroundcolor; ?>;
		color: <?php echo $textcolor; ?>;
		border-width: <?php echo $borderlinewidth; ?>px;
		border-style: <?php echo $borderstyle; ?>;
		border-color: <?php echo $borderlinecolor; ?>;
		border-radius: <?php echo $borderradius; ?>px;
        min-height: 100px;
		width: 400px;
		text-align: justify;
		padding: 10px 0px 0px 10px;}
    hr {
		width: 450px;
		margin-left: 0px;}
    input[type=number]{
		border-radius: 5px;
        font-size: 14px;}
    select {
		border-radius: 5px;
        padding: 2px 2px 2px 2px;
        font-size: 14px;}
    input[type=submit]{
		border-radius: 5px;
        font-size: 16px;}
</style>
</body>
</html>