<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <a href="view.php">View Corporations</a>
        <?php
        include './db-connect.php';
        include './functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone, incorp_dt = now()");

            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Corporation Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">  
            <div class="form-group">
                <label>Corporation Name</label>
                <input class="form-control" type="text" value="" name="corp" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" value="" name="email" />
            </div>
            <div class="form-group">
                <label>Zip Code</label>
                <input class="form-control" type="text" value="" name="zipcode" />
            </div>
            <div class="form-group">
                <label>Owner</label>
                <input class="form-control" type="text" value="" name="owner" />
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" type="text" value="" name="phone" />
            </div>
            <input class="btn btn-default" type="submit" value="Submit" />
            <br />
        </form>
    </body>
</html>
