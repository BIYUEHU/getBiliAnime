//Config
const uid = 293767574;

let httpRequest = new XMLHttpRequest();
let url = "http://82.157.165.201/api/getbilianime?uid=" + uid;
httpRequest.open('GET', url, true);
httpRequest.send();
httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        let result = httpRequest.responseText;
        result = JSON.parse(result);
        let nums = result.data.nums;
        let listData = result.data.list;

        let back = '';
        for (let i = 0; i < listData.length; i++) {
            let listDataTemp = listData[i];

            let { title, subtitle, descr, cover, setnum, showtime, badge } = listDataTemp;

            switch (badge) {
                case '独家':
                    badge = `<span style="background-color:#00C0FF;color:#FFFFFF">${badge}</span>`;
                    break;
                case '出品':
                    badge = `<span style="background-color:#00C0FF;color:#FFFFFF">${badge}</span>`;
                    break;
                case '会员专享':
                    badge = `<span style="background-color:#FB7299;color:#FFFFFF">${badge}</span>`;
                    break;
                case '限时免费':
                    badge = `<span style="background-color:#FB7299;color:#FFFFFF">${badge}</span>`;
                    break;
                default:
            }

            let tagsTemp = listDataTemp.tags;
            let max, tags;

            tagsTemp.length > 5 ? max = 5 : max = tagsTemp.length;
            for (let a = 0; a < max; a++) {
                if (a == 0) {
                    tags = tagsTemp[0];
                }
                tags = tags + '、' + tagsTemp[a];
            }

            back = back + `<section style="margin-bottom: 15px">
<joe-card-default label="${title}" width="50"><span class="_temp" style="display: none"><br><strong>${title}</strong> ${subtitle}<br>${descr}<span style="display: block;" data-fancybox="Joe" href="${cover}"><img src="${cover}" height="300px"></span><br></span><span class="_content" style="display: block;">
        <div class="joe_card__default" style="width: 50">
            <div class="joe_card__default-title">${badge} <strong>${title}</strong> <span style="color:purple">${subtitle}</span></div>
            <div><span style="color:orange"><strong>标签:</strong>${tags}</span><br>
            ${descr}<span style="display: block;" href="${cover}"><img src="${cover}" height="200px"></span></div>
            <i><span style="color:red">${setnum}</span> ${showtime}</i>
        </div>
    </span></joe-card-default>
</section>`;
        }
        document.getElementById('animeInfo').innerHTML = `<h2><strong style="color:pink">UID:${uid}</strong> 的追番列表 <span style="color:red">总计:${nums}部</span></h2>` + back;
    }
}