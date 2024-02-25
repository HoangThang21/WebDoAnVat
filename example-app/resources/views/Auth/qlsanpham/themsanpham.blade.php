@include('layoutsAdmin.top')

		@if (Auth::guard('api')->check())
        <div>
            <h3>Thêm sản phẩm</h3>
            <div>
              <form method="post" action="/Administrator/themsanpham" enctype="multipart/form-data" >
                @csrf
                {{-- @method('POST') --}}
                <div class="my-3">
                  <input class="form-control"  type="text" name="txttensp" placeholder="Tên sản phẩm" required></div>
                <div class="my-3">        
                    <input class="form-control" type="number" name="txtgia" placeholder="Giá" required>
                </div>             
                <div class="my-3">        
                    <input class="form-control" type="file" name="txthinh"  required>
                </div>
                <div class="my-3">        
                    {{-- <textarea class="form-control" name="txtmota" placeholder="Mô tả">
                        Mô tả
                    </textarea> --}}
                    <p><label for="txtmota">Mô tả:</label></p>
                    <textarea class="form-control" name="txtmota" id="txtmota"></textarea>
                </div>    
                <div class="my-3">        
                    <input class="form-control" type="number" name="txtslton" placeholder="Số lượng tồn" required>
                </div> 
                <div class="my-3">        
                    <input class="form-control" type="number" name="txtdaban" placeholder="Đã bán" required>
                </div> 

                <label>Danh mục</label>
                <select class="form-control" name="optloaind">                
                    <option value="1">Quản trị</option>
                    <option value="2" selected>Thành viên</option>
                    <option value="3">Khách hàng</option>
                </select></div>
            
                <div class="my-3">
                {{-- <input type="hidden" name="action" value="xlthem" > --}}
                <input class="btn btn-primary"  type="submit" value="Thêm">
                <input class="btn btn-warning"  type="reset" value="Hủy"></div>
              </form>          
            </div>

          </div>
		@endif

@include('layoutsAdmin.bottom')