<?php
try{
    $pdo = new PDO('mysql:dbname=test;host=localhost;charset=utf8','root','root');

}catch(PDOException $e){
    exit('データベースに登録できませんでした'.$e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM 登録");
$status = $stmt->execute();

$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= '<a href="u_view.php?id='.$result["id"].'">';
        $view .= $result["名前"].":".$result["もの"];
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>結果</title>
    </head>
    <body id="main">
        <div>
            <div class="container jumbotron"><?=$view?></div>
        </div>
    </body>
</html>