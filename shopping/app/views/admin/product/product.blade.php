@extends('......layouts.admin')
@section('css')
    {{HTML::style('lib/css/datatables/dataTables.bootstrap.css')}}
@stop
@section('admin_main')
<section class="content">
    {{HTML::link(URL::to('admin/product/'.$slug_tag.'/new'),'Add New',array('class'=>'btn btn-primary'))}}
    <table id="table_id" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Price Sale</th>
                <th>Price Bestsalle</th>
                <th width="120">Block</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $key => $value)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{HTML::image($value->image_small,'image',array('width'=>'50px','height'=>'50px'))}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->quantity}}</td>
                <td>{{$value->price}}</td>
                <td>{{($value->price_sale != 0) ? $value->price_sale."&nbsp;%" : '-'}}</td>
                <td>{{($value->price_bestsaller != 0) ? $value->price_bestsaller."&nbsp;%" : "-"}}</td>
                <td class="text-center">
                    <a href="{{URL::to('/admin/product/'.$slug_tag.'/edit?product='.$value->slug)}}" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                @if($value->block == 1)
                    <a href="javascript: disableProduct('{{$value->id}}','{{$value->name}}')" class="btn btn-warning btn-sm">
                        <i class="glyphicon glyphicon-eye-close"></i>
                    </a>
                @else
                    <a href="javascript: activeProduct('{{$value->id}}','{{$value->name}}')" class="btn btn-info btn-sm">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                @endif
                    <a href="javascript: deleteProduct('{{$value->id}}','{{$value->name}}')" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-remove"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section><!-- /.content -->
<!-- Product Modal -->
<div class="modal fade" id="modal_Product">
  <div class="modal-dialog">
    {{Form::open(array('url'=>'','method'=>'post','id'=>'modal-product'))}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Delete Modal title</h4>
      </div>
      <div class="modal-body">
        {{Form::hidden('product_id','',array('id'=>'product-id'))}}
        <p id="product_name"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{Form::submit('Delete',array('class'=>'btn btn-danger','id'=>'submit_modal'))}}
      </div>
    </div><!-- /.modal-content -->
    {{Form::close()}}
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Alert Modal -->
<div id="alertModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <p id="alert-message"></p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
@section('js')
    {{HTML::script('lib/js/datatables/jquery.dataTables.js',array('type'=>'text/javascript'))}}
    {{HTML::script('lib/js/datatables/dataTables.bootstrap.js',array('type'=>'text/javascript'))}}
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').dataTable({
                "iDisplayLength": 10,
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bSort": true,
                "bInfo": false,
                "bAutoWidth": true
            });
        } );
    <?php if(Session::has('success')){ ?>
        $(document).ready(function() {
            $('#alert-message').html("<?php echo Session::get('success'); ?>");
            $('#alertModal').modal('show');
        });
    <?php } ?>
        function deleteProduct(product_id,product_name){
            $('#modal-product').attr('action',"<?php echo URL::route('product.delete'); ?>");
            $('#product-id').val(product_id);
            $('#submit_modal').removeClass().addClass('btn btn-danger');
            var str = product_name+" sẽ bị xóa &hellip;";
            $('#product_name').html(str);
            $('#modal_Product').modal('show');
        }
        function activeProduct(product_id,product_name){
            $('#modal-product').attr('action',"<?php echo URL::route('product.active'); ?>");
            $('#submit_modal').attr('value','Active').removeClass().addClass('btn btn-info');
            $('#product-id').val(product_id);
            var str = product_name+" sẽ được active &hellip;";
            $('#product_name').html(str);
            $('#modal_Product').modal('show');
        }
        function disableProduct(product_id,product_name){
            $('#modal-product').attr('action',"<?php echo URL::route('product.disable'); ?>");
            $('#submit_modal').attr('value','Disable').removeClass().addClass('btn btn-warning');
            $('#product-id').val(product_id);
            var str = product_name+" sẽ bị disable &hellip;";
            $('#product_name').html(str);
            $('#modal_Product').modal('show');
        }
    </script>
@stop