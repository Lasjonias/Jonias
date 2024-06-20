<!DOCTYPE html>
<html>
<head>
    <title>Registro De Datos | Tienda De Jabones</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 130%;
            background: url('imgs/JabonBanner.jpg') no-repeat center center/cover;
            filter: blur(5px); 
            z-index: -1;
        }
        .titulo {
            font-size: 30px; 
            font-family: 'Arial', sans-serif;
            color: #333; 
            text-align: center; 
            margin-top: 20px; 
            margin-bottom: 20px; 
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .texto {
            font-family: 'Montserrat', sans-serif;
            display: block; 
            font-size: 18px; 
            font-weight: 550; 
            margin-bottom: 10px;
        }
        input[type='text'] {
            width: 225px;
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        button[type='submit'], .minimalista {
            background-color: transparent;
            color: #333;
            border: 2px solid #333;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        button[type='submit']:hover, .minimalista:hover {
            background-color: #333;
            color: #fff;
        }
        #purchase-form {
            font-family: Arial, sans-serif;
            font-size: 20px;
        }
        .subtitulo {
            font-family: Arial, sans-serif;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="titulo">REGISTRAR DATOS</div>
    <br><br>
    <center>
        <form id="purchase-form" action="Ticket.php" method="post">
            <label for="name" class="texto">Nombre:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="Apellidop" class="texto">Apellido Paterno:</label><br>
            <input type="text" id="Apellidop" name="apellidoPaterno" required><br><br>

            <label for="Apellidom" class="texto">Apellido Materno:</label><br>
            <input type="text" id="Apellidom" name="apellidoMaterno" required><br><br>

            <sub class="subtitulo">Dirección</sub><br><br>

            <label for="calle" class="texto">Calle:</label><br>
            <input type="text" id="calle" name="calle" required><br><br>

            <label for="numero" class="texto">Número:</label><br>
            <input type="text" id="numero" name="numero" required><br><br>

            <label for="colonia" class="texto">Colonia:</label><br>
            <input type="text" id="colonia" name="colonia" required><br><br>

            <label for="municipality" class="texto">Municipio:</label><br>
            <select id="municipality" name="municipio" required>
                <option value="laPaz">La Paz</option>
                <option value="chimalhuacan">Chimalhuacán</option>
                <option value="nezahualcoyotl">Nezahualcóyotl</option>
                <option value="chicoloapan">Chicoloapan</option>
            </select><br><br>

            <div class="form-group">
                <label for="genero" class="texto">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            
           <input type="submit" class="minimalista" value="Ver Ticket">
        </form>
    </center>
   
</body>
</html>