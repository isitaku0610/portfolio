<?php require "header.php"; ?>
<?php require "menu.php"; ?>
<table border="1" width="1000">
<?php    
$pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
                 'non-men', 'ZKWgAo!YAQlgXf8u');

$sql=$pdo->prepare('select * from book where b_id =?');
$sql->execute([$_REQUEST['id']]);
foreach($sql as $row) {
    $id=$row['b_id'];
    echo '<form class="ib" action="detail2.php?id=', $id, '" method="post">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<center><tr><th>番号</th><th>書名</th><th>著名</th><th>種類</th><th>本棚</th><th>状況</th></tr></center>';
    echo '<tr><td align=right width=100>', $row['b_id'], '</td>';
    echo '<td align=right width=200>', $row['b_name'],'</td>';
    echo '<td align=right width=200>',$row['b_author'],'</td>';
    echo '<td align=right width=50>',$row['b_type'],'</td>';
    echo '<td align=right width=50>',$row['b_shelf'],'</td>';
    echo '<td align=right width=50>',$row['b_on'],'</td></table>';
    echo '<img width="525" height="750" src="image/book_', $id,'.jpg">';
}