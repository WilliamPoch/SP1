"""
"""

import numpy as np
import cv2
import tensorflow as tf

class Detector:
    def __init__(self, path_to_ckpt):
        self.path_to_ckpt = path_to_ckpt
        self.detection_graph = tf.Graph()
        with self.detection_graph.as_default():
            od_graph_def = tf.GraphDef()
            with tf.gfile.GFile(self.path_to_ckpt, 'rb') as fid:
                serialized_graph = fid.read()
                od_graph_def.ParseFromString(serialized_graph)
                tf.import_graph_def(od_graph_def, name='')
        # self.default_graph = self.detection_graph.as_default()
        gpu_options = tf.GPUOptions(per_process_gpu_memory_fraction=0.80)
        self.sess = tf.Session(config=tf.ConfigProto(gpu_options=gpu_options), graph=self.detection_graph)
        self.image_tensor = self.detection_graph.get_tensor_by_name('image_tensor:0')
        self.detection_boxes = self.detection_graph.get_tensor_by_name('detection_boxes:0')
        self.detection_scores = self.detection_graph.get_tensor_by_name('detection_scores:0')
        self.detection_classes = self.detection_graph.get_tensor_by_name('detection_classes:0')
        self.num_detections = self.detection_graph.get_tensor_by_name('num_detections:0')

    def detect(self, image, min_size, max_size, threshold=0.3):
        image_np_expanded = np.expand_dims(image, axis=0)
        (boxes, scores, classes, num) = self.sess.run(
            [self.detection_boxes, self.detection_scores, self.detection_classes, self.num_detections],
            feed_dict={self.image_tensor: image_np_expanded}
        )
        im_height, im_width = image.shape[:2]
        boxes_list = [None for i in range(boxes.shape[1])]
        for i in range(boxes.shape[1]):
            boxes_list[i] = (
                int(boxes[0,i,0] * im_height),
                int(boxes[0,i,1] * im_width),
                int(boxes[0,i,2] * im_height),
                int(boxes[0,i,3] * im_width)
            )
        scores = scores[0].tolist()
        classes = [int(x) for x in classes[0].tolist()]
        temp_boxes = []
        for idx, obj_class in enumerate(classes):
            if obj_class == 1: # person
                if scores[idx] >= threshold:
                    W = boxes_list[idx][3] - boxes_list[idx][1]
                    H = boxes_list[idx][2] - boxes_list[idx][0]
                    if (W > min_size[0] and W < max_size[0] and H > min_size[1] and H < max_size[1]):
                        temp_boxes.append(boxes_list[idx])
        #             coord = boxes_list[idx]
        #             W = coord[3] - coord[1]
        #             H = coord[2] - coord[0]
        #             new_coord = (coord[1], coord[0], W, H)
        #             if (W > min_size[0] and W < max_size[0] and H > min_size[1] and H < max_size[1]):
        #                 temp_boxes.append(new_coord)
        # return temp_boxes
        new_boxes = []
        temp_boxes = self.non_max_supression(np.array(temp_boxes), 0.8)
        for box in temp_boxes:
            W = box[3] - box[1]
            H = box[2] - box[0]
            new_boxes.append((box[1], box[0], W, H))
        return new_boxes

    def non_max_supression(self, boxes, threshold):
        if len(boxes) == 0:
            return []
        pick = []
        x1 = boxes[:, 0]
        y1 = boxes[:, 1]
        x2 = boxes[:, 2]
        y2 = boxes[:, 3]
        area = (x2 - x1 + 1) * (y2 - y1 + 1)
        idxs = np.argsort(y2)
        while len(idxs) > 0:
            last = len(idxs) - 1
            i = idxs[last]
            pick.append(i)
            xx1 = np.maximum(x1[i], x1[idxs[:last]])
            yy1 = np.maximum(y1[i], y1[idxs[:last]])
            xx2 = np.minimum(x2[i], x2[idxs[:last]])
            yy2 = np.minimum(y2[i], y2[idxs[:last]])
            w = np.maximum(0, xx2 - xx1 + 1)
            h = np.maximum(0, yy2 - yy1 + 1)
            overlap = (w * h) / area[idxs[:last]]
            idxs = np.delete(idxs, np.concatenate(([last], np.where(overlap >= threshold)[0])))
        return boxes[pick].astype('int')