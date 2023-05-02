<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF Challenge</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-top: 50px;
            text-align: center;
            font-size: 28px;
            color: #343a40;
        }
        .form-wrapper {
            margin: 50px auto;
            max-width: 500px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #343a40;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0062cc;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        .success-message {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>前端写累了，看点素的吧，没有荤的了（</h1>
    <div class="form-wrapper">
            <div class="form-group">
                <label for="ctf-input">你知道 GET 么，试试用GET传参一个变量名为CTF 值为Lit2023</label>
                <input type="text" id="ctf-input" name="ctf" placeholder="Like this Lit2023">
            </div>
            <div class="form-group">
                <label for="challenge-input">下面试试POST，尝试用POST传输一个变量名为Challenge 值为 i'm_c0m1ng</label>
                <input type="text" id="challenge-input" name="challenge" placeholder="Like this i'm_c0m1ng">
            </div>
            <input type="submit" value="提交按钮被我撬掉了x别按了">
        <?php
            error_reporting(0);
            if (!isset($_GET['CTF']) || $_GET['CTF'] !== 'Lit2023') {
                echo '<div class="error-message">GET涅？</div>';
            } else {
                if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['Challenge']) || $_POST['Challenge'] !== "i'm_c0m1ng") {
                    echo '<div class="error-message">POST呢？！</div>';
                } else {
                        setcookie('flag', 'FLAGGG');
                        if (isset($_COOKIE['flag'])) {
                            echo '<div class="error-message">你看到了我的夹心饼干(Cookies)了么，里面就是flag哦~</div>';
                        } else {
                            echo 'FLAGGG';
                        }
                        echo '<div class="success-message">他说备份文件还有好吃的！</div>';
                    }
                    
                }
            
            
               ?>
                    </div>
                    
                    </body>
                    </html>
    