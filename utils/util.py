from math import sqrt, pow, exp, pi
from scipy import stats


def get_midpoint(bounding_box):
    """ Get middle points of given frame
    Arguments:
    ----------
    bounding_box : (width,height) or (x, y, w, h)
    """
    if(len(bounding_box) == 2):
        width, height = bounding_box
        y = float(height) / float(2)
        x = float(width) / float(2)
        return (int(x), int(y))
    if(len(bounding_box) == 4):
        x, y, w, h = bounding_box
        w = int(w)/2
        h = int(h)/2
        return(int(x) + int(w), int(y) + int(h))

def get_distance(p1=(0,0), p2=(0,0)):
    """ Get distance between any give 2 points
    `p1`: `tuple`, (x1,y1)
    `p2`: `tuple`, (x2,y2)
    """
    x1, y1 = p1
    x2, y2 = p2
    d1 = pow(x2-x1, 2)
    d2 = pow(y2-y1, 2)
    distance = sqrt(d1 + d2)
    return distance

def gaussian(x, mu, sigma):
    sigma = sqrt(sigma)
    g = stats.norm.pdf(x, loc=mu, scale=sigma)
    return float(g)


def gaussian_test(x_bar=[], x_sam=[], variance=[], n_var=1, alpha=0.95):
    """
    `x_bar`: population mean, predicted points from Kf
    'x_sam' : sample mean, detected points from smartvision 
    """
    alpha = stats.norm.ppf(alpha)
    score = 0
    x, y, w, h = x_bar
    x1, y1, w1, h1 = x_sam
    xv, yv, wv, hv = variance
    x_score = gaussian(x1, x, xv)
    y_score = gaussian(y1, y, yv)
    if((x_score <= alpha and x_score >= -alpha) and (y_score <= alpha and y_score >= -alpha)):
        if(x_score != 0 and y_score != 0 ):
            score = x_score * y_score
    
    return score
