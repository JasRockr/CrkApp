<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Valida que sea el ultimo producto del pedido
function esUltimo(string $actual, string $proximo): bool {
    if($actual != $proximo) {
        return true;
    }
    return false;
}

// Valida que el usuario esté autenticado
function isAuth () : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    } 
}

// Valida que el usuario es administrador
function isAdmin () : void {
    if(!isset($_SESSION['admin'])) {
        header('Location: /');
    } 
}