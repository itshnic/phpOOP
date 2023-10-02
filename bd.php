Создать:
CREATE TABLE `users`
(
`id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(50) NOT NULL ,
`login` VARCHAR(50) NOT NULL ,
`pass` VARCHAR(64) NOT NULL ,
`is_admin` INT NULL DEFAULT '0' ,
PRIMARY KEY (`id`),
INDEX (`login`)
) ENGINE = InnoDB;

Добавить:
INSERT INTO `users`
(`id`, `name`, `login`, `pass`, `is_admin`)
VALUES
(NULL, 'roman', 'admin', '123', '0');

Изменить:
SET `name`='Roman',`login`='555'
WHERE
`id`='2'; меняет данные у id=2

Удаление:
DELETE FROM users WHERE `users`.`id` = 2"