<?php 
session_start();

require_once('controllers/mainController.php');

if(isset($_GET['page']))
{
    if($_GET['page'] == 'signUp')
    {
        if(isset($_GET['action']))
        {
            if($_GET['action'] == 'signUp-selectSociety')
            {
                signUpStart();
            }
            elseif($_GET['action'] == 'signUp-society')
            {
                signUpSociety();
            }
            elseif($_GET['action'] == 'signUp-user')
            {
                signUpUser();
            }
            elseif($_GET['action'] == 'signUp-end')
            {
                signUpEnd();   
            }
            else
            {
                signUpStart();
            }
        }
        else
        {
            signUpStart();
        }
    }
    elseif($_GET['page'] == 'signIn')
    {
        signIn();
    }
    elseif($_GET['page'] == 'forgotPassword')
    {
        forgotPassword();
    }
    elseif($_GET['page'] == 'contact')
    {
        if(isset($_GET['action']))
        {
            if($_GET['action'] == 'send')
            {
                sendMessage();
            }
            else
            {
                contact();
            }
        }
        else
        {
            contact();
        }
        
    }
    elseif($_GET['page'] == 'home')
    {
        home();
    }
    else
    {
        home();
    }
}
else
{
    home();
}