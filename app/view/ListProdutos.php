<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fest Bum - Personalizados</title>
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">
    
    <!-- Font Awesome atualizado -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Estilo para o modal */
        .custom-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .custom-modal-content {
            background: #fff;
            width: 90%;
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .custom-modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
        .product-card {
            display: inline-block;
            width: 200px;
            margin: 10px;
            text-align: center;
        }
        .product-card-img {
            height: 150px;
            background-size: cover;
            background-position: center;
        }
        .icon-mercado {
            margin-top: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="social-icons">
                <a href="https://www.instagram.com/festbum_personalizados/" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="https://api.whatsapp.com/send/?phone=5511948268791&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a>
            </div>
            <span class="shipping-info">FRETE PERSONALIZADO PARA ENCOMENDAS</span>
        </div>
        <div class="header-main">
            <div class="logo">
                <img src="./assets/images/logo/logo.svg" alt="logo fest bum" width="120" height="36">
            </div>
            <div class="search-bar-container">
                <div class="search-bar">
                    <input type="text" placeholder="Coloque o nome do produto">
                </div>
                <div class="header-icons">
                    <a href="#"><i class="fas fa-user"></i></a>
                    <a href="#"><i class="fas fa-shopping-bag"></i></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Produtos -->
    <section class="container my-5">
        <div class="product-container"></div>
    </section>

    <!-- Modal Customizado -->
    <div class="custom-modal" id="customCartModal">
        <div class="custom-modal-content">
            <span class="custom-modal-close" id="closeCustomModal">&times;</span>
            <h5>Carrinho de Compras</h5>
            <div id="cartItemsContainer"></div>
            <div class="d-flex justify-content-between mt-3">
                <h5>Total: R$ <span id="cartTotal">0.00</span></h5>
                <button id="finalizeOrder" class="btn btn-success">Fechar Pedido</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function configureProductCards() {
                $(".product-card-img").each(function () {
                    const defaultImage = $(this).attr("image");
                    const hoverImage = $(this).attr("image-hover");
                    $(this).css("background-image", `url(${defaultImage})`);
                    $(this).hover(
                        function () {
                            $(this).css("background-image", `url(${hoverImage})`);
                        },
                        function () {
                            $(this).css("background-image", `url(${defaultImage})`);
                        }
                    );
                });
            }

            function loadProducts() {
                $.ajax({
                    url: '../controllers/CtrlProdutos.php',
                    type: 'GET',
                    success: function (data) {
                        const productContainer = $(".product-container");
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
                                </div>
                            `;
                            productContainer.append(productCard);
                        });
                        configureProductCards();
                    },
                    error: function (xhr) {
                        console.error("Erro ao carregar produtos:", xhr.responseText);
                        $(".product-container").html("<p class='text-danger'>Erro ao carregar produtos. Tente novamente mais tarde.</p>");
                    }
                });
            }

            loadProducts(); // Carrega os produtos na inicialização

            let cart = []; // Carrinho de compras

            // Funções do carrinho...
            // Adicionar ao carrinho
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
                    cart.push({
                        name: productName,
                        price: productPrice,
                        quantity: 1,
                    });
                }

                alert(`${productName} foi adicionado ao carrinho!`);
                updateCartModal();
            });

	// Aumentar quantidade
	$(document).on("click", ".increase-quantity", function() {
		const index = $(this).data("index");
		cart[index].quantity++;
		updateCartModal();
	});

	// Diminuir quantidade
	$(document).on("click", ".decrease-quantity", function() {
		const index = $(this).data("index");
		if (cart[index].quantity > 1) {
			cart[index].quantity--;
		} else {
			if (confirm(`Deseja remover ${cart[index].name} do carrinho?`)) {
				cart.splice(index, 1);
			}
		}
		updateCartModal();
	});

	// Mostrar modal do carrinho
	$(".fa-shopping-bag").click(function() {
		$("#cartModal").show();
		updateCartModal();
	});

	// Finalizar pedido
	$("#finalizeOrder").click(function() {
		if (cart.length === 0) {
			alert("Seu carrinho está vazio.");
			return;
		}

		let orderMessage = "Pedido realizado via Fest Bum:%0A";
		let total = 0;

		cart.forEach(item => {
			orderMessage += `${item.name} - R$ ${item.price.toFixed(2).replace('.', ',')} x ${item.quantity}%0A`;
			total += item.price * item.quantity;
		});

		orderMessage += `%0ATotal: R$ ${total.toFixed(2).replace('.', ',')}`;
		const whatsappURL = `https://api.whatsapp.com/send?phone=5511948268791&text=${orderMessage}`;
		window.open(whatsappURL, "_blank");
	});
});
</script>
</body>
</html>



