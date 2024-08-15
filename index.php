<html>

<head>
    <base href="/">
    <title>BENDEY - Sistema de Gestión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #29cbb0;
            --secondary-color: #5aaded;
            --accent-color: #f5915b;
            --highlight-color: #d177d3;
            --background-color: #f0f0f0;
            --text-color: #333;
            --card-bg: #ffffff;
            --hover-color: #e0e0e0;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        .dark-mode {
            --background-color: #1a1a1a;
            --text-color: #f0f0f0;
            --card-bg: #2c2c2c;
            --hover-color: #3a3a3a;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1,
        h2 {
            color: var(--primary-color);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            margin-top: 0;
            color: #000000;
            font-size: 1.2em;
        }

        .card p {
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0;
            color: var(--primary-color);
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn:hover {
            background-color: var(--secondary-color);
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 30px;
            background-color: var(--card-bg);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--hover-color);
        }

        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:nth-child(even) {
            background-color: var(--hover-color);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: var(--card-bg);
            margin: 10% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close:hover,
        .close:focus {
            color: var(--primary-color);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input,
        select {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus,
        select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(41, 203, 176, 0.2);
            outline: none;
        }

        #darkModeToggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background-color: var(--secondary-color);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        #darkModeToggle:hover {
            background-color: var(--primary-color);
            transform: scale(1.1);
        }

        #darkModeToggle i {
            color: white;
            font-size: 24px;
        }

        .status-available {
            color: green;
            font-weight: bold;
        }

        .status-sold-out {
            color: red;
            font-weight: bold;
        }

        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #ff3333;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div id="darkModeToggle">
        <i class="fas fa-moon"></i>
    </div>
    <div class="container">
        <h1><i class="fas fa-chart-line"></i> BENDEY - Dashboard</h1>
        <div class="dashboard">
            <div class="card" style="background-color: var(--primary-color);">
                <h3><i class="fas fa-dollar-sign"></i> Capital</h3>
                <p id="capitalDisplay">$0.00</p>
            </div>
            <div class="card" style="background-color: var(--secondary-color);">
                <h3><i class="fas fa-wallet"></i> Monto Disponible</h3>
                <p id="montoDisponibleDisplay">$0.00</p>
            </div>
            <div class="card" style="background-color: var(--accent-color);">
                <h3><i class="fas fa-chart-bar"></i> Ganancias</h3>
                <p id="gananciasDisplay">$0.00</p>
            </div>
        </div>

        <div class="button-group">
            <button onclick="openModal('comprasModal')" class="btn"><i class="fas fa-shopping-cart"></i> Agregar
                Compra</button>
            <button onclick="openModal('ventasModal')" class="btn"><i class="fas fa-cash-register"></i> Agregar
                Venta</button>
            <button onclick="openModal('reservasModal')" class="btn"><i class="fas fa-calendar-check"></i> Agregar
                Reserva</button>
        </div>

        <h2><i class="fas fa-history"></i> Compras Recientes</h2>
        <table id="comprasTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="comprasTableBody"></tbody>
        </table>

        <h2><i class="fas fa-chart-line"></i> Ventas Recientes</h2>
        <table id="ventasTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="ventasTableBody"></tbody>
        </table>

        <h2><i class="fas fa-bookmark"></i> Reservas</h2>
        <table id="reservasTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Cliente</th>
                    <th>Monto Reservado</th>
                    <th>Monto Faltante</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="reservasTableBody"></tbody>
        </table>
    </div>

    <div id="comprasModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('comprasModal')">&times;</span>
            <h2><i class="fas fa-shopping-cart"></i> Agregar Compra</h2>
            <!-- <form id="comprasForm">
                <input type="text" name="producto" placeholder="Producto" required>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <input type="number" name="precioUnitario" step="0.01" placeholder="Precio Unitario" required>
                <button type="submit" class="btn">Agregar Compra</button>
            </form> -->
            <form id="comprasForm" action="db_operations.php" method="POST">
                <input type="text" name="producto" placeholder="Producto" required>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <input type="number" name="precioUnitario" step="0.01" placeholder="Precio Unitario" required>
                <input type="hidden" name="total" id="totalCompra">
                <input type="hidden" name="estado" value="Disponible">
                <input type="hidden" name="add_compra" value="1">
                <button type="submit" class="btn">Agregar Compra</button>
            </form>
        </div>
    </div>

    <div id="ventasModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('ventasModal')">&times;</span>
            <h2><i class="fas fa-cash-register"></i> Agregar Venta</h2>
            <form id="ventasForm">
                <select name="producto" required>
                    <option value="">Seleccione un producto</option>
                </select>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <input type="number" name="precioUnitario" step="0.01" placeholder="Precio Unitario" required>
                <button type="submit" class="btn">Agregar Venta</button>
            </form>
        </div>
    </div>

    <div id="reservasModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('reservasModal')">&times;</span>
            <h2><i class="fas fa-calendar-check"></i> Agregar Reserva</h2>
            <form id="reservasForm">
                <select name="producto" required>
                    <option value="">Seleccione un producto</option>
                </select>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <input type="text" name="cliente" placeholder="Nombre del Cliente" required>
                <input type="number" name="montoReservado" step="0.01" placeholder="Monto Reservado" required>
                <button type="submit" class="btn">Agregar Reserva</button>
            </form>
        </div>
    </div>

    <script>
        let capital = 0;
        let montoDisponible = 0;
        let ganancias = 0;
        let totalCompras = 0;
        let totalVentas = 0;
        let productos = [];
        let preciosProductos = {};
        let stockProductos = {};

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function addRow(tableId, data) {
            const tbody = document.getElementById(tableId);
            const row = tbody.insertRow();
            data.forEach(text => {
                const cell = row.insertCell();
                cell.textContent = text;
            });
            if (tableId === 'reservasTableBody') {
                const actionCell = row.insertCell();
                const payButton = document.createElement('button');
                payButton.textContent = 'Marcar como Pagado';
                payButton.className = 'btn';
                payButton.onclick = function () {
                    marcarComoPagado(row);
                };
                actionCell.appendChild(payButton);
            } else if (tableId === 'comprasTableBody') {
                const statusCell = row.insertCell();
                const producto = data[0];
                const cantidad = parseInt(data[1]);
                if (stockProductos[producto] > 0) {
                    statusCell.textContent = 'Disponible';
                    statusCell.className = 'status-available';
                } else {
                    statusCell.textContent = 'Agotado';
                    statusCell.className = 'status-sold-out';
                }
            }
            const deleteCell = row.insertCell();
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Eliminar';
            deleteButton.className = 'delete-btn';
            deleteButton.onclick = function () {
                eliminarFila(row, tableId);
            };
            deleteCell.appendChild(deleteButton);
        }

        function eliminarFila(row, tableId) {
            if (tableId === 'comprasTableBody') {
                const producto = row.cells[0].textContent;
                const cantidad = parseInt(row.cells[1].textContent);
                const total = parseFloat(row.cells[3].textContent.replace('$', ''));
                totalCompras -= total;
                montoDisponible += total;
                actualizarEstadoProducto(producto, -cantidad);
            } else if (tableId === 'ventasTableBody') {
                const producto = row.cells[0].textContent;
                const cantidad = parseInt(row.cells[1].textContent);
                const total = parseFloat(row.cells[3].textContent.replace('$', ''));
                totalVentas -= total;
                ganancias -= total * 0.2;
                montoDisponible -= total;
                actualizarEstadoProducto(producto, cantidad);
            } else if (tableId === 'reservasTableBody') {
                const producto = row.cells[0].textContent;
                const cantidad = parseInt(row.cells[1].textContent);
                actualizarEstadoProducto(producto, cantidad);
            }
            row.remove();
            updateDashboard();
        }

        function marcarComoPagado(row) {
            const producto = row.cells[0].textContent;
            const cantidad = parseFloat(row.cells[1].textContent);
            const precioUnitario = preciosProductos[producto];
            const total = cantidad * precioUnitario;

            const ventaData = [producto, cantidad, precioUnitario.toFixed(2), total.toFixed(2)];
            addRow('ventasTableBody', ventaData);

            totalVentas += total;
            ganancias += total * 0.2; // Asumimos un margen de ganancia del 20%
            montoDisponible += total;
            updateDashboard();

            row.remove();
            actualizarEstadoProducto(producto, -cantidad);
        }

        function actualizarEstadoProducto(producto, cantidad) {
            stockProductos[producto] = (stockProductos[producto] || 0) + cantidad;
            const comprasRows = document.getElementById('comprasTableBody').rows;
            for (let i = 0; i < comprasRows.length; i++) {
                if (comprasRows[i].cells[0].textContent === producto) {
                    const statusCell = comprasRows[i].cells[4];
                    if (stockProductos[producto] > 0) {
                        statusCell.textContent = 'Disponible';
                        statusCell.className = 'status-available';
                    } else {
                        statusCell.textContent = 'Agotado';
                        statusCell.className = 'status-sold-out';
                    }
                    break;
                }
            }
        }

        function updateDashboard() {
            document.getElementById('capitalDisplay').textContent = `$${capital.toFixed(2)}`;
            document.getElementById('montoDisponibleDisplay').textContent = `$${montoDisponible.toFixed(2)}`;
            document.getElementById('gananciasDisplay').textContent = `$${ganancias.toFixed(2)}`;
        }

        function actualizarProductosSelect() {
            const ventasSelect = document.querySelector('#ventasForm select[name="producto"]');
            const reservasSelect = document.querySelector('#reservasForm select[name="producto"]');

            [ventasSelect, reservasSelect].forEach(select => {
                select.innerHTML = '<option value="">Seleccione un producto</option>';
                productos.forEach(producto => {
                    const option = document.createElement('option');
                    option.value = producto;
                    option.textContent = producto;
                    select.appendChild(option);
                });
            });
        }

        // document.getElementById('comprasForm').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     const formData = new FormData(e.target);
        //     const producto = formData.get('producto');
        //     const cantidad = parseFloat(formData.get('cantidad'));
        //     const precioUnitario = parseFloat(formData.get('precioUnitario'));
        //     const total = cantidad * precioUnitario;
        //     const data = [producto, cantidad, precioUnitario.toFixed(2), total.toFixed(2)];

        //     addRow('comprasTableBody', data);
        //     totalCompras += total;
        //     montoDisponible -= total;
        //     updateDashboard();
        //     closeModal('comprasModal');
        //     e.target.reset();

        //     if (!productos.includes(producto)) {
        //         productos.push(producto);
        //         actualizarProductosSelect();
        //     }
        //     preciosProductos[producto] = precioUnitario;
        //     actualizarEstadoProducto(producto, cantidad);
        // });

        document.getElementById('comprasForm').addEventListener('submit', function (e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const producto = formData.get('producto');
    const cantidad = parseFloat(formData.get('cantidad'));
    const precioUnitario = parseFloat(formData.get('precioUnitario'));
    const total = cantidad * precioUnitario;

    const data = new FormData();
    data.append('producto', producto);
    data.append('cantidad', cantidad);
    data.append('precioUnitario', precioUnitario);
    fetch('db_operations.php', {
        method: 'POST',
        body: data
    })
    .then(response => response.json())
    .then(responseData => {
        if (responseData.success) {
            console.log("responseData:",responseData);
            const data = [producto, cantidad, precioUnitario.toFixed(2), total.toFixed(2)];
            addRow('comprasTableBody', data);
            totalCompras += total;
            montoDisponible -= total;
            updateDashboard();
            closeModal('comprasModal');
            e.target.reset();

            if (!productos.includes(producto)) {
                productos.push(producto);
                actualizarProductosSelect();
            }
            preciosProductos[producto] = precioUnitario;
            actualizarEstadoProducto(producto, cantidad);
        } else {
            alert('Failed to add purchase: ' + responseData.message);
        }
    })
    .catch(error => console.error('Error:', error));
});



        document.getElementById('ventasForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const producto = formData.get('producto');
            const cantidad = parseFloat(formData.get('cantidad'));
            const precioUnitario = parseFloat(formData.get('precioUnitario'));
            const total = cantidad * precioUnitario;
            const data = [producto, cantidad, precioUnitario.toFixed(2), total.toFixed(2)];
            addRow('ventasTableBody', data);
            totalVentas += total;
            ganancias += total * 0.2; // Asumimos un margen de ganancia del 20%
            montoDisponible += total;
            updateDashboard();
            closeModal('ventasModal');
            e.target.reset();
            actualizarEstadoProducto(producto, -cantidad);
        });

        document.getElementById('reservasForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const producto = formData.get('producto');
            const cantidad = parseFloat(formData.get('cantidad'));
            const cliente = formData.get('cliente');
            const montoReservado = parseFloat(formData.get('montoReservado'));
            const precioTotal = preciosProductos[producto] * cantidad;
            const montoFaltante = precioTotal - montoReservado;
            const data = [producto, cantidad, cliente, montoReservado.toFixed(2), montoFaltante.toFixed(2)];
            addRow('reservasTableBody', data);
            closeModal('reservasModal');
            e.target.reset();
            actualizarEstadoProducto(producto, -cantidad);
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            if (isDarkMode) {
                document.body.classList.add('dark-mode');
            }
            capital = 10000;
            montoDisponible = capital;
            updateDashboard();
        });

        document.getElementById('darkModeToggle').addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');
            localStorage.setItem('darkMode', isDarkMode);
            this.innerHTML = isDarkMode ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        });
    </script>
</body>

</html>