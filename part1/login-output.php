<?php session_start(); ?>
<?php require "header.php"; ?>
<style>
.small{ font-size: 0.8em; }
.big{ font-size: 2.0em; }
</style>

<?php
unset($_SESSION['b_member']);
$pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
             'staff' , 'password');
$sql=$pdo->prepare('select * from b_member where login=?');
$stmt = $pdo->prepare('SELECT * FROM b_member where login = :login');
$stmt->execute(array(':login' => $_POST['login']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$sql->execute([$_REQUEST['login']]);
foreach ($sql as $row) {
    $_SESSION['b_member'] = [
        'id'=>$row['id'], 'name'=>$row['name'],
        'login'=>$row['login'], 'password'=>$row['password']];
}

if($_REQUEST['clear'] == $_REQUEST['oauth']){
    //if ( isset($_SESSION['b_member'])) {
        require "menu2.php";
        echo '<font size="20">';
        echo 'ようこそ！<br>', htmlspecialchars($_SESSION['b_member']['name']), 'さん。</font><br>';
        /* <img src="image/top.png"> */
    } else {
        require "menu.php";
        echo "パスワードまたは、ワンタイムパスワードが違います。<br>";
        echo '<form action="login-oauth.php" method="post">';
        echo 'ログイン名<input type="text" name="login"><br>';
        echo 'パスワード<input type="password" name="password"><br>';
        echo '<input type="submit" value="ログイン">';
    }
    require "footer.php";
    ?>