<?php
include_once '../../sys/inc/start.php';
include_once '../../sys/inc/compress.php';
include_once '../../sys/inc/sess.php';
include_once '../../sys/inc/home.php';
include_once '../../sys/inc/settings.php';
include_once '../../sys/inc/db_connect.php';
include_once '../../sys/inc/ipua.php';
include_once '../../sys/inc/fnc.php';
include_once '../../sys/inc/user.php';

if (isset($_GET['id']) && $db->query("SELECT COUNT(*) FROM `liders` WHERE `id_user` = '".intval($_GET['id'])."'")->el())
{
	if (isset($user) && $user['level'] > 2)
	{
		$db->query("DELETE FROM `liders` WHERE `id_user` = '" . intval($_GET['id']) . "'");
		// TODO: что за йухня? Какой тудила iso 8859 вкорячил?
		$_SESSION['message'] = 'Ïîëüçîâàòåëü óäàëåí èç ñïèñêà ëèäåðîâ';  
	}
}
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!=NULL)
header("Location: " . $_SERVER['HTTP_REFERER']);
else
header("Location: index.php?".SID);
exit;
?>