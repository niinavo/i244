<?php
ini_set("display_errors", 1);
$backgroundcolor = "navy";
$textcolor = "lightblue";
$borderlinewidth = 10;
$borderstyle = "double";
$borderlinecolor = "green";
$borderradius = 25;
$text = "Kirjuta tekst";
if (isset($_POST['tekst']) && $_POST['tekst']!="") {
    $text=htmlspecialchars($_POST['tekst']);
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
<title>Kodutöö 8.</title>
<style>
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
		padding: 10px 10px 10px 10px;}
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
</head>
<body>
<p id="vorm"><?php echo $text; ?></p>
<hr>
<form action="kodutoo_8.php" method="POST">
	<textarea name="tekst" rows="5" cols="40" placeholder="Kirjuta siia tekst"></textarea><br>
	<input type="color" name="taustavarv"> Taustavärvus<br>
	<input type="color" name="tekstivarv"> Tekstivärvus
    <hr/>
	<input type="number" name="laius" min="1" max="20"> Piirjoone laius (0-20px)<br>
	<select name="borders">
        <option value="none">none</option>
        <option value="hidden">hidden</option>
        <option value="solid">solid</option>
		<option value="dashed">dashed</option>
        <option value="dotted">dotted</option>
		<option value="double">double</option>
		<option value="groove">groove</option>
		<option value="ridge">ridge</option>
		<option value="inset">inset</option>
		<option value="outset">outset</option>
	</select><br>
	<input type="color" name="piirjoonevarv"> Piirjoone värvus<br>
	<input type="number" name="raadius" min="0" max="100"> Piirjoone nurga raadius (0-100px)
	<hr>
	<input type="submit" value="esita">
</form>

</body>
</html>
