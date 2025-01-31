<?php require "header.php"; ?>
<?php require "menu2.php"; ?>
どれか一つ選んで入力してください。
<form action="mem-search-out.php" method="post">
    <input type="text" name="name" style="width:300px"><br>
        <br>
        <input type="radio" name="search" value="id" checked="checked">管理番号
        <input type="radio" name="search" value="name">管理者名<br>
    <input type="submit" value="検索">
</form>
<!-- <img src="image/memsearch.jpg" width="35%" height="35%"> -->
<?php require "footer.php"; ?>




<!-- <form action="search-output.php" method="post">
<select name="id">
    <?php?>/*
    $pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8'.
                'staff', 'password');
foreach($pdo->query('select * from costomer') as $id) {
    echo '<option value="', $id['id'], '">', $id['id'], '</option>';
}
?>
</select>
<p><input type="submit" value="確定"></p>
</form>
-->