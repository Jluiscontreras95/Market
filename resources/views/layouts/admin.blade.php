<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    {!! Html::style('web/vendors/iconfonts/font-awesome/css/all.min.css') !!}
    {!! Html::style('web/vendors/css/vendor.bundle.base.css') !!}
    {!! Html::style('web/vendors/css/vendor.bundle.addons.css') !!}
    {!! Html::style('Bootstrap-select/dist/css/bootstrap-select.min.css') !!}
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {!! Html::style('web/css/style.css') !!}
    @yield('styles')
    <!-- endinject -->
    <link rel="shortcut icon" href="" />
</head>

<body class="sidebar-fixed">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href=""><img src="{{asset('image/logo2.jpeg')}}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="{{asset('web/images/logo-mini.svg')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                  <ul class="navbar-nav">
                    <li class="nav-item nav-search d-none d-md-flex">
                        <div class="nav-link">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            </div>
                        </div>
                    </li>
                </ul>  
                <ul class="navbar-nav navbar-nav-right">
                    @yield('create')

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                          <i class="fas fa-bell mx-0"></i>
                            
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                          <a class="dropdown-item" href="">
                            <p class="mb-0 font-weight-normal float-left">Tienes </p>
                            <span class="badge badge-pill badge-warning float-right">
                                Ver todo
                            </span>
                          </a>
                          
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item" href="">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="fas  mx-0"></i>
                              </div>
                            </div>
                            <div class="preview-item-content">
                              <h6 class="preview-subject font-weight-medium">
                               
                              </h6>
                              <p class="font-weight-light small-text">
                               
                              </p>
                            </div>
                          </a> 
                        
                        </div>
                    </li>

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('web/images/faces/face16.jpg')}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off text-primary"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf

                            </form>
                        </div>
                    </li>
                    @yield('options')
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            @yield('preference')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts._nave')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Todos los derechos reservados.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="#">JContreras</a> </> <i class="far fa-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    {!! Html::script('js/jquery-3.6.0.min.js') !!}
    {!! Html::script('web/vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('web/vendors/js/vendor.bundle.addons.js') !!}
    {!! Html::script('Bootstrap-select/dist/js/bootstrap-select.min.js') !!}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    {!! Html::script('web/js/off-canvas.js') !!}
    {!! Html::script('web/js/hoverable-collapse.js') !!}
    {!! Html::script('web/js/misc.js') !!}
    {!! Html::script('web/js/settings.js') !!}
    {!! Html::script('web/js/todolist.js') !!}
    {!! Html::script('web/js/data-table.js') !!}
    {!! Html::script('web/js/profile-demo.js') !!}
    {!! Html::script('web/js/alert.js') !!}
    {!! Html::script('web/js/avgrund.js') !!}
    {!! Html::script('web/js/chart.js') !!}    

   

    <!-- endinject -->
    <!-- Custom js for this page-->
    {!! Html::script('web/js/dashboard.js') !!} 
    {!! Html::script('web/js/formpickers.js') !!} 
    {!! Html::script('web/js/form-addons.js') !!} 
    {!! Html::script('web/js/x-editable.js') !!} 
    {!! Html::script('web/js/dropify.js') !!} 
    {!! Html::script('web/js/dropzone.js') !!} 
    {!! Html::script('web/js/jquery-file-upload.js') !!} 
    {!! Html::script('web/js/formpickers.js') !!} 
    {!! Html::script('web/js/form-repeater.js') !!} 
    {!! Html::script('web/js/form-validation.js') !!} 
    {!! Html::script('web/js/bt-maxLength.js') !!} 
    {!! Html::script('web/js/select2.js') !!} 
    <!-- End custom js for this page-->
    @yield('scripts')

</body>


</html>
