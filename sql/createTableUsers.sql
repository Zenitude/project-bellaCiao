CREATE TABLE `bellaciao`.`addressusers`
(
    `idAddressUser` INT AUTO_INCREMENT,
    `streetUser` VARCHAR(255) NOT NULL,
    `zipCodeUser` INT(5) NOT NULL,
    `cityUser` VARCHAR(255) NOT NULL,
    `contryUser` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idAddressUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bellaciao`.`users`
(
    `id` INT AUTO_INCREMENT,
    `lastname` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(14) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `typeUser` BOOLEAN DEFAULT 0,
    `idAddressU` INT NOT NULL,
    `idSocietyU` INT NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_users_addressusers` FOREIGN KEY (`idAddressU`) REFERENCES `addressusers` (`idAddressUser`),
    CONSTRAINT `FK_users_societies` FOREIGN KEY (`idSocietyU`) REFERENCES `societies` (`idSociety`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;