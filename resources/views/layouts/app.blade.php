<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SabrePro</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ URL::asset('scss/style.css') }}">
    <link href="{{ URL::asset('css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

    @yield('contStyle')
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><!--img src="images/logo.png" alt="Testing"-->Testing</a>
                <a class="navbar-brand hidden" href="./"><!--img src="images/logo2.png" alt="Testing"-->Testing</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!--li class="active">
                        <a href="#"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li-->
                    <!--h3 class="menu-title">UI elements</h3>
                        <! /.menu-title -->
                    <h3 class="menu-title">Resultados</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Resultados Saber Pro</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-square"></i><a href="/history/add">Agregar Nuevo</a></li>
                            <li><i class="fa fa-list"></i><a href="/history/list">Listar</a></li>
                            <li><i class="fa fa-list"></i><a href="/history/grafica">Generar Graficas</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Cuestionarios</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Preguntas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-square"></i><a href="/Question/newQuestion">Agregar Nueva</a></li>
                            <li><i class="fa fa-list"></i><a href="/question/list">Listar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Cuestionarios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-square"></i><a href="/Questionnaire/newQuestionnaire">Agregar Nuevo</a></li>
                            <!--li><i class="fa fa-list"></i><a href="/questionary/list">Listar</a></li-->
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!--img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar"-->
                            <i class="fa fa-user"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <!--div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div-->

        <div class="content mt-3">

        <div class="col-sm-12">
           @yield('sectionContent')
        </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ URL::asset('js/jquery/jquery-3.3.1.min.js') }}"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script-->
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>


    <script src="{{ URL::asset('js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('js/dashboard.js') }}"></script>
    <script src="{{ URL::asset('js/widgets.js') }}"></script>
    <script src="{{ URL::asset('js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ URL::asset('js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ URL::asset('js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
    
    <!-- Libreria peitychart -->
    <script src="{{ URL::asset('js/lib/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('js/lib/peitychart/peitychart.init.js') }}"></script>
        <!--  Chart js -->
    <script src="{{ URL::asset('js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('js/lib/chart-js/chartjs-init.js') }}"></script>

    <!--- Vuejs -->
    <script src=" {{ URL::asset('js/vue/axios.js') }}"></script>
    <script src=" {{ URL::asset('js/vue/vue.js') }}"></script>

    <script src="{{ URL::asset('vendor/summernote-master/dist/summernote-lite.js') }}"></script>


    @yield('sectionScript')


</body>
</html>
