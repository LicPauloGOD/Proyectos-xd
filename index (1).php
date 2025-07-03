<?php
include "./admin/dist/conn.php";

$categorias = [];

$sql = "SELECT id_categoria, nombre_categoria FROM categorias";

$resultado = mysqli_query($conn, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $categorias[] = $fila; // Agrega cada fila al array
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eshop - Plantilla eCommerce HTML5</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/font-awesome.css">
    <link rel="stylesheet" href="./css/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <!-- Agrega esto en el <head> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .categories-bar-wrapper {
            width: 100%;
            position: relative;
            margin: 30px 0 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 60px
        }

        .categories-bar-scroll {
            overflow-x: auto;
            white-space: nowrap;
            width: 80vw;
            max-width: 900px;
            min-width: 200px;
            scrollbar-width: none;
            -ms-overflow-style: none;
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .04);
            padding: 10px 0;
            display: flex;
            align-items: center;
            transition: box-shadow .2s
        }

        .categories-bar-scroll::-webkit-scrollbar {
            display: none
        }

        .category-btn {
            display: inline-block;
            margin: 0 8px;
            padding: 10px 22px;
            border: none;
            background: #f5f5f5;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 500;
            font-size: 16px;
            color: #222;
            transition: background .2s, color .2s, box-shadow .2s;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .03)
        }

        .category-btn.active,
        .category-btn:hover {
            background: #ff3c5f;
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(255, 60, 95, .10)
        }

        .categories-scroll-btn {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            font-size: 20px;
            cursor: pointer;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .07);
            transition: background .2s, border .2s;
            z-index: 2;
            opacity: .85
        }

        .categories-scroll-btn:hover {
            background: #ff3c5f;
            color: #fff;
            border-color: #ff3c5f;
            opacity: 1
        }

        .categories-scroll-btn.left {
            order: 0
        }

        .categories-scroll-btn.right {
            order: 2
        }

        .categories-bar-scroll {
            order: 1
        }

        @media(max-width:900px) {
            .categories-bar-scroll {
                width: 95vw
            }
        }

        @media(max-width:600px) {
            .category-btn {
                padding: 7px 12px;
                font-size: 13px
            }

            .categories-scroll-btn {
                width: 28px;
                height: 28px;
                font-size: 14px;
                margin: 0 3px
            }

            .categories-bar-scroll {
                min-width: 100px
            }
        }

        .single-product .product-action-2 {
            opacity: 1 !important;
            visibility: visible !important;
            position: static !important;
            transform: none !important;
            transition: none !important;
        }

        .single-product:hover .product-action-2 {
            opacity: 1 !important;
            visibility: visible !important;
            position: static !important;
            transform: none !important;
        }

        

        .product-content-row .product-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            
        }

        .product-content-row .product-info h3 {
            margin: 0 0 4px 0;
            font-size: 1.25rem;
            font-weight: 600;
            color:#111 !important;
            text-decoration:none !important;
            
        }

        .product-content-row .product-price {
            margin-bottom: 0;
            font-size: 1.35rem;
            font-weight: 700;
            color: #ff3c5f;
        }

        .product-content-row .add-to-cart-btn {
           
            white-space: nowrap;
            align-self: center;
            padding: 8px 18px;
            font-size: 15px;
        }

        @media(max-width:600px) {
            .product-content-row {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .product-content-row .add-to-cart-btn {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body class="js">
    <header class="header shop">
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <div class="logo"><a href="index.html"><img src="./images/logo.png" alt="logo"></a></div>
                            <div class="right-bar">
                                <div class="sinlge-bar shopping">
                                    <a href="#" class="single-icon"><i class="ti-bag"></i> <span
                                            class="total-count">2</span></a>
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header"><span>2 Artículos</span><a href="#">Ver
                                                carrito</a></div>
                                        <ul class="shopping-list">
                                            <li><a href="#" class="remove"><i class="fa fa-remove"></i></a><a
                                                    class="cart-img" href="#"><img
                                                        src="https://via.placeholder.com/70x70" alt="#"></a>
                                                <h4><a href="#">Anillo Mujer</a></h4>
                                                <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                            </li>
                                            <li><a href="#" class="remove"><i class="fa fa-remove"></i></a><a
                                                    class="cart-img" href="#"><img
                                                        src="https://via.placeholder.com/70x70" alt="#"></a>
                                                <h4><a href="#">Collar Mujer</a></h4>
                                                <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                            </li>
                                        </ul>
                                        <div class="bottom">
                                            <div class="total"><span>Total</span><span
                                                    class="total-amount">$134.00</span></div><a href="checkout.html"
                                                class="btn animate">Pagar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="categories-bar-wrapper">
                    <button class="categories-scroll-btn left" id="cat-scroll-left"
                        aria-label="Scroll izquierda">&#8592;</button>
                    <div class="categories-bar-scroll" id="categories-bar"></div>
                    <button class="categories-scroll-btn right" id="cat-scroll-right"
                        aria-label="Scroll derecha">&#8594;</button>
                </div>
                <div class="col-12">
                    <div class="row" id="products-container"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="pagination">
                                <ul class="pagination-list" id="pagination"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button></div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-gallery">
                                <div class="quickview-slider-active" id="product-slider"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content" id="quickview-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const categories = <?php echo json_encode($categorias, JSON_UNESCAPED_UNICODE); ?>;
        const products = [{ id_producto: 1, id_usuario: 1, id_categoria: 1, id_subcategoria: 0, nombre_producto: "Colección Mujer en Oferta", descripcion: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.", precio: 29, descuento: 0, stock: 10, sku: "SKU-001", imagen_principal: "https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=550&q=80", imagen_secundaria_1: "https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=550&q=80", imagen_secundaria_2: null, imagen_secundaria_3: null, destacado: 0, activo: 1, fecha_creacion: "2024-07-02 12:00:00", fecha_actualizacion: "2024-07-02 12:00:00" }, { id_producto: 2, id_usuario: 1, id_categoria: 7, id_subcategoria: 0, nombre_producto: "Zapatos Rosas Geniales", descripcion: "Zapatos cómodos y elegantes para cualquier ocasión.", precio: 29, descuento: 0, stock: 15, sku: "SKU-002", imagen_principal: "https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=550&q=80", imagen_secundaria_1: "https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=550&q=80", imagen_secundaria_2: null, imagen_secundaria_3: null, destacado: 0, activo: 1, fecha_creacion: "2024-07-02 12:00:00", fecha_actualizacion: "2024-07-02 12:00:00" }, { id_producto: 3, id_usuario: 1, id_categoria: 7, id_subcategoria: 0, nombre_producto: "Colección de Bolsos Geniales", descripcion: "Bolsos elegantes y espaciosos para el día a día.", precio: 29, descuento: 0, stock: 8, sku: "SKU-003", imagen_principal: "https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=550&q=80", imagen_secundaria_1: "https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=550&q=80", imagen_secundaria_2: null, imagen_secundaria_3: null, destacado: 0, activo: 1, fecha_creacion: "2024-07-02 12:00:00", fecha_actualizacion: "2024-07-02 12:00:00" }]
        const itemsPerPage = 9; 
        let currentPage = 1, filteredProducts = [...products]; function renderProducts() { const c = document.getElementById('products-container'); c.innerHTML = ''; 
        let s = 'name-asc', e = document.getElementById('sort-by'); if (e) s = e.value; let t = [...filteredProducts]; switch (s) { case 'name-asc': t.sort((a, b) => a.nombre_producto.localeCompare(b.nombre_producto)); break; case 'name-desc': t.sort((a, b) => b.nombre_producto.localeCompare(a.nombre_producto)); break; case 'price-asc': t.sort((a, b) => a.precio - b.precio); break; case 'price-desc': t.sort((a, b) => b.precio - a.precio); break }const n = (currentPage - 1) * itemsPerPage, o = n + itemsPerPage, p = t.slice(n, o); p.forEach(a => {
    const d = document.createElement('div');
    d.className = 'col-lg-4 col-md-6 col-12';
    d.innerHTML = `
        <div class="single-product">
            <div class="product-img">
                <img class="default-img" src="${a.imagen_principal}" alt="${a.nombre_producto}">
            </div>
            <div class="product-content">
                <div class="product-content-row">
                    <div class="product-info">
                        <h3>${a.nombre_producto}</h3>
                        <div class="product-price">
                            <span>$${a.precio.toFixed(2)}</span>
                            ${a.descuento && a.descuento > 0 ? `<span class='price-dec'>-${a.descuento}%</span>` : ''}
                        </div>
                    </div>
                    <a title="Agregar al carrito" href="#" class="btn add-to-cart-btn mt-3">Agregar al carrito</a>
                </div>
            </div>
        </div>
    `;
    c.appendChild(d)
}), document.querySelectorAll('[data-product-id]').forEach(i => { i.addEventListener('click', function (l) { l.preventDefault(); const r = parseInt(this.getAttribute('data-product-id')), u = products.find(p => p.id_producto === r); u && showQuickView(u) }) }) }
        function showQuickView(a) { const s = document.getElementById('product-slider'); s.innerHTML = '';[a.imagen_principal, a.imagen_secundaria_1, a.imagen_secundaria_2, a.imagen_secundaria_3].filter(Boolean).forEach(i => { const d = document.createElement('div'); d.className = 'single-slider', d.innerHTML = `<img src="${i}" alt="${a.nombre_producto}">`, s.appendChild(d) }); const c = document.getElementById('quickview-content'); c.innerHTML = `<h2>${a.nombre_producto}</h2><div class="quickview-stock"><span><i class="fa fa-check-circle-o"></i> ${a.stock > 0 ? 'en stock' : 'agotado'}</span></div><h3>$${a.precio.toFixed(2)}</h3><div class="quickview-peragraph"><p>${a.descripcion}</p></div><div class="quantity"><div class="input-group"><div class="button minus"><button type="button" class="btn btn-primary btn-number" disabled data-type="minus" data-field="quant[1]"><i class="ti-minus"></i></button></div><input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1"><div class="button plus"><button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]"><i class="ti-plus"></i></button></div></div></div><div class="add-to-cart"><a href="#" class="btn">Agregar al carrito</a><a href="#" class="btn min"><i class="ti-heart"></i></a><a href="#" class="btn min"><i class="fa fa-compress"></i></a></div><div class="default-social"><h4 class="share-now">Compartir:</h4><ul><li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li><li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li><li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li><li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li></ul></div>`; if (typeof $ !== 'undefined' && $.fn.slick) { $('.quickview-slider-active').slick({ infinite: !0, slidesToShow: 1, slidesToScroll: 1, arrows: !0, dots: !1, autoplay: !0, autoplaySpeed: 5e3 }) } }
        function renderPagination() { const p = document.getElementById('pagination'); p.innerHTML = ''; const t = Math.ceil(filteredProducts.length / itemsPerPage); if (t <= 1) return; const prevLi = document.createElement('li'); prevLi.innerHTML = `<a href="#"${currentPage === 1 ? ' class="disabled"' : ''} data-page="${currentPage - 1}"><i class="ti-angle-left"></i></a>`, p.appendChild(prevLi); for (let i = 1; i <= t; i++) { const li = document.createElement('li'); li.innerHTML = `<a href="#"${i === currentPage ? ' class="active"' : ''} data-page="${i}">${i}</a>`, p.appendChild(li) } const nextLi = document.createElement('li'); nextLi.innerHTML = `<a href="#"${currentPage === t ? ' class="disabled"' : ''} data-page="${currentPage + 1}"><i class="ti-angle-right"></i></a>`, p.appendChild(nextLi); document.querySelectorAll('#pagination a').forEach(item => { item.addEventListener('click', function (e) { e.preventDefault(); if (this.classList.contains('disabled')) return; const page = parseInt(this.getAttribute('data-page')); if (page !== currentPage) { currentPage = page, renderProducts(), renderPagination(), window.scrollTo({ top: 0, behavior: 'smooth' }) } }) }) }
        function renderCategoriesBar() { const b = document.getElementById('categories-bar'); if (!b) return; b.innerHTML = ''; const allBtn = document.createElement('button'); allBtn.className = 'category-btn active', allBtn.textContent = 'Todas', allBtn.setAttribute('data-category', 'all'), b.appendChild(allBtn), categories.forEach(cat => { const btn = document.createElement('button'); btn.className = 'category-btn', btn.textContent = cat.nombre_categoria, btn.setAttribute('data-category', cat.id_categoria), b.appendChild(btn) }), b.querySelectorAll('.category-btn').forEach(btn => { btn.addEventListener('click', function () { b.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active')), this.classList.add('active'); const id = this.getAttribute('data-category'); filteredProducts = id === 'all' ? [...products] : products.filter(p => p.id_categoria == id), currentPage = 1, renderProducts(), renderPagination() }) }) }
        function setupCategoriesScroll() { const b = document.getElementById('categories-bar'), l = document.getElementById('cat-scroll-left'), r = document.getElementById('cat-scroll-right'); if (!b || !l || !r) return; l.onclick = () => b.scrollBy({ left: -150, behavior: 'smooth' }), r.onclick = () => b.scrollBy({ left: 150, behavior: 'smooth' }) }
        function init() { renderCategoriesBar(), setupCategoriesScroll(), renderProducts(), renderPagination(); var s = document.getElementById('sort-by'); s && s.addEventListener('change', function () { renderProducts() }) } document.addEventListener('DOMContentLoaded', init);
    </script>
    <script>
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        function updateCartCount() {
            const count = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.querySelectorAll('.total-count').forEach(el => el.textContent = count);
        }
        
        function updateCartDropdown() {
            const list = document.querySelector('.shopping-list');
            if (!list) return;
            
            list.innerHTML = '';
            
            if (cart.length === 0) {
                list.innerHTML = '<li style="text-align:center;">El carrito está vacío</li>';
            } else {
                cart.forEach(item => {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `
                        <a href="#" class="remove" data-cart-id="${item.id_producto}">
                            <i class="fa fa-remove"></i>
                        </a>
                        <a class="cart-img" href="#">
                            <img src="${item.imagen_principal}" alt="#">
                        </a>
                        <h4><a href="#">${item.nombre_producto}</a></h4>
                        <p class="quantity">${item.quantity}x - <span class="amount">$${(item.precio * item.quantity).toFixed(2)}</span></p>
                    `;
                    list.appendChild(listItem);
                });
            }
            
            // Actualizar total
            const total = cart.reduce((sum, item) => sum + (item.precio * item.quantity), 0);
            const totalAmount = document.querySelector('.total-amount');
            if (totalAmount) totalAmount.textContent = `$${total.toFixed(2)}`;
            
            // Actualizar cabecera
            const header = document.querySelector('.dropdown-cart-header span');
            if (header) header.textContent = `${cart.length} Artículo${cart.length !== 1 ? 's' : ''}`;
            
            // Agregar eventos a los botones de eliminar
            document.querySelectorAll('.remove').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = parseInt(this.getAttribute('data-cart-id'));
                    removeFromCart(productId);
                });
            });
        }
        
        function addToCart(productId) {
            const product = products.find(p => p.id_producto === productId);
            if (!product) return;
            
            const existing = cart.find(item => item.id_producto === productId);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({ ...product, quantity: 1 });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDropdown();
            
            // Mostrar SweetAlert
            Swal.fire({
                title: '¡Producto agregado!',
                text: `${product.nombre_producto} se ha añadido al carrito`,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                showConfirmButton: false
            });
        }
        
        function removeFromCart(productId) {
            // Encontrar el producto en el carrito
            const productIndex = cart.findIndex(item => item.id_producto === productId);
            
            if (productIndex !== -1) {
                const product = cart[productIndex];
                
                // Mostrar confirmación antes de eliminar
                Swal.fire({
                    title: '¿Eliminar producto?',
                    text: `¿Estás seguro de que quieres eliminar ${product.nombre_producto} del carrito?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ff3c5f',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar el producto del carrito
                        cart.splice(productIndex, 1);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCartCount();
                        updateCartDropdown();
                        
                        Swal.fire(
                            '¡Eliminado!',
                            'El producto ha sido eliminado del carrito.',
                            'success'
                        );
                    }
                });
            }
        }
        
        // Delegar clicks en botones de agregar al carrito
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-to-cart-btn') || 
                (e.target.closest('.add-to-cart') && e.target.tagName === 'A')) {
                e.preventDefault();
                // Buscar el nombre del producto en el DOM
                const productElement = e.target.closest('.single-product') || 
                                      e.target.closest('.quickview-content');
                if (!productElement) return;
                
                const name = productElement.querySelector('h3, h2').textContent.trim();
                const product = products.find(p => p.nombre_producto === name);
                if (product) addToCart(product.id_producto);
            }
            
            // Manejar eliminación desde el icono de eliminar
            if (e.target.classList.contains('fa-remove') || 
                (e.target.closest('.remove') && e.target.tagName === 'A')) {
                e.preventDefault();
                const removeBtn = e.target.closest('.remove');
                if (removeBtn && removeBtn.dataset.cartId) {
                    const productId = parseInt(removeBtn.dataset.cartId);
                    removeFromCart(productId);
                }
            }
        });
        
        // Inicializar contador y dropdown al cargar
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
            updateCartDropdown();
        });
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/active.js"></script>
</body>

</html>