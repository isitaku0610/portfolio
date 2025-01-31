<?php session_start(); ?>
<?php require "header.php"; ?>
<?php require "menu.php"; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
            'staff', 'password');
if ( isset($_SESSION['b_member']) ) {
    $id=$_SESSION['b_member']['id'];
    $sql=$pdo->prepare('select * from b_member where id!=? and login=?');
    $sql->execute([$id,$_REQUEST['login']]);
} else {
    $sql=$pdo->prepare('select * from b_member where login=?');
    $sql->execute([$_REQUEST['login']]);
}
if ( empty($sql->fetchAll()) ) {
    if ( isset($_SESSION['b_member']) ) {
        $sql=$pdo->prepare('update b_member set name=?,'.
                            'login=?,password=? where id=?');
        $sql->execute([
            $_REQUEST['name'],$_REQUEST['login'], $_REQUEST['password'], $id]);
        $_SESSION['b_member']=[
            'id'=>$id, 'name'=>$_REQUEST['name'], 'login'=>$_REQUEST['login'], 
            'password'=>password_hash($_REQUEST['password'], PASSWORD_BCRYPT) ];
        echo "お客様情報を更新しました。";
    } else {
        $sql=$pdo->prepare('insert into b_member values(null,?,?,?,?,0,null,null,null,null,null,null,null)');
        $sql->execute([
            $_REQUEST['name'], $_REQUEST['login'], password_hash($_REQUEST['password'], PASSWORD_BCRYPT), date("Y-m-d")]);
            echo "お客様情報を登録しました。";
    }
} else {
    echo "ログイン名が既に使用されていますので、変更してください。";
}
session_destroy();
?><br>
<form action="login-output.php" method="post">
    ログイン名<input type="text" name="login"><br>
    パスワード<input type="password" name="password"><br>
<input type="submit" value="ログイン">
<br><br><br><br>

<?php require "footer.php"; ?>