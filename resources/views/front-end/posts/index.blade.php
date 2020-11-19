@extends('master.app')


@section('my-styles')
    <style>
        .color_1{
            background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            height: 2px;
        }
    </style>
@endsection


@section('title' , 'Products Page')

@section('content')


@if (Auth::user())
<div class="container card shadow my-5">
    <div id="msg" style="display: none;" class="alert alert-success text-center">
        the product added with success
    </div>
    <div class="card-title">
        <div class="float-right my-2 mx-2"><a class="btn btn-primary btn-add" data-toggle="modal" data-target="#add-new-post" onclick="return (event)" href=""><i class="fal fa-plus-circle mr-2 text-success"></i>Add New Product</a></div>
        <div class="row">
            <h1 class="text-primary">Show All Products By Ajax</h1>
        </div>

    </div>
    <div class="card-body shadow my-2 mx-2">
        <table id="contacts" class="table table-bordered table-hover my-2">
            <thead>
            <tr class="table-success">
                <th>#ID</th>
                <th>Product Name</th>
                <th>Product price</th>
                <th>Product picture</th>
                <th>Contact Created_at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
              @if($products)
                @foreach ($products as $product)
                <tr>

                        <td><span class="text-danger text center">{{$product->id}}</span></td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td class="text-center"><img src="{{$product->product_picture}}" class="img-fluid" style="width: 60px;heigth:60px;border-radius: 100%;"></td>
                        <td>{{$product->created_at->diffForHumans()}}</td>

                        <td class="text-center">
                            <div class="row p-auto text-auto">
                            <span class="text-auto ml-5">
                            <a href="{{route('product.show',$product->id)}}" class="btn btn-warning"><i class="fal fa-eye mr-1 text-primary"></i>Show</a>
                                <a data-toggle="modal" data-target="#editProduct"   class="btn btn-warning"><i class="fal fa-edit mr-1 text-success"></i>Edit</a>
                                <a href="{{route('product.destroy',$product->id)}}" class="btn btn-warning deletePost"><i class="fal fa-trash mr-1 text-danger"></i>Delete</a>
                            </span>
                            </div>
                        </td>

                </tr>
                @endforeach
              @else
               <tr class="text-danger">Oops No products here !!</tr>
              @endif
            </tbody>
        </table>
    </div>
</div>

@else
<div class="container card shadow my-5">
    <span class="my-auto mx-auto text-danger">Oops No Permession to show All Products</span>
</div>
@endif

<!-- start modal insert product ---------------------------------------------------------------------------------->
<div class="modal fade" id="add-new-post" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center text-primary" id="staticBackdropLabel"> Add New Product </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul  id="errors" class="list-unstyled my-2"></ul>
                <form id="post_form_product_data" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group">
                        <div class="row p-4">
                            <label for="product_name" class="text-danger">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="product_price" class="text-danger">Product Price</label>
                            <input type="text" name="product_price" class="form-control" id="product_price">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="product_picture" class="text-danger">Product File</label>
                            <input type="file" name="product_picture" class="form-control" id="product_picture">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="save-product" id="save-product" class="btn btn-primary" value="Save product">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- end modal insert product ------------------------------------------------------------------------------------------->


   <!-- start modal edit product ---------------------------------------------------------------------------------->
<div class="modal fade" id="editProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center text-primary" id="staticBackdropLabel"> Edit Product named <span class="aler alert-success"></span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul  id="errors" class="list-unstyled my-2"></ul>
                <form id="edit_form_product_data" enctype="multipart/form-data">
                     @csrf
                     {{ method_field('PUT') }}
                    <div class="form-group">
                        <div class="row p-4">
                            <label for="product_name" class="text-danger">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="product_price" class="text-danger">Product Price</label>
                            <input type="text" name="product_price" class="form-control" id="product_price">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="product_picture" class="text-danger">Product File</label>
                            <input type="file" name="product_picture" class="form-control" id="product_picture">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="update-product" id="update-product" class="btn btn-primary" value="Update product">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- end modal edit product ------------------------------------------------------------------------------------------->






    @endsection

@section('scripts')

<script>


$(document).ready(function(){


    /* start save new product to database */
    $('#save-product').on('click' , function(event){
        event.preventDefault();
        console.log('save contact !!');
        let formData = new FormData($('#post_form_product_data')[0]);
        $.ajax({
             type : 'POST',
             enctype : 'multipart/form-data',
             url : '{{route('product.store')}}',
             data : formData,
             processData : false,
             contentType : false,
             cache : false,
             success : function (data){
                 if (data){
                     console.log(data);
                     $('#product_name').val('');
                     $('#product_price').val('');
                     $('#product_picture').val('');
                     $('.modal').modal('hide');
                     $('.modal').on('hide.bs.modal', function(){
                        console.log('the modal finich');
                      });
                      $("#msg").css("display", "block");
                      $('#msg').val(data.msg);
                 }
             },
             error : function (err){
                  console.log(err);
             }
         })

    });
     /* end save new product to database */

      /* start edit product */
        /* $('#edit-product').on('click' , function(event){
             console.log('edit page !!');
        }); */
       /* end edit product */

});



</script>
@endsection

