<?php

$mandou = null;

function mandar_email($name, $contact, $content){

    require_once(__DIR__ . '/vendor/autoload.php');

    $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', 'chave');

    $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
        new GuzzleHttp\Client(['verify' => false]),
        $config
    );

    $email =new \SendinBlue\Client\Model\SendSmtpEmail([
        'subject' => "Mensagem de portfólio online de {$name}",
        'sender' => ['name' => 'Meu Portfólio', 'email' => 'kalil.pacheco.zaidan@gmail.com'],
        'to' => [[ 'name' => 'Kalil', 'email' => 'kalil.pacheco.zaidan@gmail.com']],
        'htmlContent' => "<html><body><p> {$content}</p><p>Contato: {$contact}</p></body></html>"
    ]);

    try {
        $result = $apiInstance->sendTransacEmail($email);
        // $mandou = print_r($result);
        $mandou = True;
    } catch (Exception $e) {
        // $mandou = 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ' . $e->getMessage();
        $mandou = False;
    }

    return $mandou;
}

if (isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['content'])) {
    $mandou = mandar_email($_POST['name'], $_POST['contact'], $_POST['content']);
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="assets/css/styles.css">

        <link rel="icon" href="assets/img/icon.png">

        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- DEVILCONS -->
        <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />

        <title>Kalil Macedo</title>
    </head>
    <body>
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <a href="#" class="nav__logo">Kalil</a>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">Sobre</a></li>
                        <li class="nav__item"><a href="#skills" class="nav__link">Habilidades</a></li>
                        <li class="nav__item"><a href="#work" class="nav__link">Experiência</a></li>
                        <li class="nav__item"><a href="#contact" class="nav__link">Contato</a></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--===== HOME =====-->
            <section class="home bd-grid" id="home">
                <div class="home__data">
                    <h1 class="home__title">Olá, &#128075;<br>Eu sou <span class="home__title-color">Kalil</span><br> Desenvolvedor Web<br>& Analista de Dados</h1>

                    <a href="#contact" class="button">Contato</a>
                </div>

                <div class="home__social">
                    <a target=”_blank” href="https://www.linkedin.com/in/kalil-macedo-669788205/" class="home__social-icon"><i class='bx bxl-linkedin'></i></a>
                    <a target=”_blank” href="https://github.com/kalilmacedodev" class="home__social-icon"><i class='bx bxl-github' ></i></a>
                </div>

                <div class="home__img">
                    <svg class="home__blob" viewBox="0 0 479 467" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <mask id="mask0" mask-type="alpha">
                            <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                        </mask>
                        <g mask="url(#mask0)">
                            <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                            <image style="height:60%;" class="home__blob-img" x="40" y="70" href="assets/img/perfil.png"/>
                        </g>
                    </svg>
                </div>
            </section>

            <!--===== ABOUT =====-->
            <section class="about section " id="about">
                <h2 class="section-title"> &lt;sobre /&gt; </h2>

                <div class="about__container bd-grid">
                    <div class="about__img">
                        <img src="assets/img/about.jpeg" alt="">
                    </div>
                    
                    <div>
                        <h2 class="about__subtitle">Eu sou Kalil &#128512;</h2>
                        <p class="about__text">Busco aplicar a experiência que
                            obtenho em todo trabalho que
                            desenvolvo. Dados limpos e
                            organização são o meu mantra. Sou um
                            profissional dedicado que aprende
                            rápido e sempre com fome de
                            conhecimento.<br>
                            Criei este portfólio online com o intuito 
                            de demonstrar minhas capacidades e chamar a 
                            atenção de possíveis recrutadores. Sempre estou aberto 
                            à novas possibilidades que possam enriquicer minha carreira.</p>
                    </div>
                </div>
            </section>

            <!--===== SKILLS =====-->
            <section class="skills section" id="skills">
                <h2 class="section-title"> &lt;habilidades /&gt;</h2>

                <div class="skills__container bd-grid">          
                    <div>
                        <h2 class="skills__subtitle">Habilidades Profissionais</h2>
                        <p class="skills__text">Um breve resumo de minhas habilidades acumuladas durante anos de estudo e trabalho árduo.
                            Me identifico fortemente com a área de BackEnd; ademais, também sou proficiente em UI/UX.</p>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxl-code-curly devicon-codepen-original skills__icon'></i>
                                    <span class="skills__name">BackEnd</span>
                                </div>
                                <div class="skills__bar skills__backend">

                                </div>
                                <div>
                                    <span class="skills__percentage">85%</span>
                                </div>
                            </div>
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxl-code-curly devicon-devicon-plain skills__icon'></i>
                                    <span class="skills__name">FrontEnd</span>
                                </div>
                                <div class="skills__bar skills__frontend">

                                </div>
                                <div>
                                    <span class="skills__percentage">70%</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxl-code-curly devicon-minitab-plain skills__icon'></i>
                                    <span class="skills__name">Power BI</span>
                                </div>
                                <div class="skills__bar skills__powerbi">

                                </div>
                                <div>
                                    <span class="skills__percentage">95%</span>
                                </div>
                            </div>
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class="bx bxl-code-curly devicon-php-plain skills__icon"></i>
                                    <span class="skills__name">PHP</span>
                                </div>
                                <div class="skills__bar skills__php">

                                </div>
                                <div>
                                    <span class="skills__percentage">95%</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class="bx bxl-code-curly devicon-github-original skills__icon"></i>
                                    <span class="skills__name">Git</span>
                                </div>
                                <div class="skills__bar skills__git">

                                </div>
                                <div>
                                    <span class="skills__percentage">95%</span>
                                </div>
                            </div>
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx devicon-laravel-original skills__icon'></i>
                                    <span class="skills__name">Laravel</span>
                                </div>
                                <div class="skills__bar skills__laravel">

                                </div>
                                <div>
                                    <span class="skills__percentage">90%</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx devicon-dbeaver-plain skills__icon'></i>
                                    <span class="skills__name">Banco de Dados</span>
                                </div>
                                <div class="skills__bar skills__banco">
                                    
                                </div>
                                <div>
                                    <span class="skills__percentage">85%</span>
                                </div>
                            </div>
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx devicon-azuresqldatabase-plain skills__icon'></i>
                                    <span class="skills__name">SQL</span>
                                </div>
                                <div class="skills__bar skills__sql">
                                    
                                </div>
                                <div>
                                    <span class="skills__percentage">80%</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx devicon-vuejs-plain skills__icon'></i>
                                    <span class="skills__name">Vue.js</span>
                                </div>
                                <div class="skills__bar skills__vue">

                                </div>
                                <div>
                                    <span class="skills__percentage">35%</span>
                                </div>
                            </div>
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxl-html5 skills__icon'></i>
                                    <span class="skills__name">HTML</span>
                                </div>
                                <div class="skills__bar skills__html">
                                    
                                </div>
                                <div>
                                    <span class="skills__percentage">85%</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxl-css3 skills__icon'></i>
                                    <span class="skills__name">CSS</span>
                                </div>
                                <div class="skills__bar skills__css">
                                    
                                </div>
                                <div>
                                    <span class="skills__percentage">70%</span>
                                </div>
                            </div>
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxl-javascript skills__icon' ></i>
                                    <span class="skills__name" style="font-size: 90%;">JavaScript</span>
                                </div>
                                <div class="skills__bar skills__js">
                                    
                                </div>
                                <div>
                                    <span class="skills__percentage">40%</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__container">
                            <div class="skills__data">
                                <div class="skills__names">
                                    <i class='bx bxs-paint skills__icon'></i>
                                    <span class="skills__name">UX/UI</span>
                                </div>
                                <div class="skills__bar skills__ux">
                                    
                                </div>
                                <div>
                                    <span class="skills__percentage">85%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>              
                        <img src="assets/img/trabalho.jpg" alt="" class="skills__img">
                    </div>
                </div>
            </section>

            <!--===== WORK =====-->
            <section class="work section" id="work">
                <h2 class="section-title">&lt;experiencia /&gt;</h2>

                <div class="work__text_container bd-grid">
                    <h2 class="work__subtitle">Experiência Profissional</h2>
                    <p class="work__text">Esta sessão é dedicada para um resumo de toda a minha experiência adquirida em anos de trabalho,
                        essas experiências são organizadas em páginas separadas, <strong>clique</strong> em uma para mais detalhes!</p>
                </div>

                <div class="work__container bd-grid">
                    <a href="prefeitura.html" class="work__img">
                        <img style="size:110%" src="assets/img/prefeitura.jpg" alt="">
                    </a>
                    <a href="assembleia.html" class="work__img">
                        <img src="assets/img/alema.png" alt="">
                    </a>
                    <a href="acaizeira.html" class="work__img">
                        <img src="assets/img/acaizeira.png" alt="">
                    </a>
                    <!-- <a href="" class="work__img">
                        <img src="assets/img/work4.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="assets/img/work5.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="assets/img/work6.jpg" alt=""> -->
                    </a>
                </div>
            </section>

            <!--===== CONTACT =====-->
            <section class="contact section" id="contact">
                <h2 class="section-title">&lt;contato /&gt;</h2>

                

                <?php if ($mandou === True) { ?>
                    <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong style="color:aliceblue;">E-mail enviado com sucesso!</strong> 
                </div>
                <?php } elseif ($mandou === False) { ?>
                    <div class="alert" style="background-color: red;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong style="color:aliceblue;">Algum erro ao enviar o e-mail</strong> 
                </div>
                <?php } ?>

                <div class="contact__container bd-grid">
                    <form action="" method="post" class="contact__form">
                        <input name="name" type="text" placeholder="Seu nome" class="contact__input" required>
                        <input name="contact" type="text" placeholder="Seu contato" class="contact__input" required>
                        <textarea name="content" cols="0" placeholder="Sua mensagem" rows="10" class="contact__input" required></textarea>
                        <input type="submit" value="Enviar" class="contact__button button">
                    </form>
                </div>
            </section>
        </main>

        <!--===== FOOTER =====-->
        <footer class="footer">
            <p class="footer__title">Kalil Macedo</p>
            <div class="footer__social">
                <a class="footer__icon" target=”_blank” href="https://www.linkedin.com/in/kalil-macedo-669788205/" class="home__social-icon"><i class='bx bxl-linkedin'></i></a>
                <a class="footer__icon" target=”_blank” href="https://github.com/kalilmacedodev" class="home__social-icon"><i class='bx bxl-github' ></i></a>
            </div>
        </footer>

        <!--===== SCROLL REVEAL =====-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>