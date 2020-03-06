@extends('back.layouts.master')
@section('title','Tüm kategoriler')
@section('content')

<div class="row">

<div class="col-md-4">

  <div class="card shadow mb-4">
  <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori oluştur</h6>
  </div>
    <div class="card-body">
     <form method="post" action="{{route('category.create')}}">
       @csrf
       <div class="form-group">
         <label> Kategori Adı </label>
         <input type="text" class="form-control" name="category" required  />
       </div>
       <div class="form-group">
         <button type="submit" class="btn btn-primary btn-block "> Ekle </button>
       </div>
     </form>
    </div>
  </div>

</div>



<div class="col-md-8">

  <div class="card shadow mb-4">
  <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Tüm Kategoriler</h6>
  </div>
    <div class="card-body">


      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kategori Adı</th>
              <th>Yazı Sayısı</th>
              <th>Durum</th>

              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($categories as $category)


            <tr>

              <td>{{$category->name}}</td>
              <td>{{$category->articleCount()}}</td>

              <td><input class="switch2" category-data="{{$category->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-offstyle="danger" @if($category->status==1) checked @endif  data-toggle="toggle"></td>
              <td>
                <a category-id={{$category->id}} class="btn btn-sm btn-primary edit-click" title="Kategoriyi Düzenle"> <i class="fa fa-edit text-white"></i>    </a>
                <a category-id={{$category->id}} category-name={{$category->name}} category-count={{$category->articleCount()}} class="btn btn-sm btn-danger remove-click" title="Kategoriyi Sil"> <i class="fa fa-times text-white"></i>    </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>







    </div>
  </div>

</div>



</div>



<!-- The Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kategoriyi Düzenle</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{route('category.update')}}">
          @csrf
          <div class="form-group">
            <label> Kategori Adı </label>
            <input id="category" type="text" class="form-control" name="category"  />
            <input  type="hidden" name="id" id="category_id"   />
          </div>
          <div class="form-group">
            <label> Kategori Slug </label>
            <input id="slug" type="text" class="form-control" name="slug"  />
          </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-success" >Kaydet</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kategoriyi Sil</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div id="body" class="modal-body">
        <div class="alert alert-danger" id="articleAlert">
        </div>
      </div>


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        <form method="post" action="{{route('category.delete')}}">
          @csrf
          <input type="hidden" name="id" id="deleteId"/>

        <button id="deleteButton" type="submit" class="btn btn-success" >Sil</button>
        </form>
      </div>
  </form>
    </div>
  </div>
</div>

@endsection
