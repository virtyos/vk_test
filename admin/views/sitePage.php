<script type="text/javascript" src="/admin/js/jqBarGraph.js"></script><script type="text/javascript">  var global_params = {    'site_id' : '<?php echo $site['id']?>'  }  <?php    $graphData = array_map(function($item){       return array(        'date_visit' => $item['date_visit'],        'count_visit' => $item['count_visit'],        'count_interest_visits' => $item['count_interest_visits'],      );    }, $siteStats);  ?>  var graphData = <?php echo json_encode($graphData); ?>;  $(function(){    SitePage.init();  })</script><h2>  <?php echo $site['url']?> (<a href="<?php echo $site['url']?>" target="_blank">открыть</a>)</h2><form id="site_depth_form">    <div class="fields">      <div class="field">        <label for="depth" style="width: 170px;">          Глубина просмотра        </label>        <p class="inp">          <input value="<?php echo $site['look_depth']; ?>" style="width: 30px;" type="text" name="depth" id="depth">        </p>        <p class="inp" style="margin-left: 40px;">          <input  type="submit" value="Сохранить">          <span id="depth_result"></span>        </p>      </div>    </div>  </form><div class="iframe_code_container">  Код счетчика:  <br><br>  <textarea readonly="readonly" style="width: 424px; height: 69px;"><iframe  src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/counter.php?siteId=<?php echo $site['id']?>" width="1" height="1" scrolling="no" frameborder="0" marginwidth="0" marginheight="0"></iframe></textarea></div><div class="graph_container">  Статистика за последнюю неделю:  <br><br>  <div id="graph"></div>  <br>  <div class="colorSqw color_visit">    <span></span> - уникальные посещения  </div>  <div class="colorSqw color_interest_visit">    <span></span> - заинтересованные пользователи  </div></div>