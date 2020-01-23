# SP1
## Senior Project 1 (1/2019)<br>
People Analytics for the AU Library <br>

<br>
The main aim of our project is to create a system or a package in which the library can use to replace the staff manually counting people that enter the library. Our project will focus on using pre-trained people detection models to create a system to detect, track, count people entering the library, and then using the counting data, display people analytics through our website. This repository consists of the backend program which utilizes pre-trained people detection models and a pre-made Kalman Filter algorithm. 

<br> **See requirements.txt for software requirements. Software setups may vary.**
<br>
**Not all files are included in this repository** <br>
**Some files are created by other authors**
*Required Files and folers: <br>*
  - model: location of detection model. 
  - output: folder where csv file is output and videos are saved.
  - video stream link: video link is no longer available. Local video files can still be used, simply replace the link with the file path/video name.
## Website <br>
Website can be found here: [link](https://library-258507.appspot.com) <br>
![website](https://github.com/WilliamPoch/SP1Website/blob/master/img/screen.png)

More details can be found here: [Github](https://github.com/WilliamPoch/SP1Website) <br>
<br> 
## Project Structure <br>
<br>│   run.py - Main Program. Contains folder paths, video input and model inputs. 
<br>│
<br>├───model - Model used ssd_mobilenet_v2_coco
<br>│   │   checkpoint
<br>│   │   frozen_inference_graph.pb
<br>│   │   model.ckpt.data-00000-of-00001
<br>│   │   model.ckpt.index
<br>│   │   model.ckpt.meta
<br>│   │   pipeline.config
<br>│   │
<br>│   └───saved_model
<br>│       │   saved_model.pb
<br>│       │
<br>│       └───variables
<br>├───output - Output folder for csv file and optional video output. 
<br>│       16-46.avi
<br>│       peoplecount.csv
<br>│
<br>├───utils
<br>│   │   boundary.py - Contains classes to create boundary lines and an algorithm to check line intersection. 
<br>│   │   detector.py - Contains the class to initialize tensorflow models and perform detection.
<br>│   │   filevideostream.py - Contains the classes for receiving a local video.
<br>│   │   gcloud.py - Contains a function used to upload the csv file to GCloud.
<br>│   │   person.py - Contains the tracker algorithm and the enter/exit conditions.
<br>│   │   stream.py - Contains the classes for receiving various types of video streams.
<br>│   │   tracker.py - Contains the class for the tracker for each person. 
<br>│   │   util.py - Contains formulas and algorithms for retrieving midpoints, distances, and gaussian.
<br>│   │
<br>

## Project Implementation<br>
When the program is run, the boundary lines are created and a connection to the IP camera is made with OpenCV. Once it is established, the video is passed frame by frame using imutils to the detector where it uses the pre-trained “ssd_mobilenet_v2_coco” object detection model and determines if a person is present. <br>
If a person is detected, then bounding boxes are drawn around the person and their coordinates are passed to the people tracker class. Here, it keeps track of their coordinates and then it uses the Kalman Filter to predict their movements. Then a check is made to see if they meet the conditions of enter or exit. If their midpoints, or centroids pass the boundaries in a specific sequence, top to bottom or bottom to top, it counts them accordingly. 
<br>Counts are then stored as a csv file locally and then uploaded via Google Cloud API to a Google Cloud storage bucket. The file then acts as a sort of database that can be accessed with SQL queries. The website was created using Bootstrap and is also hosted on the same Google Cloud server as the file. From there the website sends SQL queries--via Google Cloud API--requesting data from the uploaded csv file, and then displays the data in charts and graphs. 
