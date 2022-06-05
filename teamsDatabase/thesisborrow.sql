CREATE TABLE thesisborrow(
	borrowId INT PRIMARY KEY AUTO_INCREMENT,
    borrowRequestId INT NOT NULL,
    borrowDateReturn DATETIME,
    borrowRemark VARCHAR(255) DEFAULT 'in borrowed',
    borrowStamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (borrowRequestId) REFERENCES thesisrequest(requestId)
);

SELECT * FROM db_teams.thesisborrow;