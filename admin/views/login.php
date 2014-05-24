<div class="login_block">
  <?php
    if (isset($error)):
      tplRenderPartial('error', array('error' => $error));
    endif;
  ?>
  <h2>Введите логин и пароль</h2>
  <form method="post">
    <div class="fields">
      <div class="field">
        <label for="login">
          Логин
        </label>
        <p class="inp">
          <input type="text" name="login" id="login">
        </p>
      </div>
      <div class="field">
        <label for="password">
          Пароль
        </label>
        <p class="inp">
          <input type="password" name="password" id="password">
        </p>
      </div>
      <div class="field">
        <input type="submit" value="Войти">
      </div>
    </div>
  </form>
</div>