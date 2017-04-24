<?php

$category_id = $brand_id = null;
function query($i, array $data)
{
    if ($_GET['db_name'] == 'mysql') {
        $dbh = new PDO('mysql:host=localhost;dbname=shop', 'root', 100);
        $sql = 'UPDATE `goods` SET `category_id` = :category_id, `brand_id` = :brand_id WHERE `id` = '.$i;
    } elseif ($_GET['db_name'] == 'posql') {
        $dbh = new PDO('pgsql:host=localhost;dbname=shop;user=postgres');
        $sql = 'UPDATE "goods" SET "category_id" = :category_id, "brand_id" = :brand_id WHERE "id" = '.$i;
    }
    $sth = $dbh->prepare($sql);
    $sth->execute($data);
}
if (!empty($_GET['submit'])) {

    for ($i = 1; $i <= $_GET['number_string']; $i++) {
        $category_id = rand(1, 5);
        if ($category_id == 1) {
            $brand_id = rand(1, 3);
        } elseif ($category_id == 2) {
            $brand_id = rand(4, 6);
        } elseif ($category_id == 3) {
            $brand_id = rand(7, 9);
        } elseif ($category_id == 4) {
            $brand_id = rand(10, 12);
        } else {
            $brand_id = rand(11, 15);
        }

        query($i, [':category_id' => $category_id, ':brand_id' => $brand_id]);

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
<select name="db_name" id="">
    <option value="">Выбрать базу</option>
    <option value="mysql">MySQL</option>
    <option value="posql">Postgres</option>
</select>
<label for="">Введите количество записей</label>
<input type="text" name="number_string" id="">
    <input type="submit" name="submit" value="Обновить">
</form>
</body>
</html>
