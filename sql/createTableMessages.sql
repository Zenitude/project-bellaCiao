CREATE TABLE `bellaciao`.`messages`
(
    `idMessage` INT AUTO_INCREMENT,
    `dateMessage` DATETIME NOT NULL,
    `contentMessage` TEXT NOT NULL,
    `idUser` INT NOT NULL,
    PRIMARY KEY (`idMessage`),
    CONSTRAINT `FK_messages_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;