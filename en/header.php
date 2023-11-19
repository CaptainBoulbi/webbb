<?php

function project_root_rel(){
  $path=str_replace("/var/www/html/", "", $_SERVER["SCRIPT_FILENAME"]);
  $nb=substr_count($path, "/");
  $rel="";
  for ($i=0; $i<$nb; $i++){
    $rel=$rel."../";
  }
  return $rel;
}

function menuLink($name){
  $path = project_root_rel().'en/'.$name;
  
  foreach (glob($path."/*") as $dir) {
    if ($dir == "") continue;
    if ($dir == $path.'/index.php') continue;

    $pdir = str_replace($path.'/', "", $dir);

    echo '<li><a class="dropdown-item" href="'.$path.'/'.$dir.'">'.ucfirst($pdir).'</a></li>';
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEBBB</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <link rel="icon" href="/img/logo.png" />
  <body onload="set_theme()" class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <!-- Logo + nom gauche -->
    <a class="navbar-brand" href="/">
      <img src="/img/logo.png" alt="WEBBB logo" width="60" height="60">
      WEBBB
    </a>
    <!-- boutton menu droit -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- contenu menu milieu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/en/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/en/portfolio">Portfolio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/en/project" role="button" data-bs-toggle="dropdown" aria-expanded="false">Project</a>
          <ul class="dropdown-menu">
            <?php menuLink("project"); ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/en/project">See More</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/en/game" role="button" data-bs-toggle="dropdown" aria-expanded="false">Game</a>
          <ul class="dropdown-menu">
            <?php menuLink("game"); ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/en/game">See More</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/en/blog" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
          <ul class="dropdown-menu">
            <?php menuLink("blog"); ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/en/blog">See More</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/en/about">About</a>
        </li>
      </ul>
      <div class="d-flex me-auto">
        <input data-search class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <a tabindex="0" class="btn" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Warning" data-bs-content="It only looks for words, not sentences. '<' and '>' are ignored.">
          <i class="fa fa-question-circle"></i>
        </a>
      </div>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown dropstart">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-globe" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick="goFr()">
              <i class="fa fa-black-tie" aria-hidden="true"></i>
              Français
            </a></li>
            <li><a class="dropdown-item" onclick="goEn()">
              <i class="fa fa-wheelchair" aria-hidden="true"></i>
              English
            </a></li>
          </ul>
        </li>
        <li class="nav-item dropdown dropstart">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-moon-o" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <li><button class="dropdown-item" onclick="lightMode()">
              <i class="fa fa-sun-o" aria-hidden="true"></i>
               light
            </button></li>
            <li><a class="dropdown-item" onclick="darkMode()">
              <i class="fa fa-moon-o" aria-hidden="true"></i>
              Dark
            </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
