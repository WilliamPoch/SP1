#-*- coding: utf-8 -*-
"""
SmartNet class for object detection and localization
Author: Avanish Shrestha, 2018
"""

from __future__ import division, print_function, absolute_import
import time
import datetime
import numpy as np
from utils.person import Person
from utils.util import get_midpoint, gaussian_test, get_distance


class PeopleTracker(object):
    def __init__(self, entry_boundaries, entries=0, exits=0, count=0):
        self.people = []
        self.trackers = []
        self.pass_boundaries = None
        self.entry_boundaries = entry_boundaries
        self.entries = entries
        self.exits = exits
        self.passed = None
        self.count = count
        self.people_id = 0
        self.morning = 0
        self.afternoon = 0
        self.date = datetime.date.today()

    def update(self, points=[], update_type='distance'):
        """ Associate the existing people trackers with new detected points
        Arguments
        ---------
        points : `list` of detected points
        type : `str` of update type. Options: [`distance`, `gaussian`]
        """
        #============= loop through points with distances =============
        self.trackers = []
        self.count = len(points)
        people_ids = []
        new_people = []
        for point in points:
            scores = []
            for person in self.people:
                if person.id in people_ids:
                    if update_type == 'distance':
                        scores.append(1000)
                    else:
                        scores.append(0)
                else:
                    if update_type == 'distance':
                        pred_mid = get_midpoint(person.predict(person.coordinates[-1]))
                        det_mid = get_midpoint(point)
                        scores.append(get_distance(pred_mid, det_mid))
                    else:
                        pred = person.tracker.predict(person.coordinates[-1])
                        scores.append(gaussian_test(pred, point, person.get_covariance(), 0.90))
            if update_type == 'distance':
                closest_point = np.amin(scores) if scores else 1000
            else:
                closest_point = np.amax(scores) if scores else 0
            if (update_type == 'distance' and closest_point <= 60) or (update_type == 'gaussian' and closest_point > 0):
                idx = scores.index(closest_point)
                person_toupdate = self.people[idx].update(point)
                self.people[idx].add_coordinates(person_toupdate)
                self.trackers.append(person_toupdate)
                people_ids.append(self.people[idx].id)
            else:
                person = Person(self.people_id, len(self.entry_boundaries))
                person.add_coordinates(point)
                self.trackers.append(point)
                self.people_id += 1
                new_people.append(person)
        for person in self.people:
            if person.id not in people_ids:
                pred = person.predict(person.coordinates[-1])
                person.add_coordinates(pred)
                self.trackers.append(pred)
        self.people.extend(new_people)

    # to check if the person has passed through entrane or exit by comparing ppl midpoint and decision zone
    def check(self):
        """ Function to track entry exit of every person """
        to_del = []
        for person in self.people:
            if person.predictions == 10:
                to_del.append(person)                
            else:
                # person.check_pass(self.pass_boundaries)
                person.check_entry(self.entry_boundaries)
                if person.did_enter:
                    self.entries += 1
                    person.did_enter = False
                    person.crossed_lines = []
                    print("New Entry. Count: %s" %self.entries)
                    if datetime.datetime.now().strftime("%H:%M:%S") < "12:00:00":
                        self.morning += 1
                    else:
                        self.afternoon += 1
                if person.did_exit:
                    self.exits += 1
                    person.did_exit = False
                    person.crossed_lines = []
                    print("New Exit. Count: %s" %self.exits)
                # if person.did_pass:
                #     self.passed += 1
                #     person.did_pass = False
                #     person.crossed_lines = []
        for toX in to_del:
            self.people.remove(toX)

    def get_trackers(self):
        """ Get number of people traking coordinate"""
        return self.trackers
    
    def get_tracker_dictionary(self):
        data_dict = {}
        for person in self.people:
            coord = person.coordinates[-1]
            center = get_midpoint(coord)
            data_dict[person.id] = {
                'coord': coord,
                'center': center
            }
        return data_dict
    
    def get_data(self, type='array'):
        """ Return entris & exits data """
        if type=='array':
            result = [self.entries, self.exits, self.count, str(datetime.datetime.now())]
            return result
        elif type=='dict':
            result = {}
            result['in'] = self.entries
            result['out'] = self.exits
            # result['total'] = self.count
            result['morning'] = self.morning
            result['afternoon'] = self.afternoon
            result['date'] = str(datetime.date.today())
            # result['trackers'] = self.get_tracker_dictionary()
            return result
