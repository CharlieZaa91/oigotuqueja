<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Empresa</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <style>
        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background: #222;
            padding-top: 40px;
            min-height: 100vh;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 0;
        }

        .sidebar ul li a {
            display: block;
            color: #fff;
            padding: 16px 24px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .sidebar ul li a:hover {
            background: #444;
        }

        main {
            flex: 1;
            padding: 32px;
        }

        footer {
            margin-left: 220px;
        }

        @media (max-width: 700px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
                padding-top: 0;
            }

            main,
            footer {
                margin-left: 0;
                padding: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <ul>
                <li><a href="#">Panel inicial</a></li>
                <li><a href="#">Quejas</a></li>
                <li><a href="#">Analítica</a></li>
                <li><a href="#">Publicaciones</a></li>
                <li><a href="#">Produtos</a></li>
                <li><a href="#">Soporte</a></li>
                <li><a href="#">Contenidos</a></li>
                <li><a href="#">Configuraciones</a></li>
            </ul>
        </aside>
        <main>
            <section class="resumen">
                <h2>Olá Empresa</h2>
                <p>Há 13 anos no RA | 3.311 visualizações</p>
                <button>Atualizar dados</button>
                <button>Ver cartões</button>
            </section>
            <section class="reputacion">
                <h2>Índice de Reputação</h2>
                <p>Atual: <strong>8.0 - Ótimo</strong></p>
                <p>Anterior: <strong>7.9 - Bom</strong></p>
            </section>
        </main>
    </div>
    <footer>
        <p>&copy; 2025 Vista de Empresa</p>
    </footer>
</body>

</html>