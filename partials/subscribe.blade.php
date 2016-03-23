<div id="newsletter" class="col-xs-12 col-lg-4 col-md-12">
    <h4 class="title">Newsletter</h4>
    <div class="block-content">
        <form action="{{@$mailing->action}}" method="post" class="subscribe">
        	Jangan lewatkan update terbaru dari toko kami dengan bergabung di mailing list kami.
            <br><br>
            <p><input type="text" nama="email" placeholder="Masukkan email anda" {{ @$mailing->action==''? 'disabled=""' : ''}}></p>
            <button class="btn fr" type="submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}>Subscribe</button>
            <div class="clr"></div>
        </form>
    </div>
</div>