var inicio = function () {

	$(".cantidad").keyup(function (e) {
		if ($(this).val != '') {
			if (e.keyCode == 13) {

				var id = $(this).attr('data-id');
				var precio = $(this).attr('data-precio');
				var cantidad = $(this).val();

				$(this).parentsUntil('.productos').find('.subtotal').text("Subtotal: " + (precio*cantidad));

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
}

$(document).ready(function() {

	inicio();
	
});