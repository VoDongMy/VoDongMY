@extends('layouts.admin')

@section('admin_main')
<section class="content">
	{{Form::open(array('url'=>$url,'method'=>'post'))}}
		@if(isset($product_id))
		{{Form::hidden('product_id',$product_id)}}
		{{Form::hidden('product_name',$product_name)}}
		@endif
		{{Form::hidden('slug',$slug)}}
		{{Form::hidden('hidden_content',$content)}}
		<div class="form-group">
			{{Form::textarea('info',$content,array('id'=>'editorinfo'))}}
		</div>
		<div class="form-group text-center">
         <div class="btn-group" role="group" aria-label="3">
            {{Form::submit('Save Product',array('class'=>'btn btn-success'))}}
            {{Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'reset'))}}
         </div>
      </div>
	{{Form::close()}}
</section>
@stop
@section('js')
	{{HTML::script('lib/ckeditor/ckeditor.js')}}
 	{{HTML::script('lib/ckeditor/adapters/jquery.js')}}
 	<script type="text/javascript">
      $( document ).ready( function() {
         var myToolbar = [
            { name: 'styles', items: [ 'Styles', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'] },
            { name: 'others', items: [ '-' ] }
         ];
         var config =   {
                           toolbar_mySimpleToolbar: myToolbar,
                           toolbar: 'mySimpleToolbar',
                           height : '500px'
                        };
         $('#editorinfo').ckeditor(config);
         $('#reset').on("click",function(){
            html = $('#hidden_content').val();
            $( '#editorinfo' ).val(html);
         });
      });
   </script>
@stop