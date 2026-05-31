<?php
// ----------------------------------------------------------------------
// 排行榜分數寫入 API
// 對應遊戲：#5
// game.json 的 score.pushUrl 會指向本檔案。
// 由 game-play.php 接收 iframe 遊戲的 postMessage 後，POST 過來。
//   POST: score（越大越好的整數）、display（顯示字串，可選）
//   玩家名稱一律由後端 session 取得，不信任前端。
// ----------------------------------------------------------------------
include_once "../../../api/db.php";   // 取得 $pdo 與 session
header('Content-Type: application/json; charset=utf-8');

$game_id = 5;   // 本資料夾對應的遊戲 id

// 必須登入才能記錄成績
if (empty($_SESSION['login']) || empty($_SESSION['name'])) {
    http_response_code(401);
    echo json_encode(['error' => '尚未登入，無法記錄成績'], JSON_UNESCAPED_UNICODE);
    exit;
}

$name  = $_SESSION['name'];
$score = (int)($_POST['score'] ?? 0);

try {
    $stmt = $pdo->prepare(
        "INSERT INTO scores (game_id, player_name, score) VALUES (?, ?, ?)"
    );
    $stmt->execute([$game_id, $name, $score]);

    echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => '分數寫入失敗'], JSON_UNESCAPED_UNICODE);
}
