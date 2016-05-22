<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	global $connection;
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		//echo "isset".isset($_POST['user']);
		//echo "empty".isset($_POST['user']);
		if (isset($_POST['user']) && isset($_POST['pass'])) {
			if ($_POST['user'] == "" || $_POST['pass'] == "") {
				$errors[] = "Kasutajanimi või parool on jäänud sisestamata";
			} else {
				$username = mysqli_real_escape_string($connection,htmlspecialchars($_POST['user']));
				$pass = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']));
				$query = "SELECT id, roll FROM 10153400_kylastajad 
				WHERE username = '".$username."' AND passw = SHA1('".$pass."')";
				$result = mysqli_query($connection, $query) or die("Kylastajate päringut ei saanud teha!");
				if (mysqli_num_rows($result)>0) {
					$row =mysqli_fetch_assoc($result);
					$id = $row['id'];
					$role = $row['roll'];
					$_SESSION['user'] = $id;
					$_SESSION['username'] = $username;
					$_SESSION['role'] = $role;
					header("Location: loomaaed.php?page=loomad");
				} else {
					$errors[] = "Sisestatud kasutajanimi või parool on vale";
				}
			}
		}			
	}
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	if (!isset($_SESSION['user'])) {
		header("Location: loomaaed.php?page=login");
	}
	global $connection;
	$puurid = array();
	$result = mysqli_query($connection, "SELECT DISTINCT(puur) 
	FROM 10153400_loomaaed order by puur asc") or die("Ei saanud puuride päringut teha");
	foreach ($result as $value) {
		$loomad = mysqli_query($connection, 
		"SELECT id,nimi, liik FROM 10153400_loomaaed 
		WHERE puur = ".$value['puur']) or die("Ei saanud loomade päringut teha");
		foreach ($loomad as $loom) {
			$puurid[$value['puur']][] = $loom;
		}
	}
	include_once('views/puurid.html');
}

function lisa(){
	global $connection;
	//print_r($_SESSION);
	if (!isset($_SESSION['user'])) {
		header("Location: loomaaed.php?page=login");
	}
	if ($_SESSION['role'] != 'admin') {
		header("Location: loomaaed.php?page=loomad");
	}
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$val = 1;
		if (!isset($_POST['nimi'])) {$errors[] = "Nimi on jäänud sisestamata"; $val = 0;}
		if (!isset($_POST['puur'])) {$errors[] = "Puuri number on jäänud sisestamata"; $val = 0;}
		$liik = upload("liik");
		if ($liik == "") {$errors[] = "Liik tühi"; $val = 0;}
		if ($val == 1) {
			$stmt = $connection->prepare("INSERT INTO 10153400_loomaaed (nimi,puur,liik) VALUES (?,?,?)");
			$nimi = mysqli_real_escape_string($connection,htmlspecialchars($_POST["nimi"]));
			$puur = mysqli_real_escape_string($connection,htmlspecialchars($_POST["puur"]));
			$liik = preg_replace("/(pildid\/)|(\.png)/", '', $liik);
			$stmt->bind_param("sis", $nimi,$puur,$liik); //s-string, i-integer
			$stmt->execute() or die ("fail");
		}
	}
	include_once('views/loomavorm.html');
}
function muuda(){
	global $connection;
	#print_r($_SESSION);
	if (!isset($_SESSION['user'])) {
		header("Location: loomaaed.php?page=login");
	}
	if ($_SESSION['role'] != 'admin') {
		header("Location: loomaaed.php?page=loomad");
	}
	//kui tuleb postiga muuda vormist
	if (isset($_POST['id'])) {
		$val = 1;
		if (!isset($_POST['nimi'])) {$errors[] = "Nimi on jäänud sisestamata"; $val = 0;}
		if (!isset($_POST['puur'])) {$errors[] = "Puuri number on jäänud sisestamata"; $val = 0;}
		$liik = upload("liik");
		if ($val == 1) {
			$id = $_POST['id'];
			$loom = hangi_loom(mysqli_real_escape_string($connection,htmlspecialchars($id)));
			#print_r($loom);
			$nimi = mysqli_real_escape_string($connection,htmlspecialchars($_POST["nimi"]));
			$puur = mysqli_real_escape_string($connection,htmlspecialchars($_POST["puur"]));
			if ($liik != "") {
				$liik = preg_replace("/(pildid\/)|(\.png)/", '', $liik);
			} else {
				$liik = $loom['liik'];
			}
			$stmt = $connection->prepare("UPDATE 10153400_loomaaed SET nimi=?, puur=?, liik=? WHERE id=?");
			$stmt->bind_param("sisi", $nimi,$puur,$liik,$id); //s-string, i-integer
			$stmt->execute() or die ("fail");
			header("Location: loomaaed.php?page=loomad");
		}
	} 
	//kui tuleb get-iga loomade lehelt
	if (isset($_GET['id'])) {$id = $_GET['id'];}
	$loom = hangi_loom(mysqli_real_escape_string($connection,htmlspecialchars($id)));
	include_once('views/editvorm.html');
}

function hangi_loom($id) {
	global $connection;
	$result = mysqli_query($connection, 
	"SELECT * FROM 10153400_loomaaed WHERE id={$id}") or die("Looma päringut ei saanud teha");
	if (mysqli_num_rows($result) >= 1) {
		$loom =mysqli_fetch_assoc($result);
		return $loom;
	} else {
		header("Location: loomaaed.php?page=loomad");
	}
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$parts = explode(".", $_FILES[$name]["name"]);
	$extension = end($parts);
	//echo $extension;
	//print_r($_FILES);
	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
		// fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>