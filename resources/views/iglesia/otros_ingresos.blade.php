@include('thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3></h3>
        </div>


      </div>

      <div class="clearfix">
        <div class="row">
        <div class="col-sm-4 col-md-4">
             <form action="">
                 <div class="form-group row">
                     <label for="ingreso">Valor del Ingreso</label>
                     <input type="text" name="valor" required class="form-control" id="ingreso">
                 </div>
                 <div class="form-group row">
                    <label for="ingreso">Descripcion</label>
                    <textarea name="" id="" required class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group row">
                  <input type="submit" class="btn btn-primary form-control" >
                </div>
             </form>
        </div>
      </div>
    </div>


    </div>
  </div>


@include('thema.footer')

<script>
$('#ingreso').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
</script>
</body>
</html>
