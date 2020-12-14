<!--Projects List Query-->
<?php
$sql = "SELECT * "; //Select everything
$sql .= "FROM project "; //Reading from Projects table
$sql .= "ORDER BY project_no;"; //Sort by id
$result = $con->query($sql);
if ($result->num_rows > 0) { //Output data of each row

    //Display table headers
    echo "<h2>Projects</h2>";
    echo "
            <table class='results-table'>
                <thead>
                    <th> Project No.
                    </th>
                    <th> Project Title
                    </th>
                    <th> Project Description
                    </th>
                    <th> Start Date
                    </th>
                    <th> End Date
                    </th>
                    <th> Budget ($)
                    </th>
                    <th> Company
                    </th>
                </thead>

                <tbody>
        ";

    $i = 0;
    //Display rows
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . $row["project_no"] . "</td>";
        echo "<td>" . $row["project_title"] . "</td>";
        echo "<td>" . $row["project_desc"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td>" . $row["budget"] . "</td>";
        echo "<td>" . $row["company"] . "</td>";
        echo "</tr>";

        $i++;
    }

    echo "

        </tbody>
    </table>
    <h2>Query complete, fetched " . $i . " result(s).</h2>
    ";

} 

else if ($con->error){
    printf("Query failed: %s\n", $con->error);
}

else {

    echo "No results!";
    
}
?>