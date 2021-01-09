<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Trang không tồn tại | {{ dev_title() }}</title>
      <link rel="icon" type="image/png" href="{{ dev_favicon() }}">
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
      <!-- Styles -->
      <style>
      html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
      }
      .full-height {
      height: 100vh;
      }
      .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
      }
      .position-ref {
      position: relative;
      }
      .code {
      border-right: 2px solid;
      font-size: 26px;
      padding: 0 15px 0 15px;
      text-align: center;
       position: relative;
       z-index: 1;
      }
      .message {
      font-size: 18px;
      text-align: center;
       position: relative;
       z-index: 1;
      }
      .material-icons{
          position: absolute;
          opacity: 0.1;
          font-size: 350px;
      }
      </style>
   </head>
   <body>
      <div class="flex-center position-ref full-height">
         <i class="material-icons">error_outline</i> <div class="code">404</div>
         <div class="message" style="padding: 10px;">
            Trang không tồn tại<br>
            <a style="text-decoration: none;color: #F44336;" href="{{ url('/') }}" title="Quay lại">Quay lại Trang Chủ</a>
         </div>
      </div>
   </body>
</html>