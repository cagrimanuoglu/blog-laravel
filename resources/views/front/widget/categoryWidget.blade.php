
<style>

a:hover {
    color: yellow;
    text-decoration: none;
}

</style>
@isset($categories)
<div class="col-md-3">

<div class="card">
<div class="card-header">
Kategoriler
</div>
<div class="list-group">

@foreach ($categories as $category)
<li class="list-group-item  @if(Request::segment(2)==$category->slug) active @endif " >
  @if($category->status==1)
  <a href="{{route('category',$category->slug)}}"class="list-group-item">{{$category->name}} <span class="badge bg-success float-right">    {{$category->articleCount()}} </span> </a>
@endif
</li>
@endforeach



</div>
</div>
</div>
@endif
