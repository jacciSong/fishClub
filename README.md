# fishClub
基于thinkphp3.2开发的web项目，分为用户端和商家端，商家端主要负责商品维护和订单处理。用户在售鱼网站进行购物下单。

用户端：

注：为更好的介绍本系统的使用方法，事先在数据库中添加了一些测试数据
http://服务器IP地址（或者是设置好的域名）/fishClub/index.php/Home/Main/index.html

1.网站首页

首页向用户展示了商家提供的商品，点击每个商品可以看到商品详情，在商品详情页可以将该商品加入购物车。在首页的右上角提供了登录、注册、联系我们、查看购物车等功能。

2.登录，点击首页右上角的“sign in”即可

该页提供了返回商品首页的导航以及忘记密码的功能。

3.注册，点击右上角“create an Account”按钮即可


4.商品加入购物车，点击首页的商品即可进入

用户可以通过左上角的导航栏回到网站首页，点击“Add to Cart”即可将商品加入购物车。

5.查看购物车
点击右上角的“Cart”按钮即可

点击右下角的“Check Out”按钮，填写收货地址和优惠码（可不填）

点击“Continue to shipping”，可对订单信息进行复核。有问题的话，通过点击导航栏的“my order”进入个人订单，将有问题的订单删除，并重新下单。没有问题的话，填写支付信息，完成支付。
注：支付接口还没有接，现在的状态是默认支付成功，跳转页面。需要到以下路径的payForOrder.html中修改toPayForOrder方法，完成支付接口的对接。
“wampServer\wamp\www\fishClub\Application\Home\View\OrderDetail”

6．查看我的订单，登陆网站后点击右上角的姓即可进入


在我的订单中，可以查看历史订单和待付款订单，对于待付款订单可以继续支付，也可取消订单



商家端：

注：为更好的介绍本系统的使用方法，事先在数据库中添加了一些测试数据
商家端的访问入口网址：http:// 服务器IP地址（或者是设置好的域名）/fishClub/index.php/Admin/login/login.html  在谷歌浏览器中输入以上网址即可进入

1.登录商家端，账号为admin，默认密码为123456（登录系统后可以修改登录密码）

2.修改商家端登录密码，退出商家端登录

3.查看客户端已注册用户账号，以及重置客户端某用户的登录密码

4.商品信息维护

在该模块可以通过右上角的add按钮添加新的商品，也可以在Operate工具栏下修改已上传商品的信息以及删除已上传商品。
5.订单维护

在该模块可以通过切换不同的订单状态（待付款、待发货、已完成）查看不同种类的订单。商家有权查看和取消用户的待付款订单；对于待发货订单，在发货之后，商家需要在系统中将其设置为“已发货”；商家还可以查看已完成订单的详情。
6.联系管理

该模块主要用来服务客户端的“contact us”，以及忘记密码功能，商家可以修改现有的邮箱和手机号；
7.折扣管理

商家通过该模块为客户提供的优惠码。可添加新的优惠码，也可以修改现有优惠码的优惠折扣，以及删除优惠码
