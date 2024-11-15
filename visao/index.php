<?php
session_start(); 


if (!isset($_SESSION["usuario"]) ) {
    if (!isset($_POST['usuario'])){
        $usuario =  $_POST['usuario'];
        header("Location: login.php?erro=usuario não logado!");
        exit;
    
    }
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['nomeusuario'] = $_POST['nomeusuario'];
}
require_once 'menu.php';


include '..\controladora\conexao.php';
include '..\modelo\Produto.php';
include '..\repositorio\ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);
$Adesivos = $produtosRepositorio->listarAdesivos();
$Embalagens = $produtosRepositorio->listarEmbalagens();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fest Bum - Personalizados</title>
  <link rel="shortcut icon" href="../assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>
  <div class="overlay" data-overlay></div>
  <!--- HEADER -->
  <header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

          <li>
            <a href="https://www.instagram.com/festbum_personalizados/" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li> 


          <li>
            <a href="https://api.whatsapp.com/send/?phone=5511948268791&text&type=phone_number&app_absent=0" class="social-link">
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>

        </ul>

        <div class="header-alert-news">
          <p>
            <b>FRETE PERSONALIZADO</b>
            PARA ENCOMENDAS
          </p>
        </div>
        </div>
      </div>
    </div>

    <div class="header-main">

      <div class="container">
  
        <a href="#" class="header-logo">
          <img src="../assets/images/logo/logo.svg" alt="logo fest bum" width="120" height="36">
        </a> 

        <!-- barra pesquisa *falta adc o js nela -->
        <div class="header-search-container">

          <input id="search"
          type="text" 
          class="search-field" 
          placeholder="Coloque o nome do produto">

          <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>

        </div>

        <!-- alterei -->
        <div class="header-user-actions">

          <a href="./visao/login.php">
            <button class="action-btn">
              <ion-icon name="person-outline"></ion-icon>
            </button>
          </a>
          
          <a href="mercado.html">
            <button class="action-btn">
              <ion-icon name="bag-handle-outline"></ion-icon>
              <span class="count">0</span>
            </button>
          </a>
 
        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="#" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <div class="dropdown-panel">

              <ul class="dropdown-panel-list">
            
                <li class="menu-title">
                  <a href="#">Embalagens</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Caixa Meia Bala</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Caixa Pirâmide</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Caixa Milk C/ Laço</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Tubete Personalizado</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Tubete c/ aplique 3d</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Sacola Personalizada</a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#">Adesivos</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Marmitas</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Logo</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Bala</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Bala + Card</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Lacre Sacola</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Lacre Bolo de Pote</a>
                </li>
                
                <li class="panel-list-item">
                  <a href="#">Lacre Copo Bolha</a>
                </li>
              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#">Tags</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Tag em papel off 7</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Tag em papel craft</a>
                </li>

  
              </ul>


          <li class="menu-category">
            <a href="#" class="menu-title">Embalagens</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Caixa Meia Bala</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Caixa Pirâmide</a>
              </li>

              <li class="dropdown-item"">
                <a href="#">Caixa Milk C/ Laço</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Tubete Personalizado</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Tubete c/ aplique 3d</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Sacola Personalizada</a>
              </li>

            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Adesivos</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Marmitas</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Logo</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Bala</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Bala + Card</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Lacre Sacola</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Lacre Bolo de Pote</a>
              </li>
              
              <li class="dropdown-item">
                <a href="#">Lacre Copo Bolha</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Tags</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Tag em papel off 7</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Tag em papel craft</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Personalizados</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Agradecimento de Mesa</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Idade em Recorte</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Idade em Recorte c/ fundo</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Nome em Recorte</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Nome em Recorte c/ Fundo</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Livro Colorir</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Giz de Cera</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Lápis</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Foto Polaroid c/ Imã</a>
              </li>
            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Avaliações</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Promoções</a>
          </li>

        </ul>

      </div>

    </nav>

   <!--Adicionando js para os botões do celular-->
   <div class="mobile-bottom-navigation">

    <button class="action-btn" data-mobile-menu-open-btn>
      <ion-icon name="menu-outline"></ion-icon>
    </button>

    <a href="mercado.html">
      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>
        <span class="count">0</span>
      </button>
   </a>

    <a href="favoritos.html">
      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>
        <span class="count">0</span>
      </button>
    </a>
  </div>
    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>
      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">
       <!--  add section -->
        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Embalagens</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Caixa Meia Bala</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Caixa Pirâmide</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Caixa Milk c/ Laço</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Tubete Personalizado</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Tubete c/ Aplique 3d</a>
            </li>
          
            <li class="submenu-category">
              <a href="#" class="submenu-title">Sacola Personalizado</a>
            </li>
        </ul>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Adesivos</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Marmita</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Logo</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bala</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bala + Card</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Lacre Sacola</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Lacre Bolo de pote</a>
            </li>
            
            <li class="submenu-category">
              <a href="#" class="submenu-title">Lacre Copo Bolha</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title"> Tags</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Tag em papel off 7</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Tag em papel craft</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Personalizados</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Agradecimento de Mesa</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Idade Em Recorte</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Idade Em Recorte c/ Fundo</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Nome Em Recorte</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Nome Em Recorte c/ Fundo</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Livro de Colorir</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Giz de Cera</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Lápis</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Foto Polaroid c/ Imã</a>
            </li>
          </ul>

        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Avaliações</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Promoções</a>
        </li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-social-container">

          <li>
            <a href="https://www.instagram.com/festbum_personalizados/" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li> 

          <li>
            <a href="https://api.whatsapp.com/send/?phone=5511948268791&text&type=phone_number&app_absent=0" class="social-link">
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </nav>

  </header>
  <!--- MAIN -->
  <main>
    <!-- BANNER -->
    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="../assets/images/banner-1.png" alt="garrafas personalizadas e topo de bolo" class="banner-img">

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

          <div class="slider-item">

            <img src="../assets/images/banner-2.png" alt="adesivos personalizados" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Favorito da Loja</p>

              <h2 class="banner-title">Adesivos</h2>

              <p class="banner-text">
                apartir de&dollar; <b>15</b>.00
              </p>

              <a href="#" class="banner-btn">Compre Agora</a>

            </div>

          </div>

          <div class="slider-item">

            <img src="../assets/images/banner-3.png" alt="tags personalizadas" class="banner-img">

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

      </div>

    </div>

    <!--- CATEGORY-->

    <div class="category">

      <div class="container">

        <div class="category-item-container has-scrollbar">

          <div class="category-item">

            <div class="category-img-box">
              <img src="../assets/images/icons/embalagem.svg" alt="dress & frock" width="30">
            </div>

            <div class="category-content-box">

              <div class="category-content-flex">
                <h3 class="category-item-title">Embalagens</h3>

                <p class="category-item-amount">(06)</p>
              </div>
             <!--  direcionamento -->
              <a href="#" class="category-btn">Mostre Todos</a>

            </div>

          </div>

          <div class="category-item">

            <div class="category-img-box">
              <img src="../assets/images/icons/adesivo.svg" alt="winter wear" width="30">
            </div>

            <div class="category-content-box">

              <div class="category-content-flex">
                <h3 class="category-item-title">Adesivos</h3>

                <p class="category-item-amount">(07)</p>
              </div>

              <a href="#" class="category-btn">Mostre Todos</a>

            </div>

          </div>

          <div class="category-item">

            <div class="category-img-box">
              <img src="../assets/images/icons/tag.svg" alt="glasses & lens" width="30">
            </div>

            <div class="category-content-box">

              <div class="category-content-flex">
                <h3 class="category-item-title">Tags</h3>

                <p class="category-item-amount">(02)</p>
              </div>

              <a href="#" class="category-btn">Mostre Todos</a>

            </div>

          </div>

          <div class="category-item">

            <div class="category-img-box">
              <img src="../assets/images/icons/pessoa.svg" alt="shorts & jeans" width="30">
            </div>

            <div class="category-content-box">

              <div class="category-content-flex">
                <h3 class="category-item-title">Personaizados</h3>

                <p class="category-item-amount">(09)</p>
              </div>

              <a href="#" class="category-btn">Mostre Todos</a>

            </div>

          </div>
          </div>
          </div>
          </div>
  
<!--- PRODUTOS -->

<div class="product-container">

  <div class="container">

<!-- PRODUCT GRID -->
<div class="product-main">

<h2 class="title">PRODUTOS</h2>

<div class="product-grid">

<div class="showcase">
 <!--   ESTOU UTILIZANDO ESTE PRODUTO COMO TESTE, APÓS CONCLUSÃO REPETIREI O PROCESSO NOS SEGUINTES -->
         
        <div class="showcase-banner">

          <img src="../assets/images/products/caixameiabala.jpg" alt="" width="300" class="product-img default">
          <img src="../assets/images/products/caixameiabala2.jpg" alt="" width="300" class="product-img hover">

          <div class="showcase-actions">
           <!--  direcionar para pag de fav e mercado -->
           <button class="btn-action">
            <ion-icon name="heart-outline"></ion-icon>
          </button>

          <button class="btn-action">
            <ion-icon name="bag-add-outline"></ion-icon>
          </button>

        </div>

        <div class="showcase-content">

            <a href="#" class="showcase-category">Caixa Meia Bala</a>

            <h3>
              <a href="#" class="showcase-title">Minimo: 10 unidades</a>
            </h3>

            <div class="price-box">
              <p class="price">R$ 3,00</p>
            </div>
          </div>
        </div>
        </div>

        <div class="showcase">
        <div class="showcase-banner">
          <img src="../assets/images/products/caixapiramide.jpg" alt="" class="product-img default"
            width="300">
          <img src="../assets/images/products/caixapiramide2.jpg" alt="Ete" class="product-img hover"
            width="300">
            <div class="showcase-actions">
              <!--  direcionar para pag de fav e mercado -->
               <button class="btn-action">
                 <ion-icon name="heart-outline"></ion-icon>
               </button>
   
               <button class="btn-action">
                 <ion-icon name="bag-add-outline"></ion-icon>
               </button>
   
             </div>
        </div>

        <div class="showcase-content">
            <a href="#" class="showcase-category">Caixa Pirâmide</a>
        
            <h3>
              <a href="#" class="showcase-title">Minimo: 10 unidades </a>
            </h3>
    
            <div class="price-box">
              <p class="price">$3,00</p>
            </div>
          </div>
        </div>

            <div class="showcase">
              
                <div class="showcase-banner">
                  <img src="../assets/images/products/caixamilk1.jpg" alt="" class="product-img default"
                    width="300">
                  <img src="../assets/images/products/caixamilk2.jpg" alt="Ete" class="product-img hover"
                    width="300">
              
                    <div class="showcase-actions">
                      <!--  direcionar para pag de fav e mercado -->
                       <button class="btn-action">
                         <ion-icon name="heart-outline"></ion-icon>
                       </button>
           
                       <button class="btn-action">
                         <ion-icon name="bag-add-outline"></ion-icon>
                       </button>
           
                     </div>
                </div>
    
                <div class="showcase-content">
                    <a href="#" class="showcase-category">Caixa Milk C/ Laço</a>
                
                    <h3>
                      <a href="#" class="showcase-title">Minimo: 10 unidades</a>
                    </h3>
                
                    <div class="price-box">
                      <p class="price">$3,50</p>
                    </div>
                  </div>
                </div>

                
                <div class="showcase">
              
                  <div class="showcase-banner">
                    <img src="../assets/images/products/tubo3d.webp" alt="" class="product-img default"
                      width="300">
                    <img src="../assets/images/products/tubete2.webp" alt="Ete" class="product-img hover"
                      width="300">
                      <div class="showcase-actions">
                        <!--  direcionar para pag de fav e mercado -->
                         <button class="btn-action">
                           <ion-icon name="heart-outline"></ion-icon>
                         </button>
             
                         <button class="btn-action">
                           <ion-icon name="bag-add-outline"></ion-icon>
                         </button>
             
                       </div>
                  </div>
      
                  <div class="showcase-content">
                      <a href="#" class="showcase-category">Tubete Personalizado</a>
                  
                      <h3>
                        <a href="#" class="showcase-title">Minimo: 10 unidades </a>
                      </h3>
              
                      <div class="price-box">
                        <p class="price">$1,30</p>
                      </div>
                    </div>
                  </div>
                  <div class="showcase">
              
                    <div class="showcase-banner">
                      <img src="../assets/images/products/tubo3d.webp" alt="" class="product-img default"
                        width="300">
                      <img src="../assets/images/products/tubete2.webp" alt="Ete" class="product-img hover"
                        width="300">
                        <div class="showcase-actions">
                          <!--  direcionar para pag de fav e mercado -->
                           <button class="btn-action">
                             <ion-icon name="heart-outline"></ion-icon>
                           </button>
               
                           <button class="btn-action">
                             <ion-icon name="bag-add-outline"></ion-icon>
                           </button>
               
                         </div>
                    </div>
        
                    <div class="showcase-content">
                        <a href="#" class="showcase-category">Tubete C/ Aplique 3d</a>
                    
                        <h3>
                          <a href="#" class="showcase-title">Minimo: 10 unidades</a>
                        </h3>

                        <div class="price-box">
                          <p class="price">$2,00</p>
                        </div>
                      </div>
                    </div>
                    <div class="showcase">
              
                      <div class="showcase-banner">
                        <img src="../assets/images/products/sacola1.jpg" alt="" class="product-img default"
                          width="300">
                        <img src="../assets/images/products/sacola2.jpg" alt="Ete" class="product-img hover"
                          width="300">
                    
                          <div class="showcase-actions">
                            <!--  direcionar para pag de fav e mercado -->
                             <button class="btn-action">
                               <ion-icon name="heart-outline"></ion-icon>
                             </button>
                 
                             <button class="btn-action">
                               <ion-icon name="bag-add-outline"></ion-icon>
                             </button>
                 
                           </div>
                      </div>
          
                      <div class="showcase-content">
                          <a href="#" class="showcase-category">Sacolas Personalizadas</a>
                      
                          <h3>
                            <a href="#" class="showcase-title">Minimo: 10 unidades</a>
                          </h3>
                      
                          <div class="price-box">
                            <p class="price">A partir de $2,90</p>
                          </div>
                        </div>
                      </div>

                   <!--  adesivos -->
                   <div class="showcase">
              
                    <div class="showcase-banner">
                      <img src="../assets/images/products/lacresacola1.jpg" alt="" class="product-img default"
                        width="300">
                      <img src="../assets/images/products/lacresacola2.jpg" alt="Ete" class="product-img hover"
                        width="300">
                  
                        <div class="showcase-actions">
                          <!--  direcionar para pag de fav e mercado -->
                           <button class="btn-action">
                             <ion-icon name="heart-outline"></ion-icon>
                           </button>
               
                           <button class="btn-action">
                             <ion-icon name="bag-add-outline"></ion-icon>
                           </button>
               
                         </div>
                    </div>
        
                    <div class="showcase-content">
                        <a href="#" class="showcase-category">Marmita Personalizada</a>
                    
                        <h3>
                          <a href="#" class="showcase-title">Minimo: 10 unidades</a>
                        </h3>
          
                        <div class="price-box">
                          <p class="price">$0,85</p>
                        </div>
                      </div>
                    </div>
                    <div class="showcase">
              
                      <div class="showcase-banner">
                        <img src="../assets/images/products/adesivoslogo1.jpg" alt="" class="product-img default"
                          width="300">
                        <img src="../assets/images/products/adesivoslogo2.jpg" alt="Ete" class="product-img hover"
                          width="300">
                    
                          <div class="showcase-actions">
                            <!--  direcionar para pag de fav e mercado -->
                             <button class="btn-action">
                               <ion-icon name="heart-outline"></ion-icon>
                             </button>
                 
                             <button class="btn-action">
                               <ion-icon name="bag-add-outline"></ion-icon>
                             </button>
                 
                           </div>
                      </div>
          
                      <div class="showcase-content">
                          <a href="#" class="showcase-category">Adesivos C/ Logo</a>
                      
                          <h3>
                            <a href="#" class="showcase-title">Minimo: 100 Unidades<br>
                              Tamanho: 2cm 
                            </a>
                          </h3>
                      
                          <div class="price-box">
                            <p class="price">$10,00</p>
                          </div>
                        </div>
                      </div>
                      <div class="showcase">
              
                        <div class="showcase-banner">
                          <img src="../assets/images/products/adesivosbala1.jpg" alt="" class="product-img default"
                            width="300">
                          <img src="../assets/images/products/adesivosbala2.jpg" alt="Ete" class="product-img hover"
                            width="300">
                      
                            <div class="showcase-actions">
                              <!--  direcionar para pag de fav e mercado -->
                               <button class="btn-action">
                                 <ion-icon name="heart-outline"></ion-icon>
                               </button>
                   
                               <button class="btn-action">
                                 <ion-icon name="bag-add-outline"></ion-icon>
                               </button>
                   
                             </div>
                        </div>
            
                        <div class="showcase-content">
                            <a href="#" class="showcase-category">Adesivos para Bala</a>
                        
                            <h3>
                              <a href="#" class="showcase-title">Minimo: 100 Unidades<br>
                                Tamanho: 7x65 cm </a>
                            </h3>
                      
                            <div class="price-box">
                              <p class="price">$35,00</p>
                            </div>
                          </div>
                        </div>        
                        <div class="showcase">
              
                          <div class="showcase-banner">
                            <img src="../assets/images/products/adesivosbala1.jpg" alt="" class="product-img default"
                              width="300">
                            <img src="../assets/images/products/adesivosbala2.jpg" alt="Ete" class="product-img hover"
                              width="300">

                              <div class="showcase-actions">
                                <!--  direcionar para pag de fav e mercado -->
                                 <button class="btn-action">
                                   <ion-icon name="heart-outline"></ion-icon>
                                 </button>
                     
                                 <button class="btn-action">
                                   <ion-icon name="bag-add-outline"></ion-icon>
                                 </button>
                     
                               </div>
                          </div>
              
                          <div class="showcase-content">
                              <a href="#" class="showcase-category">Adesivos para Bala + Card</a>
                          
                              <h3>
                                <a href="#" class="showcase-title">Minimo: 100 Unidades</a>
                              </h3>
                        
                              <div class="price-box">
                                <p class="price">$100,00</p>
                              </div>
                            </div>
                          </div>        
                          <div class="showcase">
              
                            <div class="showcase-banner">
                              <img src="../assets/images/products/lacresacola1.jpg" alt="" class="product-img default"
                                width="300">
                              <img src="../assets/images/products/lacresacola2.jpg" alt="Ete" class="product-img hover"
                                width="300">

                                <div class="showcase-actions">
                                  <!--  direcionar para pag de fav e mercado -->
                                   <button class="btn-action">
                                     <ion-icon name="heart-outline"></ion-icon>
                                   </button>
                       
                                   <button class="btn-action">
                                     <ion-icon name="bag-add-outline"></ion-icon>
                                   </button>
                       
                                 </div>
                            </div>
                
                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Lacre para Sacolas</a>
                            
                                <h3>
                                  <a href="#" class="showcase-title">Minimo: 100 Unidades<br>
                                    Tamanho: 7x3 cm </a>
                                </h3>
                            
                                <div class="price-box">
                                  <p class="price">A partir de R$ 36,00</p>
                                </div>
                              </div>
                            </div>
                
                            <div class="showcase">
                              
                            <div class="showcase-banner">
                              <img src="../assets/images/products/lacrepote1.jpg" alt="" class="product-img default"
                                width="300">
                              <img src="../assets/images/products/lacrepote2.jpg" alt="Ete" class="product-img hover"
                                width="300">
                                <div class="showcase-actions">
                                  <!--  direcionar para pag de fav e mercado -->
                                   <button class="btn-action">
                                     <ion-icon name="heart-outline"></ion-icon>
                                   </button>
                       
                                   <button class="btn-action">
                                     <ion-icon name="bag-add-outline"></ion-icon>
                                   </button>
                       
                                 </div>
                            </div>
                
                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Lacre para bolo de pote</a>
                            
                                <h3>
                                  <a href="#" class="showcase-title">Minimo: 100 Unidades<br>
                                    Tamanho: 11cm </a>
                                </h3>
                        
                                <div class="price-box">
                                  <p class="price">$50,00</p>
                                </div>
                              </div>
                            </div>
                
                            <div class="showcase">
                              
                            <div class="showcase-banner">
                              <img src="../assets/images/products/lacrecopo1.jpg" alt="" class="product-img default"
                                width="300">
                              <img src="../assets/images/products/lacrecopo2.jpg" alt="Ete" class="product-img hover"
                                width="300">

                                <div class="showcase-actions">
                                  <!--  direcionar para pag de fav e mercado -->
                                   <button class="btn-action">
                                     <ion-icon name="heart-outline"></ion-icon>
                                   </button>
                       
                                   <button class="btn-action">
                                     <ion-icon name="bag-add-outline"></ion-icon>
                                   </button>
                       
                                 </div>
                            </div>
                
                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Lacre para copo bolha</a>
                            
                                <h3>
                                  <a href="#" class="showcase-title">Minimo: 100 Unidades<br>
                                    Tamanho: 14cm </a>
                                </h3>
                            
                                <div class="price-box">
                                  <p class="price">$55,00</p>
                                </div>
                              </div>
                            </div>
                      
                            <!--tags -->
                            <div class="showcase">
                              
                            <div class="showcase-banner">
                              <img src="../assets/images/products/tagoffset2.png" alt="" class="product-img default"
                                width="300">
                              <img src="../assets/images/products/tagsetoff1.jpg" alt="Ete" class="product-img hover"
                                width="300">
                          
                                <div class="showcase-actions">
                                  <!--  direcionar para pag de fav e mercado -->
                                   <button class="btn-action">
                                     <ion-icon name="heart-outline"></ion-icon>
                                   </button>
                       
                                   <button class="btn-action">
                                     <ion-icon name="bag-add-outline"></ion-icon>
                                   </button>
                       
                                 </div>
                            </div>
                
                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Tag Em Papel Off Set</a>
                            
                                <h3>
                                  <a href="#" class="showcase-title">Gramatura: 180g<br>
                                                                    Tamanho: 4cm <br>
                                                                    Minimo: 100 unidades</a>
                                  </h3>
                            
                                <div class="price-box">
                                  <p class="price">$36,00</p>
                                </div>
                              </div>
                            </div>
                
                           <div class="showcase">
                              
                            <div class="showcase-banner">
                              <img src="../assets/images/products/tagquadrada.jpg" alt="" class="product-img default"
                                width="300">
                              <img src="../assets/images/products/tagretangula.jpg" alt="Ete" class="product-img hover"
                                width="300">
                          
                                <div class="showcase-actions">
                                  <!--  direcionar para pag de fav e mercado -->
                                   <button class="btn-action">
                                     <ion-icon name="heart-outline"></ion-icon>
                                   </button>
                       
                                   <button class="btn-action">
                                     <ion-icon name="bag-add-outline"></ion-icon>
                                   </button>
                       
                                 </div>
                            </div>
                
                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Tag Em Papel Craft</a>
                            
                                <h3>
                                  <a href="#" class="showcase-title">Minimo: 40 unidades</a>
                                  </h3>
                            
                                <div class="price-box">
                                  <p class="price">$10,00</p>
                                </div>
                              </div>
                            </div>
                  <!-- personalizados -->
              <div class="showcase">
              
                    <div class="showcase-banner">
                      <img src="../assets/images/products/agradecimento2.jpg" alt="" class="product-img default"
                        width="300">
                      <img src="../assets/images/products/agradeciemento.jpg" alt="Ete" class="product-img hover"
                        width="300">
                  
                        <div class="showcase-actions">
                          <!--  direcionar para pag de fav e mercado -->
                           <button class="btn-action">
                             <ion-icon name="heart-outline"></ion-icon>
                           </button>
               
                           <button class="btn-action">
                             <ion-icon name="bag-add-outline"></ion-icon>
                           </button>
               
                         </div>
                    </div>
        
                    <div class="showcase-content">
                        <a href="#" class="showcase-category">Agradecimento de Mesa</a>
                    
                        <h3>
                          <a href="#" class="showcase-title">Minimo: 10 Unidades</a>
                        </h3>
                  
                        <div class="price-box">
                          <p class="price">$1,50</p>

                        </div>
                      </div>
                    </div>

                    <div class="showcase">
              
                        <div class="showcase-banner">
                          <img src="../assets/images/products/idade2.jpg" alt="" class="product-img default"
                            width="300">
                          <img src="../assets/images/products/idade1.jpg" alt="Ete" class="product-img hover"
                            width="300">
                      
                            <div class="showcase-actions">
                              <!--  direcionar para pag de fav e mercado -->
                               <button class="btn-action">
                                 <ion-icon name="heart-outline"></ion-icon>
                               </button>
                   
                               <button class="btn-action">
                                 <ion-icon name="bag-add-outline"></ion-icon>
                               </button>
                   
                             </div>
                        </div>
            
                        <div class="showcase-content">
                            <a href="#" class="showcase-category">Idade em Recorte</a>
                        
                            <h3>
                              <a href="#" class="showcase-title">Minimo: 10 unidade<br>
                                Tamanho: 3cm
                              </a>
                            </h3>
                        
                            <div class="price-box">
                              <p class="price">A partir de $0,65</p>
                            </div>
                          </div>
                        </div>

                        <div class="showcase">
              
                          <div class="showcase-banner">
                            <img src="../assets/images/products/idade2.jpg" alt="" class="product-img default"
                              width="300">
                            <img src="../assets/images/products/idade1.jpg" alt="Ete" class="product-img hover"
                              width="300">
                        
                              <div class="showcase-actions">
                                <!--  direcionar para pag de fav e mercado -->
                                 <button class="btn-action">
                                   <ion-icon name="heart-outline"></ion-icon>
                                 </button>
                     
                                 <button class="btn-action">
                                   <ion-icon name="bag-add-outline"></ion-icon>
                                 </button>
                     
                               </div>
                          </div>
              
                          <div class="showcase-content">
                              <a href="#" class="showcase-category">Idade em Recorte c/ Fundo</a>
                          
                              <h3>
                                <a href="#" class="showcase-title">Minimo: 10 unidade<br>
                                  Tamanho: 4cm
                                </a>
                              </h3>
                          
                              <div class="price-box">
                                <p class="price">A partir de $1,20</p>
                              </div>
                            </div>
                          </div>

                        <div class="showcase">
              
                            <div class="showcase-banner">
                              <img src="../assets/images/products/nome1.jpg" alt="" class="product-img default"
                                width="300">
                              <img src="../assets/images/products/nome2.jpg" alt="Ete" class="product-img hover"
                                width="300">
                          
                                <div class="showcase-actions">
                                  <!--  direcionar para pag de fav e mercado -->
                                   <button class="btn-action">
                                     <ion-icon name="heart-outline"></ion-icon>
                                   </button>
                       
                                   <button class="btn-action">
                                     <ion-icon name="bag-add-outline"></ion-icon>
                                   </button>
                       
                                 </div>
                            </div>
                
                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Nome Em Recorte</a>
                            
                                <h3>
                                  <a href="#" class="showcase-title">Minimo: 10 unidades<br>
                                                                    Tamanho: 6cm</a>
                                </h3>
                            
                                <div class="price-box">
                                  <p class="price">$1,35</p>
                                </div>
                              </div>
                            </div>
                                
                            <div class="showcase">
              
                              <div class="showcase-banner">
                                <img src="../assets/images/products/nome1.jpg" alt="" class="product-img default"
                                  width="300">
                                <img src="../assets/images/products/nome2.jpg" alt="Ete" class="product-img hover"
                                  width="300">
                            
                                  <div class="showcase-actions">
                                    <!--  direcionar para pag de fav e mercado -->
                                     <button class="btn-action">
                                       <ion-icon name="heart-outline"></ion-icon>
                                     </button>
                         
                                     <button class="btn-action">
                                       <ion-icon name="bag-add-outline"></ion-icon>
                                     </button>
                         
                                   </div>
                              </div>
                  
                              <div class="showcase-content">
                                  <a href="#" class="showcase-category">Nome Em Recorte c/ Fundo</a>
                              
                                  <h3>
                                    <a href="#" class="showcase-title">Minimo: 10 unidades<br>
                                                                      Tamanho: 6cm</a>
                                  </h3>
                              
                                  <div class="price-box">
                                    <p class="price">$1,85</p>
                                  </div>
                                </div>
                              </div>
                                  
                                <div class="showcase">
              
                                    <div class="showcase-banner">
                                      <img src="../assets/images/products/livrocolorir2.jpg" alt="" class="product-img default"
                                        width="300">
                                      <img src="../assets/images/products/livrodecolorir.webp" alt="Ete" class="product-img hover"
                                        width="300">
                                  
                                        <div class="showcase-actions">
                                          <!--  direcionar para pag de fav e mercado -->
                                           <button class="btn-action">
                                             <ion-icon name="heart-outline"></ion-icon>
                                           </button>
                               
                                           <button class="btn-action">
                                             <ion-icon name="bag-add-outline"></ion-icon>
                                           </button>
                               
                                         </div>
                                    </div>
                        
                                    <div class="showcase-content">
                                        <a href="#" class="showcase-category">Livro para colorir</a>
                                    
                                        <h3>
                                          <a href="#" class="showcase-title">Contém 8 folhas<br>
                                          Minimo: 10 unidades</a>
                                        </h3>
                                    
                                        <div class="price-box">
                                          <p class="price">$1,50</p>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="showcase">
              
                                        <div class="showcase-banner">
                                          <img src="../assets/images/products/giz1.jpg" alt="" class="product-img default"
                                            width="300">
                                          <img src="../assets/images/products/giz2.jpg" alt="Ete" class="product-img hover"
                                            width="300">
                                      
                                            <div class="showcase-actions">
                                              <!--  direcionar para pag de fav e mercado -->
                                               <button class="btn-action">
                                                 <ion-icon name="heart-outline"></ion-icon>
                                               </button>
                                   
                                               <button class="btn-action">
                                                 <ion-icon name="bag-add-outline"></ion-icon>
                                               </button>
                                   
                                             </div>
                                        </div>
                            
                                        <div class="showcase-content">
                                            <a href="#" class="showcase-category">Giz de Cera</a>
                                        
                                            <h3>
                                              <a href="#" class="showcase-title">Caixa com 5 Gizes
                                                <br> Minimo: 10 unidades
                                              </a>
                                            </h3>
                                
                                            <div class="price-box">
                                              <p class="price">$3,00</p>
                                            </div>
                                          </div>
                                        </div>

                                         <div class="showcase">
              
                                        <div class="showcase-banner">
                                          <img src="../assets/images/products/giz1.jpg" alt="" class="product-img default"
                                            width="300">
                                          <img src="../assets/images/products/giz2.jpg" alt="Ete" class="product-img hover"
                                            width="300">
                                      
                                            <div class="showcase-actions">
                                              <!--  direcionar para pag de fav e mercado -->
                                               <button class="btn-action">
                                                 <ion-icon name="heart-outline"></ion-icon>
                                               </button>
                                   
                                               <button class="btn-action">
                                                 <ion-icon name="bag-add-outline"></ion-icon>
                                               </button>
                                   
                                             </div>
                                        </div>
                            
                                        <div class="showcase-content">
                                            <a href="#" class="showcase-category">Foto Polaroid C/ Imã</a>
                                        
                                            <h3>
                                              <a href="#" class="showcase-title">Minimo: 6 unidades</a>
                                            </h3>
                                      
                                            <div class="price-box">
                                              <p class="price">$2,00</p>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="showcase">
              
                                            <div class="showcase-banner">
                                              <img src="../assets/images/products/lapis1.jpg" alt="" class="product-img default"
                                                width="300">
                                              <img src="../assets/images/products/lapis2.jpg" alt="Ete" class="product-img hover"
                                                width="300">

                                                <div class="showcase-actions">
                                                  <!--  direcionar para pag de fav e mercado -->
                                                   <button class="btn-action">
                                                     <ion-icon name="heart-outline"></ion-icon>
                                                   </button>
                                       
                                                   <button class="btn-action">
                                                     <ion-icon name="bag-add-outline"></ion-icon>
                                                   </button>
                                       
                                                 </div>
                                            </div>
                                
                                            <div class="showcase-content">
                                                <a href="#" class="showcase-category">Lápis personalizado</a>
                                            
                                                <h3>
                                                  <a href="#" class="showcase-title">Minimo: 10 Unidades</a>
                                                </h3>
                                          
                                                <div class="price-box">
                                                  <p class="price">$1,50</p>
                                                </div>
                                              </div>
                                            </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>
                        
    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">Avaliações</h2>

            <div class="testimonial-card">

              <img src="../assets/images/testimonial-1.jpg" alt="alan doe" class="testimonial-banner" width="80" height="80">

              <p class="testimonial-name">Julia Amorim</p>

              <p class="testimonial-title">Cliente</p>

              <img src="../assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
               Trabalho impecável, adquiri livros de colorir para o aniversário do meu filho e ficou do jeito que eu queria. Nota 10!
              </p>

            </div>

          </div>


          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="../assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner">

            <a href="#" class="cta-content">

              <p class="discount">25% de Desconto</p>

              <h2 class="cta-title">KIT DE ADESIVOS</h2>

              <p class="cta-text">Apartir de $10</p>

              <button class="cta-btn">Compre Agora</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Nossos Serviços</h2>

            <div class="service-container">

             

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Frete Personalizados</h3>
                  <p class="service-desc">Apenas no Brasil</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Suporte Online</h3>
                  <p class="service-desc">Horas: 8AM - 11PM</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
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


  <!--
    - FOOTER
  -->

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
<!-- direcionar links -->
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
<!--         direcionar links -->
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
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              Rua Irmã Dulce, 11 - Santa Maria, 
              Osaco, SP 
              06149-217
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link"> WhatsApp - (11) 94826-8791</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
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
                <a href="https://api.whatsapp.com/send/?phone=5511948268791&text&type=phone_number&app_absent=0" class="footer-nav-link">
                  <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="https://www.instagram.com/festbum_personalizados" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">

        <img src="../assets/images/payment.png" alt="payment method" class="payment-img">

        <p class="copyright">
          Copyright &copy; <a href="#">Fest Bum</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>


  <!--
    - js link
  -->
  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/index.js"></script>
  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
