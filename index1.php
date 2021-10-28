<?php
if (isset($_POST["submit"]))
{
    if (isset($_POST["nom"] , $_POST["prenom"] , $_POST["message"]))
    {

        extract($_POST);
        echo $nom." ".$prenom." ".$message;
    }
}

require('views/comment.view.php');

