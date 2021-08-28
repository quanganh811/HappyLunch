<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="table-responsive table mt-2" id="table_data" role="grid" aria-describedby="dataTable_info">
        <table class="table text-center" id="dataTable merchants">
            <thead>
                <tr>
                    <th>Đối tượng giao dịch</th>
                    <th>Số tiền</th>
                    <th>Trạng thái</th>
                    {{-- <th>Chi tiết</th> --}}
                    <th>Xác nhận trả nợ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions1 as $transaction)
                <tr>
                    <td>{{$transaction->name}}</td>
                    <td>{{ number_format($transaction->price, 0, ',', '.') }}đ</td>
                    <td>
                        @if($transaction->status == 1)
                            Chưa trả nợ
                        @else 
                            Đã trả nợ
                        @endif
                    </td>
                    {{-- <td><a href="/user/spend/detail"><button class="btn btn-outline-info">Chi tiết</button></a></td> --}}
                    <td>
                        @if($transaction->status == 1)
                        <form action="{{ route('spend.store') }}" method="POST">
                            @csrf
                            <input type="text" name="owner_id" value="{{$transaction->owner_id}}" hidden>
                            <input type="text" name="order_id" value="{{$transaction->order_id}}" hidden>
                            <button type="submit" data-placement="top" class="btn btn-outline-success"
                            onclick="return confirm('Bạn có chắc chắn đã nhận được tiền ?')">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transactions1->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>