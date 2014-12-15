<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Selçuk Üniversitesi Öğrenci Girişi</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">

            <div class="margin text-center">
                <img src="img/Logo1.png">
            </div>

            <div class="header">Giriş Bilgileri</div>
            <form action="index.html" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userid" class="form-control" placeholder="Öğrenci Numaranız" data-toggle="tooltip" data-placement="top" title="Selçuk Üniversitesi okul numaranızı giriniz."/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Öğrenci Şifreniz" data-toggle="tooltip" data-placement="top" title="Selçuk Üniversitesi Öğrenci Otomasyonu'na giriş yaptığınız şifrenizi giriniz."/>
                    </div>          

                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">Giriş Yap</button>  
                </div>
            </form>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

    </body>
</html>