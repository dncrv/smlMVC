<!DOCTYPE html>
<html>
    <head>

        <title> 
            <?php 
                $title = isset($this->vData['title']) ? $this->vData['title'] : "PurePHP V0.0.1";
                echo $title;
            ?> 
        </title>
        <link rel="stylesheet" href="../node_modules/tether/dist/css/tether.min.css">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/iconfonts/stylesheets/font-awesome.cssnext.css">
    </head>
    <body>

