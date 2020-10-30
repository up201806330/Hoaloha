.mode columns
.headers on

PRAGMA foreign_keys=OFF;

DROP TABLE  IF EXISTS UserEntity;
DROP TABLE  IF EXISTS PetPosting;
DROP TABLE  IF EXISTS Photo;
DROP TABLE  IF EXISTS AdoptionProposal;
DROP TABLE  IF EXISTS PetQuestions;

PRAGMA foreign_keys=ON;

CREATE TABLE UserEntity (
    username        VARCHAR(255) PRIMARY KEY,
    password        VARCHAR(255) NOT NULL   ,
    photo           INT          NOT NULL REFERENCES Photo(id) ON UPDATE CASCADE,    
);

-- petSize type is subject to change. atm is the length of the animal
-- location as a varchar(255) or a table itself ?
CREATE TABLE PetPosting (
    user            VARCHAR(255) NOT NULL REFERENCES UserEntity(name) ON UPDATE CASCADE,
    petName         VARCHAR(255) NOT NULL   ,
    species         VARCHAR(255) NOT NULL   ,
    petSize         INT          NOT NULL   ,
    color           VARCHAR(255) NOT NULL   ,
    photo           INT          NOT NULL REFERENCES Photo(id) ON UPDATE CASCADE,
    location        VARCHAR(255) NOT NULL   ,
    PRIMARY KEY (user, petName),
);

-- temporary. how to store image in sqlite? or is it even needed?
CREATE TABLE Photo (
    id              INT          PRIMARY KEY,
    image           BLOB                    ,
);

-- status either is 'P' (pending), 'A' (accepted) or 'R' (refused)
CREATE TABLE AdoptionProposal (
    id              INT          PRIMARY KEY,
    user            VARCHAR(255) NOT NULL REFERENCES UserEntity(name) ON UPDATE CASCADE,
    pet             VARCHAR(255) NOT NULL REFERENCES PetPosting(name) ON UPDATE CASCADE,
    status          char(1)      NOT NULL DEFAULT 'P' CHECK (status in ('P', 'A', 'R'))  ,
);

-- necessary?
CREATE TABLE PetQuestions (
    id              INT          PRIMARY KEY,
    user            VARCHAR(255) NOT NULL REFERENCES UserEntity(name) ON UPDATE CASCADE,
    pet             VARCHAR(255) NOT NULL REFERENCES PetPosting(name) ON UPDATE CASCADE,
    question        VARCHAR(255) NOT NULL,
);