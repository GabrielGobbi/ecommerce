<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Obras do  <?php echo htmlspecialchars( $artistas["name_artistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/artistas">artistas</a></li>
    <li><a href="/admin/artistas/<?php echo htmlspecialchars( $artistas["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $artistas["name_artistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <li class="active"><a href="/admin/artistas/<?php echo htmlspecialchars( $artistas["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products">Produtos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Todos os Produtos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">Artista</th>
                            <th>Descrição</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($productsNotRelated) && ( is_array($productsNotRelated) || $productsNotRelated instanceof Traversable ) && sizeof($productsNotRelated) ) foreach( $productsNotRelated as $key1 => $value1 ){ $counter1++; ?>

                            <tr>
                            <td style="width: 140px"><?php echo htmlspecialchars( $value1["name_artistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <a href="/admin/artistas/<?php echo htmlspecialchars( $artistas["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar </a>
                            </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Obras de(a)  <?php echo htmlspecialchars( $artistas["name_artistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">Artista</th>
                            <th>Descrição</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($productsRelated) && ( is_array($productsRelated) || $productsRelated instanceof Traversable ) && sizeof($productsRelated) ) foreach( $productsRelated as $key1 => $value1 ){ $counter1++; ?>

                            <tr>
                            <td style="width: 140px"><?php echo htmlspecialchars( $value1["name_artistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <a href="/admin/artistas/<?php echo htmlspecialchars( $artistas["idartistas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                            </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->