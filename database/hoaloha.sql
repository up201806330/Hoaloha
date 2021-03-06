.mode columns
.headers on

PRAGMA foreign_keys=OFF;

DROP TABLE IF EXISTS Answers;
DROP TABLE IF EXISTS Questions;
DROP TABLE IF EXISTS Proposals;
DROP TABLE IF EXISTS Topics;
DROP TABLE IF EXISTS PetPhotos;
DROP TABLE IF EXISTS Pets;
DROP TABLE IF EXISTS UserPhotos;
DROP TABLE IF EXISTS UserEntities;
/*DROP TABLE IF EXISTS Locations;*/
DROP TABLE IF EXISTS Photos;

PRAGMA foreign_keys=ON;

CREATE TABLE Photos(
	id        INTEGER PRIMARY KEY,
	mime_type TEXT NOT NULL,
	doc       BLOB
);


/*CREATE TABLE Locations(
	id           INTEGER PRIMARY KEY,
	City         VARCHAR(255) NOT NULL,
	postalCode   VARCHAR(255) NOT NULL
);*/

CREATE TABLE UserEntities (
	id              INTEGER PRIMARY KEY AUTOINCREMENT,
	name            VARCHAR(255) NOT NULL,
    username        VARCHAR(255) UNIQUE,
    password        VARCHAR(255) NOT NULL,
	location     	VARCHAR(255) NOT NULL,
	phoneNumber		INT NOT NULL,
	email           VARCHAR(255) NOT NULL
);

CREATE TABLE UserPhotos(
	idUser         	INTEGER REFERENCES UserEntities(id) ON DELETE CASCADE,
	idPhoto        	INTEGER REFERENCES Photos(id) ON DELETE CASCADE,
	PRIMARY KEY 	(idUser,idPhoto)
);

-- petSize type is subject to change. atm is the length of the animal
CREATE TABLE Pets(
	id          INTEGER PRIMARY KEY AUTOINCREMENT,
	name        VARCHAR(255) NOT NULL,
	species   	VARCHAR(255) NOT NULL,
	breed       VARCHAR(255) NOT NULL,
	weight      FLOAT,
	color 	    VARCHAR(255) NOT NULL,
	dimension   VARCHAR(255) NOT NULL,
	gender		VARCHAR(255) NOT NULL,
	age			INTEGER NOT NULL
);


CREATE TABLE PetPhotos(
	idPet         	INTEGER REFERENCES Pets(id) ON DELETE CASCADE,
	idPhoto        	INTEGER REFERENCES Photos(id) ON DELETE CASCADE,
	PRIMARY KEY 	(idPet,idPhoto)
);

CREATE TABLE Topics(
	id 				INTEGER PRIMARY KEY,
    idUserEntity    INTEGER NOT NULL REFERENCES UserEntities(id) ON DELETE CASCADE,
    idPet           INTEGER NOT NULL UNIQUE REFERENCES Pets(id) ON DELETE CASCADE,
	description     VARCHAR(255) NOT NULL,
	data            DATATIME NOT NULL
);

CREATE TABLE UserFavourites(
	idUser       	INTEGER REFERENCES UserEntities(id) ON DELETE CASCADE,
	idTopic      	INTEGER REFERENCES Topics(id) ON DELETE CASCADE,
	PRIMARY KEY 	(idUser,idTopic)
);

-- status either is 'P' (pending), 'A' (approved) or 'R' (refused)
CREATE TABLE Proposals(
    idUser    		INTEGER NOT NULL REFERENCES UserEntities(id) ON DELETE CASCADE,
    idTopic         INTEGER NOT NULL REFERENCES Topics(id) ON DELETE CASCADE,
	newName         VARCHAR(255),
	description     VARCHAR(255) NOT NULL,
    status          char(1) NOT NULL DEFAULT 'P' CHECK (status in ('P', 'A', 'R')),
	PRIMARY KEY 	(idUser,idTopic)
);

CREATE TABLE Questions(
    id              INTEGER PRIMARY KEY,
    idUserEntity   	INTEGER NOT NULL REFERENCES UserEntities(id) ON DELETE CASCADE,
    idTopic         INTEGER NOT NULL REFERENCES Topics(id) ON DELETE CASCADE,
    question        VARCHAR(255) NOT NULL,
	data            DATATIME NOT NULL
);

CREATE TABLE Answers(
	id        		INTEGER PRIMARY KEY,
	idUserEntity   	INTEGER NOT NULL REFERENCES UserEntities(id) ON DELETE CASCADE,
	idQuestion      INTEGER NOT NULL REFERENCES Questions(id) ON DELETE CASCADE,
	answer          VARCHAR(255) NOT NULL,
	data            DATATIME NOT NULL
);
