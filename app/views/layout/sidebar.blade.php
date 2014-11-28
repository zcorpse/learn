<!-- #section:basics/sidebar -->
      <div id="sidebar" class="sidebar sidebar-fixed responsive">
       
       

        <ul class="nav nav-list">       
          @if (Auth::check())
          <li class="{{ (Request::is('portal') ? 'active' : '') }}">
            <a href="{{URL::to('portal')}}">
              <i class="menu-icon fa fa-user orange bigger-150"></i>
              <span class="menu-text">
                {{Auth::user()->name}}                 
              </span>
            </a>
            <b class="arrow"></b>
          </li>
          @endif

          @if (Auth::check())
            @foreach( $menus['parent'] as $index => $pmenu)              
              <li class="{{ (Request::is($pmenu->prefix.'/'.$pmenu->controller.'/*') ? 'active open' : '') }}">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa {{$pmenu->icon}} bigger-150"></i>
                  <span class="menu-text"> {{$pmenu->name}} </span>

                  <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>                
                <ul class="submenu">
                  @foreach ($menus['child'][$pmenu->id] as $cmenu)                             
                                    
                    <li class="{{ (Request::is($cmenu->prefix.'/'.$cmenu->controller.'/'.$cmenu->action) ? 'active' : '') }}">
                      <a href="/{{ $cmenu->prefix}}/{{$cmenu->controller}}/{{$cmenu->action }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{$cmenu->name}}
                      </a>
                      <b class="arrow"></b>

                    </li>
                    
                  @endforeach
                </ul>
                
              </li>

               
            @endforeach

          @endif


          @if (Auth::check())
          <li class="{{ (Request::is('setup/*') ? 'active open' : '') }}">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-gear bigger-150"></i>
              <span class="menu-text"> 系统设置 </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
       
        
            <ul class="submenu"> 
              @if (Auth::user()->flag == 0)
              <li class="{{ (Request::is('setup/profile') ? 'active' : '') }}">
                <a href="{{URL::to('setup/profile')}}">
                  <i class="menu-icon fa fa-caret-right"></i>
                  个人资料修改
                </a>
                <b class="arrow"></b>
              </li>
              @endif
              <li class="{{ (Request::is('setup/password') ? 'active' : '') }}">
                <a href="{{URL::to('setup/password')}}">
                  <i class="menu-icon fa fa-caret-right"></i>
                  登录密码修改
                </a>
                <b class="arrow"></b>
              </li>

              <li class="{{ (Request::is('setup/password2') ? 'active' : '') }}">
                <a href="{{URL::to('setup/password2')}}">
                  <i class="menu-icon fa fa-caret-right"></i>
                  二级密码修改
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="{{URL::to('logout')}}">
                  <i class="menu-icon fa fa-caret-right"></i>
                  退出
                </a>
                <b class="arrow"></b>
              </li>   

            </ul>
          </li>
          @endif 

          
        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
        
      </div>