@extends('layouts.admin')

@section('style')
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')
    

    <div class="page-wrapper" style="display:block">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9">
                @if(session('status'))
                    <div class="alert alert-success mt-3">
                    {{ session('status') }}
                    </div>
                    @endif
                    @if(count($errors))
                    <div class="alert alert-danger mt-3">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                </div>
                <div class="col-3 align-self-center">
                    <div class="customize-input float-right">
                        <a href="{{ route('admin_products_new') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Новый товар</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="product" class="table table-striped table-bordered display no-wrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Код</td>
                                            <td>Наименование</td>
                                            <td>Цена</td>
                                            <td>Brand</td>
                                            <td></td>
                                            <td></td>
                                            <td>Наличие</td>
                                            <td>Новые</td>
                                            <td>Рекомендации</td>
                                            <td>Отображение</td>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $prod)
                                        <tr>
                                            <td>{{ $prod->id }}</td>
                                            <td>{{ $prod->code }}</td>
                                            <td>{{ $prod->name_tk }}</td>
                                            <td>{{ number_format($prod->price,2,'.','') }}</td>
                                            
                                            <td>{{ $prod->brand }}</td>
                                            <td align="center"><img src="{{ asset('images/products/little/'.json_decode($prod->img)->main) }}" height="100" alt=""></td>
                                            <td align="center">
                                                <a href="{{ route('admin_products_detailed',['id'=>$prod->id]) }}" title="Детально"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin_products_edit',['id'=>$prod->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin_products_edit',['id'=>$prod->id]) }}" class="delete-product-form" method="post" enctype="multipart/form-data" style="display:inline-block">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="bg-transparent border-0 p-0" title="Удалить" onclick="confirm('Are you sure you want to delete this product?') ? this.parentElement.submit() : ''">
                                                        
                                                        <a href="#"><i class="far fa-times-circle delete-button">
                                                        </i></a>
                                                    </button>
                                                </form>
                                            </td>
                                            <td align="center">
                                               
                                                   <input type="checkbox" id="availability" name="availability" @if($prod->availability)checked  @endif onchange="availability_product('{{ route('admin_change',['id'=>$prod->id]) }}')">
                                                
                                            </td>
                                            <td align="center">
                                              
                                                   <input type="checkbox" id="new" name="new" @if($prod->new)checked @endif onchange="n_product('{{ route('admin_change',['id'=>$prod->id]) }}')">
                                              
                                            </td>
                                            <td align="center">
                                               
                                                   <input type="checkbox" id="recommended" name="recommended" @if($prod->recommended)checked @endif onchange="rec_product('{{ route('admin_change',['id'=>$prod->id]) }}')">
                                              
                                            </td>
                                            <td align="center">
                                              
                                                   
                                                   
                                                   <input type="checkbox" id="status" name="status" @if($prod->status)checked @endif onchange="show_product('{{ route('admin_change',['id'=>$prod->id]) }}')">
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <td>#</td>
                                            <td>Код</td>
                                            <td>Наименование</td>
                                            <td>Цена</td>
                                           <td>Brand</td>
                                            <td></td>
                                            <td></td>
                                            <td>Наличие</td>
                                            <td>Новые</td>
                                            <td>Рекомендации</td>
                                            <td>Отображение</td>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('inc.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#product').DataTable({
                "order": [
                    [0, "desc"]
                ],
                stateSave: true,
                "pageLength": 100
            });
        })
    </script>
    <script type="text/javascript">
        var token = $('input[name="_token"]').val();
        var x = document.getElementById("availability");
        var currentVal = x.value;
        var new_value = document.getElementById("new");
        var new_currentVal = new_value.value;
        var recommended_value = document.getElementById("recommended");
        var recommended_currentVal = recommended_value.value;
        var status_value = document.getElementById("status");
        var status_currentVal = status_value.value;


        function show_product(url){
          $.ajax({
           url: url,
           method:"POST",
           data:{status:status_currentVal, _token:token},
           success:function(data)
           {
            alert('Продукт изменен');
           }
          })
         }

         function availability_product(url){
          $.ajax({
           url: url,
           method:"POST",
           data:{availability:currentVal, _token:token},
           success:function(data)
           {
            alert('Продукт изменен');
           }
          })
         }

         function n_product(url){
          $.ajax({
           url: url,
           method:"POST",
           data:{new:new_currentVal, _token:token},
           success:function(data)
           {
            alert('Продукт изменен');
           }
          })
         }

         function rec_product(url){
          $.ajax({
           url: url,
           method:"POST",
           data:{recommended:recommended_currentVal, _token:token},
           success:function(data)
           {
            alert('Продукт изменен');
           }
          })
         }
    </script>
@endsection