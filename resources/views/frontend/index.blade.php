@extends('layouts.front')
@section('content')


    @php
        $firstsectionbig=DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','DESC')->first();
        $firstsectionsmall=DB::table('posts')->where('first_section',1)->orderBy('id','DESC')->limit(8)->get();
    @endphp

    @php
        function bnn_date($str)
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

    @php
        $firstsectionbig=DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','DESC')->first();
        $firstsectionsmall=DB::table('posts')->where('first_section',1)->orderBy('id','DESC')->limit(8)->get();
    @endphp
    <!-- 1st-news-section-start -->


    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-lg-1">



                            @php
                                $slug=preg_replace('/\s+/u', '-', trim($firstsectionbig->title_bn));
                            @endphp
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="lead-news">
                                <div class="service-img"><a href="{{ URL::to('view-post/'.$firstsectionbig->id.'/'.$slug) }}"><img src=" {{ $firstsectionbig->image }}" alt="Notebook"></a></div>
                                <div class="content">
                                    <h4 class="lead-heading-01"><a href="{{ URL::to('view-post/'.$firstsectionbig->id.'/'.$slug) }}">
                                            @if(session()->get('lang') == 'english')
                                                {{ $firstsectionbig->title_en }}
                                            @else
                                                {{ $firstsectionbig->title_bn }}
                                            @endif

                                        </a> </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($firstsectionsmall as $row)
                            @php
                                $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                            @endphp
                            <div class="col-md-3 col-sm-3" >
                                <div class="top-news">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                    <h4 class="heading-02" style="height: 80px;">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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

                    <!-- add-start -->
                    <div class="row">
                        @php
                            $horizontal2=DB::table('ads')->where('type',2)->skip(1)->first();
                        @endphp
                        <div class="col-md-12 col-sm-12">
                            <div class="add">
                                @if($horizontal2==NULL)
                                @else
                                    <a href="{{ $horizontal2->link }}" target="_blank">
                                        <img src="{{ asset($horizontal2->ads) }}" alt="" />
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div><!--

					<-- news-start -->
                    <div class="row">
                        @php

                            $firstcat=DB::table('categories')->first();
                            $firstcatpostbig=DB::table('posts')->where('cat_id',$firstcat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                            $firstcatpostsmall=DB::table('posts')->where('cat_id',$firstcat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                        @endphp


                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title">
                                    @if(session()->get('lang') == 'english')
                                        {{ $firstcat->category_en }}
                                    @else
                                        {{ $firstcat->category_bn }}
                                    @endif

                                    <a href="{{ URL::to('post/'.$firstcat->id.'/'.$firstcat->category_bn)}}">
                                    <span>

                                        @if(session()->get('lang') == 'english')
                                            More
                                        @else
                                            আরও
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            @php
                                                $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                            @endphp

                                            <a href="{{ URL::to('view-post/'.$firstcatpostbig->id.'/'.$slug) }}"><img src=" {{ $firstcatpostbig->image }}" alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$firstcatpostbig->id.'/'.$slug) }}">

                                                    @if(session()->get('lang') == 'english')
                                                        {{ $firstcatpostbig->title_en }}
                                                    @else
                                                        {{ $firstcatpostbig->title_bn }}
                                                    @endif

                                                </a> </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach($firstcatpostsmall as $row)
                                            @php
                                                $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                            @endphp
                                            <div class="image-title">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                        @php
                            $secondcat=DB::table('categories')->skip(1)->first();
                            $secondcatcatpostbig=DB::table('posts')->where('cat_id',$secondcat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                            $secondcatpostsmall=DB::table('posts')->where('cat_id',$secondcat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                        @endphp

                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title">
                                    @if(session()->get('lang') == 'english')
                                        {{ $secondcat->category_en }}
                                    @else
                                        {{ $secondcat->category_bn }}
                                    @endif
                                    <a href="{{ URL::to('post/'.$secondcat->id.'/'.$secondcat->category_bn)}}">
                                    <span>
                                        @if(session()->get('lang') == 'english')
                                            More
                                        @else
                                            আরও
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            @php
                                                $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                            @endphp
                                            <a href="{{ URL::to('view-post/'.$secondcatcatpostbig->id.'/'.$slug) }}"><img src="{{ $secondcatcatpostbig->image }}" alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$secondcatcatpostbig->id.'/'.$slug) }}">

                                                    @if(session()->get('lang') == 'english')
                                                        {{ $secondcatcatpostbig->title_en }}
                                                    @else
                                                        {{ $secondcatcatpostbig->title_bn }}
                                                    @endif

                                                </a> </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">

                                        @foreach($secondcatpostsmall as $row)
                                            @php
                                                $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                            @endphp
                                            <div class="image-title">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @php
                                $vertical1=DB::table('ads')->where('type',1)->first();
                            @endphp

                            <div class="sidebar-add">
                                @if($vertical1==NULL)
                                @else
                                    <a href="{{ $vertical1->link }}" target="_blank"><img src="{{ asset($vertical1->ads) }}" alt="" /></a>
                                @endif
                            </div>
                        </div>
                    </div><!-- /.add-close -->

                    <!-- youtube-live-start -->

                    @php
                        $tv=DB::table('livetv')->first();
                    @endphp
                    @if($tv->status==1)
                        <div class="cetagory-title-03">
                            @if(session()->get('lang') == 'english')
                                Live TV
                            @else
                                লাইভ টিভি
                            @endif
                        </div>
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                                {!! $tv->embed_code !!}
                            </div>
                        </div><!-- /.youtube-live-close -->
                @endif


                <!-- facebook-page-start -->
                    <!-- facebook-page-start -->
                    <div class="cetagory-title-03">
                        @if(session()->get('lang') == 'english')
                            Our Facebook
                        @else
                            ফেসবুকে আমরা
                        @endif

                    </div>
                    <div class="fb-root">
                        <div class="fb-page" data-href="https://www.facebook.com/bdfashionkraft/" data-tabs="" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="" class="fb-xfbml-parse-ignore"><a href="">cyberneticltd</a></blockquote></div>
                        <div id="fb-root">

                        </div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=251302696084561&autoLogAppEvents=1"></script>
                    </div>
                    <br> <br>

   <div class="fb-root">
                        <div class="fb-page" data-href="https://www.facebook.com/hutkhola1989/" data-tabs="" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="" class="fb-xfbml-parse-ignore"><a href="">Hutkhola Wholesale & Supply Store</a></blockquote></div>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=251302696084561&autoLogAppEvents=1"></script>
                    </div>

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @php
                                $vertical2=DB::table('ads')->where('type',1)->skip(1)->first();
                            @endphp
                            <div class="sidebar-add">
                                @if($vertical2==NULL)
                                @else
                                    <a href="{{ $vertical2->link }}" target="_blank"><img src="{{ asset($vertical2->ads) }}" alt="" /></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.add-close -->

                    <br><br>
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @php
                                $vertical5=DB::table('ads')->where('type',1)->skip(5)->first();
                            @endphp
                            <div class="sidebar-add">
                                @if($vertical5==NULL)
                                @else
                                    <a href="{{ $vertical5->link }}" target="_blank"><img src="{{ asset($vertical5->ads) }}" alt="" /></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.add-close -->


                </div>
            </div>
        </div>
    </section><!-- /.1st-news-section-close -->


    <!-- 2nd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                @php

                    $thirdcat=DB::table('categories')->skip(2)->first();
                    $thirdcatpostbig=DB::table('posts')->where('cat_id',$thirdcat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                    $thirdcatpostsmall=DB::table('posts')->where('cat_id',$thirdcat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                @endphp

                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title">
                            @if(session()->get('lang') == 'english')
                                {{ $thirdcat->category_en }}
                            @else
                                {{ $thirdcat->category_bn }}
                            @endif
                            <a href="{{ URL::to('post/'.$thirdcat->id.'/'.$thirdcat->category_bn)}}">
								  <span>
								 @if(session()->get('lang') == 'english')
                                          More
                                      @else
                                          আরও
                                      @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp
                                    <a href="{{ URL::to('view-post/'.$thirdcatpostbig->id.'/'.$slug) }}"><img src="{{ asset($thirdcatpostbig->image)}}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$thirdcatpostbig->id.'/'.$slug) }}">
                                            @if(session()->get('lang') == 'english')
                                                {{ $thirdcatpostbig->title_en }}
                                            @else
                                                {{ $thirdcatpostbig->title_bn }}
                                            @endif
                                        </a> </h4>
                                    {{--      @php
                                               $start_date = new DateTime('2007-09-01 04:10:58');
                                               $since_start = $start_date->diff(new datetime('2012-09-11 10:25:00'));
                                               echo $since_start->d.' days<br>';
                                               echo $since_start->h.' hours<br>';
                                               echo $since_start->i.' minutes<br>';
                                               echo $since_start->y.' year<br>';
                                               echo $since_start->m.' month<br>';
                                             echo $since_start->d.' days<br>';
                                           @endphp
            --}}

                                    {{  $thirdcatpostbig->post_date }}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                @foreach($thirdcatpostsmall as $row)
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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

                @php
                    $fourcat=DB::table('categories')->skip(3)->first();
                    $fourcatpostbig=DB::table('posts')->where('cat_id',$fourcat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                    $fourcatpostsmall=DB::table('posts')->where('cat_id',$fourcat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                @endphp

                <div class="col-md-6 col-sm-6">

                    <div class="bg-one">
                        <div class="cetagory-title">
                            @if(session()->get('lang') == 'english')
                                {{ $fourcat->category_en }}
                            @else
                                {{ $fourcat->category_bn }}
                            @endif
                            <a href="{{ URL::to('post/'.$fourcat->id.'/'.$fourcat->category_bn)}}">
                                          <span>
                                         @if(session()->get('lang') == 'english')
                                                  More
                                              @else
                                                  আরও
                                              @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">

                                <div class="top-news">
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp

                                    <a href="{{ URL::to('view-post/'.$fourcatpostbig->id.'/'.$slug) }}"><img src=" {{ $fourcatpostbig->image }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$fourcatpostbig->id.'/'.$slug) }}">

                                            @if(session()->get('lang') == 'english')
                                                {{ $fourcatpostbig->title_en }}
                                            @else
                                                {{ $fourcatpostbig->title_bn }}
                                            @endif

                                        </a> </h4>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6">
                                @foreach($fourcatpostsmall as $row)
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
            </div>


            <!-- ******* -->
            <div class="row">

                @php
                    $fivecat=DB::table('categories')->skip(4)->first();
                    $fivecatcatpostbig=DB::table('posts')->where('cat_id',$fivecat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                    $fivecatpostsmall=DB::table('posts')->where('cat_id',$fivecat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                @endphp

                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title">
                            @if(session()->get('lang') == 'english')
                                {{ $fivecat->category_en }}
                            @else
                                {{ $fivecat->category_bn }}
                            @endif
                            <a href="{{ URL::to('post/'.$fivecat->id.'/'.$fivecat->category_bn)}}">
                                          <span>
                                         @if(session()->get('lang') == 'english')
                                                  More
                                              @else
                                                  আরও
                                              @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                @php
                                    $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                @endphp
                                <div class="top-news">
                                    <a href="{{ URL::to('view-post/'.$fivecatcatpostbig->id.'/'.$slug) }}"><img src=" {{ $fivecatcatpostbig->image }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$fivecatcatpostbig->id.'/'.$slug) }}">

                                            @if(session()->get('lang') == 'english')
                                                {{ $fivecatcatpostbig->title_en }}
                                            @else
                                                {{ $fivecatcatpostbig->title_bn }}
                                            @endif

                                        </a> </h4>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                @foreach($fivecatpostsmall as $row)
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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


                @php
                    $sixcat=DB::table('categories')->skip(5)->first();
                    $sixcatcatpostbig=DB::table('posts')->where('cat_id',$sixcat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                    $sixcatpostsmall=DB::table('posts')->where('cat_id',$sixcat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                @endphp

                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title">
                            @if(session()->get('lang') == 'english')
                                {{ $sixcat->category_en }}
                            @else
                                {{ $sixcat->category_bn }}
                            @endif
                            <a href="{{ URL::to('post/'.$sixcat->id.'/'.$sixcat->category_bn)}}">
                                          <span>
                                         @if(session()->get('lang') == 'english')
                                                  More
                                              @else
                                                  আরও
                                              @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                @php
                                    $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                @endphp
                                <div class="top-news">
                                    <a href="{{ URL::to('view-post/'.$sixcatcatpostbig->id.'/'.$slug) }}"><img src=" {{ $sixcatcatpostbig->image }}" alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$sixcatcatpostbig->id.'/'.$slug) }}">

                                            @if(session()->get('lang') == 'english')
                                                {{ $sixcatcatpostbig->title_en }}
                                            @else
                                                {{ $sixcatcatpostbig->title_bn }}
                                            @endif

                                        </a> </h4>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                @foreach($sixcatpostsmall as $row)
                                    @php
                                        $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
            </div>

        @php
            $horizontal3=DB::table('ads')->where('type',2)->skip(2)->first();
            $horizontal4=DB::table('ads')->where('type',2)->skip(3)->first();
        @endphp
        <!-- add-start -->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="add">
                        @if($horizontal3==NULL)
                        @else
                            <a href="{{ $horizontal3->link }}" target="_blank"> <img src="{{ asset($horizontal3->ads) }}" alt="" /> </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    @if($horizontal4==NULL)
                    @else
                        <a href="{{ $horizontal4->link }}" target="_blank"> <img src="{{ asset($horizontal4->ads) }}" alt="" /> </a>
                    @endif
                </div>
            </div><!-- /.add-close -->

        </div>
    </section><!-- /.2nd-news-section-close -->

    <!-- 3rd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">


            @php
                $countrybigpost=DB::table('posts')->whereNotNull('dist_id')->orderBy('id','DESC')->first();
                $countryfirst3=DB::table('posts')->whereNotNull('dist_id')->skip(1)->orderBy('id','DESC')->limit(3)->get();
                $countrysecond3=DB::table('posts')->whereNotNull('dist_id')->skip(4)->orderBy('id','DESC')->limit(3)->get();
            @endphp
            <div class="row">
                <div class="col-md-9 col-sm-9">

                    <br />
                    <div class="row">
                        @php
                            $sevencat=DB::table('categories')->skip(6)->first();
                            $sevencatpostbig=DB::table('posts')->where('cat_id',$sevencat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                            $sevencatpostsmall=DB::table('posts')->where('cat_id',$sevencat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                        @endphp
                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title">
                                    @if(session()->get('lang') == 'english')
                                        {{ $sevencat->category_en }}
                                    @else
                                        {{ $sevencat->category_bn }}
                                    @endif
                                    <a href="{{ URL::to('post/'.$sevencat->id.'/'.$sevencat->category_bn)}}">
                                      <span>
                                     @if(session()->get('lang') == 'english')
                                              More
                                          @else
                                              আরও
                                          @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">

                                            <a href="{{ URL::to('view-post/'.$sevencatpostbig->id.'/'.$slug) }}"><img src="  {{ $sevencatpostbig->image }}" alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$sevencatpostbig->id.'/'.$slug) }}">

                                                    @if(session()->get('lang') == 'english')
                                                        {{ $sevencatpostbig->title_en }}
                                                    @else
                                                        {{ $sevencatpostbig->title_bn }}
                                                    @endif

                                                </a> </h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        @foreach($sevencatpostsmall as $row)
                                            <div class="image-title">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                        @php
                            $eightcat=DB::table('categories')->skip(7)->first();
                            $eightcatpostbig=DB::table('posts')->where('cat_id',$eightcat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                            $eightcatpostsmall=DB::table('posts')->where('cat_id',$eightcat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                        @endphp

                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title">
                                    @if(session()->get('lang') == 'english')
                                        {{ $eightcat->category_en }}
                                    @else
                                        {{ $eightcat->category_bn }}
                                    @endif
                                    <a href="{{ URL::to('post/'.$eightcat->id.'/'.$eightcat->category_bn)}}">
                                      <span>
                                     @if(session()->get('lang') == 'english')
                                              More
                                          @else
                                              আরও
                                          @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="{{ URL::to('view-post/'.$eightcatpostbig->id.'/'.$slug) }}"><img src="{{ $eightcatpostbig->image }}" alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="{{ URL::to('view-post/'.$eightcatpostbig->id.'/'.$slug) }}">

                                                    @if(session()->get('lang') == 'english')
                                                        {{ $eightcatpostbig->title_en }}
                                                    @else
                                                        {{ $eightcatpostbig->title_bn }}
                                                    @endif

                                                </a> </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach($eightcatpostsmall as $row)
                                            <div class="image-title">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image)}}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                    </div>



                    @php
                        $horizontal5=DB::table('ads')->where('type',2)->skip(4)->first();
                    @endphp
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                                @if($horizontal5==NULL)
                                @else
                                    <a href="{{ $horizontal5->link }}"> <img src="{{ asset($horizontal5->ads) }}" alt="" /> </a>
                                @endif
                            </div>
                        </div>
                    </div><!-- /.add-close -->

                    <br><br><br>

                    @php
                        $horizontal7=DB::table('ads')->where('type',2)->skip(5)->first();
                    @endphp
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                                @if($horizontal7==NULL)
                                @else
                                    <a href="{{ $horizontal7->link }}"> <img src="{{ asset($horizontal7->ads) }}" alt="" /> </a>
                                @endif
                            </div>
                        </div>
                    </div><!-- /.add-close -->


                    @php
                        $latest=DB::table('posts')->orderBy('id','DESC')->limit(8)->get();
                        $favourite=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
                        $highest=DB::table('posts')->inRandomOrder()->orderBy('id','ASC')->limit(8)->get();
                    @endphp
                </div>


                <div class="col-md-3 col-sm-3" >
                    <div class="tab-header" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                                    @if(session()->get('lang') == 'english')
                                        Latest News
                                    @else
                                        সর্বশেষ
                                    @endif</a></li>
                            <li  role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                                    @if(session()->get('lang') == 'english')
                                        Favourite
                                    @else
                                        জনপ্রিয়
                                    @endif</a></li>
                            <li role="presentation" ><a  href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                                    @if(session()->get('lang') == 'english')
                                        Highest Read
                                    @else
                                        পঠিত
                                    @endif</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <!-- Tab panes -->
                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane in active" id="tab21">
                                <div class="news-titletab">
                                    @foreach($latest as $row)
                                        @php
                                            $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                        @endphp
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                                        @php
                                            $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                        @endphp
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                                        @php
                                            $slug=preg_replace('/\s+/u', '-', trim($row->title_bn));
                                        @endphp
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
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
                    <br>
                    <br>
                    <!-- Namaj Times -->
                    @php
                        $prayer=DB::table('namaz')->first();
                    @endphp


                    <div class="cetagory-title-03" style="background-color:#0b5772">
                        @if(session()->get('lang')== 'english')
                            Prayer times
                        @else
                            নামাজের সময়সূচি
                        @endif
                    </div>
                    <div class="dateShow">

                        <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        @if(session()->get('lang')== 'english')
                            {{date('d M Y, l')}}
                        @else

                            {{ bnn_date(date('d M Y, l'))}}
                        @endif




                    </div>
                    <table class="table">
                        <tr>
                            <th class="prayerName">
                                @if(session()->get('lang')== 'english')
                                    Fajr
                                @else
                                    ফজর
                                @endif
                            </th>
                            <th class="prayerTime">{{ $prayer->fajr }}</th>
                        </tr>
                        <tr>
                            <th class="prayerName">
                                @if(session()->get('lang')== 'english')
                                    Johr
                                @else
                                    যোহর
                                @endif
                            </th>
                            <th class="prayerTime">{{ $prayer->johr }}</th>
                        </tr>
                        <tr>
                            <th class="prayerName">
                                @if(session()->get('lang')== 'english')
                                    Asor
                                @else
                                    আছর
                                @endif
                            </th>
                            <th class="prayerTime">{{ $prayer->asor }}</th>
                        </tr>
                        <tr>
                            <th class="prayerName">
                                @if(session()->get('lang')== 'english')
                                    Magrib
                                @else
                                    মাগরিব
                                @endif
                            </th>
                            <th class="prayerTime">{{ $prayer->magrib }}</th>
                        </tr>
                        <tr>
                            <th class="prayerName">
                                @if(session()->get('lang')== 'english')
                                    Esha
                                @else
                                    এশা
                                @endif
                            </th>
                            <th class="prayerTime">{{ $prayer->esha }}</th>
                        </tr>
                        <tr>
                            <th class="prayerName">
                                @if(session()->get('lang')== 'english')
                                    Jummah
                                @else
                                    জুম্মা
                                @endif
                            </th>
                            <th class="prayerTime">{{ $prayer->jummah }}</th>
                        </tr>
                    </table>
                    <div id="tableSunTimes" class="nonPrayTime"><span class="sunrise">
                        @if(session()->get('lang')== 'english')
                                Sunrise
                            @else
                                সূর্যোদয়
                            @endif : {{ $prayer->sunrise }}</span>
                        <span class="sunset">
                              @if(session()->get('lang')== 'english')
                                Sunset
                            @else
                                সূর্যাস্ত
                            @endif : {{ $prayer->sunset }}

                            </span></div>
                    <br>
                    <br>
                    @php
                        $countrybigpost=DB::table('posts')->whereNotNull('dist_id')->orderBy('id','DESC')->first();
                        $countryfirst3=DB::table('posts')->whereNotNull('dist_id')->skip(1)->orderBy('id','DESC')->limit(3)->get();
                        $countrysecond3=DB::table('posts')->whereNotNull('dist_id')->skip(4)->orderBy('id','DESC')->limit(3)->get();
                    @endphp
                    <div class="cetagory-title-03"  style="background-color:#0b5772">
                        @if(session()->get('lang') == 'english')
                            Country
                        @else
                            সারাদেশে
                        @endif</div>
                    <br>
                    <form action="{{ route('saradesh.news') }}" method="get">
                        @csrf
                        <div class="form-row">
                            @php
                                $dis=DB::table('districts')->get();
                            @endphp
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <div class="form-group ">
                                <select class="form-control" name="dist_id" id="dist_id" required>
                                    <option selected="">

                                        @if(session()->get('lang')== 'english')
                                            ==Choose Division==
                                        @else
                                            ==বিভাগ নির্বাচন করুন==
                                        @endif
                                    </option>
                                    @foreach($dis as $row)
                                        <option value="{{ $row->id }}">{{ $row->district_bn }}</option>
                                    @endforeach
                                </select> </div>
                            <div class="form-group ">
                                <select class="form-control" name="subdist_id" id="subdist_id" required>
                                    <option selected="disabled">
                                        @if(session()->get('lang')== 'english')
                                            ==Choose District==
                                        @else
                                            ==জেলা নির্বাচন করুন==
                                        @endif
                                    </option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <button class="btn btn-success btn-block" type="submit">
                                    @if(session()->get('lang') == 'english')
                                        Find
                                    @else
                                        খুজুন
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>

                    <!-- news -->
                    <br>

                    <div class="cetagory-title-04" style="background-color:#0b5772">

                        @if(session()->get('lang')== 'english')
                            Importent Website
                        @else
                            গুরুত্বপূর্ণ ওয়েবসাইট
                        @endif


                        @php
                            $website=DB::table('websites')->get();
                        @endphp
                    </div>

                    <div class="">
                        @foreach($website as $row)
                            <div class="news-title-02">
                                <h4 class="heading-03"><a  target="_blank" href="{{ $row->website_link }}"><i class="fa fa-check" aria-hidden="true"></i>
                                        @if(session()->get('lang') == 'english')
                                            {{ $row->website_name_en }}
                                        @else
                                            {{ $row->website_name_bn }}
                                        @endif
                                    </a> </h4>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section><!-- /.3rd-news-section-close -->










    <!-- gallery-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="gallery_cetagory-title" style="background-color:#0b5772">
                        @if(session()->get('lang') == 'english')
                            Photo Gallery
                        @else
                            ফটো গ্যালারি
                        @endif
                    </div>
                    @php
                        $photobig=DB::table('photos')->where('type',1)->orderBy('id','DESC')->first();
                        $photosmall=DB::table('photos')->where('type',0)->orderBy('id','DESC')->limit(5)->get();
                    @endphp
                    <div class="row">

                        <div class="col-md-8 col-sm-8">
                            <div class="photo_screen">
                                <div class="myPhotos" style="width:100%">
                                    <img src="{{ asset($photobig->photo)}}"  alt="Avatar">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="photo_list_bg">
                                @foreach($photosmall as $row)
                                    <div class="photo_img photo_border active">
                                        <img src="{{ asset($row->photo)}}" alt="image" onclick="currentDiv(1)">
                                        <div class="heading-03">
                                            @if(session()->get('lang') == 'english')
                                                {{ $row->title_en }}
                                            @else
                                                {{ $row->title_bn }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                    <script>
                        var slideIndex = 1;
                        showDivs(slideIndex);

                        function plusDivs(n) {
                            showDivs(slideIndex += n);
                        }

                        function currentDiv(n) {
                            showDivs(slideIndex = n);
                        }

                        function showDivs(n) {
                            var i;
                            var x = document.getElementsByClassName("myPhotos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {slideIndex = 1}
                            if (n < 1) {slideIndex = x.length}
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex-1].style.display = "block";
                            dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

                    <!--=======================================
                        Video Gallery clickable  jquary  close
                    =========================================-->

                </div>
                <div class="col-md-4 col-sm-5">
                    <div class="gallery_cetagory-title" style="background-color:#0b5772">
                        @if(session()->get('lang') == 'english')
                            Video Gallery

                        @else
                            ভিডিও  গ্যালারি
                        @endif </div>
                    @php
                        $videobig=DB::table('vedios')->where('type',1)->orderBy('id','DESC')->first();
                        $videosmall=DB::table('vedios')->where('type',0)->orderBy('id','DESC')->limit(5)->get();
                        $tv=DB::table('livetv')->first();
                    @endphp
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">

                                        {!! $videobig->embed_code !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">
                                @foreach($videosmall as $row)
                                    <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                            {!! $row->embed_code !!}  </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                            showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                            showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                            var i;
                            var x = document.getElementsByClassName("myVideos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {slideIndex = 1}
                            if (n < 1) {slideIndex = x.length}
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex-1].style.display = "block";
                            dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

                </div>
            </div>
        </div>
    </section><!-- /.gallery-section-close -->


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="dist_id"]').on('change', function(){
                var dist_id = $(this).val();
                if(dist_id) {
                    $.ajax({
                        url: "{{  url('/get/subdist/frontend/') }}/"+dist_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $("#subdist_id").empty();
                            $.each(data,function(key,value){
                                $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_bn+'</option>');
                            });

                        },

                    });
                } else {
                    alert('danger');
                }

            });
        });

    </script>
@endsection
