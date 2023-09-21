<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 21:22:08 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />
    <link rel="shortcut icon" href="https://www.upv.cl/wp-content/uploads/2019/06/favicon.ico">
    <link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />

    <title>Administración Mercado Emprendedores Universidad del Alba</title>

    <!-- Bootstrap core CSS -->
    <link href="/admintemplate/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admintemplate/css/bootstrap-reset.css" rel="stylesheet">


    <!--external css-->
    <link href="/admintemplate/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/admintemplate/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/admintemplate/css/owl.carousel.css" type="text/css">

    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css') !!}

    {!! Html::style('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') !!}

    <!--DATATABLES-->
   {!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css') !!}

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="/admintemplate/css/style.css" rel="stylesheet">
    <link href="/admintemplate/css/style-responsive.css" rel="stylesheet" />

    

    <link rel="stylesheet" type="text/css" href="/admintemplate/assets/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="/admintemplate/assets/select2/css/select2.min.css"/>




  </head>

  <body>

  <section id="container">
      <!--header start-->
      <header class="header white-bg">
            <!--logo start-->
            <a href="{{ url('/admin') }}" class="logo"><img src="{{ asset('logo-menu.png') }}" class="img-responsive" width="180px" height="40px"></a>
            <!--logo end-->
       
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="/adminTemplate/img/avatar1_small.jpg">
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            <li></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Salir</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">


                  <li>
                      <a href="{{ url('/admin') }}" class="{{ request()->is('admin') ? 'active' : ''}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  

                  <li class="sub-menu">
                      <a href="javascript:;" class="{{ request()->is('categoria') ? 'active' : ''}}" >
                          <i class="fa fa-laptop"></i>
                          <span>Categorias</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="{{ url('/categoria') }}">Listado de Categorias</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                    <a href="javascript:;" class="{{ request()->is('emprendedor') ? 'active' : ''}}" >
                        <i class="fa fa-laptop"></i>
                        <span>Emprendedores</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a  href="{{ url('/emprendedor') }}">Listado de Emprendedores</a></li>
                    </ul>
                </li>
                
                
                <li class="sub-menu">
                    <a href="javascript:;" class="{{ request()->is('unidos') ? 'active' : ''}}" >
                        <i class="fa fa-laptop"></i>
                        <span>Nuevos Emprendedores Unidos</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a  href="{{ url('/unidos') }}">Listado de Nuevos Unidos</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="{{ request()->is('banner') ? 'active' : ''}}" >
                        <i class="fa fa-laptop"></i>
                        <span>Banners</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a  href="{{ url('/banner') }}">Listado de Banners</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="{{ request()->is('actividad') ? 'active' : ''}}" >
                        <i class="fa fa-laptop"></i>
                        <span>Actividades</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a  href="{{ url('/actividad') }}">Listado de Actividades</a></li>
                    </ul>
                </li>

                  
                @if(Auth::user()->type == "admin")
                <li class="sub-menu">
                    <a href="javascript:;" class="{{ request()->is('usuarios') ? 'active' : ''}}" >
                        <i class="fa fa-send-o"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a  href="{{ url('/usuarios') }}">Listado de usuarios</a></li>
                    </ul>
                </li>
                  @endif
                

              </ul>
              <!-- sidebar menu end-->
              
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                <div class="col-lg-12">
                    {{ Auth::user()->permiso }}<br>
                    {{ Auth::user()->area }}
                    @yield('content')
                </div>

              </div>


          </section>
      </section>
      <!--main content end-->

      <!-- Right Slidebar start -->


    
      <!--</div>-->
      <!-- Right Slidebar end -->

      <!--footer start-->
      <!--<footer class="site-footer">
          <div class="text-center">
              2020 &copy; Universidad Pedro de Valdivia.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>-->
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/admintemplate/js/jquery.js"></script>
    <script src="/admintemplate/js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="/admintemplate/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/admintemplate/js/jquery.scrollTo.min.js"></script>
    <script src="/admintemplate/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/admintemplate/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/admintemplate/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/admintemplate/js/owl.carousel.js" ></script>
    <script src="/admintemplate/js/jquery.customSelect.min.js" ></script>
    <script src="/admintemplate/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="/admintemplate/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="/admintemplate/js/common-scripts5e1f.js?v=2"></script>

    <!--script for this page-->
    <script src="/admintemplate/js/sparkline-chart.js"></script>
    <script src="/admintemplate/js/easy-pie-chart.js"></script>
    <script src="/admintemplate/js/count.js"></script>

  

    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {!! Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js') !!}
    {!! Html::script('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') !!}
    {!! Html::script('https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js') !!}
    {!! Html::script('https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js') !!}

   <!--SCRIPT DATATABLE-->
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js') !!}

    @yield('scripts')

     

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 21:22:43 GMT -->
</html>
