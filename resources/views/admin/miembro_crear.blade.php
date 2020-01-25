
@include('../thema.header')



<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Registrar Miembro</h3>
        </div>
      </div>
      @if(session('success'))
      <div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
      <div class="clearfix">

        <div id="add-miembros"></div>
      </div>


    </div>
  </div>


@include('../thema.footer')


