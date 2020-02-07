@extends('layouts.electro')
@section('content')

<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <span class="delimiter"></span>
            <a href="{{route('pages.index')}}">Home</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>
            <a href="#">Shop </a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>

            </span>{{$product->name}}
        </nav><!-- /.woocommerce-breadcrumb -->

        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="product">

                    <div class="single-product-wrapper">
                        <div class="product-images-wrapper">
                            <span class="onsale">Sale!</span>
                            <div class="images electro-gallery">
                                <div class="thumbnails-single owl-carousel">
                                    <a href="{{ productImage($product->image) }}" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="{{ productImage($product->image) }}" data-echo="{{ productImage($product->image) }}" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}" class="wp-post-image" alt=""></a>
                                </div><!-- .thumbnails-single -->

                                <div class="thumbnails-all columns-5 owl-carousel">
                                    <a href="{{ productImage($product->image)}}-thumb1.jpg" class="first" title=""><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}-thumb1.jpg" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}-thumb2.jpg" class="" title=""><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}-thumb2.jpg" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}-thumb3.jpg" class="" title=""><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}-thumb3.jpg" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}-thumb4.jpg" class="" title=""><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}-thumb4.jpg" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}-thumb5.jpg" class="last" title=""><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}-thumb5.jpg" class="wp-post-image" alt=""></a>

                                    <a href="{{ productImage($product->image)}}-thumb6.jpg" class="first" title=""><img src="/electro/assets/images/blank.gif" data-echo="{{ productImage($product->image)}}-thumb6.jpg" class="wp-post-image" alt=""></a>
                                </div><!-- .thumbnails-all -->
                            </div><!-- .electro-gallery -->
                        </div><!-- /.product-images-wrapper -->

                        <div class="summary entry-summary">

                           

                        <h1 itemprop="name" class="product_title entry-title">{{$product->name}}</h1>

                        <div class="availability in-stock">Availablity: <span>{!! $stockLevel !!}</span></div><!-- .availability -->

                            <hr class="single-product-title-divider" />

                           

                            <div itemprop="description">
                               <p> {{$product->details}}</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <p><strong>SKU</strong>: {{$product->slug}}</p>
                            </div><!-- .description -->

                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                                <p class="price"><span class="electro-price"><ins><span class="amount">$    {{presentPrice($product->price)}}/-</span></ins> 

                                <meta itemprop="price" content="1215" />
                                <meta itemprop="priceCurrency" content="USD" />
                                <link itemprop="availability" href="http://schema.org/InStock" />

                            </div><!-- /itemprop -->

                         

                                <div class="single_variation_wrap">
                                    <div class="woocommerce-variation single_variation"></div>
                                    <div class="woocommerce-variation-add-to-cart variations_button">
                                           
                                        
                                        </div>
                                        <br>
                                        <br>
                                        @if ($product->quantity > 0)
                                        <form action="{{ route('cart.store', $product) }}" method="POST">
                                            {{ csrf_field() }}
                                        <button type="submit" class="single_add_to_cart_button button">Add to cart</button>
                                        @endif
                                    </div>
                                </div>
                            </form>

                        </div><!-- .summary -->
                    </div><!-- /.single-product-wrapper -->


                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                           

                            <li class="nav-item description_tab">
                                <a href="#tab-description" class="active" data-toggle="tab">Description</a>
                            </li>

                        </ul>

                     
                                
                            <div class="tab-pane active in panel entry-content wc-tab" id="tab-description">
                                <div class="electro-description">

                                    <p> {!!$product->description!!}
                                </div><!-- /.electro-description -->

                                <div class="product_meta">
                                    <span class="sku_wrapper">SKU: <span class="sku" itemprop="sku">FW511948218</span></span>


                                    <hr>
                    <div class="related products">
                        <h2>Related Products</h2>

                        <ul class="products columns-5">

                            @foreach ($mightAlsoLike as $product)
                            <li class="product">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        
                                        <a href="{{ route('shop.show_2', $product->slug) }}">
                                            <h3>{{$product->name}}</h3>
                                            <div class="product-thumbnail">
                                                <img data-echo="{{ productImage($product->image) }}" src="{{ productImage($product->image) }}" alt="">
                                            </div>
                                        </a>

                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;{{ $product->presentPrice() }}</span></ins>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->

                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            @endforeach
                            
                </div><!-- /.product -->

            </main><!-- /.site-main -->
        </div><!-- /.content-area -->
    </div><!-- /.container -->
</div><!-- /.site-content -->

<section class="brands-carousel">
    <h2 class="sr-only">Brands Carousel</h2>
    <div class="container">
        <div id="owl-brands" class="owl-brands owl-carousel unicase-owl-carousel owl-outer-nav">

            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Acer</h4>
                            </div><!-- /.info -->
                        </figcaption>

                         <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/1.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Apple</h4>
                            </div><!-- /.info -->
                        </figcaption>

                         <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/2.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Asus</h4>
                            </div><!-- /.info -->
                        </figcaption>

                         <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/3.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Dell</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/4.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Gionee</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/5.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>HP</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/6.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>HTC</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/3.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>IBM</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/5.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Lenova</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/2.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>LG</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/1.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Micromax</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/6.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


            <div class="item">

                <a href="#">

                    <figure>
                        <figcaption class="text-overlay">
                            <div class="info">
                                <h4>Microsoft</h4>
                            </div><!-- /.info -->
                        </figcaption>

                        <img src="/electro/assets/images/blank.gif" data-echo="/electro/assets/images/brands/4.png" class="img-responsive" alt="">

                    </figure>
                </a>
            </div><!-- /.item -->


        </div><!-- /.owl-carousel -->

    </div>
</section>

</div>
@endsection

@section('js')
@endsection