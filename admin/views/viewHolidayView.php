<?php
    require '../../db/db.php';
    echo '<button type="button" class="btn btn-outline-info"><a href="addHoliday" style="color:black;text-decoration:none">Add Holiday</a></button>'; 
    echo '<br>';
    echo '<br>';
    $holidayDetails = new DatabaseWork($pdo,'holidayData');
    $holidayData = $holidayDetails->findAll();
    echo '<table class="table table-hover table-responsive-sm">';
    echo '<thead>';
    echo '<tr class="table-success">';
    echo '<th scope="col">Holiday Date</th>';
    echo '<th scope="col">Description</th>';
    echo '<th scope="col">Executable Actions</th>';
    echo '</tr>';

    foreach ($holidayData as $holidayReceivedData) 
    {
        echo '<tr>';
        echo '<td  scope="row">' . $holidayReceivedData['holidayDate'] . '</td>';
        echo '<td  scope="row">' . $holidayReceivedData['description'] . '</td>';
        echo '<td >'.'<button type="button" class="btn btn-danger btn-sm"><a href="viewHoliday?holidayId='.$holidayReceivedData['holidayId'].'" style="color:white;text-decoration:none">Delete</a></button>
        <button type="button" class="btn btn-warning btn-sm"><a href="editHoliday?holidayId='.$holidayReceivedData['holidayId'].'" style="color:white;text-decoration:none">Edit</a></button>
        </td>'; 
        echo '</tr>';
    }
    echo '</thead>';
    echo '</table>';   
?>