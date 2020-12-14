<!--Notebook Software List Query-->
<?php
$sql1 = "SELECT *
        FROM notebook as n
        INNER JOIN student as s
        ON n.notebook_serial = s.notebook_serial;
        ";

$sql2 = "SELECT *
        FROM software_copy as sc
        INNER JOIN software_version as sv
        ON sc.version_id = sv.version_id;
        ";

//Fetch Notebooks
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {

    echo "<h2>Software installed per Notebook</h2>";
    $i = 0;
    //Display tables per notebook
    while ($row1 = mysqli_fetch_assoc($result1)) {

        echo "<h3>" . $row1["student_name"] . "'s notebook</h3>";

        //Display table headers
        echo "
                <table class='results-table'>
                    <thead>
                        <th> Copy ID
                        </th>
                        <th> Software ID
                        </th>
                        <th> Software Name
                        </th>
                        <th> Publisher
                        </th>
                        <th> Version
                        </th>
                    </thead>

                    <tbody>
            ";

        //Fetch Software Copies
        $result2 = $con->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                if ($row2["notebook_serial"] == $row1["notebook_serial"]) {
                    echo "<tr>";
                    echo "<td>" . $row2["copy_id"] . "</td>";
                    echo "<td>" . $row2["software_id"] . "</td>";
                    echo "<td>" . $row2["software_name"] . "</td>";
                    echo "<td>" . $row2["publisher"] . "</td>";
                    echo "<td>" . $row2["version_name"] . "</td>";
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