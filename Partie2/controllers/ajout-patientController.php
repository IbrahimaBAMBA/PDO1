<?php
/*
 * On instancie l'objet patients
 * Puis on vérifie que toutes les variables $_POST existent
 * Puis on assigne la valeur des $_POST dans les attributs de l'objet patients
 */
$patients = new patients();
$regName = '#^[A-Z]{1}[a-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+[-\']?[a-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+$#';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPhone = '#^0[1-9]((-[0-9]{2}){4}|(([0-9]{2})){4}|(\/[0-9]{2}){4}|(\\[0-9]{2}){4}|(_[0-9]{2}){4}|(\s[0-9]{2}){4})$#';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';

//$insertSuccess sert à afficher ou non un message d'erreur
$insertSuccess = false;
$formError = array();
//On vérifie qu'il y a bien un input et on lui attribue la valeur que l'utilisateur entre. Si l'info rentré n'est pas correcte, un meesage d'erreur est retourné
if (isset($_POST['lastname'])) {
    $patients->lastname = htmlspecialchars($_POST['lastname']);
    if (!preg_match($regName, $patients->lastname)) {
        $formError['lastname'] = 'Le nom n\'est pas correct';
    }
}
if (isset($_POST['firstname'])) {
    $patients->firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regName, $patients->firstname)) {
        $formError['firstname'] = 'Le prenom n\'est pas correct';
    }
}
if (isset($_POST['birthdate'])) {
    $patients->birthdate = htmlspecialchars($_POST['birthdate']);
    if (!preg_match($regBirthDate, $patients->birthdate)) {
        $formError['birthdate'] = 'La date de naissance n\'est pas correcte';
    }
}
if (isset($_POST['phone'])) {
    $patients->phone = htmlspecialchars($_POST['phone']);
    if (!preg_match($regPhone, $patients->phone)) {
        $formError['phone'] = 'Le numéro de tel n\'est pas correct';
    }
}
if (isset($_POST['mail'])) {
    $patients->mail = htmlspecialchars($_POST['mail']);
    if (!preg_match($regMail, $patients->mail)) {
        $formError['mail'] = 'L\'adresse mail n\'est pas correcte';
    }
}
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
if (isset($_POST['submit']) && count($formError) == 0) {
    if (!$patients->addPatient()) {
    $formError['add'] = 'Erreur lors de l\'ajout'; }
    } else {
        //Si il n'y a pas d'erreur, on réinitialise les variables
        $insertSuccess = true;
        $patients->lastname = '';
        $patients->firstname = '';
        $patients->birthdate = '';
        $patients->phone = '';
        $patients->mail = '';
    }
    
    
?>