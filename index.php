<?php

require_once 'includes/fct.inc.php';//aven de comance laplication il verifi (once)que tout va bien 
require_once 'includes/class.pdogsb.inc.php';//tout le fonction de la basse de donne. creasion de la conection a la basse de donne 
session_start();//tenque la session est ouvert on peu recoupere son inentifienphp.nete demar un sesion un sesssion pouur un itulisateur
$pdo = PdoGsb::getPdoGsb();//il feux metre dabord le nom de la fonction et le 2:: 
$estConnecte = estConnecte();//cotenu de la fonction et conecte et verifie si il ya un itilizateur qui estconecte
require 'vues/v_entete.php';//message de erore si on la pas mis en tete si on a pas fais includ
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);//UC nom de variable "filter_input" uc on va filtre "INPUT_GET,"valeur rentre par le programe "FILTER_SANITIZE_STRING" le nom du filtre .
if ($uc && !$estConnecte) {//!connecte est faux
    $uc = 'connexion';//on conecte le prujogam psq il ya uo une erore alore il fue le conecte mateno.
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {//aulio de fair des teste de if estttttt chaque case  et a la place de cas.uc lutiisateur
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
}
require 'vues/v_pied.php'; //pied de pages
