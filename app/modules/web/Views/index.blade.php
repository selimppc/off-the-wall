@extends('web::layout.web_master')

@section('content')
    <div style="position: relative; width: 100%; height: auto; margin-top: 0px; margin-bottom: 0px; max-height: 1268px;" class="forcefullwidth_wrapper_tp_banner">
        <!--Slider Start-->

        <div class="slider-area">
            <div id="slider" style="width: 100%; height: 100%;">
                <!--LayerSlider layer-->
                @if(isset($img_sliders))
                   @foreach($img_sliders as $slider)
                       @if(($slider->group=='group_1'))
                            <div class="ls-layer">
                                <div id="layer-01-bg" class="ls-bg" style="layer1-background"></div>
                                <div id="layer-01-bg-02" class="ls-s6" style="layer1-sublayer1" data-rel="delayin: 1000; slidedirection: top; slideoutdirection: left; durationin: 3000;"></div>

                                {{--@foreach(\App\SliderImage::where('group','group_1')->get() as $sl)--}}
                                    <div id="layer-01-slide-01" class="ls-s6" style="layer1-sublayer2" data-rel="delayin: 100; slidedirection: right; slideoutdirection: left; durationin: 1500;">
                                        <p>REFLECTION</p>
                                        {{--<img src="{{ URL::to($slider->image)}} " width="387" height="347">--}}

                                    </div>
                                   <div id="layer-01-slide-02" class="ls-s4" style="layer1-sublayer3" data-rel="delayin: 100; slidedirection: bottom; slideoutdirection: bottom; durationin: 2000;">
                                      {{--<img src="etsb/web_assets/slider_assets/images/home-slider/image-02.png" width="503" height="339" alt="home-slider-02">--}}
                                       {{--<img src="{{ URL::to($sl->image)}} " width="503" height="339">--}}
                                       <p>CLIPPING PATH WITH SHADOW</p>
                                    </div>
                                {{--@endforeach--}}

                                <div id="layer-01-slide-03" class="ls-s2" style="layer1-sublayer4" data-rel="delayin: 100; slidedirection: right; slideoutdirection: left; durationin: 1000;">
                                    <p class="pera-01">Perfect clipping</p>
                                    <p class="pera-02">at low price</p>
                                    <p class="pera-03">Starts From <span class="bold">$0.29</span></p>
                                    <a href="free-trial.html" class="slider-button">Try 2 Images for free now <span>></span></a>
                                </div>
                            </div>
                      @else
                         {{--@foreach(\App\SliderImage::where('slider_image.group','!=','group_1')->get() as $sl)--}}
                            <div class="ls-layer">
                                @foreach(\App\SliderImage::where('group','=',null)->get() as $sl)
                                <div id="layer-02-bg" class="ls-bg" style="layer2-sublayer2"></div>
                                    <img id="layer-02-slide-01" class="ls-s6" src="{{ URL::to($sl->image)}} " width="595" height="500" style="layer2-sublayer1" data-rel="delayin: 100; slidedirection: right; slideoutdirection: left; durationin: 2000;" alt="home-slider-02-01">
                                @endforeach
                                    <div id="layer-02-slide-02" class="ls-s2" style="layer2-sublayer2" data-rel="delayin: 100; slidedirection: left; slideoutdirection: bottom; durationin: 1500;">
                                        <p class="style-01">A Complete Creative Studio</p>
                                        <p class="style-02">working  <span class="highlight">24/7</span><br>
                                            "A trustworthy name for many Online"</p>
                                        <a href="free-trial.html" class="slide02-button">Free Trial <span>></span></a>
                                    </div>
                                {{--@endforeach--}}
                            </div>
                         {{--@endforeach--}}
                      @endif
                   @endforeach
                @endif
            </div>
        </div>
        <!--Slider End-->
    </div>

    <!--Featured Area Start-->

    <div class="features-area">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <ul class="slider-items-list">

                        <li><a href="clipping-path.html">Photoshop Clipping Path </a></li>

                        <li><a href="photoshop-masking.html">Image Masking</a></li>

                        <li><a href="photo-retouch.html">Photo Retouching</a></li>

                        <li><a href="shadow-creation.html">Shadow & Reflection Creation</a></li>

                    </ul>

                    <div class="contact-area"> <span class="lan"> <a href="callto:bzmgraphics" class="lan"><i class="icon-skype"></i> Skype</a> </span>&nbsp;&nbsp;&nbsp; <a href="mailto:edutechsolutionsbd.com," class="email"><i class="icon-envelope-alt"></i>&nbsp;hello@bzmgraphics.com</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--Featured Area End-->

    <div class="container">
        <div class="c-p-family">
            <h1>“Every Pixels Matters”</h1>
            <p><strong>bZm Graphics</strong> is the best place, if you need bulk image editing service with great quality, fast turnaround time and cheaper price. bZm Graphics provides Solutions for your Photo Editing & Graphics Design Needs with picture perfect quality.</p>
        </div>

        <div class="row">
            <div class="span12 c-p-feature">
                <div class="row">
                    <div class="span4 item-style feature-item-1">
                        <h2>Image Editing</h2>
                        <p>At bZm Graphics, team of highly professionals and experienced will use their hand and creativity for your Clipping Path, Retouching, Color correction, Background remove, etc. projects to provide you the satisfied result every time.</p>
                    </div>

                    <div class="span4 item-style feature-item-3">
                        <h2>Graphics Design</h2>
                        <p>bZm Graphics is well capable with highly creative and professional designers to take care of graphics design projects like, Logo design, Poster, Brochure, Flyer, Catalog design, Business card design, etc.</p>
                    </div>

                    <div class="span4 item-style feature-item-4">
                        <h2>Desktop publishing</h2>
                        <p>bZm Graphics is well capable with highly creative and professional designers to take care of graphics design projects like, Logo design, Poster, Brochure, Flyer, Catalog design, Business card design, etc.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="content">



        <div class="post-wrapper">
            <div class="owl-carousel post-slider style6" data-items="4" data-itemsperdisplaywidth="[[0, 1], [480, 1], [768, 2], [992, 3], [1200, 4]]">
                <article class="post">
                    <figure><img alt="" src="etsb/web_assets/images/21.jpg"></figure>
                    <div class="portfolio-hover-holder">
                        <div class="portfolio-text">
                            <div class="portfolio-text-inner">
                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                            </div>
                        </div>
                                <span class="portfolio-action">
                                    <a href="etsb/web_assets/images/21.jpg" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                                    <a href="#"><i class="fa fa-chain has-circle"></i></a>
                                </span>
                    </div>
                </article>
                <article class="post">
                    <figure><img alt="" src="etsb/web_assets/images/22.jpg"></figure>
                    <div class="portfolio-hover-holder">
                        <div class="portfolio-text">
                            <div class="portfolio-text-inner">
                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                            </div>
                        </div>
                                <span class="portfolio-action">
                                    <a href="etsb/web_assets/images/22.jpg" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                                    <a href="#"><i class="fa fa-chain has-circle"></i></a>
                                </span>
                    </div>
                </article>
                <article class="post">
                    <figure><img alt="" src="etsb/web_assets/images/25.jpg"></figure>
                    <div class="portfolio-hover-holder">
                        <div class="portfolio-text">
                            <div class="portfolio-text-inner">
                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                            </div>
                        </div>
                                <span class="portfolio-action">
                                    <a href="etsb/web_assets/images/25.jpg" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                                    <a href="#"><i class="fa fa-chain has-circle"></i></a>
                                </span>
                    </div>
                </article>
                <article class="post">
                    <figure><img alt="" src="etsb/web_assets/images/20.jpg"></figure>
                    <div class="portfolio-hover-holder">
                        <div class="portfolio-text">
                            <div class="portfolio-text-inner">
                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                            </div>
                        </div>
                                <span class="portfolio-action">
                                    <a href="etsb/web_assets/images/20.jpg" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                                    <a href="#"><i class="fa fa-chain has-circle"></i></a>
                                </span>
                    </div>
                </article>
                <article class="post">
                    <figure><img alt="" src="etsb/web_assets/images/24.jpg"></figure>
                    <div class="portfolio-hover-holder">
                        <div class="portfolio-text">
                            <div class="portfolio-text-inner">
                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                            </div>
                        </div>
                                <span class="portfolio-action">
                                    <a href="etsb/web_assets/images/24.jpg" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                                    <a href="#"><i class="fa fa-chain has-circle"></i></a>
                                </span>
                    </div>
                </article>
                <article class="post">
                    <figure><img alt="" src="etsb/web_assets/images/22.jpg"></figure>
                    <div class="portfolio-hover-holder">
                        <div class="portfolio-text">
                            <div class="portfolio-text-inner">
                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                            </div>
                        </div>
                                <span class="portfolio-action">
                                    <a href="etsb/web_assets/images/21.jpg" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                                    <a href="#"><i class="fa fa-chain has-circle"></i></a>
                                </span>
                    </div>
                </article>
            </div>
            <div class="title-section">
                <div class="title-section-wrapper">
                    <div class="container">
                        <p>Amazing Work Showcase</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="prome-area">
            <div class="container">
                <div class="row">
                    <div class="span3 some-feature feature-1">
                        <div class="promo-area-bg"></div>
                        <p>Faster Turnaround time <br>12-24 hours</p>
                    </div>

                    <div class="span3 some-feature feature-2">
                        <div class="promo-area-bg"></div>
                        <p>Starts from <br>$ 0.29 per image</p>
                    </div>

                    <div class="span3 some-feature feature-3">
                        <div class="promo-area-bg"></div>
                        <p>Enjoy<br>Unlimited redo</p>
                    </div>

                    <div class="span3 some-feature feature-4">
                        <div class="promo-area-bg"></div>
                        <p>24/7<br>Non Stop service</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="heading-box">
                    <h2 class="box-title">Latest News From Our Blog</h2>
                    <p class="desc-lg">What all the fuzz is about?</p>
                </div>
                <div class="row blog-posts">
                    <div class="col-sm-4">
                        <article class="post post-masonry">
                            <div class="post-image">
                                <div class="image">
                                    <img src="etsb/web_assets/images/21(1).jpg" alt="">
                                    <div class="image-extras">
                                        <a href="index.html#" class="post-gallery"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="post-author">
                                    <a href="index.html#"><img src="etsb/web_assets/images/medium1.jpg" alt=""></a>
                                </div>
                                <div class="post-meta">
                                    <span class="entry-author fn">By <a href="index.html#">Admin</a></span>
                                    <span class="entry-time"><span class="published">12 Nov, 2014</span></span>
                                    <span class="post-category">in <a href="index.html#">Web Design</a></span>
                                </div>
                                <h3 class="entry-title"><a href="index.html#">Sed faucibus tristique placerat</a></h3>
                                <p>Aliquam hendrerit a augue insuscipit. Pellentesque id erat quis sapienissim sollicitudin. Nulla mattis rsitmet dolor sollicitudin aliquam.</p>
                            </div>
                            <div class="post-action">
                                <a href="index.html#" class="btn btn-sm style3 post-comment"><i class="fa fa-comment"></i>25</a>
                                <a href="index.html#" class="btn btn-sm style3 post-like"><i class="fa fa-heart"></i>480</a>
                                <a href="index.html#" class="btn btn-sm style3 post-share"><i class="fa fa-share"></i>Share</a>
                                <a href="index.html#" class="btn btn-sm style3 post-read-more">More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="post post-masonry">
                            <div class="post-image">
                                <div class="image">
                                    <img src="etsb/web_assets/images/22(1).jpg" alt="">
                                    <div class="image-extras">
                                        <a href="index.html#" class="post-gallery"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="post-author">
                                    <a href="index.html#"><img src="etsb/web_assets/images/medium2.jpg" alt=""></a>
                                </div>
                                <div class="post-meta">
                                    <span class="entry-author fn">By <a href="index.html#">Admin</a></span>
                                    <span class="entry-time"><span class="published">12 Nov, 2014</span></span>
                                    <span class="post-category">in <a href="index.html#">Web Design</a></span>
                                </div>
                                <h3 class="entry-title"><a href="index.html#">Enean tempor tincidunt odio</a></h3>
                                <p>Aliquam hendrerit a augue insuscipit. Pellentesque id erat quis sapienissim sollicitudin. Nulla mattis rsitmet dolor sollicitudin aliquam.</p>
                            </div>
                            <div class="post-action">
                                <a href="index.html#" class="btn btn-sm style3 post-comment"><i class="fa fa-comment"></i>25</a>
                                <a href="index.html#" class="btn btn-sm style3 post-like"><i class="fa fa-heart"></i>480</a>
                                <a href="index.html#" class="btn btn-sm style3 post-share"><i class="fa fa-share"></i>Share</a>
                                <a href="index.html#" class="btn btn-sm style3 post-read-more">More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="post post-masonry">
                            <div class="post-slider style3 owl-carousel">
                                <img src="etsb/web_assets/images/25(1).jpg" alt="">
                                <img src="etsb/web_assets/images/5.jpg" alt="">
                                <img src="etsb/web_assets/images/7.jpg" alt="">
                            </div>
                            <div class="post-content">
                                <div class="post-author">
                                    <a href="index.html#"><img alt="" src="etsb/web_assets/images/medium2.jpg"></a>
                                </div>
                                <div class="post-meta">
                                    <span class="entry-author fn">By <a href="index.html#">Admin</a></span>
                                    <span class="entry-time"><span class="published">12 Nov, 2014</span></span>
                                    <span class="post-category">in <a href="index.html#">Web Design</a></span>
                                </div>
                                <h3 class="entry-title"><a href="index.html#">Dolor tempor diamos</a></h3>
                                <p>Aliquam hendrerit a augue insuscipit. Pellentesque id erat quis sapienissim sollicitudin. Nulla mattis rsitmet dolor sollicitudin aliquam.</p>
                            </div>
                            <div class="post-action">
                                <a class="btn btn-sm style3 post-comment" href="index.html#"><i class="fa fa-comment"></i>25</a>
                                <a class="btn btn-sm style3 post-like" href="index.html#"><i class="fa fa-heart"></i>480</a>
                                <a class="btn btn-sm style3 post-share" href="index.html#"><i class="fa fa-share"></i>Share</a>
                                <a class="btn btn-sm style3 post-read-more" href="index.html#">More</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

    </section>
@stop