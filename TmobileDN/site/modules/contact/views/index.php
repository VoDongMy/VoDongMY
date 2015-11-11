<div id="content">
    <?//= $this->load->mod('banner') ?>
    <div id="products">
    <div class="contact-block">
        <h1 class="contact-name"><?=$val->title?> <!--<a href="<?=site_url('contact/map_jada')?>" class="show_map">[ Xem bản đồ ]</a>--></h1>
        <div class="contact-address"><b><?=lang('contact.diachi')?>:</b> <?=$val->address?></div>
        <div class="contact-address"><b><?=lang('contact.dienthoai')?>:</b> <?=$rs->phone?></div>
        <div class="contact-address"><b>Email:</b> <?=$rs->email?></div>
        <div class="contact-address"><?=htmlspecialchars_decode($val->intro)?></div>
    </div>

    <div id="map_canvas_detail" style="width: 550px;height: 300px;"></div>

    <?=form_open(uri_string(),array('class'=>'form_contact','id'=>'form_contact'))?>     
    <table class="table_contact">
        <tr>
            <td class="label"><?=lang('contact.hoten')?> <span>*</span></td>
            <td><input type="text" name="vdata[fullname]" style="width: 300px;"/></td>
        </tr>
        <tr>
            <td class="label"><?=lang('contact.dienthoai')?> <span>*</span></td>
            <td><input type="text" name="vdata[phone]" style="width: 300px;"/></td>
        </tr>
        <tr>
            <td class="label">Email <span>*</span></td>
            <td><input type="text" name="vdata[email]" style="width: 300px;"/></td>
        </tr>
        <tr>
            <td class="label"><?=lang('contact.tieude')?> <span>*</span></td>
            <td><input type="text" name="vdata[title]" style="width: 300px;"/></td>
        </tr>
        <tr>
            <td class="label"><?=lang('contact.noidung')?> <span>*</span></td>
            <td><textarea style="width: 300px;" rows="5" name="vdata[content]"></textarea></td>
        </tr>
        <tr>
            <td class="label"></td>
            <td><input type="submit" value="<?=lang('contact.guilienhe')?>" class="bnt"/></td>
        </tr>
    </table>
    <?=form_close()?>
</div>
</div>
<script type="text/javascript">
    var v_fullname = '<?=lang('v_fullname')?>';
    var v_email = '<?=lang('v_email')?>';
    var v_valid_email = '<?=lang('v_valid_email')?>';
    var v_phone = '<?=lang('v_phone')?>';
    var v_title = '<?=lang('v_title')?>';
    var v_content = '<?=lang('v_content')?>';
</script>
<script type="text/javascript" src="<?=base_url()?>templates/js/core/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>site/modules/contact/esset/contact.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>site/modules/contact/esset/contact.css" media="screen" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=vi"></script>
<script type="text/javascript">
        var mx    =    0;
        var my    =    0;
        var mainMarkerPlace = new Array();
        var array_hotelMarker = new Array();
        var array_locationMarker = new Array();
        var type_location    = 'hotel';
        $(function(){
            $(document).bind('mousemove', function(e){
                mx = e.pageX;
                my = e.pageY;
            });
            
            var arrayListId = new Array();
            //main icon mark
            var iconmain = base_url_+'templates/icon/location.png';
            //icon mark location
            var markerNull = new google.maps.MarkerImage(null);
            var mainImagePlace    =    new google.maps.MarkerImage(iconmain);
            var mainPosPlace        =    new google.maps.LatLng(<?=$rs->lat?>, <?=$rs->lng?>);
            
            var settings = {
                    zoom: 15,
                    //minZoom: 15,
                    //maxZoom: 20,
                    center: mainPosPlace,
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas_detail"), settings);
            var mainMarkerPlace    =    new google.maps.Marker({
                                position: mainPosPlace,
                                map: map,
                                icon: mainImagePlace,
                                title: '<?=$val->title?>',
                                teaser: '',
                                address: '<?=$val->address?>',
                                pricemin: '795000',
                                url: ''
                            });
            //Hien thi boxinfo ban dau
            /*$('body').append(show_map(mainMarkerPlace));
            $('.mapinfohotel').css('top', '295px').css('left', '334px').hover(function(){}, function(){$('.mapinfohotel').remove();});
            //Addlisten marker ban đầu
            google.maps.event.addListener(mainMarkerPlace, 'mouseover', function(){
                $('.mapinfohotel').remove();
                $('body').append(show_map(this));
                $('.mapinfohotel').css('top', (my + 25) + 'px').css('left', (mx - 154) + 'px');
            });*/
         
            google.maps.event.addListener(map, 'idle', function(){
                //getDataShow(map.getBounds());
            });
            google.maps.event.addListener(map, 'dragend', function(){
                //getDataShow(map.getBounds());
            });
            google.maps.event.addListener(map, 'drag', function(){
                $('.mapinfohotel').remove();
            });
            /*
            function getDataShow(bounds){
                $.ajax({
                  type: 'GET',
                  url: base_url+'api/ajax_hotel/<?=$hotel_id?>',
                  data: {bound: String(bounds)},
                  success: function(data){
                      for (var i = 1, dataRow; dataRow = data.rows[i]; i++) {    
                      //for(i = 0; i < data.length; i++){
                            if(jQuery.inArray(dataRow.id, arrayListId) == -1){
                                  arrayListId.push(dataRow.id);
                            var mainPosPlace = new google.maps.LatLng(dataRow.lat, dataRow.lng);
                                var mainImagePlace = new google.maps.MarkerImage(dataRow.type == "hotel" ? iconhotel : iconloc);
                                var newmarker = new google.maps.Marker({
                                    position: mainPosPlace,
                                    map: map,
                                    icon: mainImagePlace,
                                    type: dataRow.type,
                                    title: dataRow.name,
                                    picture: dataRow.picture,
                                    teaser: dataRow.teaser,
                                    address: dataRow.address,
                                    star: dataRow.category,
                                    pricemin: dataRow.pricemin,
                                    url: dataRow.url,
                                    intro: dataRow.intro,
                                    visible: (dataRow.type == "hotel" ? true : false)
                                });
                                //Gan vao array marker
                                mainMarkerPlace[dataRow.id] = newmarker;
                                //Su kien click den trang chi tiet cua location hoac KS
                                itemClick(newmarker, dataRow.url);
                                //Gan vao mang array hotel hoac location de lua chon an hoac hien
                                if (dataRow.type == "hotel") {
                                    array_hotelMarker.push(newmarker);
                                    //Show box info when mouse over icon
                                    //Chỉ addListen các marker của hotel (Do ban đầu marker location đợc ẩn đi)
                                    google.maps.event.addListener(mainMarkerPlace[dataRow.id], 'mouseover', function(){
                                      $('.mapinfohotel').remove();
                                      $('body').append(showmapinfohotel(this));
                                      $('.mapinfohotel').css('top', (my + 25) + 'px').css('left', (mx - 154) + 'px');
                                    });
                                }
                        //Mang marker location
                                if(dataRow.type == "location"){
                                    array_locationMarker.push(newmarker);
                                    google.maps.event.addListener(mainMarkerPlace[dataRow.id], 'mouseover', function(){
                                      $('.mapinfohotel').remove();
                                      $('body').append(showmapinfolocation(this));
                                      $('.mapinfohotel').css('top', (my + 25) + 'px').css('left', (mx - 154) + 'px');
                                    });
                                }
                            } //end if
                            
                            //remove box info when mouse out icon
                            google.maps.event.addListener(mainMarkerPlace[dataRow.id], 'mouseout', function(){
                                $('.mapinfohotel').remove();
                            });
                          }                      
                  },
                  dataType: 'json'
                });
                */
           // } //end function

        });
</script>