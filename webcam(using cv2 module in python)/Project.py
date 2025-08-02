import cv2
from datetime import datetime

url = 'http://10.84.132.151:8080/video'
cap = cv2.VideoCapture(0)
while(True):
    ret, frame = cap.read()
    if frame is not None:
        cv2.imshow('camera',frame)
    c = cv2.waitKey(1)
    q = cv2.waitKey(1)
    
    if q == ord("q"):
        break
    if c==ord("c"):
        now = datetime.now()
        current_time1 = now.strftime("%Y-%m-%d")
        ct=now.timestamp()
        url = 'http://192.168.43.1:8080/video'
        
        cap = cv2.VideoCapture(0)

        ret, frame = cap.read()

        # Save the image
        img_name="{}={}.jpg".format(current_time1,ct)
        cv2.imwrite(img_name, frame)
        
        
        # document.add_picture(img_name, width=Inches(5.0))
        # document.add_paragraph(current_time)
    
        
        # document.save('image.docx')
    
       
 #When everything is done, release the capture
cap.release()
cv2.destroyAllWindows()

