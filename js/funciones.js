function seleccionar_comuna (valor) {
  var region_id = valor;
  var respuesta = $.ajax({
  url: "comuna.php",
  method: "POST",
  data: { id : region_id },
  dataType: "html"
  });
  respuesta.done(function( html ) {
    $('#seleccion_comuna').html(html);
  });
}

function validaciones () {
  var si_envio = true;

  var nombre = $('#nombre').val();
  if (!nombre) {
    alert("El campo Nombre no puede estar vacío.");
    si_envio = false;
  }

  var alias = $('#alias').val();
  var alias_cant = alias.length;
  if (alias_cant < 5) {
    alert("El campo Alias no puede tener menos de 5 caractéres.");
    si_envio = false;
  }

  var rut = $('#rut').val();
  var si_rut = valida_rut();
  if (!rut || si_rut == false) {
    alert("El campo RUT no puede estar vacío y debe ser válido.");
    si_envio = false;
  }

  var email = $('#email').val();
  var si_email = valida_email();
  if (!email || si_email == false) {
    alert("El campo Email no puede estar vacío y debe ser válido.");
    si_envio = false;
  }

  var region = $('#region').val();
  if (region == 0) {
    alert("El campo Región no puede estar vacío.");
    si_envio = false;
  }

  var comuna = $('#comuna').val();
  if (comuna == 0) {
    alert("El campo Comuna no puede estar vacío.");
    si_envio = false;
  }

  var candidato = $('#candidato').val();
  if (candidato == 0) {
    alert("El campo Candidato no puede estar vacío.");
    si_envio = false;
  }

  var box_cant = $('.check:checked').length;
  if (box_cant < 2) {
    alert("En el campo 'Como se enteró de nosotros' debe marcar 2 como mínimo.");
    si_envio = false;
  }
  return si_envio;
}

function enviar() {
  $('#exito').html('');
  si_envio = validaciones();

  if (si_envio) {

    var nombre = $('#nombre').val();
    var alias = $('#alias').val();
    var rut = $('#rut').val();
    var email = $('#email').val();
    var region = $('#region').val();
    var comuna = $('#comuna').val();
    var candidato = $('#candidato').val();
    var web = $('#web').prop("checked");
    if (web) {
      web = 1;
    } else {
      web = 0;
    }
    var tv = $('#tv').prop("checked");
    if (tv) {
      tv = 1;
    } else {
      tv = 0;
    }
    var redes = $('#redes').prop("checked");
    if (redes) {
      redes = 1;
    } else {
      redes = 0;
    }
    var amigo = $('#amigo').prop("checked");
    if (amigo) {
      amigo = 1;
    } else {
      amigo = 0;
    }

    var respuesta = $.ajax({
    url: "votar.php",
    method: "POST",
    data: { nombre : alias , alias : alias , rut : rut , email : email , region : region , comuna : comuna, candidato : candidato , web : web , tv : tv , redes : redes , amigo : amigo},
    dataType: "html"
    });
    respuesta.done(function( html ) {
      $('#exito').html(html);
    });

  }

}

var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut : function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐","-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
            return false;
        var tmp     = rutCompleto.split('-');
        var digv    = tmp[1]; 
        var rut     = tmp[0];
        if ( digv == 'K' ) digv = 'k' ;
        
        return (Fn.dv(rut) == digv );
    },
    dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
            S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
    }
}

function valida_rut(){
    if (Fn.validaRut( $("#rut").val() )){
      return true;
    } else {
      return false;
    }
};

function valida_email () {
  var regex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9]+$/;
  var correo = $('#email').val();
  if (regex.test(correo)) {
    return true;
  } else {
    return false;
  }
}


jQuery(function($) {

  $('#alias').bind('keypress', function(event) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    }
  });

  $('#rut').bind('blur', function(event) {
    si_rut = valida_rut();
    if (si_rut) {
    } else {
      alert("El RUT ingresado no es válido");
      event.preventDefault();
      return false;
    }
  });

  $('#email').bind('blur', function(event) {
    si_email = valida_email();
    if (si_email) {
    } else {
      alert("El Email ingresado no es válido");
      event.preventDefault();
      return false;
    }
  });
})

