<!-- #section:basics/sidebar -->
      <div id="sidebar" class="sidebar  sidebar-fixed responsive">
       
        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
              <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
              <i class="ace-icon fa fa-pencil"></i>
            </button>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning">
              <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
              <i class="ace-icon fa fa-cogs"></i>
            </button>

            <!-- /section:basics/sidebar.layout.shortcuts -->
          </div>

          <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
          </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
          <li class="active">
            <a href="{{route('portal')}}">
              <i class="menu-icon fa fa-th-large"></i>
              <span class="menu-text"> 概况信息 </span>
            </a>

            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-pencil-square-o"></i>
              <span class="menu-text"> 产品订购 </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <li class="">
                <a href="typography.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  零售订购
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="elements.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  订购清单
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="buttons.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  换货清单
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="treeview.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  发货单
                </a>

                <b class="arrow"></b>
              </li>
              
            </ul>
          </li>

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-bar-chart"></i>
              <span class="menu-text"> 业绩查看 </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="tables.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  业绩明细
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="jqgrid.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  业绩奖金
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-tags"></i>
              <span class="menu-text"> 个人账户 </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="form-elements.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  账户余额
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="form-wizard.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  交易明细
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="wysiwyg.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  电子货币冲值
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="wysiwyg.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  内部转账
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="dropzone.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  申请提现
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-envelope-o"></i>
              <span class="menu-text"> 内部邮件 </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="profile.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  收件箱
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="inbox.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  发件箱
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="pricing.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  公告通知
                </a>

                <b class="arrow"></b>
              </li>

            </ul>
          </li>
          

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-gears"></i>
              <span class="menu-text"> 系统设置 </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

             <ul class="submenu">
              <li class="">
                <a href="{{route('profile')}}">
                  <i class="menu-icon fa fa-caret-right"></i>
                  个人资料
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="inbox.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  密码修改
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="pricing.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  退出
                </a>

                <b class="arrow"></b>
              </li>
              
            </ul>
          </li>


        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
        
      </div>