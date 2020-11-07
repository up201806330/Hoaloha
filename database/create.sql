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
DROP TABLE IF EXISTS Photos;

PRAGMA foreign_keys=ON;

-- temporary. how to store image in sqlite? or is it even needed?
-- maybe link to the photo is the best way, need to check with teacher
CREATE TABLE Photos(
    id              INT PRIMARY KEY,
    image          	VARCHAR(255) NOT NULL
);

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
    idPhoto         INT NOT NULL REFERENCES Photo(id) ON UPDATE CASCADE,  
	idLocation      VARCHAR(255) NOT NULL REFERENCES Locations(id),
	phoneNumber		INT NOT NULL,
	email           VARCHAR(255) NOT NULL
);

-- petSize type is subject to change. atm is the length of the animal
CREATE TABLE Pets(
	id          INT PRIMARY KEY,
	name        VARCHAR(255) NOT NULL,
	idSpecies   INT NOT NULL REFERENCES Species(id),
	weight      FLOAT NOT NULL,
	color 	    VARCHAR(255) NOT NULL,
	dimension   FLOAT NOT NULL,
	photo 		INT NOT NULL REFERENCES Photos(id)
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
