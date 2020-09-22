<div class="container">
<h2 class="mt-4">Danh sách người dùng</h2>
<hr/>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên đăng nhập</th>
      <th scope="col">Email</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($listUsers as $user):
  ?>
    <tr>
      <th scope="row"><?php echo $user->id; ?></th>
      <td><?php echo $user->username; ?></td>
      <td><?php echo $user->email; ?></td>
      <td><?php echo $user->birthday; ?></td>
      <td>
      <a href="./?ctrl=user&act=editUser&username=<?php echo $user->username; ?>" class="btn btn-sm btn-success">Sửa</a>
      <a href="./?ctrl=user&act=delUser&username=<?php echo $user->username; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muống xoá người này?')">Xoá</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>