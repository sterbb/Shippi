<?php

require_once '../../../classes/Elements.php';

class printAccountList{
public function getAccountList(){
  $printAccounts = new Accounts();
  $account = $printAccounts-> displayData();
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
        <td style="width:540px;text-align:center;font-size:1.2em;font-weight:bold; padding-bottom:150px;">Account List</td> 
      </tr>   

      <div style="height:500px;"></div>
 
      <tr style="background-color:#f2f4f7; margin:auto; text-align:center; height:50px; " >
        <td style="border: 1px solid #666;width:80px;height:40px;padding-top:20px;line-height: 400%;text-align:center;font-size:11px;margin:auto; vertical-align:center;">Account ID</td>
        <td style="border: 1px solid #666;width:150px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Name</td>
        <td style="border: 1px solid #666;width:150px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Username</td>    
        <td style="border: 1px solid #666;width:160px;text-align:center;font-size:11px; line-height: 400%;margin:auto;">Remarks</td>                   
      </tr>                   
    </table>
EOF;
  $pdf->writeHTML($header, false, false, false, false, '');

// ------------------------------------------------------------  
foreach ($account as $key => $value) {
  $accountID = $value["accountID"];
  $name = $value["name"];
  $username = $value["username"];
  $remarks = $value["remarks"];
  $countAccount+=1;

  $content = <<<EOF
    <table style="border: none;">    
        <tr>
            <th scope="row" style="width:80px;  line-height: 200%; font-size:11px;border-right: 1px solid black; padding-top:20px;border-left: 1px solid black;height:30px;border-bottom: 1px solid black;text-align:center;font-size:11px;;margin:auto;vertical-align:center;">$accountID</th>
            <td style="width:150px; line-height: 200%; font-size:11px;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;text-align:center;font-size:11px;margin:auto;">$name</td>
            <td style="width:150px; line-height: 200%; font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;text-align:center;font-size:11px;margin:auto;">$username</td> 
            <td style="width: 160px; line-height: 200%; font-size:11px;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;text-align:center;font-size:11px;margin:auto;">$remarks</td>   
        </tr>          
    </table>

EOF;


  $pdf->writeHTML($content, false, false, false, false, '');
}

// ------------------------------------------------------------  
$account = <<<EOF
    <table style="margin-top:20%;">

        <tr>
            <div style="height:50%; padding-bottom:200px;"></div>
            <th scope="row" colspan="4" align="left"  style="border-bottom:1px solid #666;">Total Account:</th>
            <td colspan="2" align="rigth"  style="border-bottom:1px solid #666;">$countAccount</td>
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

    $pdf->writeHTML($account, false, false, false, false, '');




  ob_end_clean();
  $pdf->Output('accountlist.pdf', 'I');
 }
}





$accountlist = new printAccountList();
$accountlist -> getAccountList();
?>