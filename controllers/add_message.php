    <?php

require_once(__DIR__ . '/../model/Sanitizer.php');
require_once(__DIR__ . '/../model/ReaderMessages.php');
require_once(__DIR__ . '/../model/WriterMessages.php');
require_once(__DIR__ . '/../model/FilterMessages.php');

// Обработка POST-запроса для добавления сообщения
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = trim($_POST['nickname'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $timestamp = $_POST['timestamp'] ?? 0;

    if ($nickname === '' || $message === '') {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'error' => 'Ник и сообщение обязательны']);
        exit;
    }

    $nickname = Sanitizer::sanitize_message($nickname);
    $message = Sanitizer::sanitize_message($message);

    $messages = ReaderMessages::read_messages(0); // fetch all

        // Добавляем новое сообщение
    $messages[] = [
        'timestamp' => $_POST['timestamp'],
        'nickname' => $nickname,
        'message' => $message,
    ];

    $messages = FilterMessages::cutLast($messages);
    WriterMessages::write_messages($messages);
    header("Content-Type: application/json");
    echo json_encode(['status' => 'ok']);
    exit;
}

?>
