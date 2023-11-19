<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if ($lang == 'fr'){
  header('Location: fr/home');
}else{
  header('Location: en/home');
}
exit;
?>
