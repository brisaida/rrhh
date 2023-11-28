<?php


   require '../../../assets/vendor/fpdf/fpdf.php';
   	 

    // Instanciamos de la clase padre
    class PDF extends FPDF {
        // Definimos el encabezado de los reportes correspondientes
        function Header() {
	        $this->SetFillColor(255); 
	        $this->SetTextColor(0); 
	        $this->SetXY(0,0);
	        $this->Cell(300, 30, "", 0, 1, 'C', true);

        

        }
		
        function Footer() {

			
			$this->SetFont('Arial','I',9);
			$this->setxy(15,266);
			$this->Cell(170,10,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Página').$this->PageNo(),0,0,'R');
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
		    // ... Otros métodos y propiedades de tu clase ...

			function NbLines($w, $txt) {
				// Calcula el número de líneas un MultiCell de ancho w ocupará
				$cw = &$this->CurrentFont['cw'];
				if($w == 0) {
					$w = $this->w - $this->rMargin - $this->x;
				}
				$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
				$s = str_replace("\r", '', $txt);
				$nb = strlen($s);
				if($nb > 0 && $s[$nb - 1] == "\n") {
					$nb--;
				}
				$sep = -1;
				$i = 0;
				$j = 0;
				$l = 0;
				$nl = 1;
				while($i < $nb) {
					$c = $s[$i];
					if($c == "\n") {
						$i++;
						$sep = -1;
						$j = $i;
						$l = 0;
						$nl++;
						continue;
					}
					if($c == ' ') {
						$sep = $i;
					}
					$l += $cw[$c];
					if($l > $wmax) {
						if($sep == -1) {
							if($i == $j) {
								$i++;
							}
						} else {
							$i = $sep + 1;
						}
						$sep = -1;
						$j = $i;
						$l = 0;
						$nl++;
					} else {
						$i++;
					}
				}
				return $nl;
			}

	
    }
?>


