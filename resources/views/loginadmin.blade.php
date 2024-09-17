<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <title>Document</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      body {
        display: flex;
        justify-content: center;
        align-items: content;
      }
      .nen {
        position: relative;
        width: 400px;
        height: 500px;

        background: pink;
        border-radius: 20px;
        padding: 40px;
        margin-top: 100px;
      }
      .chinh {
        display: flex;
        justify-content: center;
        align-items: content;
        width: 100%;
        height: 100%;
      }
      h1 {
        font-size: 30px;
        color: black;
        text-align: center;
      }
      .nhap{
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid ;
        }
        .nhap label{
            position: absolute;
            top:50%
            left:5px;
            transform:translateY(-50%);
            font-size:16px;
            color:black;
            pointer-events:none;
        }
        .nhap input{
            width: 320px;
            height: 40px;
            font-size: 16px;
            color:#fff;
            padding: 0 5px;
            background: transparent;
            border: none;
            outline: none;
        }
      .nho {
        margin: -5px 0 15px 5px;
      }
      .nho label {
        font-size: 14px;
      }
      .nho label input {
        accent-color: #0ef;
      }
      button {
        position: relative;
        width: 100%;
        height: 40px;
        background: #0ef;
        box-shadow: 0 0 10px #0ef;
        font-size: 16px;
        color: black;
        font-weight: 500;
        cursor: pointer;
        border-radius: 30px;
        border: none;
        outline: none;
      }
    </style>
  </head>
  <body
    style="
      background-image: url('img/nenlogin.jpg');
      background-repeat: no-repeat;
    "
  >
  <form action="{{ url('/loginadmin') }}" method="post">
    @csrf
    <div class="nen">
      <div class="row">
        <div class="row"><h1>Login</h1></div>
        <br />
        <div class="row">
          <div class="nhap">
            <label for="a">Tài khoản:</label>
            <br />
            <input
              type="text"
              id="tk"
              name="tk"
              placeholder="Nhập tên tài khoản"
            /><br /><br />
            <i class="bi bi-person-fill"></i>
          </div>
          <div class="nhap">
            <label for="b">Mật khẩu:</label>
            <br />
            <input
              type="text"
              id="mk"
              name="mk"placeholder="Nhập mật khẩu"
              /><br /><br />
              <i class="bi bi-key-fill"></i>
            </div>
            <div class="nho">
              <label for=""><input type="checkbox" /> Remember Me</label>
            </div>
            <div style="text-align: center; margin-top: 20px;">
              <input type="submit" value="Login" class="btn btn-dark" style="background-color: white; color: black;">
          </div>
          </div>
        </div>
      </div>
    </body>
  </form>
</html>