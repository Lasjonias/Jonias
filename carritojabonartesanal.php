    <!DOCTYPE html>
    <html>
    <head>
        <title>Tienda De Motos Deportivas</title>
        <h1>Carrito De Compras </h1>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
            body {
                background-image: url('imgs/FondoPagina1.png');
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0 auto;
                max-width: 1200px;
            }
            .product-image {
                height: 120px;
                width: 150px;
                object-fit: cover;
                margin-right: 10px;
                transition: transform .2s;
            }
            .quantity {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #numero {
                width: 50px;
            }
            h1 {
                color: #000;
                text-align: center;
                font-family: 'Montserrat', sans-serif;
                margin: 24px auto;
            }
            .button1, .btn, .submits, .sign-up {
                background-color: transparent;
                background-image: linear-gradient(#fff, #f5f5fa);
                border: 0 solid #003dff;
                border-radius: 9999px;
                box-shadow: rgba(60, 80, 97, .50) 0 200px 11px 0, rgba(93, 100, 148, .2) 0 1px 3px 0;
                box-sizing: border-box;
                color: #484c7a;
                cursor: pointer;
                display: inline-block;
                font-family: Hind, system-ui, BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
                font-weight: 600;
                margin: 4px;
                padding: 16px 24px;
                text-align: center;
                text-decoration: inherit;
                text-wrap: nowrap;
                transition: all .1s ease-out;
                transition-behavior: normal;
                white-space-collapse: collapse;
                line-height: 1.15;
            }
            @media (min-width: 576px) {
                .button1, .btn, .submits, .sign-up {
                    padding-bottom: 10px;
                    padding-top: 10px;
                }
            }
            .button1, .btn, .submits, .sign-up:after, .button-24:before, .div-flex-items-center-justify-center:after, .div-flex-items-center-justify-center:before, .span-flex-items-center-h-16-w-auto-mr-8-py-2-flex-grow-0-flex-shrink-0-fill-current:after, .span-flex-items-center-h-16-w-auto-mr-8-py-2-flex-grow-0-flex-shrink-0-fill-current:before, .svg-block-h-full:after, .svg-block-h-full:before {
                border: 0 solid #003dff;
                box-sizing: border-box;
            }
            .button1, .btn, .submits, .sign-up:hover {
                box-shadow: rgba(37, 44, 97, .15) 0 8px 22px 0, rgba(93, 100, 148, .2) 0 4px 6px 0;
            }
            .button1:disabled {
                cursor: not-allowed;
                opacity: .5;
            }
            .product-image:hover {
                transform: scale(1.1);
            }
            .product-image.rotate {
                transition: transform .5s;
            }
            .product-image.rotate:hover {
                transform: rotate(360deg);
            }
            .product-image.zoom {
                transition: transform .5s;
            }
            .product-image.zoom:hover {
                transform: scale(1.5);
            }
            .product-image.slide-left {
                transition: transform .5s;
            }
            .product-image.slide-left:hover {
                transform: translateX(-50px);
            }
            .product-image.slide-right {
                transition: transform .5s;
            }
            .product-image.slide-right:hover {
                transform: translateX(50px);
            }
            .remove-button {
                background-color: red;
                color: white;
                border: none;
                padding: 5px;
                border-radius: 50%;
                cursor: pointer;
                display: inline-block;
                margin-left: 10px;
            }
            .remove-button:hover {
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            }
            .cart-table {
                width: 100%;
                border-collapse: collapse;
            }
            .cart-table th,
            .cart-table td {
                /* From https://css.glass */
                background: rgba(255, 255, 255, 0.06);
                backdrop-filter: blur(7.2px);
                -webkit-backdrop-filter: blur(7.2px);
                font-family: 'Montserrat', sans-serif;
                padding: 10px;
                border-radius:  8px;
                border: none;
            }
            .cart-table th {
                background-color: #f2f2f2;
                font-weight: bold;
            }
            .total-row {
                font-weight: bold;
            }
            .alert-box {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                text-align: center;
                padding-top: 20%;
                font-size: 24px;
                color: white;
            }
            .alert-box.show {
                display: block;
            }
            input[type="number"] {
                display: block;
                margin: 15px auto;
                padding: 10px 15px;
                width: 250px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 25px;
                transition: border-color 0.3s, box-shadow 0.3s;
                outline: none;
            }
            input[type="number"]:focus {
                border-color: #000000;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
            }
        </style>
        <script>
            function calculateTotal() {
                var total = 0; 
                var rows = document.querySelectorAll('.cart-table tbody tr');
                for (var i = 0; i < rows.length; i++) {
                    var price = parseFloat(rows[i].querySelector('.price').innerText.replace('$', ''));
                    var quantity = parseInt(rows[i].querySelector('.quantity input').value);
                    if (!isNaN(price) && !isNaN(quantity)) { 
                        total += price * quantity;
                    }
                }
                if (!isNaN(total)) { 
                    alert("Total a pagar: $" + total.toFixed(2));
                    window.location.href = 'Datos.php';
                } else {
                    alert("Error: Uno de los valores no es un número.");
                }
            }

            function incrementar() {
                var valor = parseInt(document.getElementById('numero').value, 0);
                valor = isNaN(valor) ? 0 : valor;
                valor += 1;
                document.getElementById('numero').value = valor;
            } 
            function decrementar() {
                var valor = parseInt(document.getElementById('numero').value, 0);
                valor = isNaN(valor) ? 0 : valor;
                if (valor > 1) {
                    valor -= 1;
                }
                document.getElementById('numero').value = valor;
            }
            function resetInputs() {
                const inputs = document.querySelectorAll('input[type="number"]');
                inputs.forEach(input => {
                    input.value = 0;
                });
            }
        </script>
    </head>
    <body>
        <form action="guardar_productos.php" method="post">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="product-name">
                                <h3>Producto 1</h3>
                                <p>Jabon de Cafe</p>
                                <input type="hidden" name="productos[0][nombre]" value="Producto 1">
                                <input type="hidden" name="productos[0][descripcion]" value="Jabon de Cafe">
                                <input type="hidden" name="productos[0][imagen]" value="imgs/JabonCafe.jpg">
                            </div>
                        </td>
                        <td>
                            <img src="imgs/JabonCafe.jpg" class="product-image rotate">
                        </td>
                        <td class="price">$70.00</td>
                        <td class="quantity">
                            <button type="button" class="sign-up" onclick="decrementar()">-</button>
                            <input type="number" name="productos[0][cantidad]" id="numero" value="0" min="0">
                            <button type="button" class="sign-up" onclick="incrementar()">+</button>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-name">
                                <h3>Producto 2</h3>
                                <p>Jabon de Menta</p>
                                <input type="hidden" name="productos[1][nombre]" value="Producto 2">
                                <input type="hidden" name="productos[1][descripcion]" value="Jabon de Menta">
                                <input type="hidden" name="productos[1][imagen]" value="imgs/JabonMenta.jpg">
                            </div>
                        </td>
                        <td>
                            <img src="imgs/JabonMenta.jpg" class="product-image zoom">
                        </td>
                        <td class="price">$60.00</td>
                        <td>
                            <div class="quantity">
                                <input type="number" name="productos[1][cantidad]" id="numero" value="1" min="0">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="remove-button" onclick="resetInputs()"></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-name">
                                <h3>Producto 3</h3>
                                <p>Jabon de Platano</p>
                                <input type="hidden" name="productos[2][nombre]" value="Producto 3">
                                <input type="hidden" name="productos[2][descripcion]" value="Jabon de Platano">
                                <input type="hidden" name="productos[2][imagen]" value="imgs/JabonPlatano.jpg">
                            </div>
                        </td>
                        <td>
                            <img src="imgs/JabonPlatano.jpg" class="product-image slide-left">
                        </td>
                        <td class="price">$55.00</td>
                        <td>
                            <div class="quantity">
                                <input type="number" name="productos[2][cantidad]" id="numero" value="1" min="0">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="remove-button" onclick="resetInputs()"></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-name">
                                <h3>Producto 4</h3>
                                <p>Jabon de Frutos Rojos </p>
                                <input type="hidden" name="productos[3][nombre]" value="Producto 4">
                                <input type="hidden" name="productos[3][descripcion]" value="Jabon de Frutos Rojos">
                                <input type="hidden" name="productos[3][imagen]" value="imgs/JabonFrutosRojos.jpg">
                            </div>
                        </td>
                        <td>
                            <img src="imgs/JabonFrutosRojos.jpg" class="product-image slide-right">
                        </td>
                        <td class="price">$50.00</td>
                        <td>
                            <div class="quantity">
                                <input type="number" name="productos[3][cantidad]" id="numero" value="1" min="0">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="remove-button" onclick="resetInputs()"></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="product-name">
                                <h3>Producto 5</h3>
                                <p>Jabon de Ecencias</p>
                                <input type="hidden" name="productos[4][nombre]" value="Producto 5">
                                <input type="hidden" name="productos[4][descripcion]" value="Jabon de Ecencias">
                                <input type="hidden" name="productos[4][imagen]" value="imgs/JabonEsencias.jpg">
                            </div>
                        </td>
                        <td>
                            <img src="imgs/JabonEsencias.jpg" class="product-image zoom">
                        </td>
                        <td class="price">$30.00</td>
                        <td>
                            <div class="quantity">
                                <input type="number" name="productos[4][cantidad]" id="numero" value="1" min="0">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="remove-button" onclick="resetInputs()">
                                
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="button1" onclick="resetInputs()">Vaciar Carrito</button>
            <button type="button" class="button1" onclick="calculateTotal()">Calculo Total</button>
           
        </form>
    </body>
    </html>