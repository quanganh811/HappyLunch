@extends('admin.index')

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
                <h3 class="font-weight-bold text-success" style="margin: 0">
                    Món Ăn
                </h3>
                <div class="row">
                    <div>
                        <a href="{{ URL::to('item/' . $merchant->id . '/create') }}" style="text-decoration:none;">
                            <button class="btn btn-outline-success" type="button">
                                Thêm Món Ăn
                            </button>
                        </a>
                        <button class="btn btn-outline-danger mr-3 ml-3" type="button">
                            Xóa Món Ăn
                        </button>
                    </div>
                    <a href="{{route('merchant.index')}}">
                        <button type="submit" id="addMerchant" class="btn btn-danger">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
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
                                <input class="form-control small" type="text" value="{{$merchant->link}}" />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success input-group-text">Copy</button>
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
                <table class="table text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id="" /></th>
                            <th>Hình ảnh</th>
                            <th>Tên món</th>
                            <th>Giá món</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td><input type="checkbox" name="" id="" /></td>
                            <td>
                                <img src="{{ asset('uploads/item/'.$item->image) }}" width="70px" height="70px" alt="Image">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                <a href="{{ route('item.edit',$item->id) }}"><button id="editItem" class="btn" type="button"><i class="fa fa-edit" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                            </td>
                            <td>
                                <form action="{{ route('item.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"><button class="btn" type="submit"><i class="fa fa-trash-o" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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