-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-06-02 21:22
-- 서버 버전: 10.4.18-MariaDB
-- PHP 버전: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `diary`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL,
  `like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`, `like`) VALUES
(11, 'eunseo', '김은서', '🎈곱떡곱떡', '곱떡곱떡을 먹었다', '2021-05-30 (17:24)', 5, '곱떡곱떡.jpg', 'image/jpeg', '2021_05_30_17_24_42.jpg', 0),
(12, 'eunseo', '김은서', '✨은서의 도시락', '내가 도시락을 만들어왔다. ', '2021-05-30 (17:26)', 3, '도시락.jpg', 'image/jpeg', '2021_05_30_17_26_57.jpg', 0),
(14, 'eunseo', '김은서', '의왕 레일바이크🚲', '의왕 레일바이크를 탔다.\r\n흐아ㅏㅏㅏㅏㅏㅏㅏㅏㅏㅏㅏ\r\n너너너너너너ㅓ너너너무\r\n힘들었다\r\n그치만 한번 더 가고싶다\r\n', '2021-05-30 (17:33)', 4, '의왕레일바이크.jpg', 'image/jpeg', '2021_05_30_17_33_21.jpg', 0),
(15, 'eunseo', '김은서', '동탄 스시퐁', '여기 스시퐁 진짜 맛있다\r\n정말 맛이 있어서 아직까지 기억에 남는데ㅏㅏ\r\n대신 가격이 좀 많이 비싸다\r\n양도 적다\r\n그치만 다시 가고 싶은 맛\r\n그래서 오빠랑 몇 번 다시 가봤는데\r\n웬걸? 망했나보다 매장이 갈때마다 문이 닫혀있었다\r\n', '2021-05-30 (17:35)', 12, '동탄스시퐁.jpg', 'image/jpeg', '2021_05_30_17_35_07.jpg', 0),
(17, 'hylee', '이현준', '첫번째 글입니다.', 'hylee의 첫번째 게시물', '2021-05-30 (20:27)', 16, '', '', '', 0),
(20, 'hylee', '이현준', '주문 취소 부탁드립니다.', 'jk', '2021-05-31 (10:51)', 1, '', '', '', 0),
(27, 'eunseo', '김은서', '사진이 없는 글', '사진이 없다', '2021-06-02 (10:12)', 1, '', '', '', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `pass` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `email` char(80) DEFAULT NULL,
  `regist_day` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`num`, `id`, `pass`, `name`, `email`, `regist_day`) VALUES
(12, 'eunseo', '12345', '김은서', 'eunseo@kakao.com', '2021-05-28 (16:28)'),
(13, 'hylee', '1234', '이현준', 'hylee@kakao.com', '2021-05-29 (19:30)'),
(14, 'eunjin', '1234', '살생냥이', 'eunjin@naver.com', '2021-05-30 (20:46)');

-- --------------------------------------------------------

--
-- 테이블 구조 `message`
--

CREATE TABLE `message` (
  `num` int(11) NOT NULL,
  `send_id` char(20) NOT NULL,
  `rv_id` char(20) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `message`
--

INSERT INTO `message` (`num`, `send_id`, `rv_id`, `subject`, `content`, `regist_day`) VALUES
(8, 'eunseo', 'eunseo', '2019136034_김은서_성인학습론_수강취소 요청', '11111111111111111111', '2021-05-29 (18:21)'),
(9, 'eunseo', 'eunseo', 'RE: 2019136034_김은서_성인학습론_수강취소 요청', '\r\n\r\n----------------------------- Original Message -----------------------------\r\n11111111111111111111', '2021-05-29 (18:53)'),
(12, 'eunseo', 'eunseo', 'RE: RE: 2019136034_김은서_성인학습론_수강취소 요청', 'qqqqqqqqq\r\n\r\n----------------------------- Original Message -----------------------------\r\n\r\n&gt;\r\n&gt;----------------------------- Original Message -----------------------------\r\n&gt;11111111111111111111', '2021-05-29 (19:26)'),
(13, 'eunseo', 'eunseo', 'eunseo', 'test', '2021-05-29 (19:27)'),
(14, 'eunseo', 'eunseo', 'RE: eunseo', 'testtest\r\n\r\n----------------------------- Original Message -----------------------------\r\ntest', '2021-05-29 (19:27)'),
(15, 'hylee', 'eunseo', '은서야 사랑해', '사랑해💌💌💌💌💌', '2021-05-29 (19:31)'),
(16, 'eunseo', 'hylee', 'RE: 은서야 사랑해', '나두 사랑해😊💖💖\r\n\r\n----------------------------- Original Message -----------------------------\r\n사랑해💌💌💌💌💌', '2021-05-29 (19:33)'),
(17, 'eunjin', 'eunseo', '엽떡에 중국당면 추가', '엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가', '2021-05-30 (20:47)'),
(18, 'eunseo', 'eunjin', 'RE: 엽떡에 중국당면 추가', '방기뽕\r\n\r\n----------------------------- Original Message -----------------------------\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가\r\n엽떡에 중국당면 추가', '2021-05-30 (20:47)'),
(19, 'eunseo', 'hylee', 'ddd', 'dddd', '2021-05-31 (10:43)'),
(20, 'hylee', 'eunseo', '은서야 힘내', '힘내', '2021-06-01 (13:11)');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 테이블의 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;