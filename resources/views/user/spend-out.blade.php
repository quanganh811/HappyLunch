<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="table-responsive table mt-2" id="table_data" role="grid" aria-describedby="dataTable_info">
        <table class="table text-center" id="dataTable merchants">
            <thead>
                <tr>
                    <th>Đối tượng giao dịch</th>
                    <th>Số tiền</th>
                    <th>Trạng thái</th>
                    {{-- <th>Chi tiết</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($transactions2 as $transaction)
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
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transactions2->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>