$(document).ready(function()
{
	$('.navbar-nav1 li a.dropdown-toggle1').click(function(e)
	{
		e.preventDefault();
		$(this).parent().toggleClass('open1');
	});
	$('[data-toggle="collapse"]').click(function()
	{
		var target = $(this).attr('data-target');
		$(target).toggleClass('in1');
	});
	/*****/
	$("#frm").submit(function(e){
        e.preventDefault();
        var dataString = 'id_concepto='+id_concepto+'&id_recibo='+id_recibo+'&id_user='+id_user+'&update_user='+update_user+'&unico='+unico; 
        $.ajax({
            type: "POST",
            url : "asigdedu-create",
            data : dataString,
            success : function(data){
                console.log(data);
            }
        },"json");

	});

	/******************/

	var form = $('.register_ajax');
	    form.bind("submit",function ()
	    {
	        $.ajax({
	            type: form.attr('method'),
	            url: form.attr('action'),
	            data: form.serialize(),
	            beforeSend: function(){
                    $('.before').append('<img src="assets/img/before.gif" />');
                },
	            complete: function(data){
	            	
	            },
	            success: function (data) {	
	            	$(".before").hide();
					$(".errors_form").html("");
					$(".success_message").hide().html("");
	            	if(data.success == false){
		            	var errores = "";
		            	for(datos in data.errors){
		            		errores += "<small class='error alert-danger'>" + data.errors[datos] + "</small> <br>";
		            	}
		            	$(".errors_form").html(errores)
		            }else{
		            	$(form)[0].reset();//limpiamos el formulario
		            	$(".success_message").show().html(data.message)
		            	location.reload();
					    	

					    $(".load_ajax").html()
		            }
	            },
	            error: function(errors){
	            	$(".before").hide();
					$(".errors_form").html("");
	            	$(".errors_form").html(errors);
	            }
	        });
	   		return false;
		});

/**********************/

});

