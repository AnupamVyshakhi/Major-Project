from PIL import Image
import imagehash
import cv2

def compare(a,b):
    #a = cv2.cvtColor(a, cv2.COLOR_BGR2RGB)
    a = Image.fromarray(a)
    #b = cv2.cvtColor(b, cv2.COLOR_BGR2RGB)
    b = Image.fromarray(b)
    hash0 = imagehash.average_hash(a) 
    hash1 = imagehash.average_hash(b) 
    cutoff = 5

    if hash0 - hash1 < cutoff:
      return 1
    else:
      return 0
	  
cap  = cv2.VideoCapture('vid.avi')
n_s1 = n_s2 = n_s3 = 0
s1 = cv2.imread('0.jpg')
s2 = cv2.imread('1.jpg')
s3 = cv2.imread('2.jpg')
while True:
    ret,frame = cap.read()
    if ret:
        cv2.putText(frame, 's1 = {}, s2 = {}, s3 = {}'.format(n_s1,n_s2,n_s3), (20, 450), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 0, 0), 2, cv2.LINE_AA) 
        cv2.imshow('test',frame)
        cv2.waitKey(33)
        if compare(frame,s1):
            n_s1+=1
            #print('s1')
        elif compare(frame,s2):
            n_s2+=1
            #print('s2')
        elif compare(frame,s3):
            n_s3+=1
            #print('s3')
    else:
        break
cap.release()
print(n_s1,n_s2,n_s3)

res = ' congress = {}\n communist = {}\n bjp = {}'.format(n_s1,n_s2,n_s3)

f = open('result.txt','w')
f.write(str(res))
f.close()