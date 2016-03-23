    <div class="inner-column row">
        <div id="left_sidebar" class="col-xs-12 col-lg-3 col-sm-4">
            @if(count(list_category()) > 0)
            <div class="block accordion-widget">
                <div class="title"><h2>Kategori</h2></div>
                <div class="block-content accordion">
                    @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <div class="accordion-group side-accor">
                        <div class="accordion-heading">
                            @if(count($side_menu->anak) >= 1)
                            <a href="{{category_url($side_menu)}}"><span class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}"></span>
                            @else
                            <a class="collapsed" href="{{category_url($side_menu)}}">
                            @endif  
                                {{$side_menu->nama}}
                            </a>
                        </div>
                        @if($side_menu->anak->count() != 0)
                        <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}" class="accordion-body collapse submenu">
                            <div class="accordion-inner">
                                @foreach($side_menu->anak as $submenu)
                                @if($submenu->parent == $side_menu->id)
                                    <div class="accordion-heading">
                                        @if(count($submenu->anak) > 0 )
                                        <a href="{{category_url($submenu)}}"><span href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-toggle collapsed submenu" data-toggle="collapse"></span>
                                        @else
                                        <a href="{{category_url($submenu)}}" class="collapsed">
                                        @endif
                                            {{$submenu->nama}}
                                        </a>
                                    </div>
                                    @if($submenu->anak->count() != 0)
                                    <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-body collapse">
                                        <ul>
                                            @foreach($submenu->anak as $submenu2)
                                            @if($submenu2->parent == $submenu->id)
                                            <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            <div class="powerup">
                {{pluginSidePowerup()}}
            </div>
            @if(count(best_seller()) > 0)
            <div id="best-seller" class="block">
                <div class="title"><h2>Produk Terlaris</h2></div>
                <ul class="block-content">
                    @foreach(best_seller(5) as $bestproduk)
                    <li>
                        <a href="{{product_url($bestproduk)}}">
                            <div class="img-block">
                                {{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), $bestproduk->nama,array('class'=>'best','title'=>$bestproduk->nama))}}
                            </div>
                            <p class="product-name">{{short_description($bestproduk->nama,12)}}</p>
                            <p class="price">{{price($bestproduk->hargaJual)}}</p> 
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-more"><a href="{{url::to('produk')}}">produk lainnya >></a></div>
            </div>
            @endif
            @if(count(recentBlog()) > 0)
            <div id="latest-news" class="block">
                <div class="title"><h2>Artikel Terbaru</h2></div>
                <ul class="block-content">
                    @foreach(recentBlog(null,3) as $artikel)
                    <li>
                        <div class="img-block"></div>
                        <h5 class="title-news">{{short_description($artikel->judul, 20)}}</h5>
                        <p>{{short_description($artikel->isi, 46)}} <a class="read-more" href="{{blog_url($artikel)}}">Selengkapnya</a></p>
                        <span class="date-post">{{date("F d, Y", strtotime($artikel->created_at))}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div id="center_column" class="col-xs-12 col-lg-9 col-sm-8">
            <div class="product-list">
                <div class="row">
                    @if(count(list_product(null, @$category, @$collection)) > 0)
                    <ul class="grid">
                        {{-- */ $i = 1 /* --}}
                        @foreach(list_product(null, @$category, @$collection) as $listproduk)
                        <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($listproduk)}}">
                                        {{HTML::image(product_image_url($listproduk->gambar1,'medium'), $listproduk->nama, array('title'=>$listproduk->nama, 'srcset'=>product_image_url($listproduk->gambar1, "thumb").' 768w, '.product_image_url($listproduk->gambar1, "large").' 1200w'))}}
                                    </a>
                                    @if(is_outstok($listproduk))
                                    <div class="icon-info icon-sale">KOSONG</div>
                                    @elseif(is_terlaris($listproduk))
                                    <div class="icon-info icon-promo">HOT ITEM</div>
                                    @elseif(is_produkbaru($listproduk))
                                    <div class="icon-info icon-new">BARU</div>
                                    @endif
                                </div>
                                <div class="prod-info">
                                    <div class="fl">
                                        <h5 class="product-name">{{short_description($listproduk->nama,22)}}</h5>
                                        <span class="price">Harga : {{price($listproduk->hargaJual)}}</span>
                                    </div>
                                    <a href="{{product_url($listproduk)}}"><button class="buy-btn fr">Beli</button></a>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </li>
                        @if($i % 2 == 0)
                        <div class="clr visible-xs"></div>
                        @endif
                        {{-- */ $i++ /* --}}
                        @endforeach
                    </ul>
                    <div class="clr"></div>
                    {{list_product(null, @$category, @$collection)->links()}}
                    @else
                    <article class="text-center"><i>Produk tidak ditemukan</i></article>
                    @endif
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>