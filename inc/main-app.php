<?php
//Connect to database

//Localhost Login
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "irl_database";

/* //School db login
$dbhost = "localhost";
$dbuser = "amphibis_joses";
$dbpass = "miGLzU*S.xJV";
$dbname = "amphibis_joses";
*/

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // Test if connection occurred.

if (mysqli_connect_errno()) {

    die("Database connection failed: " .
        " mysqli_connect_error()" .
        "(" . mysqli_connect_errno() . ")");
} else {
    //Display different settings for different users
?>
    <div id="content-div">
        <form name="button-form" id="button-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <input type="submit" id="projects-btn" name="projects-btn" value="List of Projects">
        <input type="submit" id="students-btn" name="students-btn" value="List of Students">
        <input type="submit" id="software-btn" name="software-btn" value="List of Software">
        <input type="submit" id="project-software-btn" name="project-software-btn" value="List of Project Software">
        <input type="submit" id="supervisor-btn" name="supervisor-btn" value="List of Supervisors">
        <input type="submit" id="project-member-btn" name="project-member-btn" value="List of Project Members">

        <?php
        if ($userClass == ("lecturer-element" || "admin-element")) {
            echo '<input type="submit" id="supervisor-hours-btn" name="supervisor-hours-btn" value="List of Supervisor Hours">';

            if ($userClass == "admin-element") {
                echo '<input type="submit" id="notebook-software-btn" name="notebook-software-btn" value="List of Software Installed on Registered Notebooks">';
                echo '<input type="submit" id="student-notebook-btn" name="student-notebook-btn" value="List of Students with Notebooks">';
            }
        }
        ?>
        </form>
        <?php
}


//Switch tables
//List of projects *
if (isset($_GET['projects-btn'])) {

    include("inc/queries/projects.php");

}

//List of students *
else if (isset($_GET['students-btn'])) {

    include("inc/queries/students.php");

}

//The list of software title for each category *
else if (isset($_GET['software-btn'])) {

    include("inc/queries/software.php");

}

//List of students with notebooks *
else if (isset($_GET['student-notebook-btn'])) {

    include("inc/queries/student-notebook.php");

}

//List of software titles used in each project * 
else if (isset($_GET['project-software-btn'])) {

    include("inc/queries/project-software.php");

}

//List of software titles installed in each notebook 
else if (isset($_GET['notebook-software-btn'])) {

    include("inc/queries/notebook-software.php");

}

//List of lecturer supervising each project
else if (isset($_GET['supervisor-btn'])) {

    include("inc/queries/supervisor.php");

}

//List of students assigned to each project
else if (isset($_GET['project-member-btn'])) {

    include("inc/queries/project-member.php");

}

//For a given lecturer, the number of hours spent on each project.
else if (isset($_GET['supervisor-hours-btn'])) {

    include("inc/queries/supervisor-hours.php");

}

?>

</div>