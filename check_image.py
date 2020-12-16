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
    
if__name__=="__main__":
