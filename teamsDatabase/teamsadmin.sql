CREATE TABLE teamsadmin(
	adminId INT PRIMARY KEY AUTO_INCREMENT,
    adminFirstname VARCHAR(255) NOT NULL,
    adminLastname VARCHAR(255) NOT NULL,
    adminImage VARCHAR(255) DEFAULT "avatar_0.png",
    adminEmail VARCHAR(255) UNIQUE NOT NULL,
    adminPassword VARCHAR(255) NOT NULL,
    adminCode INT DEFAULT 0,
    adminStatus VARCHAR(255) DEFAULT "active",
    adminStamp DATETIME DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM db_teams.teamsadmin;