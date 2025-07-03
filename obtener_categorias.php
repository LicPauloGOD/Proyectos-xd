<?php
require_once 'conn.php';
header('Content-Type: application/json');

$result = $conn->query('SELECT id_categoria, nombre_categoria FROM categorias');
$categorias = [];
while ($row = $result->fetch_assoc()) {
    $cat = [
        'id' => $row['id_categoria'],
        'nombre' => $row['nombre_categoria'],
        'subcategorias' => []
    ];
    // Modificación aquí: Seleccionar id_subcategoria y nombre_subcategoria
    $subres = $conn->query('SELECT id_subcategoria, nombre_subcategoria FROM subcategorias WHERE id_categoria = ' . intval($row['id_categoria']));
    while ($sub = $subres->fetch_assoc()) {
        // Almacenar tanto el ID como el nombre de la subcategoría
        $cat['subcategorias'][] = ['id' => $sub['id_subcategoria'], 'nombre' => $sub['nombre_subcategoria']];
    }
    $categorias[] = $cat;
}
echo json_encode(['success' => true, 'categorias' => $categorias]);
