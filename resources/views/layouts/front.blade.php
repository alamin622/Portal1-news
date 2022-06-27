@php
	$category=DB::table('categories')->orderBy('id','ASC')->get();
    $seo=DB::table('seos')->first();
    $social=DB::table('socials')->first();
    $horizontal1=DB::table('ads')->where('type',2)->first();
    $setting=DB::table('settings')->first();


@endphp


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $seo->meta_author }}">
        <meta name="keyword" content="{{ $seo->meta_keyword }}">
        <meta name="description" content="{{ $seo->meta_description }}">
        <meta name="google-verification" content="{{ $seo->google_verification }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($setting->logo) }}">
        <title>{{ $seo->meta_title }}</title>

        <link href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/frontend/assets/css/stylenew.css') }}" rel="stylesheet">



    </head>
    <body>

        @php
    function bn_date($str)
        {
         $en = array(1,2,3,4,5,6,7,8,9,0);
        $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
        $str = str_replace($en, $bn, $str);
        $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
        $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
        $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn, $str );
        $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
         $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
         $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
         $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
         $str = str_replace( $en, $bn, $str );
         $str = str_replace( $en_short, $bn_short, $str );
         $en = array( 'am', 'pm' );
        $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
        $str = str_replace( $en, $bn, $str );
         $str = str_replace( $en_short, $bn_short, $str );
         $en = array( '১২', '২৪' );
        $bn = array( '৬', '১২' );
        $str = str_replace( $en, $bn, $str );
         return $str;
        }
@endphp

<!--...............White-header  start...........-->

<!--.....
    <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">
			<div class="row header-optimize">
				<div class="col-xs-6 col-md-2 col-sm-4 col-lg-4 time-display">
                    <div class="date">
                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        ?>
						<ul>
                            <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>
                                 @if(session()->get('lang')== 'english')
                                Dhaka
                                @else
                                ঢাকা
                                 @endif </li>
                                 <br>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>
                                @if(session()->get('lang')== 'english')
                                {{date('d M Y, l')}}
                                @else

                                {{ bn_date(date('d M Y, l'))}}
                                 @endif
                            </li>

						</ul>

					</div>
				</div>
                <div class="col-xs-6 col-md-2 col-sm-4 logo-display">
					<div class="header_logo">
						<a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}"></a>
					</div>
				</div>
				<div class="col-xs-6 col-md-8 col-sm-8 col-lg-9 category-display">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom1 color-white">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav navbar-m__navbar-list__Mnm-x">

                                        @foreach ($category as $row )

                                        @php
                                            $subcategory = DB::table('subcategories')->Where('category_id',$row->id)->get();
                                        @endphp
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    @if(session()->get('lang')== 'english')
                                                    {{ $row->category_en }}
                                                    @else
                                                    {{ $row->category_bn }}
                                                @endif
                                                </a>
											<ul class="dropdown-menu">
                                                @foreach ($subcategory as $row)
                                                <li><a href="{{ URL::to('posts/'.$row->id.'/'.$row->subcategory_bn)}}">
                                                    @if(session()->get('lang')== 'english')
                                                    {{ $row->subcategory_en }}
                                                    @else
                                                    {{ $row->subcategory_bn }}
                                                @endif


                                                </a></li>
                                                @endforeach


											</ul>
											</li>
                                            @endforeach


											</ul>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-2 col-sm-12 col-lg-4 end">
					<div class="header-icon lang-optimize ">
						<ul class="pad">
							<!-- version-start -->
							@if(session()->get('lang')== 'english')
							    <li class="version" ><a class="chn" href="{{ route('lang.bangla') }}"> বাংলা</a></li>
							@else
							  <li class="version" ><a  class="chn" href="{{ route('lang.english') }}" >English</a></li>
							  @endif

							<!-- login-start -->

                        @php
                            $notification=DB::table('posts')->orderBy('id','DESC')->limit(3)->get();
                            $favourite=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
                            $highest=DB::table('posts')->inRandomOrder()->orderBy('id','ASC')->limit(8)->get();
                            @endphp


							<!-- social-start -->
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="{{ $social->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="{{ $social->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="{{ $social->youtube }}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="{{ $social->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                    <a href="{{ $social->linkedin }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a>

                                </div>
								</div>
							</li>
                           
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-bell" aria-hidden="true"></i></button>
								  <div class="dropdown-content dropdown-content1">
                                    @foreach($notification as $row)
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp
                                    <div class="news-title-02">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}" >

                                                @if(session()->get('lang') == 'english')
                                                      {{ $row->title_en }}
                                                @else
                                                          {{ $row->title_bn }}
                                                @endif
                                        </a>

                                     </div>
                                    @endforeach

                                </div>
								</div>
							</li>
                            <!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->



   <!--.....
    <!-- header-start -->
	<section class="hdr_section1">
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-6 col-md-12 col-sm-12 col-lg-12">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom1 color-white">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav navbar-m__navbar-list__Mnm-x">

                                        @foreach ($category as $row )

                                        @php
                                            $subcategory = DB::table('subcategories')->Where('category_id',$row->id)->get();
                                        @endphp
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    @if(session()->get('lang')== 'english')
                                                    {{ $row->category_en }}
                                                    @else
                                                    {{ $row->category_bn }}
                                                @endif
                                                </a>
											<ul class="dropdown-menu">
                                                @foreach ($subcategory as $row)
                                                <li><a href="{{ URL::to('posts/'.$row->id.'/'.$row->subcategory_bn)}}">
                                                    @if(session()->get('lang')== 'english')
                                                    {{ $row->subcategory_en }}
                                                    @else
                                                    {{ $row->subcategory_bn }}
                                                @endif


                                                </a></li>
                                                @endforeach


											</ul>
											</li>
                                            @endforeach


											</ul>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section><!-- /.header-close -->

    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add">
						@if($horizontal1==NULL)
						@else
							 <a href="{{ $horizontal1->link }}" target="_blank">
							 	<img src="{{ asset($horizontal1->ads) }}" alt="" />
							 </a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
    {{--
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        ?>
						<ul>
                            <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>
                                 @if(session()->get('lang')== 'english')
                                Dhaka
                                @else
                                ঢাকা
                                 @endif </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>
                                @if(session()->get('lang')== 'english')
                                {{date('d M Y, l, h:i:s a')}}
                                @else
                                {{ bn_date(date('d M Y, l, h:i:s a'))}}
                                 @endif
                            </li>

						</ul>

					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->
--}}
	<!-- notice-start -->


    @php
        $headline=DB::table('posts')
                           ->join('categories','posts.cat_id','categories.id')
                           ->join('subcategories','posts.subcat_id','subcategories.id')
                           ->select('posts.*','categories.category_bn','subcategories.subcategory_bn')
                           ->where('posts.headline',1)
                           ->orderBy('id','DESC')
                           ->limit(5)
                           ->get();
           $notice=DB::table('notices')->first();
        @endphp
       <section>
           <div class="container-fluid">
               <div class="row scroll">
                   <div class="col-md-2 col-sm-3 scroll_01 ">
                       @if(session()->get('lang')== 'english')
                                   Headline :
                       @else
                                 শিরোনাম :
                       @endif

                   </div>
                   <div class="col-md-10 col-sm-9 scroll_02">
                   <marquee>
                       @foreach($headline as $row)
                       <a href="" style="color: white;">
                           @if(session()->get('lang')== 'english')
                                    *  {{ $row->title_en }}
                           @else
                                    * {{ $row->title_bn }}
                           @endif
                       </a>
                   @endforeach
                   </marquee>
                   </div>
               </div>
           </div>
       </section>



       @if($notice->status ==1)
       <section>
           <div class="container-fluid">
               <div class="row scroll">
                   <div class="col-md-2 col-sm-3 scroll_01 " style="background-color: green;">
                       @if(session()->get('lang')== 'english')
                                   Notice :
                       @else
                                 নোটিশ  :
                       @endif

                   </div>
                   <div class="col-md-10 col-sm-9 scroll_02" style="background-color:rgb(24 72 87);">
                   <marquee>
                           @if(session()->get('lang')== 'english')
                                      {{ $notice->notice_en }}
                           @else
                                     {{ $notice->notice_bn }}
                           @endif
                   </marquee>
                   </div>
               </div>
           </div>
       </section>
   @endif

    @yield('content')

	<!-- top-footer-start -->
	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo">
							<img src=" {{ asset($setting->logo) }}" style="height: 50px;" />

						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                <li><a href="" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                                <li><a href="" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li><a href="#"><img src="assets/img/apps-01.png" alt="" /></a></li>
								<li><a href="#"><img src="assets/img/apps-02.png" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->

	<!-- middle-footer-start -->
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
						@if(session()->get('lang')== 'english')
								  Address <br>
						@else
							ঠিকানা  <br>
						@endif

						@if(session()->get('lang')== 'english')
								  {!! $setting->address_en !!}
						@else
								{!! $setting->address_bn !!}
						@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
							@if(session()->get('lang')== 'english')
								   {{ $setting->phone_en }}<br>
								   {{ $setting->email }}
						@else
								 {{ $setting->phone_bn }} <br>
								 {{ $setting->email }}
						@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
							@if(session()->get('lang')== 'english')
								   {{ $setting->phone_en }}<br>
								   {{ $setting->email }}
						@else
								 {{ $setting->phone_bn }} <br>
								 {{ $setting->email }}
						@endif
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- bottom-footer-start -->
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">
						All rights reserved © 2020 Choudhury
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li><a href="#">
						@if(session()->get('lang')== 'english')
								  About Us <br>
						@else
							আমাদের সম্পর্কে   <br>
						@endif
							</a></li>
							<li><a href="#">
								@if(session()->get('lang')== 'english')
								  Contact Us <br>
						@else
							যোগাযোগ করুন   <br>
						@endif
							</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


    <script src="{{ asset('public/frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/main.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/f.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>



	</body>
</html>
