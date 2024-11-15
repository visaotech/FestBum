'use strict';

// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}



const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}


/* tentando carrinho */
const Clickbutton = document.querySelectorAll('.btn-action') // Adapta para o botão de adicionar ao carrinho
const tbody = document.querySelector('.tbody')
let carrito = []

Clickbutton.forEach(btn => {
  btn.addEventListener('click', addToCarritoItem)
})

function addToCarritoItem(e) {
  const button = e.target.closest('.btn-action')
  const item = button.closest('.showcase')
  const itemTitle = item.querySelector('.showcase-title').textContent;
  const itemPrice = item.querySelector('.price').textContent;
  const itemImg = item.querySelector('.product-img').src;

  const newItem = {
    title: itemTitle,
    precio: itemPrice,
    img: itemImg,
    cantidad: 1
  }

  addItemCarrito(newItem)
}

function addItemCarrito(newItem) {
  const alert = document.querySelector('.alert')

  setTimeout(function () {
    alert.classList.add('hide')
  }, 2000)
  alert.classList.remove('hide')

  const InputElemnto = tbody.getElementsByClassName('input__elemento')
  for (let i = 0; i < carrito.length; i++) {
    if (carrito[i].title.trim() === newItem.title.trim()) {
      carrito[i].cantidad++;
      const inputValue = InputElemnto[i]
      inputValue.value++;
      CarritoTotal()
      return null;
    }
  }

  carrito.push(newItem)
  renderCarrito()
}

function renderCarrito() {
  tbody.innerHTML = ''
  carrito.map(item => {
    const tr = document.createElement('tr')
    tr.classList.add('ItemCarrito')
    const Content = `
    <th scope="row">1</th>
            <td class="table__productos">
              <img src=${item.img} alt="">
              <h6 class="title">${item.title}</h6>
            </td>
            <td class="table__price"><p>${item.precio}</p></td>
            <td class="table__cantidad">
              <input type="number" min="1" value=${item.cantidad} class="input__elemento">
              <button class="delete btn btn-danger">x</button>
            </td>
    `
    tr.innerHTML = Content;
    tbody.append(tr)

    tr.querySelector(".delete").addEventListener('click', removeItemCarrito)
    tr.querySelector(".input__elemento").addEventListener('change', sumaCantidad)
  })
  CarritoTotal()
}

function CarritoTotal() {
  let Total = 0;
  const itemCartTotal = document.querySelector('.itemCartTotal')
  carrito.forEach((item) => {
    const precio = Number(item.precio.replace("R$", '').trim()) // Adapta para R$
    Total = Total + precio * item.cantidad
  })

  itemCartTotal.innerHTML = `Total R$${Total}`
  addLocalStorage()
}

function removeItemCarrito(e) {
  const buttonDelete = e.target
  const tr = buttonDelete.closest(".ItemCarrito")
  const title = tr.querySelector('.title').textContent;
  for (let i = 0; i < carrito.length; i++) {
    if (carrito[i].title.trim() === title.trim()) {
      carrito.splice(i, 1)
    }
  }

  const alert = document.querySelector('.remove')

  setTimeout(function () {
    alert.classList.add('remove')
  }, 2000)
  alert.classList.remove('remove')

  tr.remove()
  CarritoTotal()
}

function sumaCantidad(e) {
  const sumaInput = e.target
  const tr = sumaInput.closest(".ItemCarrito")
  const title = tr.querySelector('.title').textContent;
  carrito.forEach(item => {
    if (item.title.trim() === title) {
      sumaInput.value < 1 ? (sumaInput.value = 1) : sumaInput.value;
      item.cantidad = sumaInput.value;
      CarritoTotal()
    }
  })
}

function addLocalStorage() {
  localStorage.setItem('carrito', JSON.stringify(carrito))
}

window.onload = function () {
  const storage = JSON.parse(localStorage.getItem('carrito'));
  if (storage) {
    carrito = storage;
    renderCarrito()
  }
}
/* const botoesComprar = document.querySelectorAll('.btn-comprar');

botoesComprar.forEach(botao => {
  botao.addEventListener('click', () => {
    alert('Produto adicionado ao Carrinho!');
  });
}); */

const btnComprar = document.querySelector('.btn-comprar');

btnComprar.addEventListener('click', () => {
    const productId = btnComprar.dataset.produto;
    window.location.href = `mercado.html?produto=${productId}`;
});

/* const botaoAdicionarCarrinho = document.querySelector('.btn-adicionar-carrinho');

botaoAdicionarCarrinho.addEventListener('click', () => {
    const produtoId = botaoAdicionarCarrinho.dataset.produto;

    // Criar um objeto com as informações do produto (adapte conforme necessário)
    const produto = {
        id: produtoId,
        nome: 'Nome do Produto',
        preco: 99.99,
        imagem: 'caminho/para/imagem.jpg'
    };

    // Adicionar o produto ao localStorage
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho.push(produto);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    // Redirecionar para a página de mercado
    window.location.href = 'mercado.html';
}); */