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
                    <a href="#" class="btn">Adicione ao Carrinho</a>
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