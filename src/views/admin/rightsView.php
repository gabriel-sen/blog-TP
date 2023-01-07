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
                <form method="POST" action="<?= URL ?>admin/validateUpdateRole">
                    <input type="hidden" name="login" value="<?=$user['email']?>" >
                    <select class="form-select" name="role">
                      <option selected value="<?=$user['role']?>">
                          <?=$user['role']?>
                      </option>
                      <option value="user">
                        Utilisateur
                      </option>
                      <option value="admin">
                        Admin
                      </option>
                    </select>
                    <button type="submit" onchange="confirm('confirmez-vous la modification?') ? submit() : document.location.reload()"> valider</button>
                </form>
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


