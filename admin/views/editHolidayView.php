<?php require '../../db/db.php'; ?>

<h3>Holiday Edit From</h3>
<form action="" method="POST">
    <div class="form-group">
        <label> Holiday Date </label>
        <input type="date" class="form-control" name="holidayDate" value="<?php echo $holidayData['holidayDate'] ?>">
    </div>

    <div class="form-group">
        <label> Description </label>
        <input type="text" class="form-control" name="description"  value="<?php echo $holidayData['description'] ?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>