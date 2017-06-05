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
      $.post('/FrontTreasure/ajax_award_record_by_prize', {"firstRow":num*page_num, "prize_id":prize_id}, function(data, textStatus) 
       {
        if (data != 'failure')
        {
          var len = data.length;
          var html = '';
          var i;
          for (i = 0; i < len; i++)
          {
              if (data[i].user_id == user_id) {
                  if (data[i].is_deliver == 1) {
                        var getwin = 'lottery_get';
                  } else {
                        var getwin = 'lottery_win';
                  }
              } else {
                    var getwin = '';
              }

              html += '<div class="lottery_box_cont clearfix '+getwin+'" onclick="redirect(\'/FrontTreasure/draw_prize_detail/draw_prize_id/'+data[i].draw_prize_id+'\')">'+
                  '<div class="lottery_left_box fl">'+
                  '<img src="'+data[i].headimgurl+'" />'+
                  '<p>'+data[i].nickname+'</p>'+
                  '</div>'+
                  '<div class="lottery_cont_box lottery_cont_box1 fl">'+
                  '<div class="lottery_round_outer">'+
                  '<div class="lottery_round_inside"></div>'+
                  '</div>'+
                  '</div>'+
                  '<div class="lottery_right_box lottery_right_box1 fr">'+
                  '<div class="lottery_right_top">'+
                  '第'+data[i].periods+'期(开奖时间'+data[i].ajax_addtime+')'+
                  '</div>'+
                  '<div class="lottery_right_bottom clearfix">'+
                  '<ul class="fl">'+
                  '<li>夺宝号码:<p>'+data[i].lottery+'</p></li>'+
                  '<li>本期参与:<p>'+data[i].people_use_times+'</p>人次</li>'+
                  '<li>夺宝成功率:<p>'+data[i].award_rate+'%</p></li>'+
                  '<li>参与总人次:<p>'+data[i].total_person_times+'</p>人次</li>'+
                  '</ul>'+
                  '<i class="icon right3x fr"></i>'+
                  '</div>'+
                  '</div>'+
                  '</div>';

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
