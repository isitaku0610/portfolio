-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-09-16 08:21:33
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_author` varchar(20) NOT NULL,
  `b_type` varchar(8) NOT NULL,
  `b_shelf` varchar(2) NOT NULL,
  `b_on` varchar(6) NOT NULL DEFAULT '在架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_author`, `b_type`, `b_shelf`, `b_on`) VALUES
(1, 'グラスホッパー', '伊坂幸太郎', '01:文庫', '01', '貸出中'),
(2, 'おたすけこびと', '文：なかがわ ちひろ  絵：コヨセ・ジュ', '02:絵本', '02', '貸出中'),
(3, 'じゃあじゃあびりびり', 'まつい のりこ', '02:絵本', '02', '在架'),
(4, 'だるまさんが', 'かがくい ひろし', '02:絵本', '02', '在架'),
(5, 'おつきさまこんばんは', '林 明子', '02:絵本', '02', '貸出中'),
(6, 'こんとあき', '林 明子', '02:絵本', '02', '在架'),
(7, 'Ｖジャンプ　2024年11月号', '集英社', '03:雑誌', '03', '在架'),
(8, '美的GRAND2024秋号', '小学館', '03:雑誌', '03', '在架'),
(9, 'ターザン　2024年9月26日号', 'マガジンハウス', '03:雑誌', '03', '在架'),
(10, 'ａｎａｎ（アンアン）　2024年9月18日号', 'マガジンハウス', '03:雑誌', '03', '貸出中'),
(11, '透明な螺旋', '東野圭吾', '01:文庫', '01', '在架'),
(12, '探花', '今野敏', '01:文庫', '01', '在架'),
(13, '母の待つ里', '浅田次郎', '01:文庫', '01', '在架'),
(14, 'オッペンハイマー', '監督：クリストファー・ノーラン', '99:その他', '04', '在架'),
(15, '君たちはどう生きるか', '監督：宮崎駿', '99:その他', '04', '在架'),
(16, '52ヘルツのクジラたち', '監督：成島出', '99:その他', '04', '在架'),
(17, '勘定侍柳生真剣勝負 8', '上田秀人', '01:文庫', '01', '在架'),
(18, '+act. ( プラスアクト )　2024年10月号', 'ワニブックス', '03:雑誌', '03', '在架'),
(19, 'Ｍｙｏｊｏ（ミョージョー）増刊　ちっこいＭｙｏｊｏ　2024年11月号', '集英社', '03:雑誌', '03', '在架'),
(20, 'くだもの', '平山 和子', '02:絵本', '02', '在架'),
(21, 'からすのパンやさん', 'かこ さとし', '02:絵本', '02', '在架'),
(22, 'ヤングジャンプ　2024年9月26日号', '集英社', '03:雑誌', '03', '在架'),
(23, '笑うマトリョーシカ', '早見和真', '01:文庫', '01', '在架'),
(24, 'スリジエセンター1991', '海堂尊', '01:文庫', '01', '在架'),
(25, '映画ドラえもん のび太の地球交響楽', '監督：今井一暁', '99:その他', '04', '在架'),
(26, 'ベイマックス', '監督：ドン・ホール、クリス・ウィリアム', '99:その他', '04', '在架'),
(27, '翔んで埼玉 ～琵琶湖より愛をこめて～', '監督：武内英樹', '99:その他', '04', '在架'),
(28, 'ＢＡＩＬＡ（バイラ）　2024年10月号', '集英社', '03:雑誌', '03', '在架'),
(29, 'フェイクフィクション', '誉田哲也', '01:文庫', '01', '在架'),
(30, '傲慢と善良', '辻村深月', '01:文庫', '01', '在架');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
