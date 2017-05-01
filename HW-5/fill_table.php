<?php

$order_id = $goods_id = $order_date = $sql = null;

function query(array $data)
{
    if ($_GET['db_name'] == 'mysql') {
        $dbh = new PDO('mysql:host=localhost;dbname=shop', 'root', 100);
        $sql = 'INSERT INTO `orders` (`order_id`, `goods_id`, `order_date`)
            VALUES (:order_id, :goods_id, :order_date)';
    } elseif ($_GET['db_name'] == 'posql') {
        $dbh = new PDO('pgsql:host=localhost;dbname=shop;user=postgres');
        $sql = 'INSERT INTO "orders" ("order_id", "goods_id", "order_date")
            VALUES (:order_id, :goods_id, :order_date)';
    }
    $sth = $dbh->prepare($sql);
    $sth->execute($data);
}
if (!empty($_GET['submit'])) {
    for ($i = 1; $i <= $_GET['number_string']; $i++) {
        $order_id = rand(1, 1000);
        $goods_id = 'Tovar-'.$i;
        $order_date = '2017-' . rand(1, 4) . '-' . rand(1, 31). ' '.rand(0,23).':'.rand(0,59).':'.rand(0,59);

        query([':order_id' => $order_id, ':goods_id' => $goods_id, ':order_date' => $order_date]);
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
    <input type="submit" name="submit" value="Записать">
</form>
</body>
</html>


