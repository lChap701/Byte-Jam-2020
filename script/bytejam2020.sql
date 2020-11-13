/* CREATE DATABASE statements */
-- Creates the database
CREATE DATABASE IF NOT EXISTS ByteJam2020;

/* Note: You should write "use ByteJam2020" before creating tables */

/* CREATE TABLE statements */
-- Accounts Table
CREATE TABLE IF NOT EXISTS Accounts (
    accId INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL
) ENGINE = innoDB;

-- Candidates Table
CREATE TABLE IF NOT EXISTS Candidates (
    canId INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    party VARCHAR(11) NOT NULL
) ENGINE = innoDB;

-- ElectionResults Table 
CREATE TABLE IF NOT EXISTS ElectionResults (
    resId INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    canId INT UNSIGNED NOT NULL,
    FOREIGN KEY (canId) REFERENCES Candidates(canId),
    st VARCHAR(20) NOT NULL,  -- state column including District of Columbia
    popVotes DECIMAL(3,2) NOT NULL, -- converts the percent to a decimal
    electVotes TINYINT CHECK (electVotes <= 55 AND electVotes >= 0) NOT NULL
) ENGINE = innoDB;

/* INSERT statements */
-- Candidates Table
INSERT INTO Candidates 
VALUES (1, "John Smith", "Democrat");

INSERT INTO Candidates 
VALUES (2, "Andy Andrew", "Independent");

INSERT INTO Candidates 
VALUES (3, "Kevin Stevens", "Republican");

-- ElectionResults Table
INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Alabama", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Alabama", 0.58, 9);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Alabama", 0.42, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Alaska", 0.86, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Alaska", 0.11, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Alaska", 0.03, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Arizona", 0.71, 11);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Arizona", 0, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Arizona", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Arkanas", 0.71, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Arkanas", 0, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Arkanas", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "California", 0.59, 55);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "California", 0.29, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "California", 0.12, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Colorado", 0.95, 9);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Colorado", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Colorado", 0.04, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Connecticut", 0.60, 7);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Connecticut", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Connecticut", 0.30, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Delaware", 0.32, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Delaware", 0.15, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Delaware", 0.53, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "District of Columbia", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "District of Columbia", 0.48, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "District of Columbia", 0.51, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Florida", 0.14, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Florida", 0.37, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Florida", 0.49, 29);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Georgia", 0.22, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Georgia", 0.26, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Georgia", 0.52, 16);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Hawaii	", 0.71, 4);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Hawaii	", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Hawaii	", 0.19, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Idaho", 0.95, 4);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Idaho", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Idaho", 0.04, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Illinois", 0.46, 20);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Illinois", 0.17, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Illinois", 0.37, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Indiana", 0.92, 11);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Indiana", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Indiana", 0.07, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Iowa", 0.23, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Iowa", 0.62, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Iowa", 0.15, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Kansas", 0.44, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Kansas", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Kansas", 0.32, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Kentucky", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Kentucky", 0.58, 8);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Kentucky", 0.42, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Louisiana", 0.86, 8);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Louisiana", 0.11, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Louisiana", 0.03, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Maine", 0.71, 4);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Maine", 0, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Maine", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Maryland", 0.59, 10);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Maryland", 0.29, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Maryland", 0.12, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Massachusetts", 0.95, 11);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Massachusetts", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Massachusetts", 0.04, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Michigan", 0.60, 16);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Michigan", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Michigan", 0.30, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Minnesota", 0.32, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Minnesota", 0.15, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Minnesota", 0.53, 10);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Mississippi", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Mississippi", 0.48, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Mississippi", 0.51, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Missouri", 0.14, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Missouri", 0.37, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Missouri", 0.49, 10);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Montana", 0.22, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Montana", 0.26, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Montana", 0.52, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Nevada", 0.71, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Nevada", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Nevada", 0.19, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Nebraska", 0.71, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Nebraska", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Nebraska", 0.19, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "New Hampshire", 0.95, 4);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "New Hampshire", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "New Hampshire", 0.04, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "New Jersey", 0.46, 14);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "New Jersey", 0.17, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "New Jersey", 0.37, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "New Mexico", 0.92, 5);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "New Mexico", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "New Mexico", 0.07, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "New York", 0.23, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "New York", 0.62, 29);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "New York", 0.15, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "North Carolina", 0.44, 15);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "North Carolina", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "North Carolina", 0.32, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "North Dakota", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "North Dakota", 0.58, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "North Dakota", 0.42, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Ohio", 0.86, 18);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Ohio", 0.11, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Ohio", 0.03, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Oklahoma", 0.71, 7);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Oklahoma", 0, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Oklahoma", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Oregon", 0.59, 	7);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Oregon", 0.29, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Oregon", 0.12, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Pennsylvania", 0.95, 20);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Pennsylvania", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Pennsylvania", 0.04, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Rhode Island", 0.60, 4);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Rhode Island", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Rhode Island", 0.30, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "South Carolina", 0.32, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "South Carolina", 0.15, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "South Carolina", 0.53, 9);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "South Dakota", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "South Dakota", 0.48, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "South Dakota", 0.51, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Tennessee", 0.14, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Tennessee", 0.37, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Tennessee", 0.49, 11);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Texas", 0.22, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Texas", 0.26, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Texas", 0.52, 38);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Utah", 0.71, 6);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Utah", 0.10, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Utah", 0.19, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Vermont", 0.95, 3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Vermont", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Vermont", 0.04, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Virginia", 0.46, 13);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Virginia", 0.17, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Virginia", 0.37, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Washington", 0.92, 12);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Washington", 0.01, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Washington", 0.07, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "West Virginia", 0.23, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "West Virginia", 0.62, 5);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "West Virginia", 0.15, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Wisconsin", 0.44, 10);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Wisconsin", 0.24, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Wisconsin", 0.32, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (1, "Wyoming", 0.59, 	3);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (2, "Wyoming", 0.29, 0);

INSERT INTO ElectionResults (canId, st, popVotes, electVotes)
VALUES (3, "Wyoming", 0.12, 0);