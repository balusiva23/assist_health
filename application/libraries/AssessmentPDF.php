

<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

///require_once 'TCPDF/tcpdf.php';
require_once  dirname(__FILE__) . '/tcpdf/examples/tcpdf_include.php';
// Extend the TCthis class to create custom Header and Footer
class AssessmentPDF extends TCPDF
{
    public $id = '';
    //Page header
    public function Header()
    {
        // Logo
         $image_file = FCPATH . 'assets/log_with_text.png';
 

        // First name
        $this->SetMargins(0, 30, 0, true);
        $this->SetFooterMargin(0);
        $this->setHtmlVSpace(array(
            'h1' => array(0 => array('h' => '', 'n' => 0), 1 => array('h' => '', 'n' => 0)),
            'p' => array(0 => array('h' => '', 'n' => 0), 1 => array('h' => '', 'n' => 0)),
            ));
        $html = <<<EOD
        <table cellpadding="5" style="text-align:center;">
        <tr>
        <td width="4%"></td>
            <td width="30%" >
                <img src="$image_file" width="100px" height="80px" align="center"/>
            </td> 
            <td width="33%" align="center" >
            <h1 style="font-size:30px;">Assist<span style="color:black;">Health </span> </h1>
            <p style="font-size:15px;font-weight:bold"> Personal Healthcare Support </p>
            <p style="font-size:15px;font-weight:bold"><a href="https://www.assisthealth.in/" >www.assisthealth.in</a></p>
            </td>
           
             <td style="background-color: ;color:black;  vertical-align: bottom;" width="30%" align="center">
            <p></p>
            <p></p>
            <p></p>
           
      
            </td>
            <td width="4%"></td>
        </tr>
    </table>
EOD;
//  <h4>AssistHealth ID : {$this->id}</h4>

        $this->writeHTML($html, true, false, true, false, '');

    }
    public function Footer() {
    
        // Position at 15 mm from bottom
        $this->SetY(-15);
    
        // Set font
        $this->SetFont('helvetica', 'I', 12);
    
//      // Left-aligned text (School Health Nurse Signature)
// $this->SetX(10); // Set position from the left edge
// $this->Cell(0, 5, "School Health Nurse Signature", 0, 1, 'L'); // Left-aligned text

// // Right-aligned text (Parent/Guardian signature)
// $this->SetX($this->GetPageWidth() - $this->GetStringWidth("Parent/Guardian signature") - 10); // Move to the right edge
// $this->Cell(0, 5, "Parent/Guardian signature", 0, 1, 'R'); // Right-aligned text

        $this->Ln(3);
        // Output a line above the footer
        $this->SetLineWidth(0.5);
        $this->Line(10, $this->GetY() - 1, $this->getPageWidth() - 10, $this->GetY() - 1);
          $this->SetX(10);
    
           $phone = FCPATH . 'assets/phone-18.png';
           $web = FCPATH . 'assets/web-18.png';
    
        // Start the HTML table
        $html = '<table   width="100%" style="border-collapse: collapse;">';
    
        // Left-aligned cell
        $html .= '<tr><td style="text-align: left;"><span style="margin:5px"><strong> Email :</strong> </span> support@assisthealth.in</td>';
    
        // Centered cell
        $html .= '<td style=""></td>';
        $html .= '<td style=""><span style="margin:5px"><strong>Phone :</strong>+91- 9611232519/69/93</span></td></tr>';
    
        // Right-aligned cell
       $html .= '<tr><td style="width:100%"><span style="margin:5px"><strong>Address :</strong>#850, 3 rd Floor, D Block, Opp Cafe Coffee Day, Sahakar nagar, Bangalore 560092
          </span></td></tr>';
    
        // Close the HTML table
        $html .= '</table>';
        
        $this->writeHTML($html, true, false, true);
    
       
    
    
    
    }
    // Page footer
//     public function Footer()
//     {
//         // Position at 15 mm from bottom
//         $this->SetY(-20);
//         // Set font
//         $this->SetFont('times', '', 8);
//         // Page number

//         $html = <<<EOD
//         <font size="+1"><span><strong>Footer Example</span></strong></font>
//         <hr />
//         FooterText
// EOD;

//         $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//         // print a block of text using Write()
//         //$this->Write(-60, $FooterText , '', 0, 'C', true, 0, false, false, 12);
//     }
}
