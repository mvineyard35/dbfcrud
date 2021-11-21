<?php 
    //connect to localhost database
    $db = mysqli_connect('localhost', 'root', 'mysql', 'prjcrud');
    //connect to remote database
    //$db = mysqli_connect('remotemysql.com', '2s5LM4NnrP', 'ipHpWhushd', '2s5LM4NnrP');
    //create each join statement
    $fullJoin = mysqli_query($db, "SELECT * FROM christmas_list  JOIN detail ON christmas_list.id = detail.f_id");
    $rightOuterJoin = mysqli_query($db, "SELECT * FROM christmas_list RIGHT JOIN detail on christmas_list.id = detail.f_id");
    $leftOuterJoin = mysqli_query($db, "SELECT * FROM christmas_list LEFT JOIN detail on christmas_list.id = detail.f_id");
?>