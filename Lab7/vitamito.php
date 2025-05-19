<?php
function getDBConn() {
    $mysqli = new mysqli(
        hostname: 'db',
        username: 'root',
        password: 'byeworld',
        database: 'vitamito'
    );

    if ($mysqli->connect_errno) {
        die("������ �����������: " . $mysqli->connect_error);
    }
    return $mysqli;
}

function addGood($email, $title, $description, $category) {
    $mysqli = getDBConn();
    $stmt = $mysqli->prepare("INSERT INTO doska (email, title, description, category) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $title, $description, $category);
    $stmt->execute();
    $stmt->close();
	$mysqli->close();
}

function buildTable() {
    $mysqli = getDBConn();
    $result = $mysqli->query("SELECT * FROM doska ORDER BY created DESC");

    if ($result->num_rows > 0) {
		echo "<h2>������ ����������</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>" . htmlspecialchars($row['title']) . "</strong><br>";
            echo "���������: " . htmlspecialchars($row['category']) . "<br>";
            echo htmlspecialchars($row['description']) . "<br>";
            echo "<em>" . htmlspecialchars($row['email']) . "</em>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "���������� ���� ���.";
    }
	$result->free();
	$mysqli->close();
}

// ��������� POST-�������
if ($_SERVER['REQUEST_METHOD'] === 'POST'&& 
    isset($_POST['email'], $_POST['title'], $_POST['description'], $_POST['category'])) {
    addGood(
        $_POST['email'],
        $_POST['title'],
        $_POST['description'],
        $_POST['category']
    );
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vitamito</title>
</head>
<body>
    <div id="form">
        <form method="post">
            <label for="email">E-mail</label>
            <input type="email" name="email" required><br><br>

            <label for="category">���������</label>
            <select name="category" required>
                <option value="electronics">�����������</option>
				<option value="clothes">������</option>
				<option value="furniture">������</option>
				<option value="other">����</option>
            </select><br><br>

            <label for="title">���������</label>
            <input type="text" name="title" required><br><br>

            <label for="description">��������</label>
            <textarea rows="5" name="description" required></textarea><br><br>

            <input type="submit" value="���������"><br><br>
        </form>
    </div>
	
    <?php buildTable(); ?>
</body>
</html>