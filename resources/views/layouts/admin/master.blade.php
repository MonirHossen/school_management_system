<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin._head')
</head>
<body class="app sidebar-mini">
<!-- Navbar-->
@include('layouts.admin._top_bar')
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

@include('layouts.admin._left_side_bar')


<main class="app-content">

    @yield('content')

</main>
<!-- Essential javascripts for application to work-->
@include('layouts.admin._scripts')

</body>
</html>
