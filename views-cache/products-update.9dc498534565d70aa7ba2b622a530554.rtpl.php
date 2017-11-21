<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Obras
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Obra</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/products/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="artista">Nome do artista</label>
              <input type="text" class="form-control" id="artista" name="artista" placeholder="{Digite o nome do artista}" value="<?php echo htmlspecialchars( $product["artista"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desproduct">Descrição</label>
              <input type="text" class="form-control" id="desproduct" name="desproduct" placeholder="{Digite o nome do Obra}" value="<?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="comprado">Preço de Mercado</label>
              <input type="number" class="form-control" id="comprado" name="comprado" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $product["comprado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="mercado">Preço Comprado</label>
              <input type="number" class="form-control" id="mercado" name="mercado" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $product["mercado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="tamanho">Tamanho</label>
              <input type="text" class="form-control" id="tamanho" name="tamanho" step="00x00" placeholder="00x00" value="<?php echo htmlspecialchars( $product["tamanho"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="observacao">Observação</label>
              <input type="text" class="form-control" id="observacao" name="observacao" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $product["observacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="situacao">Situação</label>
              <input type="text" class="form-control" id="situacao" name="situacao" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $product["situacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="tecnica">tecnica</label>
              <input type="text" class="form-control" id="tecnica" name="tecnica" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $product["tecnica"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          
            
            <div class="form-group">
              <label for="file">Foto</label>
              <input type="file" class="form-control" id="file" name="file" value="<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>