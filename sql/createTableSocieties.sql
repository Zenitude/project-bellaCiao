CREATE TABLE `bellaciao`.`addresssocieties`
(
    `idAddressSociety` INT AUTO_INCREMENT,
    `streetSociety` VARCHAR(255) NOT NULL,
    `zipCodeSociety` INT(5) NOT NULL,
    `citySociety` VARCHAR(255) NOT NULL,
    `countrySociety` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idAddressSociety`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bellaciao`.`societies`
(
    `idSociety` INT AUTO_INCREMENT,
    `nameSociety` VARCHAR(255) NOT NULL,
    `phoneSociety` VARCHAR(14) NOT NULL,
    `mailSociety` VARCHAR(255) NOT NULL,
    `idAddressS` INT NOT NULL,
    PRIMARY KEY (`idSociety`),
    CONSTRAINT `FK_societies_addresssocieties` FOREIGN KEY (`idAddressS`) REFERENCES `addresssocieties` (`idAddressSociety`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;