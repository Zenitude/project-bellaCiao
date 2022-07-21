<?php 
session_start();

require_once('controllers/mainController.php');

if(isset($_GET['page']))
{
    if($_GET['page'] == 'signUp')
    {
        signUp();
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
    else
    {
        home();
    }
}
else
{
    home();
}