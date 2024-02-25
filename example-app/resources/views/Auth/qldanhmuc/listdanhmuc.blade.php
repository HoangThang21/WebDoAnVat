@include('layoutsAdmin.top')
@if (Auth::guard('api')->check())
				<!-- Nút mở hộp modal chứa form thêm mới -->
				<div><a class="btn btn-primary" href="/Administrator/themdanhmuc"><span class="glyphicon glyphicon-plus"></span> Thêm danh mục</a></div>
		  
				<br>
			  
				<!-- Danh sách người dùng -->
				<table class="table table-hover">
					  <tr>
					  <th>Tên</th>
					  <th>Hình</th>
					  
					</tr>
					<?php foreach ($danhmuc as $dm): ?>
					  <tr><td>{{  $dm["tendanhmuc"] }}</td>
						  <td><img src="../../img/{{ $dm['hinh'] }}" width="80" class="img-thumbnail"></td>
						  <td>{{ $dm['name'] }}</td>
						<td>

						<?php 
					endforeach; ?>
				</table>
			  
	
	   
		@endif
@include('layoutsAdmin.bottom')