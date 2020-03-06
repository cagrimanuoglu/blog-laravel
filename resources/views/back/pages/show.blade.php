@extends('back.layouts.master')
@section('title','Tüm yazılar')
@section('content')





  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Fotografı</th>
            <th>Yazı Başlığı</th>
            <th>Kategori</th>
            <th>İçeriği</th>

          </tr>
        </thead>
        <tbody>



          <tr>
            <td>
              <img src="{{$articles->image}}" width="200">
            </td>
            <td>{{$articles->title}}</td>
            <td>{{$articles->getCategory->name}}</td>
            <td>{!!$articles->content!!}</td>

          </tr>

        </tbody>
      </table>

    </div>
  </div>







@endsection
