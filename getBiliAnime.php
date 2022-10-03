<?php
/*
 * @Author: BIYUEHU biyuehuya@qq.com
 * @Blog: http://imlolicon.tk
 * @Date: 2022-10-02 21:22:06
 */
header('Access-Control-Allow-origin: *');
header('Content-type: application/json');

$uid = trim($_GET['uid']);

$page = 1;
$request = file_get_contents('http://api.bilibili.com/x/space/bangumi/follow/list?type=1&pn=' . $page . '&ps=30&vmid=' . $uid);
$request = json_decode($request);

$judge = count($request->data->list);
$animeDataAll = [];
$nums = 0;
$code = 501;

if ($uid != null) {
    $code = 500;
    while ($judge > 0) {
        $nums = $judge + $nums;
        for ($i = 0; $i < $judge; $i++) {
            $animeDataTemp = ($request->data->list)[$i];
            $animeData = array(
                'type' => $animeDataTemp->season_type_name,
                'title' => addslashes($animeDataTemp->title),
                'subtitle' => addslashes($animeDataTemp->subtitle),
                'tags' => $animeDataTemp->styles,
                'descr' => addslashes($animeDataTemp->evaluate),
                'cover' => ($animeDataTemp->cover),
                'setnum' => $animeDataTemp->new_ep->index_show,
                'isnew' => $animeDataTemp->isnew,
                'showtime' => $animeDataTemp->publish->release_date_show,
                'areas' => ($animeDataTemp->areas)[0]->name,
                'badge' => $animeDataTemp->badge
            );
            array_push($animeDataAll, $animeData);
        }

        $page = $page + 1;
        $request = file_get_contents('http://api.bilibili.com/x/space/bangumi/follow/list?type=1&pn=' . $page . '&ps=30&vmid=293767574');
        $request = json_decode($request);

        $judge = count($request->data->list);
    }
}

$result = array(
    'code' => $code,
    'data' => array(
        'uid' => $uid,
        'nums' => $nums,
        'list' => $animeDataAll
    )
);

echo stripslashes(urldecode(json_encode($result, 256)));
