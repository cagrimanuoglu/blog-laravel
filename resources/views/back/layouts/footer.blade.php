<!-- End of Main Content -->

<!-- Footer -->

      </div>
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Blog sitesi admin {{date('Y')}}</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Çıkış yapmak istediğinden emin misin?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
    <a class="btn btn-primary" href="{{route('admin.logout')}}">Çıkış yap</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->





<script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('back/')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('back/')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('back/')}}/js/demo/chart-pie-demo.js"></script>


<script src="{{asset('back/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="{{asset('back/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>

 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@toastr_js
@toastr_render


<script>


$(function() {
$('.switch').change(function() {

id=$(this)[0].getAttribute('data');
statu=$(this).prop('checked');
$.get("{{route('switch')}}",{id:id,statu:statu},function(data,status){

  console.log(data);
});



})
})



</script>

<script>

$(function() {

  $('.remove-click').click(function()
{
id=$(this)[0].getAttribute('category-id');
count=$(this)[0].getAttribute('category-count');
name=$(this)[0].getAttribute('category-name');

if(id==10)
{
    $('#articleAlert').html( name+' kategorisi silinemez');
    $('#body').show();
    $('#deleteButton').hide();
    $('#deleteModal').modal();
    return;
}

$('#deleteId').val(id);
  $('#articleAlert').html('');
  $('#deleteButton').show();
  $('#body').hide();
if(count>0)
{
  $('#body').show();
  $('#articleAlert').html('bu kategoriye ait '+count+' yazı bulunmaktadır. Silmek istediğine emin misiniz?');
}
$('#deleteModal').modal();

});

  $('.edit-click').click(function()
{
id=$(this)[0].getAttribute('category-id');

  $.ajax({
    type:'GET',
    url:'{{route('category.getdata')}}',
    data:{id:id},
    success:function(data){
      console.log(data);


      $('#category').val(data.name);
      $('#slug').val(data.slug);
      $('#category_id').val(data.id);
        $('#editModal').modal();

    }
  });



});



$('.switch2').change(function() {

id=$(this)[0].getAttribute('category-data');
statu=$(this).prop('checked');
$.get("{{route('category.switch')}}",{id:id,statu:statu},function(data,status){


  console.log(data);
});



})

$('.switch-page').change(function() {

id=$(this)[0].getAttribute('data');
statu=$(this).prop('checked');
$.get("{{route('page.switch')}}",{id:id,statu:statu},function(data,status){


  console.log(data);
});



})




})



</script>




</body>

</html>
