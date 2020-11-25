<?php

function postInput($tring)
{
	return trim(isset($_POST[$tring]) ? $_POST[$tring] : '');
}

function getInput($tring)
{
	return isset($_GET[$tring]) ? $_GET[$tring] : '';
}
