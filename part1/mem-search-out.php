<?php require "header.php"; ?>
<?php require "menu2.php"; ?>
<table border="1" width="200">
    <center><tr><th>管理番号</th><th>管理者名</th></tr></center>
    <?php
    $pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
                 'staff', 'password');

    if($_REQUEST['search'] == "id") {
        $sql=$pdo->prepare('select * from b_member where id like ?');
    }elseif($_REQUEST['search'] == "name") {
        $sql=$pdo->prepare('select * from b_member where name like ?');
    }
    $sql->execute(['%'.$_REQUEST['name'].'%']);
    foreach ($sql as $row) {
        $id=$row['id'];
        echo '<tr>';
        echo '<td align=right>',$row['id'], '</td>';
        echo '<td width=100 height=30 align=right>','<a href="detail.php?id=', $id, '">',$row['name'],'</a>','</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
    </div>
    </table>
    <?php require "footer.php"; ?>