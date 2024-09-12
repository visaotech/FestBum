<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,   
 initial-scale=1.0">
  <title>Fest Bum</title>
  <link rel="icon" href="../img/icon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">   
 </head>

<body>
  <header>
    <nav id="navbar">
      <input type="checkbox" name="" id="toggler">
      <label for="toggler" class="fas fa-bars "></label>
      <a href="#" class="logo">FestBum<span></span></a>

      <ul id="nav_list">
        <li class="nav-item active">
        <a href="index.php">Início</a></li>
        <li class="nav-item"><a href="produtos.html">Produtos</a></li> </ul>

    <div class="icons">
      <a href="#" class="fas fa-heart"></a>
      <a href="visao/login.php" class="fas fa-user"></a>
      <a href="#" class="fas fa-shopping-cart"></a>
    </div>
  </nav>
  </header> 
    <main>
    <!-- carrosel teste com o js no html -->

    <div class="carousel-container">
      <div class="carousel">
          <div class="carousel-slide">
              <img src="img/slide1.webp" alt="Slide 1">
          </div>
          <div class="carousel-slide">
              <img src="img/slide2.webp" alt="Slide 2">
          </div>
          <div class="carousel-slide">
              <img src="imagem3.jpg" alt="Slide 3">
          </div>
      </div>
      <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="next" onclick="moveSlide(1)">&#10095;</button>
  </div>

  <script>
      let currentSlide = 0;

      function moveSlide(direction) {
          const slides = document.querySelectorAll('.carousel-slide');
          const totalSlides = slides.length;
          
          currentSlide += direction;

          if (currentSlide >= totalSlides) {
              currentSlide = 0;
          } else if (currentSlide < 0) {
              currentSlide = totalSlides - 1;
          }

          const offset = -currentSlide * 100;
          document.querySelector('.carousel').style.transform = `translateX(${offset}%)`;
      }

      // Mudança automática de slides a cada 5 segundos
      setInterval(() => {
          moveSlide(1);
      }, 5000);
  </script>
    <br> 
    <h2 class="marcacao"> Aqui será colocado um carrosel com as promoções</h2>
    <br> 
    <br> 
    <h2 class="marcacao"> Aqui será colocado um resumo sobre a empresa</h2>
    <br>
    <br>
    <h2 class="marcacao"> Aqui será colocado links de redirecionamento para as redes sociais</h2>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </main>

    <footer class="footer">
      <div class="footer-container">
        <p>&copy; 2024 FestBum. Todos os direitos reservados</p>
      </div>
    </footer>
 
</body>
</html>
