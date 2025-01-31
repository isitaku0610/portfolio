-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-09-16 08:22:19
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
-- テーブルの構造 `b_member`
--

CREATE TABLE `b_member` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(512) NOT NULL,
  `date` date NOT NULL,
  `possi` varchar(2) NOT NULL DEFAULT '0',
  `comment` text DEFAULT NULL,
  `ren_date` date DEFAULT NULL,
  `ren_1` int(6) DEFAULT NULL,
  `ren_2` int(6) DEFAULT NULL,
  `ren_3` int(6) DEFAULT NULL,
  `ren_4` int(6) DEFAULT NULL,
  `ren_5` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `b_member`
--

INSERT INTO `b_member` (`id`, `name`, `login`, `password`, `date`, `possi`, `comment`, `ren_date`, `ren_1`, `ren_2`, `ren_3`, `ren_4`, `ren_5`) VALUES
(1, '光川 真広', 'Masahiro', '$2y$10$wMoCsO8hU5EG7qnpe9VEOuuOETgK.mu9LkPDcRlJqhnWfgJEkn1Py', '2024-09-16', '2', '常連様で、週５で訪問されます。\r\n幅広く借りていかれますし、お話もしやすいです。', '2024-09-23', 1, 2, 10, NULL, NULL),
(2, '野元 勇介', 'Nomoto', '$2y$10$B/y2JZKg2qZTNA0pgnl3huMiGYas5.Y1ylW.U81GQdZZ4FIKzxqlK', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '大崎 直', 'Tadashi', '$2y$10$w1D4jvqpPwZYeUe/kSYeo.i8HTy0mUBvCF/RyFOqdaBlUmGI0zOqq', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '浅利 可奈子', 'Kanako', '$2y$10$bzdjngReX.RSWsqmfQw/a.i04wSjnIovQy4xZ04OrOGYawBLixhi6', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '新谷 麻美', 'Shintani', '$2y$10$yO.aixCR5EXTcNnlZEdVD.FsVa4RRYoMa69NT7MiWTwljby039DZS', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '安部 砂織', 'Abe Saori', '$2y$10$P5V/0jmz5E.Hjw.ZDAICzetpL4QHKd03YeyQ49LWGs/5u5Oenua36', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '後藤 将史', 'Masashi', '$2y$10$sf3NwsG.h06wF0KA70II1.WugcUr89kjMktD2/6MM7CyV0ZK2UwUy', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '中村 慶子', 'Keiko', '$2y$10$PAMc03hd0gflnyJOR5cbQu03nKbqWsoY2cDBdJoovWckV4nTO82R6', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '鈴木 正人', 'Masato', '$2y$10$kbn6cAAgyalYd4/NJknNSONZWiUf691QFzzWNSymOoeU8A/Q6c.Mi', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '栗田 茂之', 'Shigeyuki', '$2y$10$m4EdtcndH5wutYV6p25bzup1ji0.5sYihlG5VNpqXAtoQCW1Rqrj2', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '土橋 佳史', 'Dobashi', '$2y$10$sAIth7yAyFImJWeJ/0bu3OMUs7dDb3C1YXA0AatjDfXu6.q9J2qba', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '竹内 達也', 'Tatsuya', '$2y$10$7Hz5bFJBhL964dYvsP3ouOm3ETm/zrLxYLYAWUt8g7uafGKC.o.n2', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '西田 康晴', 'Nishida Yasuharu', '$2y$10$Neev8dfqsXn9UKEtAKWJreupQ2CQGnpiPU9NxriAN4hQDbDSK4yNe', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '高橋 隆広', 'Takahashi', '$2y$10$sLxe2ttbyCxxzhpqc9C3ueGaAKP4.zWWuwAOn5vxDoiIfTwRkgeGW', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '高橋 直宏', 'Naohiro', '$2y$10$IkgxgxobpZG5kGRoOy4B1eVWJcfyKCrExs5/zLtwg2pIwajPf2vAG', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '宮脇 敏也', 'Miyawaki', '$2y$10$SZeQmlXLapI8nQ7LsmcjSu1/0Byk5q83eNQP3hFU2Gbz/2ro4A6sm', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '丸山 美樹', 'Miki', '$2y$10$17o0EL007lbuq2Qrhx7UPO3kO.OKsH8nSjOBoKTHJH7bTupr0G.dm', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '亀山 信一', 'Kameyama', '$2y$10$EGiympF3IOYfcX9maSVG/OXQkLdviqOHoHdqSlvGCxlC7YD/kwhDu', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '牧野 香織', 'Makino', '$2y$10$lIG75VFB5v.bw1.Gd0zwB.OVOlkfkZKTonEOLaIOQ6j4XhnBGLYF2', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '水 雄太', 'Water', '$2y$10$A7SyXQcJHDd.Yd3QCjkPJ.yWwz3yw6KIszaQIBiu3E80iIZlHwyWC', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'てすと　太郎', 'tarou', '$2y$10$FmtITh9UaIpfvyIIY5h8veosPu9NwlF.jVlOf8m7PsYfJPANOm6aq', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'てすと　太郎１', '1111', '$2y$10$seeKlfC0hUeXjKMxmInLyeGhBbDiSjJKxWw9Jl4b9ertsmDUE7FK.', '2024-09-16', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `b_member`
--
ALTER TABLE `b_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ren_1` (`ren_1`,`ren_2`,`ren_3`,`ren_4`,`ren_5`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `b_member`
--
ALTER TABLE `b_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
