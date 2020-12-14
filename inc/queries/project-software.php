<!--Project Software List Query-->
<?php
$sql1 = "SELECT *
        FROM project;
        ";

$sql2 = "SELECT *
        FROM project_software as ps
        INNER JOIN software as s
        ON ps.software_id = s.software_id;
        ";

//Fetch Projects
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {

    echo "<h2>Software used in Projects</h2>";
    $i = 0;
    //Display tables per project
    while ($row1 = mysqli_fetch_assoc($result1)) {

        echo "<h3>" . $row1["project_title"] . "</h3>";

        //Display table headers
        echo "
                <table class='results-table'>
                    <thead>
                        <th> Software ID
                        </th>
                        <th> Software Name
                        </th>
                        <th> Publisher
                        </th>
                        <th> Version ID
                        </th>
                    </thead>

                    <tbody>
            ";

        //Fetch Project Software
        $result2 = $con->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                if ($row2["project_no"] == $row1["project_no"]) {
                    echo "<tr>";
                    echo "<td>" . $row2["software_id"] . "</td>";
                    echo "<td>" . $row2["software_name"] . "</td>";
                    echo "<td>" . $row2["publisher"] . "</td>";
                    echo "<td>" . $row2["version_id"] . "</td>";
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