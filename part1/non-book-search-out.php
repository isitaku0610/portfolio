<?php require "header.php"; ?>
<?php require "menu.php"; ?>
<table border="1" width="950">
    <tr><th>番号</th><th>書名</th><th>著名</th><th>種類</th><th>本棚</th><th>状況</th></tr>
    <?php
    $pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
                 'non-men', 'ZKWgAo!YAQlgXf8u');
if(isset($_REQUEST['search'])) {
    if($_REQUEST['search'] == "b_name") {
        $sql=$pdo->prepare('select * from book where b_name like ?');
    }elseif($_REQUEST['search'] == "b_author") {
        $sql=$pdo->prepare('select * from book where b_author like ?');
    }elseif($_REQUEST['search'] == "b_shelf") {
        $sql=$pdo->prepare('select * from book where b_shelf like ?');
    }
    $sql->execute(['%'.$_REQUEST['name'].'%']);
    
    
    foreach ($sql as $row) {
        $id=$row['b_id'];
        echo '<tr>';
        echo '<td align=right width=40>',$row['b_id'], '</td>';
        echo '<td align=left>','<a href="non-detail.php?id=', $id, '">',$row['b_name'],'</a>','</td>';
        echo '<td align=left>',$row['b_author'],'</td>';
        echo '<td align=right>',$row['b_type'],'</td>';
        echo '<td align=right>',$row['b_shelf'],'</td>';
        echo '<td align=right>',$row['b_on'],'</td>';
        echo '</tr>';
        echo "\n";
    }
}
    ?>
    </table>
    <?php require "footer.php"; ?>