// コンソール隠し要素
window.onload = function(){
    console.log("%c 256ch", "font-size: 50px; color: blue; text-shadow: 3px 3px 0 rgb(217,31,38) , 6px 6px 0 rgb(226,91,14) , 9px 9px 0 rgb(245,221,8) , 12px 12px 0 rgb(5,148,68) , 15px 15px 0 rgb(2,135,206) , 18px 18px 0 rgb(4,77,145) , 21px 21px 0 rgb(42,21,113)");
}

function scroll_effect() {
	var element = document.getElementsByClassName('scroll-up');
	if (!element) return;

	var scrollY = window.pageYOffset;
	var windowH = window.innerHeight;
	var showTiming = 200; // 要素を表示するタイミング
	for (var i = 0; i < element.length; i++) {
		var elemClientRect = element[i].getBoundingClientRect();
		var elemY = scrollY + elemClientRect.top;
		if (scrollY > elemY - windowH + showTiming) {
			element[i].classList.add('is-show');
		}
	}
}
window.addEventListener('scroll', scroll_effect); // スクロール時に実行
