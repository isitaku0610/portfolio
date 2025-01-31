<?php session_start(); ?>
<?php require "header.php"; ?>
<?php require "menu.php"; ?>
<?php
$name=$login=$password='';
if (isset($_SESSION['b_member'])) {
    $name=$_SESSION['b_member']['name'];
    $login=$_SESSION['b_member']['login'];
    $password=$_SESSION['b_member']['password'];
}
echo '<form action="b_member-output.php" method="post">';
echo '<table>';
echo '<tr><td>お名前</td><td>';
echo '<input type="text" name="name" value="', $name, '">';
echo '</td></tr>';
echo '<tr><td>ログイン名</td><td>';
echo '<input type="text" name="login" value="', $login, '">';
echo '</td></tr>';
echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';
?>
<?php require "footer.php"; ?> 