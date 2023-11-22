<div class="main-listsach-table">
    <h1>Danh sách Sách</h1>
    <div class="search-box">
        <form method="get">
            <input type="hidden" name="page" value="sachlist">
            <input type="text" name="query" placeholder="Tìm kiếm..." required>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Thể Loại</th>
            <th>Tác giả</th>
            <th>Trạng thái mượn </th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <tr>
                <td>123456</td>
                <td>wibu</td>
                <td>anime</td>
                <td>Tèo</td>
                <td>Chưa mượn</td>
                <td>
                    <a href="?page=sachupdate">Sửa</a>
                    <a href="#">Xóa</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>