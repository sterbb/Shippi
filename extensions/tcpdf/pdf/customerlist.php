
<?php

require_once '../../../classes/Elements.php';

class printCustomerList{
public function getCustomerList(){
  $printCustomer = new Customers();
  $customer = $printCustomer-> displayData();
  require_once('tcpdf_include.php');
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->startPageGroup();
  $pdf->setPrintHeader(false);
  $pdf->AddPage();

  $header = <<<EOF
    <table >
      <tr>
        <td style="width:540px;text-align:center;font-size:1.2em;font-weight:bold;">Shippi</td> 
      </tr>

      <tr>
        <td style="width:540px;text-align:center;font-size:10px;">Divinagracia, Jan Ryan, C83</td> 
      </tr>  

      <tr>
        <td style="width:540px;text-align:center;font-size:1.2em;font-weight:bold; padding-bottom:150px;">Customer List</td> 
      </tr>   

      <div style="height:500px;"></div>
 
      <tr style="background-color:#f2f4f7; margin:auto; text-align:center; height:50px; " >
        <td style="border: 1px solid #666;width:50px;height:40px;padding-top:20px;line-height: 180%;text-align:center;font-size:11px;margin:auto; vertical-align:center;">Customer ID</td>
        <td style="border: 1px solid #666;width:105px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Name</td>
        <td style="border: 1px solid #666;width:100px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Address</td>    
        <td style="border: 1px solid #666;width:100px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">GCash Account</td>     
        <td style="border: 1px solid #666;width:100px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Card Number</td>         
        <td style="border: 1px solid #666;width:85px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Shippi Balance</td>                    
      </tr>                   
    </table>
EOF;
  $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------  
foreach ($customer as $key => $value) {
  $customerID = $value["customerID"];
  $name = $value["name"];
  $address = $value["address"];
  $gcash = $value["gcash"];
  $wallet = $value["wallet"];
  $cardnumber = $value["cardnumber"];
  $countCustomer+=1;

  $content = <<<EOF
    <table style="border: none;">    
        <tr>
            <th scope="row" style="width:50px;font-size:11px;border-right: 1px solid black; padding-top:20px;border-left: 1px solid black;height:30px;border-bottom: 1px solid black;text-align:center;font-size:11px;;margin:auto;vertical-align:center;">$customerID</th>
            <td style="width:105px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;;margin:auto;">$name</td>
            <td style="width:100px;font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;text-align:center;font-size:11px;margin:auto;">$address</td> 
            <td style="width: 100px;font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;text-align:center;font-size:11px;margin:auto;">$gcash</td>   
            <td style="width:100px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$wallet</td>    
            <td style="width:85px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$cardnumber</td>      
        </tr>          
    </table>

EOF;


  $pdf->writeHTML($content, false, false, false, false, '');
}

// ------------------------------------------------------------  
$customer = <<<EOF
    <table style="margin-top:20%;">

        <tr>
            <div style="height:50%; padding-bottom:200px;"></div>
            <th scope="row" colspan="4" align="left"  style="border-bottom:1px solid #666;">Total Customer:</th>
            <td colspan="2" align="rigth"  style="border-bottom:1px solid #666;">$countCustomer</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>

    <div style="height:50%; padding-bottom:200px;"></div>

    <table style="margin-top:20%;">


        <tr>
          <td colspan="7" align="right" style="border-bottom:1px solid #666;">Shippi</td>
  
        </tr>

        <tr>
            <td colspan="7"  align="right">TCP25133Z - Final Project</td>
        </tr>
    </table>


EOF;

    $pdf->writeHTML($customer, false, false, false, false, '');




  ob_end_clean();
  $pdf->Output('customerlist.pdf', 'I');
 }
}





$customerList = new printCustomerList();
$customerList -> getCustomerList();
?>