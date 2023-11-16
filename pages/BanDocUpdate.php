<div class="container-update">
    <h1>Cập nhật thông tin </h1>
    <form class="container-update-form" method="post">
        <label for="ma">Mã bạn đọc </label>
        <input type="text" name="ma" id="ma" disabled>

        <label for="ten">Tên bạn đọc</label>
        <input type="text" name="tenbandoc" id="tenbandoc" placeholder="Nhập tên bạn đọc" required>
        <div class="content-grid">
            <div class="content-grid-date">
                <label for="date">Ngày sinh</label>
                <input type="date" name="ngaysinh" id="date" required>
            </div>
            <div class="content-grid-gender">
                <label for="gioitinh">Giới tính</label>
                <select name="" id="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="content-grid-vilage">
                <label for="que">Quê</label>
                <input type="text" name="que" id="que" placeholder="Nhập quê" required>
            </div>
            <div class="content-grid-cmnd">
                <label for="cccd">CCCD/CMND</label>
                <input type="text" name="cccd" id="cccd" placeholder="Nhập CCCD/CMNN" required>
            </div>
            <div class="content-grid-phone">
                <label for="sdt">Số điện thoại</label>
                <input type="text" name="phone" id="" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="content-grid-email">
                <label for="email">Email</label>
                <input type="text" name="email" id="" placeholder="Nhập email" required>
            </div>
        </div>
        <div class="container-update-btn">
            <button type="submit">Cập nhật</button>
        </div>
    </form>
</div>