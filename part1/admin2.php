<?php
// データベースへの接続設定
$pdo = new PDO('mysql:host=localhost;dbname=kadai;charset=utf8', 'staff', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラー表示の設定

// リクエストのコマンドに基づいて処理を実行
if (isset($_REQUEST['command'])) {
    try {
        switch ($_REQUEST['command']) {
            case 'update':
                if (isset($_REQUEST['b_name']) && isset($_REQUEST['b_author']) && isset($_REQUEST['b_type']) && isset($_REQUEST['b_shelf']) && isset($_REQUEST['id'])) {
                    // 更新処理
                    $sql = $pdo->prepare('UPDATE rental_book SET b_name=?, b_author=?, b_type=?, b_shelf=? WHERE b_id=?');
                    $sql->execute([
                        htmlspecialchars($_REQUEST['b_name']),
                        htmlspecialchars($_REQUEST['b_author']),
                        htmlspecialchars($_REQUEST['b_type']),
                        htmlspecialchars($_REQUEST['b_shelf']),
                        intval($_REQUEST['id'])
                    ]);
                    echo "Update successful";
                } else {
                    echo 'Required fields are missing.';
                }
                break;

            case 'insert':
                if (isset($_REQUEST['b_name']) && isset($_REQUEST['b_author']) && isset($_REQUEST['b_type']) && isset($_REQUEST['b_shelf'])) {
                    // 挿入処理
                    $sql = $pdo->prepare('INSERT INTO rental_book (b_name, b_author, b_type, b_shelf) VALUES (?, ?, ?, ?)');
                    $sql->execute([
                        htmlspecialchars($_REQUEST['b_name']),
                        htmlspecialchars($_REQUEST['b_author']),
                        htmlspecialchars($_REQUEST['b_type']),
                        htmlspecialchars($_REQUEST['b_shelf'])
                    ]);
                    echo "Insert successful";
                } else {
                    echo 'Required fields are missing.';
                }
                break;

            case 'delete':
                if (isset($_REQUEST['id'])) {
                    // 削除処理
                    $sql = $pdo->prepare('DELETE FROM rental_book WHERE b_id=?');
                    $sql->execute([intval($_REQUEST['id'])]);
                    echo "Delete successful";
                } else {
                    echo 'ID is missing.';
                }
                break;

            default:
                echo 'Unknown command';
                break;
        }
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}

// データベースからのデータ取得と表示
try {
    foreach ($pdo->query('SELECT * FROM rental_book') as $row) {
        echo '<form class="ib" action="admin2.php" method="post">';
        echo '<input type="hidden" name="command" value="update">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['b_id']) . '">';
        echo '<div class="td0">' . htmlspecialchars($row['b_id']) . '</div>';
        echo '<div class="td1"><input type="text" name="b_name" value="' . htmlspecialchars($row['b_name']) . '"></div>';
        echo '<div class="td1"><input type="text" name="b_author" value="' . htmlspecialchars($row['b_author']) . '"></div>';
        echo '<div class="td1"><input type="text" name="b_type" value="' . htmlspecialchars($row['b_type']) . '"></div>';
        echo '<div class="td1"><input type="text" name="b_shelf" value="' . htmlspecialchars($row['b_shelf']) . '"></div>';
        echo '<div class="td2"><input type="submit" value="更新"></div>';
        echo '</form>';
        
        echo '<form class="ib" action="admin2.php" method="post">';
        echo '<input type="hidden" name="command" value="delete">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['b_id']) . '">';
        echo '<input type="submit" value="削除">';
        echo '</form><br>';
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>

<form action="admin2.php" method="post">
    <input type="hidden" name="command" value="insert">
    <div class="td0"></div>
    <div class="td1"><input type="text" name="b_name"></div>
    <div class="td1"><input type="text" name="b_author"></div>
    <div class="td1"><input type="text" name="b_type"></div>
    <div class="td1"><input type="text" name="b_shelf"></div>
    <div class="td2"><input type="submit" value="追加"></div>
</form>
