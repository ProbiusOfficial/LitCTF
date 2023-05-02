<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>看看能ping出什么东西捏？</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
      }
      
      .container {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      }
      
      form {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      
      input[type="text"] {
        width: 70%;
        height: 40px;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        outline: none;
      }
      
      input[type="submit"] {
        width: 30%;
        height: 40px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
      }
      
      input[type="submit"]:hover {
        background-color: #0062cc;
      }
      
      h1 {
        text-align: center;
        margin-bottom: 30px;
      }
      
      .output {
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        white-space: pre-wrap;
        font-family: monospace;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>试着Ping一下吧</h1>
      <script type="text/javascript">
  function check_ip(){
    let ip = document.getElementById('command').value;
    let re = /^(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)\.(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)\.(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)\.(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)$/;

    if(re.test(ip.trim())){
      return true;
    }
    alert('敢于尝试已经是很厉害了，如果是这样的话，就只能输入ip哦');
    return false;
  }
</script>
      <form action="" method="POST" onsubmit="return check_ip()">
          <input id="command" name="command" type="text" placeholder="Enter an IP address"/>
          <input name="ping" type="submit" value="Ping"/>
      </form>
      <?php
        error_reporting(0);
        header("Content-Type: text/html; charset=utf-8");
        if(!isset($_POST['command'])) {
            die();
        }

        $command = $_POST['command'];

        $command = 'ping -c 6 ' . $command;
        echo '<div class="output">' . str_replace("\n", "<br>\n", shell_exec($command)) . '</div>';
      ?>
    </div>
  </body>
</html>