<!-- 
* @Author: BIYUEHU biyuehuya@qq.com
* @Blog: http://imlolicon.tk
* @Date: 2022-10-02 22:37:23
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Page</title>
    <link rel="stylesheet" href="./card_style.css">
    <meta name="referrer" content="never">
</head>

<body>
    <div>
        <?php
        //Config
        $uid = 293767574;

        $listData = file_get_contents('http://82.157.165.201/api/getbilianime?uid=' . $uid);
        $listData = json_decode($listData);
        $nums = $listData->data->nums;
        $listData = $listData->data->list;

        $back = null;
        for ($i = 0; $i < count($listData); $i++) {
            $listDataTemp = $listData[$i];

            $title = $listDataTemp->title;
            $subtitle = $listDataTemp->subtitle;
            $descr = $listDataTemp->descr;
            $cover = $listDataTemp->cover;
            $setnum = $listDataTemp->setnum;
            $showtime = $listDataTemp->showtime;

            $badge = $listDataTemp->badge;
            switch ($badge) {
                case '独家':
                    $badge = "<span style=\"background-color:#00C0FF;color:#FFFFFF\">${badge}</span>";
                    break;
                case '出品':
                    $badge = "<span style=\"background-color:#00C0FF;color:#FFFFFF\">${badge}</span>";
                    break;
                case '会员专享':
                    $badge = "<span style=\"background-color:#FB7299;color:#FFFFFF\">${badge}</span>";
                    break;
                case '限时免费':
                    $badge = "<span style=\"background-color:#FB7299;color:#FFFFFF\">${badge}</span>";
                    break;
            }

            $tagsTemp = $listDataTemp->tags;

            count($tagsTemp) > 5 ? $max = 5 : $max = count($tagsTemp);
            for ($a = 0; $a < $max; $a++) {
                if ($a == 0) {
                    $tags = $tagsTemp[0];
                }
                $tags = $tags . '、' . $tagsTemp[$a];
            }

            $back = $back  . "<section style=\"margin-bottom: 15px\">
        <joe-card-default label=\"${title}\" width=\"50\"><span class=\"_temp\" style=\"display: none\"><br><strong>${title}</strong> ${subtitle}<br>${descr}<span style=\"display: block;\" data-fancybox=\"Joe\" href=\"${cover}\"><img src=\"${cover}\" height=\"300px\"></span><br></span><span class=\"_content\" style=\"display: block;\">
                <div class=\"joe_card__default\" style=\"width: 50\">
                    <div class=\"joe_card__default-title\">${badge} <strong>${title}</strong> <span style=\"color:purple\">${subtitle}</span></div>
                    <div><span style=\"color:orange\"><strong>标签:</strong>${tags}</span><br>
                    ${descr}<span style=\"display: block;\" href=\"${cover}\"><img src=\"${cover}\" height=\"200px\"></span></div>
                    <i><span style=\"color:red\">${setnum}</span> ${showtime}</i>
                </div>
            </span></joe-card-default>
        </section>";
        }
        echo "<h2><strong style=\"color:pink\">UID:${uid}</strong> 的追番列表 <span style=\"color:red\">总计:${nums}部</span></h2>";
        echo $back;
        ?>
    </div>
    <script>

    </script>

</body>

</html>