# import the necessary packages
import numpy as np
import time
from threading import Thread
import requests
import cv2

class WebcamVideoStream:
    def __init__(self, src=0):
        # initialize the video camera stream and read the first frame
        # from the stream
        self.stream = cv2.VideoCapture(src)
        (self.grabbed, self.frame) = self.stream.read()

        # initialize the variable used to indicate if the thread should
        # be stopped
        self.stopped = False

    def start(self):
        # start the thread to read frames from the video stream
        Thread(target=self.update, args=()).start()
        return self

    def update(self):
        # keep looping infinitely until the thread is stopped
        while True:
            # if the thread indicator variable is set, stop the thread
            if self.stopped:
                self.stream.release()
                return

            # otherwise, read the next frame from the stream
            (self.grabbed, self.frame) = self.stream.read()

    def read(self):
        # return the frame most recently read
        return self.grabbed, self.frame

    def release(self):
        # indicate that the thread should be stopped
        self.stopped = True


class IPCamVideoStream:
    def __init__(self, url):
        # initialize the video camera stream and read the first frame
        # from the stream
        self.stream = requests.get(url, stream=True)
        self.frame = np.zeros((360, 480, 3), np.uint8)
        
        # initialize the variable used to indicate if the thread should
        # be stopped
        self.stopped = False

    def start(self):
        # start the thread to read frames from the video stream
        Thread(target=self.update, args=()).start()
        return self

    def update(self):
        databytes = b''
        # keep looping infinitely until the thread is stopped
        while True:
            # if the thread indicator variable is set, stop the thread
            if self.stopped:
                return

            # otherwise, read the next frame from the stream
            data = self.stream.raw.read(1024)
            databytes += data
            a = databytes.find(b'\xff\xd8')
            b = databytes.find(b'\xff\xd9')
            if a != -1 and b != -1:
                jpg = databytes[a:b+2]
                databytes = databytes[b+2:]
                img = cv2.imdecode(np.fromstring(jpg, dtype=np.uint8), cv2.IMREAD_COLOR)
                img = np.array(img)
                self.frame = img

    def read(self):
        # return the frame most recently read
        return self.frame

    def stop(self):
        # indicate that the thread should be stopped
        self.stopped = True

class Client:
    def __init__(self, rtsp_server_uri):
        """ 
            rtsp_server_uri: the path to an RTSP server. should start with "rtsp://"
            verbose: print log or not
            drop_frame_limit: how many dropped frames to endure before dropping a connection
            retry_connection: whether to retry opening the RTSP connection (after a fixed delay of 15s)
        """
        self.rtsp_server_uri = rtsp_server_uri
        self.open(rtsp_server_uri)

    def __enter__(self,*args,**kwargs):
        """ Returns the object which later will have __exit__ called.
            This relationship creates a context manager. """
        return self

    def __exit__(self, type=None, value=None, traceback=None):
        """ Together with __enter__, allows support for `with-` clauses. """
        self.close()

    def open(self,rtsp_server_uri=None):
        if rtsp_server_uri:
            self.rtsp_server_uri = rtsp_server_uri
        else:
            rtsp_server_uri = self.rtsp_server_uri
        self._capture = RTSPVideoFeed(rtsp_server_uri)

    def isOpened(self):
        return self._capture.isOpened()

    def read(self):
        """ Return most recent frame as Pillow image. Returns None if none have been retrieved. """
        return self._capture.read()

    def preview(self):
        self._capture.preview()

    def close(self):
        self._capture.close()

class RTSPVideoFeed:
    """ Maintain live RTSP feed without buffering. """
    _stream = None
    _latest = None

    def __init__(self, rtsp_server_uri, verbose = False):
        """ 
            rtsp_server_uri: the path to an RTSP server. should start with "rtsp://"
            verbose: print log or not
        """
        self.rtsp_server_uri = rtsp_server_uri
        self._verbose = verbose

    def __enter__(self,*args,**kwargs):
        """ Returns the object which later will have __exit__ called.
            This relationship creates a context manager. """
        return self

    def __exit__(self, type=None, value=None, traceback=None):
        """ Together with __enter__, allows support for `with-` clauses. """
        self.close()

    def open(self):
        self.close()
        self._stream = cv2.VideoCapture(self.rtsp_server_uri)
        time.sleep(.5)

    def close(self):
        if self.isOpened():
            self._stream.release()

    def isOpened(self):
        try:
            return self._stream is not None and self._stream.isOpened()
        except:
            return False

    def read(self):
        self.open()
        (grabbed, frame) = self._stream.read()
        self._latest = frame
        self._stream.release()
        return self._latest

    def preview(self):
        """ Blocking function. Opens OpenCV window to display stream. """
        win_name = 'RTSP'
        cv2.namedWindow(win_name, cv2.WINDOW_AUTOSIZE)
        cv2.moveWindow(win_name,20,20)
        self.open()
        while(self.isOpened()):
            cv2.imshow(win_name,self._stream.read()[1])
            #if self._latest is not None:
            #    cv2.imshow(win_name,self._latest)
            if cv2.waitKey(25) & 0xFF == ord('q'):
                break
        cv2.waitKey()
        cv2.destroyAllWindows()
        cv2.waitKey()