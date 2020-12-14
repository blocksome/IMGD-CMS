<!--Student Notebook List Query-->
<?php
$sql = "SELECT *
        FROM student AS s
        INNER JOIN notebook AS n
        ON s.student_id = n.student_id
        ";

//Fetch Categories
$result = $con->query($sql);
if ($result->num_rows > 0) { //Output data of each row

    //Display table headers
    echo "<h2>Students with Notebooks</h2>";

    echo "
            <table class='results-table'>
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
                    <th> Project No.
                    </th>

                    <th> Notebook Serial No.
                    </th>
                    <th> Make
                    </th>
                    <th> Model
                    </th>
                    <th> Processor
                    </th>
                    <th> Disc Capacity (GB)
                    </th>
                    <th> RAM (GB)
                    </th>
                    <th> Operating System
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
        echo "<td>" . $row["project_no"] . "</td>";

        echo "<td>" . $row["notebook_serial"] . "</td>";
        echo "<td>" . $row["make"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>" . $row["processor"] . "</td>";
        echo "<td>" . $row["disk_capacity"] . "</td>";
        echo "<td>" . $row["ram"] . "</td>";
        echo "<td>" . $row["os"] . "</td>";
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