<?php
#Developed by Ulises Reyes
require 'validations.php';

$name = $_POST['name'];
$age = $_POST['age'];
$gender =  $_POST['gender'];
$birthdate = $_POST['birthdate'];

#Validamos los campos del formulario
$errors = [];
$errors['name'] = validate_name($name);
$errors['age'] = validate_age($age);
$errors['birthdate'] = validate_birthdate($birthdate);

#En caso de que no hubiera errores las funciones regresan una cadena vacia,
#eliminamos esas entradas
$errors = array_filter($errors);

#Validamos si los errores estan vacios
if (empty($errors)) {
    echo json_encode(['message' => 'Datos recibidos con exito']);
} else {
    // Hay errores, devuelve el arreglo de errores en formato JSON
    echo json_encode(['errors' => $errors]);
}
