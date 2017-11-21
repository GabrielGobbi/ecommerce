<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Produtos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/categories">Categorias</a></li>
    <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Produto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/products/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="artista">Nome do Artista</label>
              <input type="text" class="form-control" id="artista" name="artista" placeholder="Digite o id do Artista">
            </div>
            <!-- Button trigger modal -->
<a href="/admin/artistas" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Artistas </a>

            <div class="form-group">
              <label for="desproduct">Descrição</label>
              <input type="text" class="form-control" id="desproduct" name="desproduct" placeholder="Digite a descrição do produto">
            </div>
            <div class="form-group">
              <label for="mercado">Preço de mercado</label>
              <input type="number" class="form-control" id="mercado" name="mercado" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="situacao">Situação</label>
              <input type="text" class="form-control" id="situacao" name="situacao" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="observacao">Observação</label>
              <input type="text" class="form-control" id="observacao" name="observacao" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="comprado">Preço comprado</label>
              <input type="number" class="form-control" id="comprado" name="comprado" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="tamanho">Tamanho</label>
              <input type="text" class="form-control" id="tamanho" name="tamanho" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="tecnica">Tecnica</label>
              <input type="text" class="form-control" id="tecnica" name="tecnica" step="0.01" placeholder="0.00">
            </div>
            <div class="form-group">
              <label for="desurl">URL</label>
              <input type="text" class="form-control" id="desurl" name="desurl">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->