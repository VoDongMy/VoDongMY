@extends('layouts.admin')
@section('admin_main')
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        150
                    </h3>
                    <p>
                        New Orders
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        30
                        {{--53<sup style="font-size: 20px">%</sup>--}}
                    </h3>
                    <p>
                        Product
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{URL::to('admin/product')}}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        44
                    </h3>
                    <p>
                        User Registrations
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        65
                    </h3>
                    <p>
                        Unique Visitors
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-3 connectedSortable">
            <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-tag"></i>
                    <h3 class="box-title">Manager Catalog</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table_id">
                        <thead>
                            <tr>
                                <th width="30px">STT</th>
                                <th>Name</th>
                                <th width="30px">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @if($tags->count() > 0)
                                    @foreach($tags as $key => $tag)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td>{{$tag->name}}</td>
                                            <td class="text-center">
                                                <a href="javascript: doedittag('<?php echo $tag->slug; ?>')"><i class="glyphicon glyphicon-pencil"></i></a>
                                                &nbsp;
                                                @if($tag->block == 1)
                                                    <a href="javascript: dodisable('<?php echo $tag->slug; ?>')"><i class="glyphicon glyphicon-eye-close"></i></a>
                                                @else
                                                    <a href="javascript: doactive('<?php echo $tag->slug; ?>')"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Khong co du lieu nao</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    <div>
                        @if($tags->count() > 0)
                            {{$tags->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </section><!-- /.Left col -->
        {{Form::open(array('url'=>URL::route('tag.save'),'method'=>'post','id'=>'formEditTag'))}}
            {{Form::hidden('tag_edit_slug','',array('id'=>'tag_edit_slug'))}}
            {{Form::hidden('temp',$template,array('id'=>'temp_tag'))}}
            <section id="newTags" class="col-lg-3 connectedSortable">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-tag"></i>
                        <h3 class="box-title">Add Catalog</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Tag name','id'=>'tag_name'))}}
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a class="pull-right btn btn-default" id="addtagname">Add <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </section><!-- /.Left col -->
            <section id="template" class="col-lg-9 connectedSortable" style="display: none">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-tag"></i>
                        <h3 class="box-title">Add Catalog</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {{Form::textarea('template',$template,array('class'=>'form-control','placeholder'=>'Edit Template','required'=>'','id'=>'editor'))}}
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a class="pull-left btn btn-default" id="backaddtag"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        {{Form::submit('submit',array('class'=>'pull-right btn btn-primary'))}}
                    </div>
                </div>
            </section><!-- right col -->
        {{Form::close()}}
    </div><!-- /.row (main row) -->
</section><!-- /.content -->
<!-- Alert -->
<div class="modal fade" id="mess_alert">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Alert</h4>
      </div>
      {{Form::open(array('url'=>'','method'=>'post','id'=>'alert_form'))}}
          <div class="modal-body">
            {{Form::hidden('tag_id','',array('id'=>'tag_id'))}}
            <p id="mess_alert_p"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{Form::submit('Submit',array('class'=>'btn btn-default'))}}
          </div>
      {{Form::close()}}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="mess_success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <p>{{Session::get('success')}}&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
@section('js')
    {{HTML::script('lib/ckeditor/ckeditor.js')}}
    {{HTML::script('lib/ckeditor/adapters/jquery.js')}}
    <script type="text/javascript">
        $( document ).ready( function() {
            var myToolbar = [
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                '/',
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                { name: 'others', items: [ '-' ] }
            ];
            var config =  {
                    toolbar_mySimpleToolbar: myToolbar,
                    toolbar: 'mySimpleToolbar',
                    height: 500
                 };
            $( '#editor' ).ckeditor(config);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addtagname').on('click',function(){
                var tag_name = $('#tag_name').val();
                if(tag_name != ""){
                    $("#newTags").hide();
                    $('#template').css('display','block');
                }
            });
            $('#backaddtag').on('click',function(){
                $("#template").hide();
                $('#newTags').css('display','block');
            });
            <?php if(Session::has('success')) { ?>
                $("#mess_success").modal('show');
            <?php } ?>
        });
        function doactive(id){
          $('#alert_form').attr('action',"<?php echo URL::route('tag.active'); ?>");
          $("#alert_form input[type='submit']").attr('value','Active');
          $("#mess_alert_p").html("Sẽ được active !");
          $('#tag_id').val(id);
          $('#mess_alert').modal('show');
        };
        function dodisable(id){
          $('#alert_form').attr('action',"<?php echo URL::route('tag.disable'); ?>");
          $("#alert_form input[type='submit']").attr('value','Disable');
          $("#mess_alert_p").html("Sẽ bị disable !");
          $('#tag_id').val(id);
          $('#mess_alert').modal('show');
        };
        function doedittag(id){
            $.ajax({
                url: "<?php echo URL::to('admin/tag/edit'); ?>",
                data: {tag_id: id},
                async: true,
                dataType: 'json',
                type: 'get',
                success: function(data) {
                    console.log(data.name);
                    $("#tag_name").val(data.name);
                    $('#formEditTag').attr('action','<?php echo URL::route('tag.edit.save'); ?>');
                    var cancel = "<a href='javascript: cancelEdit()' class='pull-left btn btn-default' id='canceltag'><i class='fa fa-times'></i> Cancel</a>";
                    $('#tag_edit_slug').val(id);
                    $(cancel).insertBefore('#addtagname');
                    CKEDITOR.instances.editor.setData( data.template );
                }
            })
        };
        function cancelEdit(){
            var tem = $("#temp_tag").val();
            $('#tag_name').val('');
            $('#formEditTag').attr('action','<?php echo URL::route('tag.save'); ?>');
            $('#canceltag').remove();
            CKEDITOR.instances.editor.setData(tem);
        };
    </script>
@stop