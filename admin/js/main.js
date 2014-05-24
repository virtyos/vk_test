var  Main = {
  init: function() {
    this.fireInifiniteScroll('listSites', 'sitesList.php');
    this.fireInifiniteScroll('listUsers', 'usersList.php');
  },
  
  fireInifiniteScroll: function(elId, url) {
    $el = $('#'+elId);
    $el.find('.list_container').bind('scroll', function(e) {
      if ($('#'+elId).find('.list_container span.scroll_top').length > 0) {
        return false;
      }
      if ($(this).scrollTop() + $(this).innerHeight() >= this.scrollHeight) {
        var lastId = $(this).find('li:last-child').attr('data-id');
        var obj = this;
        $.post(url, {lastId: lastId}, function(result) {
          result = $.parseJSON(result);
          if (result['html'] !== undefined) {
            $(obj).find('ul').append(result['html']);
          }
          else if (result['stop'] !== undefined) {
            $(obj).append('<span class="scroll_top"></span>');
          }
        })
      }
    });
  }
  
}

var SitePage = {
  init: function() {
    this.fireSiteDepthSave('site_depth_form');
    renderGraph('graph');
  },
  
  fireSiteDepthSave: function(formId) {
    $('#' + formId).bind('submit', function() {
      var depth = $('#depth').val();
      var siteId = global_params['site_id'];
      $.post('saveSiteDepth.php', {depth: depth, siteId: siteId}, function(result){
        result = $.parseJSON(result);
        if (result['status'] !== undefined) {
          $('#depth_result').text(result['status']);
          setTimeout(function(){$('#depth_result').empty();}, 3000);
        }
      })
      return false;
    })
  }
}



function renderGraph(container) {
    if (graphData.length < 1) {
      $('#'+container).text('Нет данных для статистики. Наверно, сайт еще никто никогда не посещал :(');
      return false;
    }
    var arrayOfData = [];
    for (key in graphData) {
      var countVisit = parseInt(graphData[key]['count_visit']);
      var countInterestVisit = parseInt(graphData[key]['count_interest_visits']);
      if (isNaN(countVisit)) {
        countVisit = 0;
      }
      if (isNaN(countInterestVisit)) {
        countInterestVisit = 0;
      }
      arrayOfData.push([[countVisit, countInterestVisit], graphData[key]['date_visit']]);
    }
    $('#'+container).jqBarGraph({ data: arrayOfData, colors: ['#1B3E69', '#122A47'], type: 'multi' }); 
}