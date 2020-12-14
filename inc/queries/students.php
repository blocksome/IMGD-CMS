<!--Students List Query-->
<?php
$sql = "SELECT * "; //Select everything
$sql .= "FROM student "; //Reading from Projects table
$sql .= "ORDER BY student_id;"; //Sort by id
$result = $con->query($sql);
if ($result->num_rows > 0) { //Output data of each row

    //Display table headers
    echo "
            <table id='results-table'>
                <thead>
                    <th> Student ID
                    </th>
                    <th> Name
                    </th>
                    <th> Contact No.
                    </th>
                    <th> Year Enrolled
                    </th>
                    <th> Graduation Date
                    </th>
                    <th> School
                    </th>
                    <th> Notebook Serial No.
                    </th>
                    <th> Project No.
                    </th>
                </thead>

                <tbody>
        ";

    $i = 0;
    //Display rows
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . $row["student_id"] . "</td>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["contact_no"] . "</td>";
        echo "<td>" . $row["enrol_year"] . "</td>";
        echo "<td>" . $row["grad_date"] . "</td>";
        echo "<td>" . $row["school"] . "</td>";
        echo "<td>" . $row["notebook_serial"] . "</td>";
        echo "<td>" . $row["project_no"] . "</td>";
        echo "</tr>";

        $i++;
    }

    echo "

        </tbody>

        <tfoot>
            <h2>Query complete, fetched " . $i . " result(s).</h2>
        </tfoot>

    </table>
    
    ";

} 

else if ($con->error){
    printf("Query failed: %s\n", $con->error);
}

else {

    echo "No results!";
    
}
?>