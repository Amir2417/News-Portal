<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li>
          <a href="index.html">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>
        @if (Auth::user()->hasPermissionTo('role-list') )
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            @can('role-create')
            <li><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All  SubCategory</a></li>
            @endcan
        </ul>
        </li>
        @endif
        @if (Auth::user()->hasPermissionTo('role-create') )
        {{-- //Seetings Part --}}
        <li class="treeview">
            <a href="#">
              <i class="ti-settings"></i>
              <span>Seetings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('general.settings') }}"><i class="ti-more"></i>General Seetings</a></li>

              <li class="treeview">
                <a href="#">
                  <i class="ti-settings"></i>
                  <span>Footer Seetings</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('footer.settings.view') }}"><i class="ti-more"></i>Footer Seetings</a>

                    </li>
                    <li>
                        <a href="{{ route('footer.settings.create') }}"><i class="ti-more"></i>Add Footer Seetings</a>

                    </li>

                </ul>
            </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->hasPermissionTo('role-create') )
        <li class="treeview">
            <a href="#">
            <i class="fas fa-user"></i>
              <span>Articles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('articles.index') }}"><i class="ti-more"></i>Article Management</a></li>
              <li><a href="{{ route('articles.create') }}"><i class="ti-more"></i>Add Article</a></li>


            </ul>
        </li>
        @endif
        @if (Auth::user()->hasPermissionTo('role-list') )
        <li class="treeview">
            <a href="#">
            <i class="fas fa-user"></i>
              <span>Your Articles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('specific.articles.index') }}"><i class="ti-more"></i>Article Management</a></li>
              <li><a href="{{ route('articles.create') }}"><i class="ti-more"></i>Add Article</a></li>


            </ul>
        </li>
        @endif
        @if (Auth::user()->hasPermissionTo('role-create') )
        {{-- //Menu Part --}}
        <li class="treeview">
            <a href="#">
              <i class="ti-settings"></i>
              <span>Menu</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview">
                    <a href="#">
                      <i class="ti-settings"></i>
                      <span>General Menu</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('general.menu.list') }}"><i class="ti-more"></i>All Menu</a></li>
                        <li><a href="{{ route('general.menu.show') }}"><i class="ti-more"></i>Add Menu</a></li>

                    </ul>
                </li>



            <li class="treeview">
                <a href="#">
                  <i class="ti-settings"></i>
                  <span>Footer Menu</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('footer.menu.view') }}"><i class="ti-more"></i>Footer Menu List</a>

                    </li>
                    <li>
                        <a href="{{ route('footer.menu.show') }}"><i class="ti-more"></i>Add Footer Menu List</a>

                    </li>

                </ul>
            </li>
            </ul>
        </li>
        @endif

        {{-- //Users Part --}}
        <li class="treeview">
            <a href="#">
            <i class="fas fa-user"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('users.index') }}"><i class="ti-more"></i>User Management</a></li>


            </ul>
        </li>
        {{-- //Role Part --}}
        <li class="treeview">
            <a href="#">
            <i class="fas fa-user"></i>
              <span>Role</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('roles.index') }}"><i class="ti-more"></i>Role Management</a></li>


            </ul>
        </li>
        {{-- //Products --}}
        {{-- @if (Auth::user()->hasPermissionTo('product-list') )
        <li class="treeview">
            <a href="#">
            <i class="fas fa-user"></i>
              <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('products.index') }}"><i class="ti-more"></i>Product Management</a></li>


            </ul>
        </li>
        @endif --}}




        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>



      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
