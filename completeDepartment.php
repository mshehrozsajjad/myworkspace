<?php

require 'components/database-login.php';


function createProject()
{   
    $username = strip_tags($_SESSION["Name"]);
    $idprojects = mysql_real_escape_string(strip_tags($_GET['projectid']));
    $departmentname = mysql_real_escape_string(strip_tags(trim($_POST['departmentname'])));
    $departmentdescription = mysql_real_escape_string(strip_tags($_POST['departmentdescription']));
   
    
	$query = "INSERT INTO department (departmentname, departmentdescription,`user-name`,project_id) VALUES ('$departmentname', '$departmentdescription','$username','$idprojects')";
	$data = mysql_query ($query)or die(mysql_error());
    
   
     $iddepartment =  mysql_insert_id();
     foreach ($_POST['username'] as $selectedUsername)
    {    
            $selectedUsername = mysql_real_escape_string((strip_tags($selectedUsername)));
             $query = "SELECT projectname,`username` FROM myworkspace.projects where idprojects = '$idprojects';";
             $data = mysql_query ($query)or die(mysql_error());
             if (mysql_num_rows($data)==1){ 
                $row = mysql_fetch_array($data);
                $projectname = $row['projectname'];
                $projuser = $row['username'];
               } 
             $query = "INSERT INTO user_project (`user-name`,`project_id`,projectname,username,can_edit) VALUES ('$selectedUsername','$idprojects','$projectname','$projuser','0')";
	         $data = @mysql_query($query);
             
             $query = "INSERT INTO user_dept (`user-name`,`dept_id`,dept_name,user_name,can_edit,project_id) VALUES ('$selectedUsername','$iddepartment','$departmentname','$username','0','$idprojects')";	        
              $data = mysql_query ($query) or die(mysql_error()); 
           
    }
    
     
    $query = "INSERT INTO user_dept (`user-name`,`dept_id`,dept_name,user_name,can_edit,project_id) VALUES ('$username','$iddepartment','$departmentname','$username','1','$idprojects')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
		header("Location: project.php?projectid=$idprojects");
	}
}

function Profile()
{
    session_start();
if(isset($_SESSION["Name"]))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $userName = strip_tags($_SESSION["Name"]);
      
	$query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$userName';");
     if (mysql_num_rows($query)>0)  
	{   
        createProject();
	}
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		
        header('Location: Login.php');
	}
	
}
}
if(isset($_POST['submit']))
{
	Profile();
}
?>

