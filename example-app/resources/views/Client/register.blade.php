@include('layoutsClient.top')


<div class="login-page">

</div>
<div class="container-fluid mt-20 p-5 login-form">
  <form class="d-flex flex-column">
    <h2 class="d-flex justify-content-center">Đăng ký</h2>
    <hr>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email của bạn" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" required>

      <label for="exampleInputPassword1" class="form-label mt-3">Xác nhận mật khẩu</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Xác nhận mật khẩu" required>
    </div>
    <hr>
    <p>Đã có tài khoản?<a href="/register"> <span>Đăng nhập</span></a></p>
    <hr>
    <button type="submit" class="btn btn-primary btn-login">Đăng ký</button>
  </form>
</div>

@include('layoutsClient.bottom')