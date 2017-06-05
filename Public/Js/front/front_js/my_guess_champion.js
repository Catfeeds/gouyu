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
    console.log(num*page_num);
    if(total > num*page_num){
      $.post('/FrontUser/ajax_my_guess_champion', {"firstRow":num*page_num}, function(data, textStatus) 
       {
        if (data != 'failure')
        {
          var len = data.length;
          var html = '';
          var i;
          for (i = 0; i < len; i++)
          {
              if (data[i].is_over) {
                  data[i].prize_money = parseInt(data[i].prize_money);
                  if (data[i].win_team_id == -1) {
                      var guess_result = '退款';
                      var gain = '<span>退款：'+data[i].prize_money+system_money_name+'</span>';
                  } else {
                      var guess_result = data[i].win_team_name + '('+data[i].win_team_odds+')';
                      if (data[i].guess_champion_team_id == data[i].win_team_id) {
                          var gain = '<span>赢取：'+data[i].prize_money+system_money_name+'</span>';
                      }
                  }
              } else {
                var guess_result = '暂无';
              }

              if (data[i].add_money) {
                  data[i].add_money = parseInt(data[i].add_money);
              } else {
                  data[i].add_money = 0;
              }
              html += '<li class="record_li">'+
						'<a class="clearfix" href="/FrontGuess/guess_champion_info/guess_champion_id/'+data[i].guess_champion_id+'">'+
							'<div class="top clearfix">'+
                                '<h1 class="fl">'+data[i].ajax_addtime+'</h1>'+
							'</div>'+
							'<div class="cont">'+
                                '<h1>'+data[i].title+'</h1>'+
                                '<h2>竞猜：'+data[i].team_name+'('+data[i].odds+')</h2>'+
                                '<h2>结果：'+guess_result+
                                '<h3>投注：'+data[i].add_money+system_money_name+
                                gain+
                                '</h3>'+
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
