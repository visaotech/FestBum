<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fest Bum - Personalizados</title>
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">
    
    <!-- Font Awesome atualizado -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Bootstrap CSS atualizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Estilo para centralizar o carrinho */
        #cartModal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 500px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: none;
            padding: 20px;
        }
        #cartOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .cart-items {
            max-height: 300px;
            overflow-y: auto;
        }
        .cart-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .close-cart {
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }


</style>

</head>
<body>
    <header>
        <div class="top-bar">
            <div class="social-icons">
                <a href="https://www.instagram.com/festbum_personalizados/" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="https://api.whatsapp.com/send/?phone=5511948268791&text=Oi!"><i class="fab fa-whatsapp"></i></a>
            </div>
            <span class="shipping-info">FRETE PERSONALIZADO PARA ENCOMENDAS</span>
        </div>
        <div class="header-main">
            <div class="logo">
                <img src="./assets/images/logo/logo.svg" alt="logo fest bum" width="120" height="36">
            </div>
            <div class="search-bar-container">
                <div class="header-icons">
                    <a href="#"><i class="fas fa-user"></i></a>
                    <a href="#"><i class="fas fa-shopping-bag"></i></a>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <a href="#" class="nav-link">Embalagens</a>
        <a href="#" class="nav-link">Adesivos</a>
        <a href="#" class="nav-link">Tags</a>
        <a href="#" class="nav-link">Personalizados</a>
    </nav>
    
    <!-- Carousel Bootstrap 5 -->
    <div class="slider.container">
      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-wrapper" style="text-align: center;"></div>
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
  
          <div class="carousel-inner">
              <div class="carousel-item active c-item">
                  <img src="./assets/images/banner-1.png" class="d-block w-100 c-img" alt="Slide 1">
                  <div class="banner-content">
              
                    <p class="banner-subtitle">Personalizados</p>
      
                    <h2 class="banner-title">Tags do seu jeito</h2>
      
                    <p class="banner-text">
                      kit a partir de &dollar; <b>20</b>.00
                    </p>
                    <!-- direcionar -->
                    <a href="#" class="banner-btn">Compre Agora</a>
      
                  </div>
              </div>
              <div class="carousel-item c-item">
                  <img src="./assets/images/banner-2.png" class="d-block w-100 c-img" alt="Slide 2">
                  <div class="banner-content">
  
                    <p class="banner-subtitle">Favorito da Loja</p>
      
                    <h2 class="banner-title">Adesivos</h2>
      
                    <p class="banner-text">
                      apartir de&dollar; <b>15</b>.00
                    </p>
      
                    <a href="#" class="banner-btn">Compre Agora</a>
      
                  </div>
              </div>
              <div class="carousel-item c-item">
                  <img src="./assets/images/banner-3.png" class="d-block w-100 c-img" alt="Slide 3">
                  <div class="banner-content">
  
                    <p class="banner-subtitle">Personalizados</p>
      
                    <h2 class="banner-title">Idade e Nome em Recorte</h2>
      
                    <p class="banner-text">
                      Apartir de &dollar; <b>29</b>.99
                    </p>
      
                    <a href="#" class="banner-btn">Compre Agora</a>
      
                  </div>
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
      </div>
      </div>
      <br><br>
    <div id="loaderStatus" style="width: 100%; text-align: center;">Carregando ...</div>
    <section class="container my-5">
        <div class="product-container"></div>
    </section>

    <!-- Carrinho de compras -->
    <div id="cartOverlay"></div>
    <div id="cartModal">
        <div class="cart-header">
            <h5>Carrinho de Compras</h5>
            <span class="close-cart">&times;</span>
        </div>
        <div class="cart-items" id="cartItemsContainer"></div>
        <div class="cart-footer">
            <h5>Total: R$ <span id="cartTotal">0.00</span></h5>
            <button id="finalizeOrder" class="btn btn-success">Fechar Pedido</button>
        </div>
    </div>
      
      <!--- TESTIMONIALS, CTA & SERVICE-->

      <div class="container">
            <!--- TESTIMONIALS-->
          <div class="testimonials-box">
            <div class="testimonial">
              <h2 class="title">Avaliações</h2>
              <div class="testimonial-card">
                <img src="assets/images/testimonial-1.jpg" alt="foto de julia" class="testimonial-banner" width="80" height="80">
                <p class="testimonial-name">Julia Amorim</p>
                <p class="testimonial-title">Cliente</p>

                <p class="testimonial-desc">
                 Trabalho impecável, adquiri livros de colorir para o aniversário do meu filho e ficou do jeito que eu queria. Nota 10!
                </p>
              </div>
            </div>
  
            <!--- CTA-->
            <div class="cta-container">
              <img src="./assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner">
              <a href="#" class="cta-content">
                <p class="discount">25% de Desconto</p>
                <h2 class="cta-title">KIT DE ADESIVOS</h2>
                <p class="cta-text">Apartir de $10</p>
                <button class="cta-btn">Compre Agora</button>
              </a>
            </div>
  

            <!--- SERVICE-->
            <div class="service">
              <h2 class="title">Nossos Serviços</h2>
              <div class="service-container">

                <a href="#" class="service-item">
                  <div class="service-icon">
                    <i class="fas fa-rocket"></i>
                  </div>
                  <div class="service-content">
                    <h3 class="service-title">Frete Personalizados</h3>
                    <p class="service-desc">Apenas no Brasil</p>
                  </div>
                </a>
  
                <a href="#" class="service-item">
                  <div class="service-icon">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div class="service-content">
                    <h3 class="service-title">Suporte Online</h3>
                    <p class="service-desc">Horas: 8AM - 11PM</p>
                  </div>
                </a>
  
                <a href="#" class="service-item">
                  <div class="service-icon">
                    <i class="fas fa-arrow-left"></i>
                  </div>
                  <div class="service-content">
                    <h3 class="service-title">Politica de Retorno</h3>
                    <p class="service-desc">Não fazemos trocas e devoluções</p>
                  </div>    
                </a>
        
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  
    <!--- FOOTER-->
    <footer>
  <!-- direcionar links -->
      <div class="footer-category">
        <div class="container">
          <h2 class="footer-category-title">Produtos</h2>

          <div class="footer-category-box">
            <h3 class="category-box-title">Embalagens:</h3>
            <a href="#" class="footer-category-link">Caixa meia bala</a>
            <a href="#" class="footer-category-link">Caixa Pirâmide</a>
            <a href="#" class="footer-category-link">Caixa Milk com Laço</a>
            <a href="#" class="footer-category-link">Tubete Personalizado</a>
            <a href="#" class="footer-category-link">Tubete c/ aplique 3d</a>
            <a href="#" class="footer-category-link">Sacola personalizada </a>
          </div>
  
          <div class="footer-category-box">
            <h3 class="category-box-title">Adesivos:</h3>
            <a href="#" class="footer-category-link">Marmita</a>
            <a href="#" class="footer-category-link">Logo</a>
            <a href="#" class="footer-category-link">Bala + card</a>
            <a href="#" class="footer-category-link">Bala</a>
            <a href="#" class="footer-category-link">Lacre para sacola</a>
            <a href="#" class="footer-category-link">Lacre para bolo de pote</a>
            <a href="#" class="footer-category-link">Lacre copo bolha</a>
          </div>
  
          <div class="footer-category-box">
            <h3 class="category-box-title">Tags:</h3>
            <a href="#" class="footer-category-link">Tag em papel off 7</a>
            <a href="#" class="footer-category-link">Tag em papel craft</a>
          </div>
  
          <div class="footer-category-box">
            <h3 class="category-box-title">Personalizados</h3>
            <a href="#" class="footer-category-link">Agradecimento de Mesa</a>
            <a href="#" class="footer-category-link">Idade em Recorte</a>
            <a href="#" class="footer-category-link">Idade em Recorte c/ fundo</a>
            <a href="#" class="footer-category-link">Nome em Recorte</a>
            <a href="#" class="footer-category-link">Nome em Recorte c/ fundo</a>
            <a href="#" class="footer-category-link">Livro de Colorir</a>
            <a href="#" class="footer-category-link">Giz de cera</a>
            <a href="#" class="footer-category-link">Lápis</a>
            <a href="#" class="footer-category-link">Polaroid c/ imã</a>
          </div>
        </div>
      </div>
 
      <div class="footer-nav">
        <div class="container">
          <ul class="footer-nav-list">
            <li class="footer-nav-item">
              <h2 class="nav-title">Produtos Populares</h2>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Tags Personalizada</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Adesivos</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Livro de colorir</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Sacolinha personalizada</a>
            </li>
          </ul>
  
          <ul class="footer-nav-list">
            <li class="footer-nav-item">
              <h2 class="nav-title">Nossa Empresa</h2>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Entrega para todo Brasil</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Segurança e praticidade</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Itens Personalizados</a>
            </li>
          </ul>
  
          <ul class="footer-nav-list">
            <li class="footer-nav-item">
              <h2 class="nav-title">Serviços</h2>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Embalagens</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Adesivos</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Tags</a>
            </li>
            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">Personalizados</a>
            </li>
          </ul>
  
          <ul class="footer-nav-list">
            <li class="footer-nav-item">
              <h2 class="nav-title">Contato</h2>
            </li>
            <li class="footer-nav-item flex">
                <div class="icon-box">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
              <address class="content">
                Rua Irmã Dulce, 11 - Santa Maria, Osaco, SP 06149-217
              </address>
            </li>
  
            <li class="footer-nav-item flex">
                <div class="icon-box">
                <i class="fas fa-phone-alt"></i>
              </div>
              <a href="tel:+607936-8058" class="footer-nav-link"> WhatsApp - (11) 94826-8791</a>
            </li>
  
            <li class="footer-nav-item flex">
                <div class="icon-box">
                    <i class="fas fa-envelope"></i>
                  </div>
              <a href="mailto:example@gmail.com" class="footer-nav-link">festbumbaloespersonalizados@gmail.com</a>
            </li>
          </ul>
  
          <ul class="footer-nav-list">
            <li class="footer-nav-item">
              <h2 class="nav-title">Nossas Redes Sociais</h2>
            </li>
            <li>
              <ul class="social-link">
                <li class="footer-nav-item">
                    <a href="https://api.whatsapp.com/send/?phone=5511948268791&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a>
                </li>
                <li class="footer-nav-item">
                    <a href="https://www.instagram.com/festbum_personalizados/" class="social-link"><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
  
      <div class="footer-bottom">
        <div class="container">
          <img src="./assets/images/payment.png" alt="payment method" class="payment-img">
          <p class="copyright">
            Copyright &copy; <a href="#">Fest Bum</a> all rights reserved.
          </p>
        </div>
      </div>
    </footer>
    <script>
        $(document).ready(function () {
            let cart = []; // Carrinho de compras
            
            
            function loadProducts() {
                $.ajax({
                    url: '../controllers/CtrlProdutos.php',
                    type: 'GET',
                    success: function (data) {
                        const productContainer = $(".product-container");
                        $("#loaderStatus").hide();
                        productContainer.empty();
                        data.forEach(product => {
                            const productCard = `
                                <div class="product-card" id="product-card-${product.id}">
                                    <div class="product-card-img" image="${product.img01}" image-hover="${product.img02}" style="background-image: url(${product.img01});"></div>
                                    <div class="icon-mercado">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="product-card-detail">
                                        <h3 class="product-card-detail-title">${product.nome}</h3>
                                        <div class="product-card-detail-price">R$ ${parseFloat(product.preco).toFixed(2).replace('.', ',')}</div>
                                        <div class="product-card-detail-description">
                                            ${product.descricao}
                                        </div>
                                    </div>
                                </div>`;
                            productContainer.append(productCard);
                          
                        });
                    },
                    error: function (xhr) {
   
                    	console.error("Erro ao carregar produtos:", xhr.responseText);
                        $(".product-container").html("<p class='text-danger'>Erro ao carregar produtos. Tente novamente mais tarde.</p>");
                    }
                });
            }

            function updateCartModal() {
                const cartItemsContainer = $("#cartItemsContainer");
                const cartTotalElement = $("#cartTotal");
                cartItemsContainer.empty();
                let total = 0;

                if (cart.length === 0) {
                    cartItemsContainer.html("<p class='text-center'>Seu carrinho está vazio.</p>");
                    cartTotalElement.text("0.00");
                    return;
                }

                cart.forEach((item, index) => {
                    total += item.price * item.quantity;

                    const cartItem = `
                        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                            <div>
                                <strong>${item.name}</strong><br>
                                <span>R$ ${item.price.toFixed(2).replace('.', ',')}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-danger me-2 decrease-quantity" data-index="${index}">-</button>
                                <span>${item.quantity}</span>
                                <button class="btn btn-sm btn-success ms-2 increase-quantity" data-index="${index}">+</button>
                            </div>
                        </div>`;
                    cartItemsContainer.append(cartItem);
                });

                cartTotalElement.text(total.toFixed(2).replace('.', ','));
            }

            $(".product-container").on("click", ".icon-mercado", function () {
                const productCard = $(this).closest(".product-card");
                const productName = productCard.find(".product-card-detail-title").text();
                const productPrice = parseFloat(
                    productCard.find(".product-card-detail-price").text().replace("R$ ", "").replace(",", ".")
                );

                const existingItem = cart.find(item => item.name === productName);

                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({ name: productName, price: productPrice, quantity: 1 });
                }

                alert(`${productName} foi adicionado ao carrinho!`);
                updateCartModal();
            });

            $(document).on("click", ".increase-quantity", function () {
                const index = $(this).data("index");
                cart[index].quantity++;
                updateCartModal();
            });

            $(document).on("click", ".decrease-quantity", function () {
                const index = $(this).data("index");
                if (cart[index].quantity > 1) {
                    cart[index].quantity--;
                } else {
                    cart.splice(index, 1);
                }
                updateCartModal();
            });

            $(".fa-user").click(function () {
                window.location.href = "admin.php";
            });
            
            $(".fa-shopping-bag").click(function () {
                $("#cartOverlay, #cartModal").fadeIn();
                updateCartModal();
            });

            $(".close-cart, #cartOverlay").click(function () {
                $("#cartOverlay, #cartModal").fadeOut();
            });

            $("#finalizeOrder").click(function () {
                if (cart.length === 0) {
                    alert("Seu carrinho está vazio.");
                    return;
                }

                let orderMessage = "Pedido realizado via Fest Bum:%0A%0A";
                let total = 0;

                cart.forEach(item => {
                    orderMessage += `Produto: ${item.name}%0AQuantidade: ${item.quantity}%0APreço Unitário: R$ ${item.price.toFixed(2).replace('.', ',')}%0A%0A`;
                    total += item.price * item.quantity;
                });

                orderMessage += `%0ATotal do Pedido: R$ ${total.toFixed(2).replace('.', ',')}%0A`;
                orderMessage += `%0ANota: O pedido está sujeito à confirmação de disponibilidade.`;

                const whatsappURL = `https://api.whatsapp.com/send?phone=5511948268791&text=${orderMessage}`;
                window.open(whatsappURL, "_blank");
            });
            loadProducts();
        });
    </script>
</body>
</html>
