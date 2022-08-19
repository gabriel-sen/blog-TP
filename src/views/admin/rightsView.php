<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">Username</th>
      <th scope="col">email (login)</th>
      <th scope="col">Rôle</th>
      <th scope="col">is valid</th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <?php if($user['role'] === "admin") : ?>
                    <?php echo $user['role']; ?>
                    <?php else : ?>
                        <form method="POST" action="<?= URL ?>admin/validateUpdateRole">
                            <input type="hidden" name="login" value="<?=$user['email']?>" >
                            <select class="form-select" name="role" onchange="confirm('confirmez-vous la modification?') ? submit() : document.location.reload()">
                                <option value="user"<?=$user['role'] === "user" ? "selected" : ""?>>Utilisateur</option>
                                <option value="admin"<?=$user['role'] === "admin" ? "selected" : ""?>>Admin</option>
                        </form>
                <?php endif ?>
            </td>
            <td>
                <?php 
                    if ((int)$user['is_valid'] === 0){
                            echo "non activé";
                            }elseif((int)$user['is_valid'] === 1){
                                echo "activé";
                            } 
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>


