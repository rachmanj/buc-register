<!DOCTYPE html>
<html>
  
  @include('templates.partials.head')

  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      @include('templates.partials.navbar')
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          @include('templates.partials.header')

          <!-- Main content -->
          <section class="content">

            @yield('content')
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            Dev. by<b> IT Dept</b>
          </div>
          <strong>Copyright &copy; 2021 <a href="http://arka.co.id">ARKA</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    @include('templates.partials.script')
  </body>
</html>
