<?php

$id = $vendor_code = $name = $price = $old_price = $picture = $date_receipt_goods = $quantity_in_stock = $sql = null;
$goods = [];

function query($sql, array $data)
{
    if ($_GET['db_name'] == 'mysql') {
        $dbh = new PDO('mysql:host=localhost;dbname=shop', 'root', 100);
        $sql = 'INSERT INTO `goods` (`vendor_code`, `name`, `price`, `old_price`, `picture`, `date_receipt_goods`, `quantity_in_stock`)
            VALUES (:vendor_code, :name, :price, :old_price, :picture, :date_receipt_goods, :quantity_in_stock)';
    } elseif ($_GET['db_name'] == 'posql') {
        $dbh = new PDO('pgsql:host=localhost;dbname=shop;user=postgres');
        $sql = 'INSERT INTO "goods" ("vendor_code", "name", "price", "old_price", "picture", "date_receipt_goods", "quantity_in_stock")
            VALUES (:vendor_code, :name, :price, :old_price, :picture, :date_receipt_goods, :quantity_in_stock)';
    }
    $sth = $dbh->prepare($sql);
    $sth->execute($data);
}
if (!empty($_GET['submit'])) {
    for ($i = 1; $i <= $_GET['number_string']; $i++) {
        if ($i % 6 == 0) {
            $vendor_code = 'TEST-' . rand();
        } elseif ($i % 5 == 0) {
            $vendor_code = 'a-' . rand();
        } elseif ($i % 8 == 0) {
            $vendor_code = 'A-' . rand();
        } elseif ($i % 3 == 0) {
            $vendor_code = 'B-' . rand();
        } else {
            $vendor_code = 'b-' . rand();
        }
        $name = 'Tovar-' . $i;
        $old_price = rand(1, 1000);
        $price = rand(1, $old_price);
        $picture = 'http://site.ru/pic/pic' . $i . '.png';
        $date_receipt_goods = rand(2000, 2017) . '-' . rand(1, 12) . '-' . rand(1, 31);
        $quantity_in_stock = rand(1, 1500);
        $goods[] = ['vendor_code' => $vendor_code, 'name' => $name,
            'price' => $price, 'old_price' => $old_price, 'picture' => $picture,
            'date_receipt_goods' => $date_receipt_goods, 'quantity_in_stock' => $quantity_in_stock];
    }

    foreach ($goods as $item) {
        query($sql, [':vendor_code' => $item['vendor_code'], ':name' => $item['name'],
            ':price' => $item['price'], ':old_price' => $item['old_price'], ':picture' => $item['picture'],
            ':date_receipt_goods' => $item['date_receipt_goods'], ':quantity_in_stock' => $item['quantity_in_stock']]);

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


