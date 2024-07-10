
<?php

require_once '../../../classes/Elements.php';

class printProductList{
public function getProductList(){
  $printProducts = new Products();
  $product = $printProducts-> displayData();
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
        <td style="width:540px;text-align:center;font-size:1.2em;font-weight:bold; padding-bottom:150px;">Product List</td> 
      </tr>   

      <div style="height:500px;"></div>
 
      <tr style="background-color:#f2f4f7; margin:auto; text-align:center; height:50px; " >
        <td style="border: 1px solid #666;width:80px;height:40px;padding-top:20px;line-height: 400%;text-align:center;font-size:11px;margin:auto; vertical-align:center;">Product ID</td>
        <td style="border: 1px solid #666;width:150px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Product Name</td>
        <td style="border: 1px solid #666;width:150px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Price (Php)</td>    
        <td style="border: 1px solid #666;width:160px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Variation</td>                   
      </tr>                   
    </table>
EOF;
  $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------  
foreach ($product as $key => $value) {
  $productid = $value["productid"];
  $productname = $value["productname"];
  $price = $value["price"];
  $variation = $value["variation"];
  $countProduct+=1;

  $content = <<<EOF
    <table style="border: none;">    
        <tr>
            <th scope="row" style="width:80px;  line-height: 200%; font-size:11px;border-right: 1px solid black; padding-top:20px;border-left: 1px solid black;height:30px;border-bottom: 1px solid black;text-align:center;font-size:11px;;margin:auto;vertical-align:center;">$productid</th>
            <td style="width:150px; line-height: 200%; font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$productname</td>
            <td style="width:150px; line-height: 200%; font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;text-align:center;font-size:11px;margin:auto;">$price</td> 
            <td style="width: 160px; line-height: 200%; font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;text-align:center;font-size:11px;margin:auto;">$variation</td>   
        </tr>          
    </table>

EOF;


  $pdf->writeHTML($content, false, false, false, false, '');
}

// ------------------------------------------------------------  
$product = <<<EOF
    <table style="margin-top:20%;">

        <tr>
            <div style="height:50%; padding-bottom:200px;"></div>
            <th scope="row" colspan="4" align="left"  style="border-bottom:1px solid #666;">Total Product:</th>
            <td colspan="2" align="rigth"  style="border-bottom:1px solid #666;">$countProduct</td>
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

    $pdf->writeHTML($product, false, false, false, false, '');




  ob_end_clean();
  $pdf->Output('productlist.pdf', 'I');
 }
}





$productlist = new printProductList();
$productlist -> getProductList();
?>