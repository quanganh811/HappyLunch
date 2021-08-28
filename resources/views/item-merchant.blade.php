@extends('layout.master')

@section('title')
<title>Quán ăn</title>
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

@endsection

@section('content')
<div class="m-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="row" style="margin-left: 0">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2">
                            <div>Tên Quán:</div>
                            <div>App:</div>
                            <div>Link quán:</div>
                        </div>
                        <div class="col-md-10">
                            <div><b>{{$merchant->name}}</b></div>
                            <div><b>{{$merchant->app->name}}</b></div>
                            <div class="input-group">
                                <input id="link-merchant" class="form-control small" type="text" value="{{$merchant->link}}" readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success input-group-text" onclick="myCoppy()">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-content-center align-items-end">
                    <form action="">
                        <div class="text-md-right dataTables_filter" id="dataTable_filter">
                            <label>
                                <div class="d-flex">
                                    <input name="search" id="search" class="form-control" placeholder="Search" />
                                    <button class="btn btn-success" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <form action="{{route ('item-merchant.store') }}" method="post">
                    @csrf
                    <table class="table text-center" id="dataTable">
                        <thead>
                            <tr>
                                <th>Lựa chọn</th>
                                <th>Hình Ảnh</th>
                                <th>Tên món</th>
                                <th>Giá món</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <input name="order_id" value="{{$order->id}}" hidden>
                            @foreach($items as $item)
                            <tr>
                                <td width="20%"><input id="form-check-input" class="checkbox_check" name="id[]" type="checkbox" value="{{$item->id}}" onclick="findTotal()" /></td>
                                <td>
                                    <img src="{{ asset('uploads/item/'.$item->image) }}" width="70px" height="70px" alt="Image">
                                </td>
                                </td>
                                <td width="25%"><input type="text" name="item_name[{{$item->id}}]" id="{{$item->name}}" value="{{$item->name}}" hidden class="ten-mon">{{$item->name}}</td>
                                <td width="25%"><input type="text" name="item_price[{{$item->id}}]" value="{{$item->price}}" hidden class="gia-mon">{{$item->price}}</td>
                                <input name="item_id" value="{{$item->id}}" hidden>
                                <td>
                                    <div class="input-group mx-auto" style="width:130px">
                                        <input type="button" class="btn btn-outline-danger btn-sm btn-number" value="-" id="minus-button" for="quantity[{{$item->id}}]">
                                        <input type="text" id="quantity" name="quantity[{{$item->id}}]" type="text" onblur="findTotal()" class="form-control form-control-sm text-center input-number" value="0" min="0" max="100">
                                        <input type="button" class="btn btn-outline-success btn-sm btn-number" value="+" id="plus-button" for="quantity[{{$item->id}}]">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $items->links('vendor.pagination.bootstrap-4') }}
                    <div class="modal-footer">
                        <div>
                            <h5>Tổng: </h5>
                        </div>
                        <input class="form-control" type="text" name="total" id="total" style="width:150px" />
                        <div>VNĐ</div>
                        <button type="submit" id="btn1" class="btn btn-success">
                            Xác nhận
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Script sum -->
<script type="text/javascript">
    function myCoppy() {
        /* Get the text field */
        var copyText = document.getElementById("link-merchant");
        copyText.select();
        document.execCommand("copy");
    }

    function findTotal() {
        var arr = document.getElementsByClassName('form-control form-control-sm text-center input-number');
        var price = document.getElementsByClassName('gia-mon');
        var sum = 0;
        for (var i = 0; i < arr.length; i++) {
            var i = 0;
            $('input[type=checkbox]').each(function() {
                if (this.checked) {
                    sum += parseInt(arr[i].value) * parseInt(price[i].value);
                }
                i++;
            });
        }
        document.getElementById('total').value = sum;
    }
    let plus_btns = document.querySelectorAll('#plus-button');
    let minus_btns = document.querySelectorAll('#minus-button');
    let qty_inputs = document.querySelectorAll('#quantity');

    plus_btns.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.previousElementSibling.value++;
            findTotal()
        })
    })
    minus_btns.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.nextElementSibling.value = (btn.nextElementSibling.value == 0) ? 0 : btn.nextElementSibling.value - 1;
            findTotal()
        })
    })

    // Script alert
    var arr = document.getElementsByClassName('form-control form-control-sm text-center input-number');
    var str = "Có ";
    var val = document.getElementsByClassName('ten-mon')
    $(document).ready(function() {
        $("#btn1").click(function() {
            var i = 0;
            var checkItem = false;
            $('input[type=checkbox]').each(function() {
                if (this.checked) {
                    str += " " + arr[i].value + " " + val[i].id;
                    if (arr[i].value != 0) checkItem = true;
                }
                i += 1;
            });
            alert(str);
            if (checkItem == false) {
                alert("Bạn chưa chọn món nào")
            } else {
                alert(str);
            }
        });

    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/bs-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="{{asset('assets/js/item-merchant.js')}}"></script>
@endsection