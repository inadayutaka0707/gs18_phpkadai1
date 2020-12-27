<?php
try{
    $db = new PDO('mysql:dbname=test;host=localhost;charset=utf8','root','root');

    $count = $db->exec('INSERT INTO 登録 SET 名前="'.$_POST['name'].'",メール="'.$_POST['email'].'",もの="'.$_POST['item'].'",登録日=NOW()');
    echo $count."登録が完了しました<br>";
    echo "<a href="."form2.php".">"."<button type="."submit".">"."商品一覧へ"."</button>"."</a>";
    } catch(PDOException $e){
        echo 'DB接続エラー' . $e->getMessage();
}



function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
};

$name = $_POST['name'];
$email = $_POST['email'];
$item = $_POST['item'];

$_SESSION['$name'];
$_SESSION['$email'];
$_SESSION['$item'];

?>

<html>
<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>
    <p>
    お名前：<?= h($name); ?><br>
    メアド：<?= h($email); ?><br>
    もの：<?= h($item); ?>
    </p>
    
</body>
</html>