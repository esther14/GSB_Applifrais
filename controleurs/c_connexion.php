<?php


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) { //si il ya une dmd de conection
case 'demandeConnexion':
    include 'vues/v_connexion.php';//affiche la demande connection
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);//pour filtre que c bien un caracter et pas un truc numeric
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $visiteur = $pdo->getInfosVisiteur($login, $mdp);//pdo roli le seurvur et la basse de donne
    $comptable=$pdo->getInfosComptable($login,$mdp);
    if(!is_array($visiteur)&& !is_array($comtable)){
        ajouterErreur('Login ou mot de passe incorrect');// on rentre c qui manque 
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    
    }else{
        if (!is_array($visiteur)){
            
        $id = $visiteur['id'];
        $nom = $visiteur['nom'];
        $prenom = $visiteur['prenom'];
        $statut='visiteur';
        
         
    } elseif(is_array($comptable)) {       //sinon
        $id = $comptable['id'];
        $nom = $comptable['nom'];
        $prenom = $comptable['prenom'];
        $statut='comptable';
       }
                
       connecter($id, $nom, $prenom,$statut);//on ete connecte
        header('Location: index.php');//header — Envoie un en-tête HTTP
    
    }
    break;//fin de cas
default:
    include 'vues/v_connexion.php';
    break;
}
