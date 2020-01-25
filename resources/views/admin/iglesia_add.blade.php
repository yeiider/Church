
@include('../thema.header')



<div id="url" data-url="{{route('get-pastores')}}"></div>
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Registrar Iglesias</h3>
        </div>


      </div>

@if(session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>

@endif
@if(session('duplicado'))
<div class="alert alert-danger" role="alert">{{session('duplicado')}}</div>
@endif
      <div class="clearfix">
        <div id="add-iglesia"></div>
      </div>

    </div>
  </div>

@include('../thema.footer')


