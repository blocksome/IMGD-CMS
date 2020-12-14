<?php
//Connect to database
$dbhost = "localhost";
$dbuser = "amphibis_joses";
$dbpass = "miGLzU*S.xJV";
$dbname = "amphibis_joses";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // Test if connection occurred.

if(mysqli_connect_errno()) {

    die("Database connection failed: " .
    " mysqli_connect_error()" .
    "(" . mysqli_connect_errno() . ")"
    );
}

else{
    //Display different settings for different users
    ?>
    <div id="content-div">
    <input type="button" id="projects-btn" name="projects-btn" value="List of Projects">
    <input type="button" id="students-btn" name="students-btn" value="List of Students">
    <input type="button" id="software-btn" name="software-btn" value="List of Software">
    <input type="button" id="project-software-btn" name="project-software-btn" value="List of Project Software">
    <input type="button" id="supervisor-btn" name="supervisor-btn" value="List of Supervisors">
    <input type="button" id="project-member-btn" name="project-member-btn" value="List of Project Members">

    <?php
    if($userClass == ("lecturer-element" || "admin-element")){
        echo '<input type="button" id="supervisor-hours-btn" name="supervisor-hours-btn" value="List of Supervisor Hours">';

        if($userClass == "admin-element"){
            echo '<input type="button" id="notebook-software-btn" name="notebook-software-btn" value="List of Software Installed on Registered Notebooks">';
            echo '<input type="button" id="student-notebook-btn" name="student-notebook-btn" value="List of Students with Notebooks">';
        }
    }

    ?>
    </div>
    <?php
}

//Switch tables
//List of projects
if(isset($_GET['projects-btn'])){

}

//List of students
else if(isset($_GET['students-btn'])){
    
}

//The list of software title for each category
else if(isset($_GET['software-btn'])){
    
}

//List of students with notebooks
else if(isset($_GET['student-notebook-btn'])){
    
}

//List of software titles used in each project
else if(isset($_GET['project-software-btn'])){
    
}

//List of software titles installed in each notebook
else if(isset($_GET['notebook-software-btn'])){
    
}

//List of lecturer supervising each project
else if(isset($_GET['supervisor-btn'])){
    
}

//List of students assigned to each project
else if(isset($_GET['project-member-btn'])){
    
}

//For a given lecturer, the number of hours spent on each project.
else if(isset($_GET['supervisor-hours-btn'])){
    
}

?>