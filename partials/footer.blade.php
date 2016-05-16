<footer>
    <div class="top-footer">
        <div class="row">
            <div id="about-foot" class="col-xs-12 col-lg-4">
                <h4 class="title">Tentang Kami</h4>
                <div class="block-content">
                    <p>{{short_description(about_us()->isi,400)}} </p>
                </div>
            </div>
            @foreach(all_menu() as $key=>$menu)
              @if($key == '1')
                <div id="links-foot" class="col-xs-12 col-lg-2">
                    <h4 class="title">{{$menu->nama}}</h4>
                    <div class="block-content">
                        <ul>
                        @foreach($menu->link as $link_menu)
                            @if($menu->id == $link_menu->tautanId)
                            <li><a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a></li>
                            @endif
                        @endforeach
                            <li><a href="{{ url('konfirmasiorder') }}">Konfirmasi Pembayaran</a></li>
                        </ul>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="col-xs-12 col-lg-2">
                <h4 class="title">Ikuti Kami</h4>
                <div class="block-content">
                    <ul>
                        @if(!empty($kontak->fb))
                        <li>
                            <a href="{{url($kontak->fb)}}" id="fb" title="Facebook">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(!empty($kontak->tw))
                        <li>
                            <a href="{{url($kontak->tw)}}" id="tw" title="Twitter">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(!empty($kontak->gp))
                        <li>
                            <a href="{{url($kontak->gp)}}" id="gp" title="Google+">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(!empty($kontak->pt))
                        <li>
                            <a href="{{url($kontak->pt)}}" id="pt" title="Pinterest">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pinterest-p fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(!empty($kontak->tl))
                        <li>
                            <a href="{{url($kontak->tl)}}" id="tl" title="Tumblr">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-tumblr fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(!empty($kontak->ig))
                        <li>
                            <a href="{{url($kontak->ig)}}" id="ig" title="Instagram">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(!empty($kontak->ym))
                        <li>
                            {{ymyahoo($kontak->ym)}}
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            {{ Theme::partial('subscribe') }}   
        </div>
        <div class="row">
            <div class="bank-logo col-sm-12">
                @if(list_banks()->count() > 0)
                    @foreach(list_banks() as $value)
                    <img src="{{bank_logo($value)}}" class="img-responsive" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}">
                    @endforeach
                @endif
                @if(count(list_payments()) > 0)
                    @foreach(list_payments() as $pay)
                        @if($pay->nama == 'paypal' && $pay->aktif == 1)
                        <img class="img-responsive" src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Paypal" />
                        @endif
                        @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                        <img class="img-responsive" src="{{url('img/bank/ipaymu.jpg')}}" alt="Ipaymu" title="Ipaymu" />
                        @endif
                        @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                        <img class="img-responsive" src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Bitcoin" />
                        @endif
                    @endforeach
                @endif
                @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                <img class="img-responsive" src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Doku" />
                @endif
                @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1)
                <img class="img-responsive" src="{{url('img/bank/veritrans.png')}}" alt="Veritrans" title="Veritrans">
                @endif
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>  &copy; {{ short_description(Theme::place('title'),80) }} {{date('Y')}} All Right Reserved. Powered by <a class="title-copyright" href="http://jarvis-store.com" target="_blank"> Jarvis Store</a></p>
    </div>
</footer>
{{pluginPowerup()}}