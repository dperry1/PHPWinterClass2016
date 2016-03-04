<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    </head>
    <body>
        <?php
        include_once './db-connect.php';
        include './sortform.php';
        include './searchform.php';

        $action = filter_input(INPUT_GET, 'action');
        //sorting variables
        $sortvalue = filter_input(INPUT_GET, 'sorting');
        $columnselect = filter_input(INPUT_GET, 'column');
        //searching variables
        $searchcolumn = filter_input(INPUT_GET, 'searchcolumn');
        $search = filter_input(INPUT_GET, 'search');

        //if statement determines which function to use
        if ($action == "sort") { //uses sort function
            $results = sortcorps($columnselect, $sortvalue);
        } else if ($action == "search") {//uses search function
            $results = searchcorps($searchcolumn, $search);
        } else if (!isset($action)){
            $db = getDatabase();
            
            $stmt = $db->prepare("SELECT * FROM corps");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Date Added</th>
                        <th>Email</th>
                        <th>Zip Code</th>
                        <th>Owner</th>
                        <th>Phone</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php
                    //display data
                    foreach ($results as $row):
                        ?>
                        <tr>
                            <td><?php echo $row['corp']; ?></td>
                            <td><?php echo $row['incorp_dt']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['zipcode']; ?></td>
                            <td><?php echo $row['owner']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>