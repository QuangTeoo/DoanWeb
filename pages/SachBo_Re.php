<div id="bore-main">
    <div id="bo-main">
        <h1>Mượn sách</h1>
        <form action="POST">
            <input type="hidden" name="action" value="muon">
            <div class="bo-element-container">
                <label for="mabandoc">Mã bạn đọc</label>
                <input type="text" name="mabandoc" id="mabandoc" placeholder="Nhập mã bạn đọc" required>
            </div>
            <div class="bo-element-container">
                <label for="masach">Mã sách</label>
                <input type="text" name="masach" id="masach" placeholder="Nhập mã sách" required>
            </div>
            <div class="bo-element-container">
                <label for="ngaytra">Ngày trả dự kiến</label>
                <input type="date" name="ngaytra" id="ngaytra" required>
            </div>
            <div class="bo-element-container">
                <button>Mượn sách</button>
            </div>
        </form>
    </div>
    <div id="re-main">
        <h1>Trả sách</h1>
        <form method="POST">
        <input type="hidden" name="action" value="tra">
            <div class="re-element-container">
                <label for="mabandoc">Mã bạn đọc</label>
                <input type="text" name="mabandoc" id="mabandoc" required placeholder="Nhập mã bạn đọc">
            </div>
            <div class="re-element-container">
                <label for="masach">Mã sách</label>
                <input type="text" name="masach" id="masach" required placeholder="Nhập mã sách">
            </div>
            <div class="re-element-container">
                <button>Trả sách</button>
            </div>
        </form>
    </div>
</div>