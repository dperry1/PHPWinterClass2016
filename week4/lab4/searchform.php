<?php
include_once './functions.php';

$searchcolumn = "";

if(isGetRequest()){
    $searchcolumn = filter_input(INPUT_GET, 'searchcolumn');
    $search = filter_input(INPUT_GET, 'search');
}
?>

<form action="#" method="get">
    <div class="form-group">
    <fieldset>
        <label>Search in:</label>
        <select class="form-control" name="searchcolumn">
            <option value="corp" <?php if ($searchcolumn === "corp"): ?> selected=selected <?php endif; ?>>Corporation</option>
            <option value="incorp_dt" <?php if ($searchcolumn === "incorp_dt"): ?> selected=selected <?php endif; ?>>Date Added</option>
            <option value="email" <?php if ($searchcolumn === "email"): ?> selected=selected <?php endif; ?>>Email</option>
            <option value="zipcode" <?php if ($searchcolumn === "zipcode"): ?> selected=selected <?php endif; ?>>Zip Code</option>
            <option value="owner" <?php if ($searchcolumn === "owner"): ?> selected=selected <?php endif; ?>>Owner</option>
            <option value="phone" <?php if ($searchcolumn === "phone"): ?> selected=selected <?php endif; ?>>Phone</option>
        </select>
        <br><br>
        <div class="form-group">
        <input class="form-control" type="text" name="search" placeholder="<?php if ($search != ""){echo $search;} ?>" />
        </div>
        <div class="form-group">
        <input type="hidden" name="action" value="search" />
        <input class="btn btn-primary" type="submit" value="Submit" />
        <input class="btn btn-warning" type="reset" value="Reset" />
        </div>
    </fieldset>
    </div>
</form>