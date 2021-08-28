@extends('user.layout')

@section('title-user')
<title>Lịch sử đặt hàng</title>

@endsection

@section('content-user')
    <div class="card shadow">
        <div class="card-header py-3 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('merchant.index')}}" style="text-decoration:none;">
                    <h3 class="font-weight-bold text-success" style="margin: 0">
                        Lịch sử đặt hàng
                    </h3>
                </a>
            </div>
        </div>
        @foreach($orders as $order)
            <div class="osahan-account-page-right shadow-sm bg-white px-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <div class="gold-members p-4">
                                <div class="media">
                                    <div class="media-body">
                                        <i class="float-right text-info">{{$order->updated_at}}</i>
                                        
                                        <h4 class="mb-2">
                                            <div class="text-success">{{$order->merchant->name}}</div>
                                        </h4>
                                        <div class=""> Master: {{$order->user->name}}</div>
                                        <div class="row py-1">
                                            <div class="col-5"> Loại app: {{$order->merchant->app->name}}</div>
                                            <div class="col-7"> Trạng thái: 
                                                @if($order->status == 0)
                                                Chưa đăt hàng
                                                @else
                                                Đã đăt hàng
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row py-1">
                                            <i class="col-5">
                                                <span class="font-weight-bold"> Phí ship:</span> 
                                                {{ number_format($order->shipping_fee, 0, ',', '.') }}đ
                                            </i>
                                            <h6 class="text-success col-7"><span class="font-weight-bold"> Tổng tiền:</span>
                                                <?php $sum_tot_Price = $order->shipping_fee ?>
                                                @foreach($transactions as $transaction1)
                                                    @if($transaction1->item_id != 0 && $transaction1->order_id == $order->id)
                                                        <?php $sum_tot_Price += $transaction1->quantity * $transaction1->item_price?>
                                                    @endif
                                                @endforeach
                                                {{ number_format($sum_tot_Price, 0, ',', '.') }}đ
                                            </h6>
                                        </div>
                                        <div class="collapse" id="kim{{$order->id}}">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                <th scope="col">Người đặt</th>
                                                <th scope="col">Món ăn</th>
                                                <th scope="col">Giá tiền</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions as $transaction2)
                                                @if($transaction2->item_id != 0 && $transaction2->order_id = $order->id)
                                                <tr>
                                                    <td>{{ $transaction2->user->name }}</td>
                                                    <td>{{ $transaction2->item_name }}</td>
                                                    <td>{{ number_format($transaction2->item_price, 0, ',', '.') }}đ</td>
                                                    <td>{{ $transaction2->quantity }}</td>
                                                    <td>{{ number_format($transaction2->quantity * $transaction2->item_price, 0, ',', '.') }}đ</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                        <div class="text-center">
                                            <a class="btn btn-primary-outline" data-toggle="collapse" href="#kim{{$order->id}}" role="button" aria-expanded="false" aria-controls="kim{{$order->id}}">
                                                {{-- <i id="icon" class="fas fa-angle-double-down"></i> --}}
                                                <i>xem thêm</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $orders->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $('#togglebutton').on('click', function(e) {
        // $(".fas fa-angle-double-down").toggleClass("fas fa-angle-double-up");
        $(".fas fa-angle-double-down").toggle(display);
    });
})
</script>
@endsection
