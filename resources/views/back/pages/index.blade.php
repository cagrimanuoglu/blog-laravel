@extends('back.layouts.master')
@section('title','Tüm sayfalar')
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><strong> {{$pages->count()}} sayfa bulundu </strong></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Fotografı</th>
              <th>Yazı Başlığı</th>
              <th>Durum</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($pages as $page)


            <tr>
              <td>
                <img src="{{$page->image}}" width="200">
              </td>
              <td>{{$page->title}}</td>
              <td><input class="switch-page" data="{{$page->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-offstyle="danger" @if($page->status==1) checked @endif  data-toggle="toggle"></td>
              <td>
                <a href="{{route('page',$page->slug)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"> </i> </a>
                <a href="{{route('page.edit',$page->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"> </i>  </a>
                <a  href="{{route('page.delete',$page->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"> </i>  </a>


              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>



@endsection
