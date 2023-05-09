from Crypto.Util.number import *
from hashlib import md5
from secret import flag

#flag全是由小写字母及数字组成
m=md5(flag).hexdigest()
print(flag[:13]+flag[15:18]+flag[19:34]+flag[35:38])
print(m)
# b'LitCTF{md5can3derypt213thoughcrsh}'
# 496603d6953a15846cd7cc476f146771
