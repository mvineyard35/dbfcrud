  
<?php
    

    //connect to local host database
    $db = mysqli_connect('localhost', 'root', 'mysql', 'prjcrud');
    //connect to remote database
    //$db = mysqli_connect('remotemysql.com', '2s5LM4NnrP', 'ipHpWhushd', '2s5LM4NnrP');

    //create christmas list table
    $createList = "CREATE TABLE IF NOT EXISTS christmas_list (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),
        item VARCHAR(15) NOT NULL UNIQUE,
        person VARCHAR(15) NOT NULL,
        relation VARCHAR(15) NOT NULL)";
    //create details table
    $createDetail = "CREATE TABLE IF NOT EXISTS detail (
        place VARCHAR(15) NOT NULL,
        price INT(5) NOT NULL,
        purchased VARCHAR(3) NOT NULL,
        f_id INT UNSIGNED UNIQUE)";
    //add foreign key constraints
    $alterDetail = "ALTER TABLE detail ADD KEY f_id (f_id)";
    $addConstraint = "ALTER TABLE detail ADD CONSTRAINT detail_ibfk_1 FOREIGN KEY(f_id) REFERENCES christmas_list(id) ON DELETE RESTRICT";

    //execute create and constrain commands
    $db->query($createList);
    $db->query($createDetail);
    $db->query($alterDetail);
    $db->query($addConstraint);


    //insert data into christmas list table
    $dbL = "INSERT INTO christmas_list (item, person, relation) VALUES
    ('Laptop', 'McKenzie', 'Niece'),
    ('Airpods', 'McKenzie', 'Niece'),
    ('Phone', 'Makayla', 'Niece'),
    ('Roblox Cash', 'Makayla', 'Niece'),
    ('COD Vanguard', 'Jonathan', 'Nephew'),
    ('Xbox X', 'Jonathan', 'Nephew'),
    ('Stove', 'mom', 'mom')";

    //add information to detail table
    $dbD = "INSERT INTO detail (place, price, purchased, f_id) VALUES
    ('Best Buy', '400', 'no', (SELECT id FROM christmas_list WHERE item = 'Laptop')),
    ('Apple', '200', 'yes', (SELECT id FROM christmas_list WHERE item = 'Airpods')),
    ('Apple', '500', 'yes', (SELECT id FROM christmas_list WHERE item = 'Phone')),
    ('Apple store', '20', 'no', (SELECT id FROM christmas_list WHERE item = 'Roblox Cash')),
    ('Microsoft Store', '100', 'yes', (SELECT id FROM christmas_list WHERE item = 'COD Vanguard')),
    ('Wal-Mart', '1030', 'yes', (SELECT id FROM christmas_list WHERE item = 'Xbox X')),
    ('Kays', '900', 'yes', null)";
    //execute commands
    $db->query($dbL);
    $db->query($dbD);
    //gather information separately
    $list = mysqli_query($db, "SELECT * FROM christmas_list");
    $detail = mysqli_query($db, "SELECT * FROM detail");
    //create usable list out of the data

?>