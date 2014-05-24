<?php foreach ($users as $k=>$user): ?>
  <li data-id="<?php echo $user['id']; ?>">
    <a href="userPage.php?user=<?php echo $user['id']; ?>"><?php echo $user['ip']; ?> (<?php echo $user['user_agent']; ?>)</a>
  </li>
<?php endforeach;?>