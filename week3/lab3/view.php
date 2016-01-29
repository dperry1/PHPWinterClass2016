<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <a href="create.php">Add New Corporation</a>
        <?php
        /*
         * Connect to database and functions
         */
        include './db-connect.php';
        include './functions.php';
        
        /*
         * Store database in variable
         */
        $db = getDatabase();

        $stmt = $db->prepare("SELECT id, corp FROM corps");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Corporation Name</th>
                </tr>
            </thead>
            
            <?php
            /*
             * Use for each loop to display the results in rows
             */
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['id'];?>">Read</a></td>
                    <td><a href="update.php?id=<?php echo $row['id'];?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
