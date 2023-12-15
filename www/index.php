<?php
session_start();
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadEazy</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <header class="header">

        <section class="header-1">

            <a href="#" class="logo"> <i class="fas fa-book"></i> ReadEazy </a>

            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-shopping-cart" id="cartIcon"></a>
                <div <?php if ($_SESSION['user-id']) {
                            echo "style='display: none;'";
                        }; ?> id="login-btn" class="fas fa-user"></div>
            </div>
            <?php if ($_SESSION['user-id']) : ?>
                <div class="user-login">
                    <p style="font-size: 16px;"><?= $_SESSION['user-name'] ?></p>
                    <a style="font-size: 12px;" type="button" href="api/logout.php">Sair</a>
                </div>
            <?php endif; ?>
        </section>

        <div class="header-2">
            <nav class="navbar">
                <a href="#home">Ínicio</a>
                <a href="#featured">Destaques</a>
                <a href="#arrivals">Recém chegados</a>
                <a href="#reviews">Análises</a>
                <a href="#blogs">blogs</a>
            </nav>
        </div>

    </header>

    <!-- header section ends -->

    <!-- bottom navbar  -->

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured" class="fas fa-list"></a>
        <a href="#arrivals" class="fas fa-tags"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>
    </nav>

    <!-- modal -->
    <div id="modal-checkout" class="modal-overlay">
        <div class="modal-checkout">
            aaa
        </div>
    </div>

    <!-- aside cart -->

    <div class="modal-cart">
        <div class="modal-cart-navbar">
            <span>Resumo da compra</span>
            <img id="exit-cartModal" width="26" height="26" src="https://img.icons8.com/metro/26/multiply.png" alt="fechar" />
        </div>

        <div class="modal-cart-content">

            <?php
            $cartItems = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array();
            ?>
            <?php
            if (empty($cartItems)) {
            ?>
                <div style="padding: 25px; display: flex; align-items: center; text-align: center; flex-direction: column;">
                    <span>SEU CARRINHO ESTÁ VAZIO!</span>
                    <p>Não há produtos selecionados até o momento!</p>
                </div>
            <?php
            } elseif (count($cartItems) >= 1) {
            ?>
                <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 10px;">
                    <?php
                    foreach ($cartItems as $item) {
                        $itemId = $item['id'];
                        $itemName = $item['name'];
                        $itemValue = $item['value'];
                        $itemImage = $item['image'];

                    ?>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <img style="width: 50px;" src="<?= $itemImage ?>" alt="book-img" />
                            <div style="display: flex; flex-direction:column;">
                                <p style="font-size: 14px">Produto: <?= $itemName ?></p>
                                <p style="font-size: 14px">Valor: R$ <?= $itemValue ?></p>
                            </div>
                            <div>
                                <button data-id="<?= $itemId ?>" class="del-cart" style="cursor: pointer; border: none; outline:none; background-color: transparent;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="modal-cart-bottom-navbar">
            <button id="start-checkout">FECHAR PEDIDO</button>
            <p>Continuar comprando</p>
        </div>
    </div>


    <div class="login-form-container">

        <div id="close-login-btn" class="fas fa-times"></div>

        <form class="login-form" id="login-form">
            <h3>Entrar</h3>
            <span>Email</span>
            <input type="email" name="email" class="box" placeholder="Insira seu email" id="email">
            <span>Senha</span>
            <input type="password" name="password" class="box" placeholder="Insira sua senha" id="password">
            <div class="checkbox">
                <input type="checkbox" name="remember-me" id="remember-me">
                <label for="remember-me"> Lembrar </label>
            </div>
            <input id="button-submit" type="button" value="Logar" class="btn">
            <p>Esqueceu a senha ? <a id="recover-form-button" href="#">Clique aqui</a></p>
            <p>Não tem uma conta ? <a id="register-form-button" href="#">Clique aqui</a></p>
        </form>

        <form id="recover-password" class="recovery-form">
            <h3>Recuperar Senha</h3>
            <span>Email</span>
            <input type="email" name="rc-email" class="box" placeholder="Insira seu email" id="rc-email">
            <input id="rr-button-submit" type="button" value="Enviar" class="btn">
        </form>

        <form id="recover-password-token" class="token-form">
            <h3>Recuperar Senha</h3>
            <span>Email</span>
            <input type="t-email" name="t-email" class="box" placeholder="Insira seu email" id="t-email">
            <span>Token</span>
            <input type="token" name="token" class="box" placeholder="Insira token" id="token">
            <span>Senha</span>
            <input type="password" name="t-password" class="box" placeholder="Insira sua senha" id="t-password">
            <span>Confirmar Senha</span>
            <input type="password" name="tc-password" class="box" placeholder="Insira sua senha" id="tc-password">
            <input id="tc-button-submit" type="button" value="Enviar" class="btn">
        </form>

        <form id="register-form" class="register-form">
            <h3>Cadastrar</h3>
            <span>Nome</span>
            <input type="email" name="r-name" class="box" placeholder="Digite seu nome" id="r-name">
            <span>Email</span>
            <input type="text" name="r-email" class="box" placeholder="Insira seu email" id="r-email">
            <span>Senha</span>
            <input type="password" name="r-password" class="box" placeholder="Insira uma senha" id="r-password">
            <span>Confirme sua senha</span>
            <input type="password" name="r-password" class="box" placeholder="Insira sua senha novamente" id="r-c-password">
            <input id="button-register" type="button" value="Cadastrar" class="btn">
            <p>Já possui uma conta ? <a id="login-form-button" href="#">clique aqui</a></p>
        </form>

    </div>

    <div class="home-container">

        <section class="home" id="home">

            <div class="row">

                <div class="content">
                    <h3>até 75% de desconto</h3>
                    <p>Site Criado para o Projeto de TCC do IFRJ CAMPUS NITERÓI - ALUNO: MATHEUS CARVALHO</p>
                    <a href="#" class="btn">Compre agora</a>
                </div>

                <div class="swiper books-slider">
                    <div class="swiper-wrapper">
                        <a href="#" class="swiper-slide"><img src="image/book-1.png" alt=""></a>
                        <a href="#" class="swiper-slide"><img src="image/book-2.png" alt=""></a>
                        <a href="#" class="swiper-slide"><img src="image/book-3.png" alt=""></a>
                        <a href="#" class="swiper-slide"><img src="image/book-4.png" alt=""></a>
                        <a href="#" class="swiper-slide"><img src="image/book-5.png" alt=""></a>
                        <a href="#" class="swiper-slide"><img src="image/book-6.png" alt=""></a>
                    </div>
                    <img src="image/stand.png" class="stand" alt="">
                </div>

            </div>

        </section>

    </div>



    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>frete grátis</h3>
                <p>pedidos acima de R$492</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Pagamento seguro</h3>
                <p>100 pagamento seguro</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>Devoluções fáceis</h3>
                <p>10 dias para devolução</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>suporte 24hrs p/dia</h3>
                <p>Entre em contato sempre que precisar</p>
            </div>
        </div>

    </section>


    <section class="featured" id="featured">

        <h1 class="heading"> <span>Livros em destaque</span> </h1>

        <div class="swiper featured-slider">

            <div method="POST" id="livros-destaque" class="swiper-wrapper">
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>


    <div class="newsletter-container">

        <section class="newsletter">

            <form action="">
                <h3>Inscreva-se para receber novidades</h3>
                <input type="email" name="" placeholder="enter your email" id="" class="box">
                <input type="submit" value="subscribe" class="btn">
            </form>

        </section>

    </div>

    <!-- newsletter section ends -->

    <!-- arrivals section starts  -->

    <section class="arrivals" id="arrivals">

        <h1 class="heading"> <span>Recém chegados</span> </h1>

        <div class="swiper arrivals-slider">

            <div id="livros-chegados" class="swiper-wrapper"></div>

        </div>

    </section>



    <div class="deal-container">

        <section class="deal">

            <div class="content">
                <h3>Oferta do dia</h3>
                <h1>até 50% de desconto</h1>
                <p>TCC</p>
                <a href="#" class="btn">Compre agora</a>
            </div>

            <div class="image">
                <img src="image/deal-img.jpg" alt="">
            </div>

        </section>


    </div>


    <section class="reviews" id="reviews">

        <h1 class="heading"> <span>Análises dos clientes</span> </h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="image/pic-1.png" alt="">
                    <h3>João</h3>
                    <p>Tenho livros didatícos de Direito, entre em contato para mais detalhes joaopsoares@gmail.com</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-2.png" alt="">
                    <h3>Luana</h3>
                    <p>tenho a saga inteira de Harry Potter para emprestar, entre em contanto para mais detalhes lugimenes@gmail.com</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-3.png" alt="">
                    <h3>Cláudio</h3>
                    <p>Tenho alguns livros da saga Crepúsculo, interessados entrar em contato via claudiorosa@gmail,com</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="swiper-slide box">
                    <img src="image/pic-4.png" alt="">
                    <h3>Manuela</h3>
                    <p>Tenho vários livros infantis e queria doar para instituições caridosas ou escolas, entrar em contato manucarvalho4@gmail.com </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-5.png" alt="">
                    <h3>Matheus</h3>
                    <p>Em posse de livros do pequeno principe, entre em contato para mais detalhes matheusrcarv@gmail.com</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/pic-6.png" alt="">
                    <h3>Sheyje</h3>
                    <p>LTenho alguns livros de histórias japonesas que trouxe do meu país, entre em contato para mais detalhes sheyjemonagomi@gmail.com</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

            </div>

        </div>

    </section>



    <section class="blogs" id="blogs">

        <h1 class="heading"> <span>Nosssos blogs</span> </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog genérico 1</h3>
                        <p>blog genérico 1</p>
                        <a href="#" class="btn">Saiba mais</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-2.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog genérico 2</h3>
                        <p>bloh genérico 2</p>
                        <a href="#" class="btn">Saiba mais</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-3.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog genérico 3</h3>
                        <p>blog genérico 3</p>
                        <a href="#" class="btn">Saiba mais</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-4.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog genérico 4</h3>
                        <p>blog genérico 4</p>
                        <a href="#" class="btn">Saiba mais</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="image/blog-5.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>blog genérico 5</h3>
                        <p>blog genérico 5</p>
                        <a href="#" class="btn">Saiba mais</a>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Nossa localização</h3>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> india </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> russia </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> frança </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> japão </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> africa </a>
            </div>

            <div class="box">
                <h3>links rápidos</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> incio </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> destaques </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> recém chegafos </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> análises </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> blogs </a>
            </div>

            <div class="box">
                <h3> links extras </h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> Informações da conta </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Itens em carrinho </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> política de privacidade </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> método de pagamento </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> nossos serviços </a>
            </div>

            <div class="box">
                <h3>Informações de contato</h3>
                <a href="#"> <i class="fas fa-phone"></i> +55 21 99584 0294 </a>
                <a href="#"> <i class="fas fa-phone"></i> +55 21 99584 0294 </a>
                <a href="#"> <i class="fas fa-envelope"></i> matheusrcarvalho3@gmail.com </a>
                <img src="image/worldmap.png" class="map" alt="">
            </div>

        </div>

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="credit"> criado por <span>Matheus Carvalho</span> </div>

    </section>

    <!-- footer section ends -->

    <!-- loader  -->

    <div class="loader-container">
        <img src="image/loader-img.gif" alt="">
    </div>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    <script src="js/login_check.js"></script>
    <script src="js/register_user.js"></script>
    <script src="js/recover_password.js"></script>
    <script src="js/token_password.js"></script>
    <?= require_once("js/products.php") ?>
    <?= require_once("js/checkout.php") ?>
</body>

</html>