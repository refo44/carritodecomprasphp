var inicio = function () {

	$(".cantidad").keyup(function (e) {
		if ($(this).val != '') {
			if (e.keyCode == 13) {

				var id = $(this).attr('data-id');
				var precio = $(this).attr('data-precio');
				var index = $(this).attr('data-index');

				var cantidad = $(this).val();

				$(this).parentsUntil('.productos').find('.subtotal').text("Subtotal: " + (precio*cantidad));


				$("#quantity_"+index).val(cantidad);  // change hidden input quantity

			

				$.post('./js/modificarDatos.php', {

					Id: id,
					Precio: precio,
					Cantidad: cantidad

				}, function(data) {
					/*optional stuff to do after success */

					$("#total").text('Total: ' + data);

				});
			}
		}
	});

	$(".eliminar").click(function(e) {
		e.preventDefault();

		var id = $(this).attr('data-id');
		$(this).parentsUntil(".productos").remove();

		$.post("./js/eliminar.php",{

			Id:id

		},function (a) {
			
			if (a == '0') {
				location.href='./carritodecompras.php';
			}
		}); 

	});

	$("#formulario").submit(function(event) {
		
		$.get('./compras/compras.php', function(data) {
			
	
		}).fail(function () {
			event.preventDefault();
			console.log("error al enviar el formulario");
		});
	});
}

$(document).ready(function() {

	inicio();
	
});