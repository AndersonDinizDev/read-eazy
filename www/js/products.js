const livrosDestaque = document.getElementById("livros-destaque");

function getProducts() {
  fetch("api/get_featured_products.php", {
    method: "GET",
    headers: { "Content-Type": "application/json" },
  })
    .then((response) => response.json())
    .then((data) => {
      // Filtra os itens com a categoria 'destaque'
      const itensDestaque = data.filter((item) => item.category === 'destaque');

      // Verifica se há dados antes de prosseguir
      if (itensDestaque.length > 0) {
        // Itera sobre os itens filtrados e cria o HTML dinamicamente
        itensDestaque.forEach((item) => {
          const html = `
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
                    <a href="#" class="btn">Adicione ao Carrinho</a>
                </div>
            </div>`;
          // Adiciona o HTML gerado ao elemento livrosDestaque
          livrosDestaque.innerHTML += html;

          initializeSwiper();
        });
      } else {
        console.log("Nenhum produto encontrado.");
      }
    })
    .catch((error) => {
      console.log("Erro ao buscar registros:", error);
    });
}

getProducts();
