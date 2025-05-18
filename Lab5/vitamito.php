<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vitamito</title>
</head>
<body>
    <div id="form"></div>
        <form action="write.php" method="post">
            <label for="email">E-mail</label>
            <input type="email" name="email" required><br><br>

            <label for="category">Категория</label>
            <select name="category" required>
                <?php
                    $dir = opendir("categories");
                    while($file = readdir($dir)) {
                        if (is_dir('categories/'.$file) && $file != "." && $file != "..") { // Все файлы кроме . и ..
                            echo "<option value=\"$file\">" . htmlspecialchars($file) . "</option>";
                        }
                    }
                ?>
            </select><br><br>

            <label for="title">Заголовок</label>
            <input type="text" name="title" required><br><br>

            <label for="description">Описание</label>
            <textarea rows="5" name="description" required></textarea><br><br>

            <input type="submit" value="Сохранить"><br><br>
        </form>
    </div>

    <div id="table">
        <table>
            <thead>
                <th>Заголовок</th>
                <th>Категория</th>
                <th>E-mail</th>
                <th>Описание</th>
            </thead>
            <tbody> 
                <?php // строим таблицу
                    $dir = opendir("categories");
                    while($category = readdir($dir)) {
                        if (!is_dir('categories/'.$category) || $category == '.' || $category == '..') { // Все папки кроме файлов и . и ..
                            continue;
                        }
                        foreach (scandir("categories/".$category) as $filename){
                            if($filename == "." || $filename == ".."){ // Все файлы кроме . и ..
                                continue;
                            }

                            $fp = fopen("categories/$category/$filename", "r");
                            $filename = fgets($fp);
                            $email = fgets($fp);
                            $description = "";
                            while(!feof($fp)) { // Всё после почты это описание
                                $description .= fgets($fp) . "\n";
                            }
                            fclose($fp);

                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($filename) . "</td>";
                                echo "<td>" . htmlspecialchars($category) . "</td>";
                                echo "<td>" . htmlspecialchars($email) . "</td>";
                                echo "<td>" . htmlspecialchars($description) . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>