<?php
require('fpdf/fpdf.php'); // Asegúrate de que la ruta a fpdf.php sea correcta

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('imgs/Logo.jpeg', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->Cell(0, 10, 'TICKET DEPORT', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Tabla simple
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach ($header as $col) {
            $this->Cell(60, 7, $col, 1);
        }
        $this->Ln();
        // Datos
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(60, 6, $col, 1);
            }
            $this->Ln();
        }
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Datos del ticket
$header = array('CANT', 'PRODUCTO', 'PRECIO');
$data = [
    [1.00, 'Jabon De Avena', '$50'],
    [2.00, 'Jabon De Menta', '$30'],
    [1.00, 'Jabon De Oliva', '$25'],
    ['', 'TOTAL', '$105']
];

// Fuente
$pdf->SetFont('Arial', '', 12);

// Añadir fecha y hora
$fechaHora = date('d/m/Y h:i A');
$pdf->Cell(0, 10, $fechaHora, 0, 1, 'C');
$pdf->Ln(10);

// Tabla
$pdf->BasicTable($header, $data);
$pdf->Ln(10);

// Mensaje de agradecimiento
$pdf->Cell(0, 10, '¡GRACIAS POR SU COMPRA!', 0, 1, 'C');

$pdf->Output();
?>