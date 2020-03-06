@extends('back.layouts.master')
@section('title',$article->title.' yazısını güncelle')
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      @if($errors->any())

          <div class="alert alert-danger">

            @foreach ($errors->all() as $error)

                <li>{{$error}}</li>
            @endforeach

           </div>

      @endif
      <form method="post" action="{{route('yazilar.update',$article->id)}}"enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label> Yazı Başlığı </label>
          <input type="text" class="form-control" required value="{{$article->title}}"  name="title"> </input>
        </div>
        <div class="form-group">
          <label> Yazı kategori </label>
          <select class="form-control" name="category" required>
            <option value=""> Seçim yapınız  </option>
            @foreach ( $categories as $category)
              <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
           </select>
        </div>
        <div class="form-group">
          <label> Yazı Fotoğrafı </label>
          <img src="{{asset($article->image)}}" class="rounded" />
          <input type="file" class="form-control"   name="image"> </input>
        </div>
        <div class="form-group">
           <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
          <label> Yazı İçeriği </label>
          <textarea id="icerik" name="content"> {!!$article->content!!}  </textarea>
          <script>
              CKEDITOR.replace( 'icerik');
          </script>
        </div>
        <div class="form-group">
          <label> Yazı Başlığı </label>
          <button type="submit" class="btn btn-primary btn-block"> Yazıyı güncelle </button>
        </div>
      </form>



    </div>
  </div>

@endsection
