CREATE TABLE `bellaciao`.`softwares`
(
    `idSoftware` INT AUTO_INCREMENT,
    `numberVersion` VARCHAR(255) NOT NULL,
    `dateVersion` DATE NOT NULL,
    `linkSofware` TEXT NOT NULL,
    PRIMARY KEY (`idSoftware`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bellaciao`.`downloaders`
(
    `idDownload` INT AUTO_INCREMENT,
    `idVersionSoftware` INT NOT NULL,
    `idDownloader` INT NOT NULL,
    PRIMARY KEY (`idDownload`),
    CONSTRAINT `FK_downloaders_softwares` FOREIGN KEY (`idVersionSoftware`) REFERENCES `softwares` (`idSoftware`),
    CONSTRAINT `FK_downloaders_users` FOREIGN KEY (`idDownloader`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;