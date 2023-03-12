@extends('layouts.app',['title'=>'Home'])
@section('content')
    <!-- End Header -->
    <main id="main" style="color:white;">
        <!-- ======= About Section ======= -->
        <!-- ======= Suscribe Section ======= -->
                <div class="suscribe-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                                <div class="suscribe-text text-center">
                                    <h3>Welcome to APEK Inc.</h3>
                                    <a class="sus-btn" href="/blog/#songs4thesoul"><i class="fa fa-music"></i> Songs for the Soul <i class="fa fa-music-note"></i></a>
                                </div>
                                
                                <i class="blockquote-footer m-2 text-light text-center">
                                ❝Learn to light a candle in the darkest moments of someone's life. Be the light that helps others see; it is what gives life its deepest significance.❞
                                </i>
                            </div>
                        </div>
                    </div>
                </div><!-- End Suscribe Section -->
        <div id="about" class="about-area area-padding bg-transparent">
            <div class="container">
                
                <div class="row d-flex justify-content-center">
                    <!-- single-well end-->
                    
                    <!-- End col-->
                </div>
               
                <div class="row mt-2 d-flex justify-content-between">
                <div class="">
                        <div class="section-headline text-center">
                            <h2>About APEK Inc.</h2>
                        </div>
                        <div class="well-left">
                            <div class="single-well">
                                <p class='text-center'>
                                    APEK Inc. is a development hub aimed at developing ideas into tangible solutions to human life. 
                                    The hub nurtures young minds into competent developers who create softwares, hardwares and even links 
                                    softwares to hardwares to achieve a multi-dimensional ease on human life.  
                                </p>
                                <h3 class='text-center'>Our Vision</h3>
                                <hr>
                                <p class='text-center'>To achieve a satisfying link between beginner and experienced developers in the technology world moving through fields of data, artificial intelligency, 
                                softwares, internet of things and network systems resulting to a simplified day to day life in production.</p>
                                <h3 class='text-center'>Our Mission</h3>
                                <hr>
                                <p class='text-center'>Bringing young people together and help realize their potential in solving day to day life challenges using simple methods</p>
                                <!--
                                <ul>
                                    <li>
                                        <i class="bi bi-check"></i> Provide well structured and designed web based applications
                                    </li>
                                    <li>
                                        <i class="bi bi-check"></i> Enlighten the public over a wide market available hrough internet
                                    </li>
                                    <li>
                                        <i class="bi bi-check"></i> Provide an avenue for comparison between entities with the same business ideas
                                    </li>
                                    <li>
                                        <i class="bi bi-check"></i> Mentor young developer to provide quality services
                                    </li>
                                    <li>
                                        <i class="bi bi-check"></i> Help young businesses gain stable digital market
                                    </li>
                                </ul>
                                -->
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="section-headline text-center">
                            <h2>Meet Abimon <br> The face behind APEK Inc</h2>
                        </div>
                        <p>
                        <div class="single-well" >
                            <div class="single-team-member m-2" style=" width:30%; float:left;">
                                <div class="team-img" >
                                    <a href="#" class="text-center p-2">
                                        <img src="{{asset('storage/static/img/profile.jpg')}}" class="rounded">
                                    </a>
                                    <div class="team-social-icon text-center">
                                        <ul>
                                            <li class="text-center">
                                                <a target="_blank" href="https://www.facebook.com/edimon.ombati.3">
                                                    <i class="bi bi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a target="_blank" href="https://twitter.com/EddieAbbie59?t=309BdPr2O3VjcIqROf2OAA&s=09https://twitter.com/EddieAbbie59?t=309BdPr2O3VjcIqROf2OAA&s=09">
                                                    <i class="bi bi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a target="_blank" href="https://wa.me/message/FYC4CSHUGJJ2F1">
                                                    <i class="bi bi-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content text-center">
                                    <h6><b>Edimon Ombati</b></h6>
                                    <p>Developer, Engineer</p>
                                </div>
                            </div>
                            <div class="single-well">
                                <p>
                                    Edimon Ombati Abobo, commonly refered to as Abimon, is a gentleman who believes in better days to 
                                    come as long as effort is put in whatever little someone does. 
                                </p>
                                <p>
                                The meaning of his name represents compassion, creativity, reliability, generosity, loyalty and a love for domestic life.
                                Family takes always priority in his life. It is the foundation of his traditional values. Providing for them is of the utmost importance!
                                </p>
                                
                                <p>
                                Being a kind person who likes to help others can sometimes slow him down when trying to accomplish his own goals.
                                However, even if he reaches his goal at the last minute he never miss a deadline because he always has a backup plan in his pocket.
                                </p>
                                <p>
                                Deeply rooted into his personality, is a passion to help others, having high ideals and a strong sense of justice.  
                                Always ready to fight for or help those who are weaker. He conveys a very positive attitude.
                                </p>
                                <p>
                                Harmony holds an important place in his life. This is clearly shown in his love for the arts and beautiful aesthetics. 
                                When faced with creative works of art all he feels is admiration. Often times he himself is creative. 
                                Because of his idealistic beliefs and aspirations to help everyone he tends to think that he knows what is best for others. 
                                This obviously is not always the case. 
                                </p>
                                <p> 
                                    In addition, he is an accomplished fullstack developer specialist in backend using PHP Laravel framework.
                                    Part of his work is <a href="/#portfolio">here</a>.
                                </p>    
                                <p>
                                    He is also a publisher working with <a target="_blank" href='https://healthandlifecenter.com'>CHALK Publishers</a>
                                </p>
                                <p>
                                    He has excelled in skills such as Team Coordination and Leadership, Networking-Mikrotik, 
                                    Embedded systems-Microcontrollers programming-Arduino, sensors, Creative Design, Resource Development, Electronics design, repair and maintainance, Electrical systems design, installation and mainainance
                                </p>   
                                <p>
                                    This has been achieved through his working with departments and industries such as JKUSDA, State Department, 
                                    Ministry of Public Works, Nairobi, Nyansiongo Tea Factory, MyHewa ISP, Onpoint ISP
                                </p>
                                </ul>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======= Contact Section ======= -->
        <div id="contact" class="contact-area">
            <div class="contact-inner area-padding">
                <div class="contact-overly"></div>
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="section-headline text-center">
                                    <h2>Contact us</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <!-- Start contact icon column -->
                        <div class="col-md-4">
                            <a href="tel:+254701583807">
                                <div class="contact-icon text-center">
                                    <div class="single-icon">
                                        <i class="bi bi-phone"></i>
                                        <p>
                                        +254 701 583 807<br>
                                        <span>Sunday-Friday (9am-5pm)</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="bi bi-envelope"></i>
                                    <p>
                                        info@apekinc.com<br>
                                        <span>Web: www.apekinc.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="bi bi-geo-alt"></i>
                                    <p>
                                        Bickon Plaza, Gate B<br>
                                        <span>Beside First Class, Gachororo Road</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Contact Section -->
    </main>
    <!-- End #main -->
@endsection