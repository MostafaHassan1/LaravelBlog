@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Success</h4>
<p> {{ session()->get('success')}}</p>
  <p class="mb-0"></p>
</div>
@endif
@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Errors:</h4>
  <ul>
  @foreach ($errors->all() as $error)
    <li>
      {{$error}}
    </li>
  @endforeach
</ul>
</div>
    
@endif