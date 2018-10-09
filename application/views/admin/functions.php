<?php 

if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {

	         	print_r($getData[0]);

	         	$servername = "localhost";
				$username = "root";
				$password = "";
				$db="xlsup";
				// Create connection
				$conn = new mysqli($servername, $username, $password,$db);

				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
				echo "Connected successfully";
 				
 
	           $sql = "INSERT into xls (emp_id,emp_name,email) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."')";
                   $result = mysqli_query($conn, $sql);
                   print_r($result);
                   //exit;
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"functions.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"functions.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 
 
 
 ?>

<form class="form-horizontal"  method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>Form Name</legend>
 
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                        <?php
               get_all_records();
            ?>
 
                    </fieldset>
                </form>


               <?php function get_all_records(){
               	$servername = "localhost";
				$username = "root";
				$password = "";
				$db="xlsup";
				// Create connection
				$conn = new mysqli($servername, $username, $password,$db);
  //  $con = getdb();
    $Sql = "SELECT * FROM xls";
    $result = mysqli_query($conn, $Sql);  
 
 
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                         
                          <th>Email</th>
                       
                        </tr></thead><tbody>";
 
 
     while($row = mysqli_fetch_assoc($result)) {
 
         echo "<tr><td>" . $row['emp_id']."</td>
                   <td>" . $row['emp_name']."</td>
                  
                   <td>" . $row['email']."</td>
                  </tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
} ?>