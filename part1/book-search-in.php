<?php require "header.php"; ?>
<?php require "menu2.php"; ?>
どれか一つ選んで入力してください。
<form action="book-search-out.php" method="post">
    <input type="text" name="name" style="width:300px"><br>
        <br>
        <input type="radio" name="search" value="b_name" checked="checked">書名 
        <input type="radio" name="search" value="b_author">著名 
        <input type="radio" name="search" value="b_shelf">本棚
        <br>
        <input type="submit" value="検索"><br>
    </form>
    <!-- <img src="image/booksearch.jpg" width="45%" height="45%"> -->
<?php require "footer.php"; ?>
