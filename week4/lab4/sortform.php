<?php
include_once './functions.php';

$columnselect = "";
$sortvalue = "";

if (isGetRequest()) {
    $columnselect = filter_input(INPUT_GET, 'column');
    $sortvalue = filter_input(INPUT_GET, 'sorting');
}
?>

<form action="#" method="get">
    <div class="form-group">
    <fieldset>
        <label>Group by:</label>
        <select class="form-control" name="column">
            <option value="corp" <?php if ($columnselect === "corp"): ?> selected=selected <?php endif; ?>>Corporation</option>
            <option value="incorp_dt" <?php if ($columnselect === "incorp_dt"): ?> selected=selected <?php endif; ?>>Date Added</option>
            <option value="email" <?php if ($columnselect === "email"): ?> selected=selected <?php endif; ?>>Email</option>
            <option value="zipcode" <?php if ($columnselect === "zipcode"): ?> selected=selected <?php endif; ?>>Zip Code</option>
            <option value="owner" <?php if ($columnselect === "owner"): ?> selected=selected <?php endif; ?>>Owner</option>
            <option value="phone" <?php if ($columnselect === "phone"): ?> selected=selected <?php endif; ?>>Phone</option>
        </select>
        <br><br>
        <div class="form-group">
        <label class="radio-inline">Ascending</label>
        <input type="radio" name="sorting" value="asc" <?php if ($sortvalue == "asc"): ?> checked="checked" <?php endif?> />
        <label class="radio-inline">Descending</label>
        <input type="radio" name="sorting" value="desc" <?php if ($sortvalue == "desc"): ?> checked="checked" <?php endif?> />
        <br><br>
        <input type="hidden" name="action" value="sort" />
        <input class="btn btn-primary" type="submit" value="Submit" />
        <input class="btn btn-warning" type="reset" value="Reset" />
        </div>
    </fieldset>
    </div>
</form>