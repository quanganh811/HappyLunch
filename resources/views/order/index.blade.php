@extends('layout.master')

@section('title')
    <title>Đơn hàng</title>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/avatar.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

@endsection

@section('content')
    <div class="container-fluid container mt-5">
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- <a href="{{ route('transaction.index') }}" style="text-decoration:none;"> --}}
                    <h3 class="font-weight-bold text-success" style="margin: 0">
                        Đơn Chung
                    </h3>
                    {{-- </a> --}}
                    <div>
                        <form action="{{ route('item-merchant.index') }}" class="form-flex">
                            @csrf
                            <div>
                                <input type="text" name="link" value="{{ $order->link }}" hidden />
                            </div>
                            <button class="btn btn-outline-success" type="submit">
                                Đặt thêm
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="row" style="margin-left: 0">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <div>Tên Quán:</div>
                            </div>
                            <div class="col-md-10">
                                <div>
                                    <b>{{ $order->merchant->name }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div>Chủ Đơn:</div>
                            </div>
                            <div class="col-md-10">
                                <div>
                                    <b>{{ $order->user->name }}</b>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div>Phí Ship:</div>
                            </div>
                            <div class="col-md-10">
                                <div>
                                    <b>{{ number_format($order->shipping_fee, 0, ',', '.') }} </b>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <div>Link quán:</div>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input id="link-merchant" class="form-control small" readonly="readonly" type="text"
                                        value="{{ $order->merchant->link }}" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success input-group-text"
                                            onclick="myCoppy1()">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <div>Link share:</div>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input id="link-order" class="form-control small" readonly="readonly" type="text"
                                        value="{{ $order->link }}" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success input-group-text"
                                            onclick="myCoppy2()">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="table_data" role="grid" aria-describedby="dataTable_info">
                    <table class="table text-center" id="dataTable transactions">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tên thành viên</th>
                                <th>Tên món</th>
                                <th>Giá</th>
                                <th>Số lượng </th>
                                <th>Thành tiền </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr id="row_{{ $transaction->id }}">
                                    <td><img class="avatar1"
                                            src="{{ asset('uploads/user/' . $transaction->user->image) }}"
                                            alt="Skytsunami" /> </td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->item_name }}</td>
                                    <td>{{ number_format($transaction->item_price, 0, ',', '.') }} </td>
                                    <td>{{ $transaction->quantity }}</td>
                                    <td>{{ number_format($transaction->item_price * $transaction->quantity, 0, ',', '.') }}
                                    </td>
                                    <td>{{ $transaction->result }} </td>
                                    <td>
                                        @if ($order->master_id == Auth::user()->id)
                                            <form
                                                action="{{ URL::to('order/' . $order->id . '/transaction/' . $transaction->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                                    <button class="btn" type="submit">
                                                        <i class="fas fa-user-slash"
                                                            style="width: 18px;font-size: 20px;color: rgb(170, 10, 66);"></i>
                                                    </button>
                                                </a>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $transactions->links('vendor.pagination.bootstrap-4') }}

                </div>
                @if ($order->master_id == Auth::user()->id)
                    <div class="row justify-content-end" style="margin-right: 0">
                        <a href="/share/{{ $order->id }}">
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <button class="btn btn-success" type="button">
                                Tạo Đơn
                            </button>
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
    </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script>
        function myCoppy1() {
            /* Get the text field */
            var copyText1 = document.getElementById("link-merchant");
            copyText1.select();
            document.execCommand("copy");
        }

        function myCoppy2() {
            /* Get the text field */
            var copyText2 = document.getElementById("link-order");
            copyText2.select();
            document.execCommand("copy");
        }

        function toggle(source) {
            checkboxes = document.getElementsByName('foo');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
        }
    </script>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

@endsection
