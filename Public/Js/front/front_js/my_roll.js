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
      $.post('/FrontUser/ajax_my_roll', {"firstRow":num*page_num}, function(data, textStatus) 
       {
        if (data != 'failure')
        {
          var len = data.length;
          var html = '';
          var i;
          for (i = 0; i < len; i++)
          {
              if (!data[i].is_open) {
                  var open_data = '<i class="icon time3x fl"></i>'+
                      '<h3 class="fl">即将揭晓</h3>'+
                      '<h2>{$item.left_time}</h2>';
              } else {
                  if (data[i].award_user_id == data[i].user_id) {

                      var open_data = '<i class="icon time3x fl"></i>'+
                          '<h3 class="fl">已开奖</h3>'+
                          '<h3 class="my_h3_color">已获奖</h3>'+
                          '<h4>开奖时间:'+data[i].ajax_open_time+'</h4>';
                  } else {

                      var open_data = '<i class="icon time_gray3x fl"></i>'+
                          '<h3 class="fl my_h3_grey">已开奖</h3>'+
                          '<h2 class="my_h2_grey">获得者:'+data[i].award_user_name+'</h2>'+
                          '<h4>开奖时间:'+data[i].ajax_open_time+'</h4>';
                  }
              }
                html += '<a href="/FrontTreasure/roll_detail/roll_id/'+data[i].roll_id+'" class="my_roll_box clearfix" >'+
                    '<img src="'+data[i].img_path+'" class="fl" />'+
					'<div class="my_roll_cont fl clearfix">'+
                        '<h1>'+data[i].roll_name+'</h1>'+
                        '<p>奖品:'+data[i].prize_name+'</p>'+
                        '<span>报名时间:'+data[i].ajax_addtime+'</span>'+
                        open_data+
					'</div>'+
				'</a>';
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
