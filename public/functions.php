<?php

// 日本のタイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

// クライアントを取得
function getClient() {
    $client = new Google_Client();
    // スコープをカレンダーの読み取りに設定
    $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    // 認証設定
    $json_path =  $_ENV['AUTH_JSON_PATH'];
    $client->setAuthConfig($json_path);
    return $client;
}

// 曜日を日本語1文字で取得
function getWeek() {
    $today = date('w');
    $weekday = ['日','月','火','水','木','金','土'];
    return $weekday[$today];
}

function getPlan($schedule) {
    // 本日の予定を格納
    $plans = [];

    for($i = 0; $i < count($schedule); $i++) {
        $plan = getLineTemplateBody($schedule[$i]['startTime'], $schedule[$i]['endTime'], $schedule[$i]['summary']);
        array_push($plans, $plan);
    }

    return $plans;
}