@extends('front.layouts.master')

@section('title',$category->name)


@section('content')

      <div class="col-lg-8 col-md-10 mx-auto">
@if(count($articles)>0)
          @foreach ($articles as $article)
              @if($article->status==1)
        <div class="post-preview">
          <a href="{{route('single',[$article->getCategory->slug,$article->string])}}">



            <h2 class="post-title">

                {{$article->title}}


            </h2>
            <h3 class="post-subtitle">

                {!!$article->content!!}


            </h3>
          </a>
          <p class="post-meta"> Kategori :
            <a href="#">{{$article->getcategory->name}}</a>
            <a class="float-right">{{$article->created_at->diffForHumans()}}</a></p>
        </div>
        @if(!$loop->last) <!-- en sona iki tane hr eklemesın dıye -->
        <hr>
        @endif
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>

        </div>
      @endif
          @endforeach
        @else
          <div class="alert alert-danger"> <h1> Bu kategoriye ait yazı bulunamadı </h1> </div>
              @endif

      </div>
@include('front.widget.categoryWidget')

@endsection
