<?php

function hashage($passe)
{
	return hash('sha256', hash('sha256', 10 . $passe));
}