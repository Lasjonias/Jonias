<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styl.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('imgs/JabonBanner.jpg') no-repeat center center/cover;
        }
        .ticket {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: auto;
        }
        .centrado {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .cantidad, .producto, .precio {
            border: 1px solid black;
            padding: 5px;
        }
        .button1 {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <center>
    <div class="ticket" id="ticket">
        <img src="imgs/Logo.jpeg" alt="Logotipo" height="100" width="100">
        <p class="centrado">TICKET
            <br>DEPORT
            <br><span id="ticketTime"></span></p>
                       <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre = $_POST['name'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $genero = $_POST['genero'];

    
    echo "<h4>Datos Ingresados:</h4>";
    echo "Nombre: " . $nombre . "<br>";
    echo "Apellido Paterno: " . $apellidoPaterno . "<br>";
    echo "Apellido Materno: " . $apellidoMaterno . "<br>";
    echo "Calle: " . $calle . "<br>";
    echo "Número: " . $numero . "<br>";
    echo "Colonia: " . $colonia . "<br>";
    echo "Municipio: " . $municipio . "<br>";
    echo "Género: " . $genero;
}
?>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">$$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cantidad">1.00</td>
                    <td class="producto">Jabon De Avena</td>
                    <td class="precio">$50</td>
                </tr>
                <tr>
                    <td class="cantidad">2.00</td>
                    <td class="producto">Jabon De Menta</td>
                    <td class="precio">$30</td>
                </tr>
                <tr>
                    <td class="cantidad">1.00</td>
                    <td class="producto">Jabon De Oliva</td>
                    <td class="precio">$25</td>
                </tr>
                <tr>
                    <td class="cantidad"></td>
                    <td class="producto">TOTAL</td>
                    <td class="precio">$105</td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!</p>
    </div>
    <button class="button1" onclick="downloadPDF()">Descargar Ticket en PDF</button>
    </center>
    <script>

        function mostrarHora() {
            var ahora = new Date();
            var hora = ahora.getHours();
            var minutos = ahora.getMinutes();
            var ampm = hora >= 12 ? 'p.m.' : 'a.m.';
            hora = hora % 12;
            hora = hora ? hora : 12;
            minutos = minutos < 10 ? '0' + minutos : minutos;
            var horaActual = hora + ':' + minutos + ' ' + ampm;
            
            document.getElementById('ticketTime').textContent = ahora.toLocaleDateString() + ' ' + horaActual;
        }
        mostrarHora();

        function downloadPDF() {
            var { jsPDF } = window.jspdf;
            var doc = new jsPDF();

            doc.setFont('Montserrat', 'normal');
            doc.text('TICKET DEPORT', 105, 20, { align: 'center' });
            doc.text(document.getElementById('ticketTime').textContent, 105, 30, { align: 'center' });

            var img = new Image();
            img.src = 'imgs/Logo.jpeg';
            img.onload = function () {
                doc.addImage(img, 'JPEG', 80, 40, 50, 50);
                doc.text('CANT  PRODUCTO  PRECIO', 20, 100);

                var items = [
                    ['1.00', 'Jabon De Avena', '$50'],
                    ['2.00', 'Jabon De Menta', '$30'],
                    ['1.00', 'Jabon De Oliva', '$25'],
                    ['', 'TOTAL', '$105']
                ];

                var startY = 110;
                items.forEach(function(item) {
                    doc.text(item.join('  '), 20, startY);
                    startY += 10;
                });

                doc.text('¡GRACIAS POR SU COMPRA!', 105, startY + 20, { align: 'center' });

                doc.save('ticket.pdf');
            };
        }
    </script>
</body>
</html>