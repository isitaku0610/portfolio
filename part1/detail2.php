<?php require "header.php"; ?>
<?php require "menu2.php"; ?>
<table border="1" width="1000">
<?php
$pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
             'staff', 'password');
if (isset($_REQUEST['command'])) {
    if (isset($_REQUEST['b_com']) && isset($_REQUEST['id'])) {
        $sql1 = $pdo->prepare('UPDATE book SET b_com=? WHERE b_id=?');
        $sql1->execute([
            htmlspecialchars($_REQUEST['b_com']),
            intval($_REQUEST['id'])
        ]);
        echo "貸出メモを更新しました。";
    } else {
        echo '更新に失敗しました。';
        var_dump($_REQUEST['b_id']);
    }
}

$sql=$pdo->prepare('select * from book where b_id =?');
$sql->execute([$_REQUEST['id']]);
foreach($sql as $row) {
    $id=$row['b_id'];
    echo '<form class="ib" action="detail2.php?id=', $id, '" method="post">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<center><tr><th>番号</th><th>書名</th><th>著名</th><th>種類</th><th>本棚</th><th>在架</th></tr></center>';
    echo '<tr><td align=right width=100>', $row['b_id'], '</td>';
    echo '<td align=right width=200>', $row['b_name'],'</td>';
    echo '<td align=right width=200>',$row['b_author'],'</td>';
    echo '<td align=right width=50>',$row['b_type'],'</td>';
    echo '<td align=right width=50>',$row['b_shelf'],'</td>';
    echo '<td align=right width=50>',$row['b_on'],'</td></table>';
    echo '<td align=right>','<font size=6>貸出メモ</font><br><textarea name="b_com" style="width:560px" rows="4">', $row['b_com'] ,'</textarea></td>';
    echo '<tr><th><th><th><th><br><input type="submit" value="備考の更新"></td></th></th></th></th></tr><br><br></form>';
}

if (isset($_FILES['file'])) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        if(!file_exists('upload')) {
            mkdir('upload');
        }
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $book = "book_$id".".jpg";
        $file = 'image/'.basename($book);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file) ) {
            echo '画像のアップロードに成功しました。<br>';
        } else {
            echo 'アップロードに失敗しました。';
        }
    }
}

echo 'アップロードするファイルを指定してください。<br>';
echo '<form class="ib" action="detail2.php?id=', $id, '" method="post" enctype="multipart/form-data">';
echo '<input type="file" name="file">';
echo '<input type="submit" value="アップロード"><br>';
echo '<img width="50%" height="50%" src="image/book_', $id,'.jpg">';
?>
<?php require "footer.php"; ?>