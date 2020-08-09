<?php


namespace App\Controllers;

use App\Core\SimpleController;

class ChatController extends SimpleController
{
    public function index()
    {
        return <<<HTML
                
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue</title>
    <link rel="stylesheet" href="public/css/index.css">
</head>
<body>
   <div id="app"></div>
</body>
<script src="public/js/index.js"></script>
</html>
HTML;
    }
}