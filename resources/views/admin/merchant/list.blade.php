@extends('admin.index')

@section('title')
<title>Quán ăn</title>
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('frontend/css/admin.css')}}">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

@endsection

@section('content-admin')
<div class="m-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('merchant.index')}}" style="text-decoration:none;">
                    <h3 class="font-weight-bold text-success" style="margin: 0">
                        Quán Ăn
                    </h3>
                </a>
                <div>
                    <a href="{{ route('merchant.create') }}" style="text-decoration:none;">
                        <button class="btn btn-outline-success" type="button">
                            Thêm quán ăn
                        </button>
                    </a>
                    <button class="btn btn-outline-danger delete_all" type="button" style="margin-left: 20px" data-url="{{ url('mymerchantsDeleteAll') }}">
                        Xóa quán ăn
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 d-flex-start">
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
            <div class="table-responsive table mt-2" id="table_data" role="grid" aria-describedby="dataTable_info">
                <table class="table text-center" id="dataTable merchants">
                    <thead>
                        <tr>
                            <th><input type="checkbox" onClick="toggle(this)" /></th>
                            <th>Tên Quán</th>
                            <th>Loại Quán</th>
                            <th>App</th>
                            <th>Link</th>
                            <th>Món Ăn</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($merchants as $merchant)
                        <tr id="row_{{$merchant->id}}">
                            <td> <input id="form-check-input" name = "foo" type="checkbox" value="" data-id="{{$merchant->id}}" ></td>
                            <td>{{$merchant->name}}</td>
                            <td>{{$merchant->category->name}}</td>
                            <td>{{$merchant->app->name}}</td>
                            <td><input class="form-control small" type="text" value="{{$merchant->link}}" /></td>
                            <td>
                                <a href="{{ URL::to('item/' . $merchant->id . '/index')  }}"><button id="showMerchant" class="btn" type="button"><i class="fa fa-info" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                            </td>
                            <td>
                                <a href="{{ route('merchant.edit',$merchant->id) }}"><button id="editMerchant" class="btn" type="button"><i class="fa fa-edit" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                            </td>
                            <td>
                                <form action="{{ route('merchant.destroy',$merchant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"><button class="btn" type="submit"><i class="fa fa-trash-o" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $merchants->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- script xoÁ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    $(document).ready(function () {
        
        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $("#form-check-input:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
            if(allVals.length <=0)  
            {  
                alert("Hãy chọn đơn.");  
            }  else {  
                var check = confirm("Bạn có chắc muốn xoá các quán đã chọn?");  
                if(check == true){  
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                             $("#form-check-input:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {

                                alert('Có gì đó không đúng!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    })
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });
        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Có gì đó không đúng!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
            return false;
        });
    });
</script>


<script>
function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>


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

@endsection