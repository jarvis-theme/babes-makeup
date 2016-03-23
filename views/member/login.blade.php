    <div class="inner-column row padd">
        <div class="inner-bg col-lg-12 col-xs-12">
            <div class="login-page">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-lg-offset-3">
                        <div class="login-wrap">
                            <h2 class="title">Login Member</h2>
                            <hr>
                            <form action="{{url('member/login')}}" method="post" enctype="multipart/form-data">
                                <div class="content-login">
                                    <b>*Email</b><br>
                                    <input type="text" placeholder="Email" name="email" class="form-control" value="{{Input::old('email')}}" required><br>
                                    <b>*Password</b><br>
                                    <input type="password" placeholder="Password" name="password" class="form-control" required><br>
                                    <small><a href="{{url('member/forget-password')}}" class="forgot">Lupa Password?</a></small><br><br>
                                    <input type="submit" value="Login" class="btn btn-info">
                                </div>
                            </form>
                            <hr>
                            <p><small>Belum memiliki akun <b>{{Theme::place('title')}}</b>? <a href="{{url('member/create')}}">Daftar sekarang</a> untuk mendapatkan banyak keuntungan.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>