<?php

$id =	isset($_SESSION['id']) ? $_SESSION['id'] : '';


$daoAdherents = new AdherentDAO();
$daoAdherents->findByDemandeur($id);
var_dump($daoAdherents);

