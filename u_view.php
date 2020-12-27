<?php
$id = $_GET["id"];

try{
    $pdo = new PDO('mysql:dbname=test;host=localhost;charset=utf8','root','root');

}catch(PDOException $e){
    exit('データベースに登録できませんでした'.$e->getMessage());
}

$sql = "SELECT * FROM 登録 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $row = $stmt->fetch();
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>結果</title>
    </head>
    <body id="main">
        <form method="post" action="form2.php">
            <div class="jumbotron">
                <fieldset>
                    <legend>内容変更</legend>
                    <label>名前：<input tyoe="text" name="name" value="<?=$row["名前"]?>"></label><br>
                    <label>メール：<input tyoe="email" name="email" value="<?=$row["メール"]?>"></label><br>
                    <label>もの：<input tyoe="text" name="item" value="<?=$row["もの"]?>"></label><br>
                    <input type="submit" value="送信">
                </fieldset>
            </div>
        </form>
    </body>
</html>