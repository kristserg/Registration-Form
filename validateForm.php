<?php

$requirements = 
[
	"email" => 
	[
		"max" => 128
	],
	"name" => 
	[
		"max" => 128
	],
	"family" =>
	[
		"max" => 128
	],
	"password" =>
	[
		"min" => 6
	]
];

function isValid($data, $fields, $errors, $requirements): bool 
{
	//check mail
	$field = $fields[0];
	if(strlen($data[$field]) > $requirements[$field]['max'])
	{
		$errors[$field] = "$field има проблем. Дължината трябва да е по-малка от ".$requirements[$field]['max'];
		echo "<p> $errors[$field] </p>"; 
	}
	$field = $fields[1];
	// check name
	if(strlen($data[$field]) > $requirements[$field]['max'])
	{
		$errors[$field] = "$field има проблем. Дължината трябва да е по-малка от ".$requirements[$field]['max'];
		echo "<p> $errors[$field] </p>"; 
	}
	$field = $fields[2];
	// check family
	if(strlen($data[$field]) > $requirements[$field]['max'])
	{
		$errors[$field] = "$field има проблем. Дължината трябва да е по-малка от ".$requirements[$field]['min'];
		echo "<p> $errors[$field] </p>"; 
	}
	// check password
	$field = $fields[3];
	if(strlen($data[$field]) < $requirements[$field]['min'])
	{
		$errors[$field] = "$field има проблем. Дължината трябва да е по-голяма от ".$requirements[$field]['min'];
		echo "<p> $errors[$field] </p>"; 
	}
	return empty($errors);
}
$data = $_POST;
$fields = array_keys($_POST);
$errors = array();
if(isValid($data, $fields, $errors, $requirements))
{
	echo "Валидацията е успешна!";
}
?>