<?php
    $xml=simplexml_load_file("data.xml");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>магазинчик</title>
</head>
<body>
    <h1>Магазин комнатных растений</h1>
    <hr>

    <h2>Популярные растнеия:</h2>
    <div class="plants">
        <?php 
        foreach ($xml->item as $item) {
        ?>
        <div class="plant">
            <div class="name"><?php echo $item->name?></div>
            <div class="price"><?php echo $item->price?></div>
            <div class="descr"><?php echo $item->descr?></div>
            <br>
            <a href="update.php?id=<?php echo $item['id']?>">Обновить</a>
            <a href="delete.php?id=<?php echo $item['id']?>">Удалить</a>
        </div>
        <?php 
           }
        ?>
    </div>
    
    <br>

    <a href="create.php">Добваить новое растение</a>
</body>
</html>