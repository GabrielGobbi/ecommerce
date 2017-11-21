<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Tecnicas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/artistas">Categorias</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/artistas/create" class="btn btn-success">Cadastrar Artista</a>
            </div>

            <div class="box-body no-padding">
            <a href="/admin/products/create" class="btn btn-success " style="
    position: relative;
    left: 85%;
    top: -29px;
    height: 34px;
"> VOLTAR </a>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome do Artista</th>
                    <th style="width: 240px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($artistas) && ( is_array($artistas) || $artistas instanceof Traversable ) && sizeof($artistas) ) foreach( $artistas as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["name_artistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>

                      <a href="/admin/artistas/<?php echo htmlspecialchars( $value1["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Produtos</a>
                      <a href="/admin/artistas/<?php echo htmlspecialchars( $value1["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/admin/artistas/<?php echo htmlspecialchars( $value1["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    
                    </td>

                  </tr>

                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->