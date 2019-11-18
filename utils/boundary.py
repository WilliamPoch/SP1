"""
"""

import numpy as np
import collections

Params = collections.namedtuple('Params', ['a', 'b', 'c'])

class Line():
    def __init__(self, point):
        self.x1 = point[0]
        self.y1 = point[1]
        self.x2 = point[2]
        self.y2 = point[3]
        self.equation = self._calc_params((self.x1, self.y1), (self.x2, self.y2))

    def _calc_params(self, point1, point2):
        # forumla = ax + by + c = 0
        a = -1 * (self.y2 - self.y1)
        b = (self.x2 - self.x1)
        c = (-a * self.x1 - b * self.y1)
        return Params(a, b, c)

    def is_intersecting(self, check_line):
        det = check_line.equation.a * self.equation.b - self.equation.a * check_line.equation.b
        if det == 0: # lines are parallel
            return False
        else:
            x = (self.equation.b * -check_line.equation.c - check_line.equation.b * -self.equation.c)/det
            y = (check_line.equation.a * -self.equation.c - self.equation.a * -check_line.equation.c)/det
            if (x <= max(self.x1, self.x2) and x >= min(self.x1, self.x2) and y <= max(self.y1, self.y2) and y >= min(self.y1, self.y2) and
                x <= max(check_line.x1, check_line.x2) and x >= min(check_line.x1, check_line.x2) and y <= max(check_line.y1, check_line.y2) and y >= min(check_line.y1, check_line.y2)):
                return True
            else:
                return False

class Boundary():
    def __init__(self, line1, line2, boundary_type='entry', sequence=[1, 2]):
        self.line1 = Line(line1)
        self.line2 = Line(line2)
        self.type = boundary_type
        self.sequence = sequence

    def check(self, check_line):
        return (self.line1.is_intersecting(check_line), self.line2.is_intersecting(check_line))

    def get_lines(self):
        return [((self.line1.x1, self.line1.y1), (self.line1.x2, self.line1.y2)), ((self.line2.x1, self.line2.y1), (self.line2.x2, self.line2.y2))]
