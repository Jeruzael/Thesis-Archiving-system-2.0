    CREATE TABLE thesisrequest(
    	requestId INT PRIMARY KEY AUTO_INCREMENT,
        requesterId INT NOT NULL,
        requestBookId INT NOT NULL,
        requestStatus VARCHAR(255) DEFAULT "pending",
        requestStamp DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (requesterId) REFERENCES teamsuser(userId),
        FOREIGN KEY (requestBookId) REFERENCES thesisLibrary(bookId)
    );

    SELECT * FROM db_teams.thesisrequest;