<section class="header_text">
    We stand for top quality shopping site. Our genuine products always speak for us. 
    <br/>Don't miss to use our cheap and best product offer.
</section>
<section class="main-content">
    <div class="row">
        <div class="span12">    

            <div class="row">
                <div class="span12">
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                        </span>
                    </h4>
                    <div id="myCarousel" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails">  

                                    @foreach ($products as $product)
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <p><a href="{{ route('products.show', $product->id) }}"><img src="{{ $product->image }}" alt="" /></a></p>
                                            <a href="{{ route('products.show', $product->id) }}" class="title">{{ $product->name }}</a><br/>
                                            @foreach ($product->categories as $category)
                                            <a href="{{ route('products', ['category' => $category->slug ]) }}" class="category">{{ $category->name }}</a>
                                            @endforeach
                                            <p class="price">{{ money_format('$%i', $product->price / 363.50) }}</p>
                                        </div>
                                    </li>
                                    @endforeach                                    

                                </ul>
                            </div>
                        </div>                          
                    </div>
                </div>                  
            </div>
            <br/>
            <div class="row">
                <div class="span12">
                    {{-- <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
                        </span>
                    </h4> --}}
                    <div id="myCarousel-2" class="myCarousel carousel slide">
                        <div class="carousel-inner">

                            {{-- <div class="item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware4.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$45.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware3.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$33.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think water</a><br/>
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$45.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$25.20</p>
                                        </div>
                                    </li>                                                                                                                                   
                                </ul>
                            </div> --}}
                        </div>                          
                    </div>
                </div>                      
            </div>

        </div>              
    </div>
</section>
