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
foreach($productos as $p){
    $nodo = new Nodo(
        (int)$p["id"],
        $p["nombre"],
        (float)$p["precio"],
         (int)$p["stock"]);
    $lista->agregarAlFinal($nodo);

}
echo "se insertaron los registros" . implode(' , ' , $lista->obtenerId());
?>