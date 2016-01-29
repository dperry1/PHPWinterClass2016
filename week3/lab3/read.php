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
        
        $id = filter_input(INPUT_GET, 'id');

        $stmt = $db->prepare("SELECT * FROM corps where id = :id");
        
        $binds = array(
            ":id" => $id
        );

        $result = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>

        <?php if (isset($result)): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Corporation Name</th>
                    <th>Date Added</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
                <tr>
                    <td><?php echo $result['corp']; ?></td>
                    <td><?php echo date("m/d/Y",strtotime($result['incorp_dt'])); ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['zipcode']; ?></td>
                    <td><?php echo $result['owner']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td><a href="update.php?id=<?php echo $result['id'];?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $result['id'];?>">Delete</a></td>
                </tr>
        </table>
        <?php endif; ?>
        <a href="view.php?id=<?php echo $result['id'];?>">View Corporations</a>
    </body>
</html>
