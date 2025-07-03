<?php
session_start();

require_once 'conn.php';
header('Content-Type: application/json');

// Habilitar reporte de errores para desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Método no permitido", 405);
    }

    // Validar campos requeridos
    $required = ['nombre_producto', 'descripcion', 'precio', 'stock', 'categoriaProducto', 'img_base64'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("El campo $field es requerido", 400);
        }
    }

    // Procesar datos
    $datos = [
        'id_usuario' => $_SESSION['user_id'] ?? 1, // Obtener de la sesión
        'id_categoria' => intval($_POST['categoriaProducto']),
       'id_subcategoria' => !empty($_POST['subcategoriaProducto']) ? intval($_POST['subcategoriaProducto']) : null,
        'nombre_producto' => trim($_POST['nombre_producto']),
        'descripcion' => trim($_POST['descripcion']),
        'precio' => floatval($_POST['precio']),
        'descuento' => !empty($_POST['precio_descuento']) ? floatval($_POST['precio_descuento']) : 0.00,
        'stock' => intval($_POST['stock']),
        'sku' => !empty($_POST['sku']) ? trim($_POST['sku']) : null,
        'imagen_principal' => $_POST['img_base64'], // Base64 de la imagen principal
        'imagen_secundaria_1' => !empty($_POST['img_secundaria_1_base64']) ? $_POST['img_secundaria_1_base64'] : null,
        'imagen_secundaria_2' => !empty($_POST['img_secundaria_2_base64']) ? $_POST['img_secundaria_2_base64'] : null,
        'imagen_secundaria_3' => !empty($_POST['img_secundaria_3_base64']) ? $_POST['img_secundaria_3_base64'] : null,
        'destacado' => isset($_POST['destacado']) ? 1 : 0,
        'activo' => isset($_POST['activo']) ? 1 : 0
    ];

    // Validar imagen principal (Base64)
    if (!preg_match('/^data:image\/(\w+);base64,/', $datos['imagen_principal'], $matches)) {
        throw new Exception("Formato de imagen principal no válido", 400);
    }

    // Validar imágenes secundarias (si existen)
    for ($i = 1; $i <= 3; $i++) {
        $field = "imagen_secundaria_$i";
        if (!empty($datos[$field]) && !preg_match('/^data:image\/(\w+);base64,/', $datos[$field])) {
            throw new Exception("Formato de imagen secundaria $i no válido", 400);
        }
    }

    // Insertar producto
    $stmt = $conn->prepare("INSERT INTO productos (
        id_usuario, id_categoria, id_subcategoria, nombre_producto, descripcion,
        precio, descuento, stock, sku, imagen_principal, imagen_secundaria_1,
        imagen_secundaria_2, imagen_secundaria_3, destacado, activo
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "iiisssddsssssii",
        $datos['id_usuario'],
        $datos['id_categoria'],
        $datos['id_subcategoria'],
        $datos['nombre_producto'],
        $datos['descripcion'],
        $datos['precio'],
        $datos['descuento'],
        $datos['stock'],
        $datos['sku'],
        $datos['imagen_principal'],
        $datos['imagen_secundaria_1'],
        $datos['imagen_secundaria_2'],
        $datos['imagen_secundaria_3'],
        $datos['destacado'],
        $datos['activo']
    );

    if (!$stmt->execute()) {
        throw new Exception("Error al guardar el producto: " . $stmt->error);
    }

    $producto_id = $conn->insert_id;
    $stmt->close();

    echo json_encode([
        'success' => true,
        'message' => 'Producto guardado correctamente',
        'producto_id' => $producto_id
    ]);

} catch (Exception $e) {
    http_response_code($e->getCode() ?: 500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'error' => $e->getCode()
    ]);
    
    error_log("Error en guardar_producto.php: " . $e->getMessage());
}

$conn->close();
?>