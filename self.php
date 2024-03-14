<?php
// データベース接続情報
$dsn = 'mysql:host=localhost;dbname=git-test';
$username = 'root';
$password = '';

// PDOインスタンスの生成
try {
    $pdo = new PDO($dsn, $username, $password);
    // エラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'データベースに接続できませんでした。エラー: ' . $e->getMessage();
    exit;
}

if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    // フォームからのデータを取得
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // バリデーション：空白の場合はエラーメッセージを表示
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo '名前、メールアドレス、宛先、メッセージは必須項目です。';
    } else {
        // データベースに挿入するSQLクエリの準備
        $sql = "INSERT INTO comments (name, email, subject, message) VALUES (:name, :email, :subject, :message)";

        // プリペアドステートメントの準備
        $stmt = $pdo->prepare($sql);

        // パラメータをバインドして実行
        try {
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);
            $stmt->execute();
            echo 'データが正常に挿入されました。';
        } catch (PDOException $e) {
            echo 'データの挿入中にエラーが発生しました。エラー: ' . $e->getMessage();
        }
    }
} else {
    echo 'フォームデータが正しく送信されていません。';
}
// 接続を閉じる
$pdo = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git PHP SQL Test Task</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    justify-content: center;
    align-items: center;
    margin: 0px;
    padding: 0;
    min-height: 100vh;
    }
    /* コメントのスタイル */
    .comment {
        background-color: #EFE7BA;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        text-align: center; /* 中央に寄せる */
        max-width: 70%;
    }
</style>
</head>
<body>
    <h1>Git PHP SQL Test Task</h1>

    <!-- Profile & Introduction Section -->
    <section>
        <h2>Profile & Introduction</h2>
        <h3>藤沢 バステト</h3>
        <img src="./image/bastet.png" alt="bastet" width="200">
        <p>
        はじめまして、私は藤澤と申します。日々、家庭と仕事をバランスよくこなしながら、充実した生活を送っています。

        趣味の一つは動画鑑賞です。映画やドラマ、YouTubeなど、様々なジャンルの動画を楽しんでいます。特に、感動的なストーリーや興味深いドキュメンタリーに心惹かれます。また、新しい作品を見つけるために、時には映画館に足を運ぶこともあります。

        日常生活では、仕事に情熱を注ぎながらも、家族との時間を大切に過ごしています。夫とはお互いの支え合いながら、幸せな家庭を築いています。

        これからも、自分自身を成長させながら、家族や仲間と共に笑顔あふれる日々を過ごしていきたいと考えています。よろしくお願いします。
        </p>
    </section>
    <section>
        <h2>Profile & Introduction</h2>
        <h3>赤木 エジプトガン</h3>
        <img src="./image/egyptian.png" alt="egyptian" width="200">
        <p>
        訓練のため大阪に滞在中です。大阪に来てからカモにはまりました。
        
        カモは冬鳥で、最近はカモたちがだんだん飛び立っていっており、寂しく思っています。
        </p>
    </section>

    <!-- Contact Form Section -->
    <section>
        <h2>Contact Form</h2>
        <form action="self.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="subject">宛先:</label><br>
            <select id="subject" name="subject" required>
                <option value="all">全員</option>
                <option value="藤沢 バステト">藤沢 バステト</option>
                <option value="赤木 エジプトガン">赤木 エジプトガン</option>
            </select><br><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </section>

    <?php
// データベース接続情報
$dsn = 'mysql:host=localhost;dbname=git-test';
$username = 'root';
$password = '';

// PDOインスタンスの生成
try {
    $pdo = new PDO($dsn, $username, $password);
    // エラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'データベースに接続できませんでした。エラー: ' . $e->getMessage();
    exit;
}

// コメントをデータベースから取得するクエリを実行
try {
    $query = "SELECT * FROM comments";
    $stmt = $pdo->query($query);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'コメントの取得中にエラーが発生しました。エラー: ' . $e->getMessage();
    exit;
}

// コメントを表示するHTMLを生成
$comments_html = '';
foreach ($comments as $comment) {
    $comments_html .= '<div class="comment">';
    $comments_html .= '<p><strong>Name:</strong> ' . htmlspecialchars($comment['name']) . '</p>';
    $comments_html .= '<p><strong>Email:</strong> ' . htmlspecialchars($comment['email']) . '</p>';
    $comments_html .= '<p><strong>Subject:</strong> ' . htmlspecialchars($comment['subject']) . '</p>';
    $comments_html .= '<p><strong>Message:</strong> ' . htmlspecialchars($comment['message']) . '</p>';
    $comments_html .= '</div>';
}
?>

<!-- Display Comments Section -->
<section>
    <h2>Comments Received Today</h2>
    <div id="comment">
        <?php echo $comments_html; ?>
    </div>
</section>
</body>
</html>