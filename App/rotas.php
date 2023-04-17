<?php

use App\Controller\{
    ContaController,
    CorrentistaController,
    WelcomeController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($parse_uri) {

    case '/correntista/save':
        CorrentistaController::save();
        break;
    case '/conta/extrato':
        ContaController::extrato();
        break;
    case '/conta/pix/enviar':
        ContaController::enviarPix();
        break;
    case '/conta/pix/receber':
        ContaController::receberPix();
        break;
    case '/correntista/entrar':
        CorrentistaController::auth();
        break;
    default:
        // header("Location: /welcome");
        break;
}
