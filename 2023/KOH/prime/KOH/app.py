import os
from flask import Flask, request, jsonify
import subprocess
import time

app = Flask(__name__)

@app.route('/upload', methods=['POST'])
def upload():
    file = request.files.get('file', None)

    if file is None:
        return jsonify({'code': 201, 'message': 'No file provided'})

    filename = file.filename
    file_ext = os.path.splitext(filename)[-1].lower()

    if file_ext not in ['.c', '.cpp', '.java', '.py']:
        return jsonify({'code': 202, 'message': 'Invalid file extension'})

    file.save(f'/home/ctf/submit{file_ext}')
    return jsonify({'code': 200, 'message': 'File uploaded successfully'})

@app.route('/check', methods=['POST'])
def check():
    file_ext = None
    for ext in ['.c', '.cpp', '.java', '.py']:
        if os.path.exists(f'/home/ctf/submit{ext}'):
            file_ext = ext
            break

    if file_ext is None:
        return jsonify({'code': 202, 'message': 'No file found for checking'})


    compile_cmd = {
        '.c': 'gcc submit.c -o submit',
        '.cpp': 'g++ submit.cpp -o submit',
        '.java': 'javac submit.java',
        '.py': ''
    }

    run_cmd = {
        '.c': './submit',
        '.cpp': './submit',
        '.java': 'java submit',
        '.py': 'python submit.py'
    }

    # Compile the submitted file
    p_compile = subprocess.Popen(compile_cmd[file_ext], shell=True, cwd='/home/ctf', stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    p_compile.wait()
    if p_compile.returncode != 0:
        return jsonify({'code': 203, 'message': 'Compilation error'})

    total_score = 0
    Wrong_case = ''
    TLE_case = ''
    for num in range(0, 10):
        start_time = time.time()
        p_run = subprocess.Popen(run_cmd[file_ext], shell=True, cwd='/home/ctf', stdin=open(f'/home/ctf/{num}.in', 'r'), stdout=open(f'/home/ctf/{num}.out', 'w'), stderr=subprocess.PIPE)
        try:
            p_run.wait(timeout=1)
        except subprocess.TimeoutExpired:
            p_run.kill()
            TLE_case += str(num)+ ', '
            continue

        time_elapsed = (time.time() - start_time) * 1000
        time_score = max(0, 10 - (time_elapsed / 1000))
        total_score += time_score

        with open(f'/home/ctf/{num}.out', 'r') as f_out, open(f'/home/ctf/{num}.ans', 'r') as f_ans:
            if f_out.read().strip() == f_ans.read().strip():
                total_score += 90
            else:
                Wrong_case += str(num)+ ', '
                # return jsonify({'code': 205, 'message': f'Wrong answer on test case {num}', 'score': total_score})
                continue

    TLE_case = TLE_case[:-2]
    Wrong_case = Wrong_case[:-2]
    if TLE_case != '' and Wrong_case != '':
        return jsonify({'code': 206, 'message': f'TLE on test case {TLE_case} and Wrong answer on test case {Wrong_case}', 'score': total_score})
    elif TLE_case != '':
        return jsonify({'code': 204, 'message': f'TLE on test case {TLE_case}', 'score': total_score})
    elif Wrong_case != '':
        return jsonify({'code': 205, 'message': f'Wrong answer on test case {Wrong_case}', 'score': total_score})
    else:
        return jsonify({'code': 200, 'message': 'All test cases passed', 'score': total_score})

app.run(host='0.0.0.0', debug=False)
