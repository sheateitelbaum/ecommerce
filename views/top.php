<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
         if(substr( $action, 0, 6 ) === "secure"&& substr($site,-7)!=='(Admin)'){ 
            $site = $site .'(Admin)';
            }
            $style = ".jumbotron {
               background-color :pink;
               color:purple;
            }
            button{
                background-color:lightblue;
                color:purple
            }
                a,a:hover{
                    text-decoration:none;
                    color:purple
            }"

        ?>
        <title><?=$site?></title>
        <link href="/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
        <style>
<?php if (!empty($style)) echo $style; ?>
        </style>  
    </head>
        <body>
            <div class="jumbotron text-center">
                <div class="container">
                    <h1><?= $site ?></h1>
                </div>
            </div>

