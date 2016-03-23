    <div class="inner-column row padd">
        <div id="center_column" class="inner-bg col-lg-12 col-xs-12">
            <h2 class="title"><i class="fa fa-shopping-cart"></i> Detail Order</h2>
            <hr />
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><span>Kode Order</span></th>
                            <th><span>Tanggal Order</span></th>
                            <th><span>Detail Order</span></th>
                            <th><span>Jumlah</span></th>
                            <th><span>No. Resi</span></th>
                            <th><span>Status</span></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ prefixOrder().$order->kodeOrder }}</td>
                            <td>{{ waktu($order->tanggalOrder) }}</td>
                            <td>
                                <ul>
                                    @foreach ($order->detailorder as $detail)
                                    <li class="items">{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="quantity">{{ price($order->total) }}</td>
                            <td class="quantity">
                                {{($order->status==2 || $order->status==3) ? price(0) : ' - '.price($order->total)}}
                            </td>
                            <td class="sub-price">{{ $order->noResi}}</td>
                            <td class="total-price">
                                @if($order->status==0)
                                <span class="label label-warning">Pending</span>
                                @elseif($order->status==1)
                                <span class="label label-danger">Konfirmasi diterima</span>
                                @elseif($order->status==2)
                                <span class="label label-success">Pembayaran diterima</span>
                                @elseif($order->status==3)
                                <span class="label label-info">Terkirim</span>
                                @elseif($order->status==4)
                                <span class="label label-default">Batal</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                @if($order->jenisPembayaran == 1 && $order->status == 0)
                    <h2 class="title center">Konfirmasi Pembayaran</h2>
                    <hr>
                    {{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put'))}}                            
                        <div class="form-group">
                            <label  class="control-label"> Nama Pengirim:</label>
                            <input type="text" class="form-control" placeholder="Nama Pengirim" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"> No Rekening:</label>
                            <input type="text" class="form-control" placeholder="No Rekening" name="noRekPengirim" required>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"> Rekening Tujuan:</label>
                            <select name="bank" class="form-control">
                                <option value="">-- Pilih Bank Tujuan --</option>
                                @foreach (list_banks() as $bank)
                                <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"> Jumlah:</label>
                            <input type="text" class="form-control" placeholder="Jumlah Transfer Dana" name="jumlah" value="{{$order->status==0 ? $order->total : ''}}" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Konfirmasi</button>
                    {{Form::close()}}
                @endif
                </div>
            </div>
            <br>
            @if($paymentinfo!=null)
            <h3><center>Paypal Payment Details</center></h3><br>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr><td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td></tr>
                    <tr><td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td></tr>
                    <tr><td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td></tr>
                    <tr><td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td></tr>
                    <tr><td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td></tr>
                    <tr><td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td></tr>
                    <tr><td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td></tr>
                </table>
            </div>
            <p>Thanks you for your order.</p><br>
            @endif 
      
            @if($order->jenisPembayaran==2)
                <h3><center>Konfirmasi Pemabayaran Via Paypal</center></h3><br>
                <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
                {{$paypalbutton}}
                <br>
            @elseif($order->jenisPembayaran==6)
                @if($order->status == 0)
                <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
                <p>Silahkan melakukan pembayaran dengan bitcoin Anda secara online via bitcoin payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum <b>{{$expired_bitcoin}}</b>. Klik tombol "Pay with Bitcoin" di bawah untuk melanjutkan proses pembayaran.</p>
                {{$bitcoinbutton}}
                <br>
                @else
                <h3><center>Konfirmasi Pembayaran Via Bitcoin</center></h3><br>
                <p><center><b>Batas waktu pembayaran bicoin anda telah habis.</b></center></p>
                @endif
            @endif
        </div>
    </div>
    <div class="clear"></div>