

$(document).ready(function(){

	$('#download').hide();

	$('#file-dialog').change(function(){
		if(this.files.length > 0){
			$('#img-list').html('');

			$.each(this.files, function(key, file){
				var reader = new FileReader();
				reader.fileId = key;

				reader.onload = function(e){
					$('#img-list').append(
						$('<div></div>').attr('data-id', e.currentTarget.fileId).attr('class', 'col-lg-3 col-md-4 col-sm-6 col-xs-12 item').append(
							$('<div></div>').addClass('img-container').append(
								$('<img>').attr('src', e.target.result)
							)
						).append(
							$('<div></div>').addClass('category-container').append(
								$('<input>').attr('type', 'text').attr('placeholder', 'Категория').attr('value', 'Разное').addClass('form-control').addClass('col-lg-12').attr('name', 'file['+ e.currentTarget.fileId +']')
							)
						).append(
							$('<div></div>').addClass('urlext-container').append(
								$('<input>').attr('type', 'text').attr('placeholder', 'URL').attr('value', 'http://').addClass('form-control').addClass('col-lg-12').attr('name', 'url_ext['+ e.currentTarget.fileId +']')
							)
						)
					);
				};

				reader.readAsDataURL(file);
			});

			$('#download').show();
		}
	});


});