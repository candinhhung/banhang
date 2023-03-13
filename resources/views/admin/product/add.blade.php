@extends('layouts.admin')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product','key'=>'Add'])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label >Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" >
                    </div>
                    <div class="form-group">
                        <label >Giá sản phẩm</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" >
                    </div>
                    <div class="form-group">
                        <label >Ảnh sản phẩm</label>
                        <input type="file" name="image_path" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >Ảnh chi tiết</label>
                        <input type="file" multiple name="image_path[]" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Chọn danh mục</label>
                      <select class="form-control select2_init" name="parent_id">
                        <option value="">Chọn danh mục</option>
                        {!!$htmlOption!!}
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Nhập tag cho sản phẩm</label>
                        <select class="form-control tags_select_choose" multiple="multiple">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Nội dung</label>
                        <textarea class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>\
<script>
    $(function(){
        $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
    $(".select2_init").select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    })
    })
</script>
@endsection
