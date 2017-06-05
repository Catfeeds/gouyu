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

$(function()
	{
		if(total<=page_num)
		{
			$(".pullUpIcon").hide();
			$(".pullUpLabel").html("没有更多了");
		}
	});

var num = 1; //次数
function pullUpAction () { //加载方法
  // setTimeout(function () {
    var sourceNode = $("#new_list"); // 获得被克隆的节点对象
    if(total > num*page_num){
      $.post('/FrontUser/ajax_my_treasure', {"firstRow":num*page_num}, function(data, textStatus) 
       {
        if (data != 'failure')
        {
          var len = data.length;
          var html = '';
          var i;
          for (i = 0; i < len; i++)
          {
              if (!data[i].award_user_name) {
                  data[i].award_user_name = '--';
              }
              if (data[i].is_open == 1) {
                  if (data[i].lottery == 0) {
                        var look_open ='';
                        var href_detail ='';
                       var is_open = '<h2 class="already fr">已退款</h2>';
                  } else {
                      var look_open = '<h2 class="hint fr">开奖详情</h2>';
                      var is_open = '<h1 class="fl">获得者：'+data[i].award_user_name+'</h1>';
                      if (data[i].award_user_id == data[i].user_id) {
                          is_open += '<h2 class="already fr">已中奖</h2>';
                          if (data[i].is_deliver == 1) is_open += '<h2 class="already fr">已领取</h2>';
                      } else {
                          is_open += '<h2 class="already fr">已开奖</h2>';
                      }
                      var href_detail = 'href="/FrontTreasure/draw_prize_detail/draw_prize_id/'+data[i].draw_prize_id;
                  }
              } else {
                  var look_open = '';
                  var is_open = '<h1 class="fl">获得者：？</h1><h2 class="not fr">等待开奖</h2>';
                  var href_detail ='href="/FrontTreasure/treasure_detail/treasure_id/'+data[i].treasure_id+'"';
              }
              if (!data[i].prize_name) {
                  data[i].prize_name = '--';
              }
              if (!data[i].periods) {
                  data[i].periods= '0';
              }
              if (!data[i].times) {
                  data[i].times= '1';
              }
              html += '<li class="snatch_li">'+
                  '<a class="clearfix" '+href_detail+'">'+
                  '<div class="cont1 clearfix">'+
                  '<img src="'+data[i].img_path+'" class="fl"/>'+
                  '<div class="txt_box fl">'+
                  '<h1>'+data[i].prize_name+'</h1>'+
                  '<h2>参与期号：第'+data[i].periods+'期</h2>'+
                  '<h3>我已参与：<span>'+data[i].times+'</span>人次</h3>'+
                  '</div>'+
                  look_open+
                  '</div>'+
                  '<div class="cont2 clearfix">'+
                  is_open+
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
      $(".pullUpIcon").hide();
      $(".pullUpLabel").html("没有更多了");
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
