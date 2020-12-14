<!--Projects List Query-->
<?php
$sql = "SELECT * "; //Select everything
    $sql .= "FROM project "; //Reading from Projects table
    $sql .= "ORDER BY project_no;"; //Sort by id
    $result = $con->query($sql);
    if ($result->num_rows > 0) { //Output data of each row

        //Display table headers
        echo "
            <table id='results-table'>
                <thead>
                    <th> project_no
                    </th>
                    <th> project_title
                    </th>
                    <th> project_desc
                    </th>
                    <th> start_date
                    </th>
                    <th> end_date
                    </th>
                    <th> budget
                    </th>
                    <th> company
                    </th>
                </thead>

                <tbody>
        ";

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

        }

        echo "</tbody></table>";
    } else {

        echo "No results!";
        printf("Query failed: %s\n", $con->error);
    }
    ?>