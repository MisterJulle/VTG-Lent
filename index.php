<?php
$id = $_GET["id"];
$_GET = array();
require_once 'db/lib.php';
initialize();
switch ($id) {
  case 'forside':
    require_once 'exe/forside.php';
    break;

    case 'ansvar':
    require_once 'exe/ansvar.php';
    break;

    case 'opret_ansvar':
    require_once 'exe/opret_ansvar.php';
    break;

    case 'opret_udstyr':
    require_once 'exe/opret_udstyr.php';
    break;

    case 'profil':
    require_once 'exe/profil.php';
    break;

    default:
    require_once 'exe/login.php';
    break;
  }
  ?>
