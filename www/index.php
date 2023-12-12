<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadEazy</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


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
                <a href="#" class="fas fa-shopping-cart"></a>
                <div id="login-btn" class="fas fa-user"></div>
            </div>

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


    <div class="login-form-container">

        <div id="close-login-btn" class="fas fa-times"></div>

        <form>
            <h3>Entrar</h3>
            <span>Nome de usuário</span>
            <input type="email" name="email" class="box" placeholder="enter your email" id="email">
            <span>password</span>
            <input type="password" name="password" class="box" placeholder="enter your password" id="password">
            <div class="checkbox">
                <input type="checkbox" name="remember-me" id="remember-me">
                <label for="remember-me"> Lembrar </label>
            </div>
            <input id="button-submit" type="button" value="sign in" class="btn">
            <p>Esqueceu a senha? ? <a href="#">clique aqui</a></p>
            <p>Não tem uma conta ? <a href="#">Criar uma conta</a></p>
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

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-1.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78,80 <span>R$103,43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78,80 <span>R$103,43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-3.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-4.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em Destaque</h3>
                        <div class="price">R$78.80<span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-5.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-6.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-7.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-8.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-9.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="image/book-10.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Livros em destaque</h3>
                        <div class="price">R$78.80 <span>RS103.43</span></div>
                        <a href="#" class="btn">adicione ao carrinho</a>
                    </div>
                </div>

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

            <div class="swiper-wrapper">

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-1.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80<span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-3.png" alt="">
                    </div>
                    <div class="content">
                        <h3>reécém chegados</h3>
                        <div class="price">R$78.80<span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-4.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-5.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-6.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-7.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-8.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-9.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-10.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Recém chegados</h3>
                        <div class="price">R$78.80 <span>R$103.43</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>

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

</body>

</html>