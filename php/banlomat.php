<?php
$nominal = explode(' ',$_POST['nominal']);
$gold = $_POST['gold'];
arsort($nominal);
$result = array();
foreach ($nominal as $nom){
  $del = intdiv($gold,$nom);
  $result[$nom] = $del;
  $gold -= $nom*$del;
}
echo json_encode( $result );
