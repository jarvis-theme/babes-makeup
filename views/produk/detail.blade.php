    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
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
                    @foreach(best_seller() as $bestproduk)
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
        <div class="inner-bg col-lg-9 col-xs-12 col-sm-8">
            <div class="product-details">
                <form action="#" id="addorder">
                    <div class="row">
                        <div id="prod-left" class="col-lg-6 col-xs-12 col-sm-6">
                            <div class="big-image">
                                <img src="{{product_image_url($produk->gambar1,'medium')}}" width="374" alt="{{$produk->nama}}" />
                                <a class="zoom fancybox" href="{{product_image_url($produk->gambar1,'medium')}}" title="{{$produk->nama}}">&nbsp;</a>
                            </div>
                            <div id="thumb-view">
                                <ul id="thumb-list" class="owl-carousel owl-theme">
                                    @if($produk->gambar2 != '')
                                    <li class="item"><a class="zoom fancybox" href="{{product_image_url($produk->gambar2,'large')}}" title="{{$produk->nama}}"><img src="{{product_image_url($produk->gambar2,'thumb')}}" width="113" height="152" alt="thumbnail 1" /></a></li>
                                    @endif
                                    @if($produk->gambar3 != '')
                                    <li class="item"><a class="zoom fancybox" href="{{product_image_url($produk->gambar3,'large')}}" title="{{$produk->nama}}"><img src="{{product_image_url($produk->gambar3,'thumb')}}" width="113" height="152" alt="thumbnail 2" /></a></li>
                                    @endif
                                    @if($produk->gambar4 != '')
                                    <li class="item"><a class="zoom fancybox" href="{{product_image_url($produk->gambar4,'large')}}" title="{{$produk->nama}}"><img src="{{product_image_url($produk->gambar4,'thumb')}}" width="113" height="152" alt="thumbnail 3" /></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div id="prod-right" class="col-lg-6 col-xs-12 col-sm-6">
                            <h2 class="name-title">{{$produk->nama}}</h2>
                            @if(!empty($produk->hargaCoret))
                            <span class="priceCoret"><del>{{price($produk->hargaCoret)}}</del></span>
                            @endif
                            <span class="price">{{price($produk->hargaJual)}}</span>
                            <div class="img-rating">{{sosialShare(product_url($produk))}}</div>
                            <div class="desc-prod">
                                <p class="title">Deskripsi Produk</p>
                                <p>{{$produk->deskripsi}}</p>
                            </div>
                            @if($produk->stok > 0)
                            <div class="avail-info"><span class="instock">Tersedia, Stok {{$produk->stok}} item</span></div>
                            @else
                            <div class="noavail-info">
                                <span class="fa-stack fa-1x">
                                    <i id="iconstocks" class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-close fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="instock">  Stok Kosong</span>
                            </div>
                            @endif
                            <div class="attribute">
                                <fieldset class="attribute_fieldset">
                                    <div class="attribute_list">
                                        <div class="size-list">
                                            <div class="form-group">
                                                @if($opsiproduk->count() > 0)
                                                <label class="col-sm-4 control-label">Opsi :</label>
                                                <div class="col-sm-5">
                                                    <div class="select-style">
                                                        <select class="form-control">
                                                            <option value="">-- Pilih Opsi --</option>
                                                            @foreach ($opsiproduk as $key => $opsi)
                                                            <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}}>{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="quantity">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Jumlah :</label>
                                                <div class="col-sm-5">
                                                    <button type="submit" class="qtyminus" field="qty" /><i class="fa fa-caret-left"></i></button>
                                                    <input type="text" name="qty" value="1" class="qty" />
                                                    <button type="button" value="+" class="qtyplus" field="qty" /><i class="fa fa-caret-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="btm-details row">
                        <div class="button-detail fr">
                            <button class="btn addtocart baddtocart btn-checkout chart" type="submit"><i class="cart"></i>Beli</button>
                        </div>
                        <div class="clr"></div>
                    </div>
                </form>
            </div>
            @if(count(other_product($produk)) > 0)
            <div id="related-product" class="product-list">
                <h2 class="title">Produk Lainnya</h2>
                <div class="row">
                    <ul class="grid">
                        @foreach(other_product($produk, 4) as $relproduk)
                         <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($relproduk)}}"><img class="img-responsive" src="{{product_image_url($relproduk->gambar1,'thumb')}}" srcset="{{product_image_url($relproduk->gambar1, 'medium')}} 768w, {{product_image_url($relproduk->gambar1, 'large')}} 1200w" alt="{{$relproduk->nama}}" title="{{$relproduk->nama}}" /></a>
                                    @if(is_outstok($relproduk))
                                    <div class="icon-info icon-sale">KOSONG</div>
                                    @elseif(is_terlaris($relproduk))
                                    <div class="icon-info icon-promo">HOT ITEM</div>
                                    @elseif(is_produkbaru($relproduk))
                                    <div class="icon-info icon-new">BARU</div>
                                    @endif
                                </div>
                                <h5 class="product-name">{{shortDescription($relproduk->nama,22)}}</h5>
                                <span class="price">{{price($relproduk->hargaJual)}}</span>
                                <a class="view btn-small" href="{{product_url($relproduk)}}">Lihat</a>
                            </div>
                         </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div id="reviews">{{ pluginComment(product_url($produk), @$produk) }}</div>
        </div>
    </div>