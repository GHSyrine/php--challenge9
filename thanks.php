<?php
$user_firstnameErr =   $user_lastnameErr = $user_phonErr =  $user_emailErr = $user_messageErr;

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_phone = $_POST['user_phone'];
$subject = $_POST['subject'];
$user_email = $_POST['user_email'];
$user_message = $_POST['user_message'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($user_firstname)) {
      $user_firstnameErr = 'First Name is required';
   } else {
      $user_firstname = test_input($_POST['user_firstname']);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $user_firstname)) {
         $user_firstnameErr = "Only letters and white space allowed";
      }
   }

   if (empty($user_lastname)) {
      $user_lastnameErr = 'Last Name is required';
   } else {
      $user_lastname = test_input($_POST['user_lastname']);
   }

   if (empty($user_phone)) {
      $user_phonErr = 'The Number phone is required';
   } else {
      $user_phone = test_input($_POST['user_phone']);
   }

   if (empty($user_email)) {
      $user_emailErr = 'The email is required';
   } else {
      $user_email = test_input($_POST['user_email']);
      if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
         $user_emailErr = "Invalid email format";
      }
   }
   if (empty($subject)) {
      $subjectErr = 'required field';
   } else {
      $subject = test_input($_POST['subject']);
   }
   if (empty($user_message)) {
      $user_messageErr = 'required field';
   } else {
      $user_message = test_input($_POST['user_message']);
   }
}
if (empty($user_firstnameErr) && empty($user_lastnameErr) && empty($user_emailErr) && empty($user_phonErr) && empty($$user_messageErr) && empty($subjectErr)) {

   echo 'Merci' . $_POST['user_firstname'] . '' . $_POST['user_lastname'] . 'de nous avoir contacté à propos de' . $_POST['subject'] . '<br>';

   echo 'Un de nos conseiller vous contactera soit à l\'adresse' . $_POST['user_email'] . 'ou par téléphone au' . $_POST['user_phone'] . 'dans les plus brefs délais pour traiter votre demande';
} else {
   echo $user_firstnameErr . $user_lastnameErr . $user_emailErr . $user_messageErr . $subjectErr;
}
