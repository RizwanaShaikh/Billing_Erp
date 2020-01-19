<?php
date_default_timezone_set("Asia/Kolkata");

require_once('../Db/dbconfig.php');
	$cur_date = date("Y-m-d h:i:sa");
	if(isset($_POST['new_cust']))
    {
        $c_name = $_POST['c_name'];
        $c_mob = $_POST['c_mob'];
        $c_address = $_POST['c_address'];
        $c_deliv_add = $_POST['c_deliv_add'];
        $c_gst_no = $_POST['c_gst_no'];
        
        $query = "select c_gst_no from customer where c_gst_no = '".$c_gst_no."' and status = 1";
        $queryrun = mysqli_query($con, $query);

        if(mysqli_num_rows($queryrun) == 0)
        {
            $querys = "insert into customer (c_name,c_address,c_deliv_add,c_mob,c_gst_no) values ('".$c_name."','".$c_address."','".$c_deliv_add."','".$c_mob."','".$c_gst_no."') ";
            $querysrun = mysqli_query($con, $querys);
            if($querysrun>0)
            {
                echo "<script>window.location.href='../customers.php'; </script>";
            }
            else
            {   
                echo "<script>alert('Error While Inserting Please Try Again'); window.location.href='../customers.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Customer Haveing GST Number is Already Exist'); window.location.href='../customers.php';</script>";
        }
    }

    if (isset($_POST['delete_cust'])) 
    {
    	echo "string";
    	$c_id = $_POST['c_id'];
    	$query = "update customer set status = 0, deleted_at = '".$cur_date."' where c_id=".$c_id;
        $querysrun = mysqli_query($con, $query);
        if($querysrun>0)
            {
                echo "<script>alert('Deleted Successfull');  window.location.href='../customers.php'; </script>";
            }
    }


    if(isset($_POST['update_cust']))
    {
    	$c_id = $_POST['c_id'];
        $c_name = $_POST['c_name'];
        $c_mob = $_POST['c_mob'];
        $c_address = $_POST['c_address'];
        $c_deliv_add = $_POST['c_deliv_add'];
        $c_gst_no = $_POST['c_gst_no'];
     
      
            $querys = "update customer set c_name = '".$c_name."',c_address='".$c_address."',c_deliv_add='".$c_deliv_add."',c_mob='".$c_mob."',c_gst_no='".$c_gst_no."',updated_at =  '".$cur_date."' where c_id = ".$c_id;
            $querysrun = mysqli_query($con, $querys);
            if($querysrun>0)
            {
                echo "<script>alert('Update Successfull');  window.location.href='../customers.php'; </script>";
            }
            else
            {   
                echo "<script>alert('Error While Registration Please Try Again'); window.location.href='../customers.php';</script>";
            }

       
    }




if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM customer WHERE c_name LIKE ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["c_name"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 

?>