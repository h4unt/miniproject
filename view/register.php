<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Đăng ký tài khoản</title>
</head>
<body class="text-center">
<style>
        html,
        body {
        height: 100%;
        }

        body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }
        .form-signin .checkbox {
        font-weight: 400;
        }
        .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
        }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

</style>
<form class="form-signin" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Đăng ký tài khoản</h1>
  <?php if(isset($msg)): ?>
    <div class="alert alert-<?php echo $msgType; ?>"><?php echo $msg; ?></div>
  <?php endif; ?>
  <label for="inputUsername" class="sr-only">Tên đăng nhập</label>
  <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Tên đăng nhập" required autofocus>


  <label for="inputEmail" class="sr-only">Địa chỉ email</label>
  <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="email@domain.com" required>


  <label for="inputPassword" class="sr-only">Mật khẩu</label>
  <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Nhập mật khẩu" required>

  <label for="inputRePassword" class="sr-only">Nhập lại mật khẩu</label>
  <input type="password" id="inputRePassword" name="inputRePassword" class="form-control" placeholder="Xác nhận lại mật khẩu" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>
  <hr>
  <a href="./?ctrl=user&act=login" class="btn btn-lg btn-outline-primary btn-block" type="submit">Đăng nhập</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>