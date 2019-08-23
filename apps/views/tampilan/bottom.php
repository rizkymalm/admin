<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/window.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/resize.window.js"></script>  
<script type="text/javascript" src="<?php echo $base_url; ?>assets/malms/javas/malms.js"></script>
<!-- <script src="<?php echo $base_url; ?>assets/js/jquery-1.12.4.js"></script> -->
<script language="javascript" src="<?php echo $base_url ?>assets/js/jquery.timers-1.0.0.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery-ui.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		// alert($(window).width())
		$('.clickadv').click(function(){
			$('.statadv').css("display" , "block");
			$('.advbox').hide();
			$('.hidestat').click(function(){
				$('.statadv').hide();
				$('.advbox').show();
			})
		})
        $(".check-icon").hide();
            setTimeout(function () {
            $(".check-icon").show();
        }, 10);
        $('.option-click').click(function(){
    	    var menu=$(this).attr("href");
    	    $(menu).toggle();
    	    $(".option-menu").not($(menu)).hide();
	    });
        $('.btn-tab-toggle').click(function(){
            var menu=$(this).attr("href");
            // var id_opt_menu=$(".option-menu").attr("id");
            $("."+menu).slideToggle("fast");
            $(menu+" .linkmore").toggle(180);
            if ($("."+menu).height() > 20) {
                $(this).css({
                    "-webkit-transform" : "rotate(180deg)",
                    "-moz-transform" : "rotate(180deg)",
                    "transform" : "rotate(180deg)"
                })
                $('#'+menu).hide();
            }else{
                $(this).css({
                    "-webkit-transform" : "rotate(0deg)",
                    "-moz-transform" : "rotate(0deg)",
                    "transform" : "rotate(0deg)"
                })
            }
        });

        $('#count-checked :checkbox').change(function(){
            var checkedbox = $("#count-checked .cnt-chk:checkbox:checked").length
            if (checkedbox == 0) {
                $('.valchecked').html('');
            }else if(checkedbox == 1){
                $('.valchecked').html(checkedbox+" Records Selected <button class='btn-list-control' style='background-image:url(<?php echo $base_url; ?>assets/images/icon/delete-thrash.png); background-position:center; background-size:25px 25px; background-repeat:no-repeat;'>&nbsp;</button>&nbsp;<button class='btn-list-control' style='background-image:url(<?php echo $base_url; ?>assets/images/icon/eye-view.png); background-position:center; background-size:25px 25px; background-repeat:no-repeat;'>&nbsp;</button>");
            }else if(checkedbox > 1){
                $('.valchecked').html(checkedbox+" Records Selected <button class='btn-list-control' style='background-image:url(<?php echo $base_url; ?>assets/images/icon/delete-thrash.png); background-position:center; background-size:25px 25px; background-repeat:no-repeat;'>&nbsp;</button>");
            }
        });
	})

	function mobmenu(){
		if ($('.mob-menu').width() == 0) {
			$('.mob-menu').animate({
				width : "70%"
			})
			$('.mob-menu div').css({
				"display" : "block"
			})
			$('.mob-menu > ul').css({
				"display" : "block"
			})
			$('.mob-opt-menu img').animate({
				marginLeft : "70%"
			})
            $('.blur').show()
		}else{
			$('.mob-menu').animate({
				width : "0"
			})
			$('.mob-menu div').css({
				"display" : "none"
			})
			$('.mob-menu > ul').css({
				"display" : "none"
			})
			$('.mob-opt-menu img').animate({
				marginLeft : "0"
			})
            $('.blur').hide()
		}        
	}

    function toggleTopInfo(){
        if ($(".top-info").is(":visible")) {
            $(".top-info").slideUp()
            $(".top-info").css({
                "height" : "0"
            })
            $(".top-info-toggle img").css({
                "-webkit-transform" : "rotate(0deg)"
            })
        }else{
            $(".top-info").css({
                "height" : "auto"
            })
            $(".top-info").slideDown()
            $(".top-info-toggle img").css({
                "-webkit-transform" : "rotate(180deg)"
            })
        }
    }

    function closePopup(){
        $(".popup").fadeOut();
        $('.blur').fadeOut();
    }

    function btnPopup(){
        $.ajax({

        })
    }


$(document).ready(function(){
    var detprd = $('.valdetprd').text()    
    if (window.location.href.indexOf("#statistik") > -1) {
        $('.ajaxdt-prd').load('apps/views/konten/produk_stat.php?pid='+detprd);
    }else if (window.location.href.indexOf("#detail") > -1) {
        $('.ajaxdt-prd').load('apps/views/konten/produk_detail.php?pid='+detprd);
    }else if (window.location.href.indexOf("#galeri") > -1) {

    }else{
        $('.ajaxdt-prd').load('apps/views/konten/produk_detail.php?pid='+detprd);
    }
    
    
    // $('.ajaxdt-prd').load('apps/views/konten/content_prd.php');
    $('#ajaxdt-type a').click(function(){
        var dtclick = $(this).attr("href");
        var replacetag = dtclick.replace('#','');
        var valdetprd = $('.valdetprd').text()
        // alert(replacetag)
        var getdata = "type="+replacetag+"&pid="+valdetprd
        $.ajax({
            type : "GET",
            url : "apps/views/konten/content_prd.php",
            data : getdata,
            cache : false,
            beforeSend:function(){
                $('.blur').show();
            },success:function(dttype){
                $('.ajaxdt-prd').html(dttype);
                $('.blur').hide();
            }
        })
    })

    $(".form-addnew-member").submit(function(e){
        event.preventDefault();
        var memberData = $(this).serialize();
        $.ajax({
            type : "POST",
            url : "http://localhost/project/ouradmin/apps/controllers/actionajaxmember.php",
            data : memberData,
            cache : true,
            beforeSend : function(){
                $('.blur').show();
                $('.loading').show();
            },success : function (member){
                $('.loading').hide();
                $('.popup').show();
                $(".popupContent tr td").html(member);
            }
        })
        return false;
    })

    $(".form-addnew-event").submit(function(e){
        e.preventDefault();
        var eventData = $(this).serialize();
        $.ajax({
            type : "POST",
            url : "http://localhost/project/ouradmin/apps/controllers/actionajaxmember.php",
            data : eventData,
            cache : true,
            beforeSend : function(){
                $('.blur').show();
                $('.loading').show();
            },success : function(eventdata){
                $('.loading').hide();
                $('.popup').show();
                $(".popupContent tr td").html(eventdata);
            }
        })
    })
});

            function ajaxLocation(id){
                var id = id.id;
                var valProv = $("#"+id).find('option:selected').attr('value');
                var getdata = "province="+valProv;
                $.ajax({
                    type : 'GET',
                    data : getdata,
                    url : 'apps/views/konten/location_city.php',
                    cache : true,
                    beforeSend : function(){
                        $('.loadCity').show()
                    },success : function(select){
                        $('.loadCity').hide()
                        $('#selCity').html(select);
                    }
                })
            }

            function ajaxCity(id){
                var id = id.id;
                var valCity = $("#"+id).find('option:selected').attr('value');
                var splitCity = valCity.split(".");
                var getProv = splitCity[0];
                var getCity = splitCity[1];
                var getdata = "city="+getCity+"&prov="+getProv;
                $.ajax({
                    type : 'GET',
                    data : getdata,
                    url : 'apps/views/konten/location_city.php',
                    cache : true,
                    beforeSend : function(){
                        $('.loadDistrict').show()
                    },success : function(select){
                        $('.loadDistrict').hide()
                        $('#selDistrict').html(select);
                    }
                })
            }

            function ajaxDistrict(id){
                var id = id.id;
                var valCity = $("#"+id).find('option:selected').attr('value');
                var splitCity = valCity.split(".");
                var getProv = splitCity[0];
                var getCity = splitCity[1];
                var getDist = splitCity[2];
                var getdata = "city="+getCity+"&prov="+getProv+"&district="+getDist;
                $.ajax({
                    type : 'GET',
                    data : getdata,
                    url : 'apps/views/konten/location_city.php',
                    cache : true,
                    beforeSend : function(){
                        $('.loadVillage').show()
                    },success : function(select){
                        $('.loadVillage').hide()
                        $('#selVillage').html(select);
                    }
                })
            }

</script>





<!-- plugin -->



    <!-- validate js -->
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript">
        $("#validate-frm").validate({
            rules: {
                prname: {
                    required: true,
                    number : false
                },
                firstname: {
                    required : true,
                    lettersonly : true
                },
                lastname: {
                    required : true,
                    lettersonly : true
                },
                username: {
                    required : true,
                    lettersonly : true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                url: "true",
                comment:"required",
                price:{
                    required : true
                },
                stock:{
                    number : true
                },
                catprd: {
                    required : true
                },
                img_prd: {
                    required : true
                }
            },
            messages: {
                prname: {
                    required: "Produk tidak boleh kosong"
                },
                firstname: {
                    required: "Kolom ini tidak boleh kosong",
                    lettersonly: "Gunakan huruf saja"
                },
                lastname: {
                    required: "Kolom ini tidak boleh kosong",
                    lettersonly: "Gunakan huruf saja"
                },
                username:{
                    required: "Kolom ini tidak boleh kosong",
                    lettersonly: "Gunakan huruf saja"
                },
                phone:{
                    required: "Kolom ini tidak boleh kosong",
                    number : "Gunakan angka saja"
                },
                email: "Harap isi dengan alamat email valid",
                url: "Tolong isi sesuai dengan url!",
                comment: "Tolong isi komentar Anda!",
                number : "Gunakan angka saja",
                price: {
                    required : "Kolom ini tidak boleh kosong"
                },
                stock: {
                    number : "Gunakan angka saja",
                    required : "Kolom ini tidak boleh kosong"
                },
                catprd: {
                    required : "Pilih salah satu"
                }
            }
        });
    </script>




    <script src="<?php echo $base_url; ?>assets/plugin/fileinput/custom-file-input.js"></script>

    <script src="<?php echo $base_url; ?>assets/plugin/chart2/rapa.js"></script>
    <script src="<?php echo $base_url; ?>assets/plugin/chart2/morris.js"></script>
    <script type="text/javascript">
    function realisasi(){
    			
    	$("#response").hide(); //sebagai div response (gaya2 loading image aja :D)
    	
    	$.ajax({
        url: "http://192.168.7.239/execute/admin/landingpage/apps/views/konten/chart.php", //ambil data dari data.php
        cache: false, //data ga di simpan ke browser
        type: "GET", //tipe sinkron GET, bisa pake post, terserah aja
        dataType: "json", //data tipe nya sebagai json
        timeout:3000, //set 3 detik respon, jika lama berarti gagal
        beforeSend: function() {
        	    		
    			$("#response").show(); //penggaya loading muncul ;D
    			$('#response').html("<img src='<?php echo $base_url; ?>assets/images/ajax-loader.gif' />");
    		},
        success : function (data) {
        
    	$("#response").hide(); //penggaya loading dimatikan :(	
         var graph = Morris.Line({ //di sini inisialkan graph sebagai morris chart area
           element: 'contoh-chart', //masukin chart nya nanti di div id=contoh-chart
           data: data, //set data dari callback success function
            xkey: 'y', //ini yang tadi sebagai data x (bawah)
            ykeys: ['jumlah'], //datanya berupa jumlah penjualan tadi, json data
            labels: ['Pengunjung'], //Label data dibikin Penjualan        
            lineColors: ['#68BAF9'], //bikin warna line nya
        });
    	}
    	});
    	}
    $(document).ready(function()
    {			
    	realisasi(); //nah nanti dipanggil di sini
    });

    </script>




	<!-- counter -->
	<script type="text/javascript">
		$(window).ready(function(){
			$('.count').each(function () {
			    $(this).prop('Counter',0).animate({
			        Counter: $(this).text()
			    }, {
			        duration: 3000,
			        easing: 'swing',
			        step: function (now) {
			            $(this).text(Math.ceil(now));
			        }
			    });
			});	
		});
	</script>
	<!-- end of counter -->






<!-- 	<script src="<?php echo $base_url; ?>assets/plugin/chart/highcharts.js"></script>
    <script src="<?php echo $base_url; ?>assets/plugin/chart/jquery.highchartTable-min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('table.highchart').highchartTable();
		});
	</script> -->

    <!-- multiple form -->
    <script type="text/javascript" src="assets/plugin/multiemail/multiple-emails.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/plugin/multiemail/multiple-emails.css" />

    <script type="text/javascript">
        //Plug-in function for the Semantic UI version of the multiple email
        $(function() {
            //To render the input device to multiple email input using SemanticUI icon
            $('#example_emailSUI').multiple_emails({theme: "SemanticUI"});
            
            //Shows the value of the input device, which is in JSON format
            $('#current_emailsSUI').val($('#example_emailSUI').val());
            $('#example_emailSUI').change( function(){
                $('#current_emailsSUI').val($(this).val());
            });
        });
    </script>
    <!-- end of multiple form -->

    <!-- 11132017 autocomplete -->
    <script src="<?php echo $base_url; ?>assets/plugin/autocomplete/jquery.autocomplete.js" type="text/javascript"></script>
   <!--  <script>
        var states = [
            '#PeralatanRumahTangga', '#PeralatanBayi', '#Kesehatan', '#Kecantikan', '#MakananMinuman'
        ];

        $('.katauto').autocomplete({
            source:[states]
        });
    </script> -->
    <!-- end of autocomplete -->



    <!-- format rupiah -->
    <script type="text/javascript">
    $('.form-addnew').ready(function(){
        var dengan_rupiah = document.getElementById('rupiah');
        if (dengan_rupiah) {
            dengan_rupiah.addEventListener('keyup', function(e)
            {
                dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });
            
            dengan_rupiah.addEventListener('keydown', function(event)
            {
                limitCharacter(event);
            });
        }
    })
    
    /* Fungsi */
    function formatRupiah(bilangan, prefix)
    {
        var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
            split   = number_string.split(','),
            sisa    = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
    
    function limitCharacter(event)
    {
        key = event.which || event.keyCode;
        if ( key != 188 // Comma
             && key != 8 // Backspace
             && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
             && (key < 48 || key > 57) && (key < 96 || key > 105) // Non digit
             // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
            ) 
        {
            event.preventDefault();
            return false;
        }
    }
    </script>
    <!-- end of format rupiah -->











<!-- <script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/tinymce/jquery-1.7.min.js"></script> -->
<!-- tinymce -->
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/tinymce/jquery.tinymce.js"></script>
    <script type="text/javascript">
            $().ready(function() {
                $('textarea.tinymce').tinymce({
                    // Location of TinyMCE script
                    script_url : '<?php echo $base_url; ?>assets/plugin/tinymce/tiny_mce.js',
                    // General options
                    theme : "advanced",
                    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,imagemanager",
                    // Theme options
                    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "replace,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime|,forecolor,backcolor,|tablecontrols",
                    theme_advanced_buttons3 : "moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,|,insertimage",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : false,                           
                });
            });
    </script>
<!-- tinymce -->

<!-- Calendar -->
<script src='<?php echo $base_url; ?>assets/plugin/calendar/core/main.js'></script>
<script src='<?php echo $base_url; ?>assets/plugin/calendar/interaction/main.js'></script>
<script src='<?php echo $base_url; ?>assets/plugin/calendar/daygrid/main.js'></script>

<!-- Calendar -->


<!-- uploadimage -->
<script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/uploadimage/jquery.upload.image.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/uploadimage/img_upload.js"></script>



<!-- Date range -->
<!-- <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?php echo $base_url ?>assets/plugin/daterange/moment.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>assets/plugin/daterange/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#startDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment().subtract(6, 'days')
        });

        $('#endDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment()
        });
    })
</script>
<!-- Date range -->



<!-- rich editor -->
<script type="text/javascript" src="<?php echo $base_url ?>assets/plugin/richeditor/jquery.richtext.js"></script>
<script>
$(document).ready(function() {
    $('.editor').richText();
});
</script>
<!-- rich editor -->


<!--=========================================================================== end plugin ===========================================================================