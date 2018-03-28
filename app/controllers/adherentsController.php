<?php

$id =	isset($_SESSION['id']) ? $_SESSION['id'] : '';

echo'test';
$daoDemandeur = new Bordereau();
$daoDemandeur->find($id);
var_dump($daoDemandeur);