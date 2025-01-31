<?php require "header.php"; ?>
<?php require "menu2.php"; ?>
<table border="1" width="1000">
    <font size=6>管理者情報</font>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=kadai;charset=utf8',
             'staff', 'password');
if (isset($_REQUEST['command'])) {
    if (isset($_REQUEST['comment']) && isset($_REQUEST['id'])) {
        $sql1 = $pdo->prepare('UPDATE b_member SET comment=? WHERE id=?');
        $sql1->execute([
            htmlspecialchars($_REQUEST['comment']),
            intval($_REQUEST['id'])
        ]);
        echo $_REQUEST['id']. "のコメントを更新しました。";
    } else {
        echo '更新に失敗しました。';
    }
}

$sql=$pdo->prepare('select * from b_member where id =?');
$sql->execute([$_REQUEST['id']]);
foreach($sql as $row) {
    $id=$row['id'];
    echo '<center><tr><th>管理番号</th><th>管理者名</th><th>貸出数</th><th>返却日</th></tr></center>';
    echo '<tr><td align=right width=100>', $row['id'], '</td>';
    echo '<td align=right width=200><p>', $row['name'],'</td>';
    echo '<td align=right width=100><p>',$row['possi'],'</td>';
    echo '<td align=right width=100><p>',$row['ren_date'],'</td>';
}
?>
</table><br>
<!-- ここまで会員情報 -->

<table border="1" width="1000">
    <font size=6>貸出状況</font>
    <center><tr><th style="width:65px">貸出</th><th style="width:800px">書名</th><th>本の番号</th></tr></center>
<?php
if (isset($_REQUEST['update1'])) {
    switch ($_REQUEST['update1']) {
    case 'update1':
        if (isset($_REQUEST['ren_1'])) {
            $sql = $pdo->prepare('UPDATE b_member SET ren_date=?, ren_1=?, possi=4 WHERE id=?');
            $sql->execute([
                date("Y-m-d", strtotime("+1 week")),
                htmlspecialchars($_REQUEST['ren_1']),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="貸出中" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_1'])
            ]);
            echo $_REQUEST['id']. "の１冊目の貸出が完了しました。";
        } elseif (isset($_REQUEST['ren_2'])) {
            $sql = $pdo->prepare('UPDATE b_member SET ren_date=?, ren_2=? ,possi=3 WHERE id=?');
            $sql->execute([
                date("Y-m-d", strtotime("+1 week")),
                htmlspecialchars($_REQUEST['ren_2']),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="貸出中" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_2'])
            ]);
        } elseif (isset($_REQUEST['ren_3'])) {
            $sql = $pdo->prepare('UPDATE b_member SET ren_date=?, ren_3=? ,possi=2 WHERE id=?');
            $sql->execute([
                date("Y-m-d", strtotime("+1 week")),
                htmlspecialchars($_REQUEST['ren_3']),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="貸出中" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_3'])
            ]);
        } elseif (isset($_REQUEST['ren_4'])) {
            $sql = $pdo->prepare('UPDATE b_member SET ren_date=?, ren_4=? ,possi=1 WHERE id=?');
            $sql->execute([
                date("Y-m-d", strtotime("+1 week")),
                htmlspecialchars($_REQUEST['ren_4']),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="貸出中" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_4'])
            ]);
        } elseif (isset($_REQUEST['ren_5'])) {
            $sql = $pdo->prepare('UPDATE b_member SET ren_date=?, ren_5=? ,possi=0 WHERE id=?');
            $sql->execute([
                date("Y-m-d", strtotime("+1 week")),
                htmlspecialchars($_REQUEST['ren_5']),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="貸出中" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_5'])
            ]);
        } else {
            echo '更新に失敗しました。 rental';
        }
        break;
    case 'delete1':
        $sql = $pdo->prepare('UPDATE b_member SET ren_1=? ,possi=5 WHERE id=?');
            $sql->execute([
                htmlspecialchars("0"),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="在架" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_1'])
            ]);
            break;
    case 'delete2':
        $sql = $pdo->prepare('UPDATE b_member SET ren_2=? ,possi=4 WHERE id=?');
            $sql->execute([
                htmlspecialchars("0"),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="在架" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_2'])
            ]);
            break;
    case 'delete3':
        $sql = $pdo->prepare('UPDATE b_member SET ren_3=? ,possi=3 WHERE id=?');
            $sql->execute([
                htmlspecialchars("0"),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="在架" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_3'])
            ]);
            break;
    case 'delete4':
        $sql = $pdo->prepare('UPDATE b_member SET ren_4=? ,possi=2 WHERE id=?');
            $sql->execute([
                htmlspecialchars("0"),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="在架" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_4'])
            ]);
            break;
    case 'delete5':
        $sql = $pdo->prepare('UPDATE b_member SET ren_5=? ,possi=1 WHERE id=?');
            $sql->execute([
                htmlspecialchars("0"),
                intval($_REQUEST['id'])
            ]);
            $sql1 = $pdo->prepare('UPDATE book SET b_on="在架" WHERE b_id=?');
            $sql1->execute([
                htmlspecialchars($_REQUEST['ren_5'])
            ]);
            break;
        echo "貸出１の返却処理しました。";
        break;
    }
}
    $stmt = "SELECT book.b_id, book.b_name, b_member.ren_1, b_member.ren_2, b_member.ren_3, b_member.ren_4, b_member.ren_5
        FROM book 
        JOIN b_member ON book.b_id = b_member.ren_1 || book.b_id = b_member.ren_2 || book.b_id = b_member.ren_3 || book.b_id = b_member.ren_4 || book.b_id = b_member.ren_5";

    $stmt1 = $pdo->prepare($stmt);
    $stmt1->execute();
    $results = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $i = 1;
    $ren = "ren_$i";$delete = "delete$i";
foreach($results as $row1) {
    echo '<form class="ib" action="detail.php?id=', $id, '" method="post">';
    echo '<tr><td style="width:20px;text-align:center">貸出',$i,'</th>';
    echo '<td align=right>', $row1['b_name'],'</td>';
    echo '<td align=right ><input type="hidden" name="',$ren,'" style="width:50px" value="', $row1[$ren], '">',$row1[$ren], '</td>';
    echo '<input type="hidden" name="update1" value="',$delete,'">';
    echo '<th><input type="submit" value="返却"></td></th></form>';
    $i++;
    $ren = "ren_$i";$delete = "delete$i";
}
?>
<?php
echo '<form class="ib" action="detail.php?id=',$id, '" method="post">';
echo '<input type="hidden" name="update1" value="update1">';
echo '<tr><th>追加<th></th></th>';
echo '<th><input type="text" name="',$ren,'" style="width:50px"></th>';
echo '<th><input type="submit" value="追加"></div></th>';
echo '</form></table>';
?>

<?php require "footer.php"; ?>