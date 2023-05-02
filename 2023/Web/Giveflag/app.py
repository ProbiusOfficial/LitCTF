import os
import flask
from flask import Flask, request, session, redirect, url_for

app = Flask(__name__)
app.secret_key="LitCTF"
@app.route('/')
def hello_world():  # put application's code here
    return '<h1>欢迎参加LitCTF，告诉我你的名字吧</h1>' \
           '<form action="/hello" method="post">' \
           '<input name="name" id="name">' \
           '</form>'
@app.route('/hello', methods=['POST', 'GET'])
def hello():
    if request.method == 'GET':
        try:
            name = session['name']
            return f'<h1>欢迎{name}师傅</h1>' \
                   f'<button onclick="location.href=\'/flag\'">拿flag</button>'
        except:
            return redirect(url_for('hello_world'))
    else:
        name = request.form['name']
        if name == 'admin':
            return "<h1>你怎么可能是管理员哦！</h1>"
        session['name'] = name
        return f'<h1>欢迎{name}师傅</h1>' \
                f'<button onclick="location.href=\'/flag\'">拿flag</button>'

@app.route('/flag')
def flag():
    if session['name'] == 'admin':
        return f'<h1>{os.getenv()["FLAG"]}</h1>'
    else:
        return f'<h1>只有管理员才能拿flag耶</h1>'
if __name__ == '__main__':
    app.run(host="0.0.0.0")
