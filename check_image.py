# using haar cascade

import cv2
 
scale_factor = 1.1
min_neighbors = 3
min_size = (30, 30)
 
def detect(path):
    img = cv2.imread(path)
    cascade = cv2.CascadeClassifier("haarcascade_frontalface_alt.xml")
    rects = cascade.detectMultiScale(img, scaleFactor=scale_factor, minNeighbors=min_neighbors,
                                          minSize=min_size)
 
    #if at least 1 face detected
    if len(rects) >= 0:
        # create the bounding box around the detected face
        for (x, y, w, h) in rects:
            cv2.rectangle(img, (x, y), (x + w, y + h), (255, 0, 0), 2)
        cv2.imshow("Face Detection", img)
        cv2.imwrite('detected.jpg', img)
        cv2.waitKey(0)  # wait for user input to display the detected face
        cv2.destroyAllWindows()
    else:
        return [], img
 
 
def main():
    detect("face1.jpeg")
 
 
if __name__ == "__main__":
    main()