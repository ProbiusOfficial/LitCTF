import os
import random
import socketserver

flag = os.getenv("FLAG")

WELCOME_MESSAGE = """
 __           ________      _________   ______       _________   ______    
/_/\         /_______/\    /________/\ /_____/\     /________/\ /_____/\   
\:\ \        \__.::._\/    \__.::.__\/ \:::__\/     \__.::.__\/ \::::_\/_  
 \:\ \          \::\ \        \::\ \    \:\ \  __      \::\ \    \:\/___/\ 
  \:\ \____     _\::\ \__      \::\ \    \:\ \/_/\      \::\ \    \:::._\/ 
   \:\/___/\   /__\::\__/\      \::\ \    \:\_\ \ \      \::\ \    \:\ \   
    \_____\___________________   \__\_____ \_____\______  \__\/     \_\/   
          /_____/\     /_____/\     /_____/\     /_____/\                  
          \:::_:\ \    \:::_ \ \    \:::_:\ \    \:::_:\ \                 
              _\:\|     \:\ \ \ \       _\:\|       /_\:\ \                
 _______     /::_/__     \:\ \ \ \     /::_/__      \::_:\ \               
/______/\    \:\____/\    \:\_\ \ \    \:\____/\    /___\:\ '              
\__::::\/     \_____\/     \_____\/     \_____\/    \______/               
                                                                           
Welcome to the LitCTF2023 Verbal Problem Card!
You will be presented with 100 addition and subtraction problems.
Your goal is to answer all of them correctly to get the flag!
if you wrong, you will be kicked out of the game.
Good luck & Have fun!
"""

class MathQuizHandler(socketserver.BaseRequestHandler):
    def handle(self):
        self.request.sendall(WELCOME_MESSAGE.encode())
        num_correct = 0
        while num_correct < 2:
            a, b = random.randint(1, 100), random.randint(1, 100)
            op = random.choice(["+", "-"])
            if op == "+":
                expected_answer = a + b
                question = f"What is {a} + {b}?\n"
            else:
                expected_answer = a - b
                print(expected_answer)
                question = f"What is {a} - {b}?\n"
            self.request.sendall(question.encode())
            answer = self.request.recv(1024).strip().decode()
            print(answer)
            # if answer.isdigit() and int(answer) == expected_answer:
            if int(answer) == expected_answer:
                num_correct += 1
                self.request.sendall(b"Correct!\n")
            else:
                self.request.sendall(b"Incorrect. Try again!\n")
                exit()
                
        self.request.sendall(b"Congratulations! Here's your flag:" + flag.encode() + b"\n")

if __name__ == "__main__":
    HOST, PORT = "0.0.0.0", 9999
    server = socketserver.ThreadingTCPServer((HOST, PORT), MathQuizHandler)
    server.serve_forever()
