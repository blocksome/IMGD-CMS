<!--Supervisor Hours List Query-->
<?php
$sql1 = "SELECT *
        FROM lecturer;
        ";

$sql2 = "SELECT *
        FROM project as p
        INNER JOIN supervisor as s
        ON p.project_no = s.project_no;
        ";

//Fetch Lecturers
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {

    echo "<h2>Supervisor Hours</h2>";
    $i = 0;
    //Display tables per lecturer
    while ($row1 = mysqli_fetch_assoc($result1)) {

        echo "<h3>" . $row1["lecturer_name"] . "</h3>";

        //Display table headers
        echo "
                <table class='results-table'>
                    <thead>
                        <th> Project
                        </th>
                        <th> Hours Supervised
                        </th>
                    </thead>

                    <tbody>
            ";

        //Fetch Hours
        $result2 = $con->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                if ($row2["lecturer_id"] == $row1["lecturer_id"]) {
                    echo "<tr>";
                    echo "<td>" . $row2["project_title"] . "</td>";
                    echo "<td>" . $row2["hours"] . "</td>";
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