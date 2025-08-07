#importing installed libraries
import cv2
import numpy as np
import face_recognition

#Loading images and BGR TO RGB conversion

imgTest = face_recognition.load_image_file('../Report/Bill Gates Test.jpg') #for test image
imgTest = cv2.cvtColor(imgTest,cv2.COLOR_BGR2RGB)
imgBill = face_recognition.load_image_file('../Report/Bill Gates.jpg') #for train image
imgBill = cv2.cvtColor(imgBill,cv2.COLOR_BGR2RGB)

#finding face and encodings for test image

faceLocTest = face_recognition.face_locations(imgTest)[0]
encodeTest = face_recognition.face_encodings(imgTest)[0]
cv2.rectangle(imgTest,(faceLocTest[3],faceLocTest[0]),(faceLocTest[1],faceLocTest[2]),(255,0,255),2)

#finding face and encodings

faceLoc = face_recognition.face_locations(imgBill)[0]
encodeBill = face_recognition.face_encodings(imgBill)[0]

#declaring rectangle based on top,left,bottom,right and color
cv2.rectangle(imgBill,(faceLoc[3],faceLoc[0]),(faceLoc[1],faceLoc[2]),(255,0,255),2)

#for comparison and distance(linear svm)

results = face_recognition.compare_faces([encodeBill],encodeTest)

#face best match

faceDis = face_recognition.face_distance([encodeBill],encodeTest)
print(results,faceDis)
cv2.putText(imgTest,f'{results} {round(faceDis[0],2)}',(50,50),cv2.FONT_HERSHEY_COMPLEX,1,(0,0,255),2)

#display images
cv2.imshow('Bill Gates Test',imgTest)
cv2.imshow('Bill Gates',imgBill)
cv2.waitKey(0)