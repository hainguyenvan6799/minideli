@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                <?php

                use Illuminate\Support\Facades\Session;
                use Illuminate\Support\Facades\Crypt;

                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert" style="width: auto;font-size: 17px;color: #D81B60;">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="position-center">
                    @foreach($edit_product as $key => $pro)
                    <?php
                    $encrypted = Crypt::encryptString((string)$pro->product_id);
                    ?>
                    <form role="form" action="{{URL::to('/update-product/'.$encrypted)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Lỗi!</strong> Kiểm tra lại thông tin đã nhập!.
                            <br />
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                            @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                            @error('product_price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="product_desc" id="pro2">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="product_content" id="pro3">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                <option></option>
                                @foreach($cate_product as $key => $cate)
                                @if($cate->category_id == $pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="{{$pro->product_status}}">
                                    <?php
                                    if ($pro->product_status == 1) {
                                        echo 'Ẩn';
                                    } else {
                                        echo 'Hiển thị';
                                    }
                                    ?>
                                </option>
                                <option value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>

    @endsection