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
DROP TABLE IF EXISTS Species;

PRAGMA foreign_keys=ON;

CREATE TABLE Locations(
	id           INT PRIMARY KEY,
	City         VARCHAR(255) NOT NULL,
	postalCode   VARCHAR(255) NOT NULL
);

CREATE TABLE Species(
	id      INT PRIMARY KEY,
	name 	VARCHAR(255) NOT NULL
);

CREATE TABLE UserEntities (
	id              INT PRIMARY KEY,
    username        VARCHAR(255) UNIQUE,
    password        VARCHAR(255) NOT NULL,
    photo         	BLOB ,  
	idLocation      VARCHAR(255) ,
	phoneNumber		INT NOT NULL,
	email           VARCHAR(255) NOT NULL
);

-- petSize type is subject to change. atm is the length of the animal
CREATE TABLE Pets(
	id          INT PRIMARY KEY,
	name        VARCHAR(255) NOT NULL,
	idSpecies   INT NOT NULL REFERENCES Species(id),
	weight      FLOAT,
	color 	    VARCHAR(255) NOT NULL,
	dimension   FLOAT,
	photo 		BLOB
);

CREATE TABLE Topics(
    idUserEntity    INT NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
    idPet           INT NOT NULL UNIQUE REFERENCES Pets(id) ON UPDATE CASCADE,
	description     VARCHAR(255) NOT NULL,
    PRIMARY KEY (idUserEntity, idPet)
);

-- status either is 'P' (pending), 'A' (accepted) or 'R' (refused)
CREATE TABLE Proposals(
    id              INT PRIMARY KEY,
    idUserEntity    INT NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
    idTopic          INT NOT NULL REFERENCES Topics(id) ON UPDATE CASCADE,
    status          char(1) NOT NULL DEFAULT 'P' CHECK (status in ('P', 'A', 'R'))
);

CREATE TABLE Questions(
    id              INT PRIMARY KEY,
    idUserEntity   INT NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
    idTopic          INT NOT NULL REFERENCES Topics(id) ON UPDATE CASCADE,
    question        VARCHAR(255) NOT NULL
);

CREATE TABLE Answers(
	id        		INT PRIMARY KEY,
	idUserEntity   INT NOT NULL REFERENCES UserEntities(id) ON UPDATE CASCADE,
	idQuestion      INT NOT NULL REFERENCES Questions(id) ON UPDATE CASCADE,
	answer          VARCHAR(255) NOT NULL
);
