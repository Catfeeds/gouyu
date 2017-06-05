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
      $.post('/FrontUser/ajax_account_list', {"firstRow":num*page_num}, function(data, textStatus) 
       {
        if (data != 'failure')
        {
          var len = data.length;
          var html = '';
          var i;
          for (i = 0; i < len; i++)
          {
              if (data[i].amount_money < 0) {
                  var money = '<p class="lessen">'+system_money_name+data[i].amount_money+'<br></p>';
              } else {
                  var money = '<p class="add">'+system_money_name+data[i].amount_money;
                  if (data[i].change_type == 13 || data[i].change_type == 14) money += '<br><span>(含赠送鱼翅)</span>';
                  money += '</p>';
              }
              if (data[i].remark) {
                  if (data[i].remark.length > 20) data[i].remark = data[i].remark.substring(0, 20);
                  var remark = '<span>'+data[i].remark+'</span>';
              } else {
                  var remark = '';
              }
              html += '<li class="money_list_li clearfix">'+
                  '<a href="javascript:;" class="clearfix">'+
                  '<div class="left_box fl">'+
                  '<h1>'+data[i].change_type_name+remark+'</h1>'+
                  '<h2>'+data[i].addtime+'</h2>'+
                  '</div>'+
                  '<div class="right_box">'+
                  money +
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
