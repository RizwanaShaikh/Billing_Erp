<?php
date_default_timezone_set("Asia/Kolkata");

require_once('../Db/dbconfig.php');
	$cur_date = date("Y-m-d h:i:sa");
	if(isset($_POST['new_pro']))
    {
        $p_name = $_POST['p_name'];
        $p_num = $_POST['p_num'];
        $p_qantity = $_POST['p_qantity'];
        $p_qnt_type = $_POST['p_qnt_type'];
        
        $query = "select p_name from product where p_name = '".$p_name."' and status = 1";
        $queryrun = mysqli_query($con, $query);

        if(mysqli_num_rows($queryrun) == 0)
        {
            $querys = "insert into product (p_name,p_qantity,p_num,p_qnt_type) values ('".$p_name."','".$p_qantity."','".$p_num."','".$p_qnt_type."') ";
            $querysrun = mysqli_query($con, $querys);
            if($querysrun>0)
            {
                echo "<script>alert('Add Successfull');  window.location.href='../products.php'; </script>";
            }
            else
            {   
                echo "<script>alert('Error While Registration Please Try Again'); window.location.href='../products.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Customer Haveing GST Number is Already Exist'); window.location.href='../products.php';</script>";
        }
    }

    if (isset($_POST['delete_pro'])) 
    {
    	echo "string";
    	$p_id = $_POST['p_id'];
    	$query = "update product set status = 0, deleted_at = '".$cur_date."' where p_id=".$p_id;
        $querysrun = mysqli_query($con, $query);
        if($querysrun>0)
            {
                echo "<script>alert('Deleted Successfull');  window.location.href='../products.php'; </script>";
            }
    }


    if(isset($_POST['update_pro']))
    {
    	$p_id = $_POST['p_id'];
        $p_name = $_POST['p_name'];
        $p_num = $_POST['p_num'];
        $p_qantity = $_POST['p_qantity'];
        $p_qnt_type = $_POST['p_qnt_type'];
     
      
            $querys = "update product set p_name = '".$p_name."',p_qantity='".$p_qantity."',p_num='".$p_num."',p_qnt_type='".$p_qnt_type."',updated_at =  '".$cur_date."' where p_id = ".$p_id;
            $querysrun = mysqli_query($con, $querys);
            if($querysrun>0)
            {
                echo "<script>alert('Update Successfull');  window.location.href='../products.php'; </script>";
            }
            else
            {   
                echo "<script>alert('Error While Registration Please Try Again'); window.location.href='../products.php';</script>";
            }

       
    }

?>