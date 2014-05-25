<script type="text/javascript">
  var global_params = {
    'user_id' : '<?php echo $user['id']?>'
  }
  $(function(){
    SitePage.init();
  })
</script>
<h2>
  <?php echo $user['ip']?> (<?php echo $user['user_agent']?>)
</h2>

<div class="graph_container">
  Статистика по просмотрам сайтов за неделю
  <br><br>
  <?php if (!empty($userStats)): ?>
  <table class="user_looked_table">
    <thead>
      <tr>
        <td>
          Сайт
        </td>
        <td>
          Просмотров
        </td>
        <td>
          Дата
        </td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($userStats as $k => $stat):?>
      <tr>
        <td>
          <?php if ($stat['site']):?>
            <a href="sitePage.php?site=<?php echo $stat['site']['id']; ?>"><?php echo $stat['site']['url']; ?></a>
          <?php endif;?>
        </td>
        <td>
          <?php echo $stat['count_visit']; ?>
        </td>
        <td>
          <?php echo $stat['date_visit']; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php else: ?>
    Данных нет. Наверно, пользователь еще ничего не посетил. Хотя это странно...
  <?php endif; ?>
</div>