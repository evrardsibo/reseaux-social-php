<?php


require ('config/db.php');
require ('includes/function.php');

//require ('includes/constant.php');

if(isset($_POST['submit']))
{

    if(notempty(['name','pseudo','email','password','confirmpassword']))
    {
        extract($_POST);
        $errors = [];

        if (mb_strlen($name) > 4)
        {
            $errors  [] = 'Minimum 5 lettres';
        }
        if (mb_strlen($pseudo) > 4)
        {
            $errors  [] = 'Minimum 5 lettres';
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {

            $errors  [] = 'Email incorrecte';
        }
        if(mb_strlen($password)>8)
        {
            $errors  [] = 'Minimum 8 lettres';
        }else
        {
            if($passoword != $confirmpassword)
            {
                $errors  = 'Mot de passe ne correspond pas';
            }
        }
        if(is_arleady_in_use('pseudo', $pseudo, users))
        {
            $errors  [] = 'Pseudo déjà utilisé';
        }
        if(is_arleady_in_use('email', $email, users))
        {
            $errors  [] = 'Email déjà utilisé';
        }
        if(count($errors  ) == 0)
        {
            $to = $email;
            $subject = WEBSITE_URL."- ACTIVATION DU COMPTE";
            $token = sha1($pseudo, $email, $password);

            ob_start();
            require ('templates/emails/activationmail.tmp.php');
            $content = ob_get_clean();
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';

            mail($to, $subject, $content, implode("\r\n", $headers));

            echo "mail envoyer!";

            $q = $bd->prepare('INSERT INTO users(name, pseudo, email, password)VALUES(:name,:pseudo,:email,:passowrd');
            $q->execute([
                'name' => $name,
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => shal($password)

            ]);



        }

    }else
    {
        $errors  [] = 'Veuillez remplir tous les champs!';
    }
}
?>

<?php
require ('views/register.view.php');
?>