<?php

require_once 'vendor/autoload.php';

use Dotenv\Dotenv;

// Cargar las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Comprobar si las variables de entorno están definidas
$requiredEnvVars = [
    'DB_HOST',
    'DB_PORT',
    'DB_NAME',
    'DB_USER',
    'DB_PASSWORD',
    'FIREBASE_SERVICE_ACCOUNT',
    'JWT_SECRET_KEY',
    'TWILIO_SID',
    'TWILIO_TOKEN'
];

foreach ($requiredEnvVars as $var) {
    if (empty($_ENV[$var])) {
        die("Error: La variable de entorno $var no está definida o está vacía.");
    }
}

// Decodificar el JSON de FIREBASE_SERVICE_ACCOUNT
$firebaseServiceAccount = json_decode($_ENV['FIREBASE_SERVICE_ACCOUNT'], true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error: El formato JSON de FIREBASE_SERVICE_ACCOUNT es inválido.');
}

// Configuración de parámetros
$parametros = [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'db' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'firebase_service_account' => $firebaseServiceAccount,
    'jwt_secret_key' => $_ENV['JWT_SECRET_KEY'],
    'twilio_sid' => $_ENV['TWILIO_SID'],
    'twilio_token' => $_ENV['TWILIO_TOKEN']
];

// Imprimir los parámetros para verificar
