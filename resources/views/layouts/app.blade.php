<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <title>JCL - TESTE</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
  @php
  @session_start();
  @endphp

  @include('layouts.header')
  @include('layouts.sidebar')

  @yield('content')

  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous"></script>

  <script>
    $('#cpf').mask('000.000.000-00', {
      onKeyPress: function(cpfcnpj, e, field, options) {
        const masks = ['000.000.000-000', '00.000.000/0000-00'];
        const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
        $('#cpfcnpj').mask(mask, options);
      }
    });

    $('#cpf1').mask('000.000.000-00', {
      onKeyPress: function(cpfcnpj, e, field, options) {
        const masks = ['000.000.000-000', '00.000.000/0000-00'];
        const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
        $('#cpfcnpj').mask(mask, options);
      }
    });

    function mascaraFone(event) {
      var valor = document.getElementById("telefone").attributes[0].ownerElement['value'];
      var retorno = valor.replace(/\D/g, "");
      retorno = retorno.replace(/^0/, "");
      if (retorno.length > 10) {
        retorno = retorno.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (retorno.length > 5) {
        if (retorno.length == 6 && event.code == "Backspace") {
          // necessário pois senão o "-" fica sempre voltando ao dar backspace
          return;
        }
        retorno = retorno.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (retorno.length > 2) {
        retorno = retorno.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        if (retorno.length != 0) {
          retorno = retorno.replace(/^(\d*)/, "($1");
        }
      }
      document.getElementById("telefone").attributes[0].ownerElement['value'] = retorno;
    }

    function mascaraFone1(event) {
      var valor = document.getElementById("whatsapp").attributes[0].ownerElement['value'];
      var retorno = valor.replace(/\D/g, "");
      retorno = retorno.replace(/^0/, "");
      if (retorno.length > 10) {
        retorno = retorno.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (retorno.length > 5) {
        if (retorno.length == 6 && event.code == "Backspace") {
          // necessário pois senão o "-" fica sempre voltando ao dar backspace
          return;
        }
        retorno = retorno.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (retorno.length > 2) {
        retorno = retorno.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        if (retorno.length != 0) {
          retorno = retorno.replace(/^(\d*)/, "($1");
        }
      }
      document.getElementById("whatsapp").attributes[0].ownerElement['value'] = retorno;
    }

    function mascaraFone2(event) {
      var valor = document.getElementById("telefone1").attributes[0].ownerElement['value'];
      var retorno = valor.replace(/\D/g, "");
      retorno = retorno.replace(/^0/, "");
      if (retorno.length > 10) {
        retorno = retorno.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (retorno.length > 5) {
        if (retorno.length == 6 && event.code == "Backspace") {
          // necessário pois senão o "-" fica sempre voltando ao dar backspace
          return;
        }
        retorno = retorno.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (retorno.length > 2) {
        retorno = retorno.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        if (retorno.length != 0) {
          retorno = retorno.replace(/^(\d*)/, "($1");
        }
      }
      document.getElementById("telefone1").attributes[0].ownerElement['value'] = retorno;
    }

    function mascaraFone3(event) {
      var valor = document.getElementById("whatsapp1").attributes[0].ownerElement['value'];
      var retorno = valor.replace(/\D/g, "");
      retorno = retorno.replace(/^0/, "");
      if (retorno.length > 10) {
        retorno = retorno.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (retorno.length > 5) {
        if (retorno.length == 6 && event.code == "Backspace") {
          // necessário pois senão o "-" fica sempre voltando ao dar backspace
          return;
        }
        retorno = retorno.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (retorno.length > 2) {
        retorno = retorno.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        if (retorno.length != 0) {
          retorno = retorno.replace(/^(\d*)/, "($1");
        }
      }
      document.getElementById("whatsapp1").attributes[0].ownerElement['value'] = retorno;
    }
  </script>
</body>

</html>