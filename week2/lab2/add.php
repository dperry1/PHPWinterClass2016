<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <a href="view.php">View Table</a>
        <?php
        include './db-connect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");

            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name<input type="text" value="" name="firstname" />
            <br />
            <br />
            Last Name<input type="text" value="" name="lastname" />
            <br />
            <br />
            Date of Birth<input type="date" value="" name="dob" />
            <br />
            <br />
            Height<input type="text" value="" name="height" />
            <br />
            <br />
            <input type="submit" value="Submit" />
            <br />
        </form>
    </body>
</html>
