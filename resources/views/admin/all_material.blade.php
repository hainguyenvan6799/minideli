@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê nguyên vật liệu
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php

      use Illuminate\Support\Facades\Session;

      $message = Session::get('message');
      if ($message) {
        echo '<span class="text-alert" style="width: auto;font-size: 17px;color: #D81B60;">' . $message . '</span>';
        Session::put('message', null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên nguyên vật liệu</th>
            <th>Số lượng tồn</th>
            <th>Đơn vị đo</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_material as $key => $material_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $material_pro->material_name }}</td>
            <td>{{ $material_pro->material_qty }}</td>
            <td>
              <?php
                if ($material_pro->material_unit == 0) {
                  echo 'Kg (Kilogram)';
                } elseif ($material_pro->material_unit == 1) {
                  echo 'g (gram)';
                } elseif ($material_pro->material_unit == 2) {
                  echo 'L (liter)';
                } elseif ($material_pro->material_unit == 3) {
                  echo 'ml (milliliter)';
                } elseif ($material_pro->material_unit == 4) {
                  echo 'Hộp';
                } elseif ($material_pro->material_unit == 5) {
                  echo 'chai';
                } elseif ($material_pro->material_unit == 6) {
                  echo 'trái';
                }
              ?>
            </td>
            <td><span class="text-ellipsis">
                <?php
                if ($material_pro->material_status == 0) {
                ?>
                  <a href="{{URL::to('/unactive-material',$material_pro->material_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                } else {
                ?>
                  <a href="{{URL::to('/active-material',$material_pro->material_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
                }
                ?>
              </span></td>
            <td>
              <a href="{{URL::to('/edit-material/'.$material_pro->material_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              </br>
              <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này không?')" href="{{URL::to('/delete-material/'.$material_pro->material_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection