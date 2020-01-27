<?php
    session_start();
    require_once('../Db/dbconfig.php');
    require_once('mpdf/mpdf.php');
   
    
    date_default_timezone_set('Asia/Kolkata');
    $today = date("d / m / Y");
   
   
    $b_id = $_GET['b_id'];

    $sql = "select c.*,b.* from customer as c join bill as b on c.c_id = b.c_id where b.b_id = ".$b_id;
    $result = $con->query($sql);

    if ($result->num_rows > 0) 
    {
        // output data of each row
        $row = $result->fetch_assoc();
        
        $b_date = $row['b_date'];
        $b_invoce = $row['b_invoice'];
        $c_name = $row['c_name'];
        $c_deliv_add = $row['c_deliv_add'];
        $c_gst_no = $row['c_gst_no'];
        $b_lr_no = $row['b_lr_no'];
        $b_veh_no = $row['b_veh_no'];
        $b_amount = $row['b_amount'];
    $html = "
    <html>
        <head>            
            <link rel='stylesheet' href='../../css/bootstrap.min.css'>
            <style>
               table
               {
                    width : 100%;
                    
               }
               table,td
               {
                    border:.5px solid black;
               }
               td
               {
                    padding : 2px;
                    font-size : 12px;
               }
            </style>
        </head>
        <body>
            <br>
            <div style='text-align:center'>
            <h1 style='padding:0;margin:0;'>PRASONG</h1>
            <h5 style='padding:0;margin:0;'><u>CORPORATION PVT. LTD.<u></h5>
            <h5 style='padding:0;margin:0;'><u>CIN NO. U51909MH2017PTC291139</u></h5>
            </div>
            <br>
            <br>
            <h4 style='text-align:center;margin:0px;'>Tax Invoice</h4>
            <h6 style='text-align:right'>( ORIGINAL FOR RECIPIENT )</h6>
            
            <table>
                <tr>
                    <td rowspan ='2'>
                        <b>PRASONG CORPORATION PRIVATE LIMITED</b><br>
                        Gala No : 1, Plot No. 755/C2,KWC,Steel Market,Kalamboli, Navi Mumbai - 410 218.<br>
                        Godown Add - 147/1172, Motilal Nagar, 1st Floor, Gorewgaon(W), Mumbai - 400 060.<br>
                        GSTIN/UIN : 27AAICP9687R1Z1<br>
                        State Name : Maharashtra &nbsp; Code : 27 <br>
                        CIN : U51909MH2017PTC291139<br>
                        E-mail : prasongcorp@gmail.com
                    </td>
                    <td>
                        <p>Invoice Number</p>
                        <p>$b_invoce</p>
                    </td>
                    <td>
                        <p>Dated</p>
                        <p>$b_date</p>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <p>Invoice Number</p>
                        <p>$b_invoce</p>
                    </td>
                    <td>
                        <p>Dated</p>
                        <p>$b_date</p>
                    </td>
                </tr>

                <tr>
                    <td rowspan ='2'>
                        Buyer<br>
                        <b>$c_name</b><br>
                        $c_deliv_add<br>
                        GSTIN/UIN : $c_gst_no<br>

                    </td>
                    <td>
                        <p>Invoice Number</p>
                        <p>$b_invoce</p>
                    </td>
                    <td>
                        <p>Dated</p>
                        <p>$b_date</p>
                    </td>
                </tr> 
                <tr>
                    <td>
                        Bill of Landing/LR-RR No. <br>
                        $b_lr_no
                    </td>
                    <td>
                        Motor Vehical No.<br>
                        $b_veh_no
                    </td>
                </tr>  
            </table>     
            <table>
                <tr>
                    <td>Sr. No</td>
                    <td>Description Of Goods</td>
                    <td>HSN/SAC</td>
                    <td>Quantity</td>
                    <td>Rate</td>
                    <td>Amount</td>
                </tr>         
           ";

        $sql_1 = "select p.*,bi.* from bill_items as bi join product as p on p.p_id=bi.p_id where bi.status = 1 and bi.b_id = ".$b_id;
        $result_1 = $con->query($sql_1);
        if ($result_1->num_rows > 0) 
        {
            $in = 0;
            $t_qt = 0;
            // output data of each row
            while($row_1 = $result_1->fetch_assoc()) 
            {
                $in = $in +1;
                $p_name = $row_1['p_name'];
                $p_num = $row_1['p_num'];
                $p_quantity = $row_1['p_quantity'];
                $t_qt = $t_qt + $p_quantity;
                $p_rate = $row_1['p_rate'];
                $p_amount = $row_1['p_amount'];
                $p_qnt_type = $row_1['p_qnt_type'];
                $html = $html."
                    <tr>
                        <td>$in</td>
                        <td>$p_name</td>
                        <td>$p_num</td>
                        <td>$p_quantity $p_qnt_type</td>
                        <td>$p_rate / $p_qnt_type</td>
                        <td>&#8377;  $p_amount/-</td>
                    <tr>
                ";
            }
        }





    $html = $html."
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style='text-align:left'>GST 18%</td>
                    <tr>

                    <tr>
                        <td></td>
                        <td style='text-align:right'><p >Total</p></td>
                        <td></td>
                        <td>$t_qt</td>
                        <td></td>
                        <td>&#8377; $b_amount/-</td>
                    <tr>
            </table> 
            <table>
                <tr>
                    <td>
                        <span>
                            Declaretion:<br>
                            We Declare that this invoice shows the actual price of the goods<br>
                            described and that all particulars are true and correct.
                        </span>
                            
                    </td>
                    <td style='text-align:center'>
                         Authorised Signatory
                    </td>
                </tr>
            </table>
            <br><br><br>
            <div style='font-size:12px;text-align:center;'>
            <p  ><strong>This is Computer Generated Invoice.</strong></p>
            <center>Gala No : 1, Plot No. 755/C2,KWC,Steel Market,Kalamboli, Navi Mumbai - 410 218. &nbsp;&nbsp;&nbsp; E-mail : prasongcorp@gmail.com</center>
            </div>
        </body>
    </html>    
    ";
        
}    
    $mpdf = new mPDF('',"A4");
    $mpdf->WriteHTML($html);
    $mpdf->Output('Rating.pdf','I');


   

        
?>