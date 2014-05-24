<div class="login_block">
  <?php
    if (isset($error)):
      tplRenderPartial('error', array('error' => $error));
    endif;
  ?>
  <h2>Добавление нового сайта</h2>
  <form method="post">
    <div class="fields">
      <div class="field">
        <label for="login">
          url
        </label>
        <p class="inp">
          <input placeholder="http://site.com" type="text" name="url" id="url">
        </p>
      </div>
      <div class="field">
        <input type="submit" value="Добавить">
      </div>
    </div>
  </form>
</div>