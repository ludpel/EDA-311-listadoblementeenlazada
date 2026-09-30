<?php
declare(strict_types=1);
require_once "db.php";
require_once "Nodo.php";
require_once "ListaDoblementeEnlazada.php";

$db = new Database();
$pdo = $db->getPdo();
$stmt = $pdo->query("SELECT id, nombre, precio, stock FROM productos");
$productos = $stmt->fetchAll();

$lista = new ListaDoblementeEnlazada();
foreach ($productos as $p) {
    $nodo = new Nodo(
        (int)$p["id"],
        $p["nombre"],
        (float)$p["precio"],
        (int)$p["stock"]
    );
    $lista->agregarAlFinal($nodo);
}

$ids = $lista->obtenerId();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Doblemente Enlazada</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        .contenedor {
            width: min(1200px, 92%);
            margin: 40px auto;
        }

        .encabezado {
            text-align: center;
            margin-bottom: 32px;
        }

        .encabezado h1 {
            margin-bottom: 8px;
            font-size: 32px;
        }

        .encabezado p {
            margin: 0;
            color: #6b7280;
        }

        .resumen {
            background: white;
            border-radius: 14px;
            padding: 18px 22px;
            margin-bottom: 28px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
        }

        .lista-visual {
            display: flex;
            align-items: center;
            gap: 12px;
            overflow-x: auto;
            padding: 18px 4px 25px;
        }

        .nodo {
            min-width: 220px;
            background: white;
            border: 2px solid #2563eb;
            border-radius: 14px;
            padding: 18px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .nodo .tipo {
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            color: #2563eb;
            background: #eff6ff;
            border-radius: 999px;
            padding: 5px 9px;
            margin-bottom: 10px;
        }

        .nodo h3 {
            margin: 0 0 12px;
            font-size: 18px;
        }

        .nodo p {
            margin: 7px 0;
            font-size: 14px;
        }

        .flecha {
            flex: 0 0 auto;
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
        }

        .vacio {
            background: white;
            padding: 28px;
            border-radius: 14px;
            text-align: center;
        }

        .orden {
            font-family: Consolas, monospace;
            color: #111827;
            word-break: break-word;
        }
    </style>
</head>
<body>
    <main class="contenedor">
        <section class="encabezado">
            <h1>Lista Doblemente Enlazada</h1>
            <p>Productos obtenidos desde la base de datos <strong>base1</strong></p>
        </section>

        <section class="resumen">
            <strong>Recorrido desde la cabeza hasta la cola:</strong>
            <div class="orden">
                <?php echo !empty($ids) ? implode(' ⇄ ', $ids) : 'Lista vacía'; ?>
            </div>
        </section>

        <?php if (!empty($productos)): ?>
            <section class="lista-visual">
                <?php foreach ($productos as $indice => $producto): ?>
                    <article class="nodo">
                        <span class="tipo">
                            <?php
                            if ($indice === 0) {
                                echo 'CABEZA';
                            } elseif ($indice === count($productos) - 1) {
                                echo 'COLA';
                            } else {
                                echo 'NODO';
                            }
                            ?>
                        </span>
                        <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                        <p><strong>ID:</strong> <?php echo (int)$producto['id']; ?></p>
                        <p><strong>Precio:</strong> Bs <?php echo number_format((float)$producto['precio'], 2); ?></p>
                        <p><strong>Stock:</strong> <?php echo (int)$producto['stock']; ?></p>
                        <p>
                            <strong>Anterior:</strong>
                            <?php echo $indice === 0 ? 'NULL' : '#' . (int)$productos[$indice - 1]['id']; ?>
                        </p>
                        <p>
                            <strong>Siguiente:</strong>
                            <?php echo $indice === count($productos) - 1 ? 'NULL' : '#' . (int)$productos[$indice + 1]['id']; ?>
                        </p>
                    </article>

                    <?php if ($indice < count($productos) - 1): ?>
                        <div class="flecha">⇄</div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </section>
        <?php else: ?>
            <section class="vacio">No existen productos para mostrar.</section>
        <?php endif; ?>
    </main>
</body>
</html>
