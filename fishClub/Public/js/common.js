var setRootFontSize = function () {
    //rem布局设置宽高比
    //没有的到信息，目前按照宽1920时100像素等比缩放
    var html = document.getElementsByTagName('html')[0];
    var needWidth = 0;
    if (window.innerWidth)
        needWidth = window.innerWidth;
    else if ((document.body) && (document.body.clientWidth))
        needWidth = document.body.clientWidth;
    else if (document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth)
        needWidth = document.documentElement.clientWidth;
    html.style.fontSize = 100 / 1920 * needWidth + 'px';
}
