/*
* @Author: zhangfengjie
* @Date:   2016-04-01 16:57:34
* @Last Modified by:   Administrator
* @Last Modified time: 2016-04-26 16:38:34
*/

var myScroll,
  pullDownEl, pullDownOffset,
  pullUpEl, pullUpOffset,
   generatedCount = 0;
$(function(){
  if(total <= page_num){
      $('.pullUpIcon').hide();
      $('.pullUpLabel').html('没有更多了');
  }
})
var num = 1; //次数
function pullUpAction () { //加载方法
  // setTimeout(function () {
    var sourceNode = $("#new_list"); // 获得被克隆的节点对象
    if(total > num*page_num){
      $.post('/FrontGuess/ajax_guess_list', {"firstRow":num*page_num, "guess_type_id":guess_type_id}, function(data, textStatus) 
       {
        if (data != 'failure')
        {
          var len = data.length;
          var html = '';
          var i;
          for (i = 0; i < len; i++)
          {
		data[i].host_score = parseInt(data[i].host_score);
		data[i].guest_score = parseInt(data[i].guest_score);

              if (data[i].over == 3) {
                var start = 'start';
                var desc = '未开始';
              } else if (data[i].over == 2) {
                var start = 'doing';
                var desc = '进行中';
              } else {
                var start = 'over';
                var desc = '已结束';
              }
                var ajax_start_time = '<span>'+data[i].ajax_start_time+'</span>';

              if (data[i].is_over && data[i].host_score > data[i].guest_score) {
                 var win = '<span class="victory"></span>';
              } else {
                var win = '';
              }
              if (data[i].is_over && data[i].host_score < data[i].guest_score) {
                 var guest_win = '<span class="victory"></span>';
              } else {
                var guest_win = '';
              }

              if (data[i].guess_field_num || parseInt(data[i].bo) > 0) {

                  var guess_field_num = parseInt(data[i].bo) > 0 ? data[i].bo : data[i].guess_field_num;
                  var bo = '<div class="ronda_box">'+
                      '<div class="ronda_bg"></div>'+
                      '<h1 class="ronda_num">BO '+guess_field_num+'</h1>'+
                      '</div>';
              } else {
                    var bo = '';
              }

              html += '<li class="rel '+start+'">'+
                  '<a href="/FrontGuess/guess_info/guess_id/'+data[i].guess_id+'">'+
                  '<div class="clearfix top_box"><i class="icon2 sstime fl"></i><p class="fl">'+desc+ajax_start_time+'</p><h2 class="fl">'+data[i].guess_name+'</h2></div>'+
                  '<img src="/Public/Images/front/front_img/cai.png" class="abs cai"/>'+
                  '<div class="team_box clearfix">'+
                  '<div class="fl team_img_box">'+
                  '<img src="'+data[i].host_img_path+'" class="team_img" onerror="this.src=\'/Public/Images/front/front_img/img_lazy.jpg\';"/>'+
                  '<h1 class="team_name">'+data[i].host_team_name+'</h1>'+
                   win+
                  '</div>'+
                  '<div class="fr team_img_box">'+
                  '<img src="'+data[i].guest_img_path+'" class="team_img" onerror="this.src=\'/Public/Images/front/front_img/img_lazy.jpg\';"/>'+
                  '<h1 class="team_name">'+data[i].guest_team_name+'</h1>'+
                  guest_win+
                  '</div>'+
                  '<div class="clearfix">'+
                  '<div class="score_box clearfix">'+
                  '<p class="fl score_p">'+data[i].host_score+'</p>'+
                  '<i class="icon2 VS fl"></i>'+
                  '<p class="fl score_p">'+data[i].guest_score+'</p>'+
                  '</div>'+
                  bo+
                  '</div>'+
                  '</div>'+
                  '</a>'+
                  '</li>';

          }
          sourceNode.append(html);
          //$(".lazyload").lazyload({
          //  effect : "fadeIn",
          //  threshold : 200
          //});
          num ++;
        }
      }, 'json');
      setTimeout(function(){
        myScroll.refresh();
      },500);
      
    }
    else
    {
      $('.pullUpIcon').hide();
      $('.pullUpLabel').html('没有更多了');
    }
    
    //loadItemList(sourceNode); 
  // }, 500); // 加载完后界面更新方法
}

function loaded() {
  pullUpEl = document.getElementById('pullUp');
  pullUpOffset = pullUpEl.offsetHeight;

  myScroll = new iScroll('load_wrapper', {
    // useTransition: true,
    topOffset: pullDownOffset,
    onRefresh: function () {
      if (pullUpEl.className.match('loading')) {
        pullUpEl.className = '';
        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
      }
    },
    onScrollMove: function () {
       if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
        pullUpEl.className = 'flip';
        pullUpEl.querySelector('.pullUpLabel').innerHTML = '松手开始刷新...';
        this.maxScrollY = this.maxScrollY;
      } else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
        pullUpEl.className = '';
        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载...';
        this.maxScrollY = pullUpOffset;
      }
    },
    onScrollEnd: function () {
      if (pullUpEl.className.match('flip')) {
        pullUpEl.className = 'loading';
        pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
        pullUpAction(); // ajax call?
      }
    }
  });

  setTimeout(function () { document.getElementById('load_wrapper').style.left = '0'; }, 300);
}
//初始化控件
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
