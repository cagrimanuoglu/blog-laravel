@extends('front.layouts.master')

@section('title','iletişim')
@section('bg','https://blackrockdigital.github.io/startbootstrap-clean-blog/img/contact-bg.jpg')


@section('content')


  <div class="col-lg-8">

    @if(session('success'))
      <div class="alert alert-success">

        {{session('success')}}
      </div>
    @endif

    @if($errors->any())

      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>

      </div>

    @endif


    <p>Bizimle iletişime geçebilirsiniz</p>
    <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
    <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
    <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
    <form method="post" action="{{route('contact.post')}}">
      @csrf
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Ad Soyad</label>
          <input type="text" class="form-control" value="{{old('name')}}" placeholder="Adınız Soyadınız" name="name" required >
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Email Addresi</label>
          <input type="email" class="form-control" value="{{old('email')}}" placeholder="Email Addresiniz" name="email" required >
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12  controls">
          <label>Konu</label>
      <select class="form-control" name="topic">

        <option> Bilgi </option>
        <option> İstek  </option>
        <option> Genel </option>

       </select>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group  controls">
          <label>Mesajınız</label>
          <textarea rows="5" class="form-control" placeholder="Mesajınız" name="message"  required data-validation-required-message="Please enter a message."></textarea>

        </div>
      </div>
      <br>
      <div id="success"></div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Göder</button>
      </div>
    </form>
  </div>
<div class="col-md-4">
  <div class="card card-default">
<div class="card-body">İletişim bilgileri</div>
Adres:asdasdsd
</div>
</div>


@endsection
