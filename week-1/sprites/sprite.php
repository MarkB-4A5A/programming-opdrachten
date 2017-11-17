<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="sprite.css">
</head>
<body>

<?php

    require("MarioCartCharacter.class.php");

    $toad = new Toad();
    $toad->set = 'mario-kart-character';
    print $toad->getHTML('span');


?>

</body>
</html>
