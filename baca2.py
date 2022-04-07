import pandas as pd
import joblib
import numpy as np
import mysql.connector
import functools
import operator
from sklearn import preprocessing

dbase = mysql.connector.connect(
    host='localhost',
    database='cobapa',
    user='root',
    password=''
)
mycursor = dbase.cursor()

umur = dbase.cursor()
umur.execute(
    "SELECT file from cobafile ORDER BY id desc limit 1")
hasilumur = umur.fetchone()

# for a in hasilumur:
#     print(a)

# datafile = pd.read_excel('berkas/', a)

# data = pd.read_excel('berkas/heart (1).xlsx')
def convertTuple(tup):
    str = functools.reduce(operator.add, (tup))
    return str


# Driver code
tuple = (hasilumur)
str = convertTuple(tuple)


def convertTuple2(tup2):
    st = ''.join(map(str, tup2))
    return st
# Driver code
tuple = ('berkas/', str)
str = convertTuple(tuple)

print(str)

data = pd.read_csv(str)

model_file = 'bagging_classification_model.sav'
loaded_model = joblib.load(model_file)

features = data.loc[:, 'age':'thal'].values
scaler = preprocessing.MinMaxScaler(feature_range=(0, 10)).fit(features)
scaled_feature = scaler.transform(features)

result = loaded_model.predict(scaled_feature)
hasil = pd.DataFrame(result)

print(hasil)
