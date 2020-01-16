"""
Tracker object with people
Author: Hein Htet Naing (Hector), 2018
Contributor: Avanish Shrestha, 2018
"""

from __future__ import division, print_function, absolute_import

from math import sqrt
import numpy as np
import cv2
from utils.boundary import Line, Params

class KalmanTracker(object):
    """
    Kalman Tracker object
    """
    def __init__(self, state_size=4, meas_size=4, contr_size=0):
        self.stateSize = state_size
        self.measSize = meas_size
        self.contrSize = contr_size
        self.kf = cv2.KalmanFilter(self.stateSize, self.measSize, self.contrSize)
        self.kf.statePost = np.zeros(4, np.float32)
        self.dT = 0  # velocity
        # to initialize noises and matrixes.
        self.kf.transitionMatrix = np.array(
            [[1, 0, self.dT, 0], [0, 1, 0, self.dT], [self.dT, 0, 1, 0], [0, self.dT, 0, 1]], np.float32)
        self.kf.measurementMatrix = np.array(
            [[1, 0, 0, 0], [0, 1, 0, 1], [0, 0, 1, 0], [0, 0, 0, 1]], np.float32)

    def predict(self, state):
        # adding randome noise to predict next state
        process_noise = sqrt(self.kf.processNoiseCov[0, 0]) * np.random.randn(1, 2)
        process_noise = np.append(process_noise, 0)
        process_noise = np.append(process_noise, 0)
        new_state = np.dot(self.kf.transitionMatrix, state) + process_noise
        new_state = np.array(new_state, np.float32)
        self.kf.statePost = new_state
        prediction = self.kf.predict()
        prediction = [int(prediction[i]) for i in range(len(prediction))]
        return prediction

    def update(self, means):
        means = np.array(means, np.float32)
        # correcton based on measurement update added some noise
        measure_noice = sqrt(self.kf.measurementNoiseCov[0, 0]) * np.random.randn(1, 2)
        measure_noice = np.append(measure_noice, 0)
        measure_noice = np.append(measure_noice, 0)
        means = np.dot(self.kf.measurementMatrix, means) + measure_noice
        means = np.array(means, np.float32)
        means = np.absolute(means)
        measurment = self.kf.correct(means)
        measurment = self.kf.predict()
        measurment = [int(measurment[i]) for i in range(len(measurment))]
        return measurment
    
    def get_covariance(self):
        return self.kf.errorCovPre

class Person(object):
    """
    People object to keep track of movement, tracker, etc
    """
    def __init__(self, person_id, no_entries):
        self.id = person_id
        self.coordinates = []
        self.tracker = KalmanTracker()
        self.did_enter = False
        self.did_exit = False
        self.did_pass = False
        self.line = None
        self.predictions = 0
        # self.passed_tuples = [[] for i in range(no_pass)]
        self.entries_tuples = [[] for i in range(no_entries)]
        
    def add_coordinates(self, point):
        """
        Append new coordinates
        Arguments
        ---------
        points : `tuple` of coordinate points
        """
        self.coordinates.append(point)
        if (len(self.coordinates) >= 2):
            last = self.coordinates[len(self.coordinates)-2:]
            md1 = self._get_midpoint(last[0])
            md2 = self._get_midpoint(last[1])
            self.line = Line((md1[0], md1[1], md2[0], md2[1]))

    def _get_midpoint(self, point):
        """
        Get center point of the coordinate
        Arguments
        ---------
        point : `tuple` of coordinate point
        """
        width = int(point[2]/2)
        height = int(point[3])
        return (point[0] + width, point[1] + height)

    def get_coordinates(self):
        """
        Get the coordinates for the person
        Returns
        -------
        coordinates : `list` of coordinates
        """
        return self.coordinates

    def predict(self, point):
        """
        Predict the next coordinate for the person
        Arguments
        ---------
        point : `tuple` of coordinate point
        Returns
        -------
        state : new state of the tracker
        """
        self.predictions += 1
        state = self.tracker.predict(point)
        return state

    def update(self, point):
        """
        Update the tracker with new point
        Arguments
        ---------
        point : `tuple` of detected point
        Returns
        -------
        state : new state of the tracker
        """
        self.predictions = 0
        state = self.tracker.update(point)
        return state

    def get_covariance(self):
        variance = self.tracker.get_covariance()
        var = []
        i = 0 
        for v in variance:
            var.append(v[i])
            i += 1
        return var

    def check_pass(self, boundaries):
        if self.line:
            for idx, boundary in enumerate(boundaries):
                (res1, res2) = boundary.check(self.line)
                if res1:
                    self.passed_tuples[idx].append(1)
                elif res2:
                    self.passed_tuples[idx].append(2)
                if len(self.passed_tuples[idx]) == 2:
                    if self.passed_tuples[idx] == boundary.sequence:
                        self.did_pass = True
                    else:
                        self.did_pass = False
                    self.passed_tuples[idx].pop(0)
    
    def check_entry(self, boundaries):
        if self.line:
            for idx, boundary in enumerate(boundaries):
                (res1, res2) = boundary.check(self.line)
                # print(res1,res2)
                if res1:
                    self.entries_tuples[idx].append(1)
                elif res2:
                    self.entries_tuples[idx].append(2)
                if len(self.entries_tuples[idx]) == 2:
                    if self.entries_tuples[idx] == boundary.sequence:
                        self.did_enter = True
                    elif self.entries_tuples[idx] == boundary.sequence[::-1]:
                        self.did_exit = True
                    self.entries_tuples[idx].pop(0)
