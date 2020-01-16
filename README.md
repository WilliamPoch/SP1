# SP1
Senior Project 1 <br>
People Analytics for the AU Library <br>
<br>
William Sivutha Poch <br>
in collaboration with Intelligent Systems Laboratory and AU Library <br>
<br>
<br>
The goal of this project was to create a system which could detect, track and count people entering the AU Library. This repository consists of the backend program which utilizes pre-trained people detection models, a pre-made Kalman Filter algorithm, and various other classes created and provided by ISL.
<br>
Project Structure <br>
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


