
<?php

require_once '../../../classes/Elements.php';

class printSalesList{
public function getSalesList(){
  $printSales = new Sales();
  $sales = $printSales-> displayData();
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
        <td style="width:540px;text-align:center;font-size:1.2em;font-weight:bold; padding-bottom:150px;">Sales Report</td> 
      </tr>   

      <div style="height:500px;"></div>
 
      <tr style="background-color:#f2f4f7; margin:auto; text-align:center; height:50px; " >
        <td style="border: 1px solid #666;width:50px;height:40px;padding-top:20px;line-height: 400%;text-align:center;font-size:11px;margin:auto; vertical-align:center;">Order ID</td>
        <td style="border: 1px solid #666;width:100px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Product Name</td>
        <td style="border: 1px solid #666;width:80px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Product Price</td>    
        <td style="border: 1px solid #666;width:50px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Quantity</td>     
        <td style="border: 1px solid #666;width:70px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Total Amount</td>         
        <td style="border: 1px solid #666;width:85px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Payment Method</td>   
        <td style="border: 1px solid #666;width:100px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Customer</td>                     
      </tr>                   
    </table>
EOF;
  $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------  
foreach ($sales as $key => $value) {
  $OrderID = $value["OrderID"];
  $productname = $value["productname"];
  $productprice = $value["productprice"];
  $quantity = $value["quantity"];
  $amount = $value["amount"];
  $customer = $value["customer"];
  $payment_method = $value["payment_method"];
  $totalsales += $productprice*$quantity;

  $content = <<<EOF
    <table style="border: none;">    
        <tr>
            <th scope="row" style="width:50px;font-size:11px;border-right: 1px solid black; padding-top:20px;border-left: 1px solid black;height:30px;border-bottom: 1px solid black;text-align:center;font-size:11px;;margin:auto;vertical-align:center;">$OrderID</th>
            <td style="width:100px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;;margin:auto;">$productname</td>
            <td style="width:80px;font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;text-align:center;font-size:11px;margin:auto;">$productprice</td> 
            <td style="width: 50px;font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;text-align:center;font-size:11px;margin:auto;">$quantity</td>   
            <td style="width:70px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$amount</td>    
            <td style="width:85px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$payment_method</td>  
            <td style="width:100px;font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$customer</td>      
        </tr>          
    </table>

EOF;


  $pdf->writeHTML($content, false, false, false, false, '');
}

// ------------------------------------------------------------  
$sales = <<<EOF
    <table style="margin-top:20%;">

        <tr>
            <div style="height:50%; padding-bottom:200px;"></div>
            <th scope="row" colspan="4" align="left"  style="border-bottom:1px solid #666;">Total Sales:</th>
            <td colspan="2" align="rigth"  style="border-bottom:1px solid #666;">Php $totalsales</td>
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

    $pdf->writeHTML($sales, false, false, false, false, '');




  ob_end_clean();
  $pdf->Output('saleslist.pdf', 'I');
 }
}





$salesList = new printSalesList();
$salesList -> getSalesList();
?>