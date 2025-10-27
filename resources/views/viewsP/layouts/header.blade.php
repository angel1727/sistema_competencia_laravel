<nav class="navbar fixed-top" data-bs-theme="light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{ asset('img/logob.png') }}" alt="logo" width="150px"></a>
        <h1 class="titulo-xl">PADRÓN DE EVALUADORES Y EXPERTOS TÉCNICOS DTA</h1>
        <h1 class="titulo-md">PADRÓN DE EVA. Y EXP. TÉCNICOS DTA</h1>
        <h1 class="titulo-sm">PADRÓN DTA</h1>

        <!-- Magic Menu Horizontal (Desktop) -->
        <div class="magic-menu-desktop">
            <ul class="magic-menu">
                <li class="list active">
                    <a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="text">Inicio</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="desktop-outline"></ion-icon></span>
                        <span class="text">Iniciar Sesión</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#hoja-de-vida">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="text">Postúlate</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#Pie-Contactos">
                        <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                        <span class="text">Contactos</span>
                    </a>
                </li>
                {{-- <li class="list">
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="text">Configuración</span>
                    </a>
                </li> --}}
                <div class="indicator"></div>
            </ul>
        </div>
  
        <!-- Magic Menu Mobile (Mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <ion-icon name="menu-outline" class="menu-icon"></ion-icon>
        </button>
        <div class="offcanvas offcanvas-end custom-offcanvas-bg" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
  
            <div class="offcanvas-body">
                <!-- Magic Menu Mobile (Solo se ve en móvil) -->
                <div class="magic-menu-mobile">
                    <ul class="magic-menu">
                        <li class="list active">
                            <a href="#">
                                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                                <span class="text">Inicio</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#">
                                <span class="icon"><ion-icon name="desktop-outline"></ion-icon></span>
                                <span class="text">Iniciar Sesión</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#hoja-de-vida">
                                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                                <span class="text">Postúlate</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#Pie-Contactos">
                                <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                                <span class="text">Contactos</span>
                            </a>
                        </li>
                        {{-- <li class="list">
                            <a href="#">
                                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                                <span class="text">Configuración</span>
                            </a>
                        </li> --}}
                        <div class="indicator"></div>
                    </ul>
                </div>
                <img src="{{ asset('img/acreditacion.png') }}" alt="acreditacion" class="acreditacion">
            </div>
        </div>
    </div>
</nav>

<!-- Sección de contenido principal -->
<section class="evaluadores-dta">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-3">
                <img src="{{ asset('img/acreditacion.png') }}" alt="Acreditación-error" class="img-fluid d-block mx-auto">
            </div>

            <!-- Columna del texto -->
            <div class="col-md-8 mt-3">
                <p>
                    La Dirección Técnica de Acreditación (DTA) de IBMETRO, como organismo nacional competente para otorgar
                    acreditaciones a los Organismos de Evaluación de la Conformidad (OEC), abre este espacio para invitar a
                    profesionales altamente calificados a postularse como <strong>Evaluadores Líderes</strong> o
                    <strong>Evaluadores Técnicos</strong>.
                </p>
                <p>Ser parte del equipo evaluador de la DTA representa no solo un compromiso con la calidad, la imparcialidad y la
                    competencia técnica, sino también una valiosa oportunidad de <strong>crecimiento profesional</strong>,
                    <strong>intercambio técnico</strong> y <strong>fortalecimiento de capacidades</strong> en el marco del Sistema
                    Nacional de Acreditación.
                </p>
            </div>
      
            <!-- Segundo bloque: Beneficios -->
            <div class="col-md-6 mb-4 mt-3">
                <p>Al integrarte como evaluador, tendrás la oportunidad de:</p>
                <ul>
                    <li>
                        <ion-icon name="checkbox-sharp"></ion-icon>
                        Participar activamente en procesos de evaluación de organismos que trabajan en sectores clave del país, como
                        laboratorios de ensayo y calibración, laboratorios clínicos, organismos de inspección y certificación.
                    </li>
                    <li>
                        <ion-icon name="checkbox-sharp"></ion-icon>
                        Aplicar y ampliar tus conocimientos técnicos bajo el respaldo de normas internacionales como la
                        NB/ISO/IEC 17011:2021, fortaleciendo así tu perfil profesional.
                    </li>
                    <li>
                        <ion-icon name="checkbox-sharp"></ion-icon>
                        Adquirir experiencia práctica en evaluación de sistemas, metodologías y buenas prácticas de organismos que
                        ofrecen servicios fundamentales para la calidad, la salud, la seguridad y el medio ambiente.
                    </li>
                    <li>
                        <ion-icon name="checkbox-sharp"></ion-icon>
                        Interactuar con otros expertos del área y ser parte de una red nacional de evaluadores, fomentando el
                        aprendizaje continuo, la actualización técnica y el reconocimiento profesional.
                    </li>
                </ul>
            </div>
            <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/acreditacion_1.jpg') }}" alt="Acreditación-error1" width="560" height="315">
            </div>
        </div>
    </div>
</section>

<!-- Carrusel de cada card -->
<section id="carousel-seccion" class="seccion-carousel">
    <div class="container mt-5">
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
                <li class="card">
                    <div class="img"><img src="{{ asset('img/imagen1.png') }}" alt="img" draggable="false"></div>
                    <span>Certificaciones</span>
                </li>
                <li class="card">
                    <div class="img"><img src="{{ asset('img/imagen2.jpg') }}" alt="img" draggable="false"></div>
                    <span>Experiencia Práctica</span>
                </li>
                <li class="card">
                    <div class="img"><img src="{{ asset('img/imagen3.jpg') }}" alt="img" draggable="false"></div>
                    <span>Amplía tus Conocimientos Técnicos</span>
                </li>
                <li class="card">
                    <div class="img"><img src="{{ asset('img/imagen4.jpg') }}" alt="img" draggable="false"></div>
                    <span>Equipo de Evaluadores</span>
                </li>
                <li class="card">
                    <div class="img"><img src="{{ asset('img/imagen5.png') }}" alt="img" draggable="false"></div>
                    <span>Evaluaciones</span>
                </li>
                <li class="card">
                    <div class="img"><img src="{{ asset('img/imagen6.jpg') }}" alt="img" draggable="false"></div>
                    <span>Capacitaciones</span>
                </li>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
    </div>
</section>