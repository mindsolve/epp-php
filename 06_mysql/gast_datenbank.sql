SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `gäste`;
CREATE TABLE `gäste` (
                         `gast_id` int(11) NOT NULL,
                         `vorname` varchar(255) NOT NULL,
                         `nachname` varchar(255) NOT NULL,
                         `beitrag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `gäste` (`gast_id`, `vorname`, `nachname`, `beitrag`) VALUES
(1, 'Florian', 'Bertel', 'Nudelsalat'),
(2, 'Kerstin', 'Janke', 'Herrencreme'),
(3, 'Robert', 'Wagner', '10 Bratwürstchen');


ALTER TABLE `gäste`
    ADD PRIMARY KEY (`gast_id`);


ALTER TABLE `gäste`
    MODIFY `gast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
