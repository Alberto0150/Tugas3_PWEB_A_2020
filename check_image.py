#!/usr/bin/env/python
import cv2
import os
import sys
import face_recognition

def checkFace(img):
    face_bounding_boxes=face_recognition.face_location(img)
    if len(face_bounding_boxes) != 1:
        return None 
    else:
         return img
    
if __name__=="__main__":
    # nmFile=sys.argv[1]
    nmFile = '1_20181204110834.png'
    dim=96
    img = cv2.imread(nmFile)
    face= True
    if img is None:
        os.system('rm %s'%nmFile)
        face=False
    else:
        aligned_img = checkFace(img)
        if aligned_img is None:
            face=False
            os.system('rm %s'%nmFile)
    if face == True:
        print("ACCEPTED")
    else:
        print("REJECTED, not face, no add to repository  ")
