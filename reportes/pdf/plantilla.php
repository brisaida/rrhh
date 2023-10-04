<?php


   require '../../../../assets/vendor/fpdf/fpdf.php';
 /*   if (!isset($_SESSION)) {
       session_start();		
   }	 */

    // Instanciamos de la clase padre
    class PDF extends FPDF {
        // Definimos el encabezado de los reportes correspondientes
        function Header() {
	        $this->SetFillColor(255); 
	        $this->SetTextColor(0); 
	        $this->SetXY(0,0);
	        $this->Cell(300, 30, "", 0, 1, 'C', true);

            // coordenadas(x,y para posicionamiento)
           /*  

            
        
            $this->SetXY(77,15);
            $this->SetFont('Arial','B',11);
            $this->Cell(195,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'FUNDACIÓN COHONDUCAFÉ'));   
            $this->Ln();

            //Fecha y hora generada por el reporte
	        $this->SetFont('Arial','B',10);
	        $this->SetXY(160,25);
	        $this->MultiCell(125,8,'Fecha:');
	        $this->SetFont('Arial','',10);
	        $this->SetXY(172,25);
	        $this->MultiCell(60,8,iconv("UTF-8", "ISO-8859-1//TRANSLIT", date("d") . " del " . date("m") . " de " . date("Y"))); */


            
	        // Logotipo (espacio esquina izquierda, superior, ancho, alto)
	     /*    $this->Image('../../../../assets/img/brand/bosques.png', 7, 6, 55,18 );*/
            $this->Image('../../../../assets/images/brand/header.png', 15, 8, 180,25 );
            $this->Ln(); 


			/* $this->SetXY(75,40);
            $this->SetFillColor(232,232,232);
            $this->SetFont('Arial','B',14);
            $this->Cell(200,10, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'FICHA DE EMPLEADO')); */
        }
		
        function Footer() {
            /* $this->SetFont('Arial','',9);
			$this->SetXY(10,250);
			$this->MultiCell(250,75,'usario-sistema');
			
			$this->SetFont('Arial','B',10);
			$this->SetXY(10,245);
            $this->MultiCell(250,75,'Impreso por');
			$this->setxy(143,230); */

			
			
			$this->SetFont('Arial','I',9);
			$this->setxy(15,275);
			$this->Cell(0,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Página').$this->PageNo(),0,0,'C');
        }



		var $widths;
		var $aligns;

		function SetWidths($w) {
    		// Set the array of column widths
    		$this->widths=$w;
		}

		function SetAligns($a) {
			// Set the array of column alignments
    		$this->aligns=$a;
		}

	
    }
?>


