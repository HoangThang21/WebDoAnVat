@include('layoutsAdmin.top')

@if (Auth::guard('api')->check())
				<!-- Nút mở hộp modal chứa form thêm mới -->
				<div><a class="btn btn-primary" href="/Administrator/themsanpham"><span class="glyphicon glyphicon-plus"></span> Thêm sản phẩm</a></div>
		  
				<br>
			  
				<!-- Danh sách người dùng -->
				<table class="table table-hover">
					  <tr>
					  <th>Tên</th>
					  <th>Giá</th>
                      <th>Hình ảnh</th>
                      <th>Mô tả</th>
                      <th>Đánh giá</th>
                      <th>Số lượng tồn</th>
					  <th>Đã bán</th>
					</tr>
                    
					<?php foreach ($sanpham as $sp): ?>
					  	<tr>
							<td>{{  $sp["tensanpham"] }}</td>
							<td>{{ $sp['gia'] }}</td>
							<td><img src="../../img/{{ $sp['hinh'] }}" width="80" class="img-thumbnail"></td>
							<td>{{ $sp['mota'] }}</td>
							<td>{{ $sp['danhgia'] }}</td>
							<td>{{ $sp['soluongton'] }}</td>
							<td>{{ $sp['soluongdaban'] }}</td>
						<tr>
						<?php 
					endforeach; ?>
				</table>
		@endif

@include('layoutsAdmin.bottom')