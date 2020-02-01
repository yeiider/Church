 @include('../thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Registrar Distrito</h3>
        </div>


      </div>

      <div class="clearfix">
          @if(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
          @endif
        <div id="distrito"></div>
      </div>
       </div>
  </div>

    @include('../thema.footer')
</body>
</html>
