<?php
// guardar_categoria_y_subcategorias.php
require_once 'conn.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$categoria = trim($data['categoria'] ?? '');
$subcategorias = $data['subcategorias'] ?? [];

if ($categoria === '') {
    echo json_encode(['success' => false, 'message' => 'Nombre de categoría vacío']);
    exit;
}

// Verificar si la categoría ya existe
$stmt = $conn->prepare('SELECT id_categoria FROM categorias WHERE nombre_categoria = ?');
$stmt->bind_param('s', $categoria);
$stmt->execute();
$stmt->bind_result($id_categoria);
if ($stmt->fetch()) {
    $stmt->close();
    // Ya existe, usar ese id
} else {
    $stmt->close();
    // Insertar nueva categoría
    $stmt = $conn->prepare('INSERT INTO categorias (nombre_categoria) VALUES (?)');
    $stmt->bind_param('s', $categoria);
    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Error al insertar categoría']);
        exit;
    }
    $id_categoria = $stmt->insert_id;
    $stmt->close();
}

// Insertar subcategorías
if (!empty($subcategorias)) {
    $stmt = $conn->prepare('INSERT INTO subcategorias (id_categoria, nombre_subcategoria) VALUES (?, ?)');
    foreach ($subcategorias as $subcat) {
        $subcat = trim($subcat);
        if ($subcat === '') continue;
        $stmt->bind_param('is', $id_categoria, $subcat);
        $stmt->execute();
    }
    $stmt->close();
}

echo json_encode(['success' => true]);
$conn->close();
?>