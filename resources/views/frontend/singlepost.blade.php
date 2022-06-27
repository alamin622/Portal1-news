@extends('layouts.front')
@section('meta')
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $post->title_bn }}" />
  <meta property="og:description" content="{{ $post->details_bn }}" />
  <meta property="og:image" content="{{URL::to($post->image)}}" />
@endsection
@section('content')
<!-- search-start -->
<!-- single-page-start -->


	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a></li>
                         <li><a href="#">
                         @if(session()->get('lang') == 'english')
                               {{ $post->category_en }}
                         @else
                              {{ $post->category_bn }}
                         @endif
                                              </a></li>
                         <li><a href="#">
                         @if(session()->get('lang') == 'english')
                             {{ $post->subcategory_en }}
                         @else
                             {{ $post->subcategory_bn }}
                         @endif
                        </a></li>
                     </ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
                            @if(session()->get('lang') == 'english')
                            {{ $post->title_en }}
                        @else
                            {{ $post->title_bn }}
                        @endif</h1>
					</header>


				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6">
						 <ul class="list-inline">


                            <li>{{ $post->name }} </li>     <li><i class="fa fa-clock-o"></i> {{ $post->post_date }}</li>

                        </ul>

						</div>
						<div class="col-md-6 col-sm-6 pull-right">
							<ul class="social-nav">
                                {{-- 								<li><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="" onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="" onclick="window.open('https://plus.google.com/share?url=#'); return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i class="fa fa-print"></i></a></li>
 --}}

							</ul>
						</div>
					</div>
				 </div>
			</div>
		  </div>

          @php
          $horizontal6=DB::table('ads')->where('type',2)->skip(5)->first();
        @endphp
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="sidebar-add">
                                        @if($horizontal6==NULL)
                                        @else
                                        <a href="{{ $horizontal6->link }}"> <img src="{{ asset($horizontal6->ads) }}" alt="" /> </a>

                                        @endif
                                    </div>
                                </div>
                            </div><!-- /.add-close -->
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{ asset($post->image) }}" alt="{{ $post->title_bn }}" />
					<h4 class="caption"> @if(session()->get('lang') == 'english')
                        {{ $post->title_en }}
                    @else
                        {{ $post->title_bn }}
                    @endif
                </h4><br>
                <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>


					<p>
                        @if(session()->get('lang') == 'english')
                        {!! $post->details_en !!}
                    @else
                        {!! $post->details_bn !!}
                    @endif</div>
				<!-- ********* -->
				<div class="comment-section " style="width: 100%;">
                    <!-- Begin .title-style01 -->
                    <div class=" comment-title title-style01 ">
                      <h4>
                        @if(session()->get('lang') == 'english')
                        Comments
                    @else
                        কমেন্টস


                    @endif
                      </h4>
                    </div>
                    <!-- End .title-style01 -->
                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5">
                    </div>
                  </div><hr>

                         @php
                            $more=DB::table('posts')->where('cat_id',$post->cat_id)->orderBy('id','DESC')->limit(6)->get();
                         @endphp
                         <br>
                         <div class="row">
                             <div class="col-md-12"><h2 class="heading">
                            @if(session()->get('lang') == 'english')
                                 More News
                             @else
                                 আরো সংবাদ
                             @endif
                            </h2></div><hr>
                             @foreach( $more as $row)
                             @php
                                 $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                             @endphp
                                 <div class="col-md-4 col-sm-4">
                                     <div class="top-news sng-border-btm">
                                         <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="{{ $row->title_bn }}"></a>
                                         <h4 class="heading-02" style="height: 60px;"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                             @if(session()->get('lang') == 'english')
                                                 {{ $row->title_en }}
                                             @else
                                               {{ $row->title_bn }}
                                             @endif
                                         </a> </h4>

                                     </div>
                                 </div>
                             @endforeach
                         </div>
                     </div>

                     <div class="col-md-4 col-sm-4">
                         @php
                                   $vertical3=DB::table('ads')->where('type',1)->skip(2)->first();
                                   $vertical4=DB::table('ads')->where('type',1)->skip(3)->first();
                         @endphp
                         <!-- add-start -->
                             <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                     <div class="sidebar-add">
                                        @if($vertical3==NULL)
                                        @else
                                        <a href="{{ $vertical3->link }}" target="_blank"><img src="{{ asset($vertical3->ads) }}" alt="" /></a>
                                        @endif
                                      </div>

                                 </div>
                             </div><!-- /.add-close -->
                             @php
                             $latest=DB::table('posts')->orderBy('id','DESC')->limit(8)->get();
                             $favourite=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
                             $highest=DB::table('posts')->inRandomOrder()->orderBy('id','ASC')->limit(8)->get();
                             @endphp
                             <div class="tab-header">
                                 <!-- Nav tabs -->
                                 <ul class="nav nav-tabs nav-justified" role="tablist">
                                     <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                                         @if(session()->get('lang') == 'english')
                                                   Latest News
                                         @else
                                                   সর্বশেষ
                                         @endif</a></li>
                                     <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                                         @if(session()->get('lang') == 'english')
                                                   Favourite
                                         @else
                                                   জনপ্রিয়
                                         @endif</a></li>
                                     <li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                                         @if(session()->get('lang') == 'english')
                                                   Highest Read
                                         @else
                                                   পঠিত
                                         @endif</a></li>
                                 </ul>

                                 <!-- Tab panes -->
                                 <div class="tab-content ">
                                     <div role="tabpanel" class="tab-pane in active" id="tab21">
                                         <div class="news-titletab">
                                             @foreach($latest as $row)
                                                 <div class="news-title-02">
                                                     <h4 class="heading-03"><a href="#">
                                                             @if(session()->get('lang') == 'english')
                                                                   {{ $row->title_en }}
                                                             @else
                                                                       {{ $row->title_bn }}
                                                             @endif
                                                     </a> </h4>
                                                  </div>
                                             @endforeach
                                         </div>
                                     </div>
                                     <div role="tabpanel" class="tab-pane fade" id="tab22">
                                         <div class="news-titletab">
                                           @foreach($favourite as $row)
                                                 <div class="news-title-02">
                                                     <h4 class="heading-03"><a href="#">
                                                             @if(session()->get('lang') == 'english')
                                                                   {{ $row->title_en }}
                                                             @else
                                                                       {{ $row->title_bn }}
                                                             @endif
                                                     </a> </h4>
                                                  </div>
                                             @endforeach

                                         </div>
                                     </div>
                                     <div role="tabpanel" class="tab-pane fade" id="tab23">
                                         <div class="news-titletab">
                                              @foreach($highest as $row)
                                                 <div class="news-title-02">
                                                     <h4 class="heading-03"><a href="#">
                                                             @if(session()->get('lang') == 'english')
                                                                   {{ $row->title_en }}
                                                             @else
                                                                       {{ $row->title_bn }}
                                                             @endif
                                                     </a> </h4>
                                                  </div>
                                             @endforeach
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <!-- add-start -->
                             <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                     <div class="sidebar-add">
                                        @if($vertical4==NULL)
                                        @else
                                        <a href="{{ $vertical4->link }}" target="_blank"><img src="{{ asset($vertical4->ads) }}" alt="" /></a>
                                        @endif
                                       </div>
                                 </div>
                             </div><!-- /.add-close -->
                     </div>
                   </div>
                 </div>
             </section>



             <div id="fb-root"></div>
             <script>(function(d, s, id) {
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) return;
               js = d.createElement(s); js.id = id;
               js.src = 'https://connect.facebook.net/bn_IN/sdk.js#xfbml=1&version=v3.2&appId=157325511530244&autoLogAppEvents=1';
               fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));</script>

             <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bf015c8b4a6560011bd9a88&product=inline-share-buttons' data-href="{{ Request::url() }}" async='async'></script>
             @endsection
