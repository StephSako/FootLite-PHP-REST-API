--
-- Database: stephsako_footlite
--

-- --------------------------------------------------------

--
-- Table structure for table SUPPORTER
--

DROP TABLE IF EXISTS SUPPORTER ;
CREATE TABLE SUPPORTER (
idSupporter int(2) AUTO_INCREMENT NOT NULL,
pseudo varchar(30) NOT NULL,
password varchar(30) NOT NULL,
favoriteTeam int(4) DEFAULT NULL,
favoriteTeamName varchar(35) NOT NULL,
CONSTRAINT id_SUPPORTER_PK PRIMARY KEY (idSupporter)
);

--
-- Dumping data for table SUPPORTER
--

INSERT INTO SUPPORTER (pseudo, password, favoriteTeam, favoriteTeamName) VALUES
('stephsako', 'borussia', 4, 'Borussia Dortmund BVB 09');

--
-- Table structure for table BET
--

CREATE TABLE BET (
idBet int(4) AUTO_INCREMENT NOT NULL,
idMatch int(7) NOT NULL,
idWinner int(4) NOT NULL,
idSupporter int(2) NOT NULL,
CONSTRAINT id_BET_PK PRIMARY KEY (idBet),
CONSTRAINT Id_SUPPORTER_Fk FOREIGN KEY (idSupporter) REFERENCES SUPPORTER(idSupporter)
);

--
-- Dumping data for table BET
--

INSERT INTO BET (idMatch, idWinner, idSupporter) VALUES
(251214, 1521, 1),
(271415, 15, 1),
(271419, 1, 1),
(271414, 4, 1),
(271413, 2, 1),
(271412, 9, 1),
(271527, 24, 1),
(271440, 4, 1),
(271426, 2, 1),
(271476, 19, 1),
(271478, 9, 1),
(271515, 3, 1),
(271477, 4, 1),
(273646, 88, 1),
(271484, 4, 1),
(271486, 18, 1),
(264421, 76, 1);
