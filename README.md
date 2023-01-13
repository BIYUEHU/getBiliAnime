# getBiliAnime

获取B站用户的追番信息API
由世界上最好的语言PHP编写，推荐PHP版本7.0+。
数据当然源自阿b的官方api(用户追番页面里扒出来的，阿b看样子是不打算公开这个api)，但是原API的数据有亿点多还很杂乱，并且分批请求的数据，于是就简单修改有了这个，一次性请求获取到全部的数据

[#API演示](https://huliapi.xyz/iluh/getbilianime/)
[#糊狸博客](http://imlolicon.tk)
### 使用
想把你自己的实时追番页面扔到你的博客里？那你就看对地方
**Tree**
- web-page
	- card_js.html #追番页面(Valin JS版)
	- card_php.php #追番页面(PHP版)
	- card_style.css # 样式文件
- getBiliAnime.php #API本体
- README.md #自述文件

`card_js.html`和`card_php.php`两个文件随意选择一个，然后再加上`card-style.css`扔到同一个网站文件目录下即可使用

> 由于页面直接请求的HULIAP(糊狸自己的接口调用站)I，以后或许可能网站会炸导致接口请求失败，到时自己更改页面文件里的接口请求地址为你自己的就行	

**配置**
这还需要我教？打开对应文件配置即可

### 请求示例
```http
GET https://huliapi.xyz/api/getbilianime?uid=2&onlyanime=true
```
支持`GET`与`POST`两种请求方式
`onlyanime`参数表示是否屏蔽非日本地区动画(即国漫、美漫等)，默认false

### 返回数据示例
```json
{
	"code": 500,
	"message": "success",
	"data": {
		"uid": 2,
		"count": 73,
		"list": [{
			"type": "番剧",
			"title": "JOJO的奇妙冒险 石之海",
			"subtitle": "百年恩怨终结于此",
			"tags": ["热血", "奇幻", "战斗", "漫画改"],
			"descr": "西历2011年，美国·佛罗里达州。\n在与恋人兜风途中遇到了交通事故的空条徐伦，因被陷害而获刑15年。\n\n收容设施是州立绿海豚街重警备监狱——别名「水族馆」。\n深陷绝望之中的徐伦，在手握父亲所托的吊坠时...",
			"cover": "https://i0.hdslb.com/bfs/bangumi/image/14ccd8457a9b7351e7be1d87db2719791108ddc0.png",
			"setnum": "全38话",
			"isnew": false,
			"showtime": "2022年12月1日Part3",
			"areas": "日本",
			"badge": "独家"
		}, {
			"type": "番剧",
			"title": "Fate/kaleid liner 魔法少女☆伊莉雅 Prisma☆Phantasm",
			"subtitle": "伊莉雅化身魔法少女",
			"tags": ["日常", "奇幻", "搞笑", "校园", "魔法", "漫画改", "穿越"],
			"descr": "Fate/kaleid liner系列的角色穿越平行世界的大集合，原作监修的完全原创剧情，描绘少女们的另一个故事。...",
			"cover": "http://i0.hdslb.com/bfs/bangumi/image/cf7f1e0a95d6655fda51ab66295d6d7621feca0d.jpg",
			"setnum": "全1话",
			"isnew": false,
			"showtime": "2019年8月24日",
			"areas": "日本",
			"badge": "独家"
		}, {
			"type": "番剧",
			"title": "恋爱要在世界征服后",
			"subtitle": "不要战斗要恋爱！",
			"tags": ["奇幻", "战斗", "恋爱", "漫画改", "特摄"],
			"descr": "春季，樱花飞舞的某一天，一对懵懵懂懂的情侣在草地上并肩而坐。\n他们是相川不动和祸原死死美。\n但他们的真实身份其实是，冰冻战队冰果五战士的队长「红色冰果」和\n邪恶秘密组织月光的打手「死神公主」！\n原本互...",
			"cover": "http://i0.hdslb.com/bfs/bangumi/image/61e324e9ce28934e77e98a2502d988f89c74a119.jpg",
			"setnum": "全12话",
			"isnew": false,
			"showtime": "2022年4月8日",
			"areas": "日本",
			"badge": "会员专享"
		}, {
			"type": "番剧",
			"title": "魔法纪录 魔法少女小圆外传 第二季",
			"subtitle": "为了寻找失去的愿望",
			"tags": ["奇幻", "战斗", "魔法", "游戏改"],
			"descr": "愿望的代价，究竟是希望还是绝望——。",
			"cover": "http://i0.hdslb.com/bfs/bangumi/image/9eef1df9ab157be52d2c4d70d3500442f00cafc3.png",
			"setnum": "全12话",
			"isnew": false,
			"showtime": "2021年7月30日",
			"areas": "日本",
			"badge": "独家"
		}, {
			"type": "番剧",
			"title": "与变成了异世界美少女的好友一起冒险",
			"subtitle": "打败魔王变回男儿身",
			"tags": ["奇幻", "搞笑", "萌系", "漫画改"],
			"descr": "因自己不受欢迎找不到女朋友，而郁郁寡欢的32岁职场白领橘日向，借由异世界女神之力，和自幼玩伴&现完美精英的同事一起转移到了异世界！竟因女神的粗心，变为了超绝可爱金发美少女――!? \n为寻回自己原本的性...",
			"cover": "http://i0.hdslb.com/bfs/bangumi/image/314c9855b31b9acb35663598755243b87629a9f9.png",
			"setnum": "全12话",
			"isnew": false,
			"showtime": "2022年1月11日",
			"areas": "日本",
			"badge": "出品"
		}, 
		/* ..... */
		{
			"type": "番剧",
			"title": "食戟之灵",
			"subtitle": "用料理征服世界",
			"tags": ["热血", "美食"],
			"descr": "本作以名门料理学校“远月学园”为舞台，描绘了家里经营餐馆的幸平创真，以超越父亲城一郎为激励而日复一日地磨练自己的厨艺的故事。在初中毕业后考虑继承家业的他，却突然听闻父亲要关店数年并前往海外的消息。而后...",
			"cover": "http://i0.hdslb.com/bfs/bangumi/a48979a3e3196fc33df796132072c0bd171f4918.jpg",
			"setnum": "全24话",
			"isnew": false,
			"showtime": "2015年4月3日",
			"areas": "日本",
			"badge": "会员专享"
		}, {
			"type": "番剧",
			"title": "关于完全听不懂老公在说什么的事 第二季",
			"subtitle": "婚后生活这么有趣",
			"tags": ["少女", "日常", "泡面"],
			"descr": "众望所归的第二季！\n有个宅男老公也许也是一件挺有趣的事吧？热心于工作的OL“薰”是个普通人，而她的老公则是沉迷于某大型网路留言版的阿宅，故事就围绕着这样的夫妻日常展开~看看本季两人又会怎样花式秀恩爱吧...",
			"cover": "http://i0.hdslb.com/bfs/bangumi/b54707a72142398ec37c29245f9a59f7a467fa7f.jpg",
			"setnum": "全13话",
			"isnew": false,
			"showtime": "2015年4月2日",
			"areas": "日本",
			"badge": ""
		}]
	}
}