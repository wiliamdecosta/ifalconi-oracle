<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/report/");
define("FileName", "report_invoice_ver2_pdf.php");
include_once(RelativePath . "/Common.php");
//include_once("../include/fpdf.php");
require("../include/qrcode/fpdf17/fpdf.php");

$INPUT_DATA_CONTROL_ID		= CCGetFromGet("INPUT_DATA_CONTROL_ID", "");
$CUSTOMER_ACCOUNT_ID		= CCGetFromGet("CUSTOMER_ACCOUNT_ID", "");

$user				= CCGetUserLogin();
$data				= array();
$dbConn				= new clsDBConnSIKP();


if(empty($CUSTOMER_ACCOUNT_ID)){
	
	$query_summary1 = "select  MAX(a.INVOICE_NO) , " .
						"	   MAX(a.INVOICE_DATE),  " .
						"	   MAX(a.ACC_NUMBER), " .
						"	   MAX(a.LAST_NAME), " .
						"	   MAX(a.ADDRESS), " .
						"	   MAX(a.REGION_NAME), " .
						"	   MAX(a.ACC_ZIP_CODE),  " .
						"	   MAX(a.NPWP), " .
						"	   MAX(b.DUE_DATE) " .
						"from t_invoice a, " .
						"	 t_line_invoice b, " .
						"	 t_invoice_component c " .
						"where a.t_invoice_id = b.t_invoice_id " .
						"	 and b.t_line_invoice_id = c.t_line_invoice_id" .
						"	 and a.input_data_control_id = " . INPUT_DATA_CONTROL_ID . "" .
						"Group By a.ACC_NUMBER ";
	
	
						
	$query_summary2 = "select sum(c.CHARGE_AMOUNT_HC) as sumCHARGE_AMOUNT_HC, " .
						"	  sum(c.VAT_AMOUNT_HC) as sumVAT_AMOUNT_HC " .
						"from t_invoice a, " .
						"	 t_line_invoice b, " .
						"	 t_invoice_component c " .
						"where a.t_invoice_id = b.t_invoice_id " .
						"	 and b.t_line_invoice_id = c.t_line_invoice_id" .
						"	 and a.input_data_control_id = " . INPUT_DATA_CONTROL_ID . "" .
						"Group By a.ACC_NUMBER ";
	$query = "select   b.SERVICE_NO, " .
						"	   b.SERVICE_TYPE_CODE, " .
						"	   c.INVOICE_COMPONENT_CODE, " .
						"	   c.CHARGE_AMOUNT_HC, " .
						"	   VAT_AMOUNT_HC " .
						"from t_invoice a, " .
						"	 t_line_invoice b, " .
						"	 t_invoice_component c " .
						"where a.t_invoice_id = b.t_invoice_id " .
						"	 and b.t_line_invoice_id = c.t_line_invoice_id" .
						"	 and a.input_data_control_id = " . INPUT_DATA_CONTROL_ID . "";
}else{
	$query_summary1 = "select  MAX(a.INVOICE_NO) , " .
						"	   MAX(a.INVOICE_DATE),  " .
						"	   MAX(a.ACC_NUMBER), " .
						"	   MAX(a.LAST_NAME), " .
						"	   MAX(a.ADDRESS), " .
						"	   MAX(a.REGION_NAME), " .
						"	   MAX(a.ACC_ZIP_CODE),  " .
						"	   MAX(a.NPWP), " .
						"	   MAX(b.DUE_DATE) " .
						"from t_invoice a, " .
						"	 t_line_invoice b, " .
						"	 t_invoice_component c " .
						"where a.t_invoice_id = b.t_invoice_id " .
						"	 and b.t_line_invoice_id = c.t_line_invoice_id" .
						"	 and a.input_data_control_id = " . INPUT_DATA_CONTROL_ID . "" .
						" 	 and a.CUSTOMER_ACCOUNT_ID = " . CUSTOMER_ACCOUNT_ID . "" .
						"Group By a.ACC_NUMBER ";
	
	
						
	$query_summary2 = "select sum(c.CHARGE_AMOUNT_HC) as sumCHARGE_AMOUNT_HC, " .
						"	  sum(c.VAT_AMOUNT_HC) as sumVAT_AMOUNT_HC " .
						"from t_invoice a, " .
						"	 t_line_invoice b, " .
						"	 t_invoice_component c " .
						"where a.t_invoice_id = b.t_invoice_id " .
						"	 and b.t_line_invoice_id = c.t_line_invoice_id" .
						"	 and a.input_data_control_id = " . INPUT_DATA_CONTROL_ID . "" .
						" 	 and a.CUSTOMER_ACCOUNT_ID = " . CUSTOMER_ACCOUNT_ID . "" .
						"Group By a.ACC_NUMBER ";				
	$query = "select  b.SERVICE_NO, " .
						"	   b.SERVICE_TYPE_CODE, " .
						"	   c.INVOICE_COMPONENT_CODE, " .
						"	   c.CHARGE_AMOUNT_HC, " .
						"	   c.VAT_AMOUNT_HC " .
						"from t_invoice a, " .
						"	 t_line_invoice b, " .
						"	 t_invoice_component c " .
						"where a.t_invoice_id = b.t_invoice_id " .
						"	 and b.t_line_invoice_id = c.t_line_invoice_id" .
						"	 and a.input_data_control_id = " . INPUT_DATA_CONTROL_ID . "" .
						" 	 and a.CUSTOMER_ACCOUNT_ID = " . CUSTOMER_ACCOUNT_ID . "";

}
$dbConn->query($query);
while ($dbConn->next_record()) {
		$data["SERVICE_NO"][] = $dbConn->f("SERVICE_NO");
		$data["SERVICE_TYPE_CODE"][] = $dbConn->f("SERVICE_TYPE_CODE");
		$data["INVOICE_COMPONENT_CODE"][] = $dbConn->f("INVOICE_COMPONENT_CODE");
		$data["CHARGE_AMOUNT_HC"][] = $dbConn->f("CHARGE_AMOUNT_HC");
		$data["VAT_AMOUNT_HC"][] = $dbConn->f("VAT_AMOUNT_HC");
}


$dbConn->close();

class FormCetak extends FPDF {
	var $fontSize = 10;
	var $fontFam = 'Arial';
	var $yearId = 0;
	var $yearCode="";
	var $paperWSize = 330;
	var $paperHSize = 215;
	var $height = 5;
	var $currX;
	var $currY;
	var $widths;
	var $aligns;
	
	function FormCetak() {
		$this->FPDF();
	}
	
	function __construct() {
		$this->FormCetak();
		$this->startY = $this->GetY();
		$this->startX = $this->paperWSize-72;
		$this->lengthCell = $this->startX+20;
	}
	/*
	function Header() {
		
	}
	*/
	
	function PageCetak($data, $user, $tgl_penerimaan) {
		$kabid = CCGetFromGet('kabid');
		$data_summary1=array();
		
		$dbConn = new clsDBConnSIKP();
		$dbConn->query($query_summary1);
		while($dbConn->next_record()){
			$data_summary1["INVOICE_NO"][] = $dbConn->f("INVOICE_NO");
			$data_summary1["INVOICE_DATE"][] = $dbConn->f("INVOICE_DATE");
			$data_summary1["ACC_NUMBER"][] = $dbConn->f("ACC_NUMBER");
			$data_summary1["LAST_NAME"][] = $dbConn->f("LAST_NAME");
			$data_summary1["ADDRESS"][] = $dbConn->f("ADDRESS");
			$data_summary1["REGION_NAME"][] = $dbConn->f("REGION_NAME");
			$data_summary1["ACC_ZIP_CODE"][] = $dbConn->f("ACC_ZIP_CODE");
			$data_summary1["NPWP"][] = $dbConn->f("NPWP");
			$data_summary1["DUE_DATE"][] = $dbConn->f("DUE_DATE");
		}
		
		$dbConn->query($query_summary2);
		while($dbConn->next_record()){
				$data_summary2["sumCHARGE_AMOUNT_HC"][] = $dbConn->f("sumCHARGE_AMOUNT_HC");
				$data_summary2["sumVAT_AMOUNT_HC"][] = $dbConn->f("sumVAT_AMOUNT_HC");
		}
		$dbConn->close();
		
		
		
		$this->AliasNbPages();
		$this->AddPage("L");
		$this->SetFont('Arial', '', 10);
		
				
		$lheader = $this->lengthCell / 40;
		$lheader1 = $lheader * 1;
		$lheader4 = $lheader * 4;
		$lheader8 = $lheader * 8;
		$lheader10 = $lheader * 10;
		$lheader12 = $lheader * 12;
		$lheader18 = $lheader * 18;
		
		$this->Cell($lheader8, $this->height, "", "", 0, 'C');
		$this->Cell($lheader10, $this->height, "", "", 0, 'C');
		$this->Cell($lheader10, $this->height, "", "", 0, 'C');
		$this->Cell($lheader12, $this->height, "Billing No. : " . $data_summary1["INVOICE_NO"][] . "" , "", 0, 'C');
		$this->Ln();
		
		$this->Image('../images/logo_pemda.png',15,13,25,25);
		$this->Cell($lheader1, $this->height, "", "", 0, 'C');
		$this->Cell($lheader18, $this->height, "BILLING STATEMENT", "", 0, 'C');
		$this->Cell($lheader1, $this->height, "", "", 0, 'C');
		$this->Cell($lheader12, $this->height, "NOMOR PELANGGAN \n Subscriber Number", "", 0, 'C');
		$this->Ln();
		$this->Cell($lheader8, $this->height, "", "", 0, 'L');
		$this->Cell($lheader10, $this->height, "", "", 0, 'L');
		$this->Cell($lheader10, $this->height, "", "", 0, 'C');
		$this->Cell($lheader12, $this->height, "". $data_summary1["ACC_NUMBER"][] ."", "", 0, 'C');
		$this->Ln();
		$this->Cell($lheader8, $this->height, "TANGGAL TAGIHAN \n Billing Date", "L", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$this->Cell($lheader8, $this->height, "TANGGAL JATUH TEMPO \n Payment Due Date", "L", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$this->Cell($lheader8, $this->height, "HARAP DIBAYAR \n Please Pay", "L", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "L", 0, 'L');
		$this->Cell($lheader8, $this->height, "TAGIHAN BULAN INI \n Current Charge", "L", 0, 'L');
		$this->Cell($lheader4, $this->height, "". $data_summary2["sumCHARGE_AMOUNT_HC"][] ."", "R", 0, 'C');
		$this->Ln();
		
		$this->Cell($lheader8, $this->height, "", "", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "", 0, 'L');
		$this->Cell($lheader8, $this->height, "", "", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "", 0, 'L');
		$this->Cell($lheader8, $this->height, "", "", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "", 0, 'L');
		$this->Cell($lheader8, $this->height, "PPN/VAT", "", 0, 'L');
		$this->Cell($lheader4, $this->height, "". $data_summary2["sumVAT_AMOUNT_HC"][] ."", "R", 0, 'C');
		$this->Ln();
		
		$HarapDibayar=$data_summary2["sumCHARGE_AMOUNT_HC"][]+$data_summary2["sumVAT_AMOUNT_HC"][];
		$this->Cell($lheader8, $this->height, "". $data_summary2["INVOICE_DATE"][] ."", "", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "", 0, 'L');
		$this->Cell($lheader8, $this->height, "". $data_summary2["DUE_DATE"][] ."", "", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "", 0, 'L');
		$this->Cell($lheader8, $this->height, "".$HarapDibayar."", "", 0, 'L');
		$this->Cell($lheader1, $this->height, "", "", 0, 'L');
		$this->Cell($lheader8, $this->height, "BEA MATERAI \n Stamp Duty Change", "", 0, 'L');
		$this->Cell($lheader4, $this->height, "0", "R", 0, 'C');
		$this->Ln();
		
		$this->Cell($lheader*28, $this->height, "" . $data_summary1["LAST_NAME"][] ."", "", 0, 'L');
		$this->Cell($lheader12, $this->height, "PT. TRIKLIN REKATAMA", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*28, $this->height, "" . $data_summary1["ADDRESS"][] ."", "", 0, 'L');
		$this->Cell($lheader12, $this->height, "Jl. Danau Towuti Blok E II", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*28, $this->height, "" . $data_summary1["REGION_NAME"][] ."", "", 0, 'L');
		$this->Cell($lheader12, $this->height, "No. 20 Pejompongan", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*28, $this->height, "" . $data_summary1["ACC_ZIP_CODE"][] ."", "", 0, 'L');
		$this->Cell($lheader12, $this->height, "Jakarta Pusat", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*40, $this->height, "", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*17, $this->height, "NPWP NO. " . $data_summary1["NPWP"][] . "", "", 0, 'L');		
		$this->Cell($lheader*23, $this->height, "", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*40, $this->height, "", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*40, $this->height, "", "", 0, 'L');
		$this->Ln();		
		$this->Cell($lheader*40, $this->height, "BILL DETAIL", "", 0, 'L');
		$this->Ln();		
		
				
		$ltable = $this->lengthCell / 33;
		$ltable1 = $ltable * 1;
		$ltable5 = $ltable * 5;
		$ltable10 = $ltable * 10;
		
		$this->Cell($ltable5, $this->height + 2, "SUBSCRIPTION NO.", "B", 0, 'C');
		$this->Cell($ltable1, $this->height + 2, "", "B", 0, 'C');
		$this->Cell($ltable10, $this->height + 2, "SERVICE NO.", "B", 0, 'C');
		$this->Cell($ltable1, $this->height + 2, "", "B", 0, 'C');
		$this->Cell($ltable10, $this->height + 2, "DESCRIPTION", "B", 0, 'C');
		$this->Cell($ltable1, $this->height + 2, "", "B", 0, 'C');
		$this->Cell($ltable5, $this->height + 2, "CHARGE", "B", 0, 'C');
		$this->Ln();

		//isi kolom
		$this->SetWidths(array($ltable5, $ltable10, $ltable10, $ltable5));
		$this->SetAligns(array("C", "L", "L", "L", "L", "R"));
				
		for ($i = 0; $i < count($data['SERVICE_NO']); $i++) {
			//print data
			$this->RowMultiBorderWithHeight(array($data["SERVICE_NO"][$i],
												  "",
												  $data["SERVICE_TYPE_CODE"][$i],
												  "",
												  $data["INVOICE_COMPONENT_CODE"][$i],
												  "",
												  number_format($data["CHARGE_AMOUNT_HC"][$i], 0, ',', '.')
												  ),
											array('',
												  '',
												  '',
												  '',
												  '',
												  '',
												  ''
												  )
												  ,$this->height);
			
			
			
			$this->SetFont('Arial', '', 10);
		}

	}

	function newLine(){
		$this->Cell($this->lengthCell, $this->height, "", "", 0, 'L');
		$this->Ln();
	}
	
	function kotakKosong($pembilang, $penyebut, $jumlahKotak){
		$lkotak = $pembilang / $penyebut * $this->lengthCell;
		for($i = 0; $i < $jumlahKotak; $i++){
			$this->Cell($lkotak, $this->height, "", "LR", 0, 'L');
		}
	}
	
	function kotak($pembilang, $penyebut, $jumlahKotak, $isi){
		$lkotak = $pembilang / $penyebut * $this->lengthCell;
		for($i = 0; $i < $jumlahKotak; $i++){
			$this->Cell($lkotak, $this->height, $isi, "TBLR", 0, 'C');
		}
	}
	
	function getNumberFormat($number, $dec) {
			if (!empty($number)) {
				return number_format($number, $dec);
			} else {
				return "";
			}
	}
	
	function SetWidths($w)
	{
	    //Set the array of column widths
	    $this->widths=$w;
	}

	function SetAligns($a)
	{
	    //Set the array of column alignments
	    $this->aligns=$a;
	}

	function Row($data)
	{
	    //Calculate the height of the row
	    $nb=0;
	    for($i=0;$i<count($data);$i++)
	        $nb=max($nb, $this->NbLines($this->widths[$i], $data[$i]));
	    $h=5*$nb;
	    //Issue a page break first if needed
	    $this->CheckPageBreak($h);
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
	        $w=$this->widths[$i];
	        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
	        //Draw the border
	        $this->Rect($x, $y, $w, $h);
	        //Print the text
	        $this->MultiCell($w, 5, $data[$i], 0, $a);
	        //Put the position to the right of the cell
	        $this->SetXY($x+$w, $y);
	    }
	    //Go to the next line
	    $this->Ln($h);
	}

	function CheckPageBreak($h)
	{
	    //If the height h would cause an overflow, add a new page immediately
	    if($this->GetY()+$h>$this->PageBreakTrigger)
	        $this->AddPage($this->CurOrientation);
	}
	
	function RowMultiBorderWithHeight($data, $border = array(),$height)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=$height*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			//$this->Rect($x,$y,$w,$h);
			$this->Cell($w, $h, '', isset($border[$i]) ? $border[$i] : 1, 0);
			$this->SetXY($x,$y);
			//Print the text
			$this->MultiCell($w,$height,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}
	
	function NbLines($w, $txt)
	{
	    //Computes the number of lines a MultiCell of width w will take
	    $cw=&$this->CurrentFont['cw'];
	    if($w==0)
	        $w=$this->w-$this->rMargin-$this->x;
	    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	    $s=str_replace("\r", '', $txt);
	    $nb=strlen($s);
	    if($nb>0 and $s[$nb-1]=="\n")
	        $nb--;
	    $sep=-1;
	    $i=0;
	    $j=0;
	    $l=0;
	    $nl=1;
	    while($i<$nb)
	    {
	        $c=$s[$i];
	        if($c=="\n")
	        {
	            $i++;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	            continue;
	        }
	        if($c==' ')
	            $sep=$i;
	        $l+=$cw[$c];
	        if($l>$wmax)
	        {
	            if($sep==-1)
	            {
	                if($i==$j)
	                    $i++;
	            }
	            else
	                $i=$sep+1;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	        }
	        else
	            $i++;
	    }
	    return $nl;
	}
	
	function Footer() {
		
	}
	
	function __destruct() {
		return null;
	}
}

$formulir = new FormCetak();
$formulir->PageCetak($data, $user, $tgl_penerimaan);
$formulir->Output();

?>
