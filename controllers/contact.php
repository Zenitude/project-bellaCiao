<?php

    require('models/Contact.php');

function contact()
{
    require_once('views/contact/contact.php');
}

function sendMessage()
{
    if(isset($_POST['message']))
    {
        $success = '<p class="msgSuccess">Message envoyé avec succès</p>';
    }

    require_once('views/contact/contact.php');
}