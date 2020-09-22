<div class="container mt-4">
    <h2>Sửa người dùng</h2>
    <hr>
    <?php if(isset($msg)): ?>
    <div class="alert alert-<?php echo $msgType; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input type="text" class="form-control" value="<?php echo $getUser->username; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" name="inputEmail" id="inputEmail" class="form-control" value="<?php echo $getUser->email; ?>">
        </div>
        <div class="form-group">
            <label for="inputBirthday">Ngày sinh</label>
            <input type="date" name="inputBirthday" id="inputBirthday" class="form-control" value="<?php echo $getUser->birthday; ?>">
        </div>
        <div class="form-group">
            <label for="inputPassword">Mật khẩu mới</label>
            <input type="text" name="inputPassword" id="inputPassword" class="form-control">
            <span class="text-muted">Nhập nếu muối thay đổi mật khẩu</span>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Sửa</button>
        </div>
    </form>
</div>