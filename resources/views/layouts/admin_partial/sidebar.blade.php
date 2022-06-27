@php
	$category=DB::table('categories')->orderBy('id','ASC')->get();
    $seo=DB::table('seos')->first();
    $website=DB::table('websites')->first();
    $horizontal1=DB::table('ads')->where('type',2)->first();
    $setting=DB::table('settings')->first();

    $prefix = Request::route()->getprefix();
    $route = Route::current()->getName();

@endphp



 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ URL::to('/') }}" class="brand-link" target="_blank" >
      <img src="{{ asset($setting->logo) }}"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text  f-w">{{ ($setting->name) }}


      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="{{ route('admin.home') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>





          @if(Auth::user()->category==1)
          <li class="nav-item has-treeview {{ ($prefix=='/category')?'menu-open':'' }}" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="{{ route('category.index') }}" class="nav-link {{ ($route=='category.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('subcategory.index') }}" class="nav-link {{ ($route=='subcategory.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>

            </ul>
          </li>
        @endif


        @if(Auth::user()->district==1)
        <li class="nav-item has-treeview {{ ($prefix=='/district')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                District
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview line">

                <li class="nav-item">
                    <a href="{{ route('district.index') }}" class="nav-link {{ ($route=='district.index')?'active':'' }}">
                      <i class="far  nav-icon"></i>
                      <p>District</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('subdistrict.index') }}" class="nav-link {{($route=='subdistrict.index')?'active':'' }}">
                      <i class="far  nav-icon"></i>
                      <p>Sub district</p>
                    </a>
                  </li>
            </ul>
          </li>
        @endif

        @if(Auth::user()->post==1)
          <li class="nav-item has-treeview {{ ($prefix=='/post')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Post
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview line">

                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link {{($route=='post.index')?'active':'' }}">
                      <i class="far  nav-icon"></i>
                      <p>All Post</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{ route('post.create') }}" class="nav-link {{($route=='post.create')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Add Post</p>
                </a>
              </li>


            </ul>
          </li>
          @endif

          @if(Auth::user()->ads==1)
          <li class="nav-item has-treeview {{ ($prefix=='/horizontal')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Advertisement
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview line">

                <li class="nav-item">
                    <a href="{{ route('horizontal.index') }}" class="nav-link {{($route=='horizontal.index')?'active':'' }}">
                      <i class="far  nav-icon"></i>
                      <p> Ads</p>
                    </a>
                  </li>

            </ul>
          </li>


        @endif


        @if(Auth::user()->setting==1)
          <li class="nav-item has-treeview {{ ($prefix=='/setting')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">7</span>
              </p>
            </a>
            <ul class="nav nav-treeview line">
              <li class="nav-item">
                      <a href="{{ route('social.index') }}" class="nav-link {{($route=='social.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Social Setting</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="{{ route('seo.index') }}" class="nav-link {{($route=='seo.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Seo setting</p>
                </a>
              </li>
               <li class="nav-item">
               <a href="{{ route('namaz.index') }}" class="nav-link {{($route=='namaz.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Namaz</p>
                </a>
              </li>

              <li class="nav-item">
               <a href="{{ route('livetv.index') }}" class="nav-link {{($route=='livetv.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Live Tv</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('notice.index') }}" class="nav-link {{($route=='notice.index')?'active':'' }}">
                   <i class="far  nav-icon"></i>
                   <p>Notice </p>
                 </a>
               </li>

               <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link {{($route=='setting.index')?'active':'' }}">
                   <i class="far  nav-icon"></i>
                   <p>Website Setting </p>
                 </a>
               </li>

               <li class="nav-item">
                <a href="{{ route('website.index') }}" class="nav-link {{($route=='website.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Create Website</p>
                </a>
              </li>
            </ul>
          </li>
          @endif



          @if(Auth::user()->gallery==1)
          <li class="nav-item has-treeview line {{ ($prefix=='/gallery')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('photo.index') }}" class="nav-link {{($route=='photo.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p> Photo gallery</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('vedio.index') }}" class="nav-link {{($route=='vedio.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Vedio Gallery</p>
                </a>
              </li>
            </ul>
          </li>
          @endif





          @if(Auth::user()->role ==1)
          <li class="nav-item has-treeview {{ ($prefix=='/role')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Role
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview line">
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link {{($route=='role.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>All Role</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('role.create') }}" class="nav-link {{($route=='role.create')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>Create Role</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{($route=='user.index')?'active':'' }}">
                  <i class="far  nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
