<?php
    $xml=simplexml_load_file("data.xml");

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        foreach($xml->item as $item){
            if ($item['id'] == $id){
                $name=$item->name;
                $price=$item->price;
                $descr=$item->descr;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST['id'];
        
        foreach($xml->item as $item){
            if ($item['id'] == $id){
                $item->name=$_POST['plantname'];
                $item->price=$_POST['price'];
                $item->descr=$_POST['descr'];
                break;
            }
        }
        $xml->saveXML('data.xml');
        echo '<script>
        alert("растение успешно обновлено");
        location.href="index.php";
        </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновить</title>
</head>
<body>
    <form action="" method="POST">
    <input type="text" name="plantname"  value="<?php echo $name ?>">
        <br>
        <br>
        <input type="number" name="price"  value="<?php echo $price ?>">
        <br>
        <br>
        <input type="text" name="descr" value="<?php echo $descr ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <br>
        <button type="submit" name="submit">Обновить</button>

    </form>
    <br>
    <br>
    <a href="index.php">Назад</a>
</body>
</html>