@extends('layouts.admin')
@section('css')
  {{HTML::style('lib/css/admin/edit_product.css')}}
  {{HTML::style('lib/css/bootstrap-select.css')}}
@stop
@section('admin_main')
<section class="content">
    <div class="row">
         <div class="col-lg-1"></div>
         <div class="col-lg-9">
            {{Form::open(array('url'=>$url,'method'=>'post','role'=>'form','enctype'=>'multipart/form-data'))}}
               @if(isset($product))
                   {{Form::hidden('hidden_product_id',$product->id)}}
                   {{Form::hidden('hidden_description',$product->description)}}
                   {{Form::hidden('hidden_content',$product['product_infomations']->value)}}
                   {{Form::hidden('hidden_image',$product->image)}}
                   {{Form::hidden('hidden_image_small',$product->image_small)}}
               @else
                    {{Form::hidden('hidden_content',$tag_id['template'])}}
                    {{Form::hidden('tag_id',$tag_id['id'])}}
               @endif
               <div class="form-group">
                  <div class="row">
                     <div class="col-lg-8">
                        {{Form::label('name','Product Name')}}
                        {{Form::text('name', (isset($product)) ? $product->name : null ,array('placeholder'=>'Product Name','class'=>'form-control','required'=>''))}}
                     </div>
                     @if(isset($manufacture))
                     <div class="col-lg-4">
                        {{Form::label('manufacture','Manufacture')}}
                        {{Form::select('manufacture',$manufacture,null,array('class'=>'form-control'))}}
                     </div>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div id="result" class="col-lg-2 text-center">
                        @if(isset($product))
                        {{HTML::image($product->image,'img')}}
                        @endif
                     </div>
                     <div class="col-lg-6">
                        {{Form::label('image','Image')}}
                        <div class="input-group">
                           <span class="input-group-btn">
                              <span class="btn btn-primary btn-file">
                                  Browse&hellip; <input type="file" name="image" id="logoProduct">
                              </span>
                           </span>
                           <input type="text" class="form-control" readonly>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        {{Form::label('quantity','Quantity')}}
                        {{Form::text('quantity',(isset($product)) ? $product->quantity : null,array('placeholder'=>'Quantity','class'=>'form-control','required'=>''))}}
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-lg-2">
                        {{Form::label('price','Price (VND)')}}
                        {{Form::number('price',(isset($product)) ? $product->price : 0,array('class'=>'form-control','required'=>''))}}
                     </div>
                     <div class="col-lg-3">
                        {{Form::label('sale','Price Sale (%)')}}
                        {{Form::number('sale',(isset($product)) ? $product->price_sale : 0,array('class'=>'form-control'))}}
                     </div>
                     <div class="col-lg-3">
                        {{Form::label('bestsaller','Price Bestsaller (%)')}}
                        {{Form::number('bestsaller',(isset($product)) ? $product->price_bestsaller : 0,array('class'=>'form-control'))}}
                     </div>
                     <div class="col-lg-2">
                        {{Form::label('rate','Rate')}}
                        {{Form::selectRange('rate',0,5,(isset($product)) ? $product->rate : 0 ,array('class'=>'form-control'))}}
                     </div>
                     <div class="col-lg-2">
                        {{Form::label('block','Block')}}
                        {{Form::selectRange('block',0,1,(isset($product)) ? $product->block : 1,array('class'=>'form-control'))}}
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  {{Form::label('description','Description')}}
                  {{Form::textarea('description',(isset($product)) ? $product->description : null ,array('id'=>'editor','class'=>'form-control','required'=>''))}}
               </div>
               <div class="form-group">
                  {{Form::label('image_slide','Image Slide')}}
                  @for($i=0; $i<2; $i++)
                     {{renderSlideProduct()}}
                  @endfor
               </div>
               <div class="form-group">
                    {{Form::label('Infomation','Infomation')}}
                   {{Form::textarea('info',(isset($product)) ? $product['product_infomations']->value : $tag_id['template'],array('id'=>'editorinfo'))}}
               </div>
               <div class="form-group text-center">
                  <div class="btn-group" role="group" aria-label="3">
                     {{Form::submit($submit,array('class'=>'btn btn-success'))}}
                     {{Form::reset('Reset Product',array('class'=>'btn btn-warning','id'=>'reset'))}}
                  </div>
               </div>
            {{Form::close()}}
         </div>
        <div class="col-lg-2"></div>
    </div>
</section>
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
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
            { name: 'others', items: [ '-' ] }
         ];
         var config =   {
                           toolbar_mySimpleToolbar: myToolbar,
                           toolbar: 'mySimpleToolbar'
                        };
         $('#editor').ckeditor(config);
         var myToolbarInfo = [
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
         var configInfo =   {
                           toolbar_mySimpleToolbarInfo: myToolbarInfo,
                           toolbar: 'mySimpleToolbarInfo',
                           height : '500px'
                        };
            $('#editorinfo').ckeditor(configInfo);
         $('#reset').on("click",function(){
            var html = "";
            <?php if(isset($product)){ ?>
               html = $("input[name='hidden_description']").val();
            <?php } ?>
            $( '#editor' ).val(html);
            htmlinfo = $("input[name='hidden_content']").val();
            $( '#editorinfo' ).val(htmlinfo);
         });
      });
   </script>
   <script type="text/javascript">
        $(document).on('change', '.btn-file :file', function() {
          var input = $(this),
              numFiles = input.get(0).files ? input.get(0).files.length : 1,
              label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
          input.trigger('fileselect', [numFiles, label]);
        });
        $(document).ready( function() {
            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            });
        });
   </script>
   <script type="text/javascript">
      function viewImageUpload(name,result){
         //Check File API support
         if(window.File && window.FileList && window.FileReader){
            var filesInput = document.getElementById(name);
            filesInput.addEventListener("change", function(event){
            var files = event.target.files; //FileList object
            var output = document.getElementById(result);
               for(var i = 0; i< files.length; i++){
                  var file = files[i];
                  //Only pics
                  if(!file.type.match('image')) continue;
                  var picReader = new FileReader();
                  picReader.addEventListener("load",function(event){
                  var picFile = event.target;
                  var div = document.createElement("div");
                  div.innerHTML = "<img src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
                     $('#'+result).html('');
                     output.insertBefore(div,null);
                  });
                  //Read the image
                  picReader.readAsDataURL(file);
               }
            });
         }else{
            console.log("Your browser does not support File API");
         }
      }
      $(document).ready(function() {
         window.onload = viewImageUpload('logoProduct','result');
      });
   </script>
@stop