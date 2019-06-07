
$(document).ready(function() {
    var title = $( '#title-edit' ).text();
    var brief = $( '#brief-edit' ).text(); 
    var detail = $('#detail-edit').text();
    var img = $('#img-edit').attr('src');
    var loaitin = $( "#loaitin>option" ).map(function() {return this.text;});
    $( "#edit-article" ).click(function() {
        $("#article").html('<div class="panel panel-default">'
            +'<div class="panel-heading">Sửa bài viết</div>'
            +'<div class="panel-body">'
            + '<form method="POST"  action="suabai.php" enctype="multipart/form-data">'
            +'<div class="form-group">'
            +'<label for="title">Tiêu đề</label><textarea class="edit" id="title" name="title">'+title+'</textarea>'
            +'</div>'
            +'<br>'
            +'<div class="form-inline">'
            +'<div class="form-group">'
            +'<label for="loaitin" style="margin-right: 5px;">Loại tin</label>'
            +'<select class="form-control" id="loaitin" name="loaitin" style="margin-right: 5px;">'
            +'</select> </div>'
            +'<div class="checkbox">'
            +'<label for="tinnoibat">'
            +'<input type="checkbox" id="tinnoibat" name="tinnoibat" value="1" style="margin-right: 5px;">'
            +'Tin nổi bật</label>'
            +'</div> </div> <br>'
            +'<div class="input-group image-preview">'
            +'<input type="text" class="form-control image-preview-filename" disabled="disabled">'
            +'<span class="input-group-btn">'
            +'<button type="button" class="btn btn-default image-preview-clear" style="display:none;">'
            +'<span class="glyphicon glyphicon-remove"></span> Clear </button>'
            +'<div class="btn btn-default image-preview-input">'
            +'<span class="glyphicon glyphicon-folder-open"></span>'
            +'<span class="image-preview-input-title">Browse</span>'
            +'<input type="file" accept="image/png, image/jpeg, image/gif" name="fileToUpload" id="fileToUpload" />'
            +'</div> </span> </div>'
            +'<div class="form-group">'
            +'<label for="tomtat">Tóm tắt</label>'
            + '<textarea class="edit" id="tomtat" name="tomtat">' +brief+'</textarea>'
            +'</div>'
            + '<img class="img-responsive" src="'+img+'" alt="" width="200px">'
            + '<hr>'
            +'<div class="form-group">'
            +'<label for="noidung">Nội dung</label>'
            + '<textarea class="edit" id="noidung" name="noidung" >' +detail+'</textarea>'
            +'</div>'
            + '<hr>'
            + '<div style="text-align: center;">'
            +         '<button type="submit" name="submit" class="btn btn-success">Lưu</button>'
            +    '</div>'
            + '</form> </div> </div>');

        $("textarea").each(function(textarea) {
         $(this).height(0).height(this.scrollHeight);
     });
        $(loaitin).each(function( index, val ) {
            $("#loaitin").append('<option value="'+index+'">'+val+'</option>');
        });
        $('#noidung').summernote({
        height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true 
});

        $('#tomtat').summernote({
          height: 100
      });
    });

    $('#noidung').summernote({
		height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true 
});

    $('#tomtat').summernote({
      height: 100
  });

    $(".menu1").next('ul').toggle();

    $(".menu1").click(function(event) {
      $(this).next("ul").toggle(500);
  });
});

$(document).on('click', '#close-preview', function(){ 
	$('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
    	function () {
    		$('.image-preview').popover('show');
    	}, 
    	function () {
    		$('.image-preview').popover('hide');
    	}
    	);    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
    	type:"button",
    	text: 'x',
    	id: 'close-preview',
    	style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
    	trigger:'manual',
    	html:true,
    	title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
    	content: "There's no image",
    	placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
    	$('.image-preview').attr("data-content","").popover('hide');
    	$('.image-preview-filename').val("");
    	$('.image-preview-clear').hide();
    	$('.image-preview-input input:file').val("");
    	$(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
    	var img = $('<img/>', {
    		id: 'dynamic',
    		width:250,
    		height:200
    	});      
    	var file = this.files[0];
    	var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
        	$(".image-preview-input-title").text("Change");
        	$(".image-preview-clear").show();
        	$(".image-preview-filename").val(file.name);            
        	img.attr('src', e.target.result);
        	$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
$(document).on( 'change keyup keydown paste cut', 'textarea', function (){
    $(this).height(0).height(this.scrollHeight);
}).find( 'textarea' ).change();