@extends('admin.index')

@section('title')
<title>Loại quán</title>
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
                <a href="{{route('category.index')}}" style="text-decoration:none;">
                    <h3 class="font-weight-bold text-success" style="margin: 0">
                        Loại Quán 
                    </h3>
                </a>
                <div>
                    <a href="{{ route('category.create') }}" style="text-decoration:none;">
                        <button class="btn btn-outline-success" type="button">
                            Thêm loại quán
                        </button>
                    </a>
                    <button class="btn btn-outline-danger" type="button" style="margin-left: 20px" data-toggle="modal" data-target=".modal-delete-order">
                        Xóa loại quán
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
                            <th>Chọn Loại Quán</th>
                            <th>Loại Quán</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    @foreach ($categories  as $category)
                        <tbody>
                            <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>

                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}"><button id="editMerchant" class="btn" type="button"><i class="fa fa-edit" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                            </td>

                            <td>
                                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"><button class="btn" type="submit"><i class="fa fa-trash-o" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i></button></a>
                                </form>
                            </td>

                        

                        </tbody>
                    @endforeach
                </table>
                {{ $categories->links('vendor.pagination.bootstrap-4') }}


            </div>
            <div class="row justify-content-end" style="margin-right: 0">
                <a href="/order">
                    <button class="btn btn-success" type="button">
                        Tạo Đơn
                    </button>
                </a>
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
