<?php require "header.php"; ?>
<?php require "menu2.php"; ?>
<table border="1" width="1400">
<tr><th>登録番号</th>
<th>書名</th>
<th>著名</th>
<th>種類</th>
<th>本棚</th>
<th>状況</th><tr></center>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
             'staff', 'password');
if (isset($_REQUEST['command'])) {
    switch ($_REQUEST['command']) {
    case 'insert':
        if (empty($_REQUEST['b_name']) ||
        !preg_match('/^[0-9]+$/', $_REQUEST['b_author'])) break;
        $sql=$pdo->prepare('insert into book values(null,?,?,?,?,?)');
        $sql->execute(
            [htmlspecialchars($_REQUEST['b_name']), $_REQUEST['b_author'], $_REQUEST['b_type'], $_REQUEST['b_shelf'], "在架"]);
            break;
    case 'update':
        if (isset($_REQUEST['b_name']) && isset($_REQUEST['b_author']) && isset($_REQUEST['b_type']) && isset($_REQUEST['b_shelf']) && isset($_REQUEST['b_on']) && isset($_REQUEST['id'])) {
            $sql = $pdo->prepare('UPDATE book SET b_name=?, b_author=?, b_type=?, b_shelf=? , b_on=? WHERE b_id=?');
            $sql->execute([
                htmlspecialchars($_REQUEST['b_name']),
                htmlspecialchars($_REQUEST['b_author']),
                htmlspecialchars($_REQUEST['b_type']),
                htmlspecialchars($_REQUEST['b_shelf']),
                htmlspecialchars($_REQUEST['b_on']),
                intval($_REQUEST['id'])
            ]);
            echo $_REQUEST['id']. "の更新が完了しました。";
        } else {
        echo $_REQUEST['id']. "の更新に失敗しました。";
        }
        break;
    case 'delete':
        $sql=$pdo->prepare('delete from book where b_id=?');
        $sql->execute([$_REQUEST['id']]);
        echo $_REQUEST['id']. "を削除しました。";
        break;
    default:
        echo "削除用パスワードが違います。";
        break;
    }
}
foreach($pdo->query('select * from book') as $row) {
    echo '<form class="ib" action="admin.php" method="post">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<input type="hidden" name="id"value="', $row['b_id'], '">';
    echo '<tr><td align=right  width="60">', $row['b_id'], '</td>';
    echo '<td align=right >','<input type="text" name="b_name" style="width:500px" value="', $row['b_name'], '">', '</td>';
    echo '<td align=right >','<input type="text" name="b_author" style="width:500px" value="', $row['b_author'], '">', '</td>';
    $type = array_sel($row['b_type']);
    echo '<td align=right>','<select name="b_type"><option value="01:文庫"',$type[0],'>01:文庫</option><option value="02:絵本"',$type[1],'>02:絵本</option><option value="03:雑誌"',$type[2],'>03:雑誌</option><option value="99:その他"',$type[3],'>99:その他</option>';
    $type = array_sel($row['b_shelf']);
    echo '<td align=right  width="10">','<select name="b_shelf"><option value="01"',$type[0],'>01</option><option value="02"',$type[1],'>02</option><option value="03"',$type[2],'>03</option><option value="04"',$type[3],'>04</option></td>';
    $type = array_sel($row['b_on']);
    echo '<td align=right width="10">','<select name="b_on"><option value="在架"',$type[0],'>在架</option><option value="貸出中"',$type[1],'>貸出中</option></td>';
    echo '<td align=right>','<input type="submit" value="更新">', '</td>';
    echo '</form>';
    echo '<form class="ib" action="admin.php" method="post">';
    echo '<td><input type="password" name="command" value=""style="width:50px;></td>';
    echo '<td align=right>','<input type="hidden" name="id" value="', $row['b_id'], '">';
    echo '<td><input type="submit" value="削除">', '</td>';
    echo '</form>';
    echo "\n";
}
?>

<form action="admin.php" method="post">
    <input type="hidden" name="command" value="insert">
    <tr><th>追加</th>
    <th><input type="text" name="b_name" style="width:500px"></th>
    <th><input type="text" name="b_author" style="width:500px"></th>
    <th><select name="b_type"><option value="01:文庫">01:文庫</option><option value="02:絵本">02:絵本</option><option value="03:雑誌">03:雑誌</option><option value="99:その他">99:その他</option>
    <th><select name="b_shelf"><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option>
    <th><select name="b_on"><option value="在架">在架</option><option value="貸出中">貸出中</option>
    <th><input type="submit" value="追加"></div></th>
</form>
</table>
<?php

function array_sel($pipe) {
    if($pipe == "01:文庫" || $pipe == "01" || $pipe == "在架") {
        $type[0] = "selected";$type[1] = "";$type[2] = ""; $type[3] ="";
    } elseif ($pipe == "02:絵本"|| $pipe == "02" || $pipe == "貸出中") {
        $type[0] = "";$type[1] = "selected";$type[2] = ""; $type[3] ="";
    } elseif ($pipe == "03:雑誌"|| $pipe == "03") {
        $type[0] = "";$type[1] = "";$type[2] = "selected"; $type[3] ="";
    } elseif ($pipe == "99:その他"|| $pipe == "04") {
        $type[0] = "";$type[1] = "";$type[2] = ""; $type[3] ="selected";
    }
    return $type;
}
?>
<?php require 'footer.php'; ?>