<?php
#Developed by Ulises Reyes
declare(strict_types=1);

function validate_name(string $name): string
{
    #Usaremos un match para hacer las validaciones
    return match (true) {
        $name == '' => 'Introduce un nombre valido',
        strlen($name) < 2 => 'El nombre debe tener al menos 2 caracteres',
        #Expresion regular donde verificamos que solo contenga letras y espacios
        !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $name) => 'El nombre solo puede contener letras y espacios',
        default => '', // Si ninguna validación falla, devuelve una cadena vacía
    };
}

function validate_age(string $age): string
{
    # Usaremos un match para hacer las validaciones
    return match (true) {
        $age == '' => 'Introduce una edad valida',
        !is_numeric($age) || $age < 0 => 'La edad debe ser un numero valido y mayor o igual a cero',
        default => '', // Si ninguna validación falla, devuelve una cadena vacía
    };
}

function validate_birthdate(string $birthdate): string
{
    return match (true) {
        $birthdate == '' => 'Introduce una fecha de nacimiento valida',
        !strtotime($birthdate) => 'Por favor, introduce una fecha de nacimiento valida',
        default => '', // Si ninguna validación falla, devuelve una cadena vacía
    };
}
