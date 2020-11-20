.mode columns
.headers on

PRAGMA foreign_keys=OFF;

DROP TABLE IF EXISTS Answers;
DROP TABLE IF EXISTS Questions;
DROP TABLE IF EXISTS Proposals;
DROP TABLE IF EXISTS Topics;
DROP TABLE IF EXISTS Pets;
DROP TABLE IF EXISTS UserEntities;
DROP TABLE IF EXISTS Locations;

PRAGMA foreign_keys=ON;

CREATE TABLE Locations(
	id           INTEGER PRIMARY KEY,
	City         VARCHAR(255) NOT NULL,
	postalCode   VARCHAR(255) NOT NULL
);

CREATE TABLE UserEntities (
	id              INTEGER PRIMARY KEY AUTOINCREMENT,
    username        VARCHAR(255) UNIQUE,
    password        VARCHAR(255) NOT NULL,
    photo         	BLOB ,  
	idLocation      VARCHAR(255) ,
	phoneNumber		INT NOT NULL,
	email           VARCHAR(255) NOT NULL
);

-- petSize type is subject to change. atm is the length of the animal
CREATE TABLE Pets(
	id          INTEGER PRIMARY KEY AUTOINCREMENT,
	name        VARCHAR(255) NOT NULL,
	species   	VARCHAR(255) NOT NULL,
	weight      FLOAT,
	color 	    VARCHAR(255) NOT NULL,
	dimension   FLOAT,
	photo 		BLOB
);

CREATE TABLE Topics(
    idUserEntity    INTEGER NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
    idPet           INTEGER NOT NULL UNIQUE REFERENCES Pets(id) ON UPDATE CASCADE,
	description     VARCHAR(255) NOT NULL,
    PRIMARY KEY (idUserEntity, idPet)
);

-- status either is 'P' (pending), 'A' (accepted) or 'R' (refused)
CREATE TABLE Proposals(
    id              INTEGER PRIMARY KEY,
    idUserEntity    INTEGER NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
    idTopic          INTEGER NOT NULL REFERENCES Topics(id) ON UPDATE CASCADE,
    status          char(1) NOT NULL DEFAULT 'P' CHECK (status in ('P', 'A', 'R'))
);

CREATE TABLE Questions(
    id              INTEGER PRIMARY KEY,
    idUserEntity   INTEGER NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
    idTopic          INTEGER NOT NULL REFERENCES Topics(id) ON UPDATE CASCADE,
    question        VARCHAR(255) NOT NULL
);

CREATE TABLE Answers(
	id        		INTEGER PRIMARY KEY,
	idUserEntity   INTEGER NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
	idQuestion      INTEGER NOT NULL REFERENCES Questions(id) ON UPDATE CASCADE,
	answer          VARCHAR(255) NOT NULL
);
