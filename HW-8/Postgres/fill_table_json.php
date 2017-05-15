<?php

$color = $size = $weight = $sql = null;

function query($color, $size, $weight, $i)
{
   $dbh = new PDO('pgsql:host=localhost;dbname=shop;user=postgres');
   $sql = 'UPDATE "goods" SET "product_details" = (\'{"color": "'.$color.'", "size": "'.$size.'", "weight": '.$weight.'}\') WHERE "goods"."id" = ' .$i;
   $sth = $dbh->prepare($sql);
   $sth->execute();
}
if (!empty($_GET['submit'])) {
    for ($i = 1; $i <= 1000; $i++) {
        if ($i % 2 == 0) {
            $color = 'red';
            $size = 'XXL';
            $weight = 1500;
        } elseif ($i % 3 == 0) {
            $color = 'red';
            $size = 'L';
            $weight = 150;
        } elseif ($i % 4 == 0){
            $color = 'green';
            $size = 'M';
            $weight = 250;
        } elseif ($i % 5 == 0){
            $color = 'yellow';
            $size = 'X';
            $weight = 450;
        } elseif ($i % 6 == 0){
            $color = 'blue';
            $size = 'XXL';
            $weight = 250;
        } elseif ($i % 11 == 0){
            $color = 'gray';
            $size = 'null';
            $weight = 350;
        } elseif ($i % 13 == 0){
            $color = 'green';
            $size = 'XX';
            $weight = 1250;
        } elseif ($i % 14 == 0){
            $color = 'null';
            $size = 'null';
            $weight = 250;
        } elseif ($i % 16 == 0){
            $color = 'light-gray';
            $size = 'null';
            $weight = 0;
        } elseif ($i % 18 == 0){
            $color = 'orange';
            $size = 'XXL';
            $weight = 1500;
        } elseif ($i % 19 == 0){
            $color = 'white';
            $size = 'XXL';
            $weight = 200;
        } elseif ($i % 21 == 0){
            $color = 'white';
            $size = 'XL';
            $weight = 500;
        }else {
            $color = 'black';
            $size = 'XXXL';
            $weight = 2500;
        }
        query($color, $size, $weight, $i);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>заполнить таблицу</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="submit" value="Записать">
</form>
</body>
</html>


