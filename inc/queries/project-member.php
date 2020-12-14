<!--Project Member List Query-->
<?php
$sql1 = "SELECT *
        FROM project
        ";

$sql2 = "SELECT *
        FROM student;
        ";

//Fetch Projects
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {

    echo "<h2>Members per Project</h2>";
    $i = 0;
    //Display tables per project
    while ($row1 = mysqli_fetch_assoc($result1)) {

        echo "<h3>" . $row1["project_title"] . "</h3>";

        //Display table headers
        echo "
                <table class='results-table'>
                    <thead>
                        <th> Student ID
                        </th>
                        <th> Student Name
                        </th>
                    </thead>

                    <tbody>
            ";

        //Fetch Supervisors
        $result2 = $con->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                if ($row2["project_no"] == $row1["project_no"]) {
                    echo "<tr>";
                    echo "<td>" . $row2["student_id"] . "</td>";
                    echo "<td>" . $row2["student_name"] . "</td>";
                    echo "</tr>";
                    $i++;
                }
            }
        }
        echo "

        </tbody>

    </table>
    ";

    }

    
    echo "<h2>Query complete, fetched " . $i . " result(s).</h2>";
    
} else if ($con->error) {
    printf("Query failed: %s\n", $con->error);
} else {

    echo "No results!";
}
?>