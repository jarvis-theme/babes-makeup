<div class="inner-column row padd">
    <div id="center_column" class="inner-bg col-xs-12 col-lg-12">
        <div class="col-xs-12 col-sm-8 col-lg-9">
            <h2>Forget Password</h2><br>
            {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2">Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" placeholder="Password Baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2">Konfirmasi Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                </div>
            {{Form::close()}}
            <br>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3 pull-left">
            <div id="advertising" class="block">
                @foreach(vertical_banner() as $banner)
                <div class="img-block">
                    <a href="{{url($banner->url)}}">
                        {{HTML::image(banner_image_url($banner->gambar),'Info Banner',array('class'=>'img-responsive'))}}
                    </a>
                </div>
                @endforeach
            </div>
            <br>
        </div>
    </div>
</div>