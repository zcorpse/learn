<div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav">  

            <!-- #section:basics/navbar.user_menu -->
            <li class="light-blue">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="/assets/avatars/user.jpg" alt="Jason's Photo" />
                <span class="user-info">
                  {{Auth::user()->name}}
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-cog"></i>
                    设置
                  </a>
                </li>

                <li>
                  <a href="profile.html">
                    <i class="ace-icon fa fa-user"></i>
                    个人资料
                  </a>
                </li>

                <li class="divider"></li>

                <li>
                  <a href="{{route('logout')}}">
                    <i class="ace-icon fa fa-power-off"></i>
                    退出
                  </a>
                </li>
              </ul>
            </li>

            <!-- /section:basics/navbar.user_menu -->
          </ul>
        </div>