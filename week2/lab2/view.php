<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <a href="add.php">Add New Data</a>
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

        $stmt = $db->prepare("SELECT * FROM actors");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DOB</th>
                    <th>Height</th>
                </tr>
            </thead>
            
            <?php
            /*
             * Use for each loop to display the results in rows
             */
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['height']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
