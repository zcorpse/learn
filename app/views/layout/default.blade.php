
@include('layout.header')

  <body class="no-skin">
    <!-- #section:basics/navbar.layout -->
    @include('layout.narbar')
    <!-- /section:basics/navbar.layout -->

    <div class="main-container container" id="main-container">
      
      @include('layout.sidebar')
      
      @yield('layout.content')

      @include('layout.footer')

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->
    {{HTML::script('assets/js/jquery.min.js')}}
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>    

    {{HTML::script('assets/js/bootstrap.min.js')}}
    {{HTML::script('assets/js/jquery-ui.custom.min.js')}}
    {{HTML::script('assets/js/jquery.ui.touch-punch.min.js')}}   
    {{HTML::script('assets/js/ace-elements.min.js')}}
    {{HTML::script('assets/js/ace.min.js')}}

    @yield('javascript')
    
  </body>
</html>
