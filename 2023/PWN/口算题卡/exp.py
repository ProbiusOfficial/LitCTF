from pwn import *
import re

HOST = 'node4.anna.nssctf.cn'
PORT = 28971


def solve_math_quiz():
    conn = remote(HOST, PORT)

    # 接收并打印欢迎消息
    welcome_message = conn.recvline().decode()
    print(welcome_message)

    # 等待开始答题消息
    while True:
        message = conn.recvline().decode()
        print(message)
        if "Good luck & Have fun!" in message:
            break

    num_correct = 0

    while num_correct < 100:
        # 接收问题
        
        question = conn.recvline().decode()
        print(question)
        matches = re.findall(r'\b\d+\b', question)
        numbers = list(map(int, matches))
        # 提取问题中的数字和操作符
        operator = '+' if '+' in question else '-'

        # 计算预期答案
        expected_answer = eval(f"{numbers[0]} {operator} {numbers[1]}")

        # 发送答案
        conn.sendline(str(expected_answer))

        # 接收回复
        reply = conn.recvline().decode()
        print(reply)

        if 'Correct' in reply:
            num_correct += 1
        else:
            # 如果答案错误，退出游戏
            print("Incorrect answer. Game over!")
            conn.close()
            return

    # 接收并打印 flag
    flag = conn.recvline().decode().strip()
    print(flag)

    conn.close()

if __name__ == '__main__':
    solve_math_quiz()
