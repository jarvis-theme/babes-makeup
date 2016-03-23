    <div class="inner-column row padd">
        <div id="center_column" class="inner-bg col-lg-12 col-xs-12">
            <div class="col-lg-5 col-lg-offset-3">
                <h2 class="title">Lupa Password</h2>
                <hr>
                <p>Sebuah link untuk me-resset password akan dikirimkan ke email Anda. Harap periksa kembali email yang anda gunakan.</p>
                <form class="form-horizontal forget" action="{{url('member/forgetpassword')}}" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control lp" placeholder="Email anda" name="recoveryEmail" required>
                        <span class="input-group-btn btnlp">
                            <button class="btn btn-danger" type="submit">Kirim</button>
                        </span>
                    </div>
                </form>
                <hr>
                <p><small>Belum memiliki akun <b>Example Store</b>? <a href="http://example.jstore.test/member/create">Daftar sekarang</a> untuk mendapatkan banyak keuntungan.</small></p>
            </div>
        </div>
    </div>