<?php

session_start();
$pildid = array(
		1=>array('src'=>"pildid/nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('src'=>"pildid/nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('src'=>"pildid/nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('src'=>"pildid/nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('src'=>"pildid/nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('src'=>"pildid/nameless6.jpg", 'alt'=>"nimetu 6"),
	);
require_once("vaated/head.html");
$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}


switch($page){
	case "galerii":
		include("vaated/galerii.html");
	break;
	case "vote":
        if(!empty($_SESSION["voted_for"])){
            header("Location: http://enos.itcollege.ee/~nvoropaj/i244/week10/kontrolleriga/kontroller.php?page=tulemus");
            exit(0);
        }
        else {
		include("vaated/vote.html");
        }
	break;
	case "tulemus":
		$id=false;
		if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']]))
			$id=htmlspecialchars($_POST['pilt']);
		include("vaated/tulemus.html");
	break;
    case "logout":
        $_SESSION=array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-3600,'/');
        }
        session_destroy();
        header("Location: http://enos.itcollege.ee/~nvoropaj/i244/week10/kontrolleriga/kontroller.php?page=pealeht");
	default:
	 include('vaated/pealeht.html');
    break;
}


require_once("vaated/foot.html");
?>
