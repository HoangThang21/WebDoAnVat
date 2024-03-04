@include('layoutsAdmin.top')
@if (Auth::guard('api')->check())
    <!-- Nút mở hộp modal chứa form thêm mới -->
    <!-- Danh sách người dùng -->
    <table class="table table-hover">
        <tr>
            <th>Tên người dùng</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>

        </tr>
        <?php foreach ($cart as $nd): ?>
        <tr>
            <td>{{ $nd['user_id'] }}</td>
            @foreach ($sanpham as $item)
                @if ($nd['id_sanpham'] == $item['id'])
                    <td>{{ $item['tensanpham '] }}</td>
                @endif
            @endforeach


            <td>{{ $nd['soluong'] }}</td>
        </tr>


        <?php endforeach; ?>
    </table>



@endif
@include('layoutsAdmin.bottom')
