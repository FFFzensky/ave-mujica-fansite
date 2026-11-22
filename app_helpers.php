<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function require_login(): void {
    if (!isset($_SESSION['login_user']) || $_SESSION['login_user'] === '') {
        header('Location: login.php');
        exit();
    }
}

function handle_logout_request(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}

function h(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function fetch_comments(mysqli $conn, int $pageId): array {
    $sql = 'SELECT id, username, comment, created_at FROM comments WHERE page_id = ? ORDER BY created_at DESC';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $pageId);
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = [];

    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    $stmt->close();
    return $comments;
}

function render_comments(array $comments, int $pageId, string $deleteScript): void {
    if (count($comments) === 0) {
        echo '<p class="empty-state">Belum ada komentar. Jadilah yang pertama kirim komentar.</p>';
        return;
    }

    echo '<div class="comment-list">';
    foreach ($comments as $row) {
        $owner = isset($_SESSION['login_user']) && $_SESSION['login_user'] === $row['username'];
        echo '<article class="comment-item">';
        echo '<div class="comment-item__top">';
        echo '<strong>' . h($row['username']) . '</strong>';
        echo '<span>' . date('d-m-Y H:i:s', strtotime($row['created_at'])) . '</span>';
        echo '</div>';
        echo '<p>' . nl2br(h($row['comment'])) . '</p>';
        if ($owner) {
            echo '<a class="delete-link" href="' . h($deleteScript) . '?comment_id=' . (int) $row['id'] . '&page_id=' . $pageId . '">Hapus</a>';
        }
        echo '</article>';
    }
    echo '</div>';
}
?>