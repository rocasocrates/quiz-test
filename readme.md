## Pruebas desarrollo Biduzz

Realizar un proceso de registro de un usuario:
- Los valores introducidos por el usuario se almacenarán en una base de datos [MySQL](https://www.mysql.com/).
- El registro mostrará errores de validación en el formulario (validar email y campos obligatorios).
- Al completar el registro se enviará un email al mismo usuario con los datos introducidos en el registro.

Realizar un proceso de pago integrando una plataforma de pago:
- La plataforma de pago a integrar será **[Stripe](https://stripe.com/docs/api)**.
- Una vez realizado el pago se guardará en base de datos un valor para establecer que el usuario ha pagado correctamente. 

Casos especiales:
- Se debe comprobar sin necesidad de enviar todo el formulario que el email del usuario no exista ya.
- Si un usuario se registra y luego no paga, el usuario no podrá registrarse de nuevo y tampoco podrá pagar (No hace falta contemplar este caso ya que no hay proceso de login).

* Los recursos para la maquetación están dentro de la carpeta assets_register


