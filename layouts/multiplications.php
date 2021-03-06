<?php
    session_start();
    include('../login_database.php');
    include('../database/connection_database.php');
    $_SESSION['table'] = $_POST['dropdownTable'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_multiplications.css">
    <title>Multiplications</title>
</head>
<body>

    <?php
        include('../components/header.php');
        $get_cards = $bdd->prepare('SELECT operation,result FROM addcards WHERE tableNumber = :tableNumber ORDER BY RAND() LIMIT 1');
        $get_cards->bindParam(':tableNumber', $_SESSION['table']);
        $get_cards->execute();

        while($display_cards = $get_cards->fetch()){
            ?>
                <div class="divButton">
                    <button  onclick="buttonBackVisible()" class="buttonFront"><?php echo $display_cards['operation'] ?></button>
                    <button  onclick="buttonBackHidden()" id="buttonBackHidden" class="buttonBack"><?php echo $display_cards['result'] ?></button>
                </div>
            <?php
        }
    ?>

<button id="refresh" onclick="document.location.reload(false)" class="buttonNext">Next</button>

<script src="../js/script.js"></script>
</body>
</html>