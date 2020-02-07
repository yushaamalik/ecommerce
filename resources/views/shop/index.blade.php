@extends('layouts.electro')
@section('content')

<div class="container">
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb" ><a href="http://demo2.transvelo.in/electro">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets</nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">


                <header class="page-header">
                    <h1 class="page-title">Products</h1>
                    <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
                </header>

                <div class="shop-control-bar product-filters-widgets">
                    <div class="sidebar">
                        <div id="dropdown-menu" class="row filter-dropdown-menu" style="display: block;">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <aside class="widget widget_price_filter">
                                    <h3 class="widget-title">Filter By Price</h3>
                                    <a href="{{ route('shop.index_2', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop.index_2', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                                </aside>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <aside class="widget widget_layered_nav">
                                    <h3 class="widget-title">Filter By Category</h3>
                                    <ul style="list-style: none; padding: 0;">
                                        @foreach($categories as $category)
                                        <li class="{{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index_2', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </aside>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <aside class="widget widget_layered_nav">
                                    <h3 class="widget-title">Filter By Color</h3>
                                    <ul style="list-style: none; padding: 0;">
                                        <li><a href="#">Green</a> <span class="count">(5)</span></li>
                                        <li><a href="#">Grey</a> <span class="count">(5)</span></li>
                                        <li><a href="#">Orange</a> <span class="count">(5)</span></li>
                                        <li><a href="#">Red</a> <span class="count">(5)</span></li>
                                    </ul>
                                </aside>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <aside class="widget widget_layered_nav" id="woocommerce_layered_nav-11">
                                    <h3 class="widget-title">Filter By Size</h3>
                                    <ul style="list-style: none; padding: 0;">
                                        <li><a href="#">L</a> <span class="count">(4)</span></li>
                                        <li><a href="#">M</a> <span class="count">(4)</span></li>
                                        <li><a href="#">S</a> <span class="count">(4)</span></li>
                                    </ul>
                                </aside>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="shop-control-bar">
                    <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid Extended View" href="#grid-extended"><i class="fa fa-align-justify"></i></a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                        <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
                    </ul>

                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby">
                            <option value="menu_order"  selected='selected'>Default sorting</option>
                            <option value="popularity" >Sort by popularity</option>
                            <option value="rating" >Sort by average rating</option>
                            <option value="date" >Sort by newness</option>
                            <option value="price" >Sort by price: low to high</option>
                            <option value="price-desc" >Sort by price: high to low</option>
                        </select>
                    </form>

                    <form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
                    <nav class="electro-advanced-pagination">
                        <form method="post" class="form-adv-pagination"><input id="goto-page" size="2" min="1" max="2" step="1" type="number" class="form-control" value="1" /></form> of 2<a class="next page-numbers" href="#">&rarr;</a>         <script>
                        jQuery(document).ready(function($){
                            $( '.form-adv-pagination' ).on( 'submit', function() {
                                var link        = '#',
                                goto_page   = $( '#goto-page' ).val(),
                                new_link    = link.replace( '%#%', goto_page );

                                window.location.href = new_link;
                                return false;
                            });
                        });
                        </script>
                    </nav>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">

                        <ul class="products columns-4">
                             @foreach($products as $product)
                                    <li class="product">
                                        <div class="product-outer">
                                            <div class="product-inner">
                                                
                                                <a href="single-product.html">
                                                    <h3><a href="{{ route('shop.show_2', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                                    </h3>
                                                    <div class="product-thumbnail">
                                                        <a href="{{ route('shop.show_2', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>

                                                    </div>
                                                </a>

                                                <div class="price-add-to-cart">
                                                    <span class="price">
                                                        <span class="electro-price">
                                                            <ins><span class="amount"> {{ presentPrice($product->price) }}-/</span></ins>
                                                            <span class="amount"> </span>
                                                        </span>
                                                    </span>
                                                    <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->

                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link"> Compare</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </li><!-- /.products -->
                                    @endforeach

                            

                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="grid-extended" aria-expanded="true">

                        <ul class="products columns-4">

                            <li class="product first">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/3.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product last">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product first">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/6.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product last">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product first">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/1.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/6.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/3.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product last">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product first">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                            <li class="product ">
                                <div class="product-outer">
                                    <div class="product-inner">
                                        <span class="loop-product-categories"><a href="product-category.html" rel="tag">Smartphones</a></span>
                                        <a href="single-product.html">
                                            <h3>Notebook Black Spire V Nitro  VN7-591G</h3>
                                            <div class="product-thumbnail">
                                                <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                            </div>

                                            <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div>

                                            <div class="product-short-description">
                                                <ul>
                                                    <li><span class="a-list-item">Intel Core i5 processors (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Flash storage</span></li>
                                                    <li><span class="a-list-item">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                                    <li><span class="a-list-item">Force Touch trackpad (13-inch model)</span></li>
                                                </ul>
                                            </div>

                                            <div class="product-sku">SKU: 5487FB8/15</div>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount">&#036;1,999.00</span></ins>
                                                    <del><span class="amount">&#036;2,299.00</span></del>
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="single-product.html" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                        <div class="hover-area">
                                            <div class="action-buttons">
                                                <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                <a href="#" class="add-to-compare-link">Compare</a>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </div><!-- /.product-outer -->
                            </li>
                        </ul>
                    </div>


                    <div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">

                        <ul class="products columns-3">
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/1.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html"><img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt=""></a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/3.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/6.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/1.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/6.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/3.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="#">Tablets</a></span><a href="single-product.html"><h3>Tablet Air 3 WiFi 64GB  Gold</h3>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">

                                                <div class="availability in-stock">Availablity: <span>In stock</span></div>

                                                <span class="price"><span class="electro-price"><span class="amount">$629.00</span></span></span>
                                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="5487FB8/35" data-product_id="2706" data-quantity="1" href="single-product.html" rel="nofollow">Add to cart</a>
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2706">
                                                            <a class="add_to_wishlist" data-product-type="simple" data-product-id="2706" rel="nofollow" href="#">Wishlist</a>

                                                            <div style="display:none;" class="yith-wcwl-wishlistaddedbrowse hide">
                                                                <span class="feedback">Product added!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="display:none" class="yith-wcwl-wishlistexistsbrowse hide">
                                                                <span class="feedback">The product is already in the wishlist!</span>
                                                                <a rel="nofollow" href="#">Wishlist</a>
                                                            </div>

                                                            <div style="clear:both"></div>
                                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                                        </div>
                                                        <div class="clear"></div>
                                                        <a data-product_id="2706" class="add-to-compare-link" href="#">Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">

                        <ul class="products columns-3">
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/1.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/3.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">
                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>
                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/6.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/1.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/6.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/3.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/5.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/4.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="product list-view list-view-small">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="single-product.html">
                                            <img class="wp-post-image" data-echo="/electro/assets/images/products/2.jpg" src="/electro/assets/images/blank.gif" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <span class="loop-product-categories"><a rel="tag" href="product-category.html">Smartphones</a></span><a href="product-category.html"><h3>Ultrabook UX605CA-FC050T</h3>
                                                    <div class="product-short-description">
                                                        <ul style="padding-left: 18px;">
                                                            <li>4.5 inch HD Screen</li>
                                                            <li>Android 4.4 KitKat OS</li>
                                                            <li>1.4 GHz Quad Core&trade; Processor</li>
                                                            <li>20 MP front Camera</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-rating">
                                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="price-add-to-cart">
                                                    <span class="price"><span class="electro-price"><span class="amount">$1,218.00</span></span></span>
                                                    <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                </div><!-- /.price-add-to-cart -->
                                                <div class="hover-area">
                                                    <div class="action-buttons">

                                                        <a href="#" rel="nofollow" class="add_to_wishlist">Wishlist</a>

                                                        <a href="compare.html" class="add-to-compare-link">Compare</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shop-control-bar-bottom">
                    <form class="form-electro-wc-ppp">
                        <select class="electro-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp"><option selected="selected" value="15">Show 15</option><option value="-1">Show All</option></select>
                    </form>
                    <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                            <li><span class="page-numbers current">1</span></li>
                            <li><a href="#" class="page-numbers">2</a></li>
                            <li><a href="#" class="next page-numbers">→</a></li>
                        </ul>
                    </nav>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
    
</div><!-- #content -->

</div>
@endsection

@section('js')
<script type="text/javascript" src="/electro/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/tether.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/echo.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/wow.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="/electro/assets/js/electro.js"></script>

        <!-- For demo purposes – can be removed on production -->

        <script src="/electro/switchstylesheet/switchstylesheet.js"></script>

           <script>
           (function($) {
               $(document).ready(function(){
                   $(".changecolor").switchstylesheet( { seperator:"color"} );
                   $('.show-theme-options').click(function(){
                       $(this).parent().toggleClass('open');
                       return false;
                   });

                   $('#home-pages').on( 'change', function() {
                       $.ajax({
                           url : $('#home-pages option:selected').val(),
                           success:function(res) {
                               location.href = $('#home-pages option:selected').val();
                           }
                       });
                   });

                    $('#demo-pages').on( 'change', function() {
            			$.ajax({
            				url : $('#demo-pages option:selected').val(),
            				success:function(res) {
            					location.href = $('#demo-pages option:selected').val();
            				}
            			});
            		});

                    $('#header-style').on( 'change', function() {
            			$.ajax({
            				url : $('#header-style option:selected').val(),
            				success:function(res) {
            					location.href = $('#header-style option:selected').val();
            				}
            			});
            		});

                    $('#shop-style').on( 'change', function() {
            			$.ajax({
            				url : $('#shop-style option:selected').val(),
            				success:function(res) {
            					location.href = $('#shop-style option:selected').val();
            				}
            			});
            		});

                    $('#product-category-col').on( 'change', function() {
            			$.ajax({
            				url : $('#product-category-col option:selected').val(),
            				success:function(res) {
            					location.href = $('#product-category-col option:selected').val();
            				}
            			});
            		});

                    $('#single-products').on( 'change', function() {
            			$.ajax({
            				url : $('#single-products option:selected').val(),
            				success:function(res) {
            					location.href = $('#single-products option:selected').val();
            				}
            			});
            		});

                    $('.style-toggle').on( 'click', function() {
            			$(this).parent('.config').toggleClass( 'open' );
            		});
               });
        })(jQuery);
        </script>
        <!-- For demo purposes – can be removed on production : End -->
@endsection