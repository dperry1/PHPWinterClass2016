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

        $db = getDatabase();

        $result = '';
        if (isPostRequest()) {
            $id = filter_input(INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            $stmt = $db->prepare("UPDATE corps SET corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");

            $binds = array(
                ":id" => $id,
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = 'Record updated';
            }
        } else {
            $id = filter_input(INPUT_GET, 'id');
        }
        $stmt = $db->prepare("SELECT * FROM corps where id = :id");
        $binds = array(
            ":id" => $id
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        if (!isset($id)) {
            die('Record not found');
        }
        $corp = $results['corp'];
        ?>

        <h1><?php echo $result; ?></h1>

        <form method="post" action="#">
            <div class="form-group">
                <label>Corporation Name</label>
                <input class="form-control" type="text" value="<?php echo $results['corp']; ?>" name="corp" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" value="<?php echo $results['email']; ?>" name="email" />
            </div>
            <div class="form-group">
                <label>Zip Code</label>
                <input class="form-control" type="text" value="<?php echo $results['zipcode']; ?>" name="zipcode" />
            </div>
            <div class="form-group">
                <label>Owner</label>
                <input class="form-control" type="text" value="<?php echo $results['owner']; ?>" name="owner" />
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" type="text" value="<?php echo $results['phone']; ?>" name="phone" />
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
            <br />
        </form>
    </body>
</html>
