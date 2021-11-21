<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "style.css">
        <!-- prjCRUD 
        Michael Vineyard
        vineyarm@csp.edu
        Assignment 3
        11/20/2021

        the index.php file had to be created so I can publish the site.
        -->
        <title>CRUD</title>
    </head>
        <body>
            
            <?php
            include 'dbfjoin.php';
            include 'dbfCreate.php';

            ?>

            <!-- create table for christmas_list -->
            <table>
                <h2>Christmas List</h2>
                <tr>
                    <td>Item</td>
                    <td>Person</td>
                    <td>Relation</td>
                </tr>
                <?php
                    //import table information
                    while($listArray = $list->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" .$listArray['item'] ."</td>";
                        echo "<td>" .$listArray['person'] ."</td>";
                        echo "<td>" .$listArray['relation'] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <!-- create table for details -->
            <table>
                <h2>Details</h2>
                <tr>
                    <td>Place</td>
                    <td>Price</td>
                    <td>Purchased</td>
                </tr>
                <?php
                    //import table information
                    while($detailArray = $detail->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" .$detailArray['place'] ."</td>";
                        echo "<td>" .$detailArray['price'] ."</td>";
                        echo "<td>" .$detailArray['purchased'] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <!-- create join table -->
            <table>
                <h2>Join</h2>
                <tr>
                    <td>Item</td>
                    <td>Person</td>
                    <td>Relation</td>
                    <td>Place</td>
                    <td>Price</td>
                    <td>Purchased</td>

                </tr>
                <?php
                //import table information
                    while($joinArray = $fullJoin->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" .$joinArray['item'] ."</td>";
                        echo "<td>" .$joinArray['person'] ."</td>";
                        echo "<td>" .$joinArray['relation'] ."</td>";
                        echo "<td>" .$joinArray['place'] ."</td>";
                        echo "<td>" .$joinArray['price'] ."</td>";
                        echo "<td>" .$joinArray['purchased'] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <!-- create left join table -->
            <table>
                <h2> Left Join</h2>
                <tr>
                    <td>Item</td>
                    <td>Person</td>
                    <td>Relation</td>
                    <td>Place</td>
                    <td>Price</td>
                    <td>Purchased</td>

                </tr>
                <?php
                    //import table data
                    while($leftArray = $leftOuterJoin->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" .$leftArray['item'] ."</td>";
                        echo "<td>" .$leftArray['person'] ."</td>";
                        echo "<td>" .$leftArray['relation'] ."</td>";                     
                        echo "<td>" .$leftArray['place'] ."</td>";
                        echo "<td>" .$leftArray['price'] ."</td>";
                        echo "<td>" .$leftArray['purchased'] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <!-- create right join table -->
            <table>
                <h2> Right Join</h2>
                <tr>
                    <td>Item</td>
                    <td>Person</td>
                    <td>Relation</td>
                    <td>Place</td>
                    <td>Price</td>
                    <td>Purchased</td>

                </tr>
                <?php
                    //import table data
                    while($rightArray = $rightOuterJoin->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" .$rightArray['item'] ."</td>";
                        echo "<td>" .$rightArray['person'] ."</td>";
                        echo "<td>" .$rightArray['relation'] ."</td>";                     
                        echo "<td>" .$rightArray['place'] ."</td>";
                        echo "<td>" .$rightArray['price'] ."</td>";
                        echo "<td>" .$rightArray['purchased'] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <!--attempt to explain joins -->
            <p>Joins are used to merge two tables of data.  The JOIN statement will merge the data from both tables and display them as one entity.  This type of join might be useful
                for something like a school where there is a regular turnover of students.  As students progress to each grade level and are assigned to new teachers, joining the two tables
                is an easy way to organize which teacher has which students to start each school year.  <br/> A LEFT JOIN merges the table on the right showing all information from the left table 
                and only the matching information from the right table.  A join like this could be useful for something like inventory management.  If a company sells a lot of products and has 
                many storage locations, such as Amazon, using a left join would show them if they're completely out of a product in all storage locations.<br/>A RIGHT JOIN will combine the two tables 
                showing all the information from the right table and only the matching information from the left table. This type of join could be useful for the similar situation as the left join.  
                It would show a company if a certain storage location is completely out of a particular product and let them know to restock that faciility so they can keep delivery times low.
            </p>
            
        </body>
</html>