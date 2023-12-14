<script>
const livrosDestaque = document.getElementById("livros-destaque");
const livrosChegados = document.getElementById("livros-chegados");

function getProducts() {
  fetch("api/get_featured_products.php", {
    method: "GET",
    headers: { "Content-Type": "application/json" },
  })
    .then((response) => response.json())
    .then((data) => {
      const itensDestaque = data.filter((item) => item.category === 'destaque');
      const itensChegados = data.filter((item) => item.category === 'chegados');

      if (itensDestaque.length > 0) {

        itensDestaque.forEach((item) => {
          const htmlDestaque = `
            <div key="${item.id}" class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="${item.image}" alt="${item.name}">
                </div>
                <div class="content">
                    <h3>${item.name}</h3>
                    <div class="price">R$${item.value} <span>R$${item.discount}</span></div>
                    <button data-id="${item.id}" data-name="${item.name}" data-value="${item.value}" data-image="${item.image}" class="btn add-item-cart">Adicione ao Carrinho</button>
                </div>
            </div>`;
          livrosDestaque.innerHTML += htmlDestaque;
        });

        initializeSwiper();
      } else {
        console.log("Nenhum produto destacado encontrado.");
      }

      if (itensChegados.length > 0) {
        itensChegados.forEach((item) => {
          const htmlChegados = `
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="${item.image}" alt="${item.name}">
                </div>
                <div class="content">
                    <h3>${item.name}</h3>
                    <div class="price">R$${item.value} <span>R$${item.discount}</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>`;
          livrosChegados.innerHTML += htmlChegados;
        });

        initializeSwiper2()
      } else {
        console.log("Nenhum produto chegado encontrado.");
      }
    })
    .catch((error) => {
      console.log("Erro ao buscar registros:", error);
    });
}

getProducts();

$(document).on('click', '.add-item-cart', function() {
  // Obtenha os dados do item do botão clicado
  const itemId = $(this).data('id');
  const itemName = $(this).data('name');
  const itemValue = $(this).data('value');
  const itemImage = $(this).data('image');

  // Faça uma requisição POST para o servidor para adicionar o item ao carrinho
  $.post('/api/adicionar_ao_carrinho.php', {id: itemId, name: itemName, value: itemValue, image: itemImage}, function(response) {
    // Manipule a resposta do servidor conforme necessário (pode não ser necessário)

    // Atualize a exibição do carrinho (pode não ser necessário)
    setTimeout(() => {
      location.reload();
    }, 300)
  });
});

$(document).on('click', '.del-cart', function() {
    // Obtenha o ID do item a ser removido
    const itemIdToRemove = $(this).data('id');

    // Envie o ID do item ao servidor para remoção
    $.post('/api/remover_do_carrinho.php', {id: itemIdToRemove}, function(response) {
        // Manipule a resposta do servidor conforme necessário (pode não ser necessário)

        // Atualize a exibição do carrinho (pode não ser necessário)
      setTimeout(() => {
      location.reload();
    }, 300)
    });
});

</script>