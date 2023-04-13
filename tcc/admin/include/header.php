<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (!isset($_SESSION['loginAdmin']) && (!isset($_SESSION['senhaAdmin']))) {
  header("Location: index.php?acao=negado");
  exit();
}
include_once('sair.php');

?>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    