<?php
date_default_timezone_set("Asia/Kolkata");
session_start();

require_once('../Db/dbconfig.php');
	$cur_date = date("Y-m-d h:i:sa");

	if(isset($_POST['gen_bill']))
    {
        if(isset($_SESSION['b_id']))
        {
            echo "<script>alert('cancel or complete Previous Bill');window.location.href='../bill_items.php'; </script>";
        }
        else
        {
        $c_id = $_POST['c_id'];
        $query = "select * from customer where c_id = '".$_SESSION['c_id']."'";
        $query_run = mysqli_query($con, $query);
        if(@mysqli_num_rows($query_run)>0)
        {
            $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
            $b_invoice = 'PCPL/'.date("Ymd").'/'.rand(0,100);            
            $querys = "insert into bill(b_invoice,c_id,b_date,status) values ('".$b_invoice."',".$c_id.",'".$cur_date."','Pending') ";
            $querysrun = mysqli_query($con, $querys);
            if($querysrun>0)
            {
                $q = "select b_id from bill where b_invoice = '".$b_invoice."'";
                $q_run = mysqli_query($con, $q);
                $r = mysqli_fetch_array($q_run, MYSQLI_ASSOC);
                $b_id = $r['b_id'];
                $_SESSION['b_id'] = $b_id;

                echo "<script>alert(".$b_id.");window.location.href='../bill_items.php'; </script>";
            }
            else
            {   
                echo "<script>alert('Error While Generating Bill Please Try Again'); window.location.href='../customer.php';</script>";
            }
        }
        }
        #echo "<script>window.location.href='../bill_items.php'; </script>";
    }

    if(isset($_POST['new_item']))
    {
        $b_id = $_POST['b_id'];
        $p_id = $_POST['p_id'];
        $p_qantity = $_POST['p_qantity'];
        $p_rate = $_POST['p_rate'];

        $q = "select p_qantity from product where p_id = ".$p_id;
        $q_run = mysqli_query($con, $q);
        $r = mysqli_fetch_array($q_run, MYSQLI_ASSOC);
        $p_qt = $r['p_qantity']; 

        if($p_qantity < $p_qt)
        {
            $n_qt = $p_qt - $p_qantity;
            $querys = "update product set p_qantity = ".$n_qt." where p_id = ".$p_id;
            $querysrun = mysqli_query($con, $querys);
            if($querysrun>0)
            {
                $p_amount = $p_qantity * $p_rate;
                $q1 = "insert into bill_items(b_id,p_id,p_quantity,p_rate,p_amount,status) values(".$b_id.",".$p_id.",".$p_qantity.",".$p_rate.",".$p_amount.",1)";
            
                $qr = mysqli_query($con, $q1);
                if($qr>0)
                {
                    echo "<script>window.location.href='../bill_items.php'; </script>";
                }
            }
            
        }
        else
        {
            echo "<script>alert('Product Not available in sufficient quantity'); window.location.href='../bill_items.php';</script>";
        }
    }


    if(isset($_POST['delete_bi']))
    {
        $bi_id = $_POST['bi_id'];
        $p_id = $_POST['p_id'];

        $q = "select p_qantity from product where p_id = ".$p_id;
        $q_run = mysqli_query($con, $q);
        $r = mysqli_fetch_array($q_run, MYSQLI_ASSOC);
        $p_qt = $r['p_qantity']; 

        $q1 = "select p_quantity from bill_items where bi_id = ".$bi_id;
        $q1_run = mysqli_query($con, $q1);
        $r1 = mysqli_fetch_array($q1_run, MYSQLI_ASSOC);
        $p1_qt = $r1['p_quantity'];

        $n_qt = $p_qt + $p1_qt;
        
        $querys = "update product set p_qantity = ".$n_qt." where p_id = ".$p_id;
        $querysrun = mysqli_query($con, $querys);
        if($querysrun>0)
        {
            $q2 = "update bill_items set status = 0 where bi_id = ".$bi_id;
        
            $qr = mysqli_query($con, $q2);
            if($qr>0)
            {
                
                echo "<script>window.location.href='../bill_items.php'; </script>";
            }
        }

    }


    if(isset($_POST['final_bill']))
    {
        $bi_id = $_POST['bi_id'];
        $b_id = $_POST['b_id'];
        $b_lr_no = $_POST['b_lr_no'];
        $b_veh_no = $_POST['b_veh_no'];

        $sql = "select sum(p_amount) from bill_items where status = 1 and b_id =".$b_id.";";
        $result = $con->query($sql);
        $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $p_amount = $r['sum(p_amount)']; 
        $b_amount = $p_amount + ($p_amount * 0.18);

        $sql_1 = "update bill set b_lr_no = '".$b_lr_no."', b_veh_no = '".$b_veh_no."',b_amount = ".$b_amount.", status = 'completed' where b_id = ".$b_id.";";
        echo $sql_1;
        $querysrun = mysqli_query($con, $sql_1);
        if($querysrun>0)
            {
                unset($_SESSION['b_id']);
                echo "<script>window.location.href='../customers.php'; </script>";
            }
    }


    if(isset($_POST['cancel_bill']))
    {
        $b_id = $_POST['b_id'];
        $sql = "delete from bill_items where b_id = ".$b_id;
        if ($con->query($sql) === TRUE) 
        {
            $sql_1 = "delete from bill where b_id = ".$b_id;
            if ($con->query($sql_1) === TRUE) 
            {
                unset($_SESSION['b_id']);
                echo "<script>window.location.href='../customers.php'; </script>";
            }
        } else 
        {
            echo "Error deleting record Bill items : " . $con->error;
        } 
    }
?>