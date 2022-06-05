CREATE TABLE thesisLibrary (
	bookId INT PRIMARY KEY AUTO_INCREMENT,
    bookCover VARCHAR(191) DEFAULT "bookdefaultcover.png",
    bookCategory VARCHAR(191) DEFAULT "general",
    bookProgram VARCHAR(191)NOT NULL,
    bookAbstract LONGTEXT,
    bookTitle VARCHAR(191) UNIQUE NOT NULL,
    bookAuthor VARCHAR(191) NOT NULL,
    bookProfessor VARCHAR(191),
    bookPublished DATE NOT NULL,
    bookStatus VARCHAR(50) DEFAULT "available",
    bookStamp DATETIME DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM db_teams.thesislibrary;