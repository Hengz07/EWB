
<!DOCTYPE html>
    <html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--==================== UNICONS ====================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        
        <!--==================== SWIPER CSS ====================-->
        <link rel="stylesheet" href="Homepage/swiper-bundle.min.css?v=<?php echo time();?>">
        
        <!--==================== CSS ====================-->
        <link rel="stylesheet" href="Homepage/styles.css?v=<?php echo time();?>">
        <link rel="icon" type="image/x-icon" href="Homepage/logoslagi1.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <title>Pocket Score Woodball</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">Pocket Score Woodball</a>
                <div class="nav__menu" id="nav-menu"> 
                    <ul class="nav__list grid">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">
                                <i class="uli uil-estate nav__icon"></i>Home
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">
                                <i class="uli uil-user nav__icon"></i>About
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#achievement" class="nav__link">
                                <i class="uil uil-file-alt nav__icon"></i>Achievement
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#robottype" class="nav__link">
                                <i class="uil uil-scenery nav__icon"></i>Woodball info
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#developTeam" class="nav__link">
                                <i class="uil uil-briefcase-alt nav__icon"></i>Developer Team
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__link">
                                <i class="uil uil-message nav__icon"></i>Contact me
                            </a>
                        </li>
                    </ul>
                    <i class="uil uil-times nav__close" id="nav-close"></i>
                </div>

                <div class="nav__btns">
                    <!--Theme change button-->
                    <i class="uil uil-moon change-theme" id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class="uil uil-apps"></i>
                    </div>
                </div>
            </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="animate__animated animate__fadeInLeft home section" id="home">
                <div class="home_container container grid">
                    <div class="home__content grid">
                        <div class="home__social">
                            <!--
                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-linkedin-alt"></i>
                            </a>

                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-dribbble"></i>
                            </a>

                            <a href="#" target="_blank" class="home__social-icon">
                                <i class="uil uil-github-alt"></i>
                            </a>-->
                        </div>
                        <div class="home__img">
                            <svg class="home__blob" viewBox="0 0 200 187" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0" mask-type="alpha">
                                    <path d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
                                    130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
                                    97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
                                    0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"/>
                                </mask>
                                <g mask="url(#mask0)">

                                    <image class="home__blob-img" x='15' y='10' xlink:href="Homepage/logoslagi1.png"/>
                                </g>
                            </svg>
                        </div>

                        <div class="home__data">
                            <div class="animate__animated animate__bounceInDown animate__delay-1s">
                            <h1 class="home__title animate__animated animate__tada animate__infinite">PS Woodball</h1></div>
                            <h3 class="home__subtitle">Politeknik Sultan Mizan Zainal Abidin</h3>
                            <p class="home__description">Welcome to PS Woodball website<br><b>Play together, Score, Victory</b></p>
                            <a href="player/ulogin.php" class="button button--flex" style="text-align: center;">
                                Login<i class="uil uil-message button__icon"></i>
                            </a>
                            <a href="play/fairway.php" class="button button--flex" style="text-align: center;">
                                Quick Play<i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </div>

                    <div class="home__scroll">
                        <a href="#about" class="home__scroll-button button--flex">
                            <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                            <span class="home__scroll-name">Go down</span>
                            <i class="uil uil-arrow-down home__scroll-arrow"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="animate__animated animate__fadeInLeft about section" id="about">
                <h2 class="section__title">About Us</h2>
                <span class="section__subtitle">Supervisor</span>

                <div class="about__container container grid">
                    <img src="Homepage/lecture.jpg" alt="" class="about__img">
                

                <div class="about__data">
                    <p class="about__description"><b>Fauziah Binti Basok</b><br>Lecturer DH48<br>Information Technology and Communication Department, fauziah@psmza.edu.my</p>

                    <div class="about__info">
                        <div>
                            <span class="about__info-title">14+</span>
                            <span class="about__info-name">Years<br>Work experience in programming & multimedia</span>
                        </div>

                        <div>
                            <span class="about__info-title">06+</span>
                            <span class="about__info-name">Years<br>Research and innovation publication Industry Collaboration Committee</span>
                        </div>

                        <div>
                            <span class="about__info-title">04+</span>
                            <span class="about__info-name">Part Time<br>Corporate Social Responsibility Non Government Organization</span>
                        </div>
                    </div>
                    <!----
                    <div class="about__buttons">
                        <a href="organisation.html" class="button button--flex">
                            Organisation Chart
                        </a>
                    </div>---->
                </div>
                </div>
            </section>

            <!--==================== Achievement ====================-->
            <section class="animate__animated animate__fadeInLeft achievement section" id="achievement">
                <h2 class="section__title">Achievement</h2>
                <span class="section__subtitle">Woodball Politeknik</span>

                <div class="achievement__container container">
                    <div class="achievement__tabs">
                        <div class="achievement__button button--flex achievement__active" data-target="#malaysia">
                            <i class="uil uil-location-pin-alt achievement__icon"></i>
                            Politkenik Cup
                        </div>
                    </div>

                    <div class="achievement__sections">
                        <!--==================== Achievement CONTENT 1===============-->
                        <div class="achievement__content achievement__active" data-content id="malaysia">
                            <!--==================== Achievement 1====================-->
                            <div class="achievement__data">
                                <div>
                                    <h3 class="achievement__title">Johan Keseluruhan</h3>
                                    <span class="achievement__subtitle">Politeknik Woodball Challenge
                                        <img src="Homepage/PWC2.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2022
                                        </i>
                                    </div>
                                </div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>
                            </div>

                             <!--==================== Achievement 2====================-->
                             <div class="achievement__data">
                                <div></div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>

                                <div>
                                    <h3 class="achievement__title">1 Gold & 1 Bronze medal</h3>
                                    <span class="achievement__subtitle">Woodball kebangsaan Ke 16 Sirkit
                                        <img src="Homepage/sirkit.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2022 
                                        </i>
                                    </div>
                                </div>
                            </div>

                             <!--==================== Achievement 3====================-->
                             <div class="achievement__data">
                                <div>
                                    <h3 class="achievement__title">Johan & Naib Johan</h3>
                                    <span class="achievement__subtitle">Woodball intercity MBSJ 2022
                                        <img src="Homepage/woodballintercity.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2022
                                        </i>
                                    </div>
                                </div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <span class="achievement__line"></span>
                                </div>
                            </div>

                             <!--==================== Achievement 4====================-->
                             <div class="achievement__data">
                                <div></div>

                                <div>
                                    <span class="achievement__rounder"></span>
                                    <!--<span class="achievement__line"></span>-->
                                </div>

                                <div>
                                    <h3 class="achievement__title">Johan & 3th place</h3>
                                    <span class="achievement__subtitle">Kejohanan Petanque (MASKOM 2022)
                                        <img src="Homepage/Kejohanan_Petanque2022.jpg">
                                    </span>
                                    <div class="achievement__calendar">
                                        <i class="uil uil-calendar-alt">
                                            2022
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== Robot Type ====================-->
            <section class="animate__animated animate__fadeInLeft robottype section" id="robottype">
                <h2 class="section__title">Woodball info</h2>
                <span class="section__subtitle">Let's know some Woodball info</span>

                <div class="robottype__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== Robot Type 1====================-->
                        <div class="robottype__content grid swiper-slide">
                            <img src="Homepage/equipment.jpeg" alt="" class="robottype__img">

                            <div class="robottype__data">
                                <h3 class="robottype__title">Woodball Equipment</h3>
                                <p class="robottype__description">The Woodball Equipment that need to play woodball perfectly</p>
                                <a href="http://uswoodball.com/equipment.htm" target="_blank" class="button button-flex button--small robottype__button">
                                    Know More
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                        <!--==================== Robot Type 2====================-->
                        <div class="robottype__content grid swiper-slide">
                            <img src="Homepage/rules.jpg" alt="" class="robottype__img">

                            <div class="robottype__data">
                                <h3 class="robottype__title">Rules of Woodball</h3>
                                <p class="robottype__description">Woodball game is providing some of the rules that need to be follow to ensure the game is going smoothly.</p>
                                <a href="https://ocasia.org/sports/29-woodball-wo.html" target="_blank" class="button button-flex button--small robottype__button">
                                    Know More
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Add Arrows-->
                    <div class="swiper-button-next">
                        <i class="uil uil-angle-right-b swiper-robottype-icon"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="uil uil-angle-left-b swiper-robottype-icon"></i>
                    </div>

                    <!--Add Pagination-->
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!--==================== Join Us ====================-->
            <section class="animate__animated animate__fadeInLeft joinUs section">
                <div class="joinUs__bg">
                    <div class="joinUs__container container grid">
                        <div class="joinUs__data">
                            <h2 class="joinUs__title">Got any feedback?</h2>
                            <p class="joinUs__description">Feel free come to <b>Comment your Opinion</b> or Contact our</p>
                            <a href="#contact" class="button button--flex button--white">
                                Contact Us
                                <i class="uil uil-message joinUs__icon button__icon"></i>
                            </a>
                        </div>
                        <img src="Homepage/logo.png" alt="" class="joinUs__img">
                    </div>
                </div>
            </section>

            <!--==================== Develop Team ====================-->
            <section class="animate__animated animate__fadeInLeft developTeam section" id="developTeam">
                <h2 class="section__title">Developer Team</h2>
                <span class="section__subtitle">Final Year Project(PS Woodball)</span>

                <div class="developTeam__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== Develop Member 1====================-->
                        <div class="developTeam__content swiper-slide">
                            <div class="developTeam__data">
                                <div class="developTeam__header">
                                    <img src="Homepage/sahif.jpg" alt="" class="developTeam__img">

                                    <div>
                                        <h3 class="developTeam__name">MUHD SAHIF AS SANI BIN MOHAMAD</h3>
                                        <span class="developTeam__client">Web Developer</span>
                                    </div>
                                </div>

                                <div>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                </div>
                            </div>

                            <p class="developTeam__description">Hi, my name Sahif As Sani. I'm the Web Developer and auditor of this final year project</p>
                        </div>
                        <!--==================== Develop Member 2====================-->
                        <div class="developTeam__content swiper-slide">
                            <div class="developTeam__data">
                                <div class="developTeam__header">
                                    <img src="Homepage/Azidpicture.png" alt="" class="developTeam__img">

                                    <div>
                                        <h3 class="developTeam__name">MUHAMMAD AZID BIN ROSLAN</h3>
                                        <span class="developTeam__client">Web Developer</span>
                                    </div>
                                </div>

                                <div>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                </div>
                            </div>

                            <p class="developTeam__description">Hi, my name is Azid. I'm the Web Developer and auditor of this final year project.</p>
                        </div>
                        <!--==================== Develop Member 3====================-->
                        <div class="developTeam__content swiper-slide">
                            <div class="developTeam__data">
                                <div class="developTeam__header">
                                    <img src="Homepage/jijo.jpg" alt="" class="developTeam__img">

                                    <div>
                                        <h3 class="developTeam__name">AZIZUL HAKIM BIN HASSAN</h3>
                                        <span class="developTeam__client">Web Developer</span>
                                    </div>
                                </div>

                                <div>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                    <i class="uil uil-star developTeam__icon-star"></i>
                                </div>
                            </div>

                            <p class="developTeam__description">Hi, my name is Azizul Hakim. I'm the Web Developer and auditor of this final year project.</p>
                        </div>
                    </div>
                    <!--Add Pagination-->
                    <div class="swiper-pagination swiper-pagination-developTeam"></div>
                </div>
            </section>

            <!--==================== CONTACT ME ====================-->
            <section class="animate__animated animate__fadeInLeft contact section" id="contact">
                <h2 class="section__title">Contact Me</h2>

                <dic class="contact__container container grid">
                    <div>
                        <div class="contact__information">
                            <i class="uil uil-phone contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Call Me</h3>
                                <span class="contact__subtitle">+60 17-877-3628</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-envelope contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Email</h3>
                                <span class="contact__subtitle">PSMZA@edu.com</span>
                            </div>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-map-marker contact__icon"></i>

                            <div>
                                <h3 class="contact__title">Location</h3>
                                <span class="contact__subtitle">Politeknik Sultan Mizan Zainal Abidin</span>
                            </div>
                        </div>
                    </div>

                    <form action="default.php" class="contact__form grid" method="POST" name="myform">
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="" class="contact__label">Name</label>
                                <input type="text" class="contact__input" name="name">
                            </div>

                            <div class="contact__content">
                                <label for="" class="contact__label">Email</label>
                                <input type="email" class="contact__input" name="email">
                            </div>
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__label">Phone number</label>
                            <input type="tel" class="contact__input" name="tel">
                        </div>

                        <div class="contact__content">
                            <label for="" class="contact__label">FeedBack?</label>
                            <textarea id="" cols="0" rows="7" class="contact__input" name="content"></textarea>
                        </div>

                        <div>
                            <a href="javascript: submitform()" class="button button--flex">
                                Send Message
                                <i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </form>
                </dic>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__bg">
                <div class="footer__container container grid">
                    <div>
                        <h1 class="footer__title">PSW</h1>
                        <span class="footer__subtitle">Woodball Terengganu Club</span>
                    </div>

                    <ul class="footer__links">
                        <li>
                            <a href="#about" class="footer__link">About_Us</a>
                        </li>

                        <li>
                            <a href="#contact" class="footer__link">Contact_Me</a>
                        </li>
                    </ul>

                    <div class="footer__socials">
                        <!--<a href="" target="_blank" class="footer__social" >
                            <i class="uil uil-facebook-f"></i>
                        </a>

                        <a href="" target="_blank" class="footer__social">
                            <i class="uil uil-instagram"></i>
                        </a>

                        <a href="" target="_blank" class="footer__social">
                            <i class="uil uil-twitter-alt"></i>
                        </a>-->
                    </div>
                </div>

                <p class="footer__copy">&#169; Politeknik Sultan Mizan Zainal Abidin . All right reserved</p>
            </div>
        </footer>
        
        <!--==================== SCROLL TOP ====================-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="uil uil-arrow-up scrollup__icon"></i>
        </a>

        <!--==================== SWIPER JS ====================-->
        <script src="Homepage/swiper-bundle.min.js"></script>

        <!--==================== MAIN JS ====================-->
        <script src="Homepage/main.js"></script>

        <script type="text/javascript"> 
            function submitform() {   
                document.myform.submit();
            } 
        </script> 
    </body>
</html>
