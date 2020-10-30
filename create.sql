.mode columns
.headers on

PRAGMA foreign_keys=OFF;


DROP TABLE  IF EXISTS UserEntity;

PRAGMA foreign_keys=ON;

CREATE TABLE UserEntity (
    username        VARCHAR(255) PRIMARY KEY,
    password        VARCHAR(255)            ,                     
);

-- petSize type is subject to change. atm is the length of the animal
CREATE TABLE Pet (
    name            VARCHAR(255) PRIMARY KEY,
    species         VARCHAR(255)            ,
    petSize         INT          NOT NULL   ,
    color           VARCHAR(255)            ,
    photo           INT          NOT NULL REFERENCES Photo(id) ON UPDATE CASCADE,
    location        INT         NOT NULL REFERENCES Location(id) ON UPDATE CASCADE, 
);

CREATE TABLE Photo (
    id              INT          PRIMARY KEY,
    -- link ?
);

CREATE TABLE Location (
    id              INT          PRIMARY KEY,
);