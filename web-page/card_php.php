<!--
 * @Author: Biyuehu biyuehuya@gmail.com
 * @Blog: http://imlolicon.tk
 * @Date: 2022-10-03 12:16:48
-->
<?php 
$Api = 'https://huliapi.xyz/api/getbilianime';
$Uid = 2;
$onlyAnime = true;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Uid . '的追番列表' ?></title>
    <link rel="shortcut icon" href="https://bilibili.com/favicon.ico">
    <link rel="stylesheet" href="./card_style.css">
    <meta name="referrer" content="never">
</head>

<body>
    <div>
        <?php
        $url = $Api . '?uid=' . $Uid . '&onlyanime='. ($onlyAnime === true ? 'true' : 'false');
        $listData = json_decode(file_get_contents($url));
        $listData = ($listData);
        $count = $listData->data->count;
        $listData = $listData->data->list;

        $back = null;
        foreach ($listData as $data) {
            $title = $data->title;
            $subtitle = $data->subtitle;
            $descr = $data->descr;
            $cover = $data->cover;
            $setnum = $data->setnum;
            $showtime = $data->showtime;

            /* badge处理 */
            $badgeList = array(
                '独家' => '<span style="background-color:#00C0FF;color:#FFFFFF">独家</span>',
                '出品' => '<span style="background-color:#00C0FF;color:#FFFFFF">出品</span>',
                '会员专享' => '<span style="background-color:#FB7299;color:#FFFFFF">会员专享</span>',
                '限时免费' => '<span style="background-color:#FB7299;color:#FFFFFF">限时免费</span>'
            );
            $badge = $badgeList[$data->badge] ?? '';

            /* 标签处理 */
            if (gettype($data->tags) == 'array') {
                $tags = '';
                foreach ($data->tags as $tag) {
                    $tags = $tags . '、' . $tag;
                }
                $tags = mb_substr($tags, 1);
            } else {
                $tags = '无';
            }

            $back = $back  . "<section style=\"margin-bottom: 15px\">
        <joe-card-default label=\"{$title}\" width=\"50\"><span class=\"_temp\" style=\"display: none\"><br><strong>{$title}</strong> {$subtitle}<br>{$descr}<span style=\"display: block;\" data-fancybox=\"Joe\" href=\"{$cover}\"><img src=\"{$cover}\" height=\"300px\"></span><br></span><span class=\"_content\" style=\"display: block;\">
                <div class=\"joe_card__default\" style=\"width: 50\">
                    <div class=\"joe_card__default-title\">{$badge} <strong>{$title}</strong> <span style=\"color:purple\">{$subtitle}</span></div>
                    <div><span style=\"color:orange\"><strong>标签:</strong>{$tags}</span><br>
                    {$descr}<span style=\"display: block;\" href=\"{$cover}\"><img src=\"{$cover}\" height=\"200px\"></span></div>
                    <i><span style=\"color:red\">{$setnum}</span> {$showtime}</i>
                </div>
            </span></joe-card-default>
        </section>";
        }

        echo "<h2><strong style=\"color:pink\">UID:{$Uid}</strong> 的追番列表 <span style=\"color:red\">总计:{$count}部</span></h2>";
        echo $back;
        ?>
    </div>

</body>

</html>