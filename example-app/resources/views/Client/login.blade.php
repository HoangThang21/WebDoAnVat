@include('layoutsClient.top')


<div class="login-page">

</div>
<div class="container-fluid mt-20 p-4 login-form">
  <form class="d-flex flex-column">
    <h2 class="d-flex justify-content-center">Đăng nhập</h2>
    <hr>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email của bạn" required>

    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" required>
    </div>
    
    <p>Chưa có tài khoản?<a href="/register"><span> Đăng ký</span></a></p>
    <hr>
    <div class="d-flex flex-column">
      <button type="submit" class="btn btn-primary btn-login">Đăng nhập</button>
    <p>------------------- Hoặc -------------------</p>
    <button type="submit" class="btn btn-primary btn-google">
      <img src="../../img/search.png" alt="">
        Đăng nhập với Google
    </button>
    
    </div>
    
  </form>
</div>



@include('layoutsClient.bottom')