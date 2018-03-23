@if ($errors->any()) 
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button> Oh snap! {{ $error }}
    </div>
  @endforeach
@endif 

@if(session('successMsg'))
<div class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button> Well done! {{ session('successMsg') }}
</div>
@endif