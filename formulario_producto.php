<?php

// Registrar errores en un archivo de log
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulario Producto</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <?php include 'navbar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include 'menu.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulario Producto</h4>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" id="user_id" required />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nombreProducto">Nombre del producto <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="nombreProducto" name="nombre_producto" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                          <label for="descripcionProducto">Descripción del producto <span class="text-danger">*</span></label>
                          <textarea class="form-control" id="descripcionProducto" name="descripcion" rows="3" placeholder="Descripción" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="precioProducto">Precio <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="precioProducto" name="precio" placeholder="Precio" step="0.01" required>
                        </div>
                        <div class="form-group">
                          <label for="precioDescuento">Precio de descuento (%)</label>
                          <input type="number" class="form-control" id="precioDescuento" name="precio_descuento" placeholder="Porcentaje de descuento" step="0.01">
                        </div>
                        <div class="form-group">
                          <label for="stockDisponible">Stock disponible <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="stockDisponible" name="stock" placeholder="Unidades disponibles" required>
                        </div>
                        <div class="form-group">
                          <label for="sku">SKU (código interno)</label>
                          <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="categoriaProducto">Categoría <span class="text-danger">*</span></label>
                          <div class="d-flex align-items-center mb-2" style="gap: 10px;">
                            <select class="form-control me-2" id="categoriaProducto" name="categoriaProducto" required style="max-width: 200px;">
                              <option value="" disabled selected>Selecciona una categoría</option>
                            </select>
                            <select class="form-control" id="subcategoriaProducto" name="subcategoriaProducto" style="max-width: 200px; display:none;">
                              <option value="" disabled selected>Selecciona una subcategoría</option>
                            </select>
                            <button type="button" class="btn btn-success btn-sm" id="btnAddCategoria">Agregar categoría</button>
                            <button type="button" class="btn btn-secondary btn-sm ms-2" id="btnAddSubcatModal" style="display:none;">Agregar subcategoría</button>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Imagen principal <span class="text-danger">*</span></label>
                          <input type="file" name="img[]" class="file-upload-default" id="imgInput" required accept="image/*">
                          <div class="input-group col-xs-12 d-flex align-items-center">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Subir imagen">
                            <span class="input-group-append ms-2">
                              <button class="file-upload-browse btn btn-primary" type="button">Subir</button>
                            </span>
                          </div>
                          <div class="mt-2 text-center">
                            <img id="imgPreview" src="#" alt="Previsualización" style="max-width: 220px; max-height: 220px; border: 1px solid #ddd; border-radius: 8px; display: none; margin: 0 auto;" />
                          </div>
<input type="hidden" name="img_base64" id="imgBase64">
                        </div>
                      <div class="form-group">
  <label>Imagen secundaria 1</label>
  <input type="file" name="img_secundaria_1" class="form-control" accept="image/*">
  <input type="hidden" name="img_secundaria_1_base64" id="imgSecundaria1Base64">
</div>
<div class="form-group">
  <label>Imagen secundaria 2</label>
  <input type="file" name="img_secundaria_2" class="form-control" accept="image/*">
  <input type="hidden" name="img_secundaria_2_base64" id="imgSecundaria2Base64">
</div>
<div class="form-group">
  <label>Imagen secundaria 3</label>
  <input type="file" name="img_secundaria_3" class="form-control" accept="image/*">
  <input type="hidden" name="img_secundaria_3_base64" id="imgSecundaria3Base64">
</div>
                        <div class="form-check mt-2">
                          <input type="checkbox" class="form-check-input" id="destacado" name="destacado">
                          <label class="form-check-label" for="destacado">¿Producto destacado?</label>
                        </div>
                        <div class="form-check mt-2">
                          <input type="checkbox" class="form-check-input" id="activo" name="activo" checked>
                          <label class="form-check-label" for="activo">¿Producto activo?</label>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-primary me-2">Guardar producto</button>
                      <button class="btn btn-light" type="reset">Cancelar</button>
                    </div>
                  </form>
                  <div class="mt-4" id="seccionAgregarSubcat" style="display:none;">
                    <label for="selectCategoriaSubcat">Selecciona la categoría</label>
                    <select id="selectCategoriaSubcat" class="form-control mb-2" style="max-width: 250px;"></select>
                    <label for="inputSubcatNueva">Subcategoría</label>
                    <div class="d-flex mb-2">
                      <input type="text" id="inputSubcatNueva" class="form-control me-2" placeholder="Nombre de subcategoría" style="max-width: 250px;">
                      <button type="button" class="btn btn-secondary btn-sm" id="btnAgregarSubcat">Agregar</button>
                    </div>
                    <ul id="listaSubcatsAgregadas" class="mt-2"></ul>
                  </div>
                </div>
              </div>
          </div>
          <?php include 'footer.php'; ?>
        </div>
      </div>
    </div>
    <!-- Modal para agregar categoría -->
    <div class="modal" tabindex="-1" id="modalCategoria" style="display:none; background:rgba(0,0,0,0.5); position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:9999; align-items:center; justify-content:center;">
      <div class="bg-white p-4 rounded" style="min-width:300px; max-width:90vw;">
        <h5>Agregar Categoría</h5>
        <div class="mb-2">
          <label>Nombre de la categoría</label>
          <input type="text" class="form-control" id="inputNuevaCategoria" />
        </div>
        <div class="mb-2">
          <input type="checkbox" id="checkSubcategorias" /> <label for="checkSubcategorias">¿Agregar subcategoría?</label>
        </div>
        <div class="mb-2" id="subcatInputSection" style="display:none;">
          <label>Subcategoría</label>
          <input type="text" class="form-control" id="inputNuevaSubcategoria" />
        </div>
        <div class="d-flex justify-content-end mt-3">
          <button type="button" class="btn btn-primary me-2" id="btnGuardarCategoria">Guardar</button>
          <button type="button" class="btn btn-light" id="btnCancelarModal">Cancelar</button>
        </div>
      </div>
    </div>
    <!-- Modal para agregar subcategoría a una categoría existente -->
    <div class="modal" tabindex="-1" id="modalSubcat" style="display:none; background:rgba(0,0,0,0.5); position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:9999; align-items:center; justify-content:center;">
      <div class="bg-white p-4 rounded" style="min-width:300px; max-width:90vw;">
        <h5>Agregar Subcategoría</h5>
        <div class="mb-2">
          <label>Categoría</label>
          <select class="form-control" id="selectCatSinSubcat"></select>
        </div>
        <div class="mb-2">
          <label>Subcategoría</label>
          <input type="text" class="form-control" id="inputSubcatModal" />
        </div>
        <div class="d-flex justify-content-end mt-3">
          <button type="button" class="btn btn-primary me-2" id="btnGuardarSubcatModal">Guardar</button>
          <button type="button" class="btn btn-light" id="btnCancelarSubcatModal">Cancelar</button>
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/file-upload.js"></script>
    <script>
    window.addEventListener('DOMContentLoaded', function() {
      // Variables globales
      const categoriaSelect = document.getElementById('categoriaProducto');
      const subcategoriaSelect = document.getElementById('subcategoriaProducto');
      const btnAddCategoria = document.getElementById('btnAddCategoria');
      const btnAddSubcatModal = document.getElementById('btnAddSubcatModal');
      const modalCategoria = document.getElementById('modalCategoria');
      const modalSubcat = document.getElementById('modalSubcat');
      
      // Función para cargar categorías desde el backend
      function cargarCategoriasDesdeBackend() {
        fetch('obtener_categorias.php')
          .then(response => {
            if (!response.ok) throw new Error('Error en la respuesta del servidor');
            return response.json();
          })
          .then(data => {
            if (data.success && data.categorias) {
              renderCategorias(data.categorias);
            } else {
              mostrarMensajeAjax(data.message || 'Error al cargar categorías', 'danger');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            mostrarMensajeAjax('Error de conexión al cargar categorías', 'danger');
          });
      }

      // Función para renderizar categorías en el select
      function renderCategorias(categorias) {
        categoriaSelect.innerHTML = '<option value="" disabled selected>Selecciona una categoría</option>';
        categorias.forEach(cat => {
          const option = document.createElement('option');
          option.value = cat.id;
          option.textContent = cat.nombre;
          option.setAttribute('data-subcats', JSON.stringify(cat.subcategorias || []));
          categoriaSelect.appendChild(option);
        });
      }

      categoriaSelect.addEventListener('change', function() {
  const selectedOption = this.options[this.selectedIndex];
  const subcategorias = JSON.parse(selectedOption.getAttribute('data-subcats') || '[]');

  subcategoriaSelect.innerHTML = '<option value="" disabled selected>Selecciona una subcategoría</option>';
  subcategorias.forEach(sub => {
    const option = document.createElement('option');
    option.value = sub.id;
    option.textContent = sub.nombre;
    subcategoriaSelect.appendChild(option);
  });

  subcategoriaSelect.style.display = subcategorias.length > 0 ? 'block' : 'none';
  btnAddSubcatModal.style.display = 'inline-block';
});

      // Modal para agregar categoría
      btnAddCategoria.addEventListener('click', function() {
        document.getElementById('inputNuevaCategoria').value = '';
        document.getElementById('checkSubcategorias').checked = false;
        document.getElementById('subcatInputSection').style.display = 'none';
        document.getElementById('inputNuevaSubcategoria').value = '';
        modalCategoria.style.display = 'block';
      });

      // Toggle para mostrar/ocultar campo de subcategoría
      document.getElementById('checkSubcategorias').addEventListener('change', function() {
        document.getElementById('subcatInputSection').style.display = this.checked ? 'block' : 'none';
      });

      // Guardar nueva categoría (con o sin subcategorías)
      document.getElementById('btnGuardarCategoria').addEventListener('click', function() {
        const nombre = document.getElementById('inputNuevaCategoria').value.trim();
        const agregarSubcat = document.getElementById('checkSubcategorias').checked;
        const subcat = document.getElementById('inputNuevaSubcategoria').value.trim();
        
        if (!nombre) {
          mostrarMensajeAjax('Ingresa un nombre para la categoría', 'danger');
          return;
        }
        
        const data = {
          categoria: nombre,
          subcategorias: agregarSubcat && subcat ? [subcat] : []
        };

        fetch('guardar_categoria_y_subcategorias.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            cargarCategoriasDesdeBackend();
            modalCategoria.style.display = 'none';
            mostrarMensajeAjax('Categoría guardada exitosamente');
          } else {
            mostrarMensajeAjax(data.message || 'Error al guardar', 'danger');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          mostrarMensajeAjax('Error de conexión', 'danger');
        });
      });

      // Cancelar modal categoría
      document.getElementById('btnCancelarModal').addEventListener('click', function() {
        modalCategoria.style.display = 'none';
      });

      // Configurar modal para agregar subcategoría
      btnAddSubcatModal.addEventListener('click', function() {
        const selectedCat = categoriaSelect.options[categoriaSelect.selectedIndex];
        if (!selectedCat || !selectedCat.value) {
          mostrarMensajeAjax('Primero selecciona una categoría', 'warning');
          return;
        }
        
        document.getElementById('inputSubcatModal').value = '';
        modalSubcat.style.display = 'block';
      });

      // Guardar nueva subcategoría
      document.getElementById('btnGuardarSubcatModal').addEventListener('click', function() {
        const selectedCat = categoriaSelect.options[categoriaSelect.selectedIndex];
        const subcat = document.getElementById('inputSubcatModal').value.trim();
        
        if (!selectedCat || !selectedCat.value || !subcat) {
          mostrarMensajeAjax('Completa todos los campos', 'danger');
          return;
        }

        // Obtener el nombre de la categoría seleccionada
        const catNombre = selectedCat.textContent;
        const data = {
          categoria: catNombre,
          subcategorias: [subcat]
        };

        fetch('guardar_categoria_y_subcategorias.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            cargarCategoriasDesdeBackend();
            modalSubcat.style.display = 'none';
            mostrarMensajeAjax('Subcategoría agregada exitosamente');
          } else {
            mostrarMensajeAjax(data.message || 'Error al guardar', 'danger');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          mostrarMensajeAjax('Error de conexión', 'danger');
        });
      });

      // Cancelar modal subcategoría
      document.getElementById('btnCancelarSubcatModal').addEventListener('click', function() {
        modalSubcat.style.display = 'none';
      });

      // Función para mostrar mensajes
      function mostrarMensajeAjax(msg, tipo = 'success') {
        const div = document.createElement('div');
        div.className = `alert alert-${tipo} position-fixed`;
        div.style.top = '20px';
        div.style.right = '20px';
        div.style.zIndex = '9999';
        div.textContent = msg;
        document.body.appendChild(div);
        setTimeout(() => {
          div.remove();
        }, 3000);
      }

      // Cargar categorías al iniciar
      cargarCategoriasDesdeBackend();
      
      
      
      // Reemplaza el código existente del formulario con este:
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const btnSubmit = this.querySelector('button[type="submit"]');
    
    // Mostrar loader en el botón
    btnSubmit.disabled = true;
    btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...';
    
    fetch('guardar_producto.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: 'Producto guardado correctamente',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Opcional: Redirigir o resetear el formulario
                this.reset();
                document.getElementById('imgPreview').style.display = 'none';
                window.location.href = 'formulario_producto.php'; // Cambia por tu URL deseada
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Ocurrió un error al guardar el producto'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error de conexión',
            text: 'No se pudo conectar con el servidor'
        });
        console.error('Error:', error);
    })
    .finally(() => {
        btnSubmit.disabled = false;
        btnSubmit.innerHTML = 'Guardar producto';
    });
});

// Función para convertir File a Base64
function fileToBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.onerror = reject;
        reader.readAsDataURL(file);
    });
}

// Procesar imagen principal
document.getElementById('imgInput').addEventListener('change', async function(e) {
    const file = e.target.files[0];
    if (file) {
        try {
            // Validar tamaño (ejemplo: máximo 2MB)
            if (file.size > 2 * 1024 * 1024) {
                throw new Error("La imagen no debe exceder 2MB");
            }
            
            const base64 = await fileToBase64(file);
            document.getElementById('imgBase64').value = base64;
            
            // Mostrar previsualización
            const imgPreview = document.getElementById('imgPreview');
            imgPreview.src = base64;
            imgPreview.style.display = 'block';
        } catch (error) {
            console.error("Error al procesar imagen:", error);
            Swal.fire('Error', error.message, 'error');
            this.value = ''; // Limpiar input file
        }
    }
});

// Procesar imágenes secundarias
// Procesar imágenes secundarias
[1, 2, 3].forEach(num => {
    document.querySelector(`input[name="img_secundaria_${num}"]`).addEventListener('change', async function(e) {
        const file = e.target.files[0];
        if (file) {
            try {
                if (file.size > 2 * 1024 * 1024) {
                    throw new Error(`La imagen secundaria ${num} no debe exceder 2MB`);
                }
                
                const base64 = await fileToBase64(file);
                document.getElementById(`imgSecundaria${num}Base64`).value = base64;
                
                // Opcional: Mostrar previsualización de imágenes secundarias
            } catch (error) {
                console.error(`Error al procesar imagen secundaria ${num}:`, error);
                Swal.fire('Error', error.message, 'error');
                this.value = '';
            }
        }
    });
});

// Manejar envío del formulario
document.querySelector('form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const btnSubmit = form.querySelector('button[type="submit"]');
    const originalBtnText = btnSubmit.innerHTML;
    
    try {
        // Validación adicional
        if (!document.getElementById('imgBase64').value) {
            throw new Error("La imagen principal es requerida");
        }
        
        // Mostrar estado de carga
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Guardando...
        `;
        
        // Enviar datos
        const response = await fetch('guardar_producto.php', {
            method: 'POST',
            body: new FormData(form)
        });
        
        const data = await response.json();
        
        if (!response.ok || !data.success) {
            throw new Error(data.message || 'Error al guardar el producto');
        }
        
        await Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: data.message,
            timer: 2000,
            showConfirmButton: false
        });
        
        // Resetear formulario
        form.reset();
        document.getElementById('imgPreview').style.display = 'none';
        document.querySelectorAll('[id$="Base64"]').forEach(el => el.value = '');
        
    } catch (error) {
        console.error('Error:', error);
        await Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message,
            footer: 'Revise los datos e intente nuevamente'
        });
    } finally {
        btnSubmit.disabled = false;
        btnSubmit.innerHTML = originalBtnText;
    }
});

    });
    </script>
  </body>
</html>
