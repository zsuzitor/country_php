
name DB - bd_inter_v
using in files(mysqli_connect): index.php,add_new_country.php

table:

CREATE TABLE `countries` (`id` INT(5) NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `number_of_cities` INT(30) NOT NULL, `population` INT(30) NOT NULL, `monarchy` BIT(1) NOT NULL, PRIMARY KEY(`id`));
	