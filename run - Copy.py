import imutils
import os
import sys
import time
import datetime
import traceback
import numpy as np
import cv2
import csv
import pandas as pd
from utils.tracker import PeopleTracker
from utils.person import Person
from utils.boundary import Boundary
from utils.detector import Detector
from utils.stream import WebcamVideoStream, Client, RTSPVideoFeed
# from utils.gcloud import upload
from utils.filevideostream import FileVideoStream

# def upload_to_cloud(csv):
#     print('Uploading to cloud')
#     upload(csv)

def update_csv(row):  
    filepath = 'output/peoplecount.csv'
    lines = []
    try: 
        with open(filepath, 'r') as readFile:
            reader = csv.reader(readFile)
            lines = list(reader)

        if lines[len(lines)-1][:1] == row[:1]:
            lines[len(lines)-1] = row

            with open(filepath, 'w', newline='') as writeFile:
                writer = csv.writer(writeFile)
                writer.writerows(lines)
        else: 
            with open(filepath, 'a', newline='') as writeFile:
                writer = csv.writer(writeFile)
                writer.writerows(row)
    except FileNotFoundError:
        with open(filepath, 'a', newline='') as writeFile:
            writer = csv.writer(writeFile)
            writer.writerows(row)
    print("Done!")
    


def main():
    data = []
    # stream = "rtsp://admin:islabac123@168.120.33.119"
    # dateday = datetime.date.today()
    date = datetime.datetime.now()
    start = date.minute
    # ToD = ""

    keys = ["in", "out", "total", "morning", "afternoon", "date", "ToD", "trackers"]
    record = {key: 0 for key in keys}
    ENTRY_LINES = [((0, 200, 640, 200), (0, 230, 640, 230), [1, 2])]
    entry_boundaries = [Boundary(boundary[0], boundary[1], sequence=boundary[2]) for boundary in ENTRY_LINES]  
    tracker = PeopleTracker(entry_boundaries, entries=record["in"], exits=record["out"], count=record["total"])

    detector = Detector("model/frozen_inference_graph.pb")
    
    # streamer = FileVideoStream(stream).start()
    streamer = WebcamVideoStream("1.mp4").start()
    # streamer =  RTSPVideoFeed(stream)
    # streamer.open()

    file_name = 'output/' + str(date.day)  + '-' + str(date.minute) + '.avi'
    file_path = os.path.join(os.getcwd(), file_name)
    writer = cv2.VideoWriter(file_path, cv2.VideoWriter_fourcc(*'XVID'), 30.0, (640, 360))
    COLORS = np.random.uniform(0, 255, (100, 3))
 

    #Run people counting
    while True:
        # Working hours
        # if date.hour >= 9 and date.hour <= 20:00:
        #   run
        # else :
        #   stop

        try: 
            ret, frame = streamer.read()
            if ret:
                # timeofday = datetime.datetime.now().strftime("%H:%M:%S")
                # if timeofday < "12:00:00":
                #     ToD = "Morning"
                # elif timeofday >= "12:00:00":
                #     ToD = "Afternoon"

                frame = imutils.resize(frame, width=640)
                points = detector.detect(frame, (20, 40), (100, 200), threshold=0.25)
                tracker.update(points, update_type='distance')
                tracker.check()
                data = tracker.get_data(type= 'dict')
                
                coords = tracker.get_trackers()
                
                # Show detection boxes
                # if coords:
                #     cv2.rectangle(frame, (coords[0][1], coords[0][0]), 
                #     (coords[0][3], coords[0][2]),
                #         (0, 255, 0), 2)
                for bound in entry_boundaries:
                    points  = bound.get_lines()
                    for point in points:
                        cv2.line(frame, point[0], point[1], (255, 0, 0), 2)


                info = [
                    ("Out", data['out']),
                    ("In", data['in']),
                ]

                for (i, (k, v)) in enumerate(info):
                    text = "{}: {}".format(k, v)
                    cv2.putText(frame, text, (24, 360 - ((i * 20) + 20)),
                                cv2.FONT_HERSHEY_SIMPLEX, 0.8, (0, 0, 255), 2)
                
                writer.write(frame)
                cv2.imshow('Frame', frame)
                end = datetime.datetime.now().minute

                if (end - start == 1):
                    row = [str(data['date']), str(data['morning']), str(data['afternoon']), str(data['in'])]
                    update_csv(row)
                    start = datetime.datetime.now().minute
                    


                # Reset everyday
                # if dateday == datetime.date.today() - datetime.timedelta(days=1):
                #     main()
                #     keys = ["in", "out", "total", "morning", "afternoon", "date", "ToD", "trackers"]
                #     record = {key: 0 for key in keys}
                #     ENTRY_LINES = [((0, 200, 640, 200), (0, 230, 640, 230), [1, 2])]
                #     entry_boundaries = [Boundary(boundary[0], boundary[1], sequence=boundary[2]) for boundary in ENTRY_LINES]  
                #     tracker = PeopleTracker(entry_boundaries, entries=record["in"], exits=record["out"], count=record["total"])
                #     dateday = datetime.date.today()

                if cv2.waitKey(1) == ord('q'):
                    cv2.destroyAllWindows()
                    streamer.release()
                    writer.release()
                    break
            else:
                print("End of video")
                cv2.destroyAllWindows()
                streamer.release()
                writer.release()
                break
        except Exception:
            import logging
            logging.exception('Oops: error occurred')
            sys.exit(1)
    streamer.release()
    writer.release()
    return
    


main()
