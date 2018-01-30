<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>FaceConnect Adminpanel</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/css/admincss.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <link rel="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href=/css/main.css>
    <link rel="stylesheet" href=/css/custom.css>    
    <link rel="stylesheet" href=/css/pace.css>
    <script src="/js/pace.js"></script>
        
    </head>
    <body>

        <div class="wrapper" >
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <h3>Faceconnect</h3>
                </div>

                <ul class="list-unstyled components" >
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Records</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu" >
                            <li><a href="/admin/records/users" >Users</a></li>
                            <li><a href="/admin/records/posts">Posts</a></li>
                            <li><a href="#">{{-- Home 3 --}}</a></li>
                        </ul>
                    </li>
{{--                     <li>
                        <a href="#">Activities</a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Reports</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> --}}
                </ul>
{{-- 
                <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">Download source</a></li>
                    <li><a href="#" class="article">Back to article</a></li>
                </ul> --}}
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Open Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                {{-- <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li> --}}
                                @if(auth::check())
                                <li><a href="/admin/logout">Logout</a></li>
                                @endif
                                <li><img src="/image/Logo.jpg" alt="logo"></li>

                            </ul>
                        </div>
                    </div>
                </nav>
                 @yield('content')
            </div>
        </div>



        <div class="overlay"></div>
        <!-- jQuery CDN -->
 <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>

        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        
        @yield('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>