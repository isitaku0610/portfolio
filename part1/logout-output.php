<?php session_start(); ?>
<?php require "header.php"; ?>
<?php require "menu.php";?>
<?php
if (isset($_SESSION['b_member'])) {
    unset ($_SESSION['b_member']);
    echo "ログアウトしました。";
} else {
    unset ($_SESSION['b_member']);
    echo "すでにログアウトしています。";
}
?>
<?php require "footer.php"; ?>