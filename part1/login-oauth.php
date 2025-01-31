<?php require "header.php"; ?>
<?php
    $pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
    'non-men', 'ZKWgAo!YAQlgXf8u');
    $array = [0,1,2,3,4,5,6,7,8,9];
    
    $sql=$pdo->prepare('select * from b_member where login=?');
    $stmt = $pdo->prepare('SELECT * FROM b_member where login = :login');
    $stmt->execute(array(':login' => $_POST['login']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $hash = password_hash($_REQUEST['password'], \PASSWORD_BCRYPT);
    $sql->execute([$_REQUEST['login']]);
    
    $stmt1 = "SELECT b_member.id,b_oauth.men_id, b_oauth.b_onetime 
    FROM b_oauth 
    JOIN b_member ON b_member.id = b_oauth.men_id";

    $stmt2 = $pdo->prepare($stmt1);
    $stmt2->execute();
    $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row) {
        $split = str_split($row['b_onetime']);
    }

shuffle($split);
//$random = mt_rand(0,1);
$r1 = mt_rand(0,9);$r2 = mt_rand(0,9);$r3 = mt_rand(0,9);$r4 = mt_rand(0,9);$r5 = mt_rand(0,9);$r6 = mt_rand(0,9);

if(password_verify($_POST['password'], $result['password'])){
    echo '<table border="1" width="800"><tr>';
    echo '<table border="1"><tr><td>列</td>';
    for($i=0;$i < 10;$i++) {
        echo'<td>',$i,'</td>';
    }
    echo '</tr><tr><td>番号</td>';
    foreach($array as $arr) {
        echo '<td>',$split[$arr],'</td>';
    }
    
    $random = 1;
    if($random == 0) {
        echo '<form action="login-output.php" method="post">';
        echo '</table><br>',$r1,'列目と',$r2,'列目と',$r3,'列目と',$r4,'列目と',$r5,'列目と',$r6,'列目を入力<br>';
        echo '<input type="text" name="oauth"></input>';
        echo '<input type="hidden" name="clear" value="',$split[$r1], $split[$r2], $split[$r3], $split[$r4], $split[$r5], $split[$r6],'"></input>';
        echo '<input type="hidden" name="login" value="',$_REQUEST['login'],'"></input>';
    } elseif($random == 1) {
        echo '<form action="login-output.php" method="post">';
        echo '</table><br>',$r1,'列目と',$r2,'列目を足して',$r3,'列目をかけた数は？<br>';
        $ans = ($split[$r1] + $split[$r2]) * $split[$r3];
        echo '<input type="text" name="oauth"></input>';
        echo '<input type="hidden" name="clear" value="',$ans,'"></input>';
        echo '<input type="hidden" name="login" value="',$_REQUEST['login'],'"></input>';
    }
    echo '<form action="login-output.php" method="post">';
    echo '<input type="submit" value="確定"><br>';
} else {
    echo '<table border="1" width="800"><tr>';
    echo '<table border="1"><tr><td>列</td>';
    for($i=0;$i < 10;$i++) {
        echo'<td>',$i,'</td>';
    }
    echo '</tr><tr><td>番号</td>';
    for($i=0;$i < 10;$i++) {
        echo'<td>',mt_rand(0,9),'</td>';
    }
    echo '</table><br>1番目と2番目を足した数は？<br>';
    echo '<input type=text name=oauth></input>';
    echo '<input type="submit" value="確定"><br>';
    echo '失敗';
}
?>
<?php require "footer.php"; ?>