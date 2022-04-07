import pandas as pd
import joblib
import numpy as np
import mysql.connector
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
    "SELECT age from datasetcoba ORDER BY id desc limit 1")
hasilumur = umur.fetchone()

for a in hasilumur:
    print(a)

gender = dbase.cursor()
gender.execute(
    "SELECT sex from datasetcoba ORDER BY id desc limit 1")
hasilgender = gender.fetchone()

for b in hasilgender:
    print(b)

cp = dbase.cursor()
cp.execute(
    "SELECT cp from datasetcoba ORDER BY id desc limit 1")
hasilcp = cp.fetchone()

for c in hasilcp:
    print(c)

trest = dbase.cursor()
trest.execute(
    "SELECT trestbps from datasetcoba ORDER BY id desc limit 1")
hasiltrest = trest.fetchone()

for d in hasiltrest:
    print(d)

chol = dbase.cursor()
chol.execute(
    "SELECT chol from datasetcoba ORDER BY id desc limit 1")
hasilchol = chol.fetchone()

for e in hasilchol:
    print(e)

fbs = dbase.cursor()
fbs.execute(
    "SELECT fbs from datasetcoba ORDER BY id desc limit 1")
hasilfbs = fbs.fetchone()

for f in hasilfbs:
    print(f)

restecg = dbase.cursor()
restecg.execute(
    "SELECT restecg from datasetcoba ORDER BY id desc limit 1")
hasilrestecg = restecg.fetchone()

for g in hasilrestecg:
    print(g)

thalach = dbase.cursor()
thalach.execute(
    "SELECT thalach from datasetcoba ORDER BY id desc limit 1")
hasilthalach = thalach.fetchone()

for h in hasilthalach:
    print(h)

exang = dbase.cursor()
exang.execute(
    "SELECT exang from datasetcoba ORDER BY id desc limit 1")
hasilexang = exang.fetchone()

for i in hasilexang:
    print(i)

oldpeak = dbase.cursor()
oldpeak.execute(
    "SELECT oldpeak from datasetcoba ORDER BY id desc limit 1")
hasiloldpeak = oldpeak.fetchone()

for j in hasiloldpeak:
    print(j)

slope = dbase.cursor()
slope.execute(
    "SELECT slope from datasetcoba ORDER BY id desc limit 1")
hasilslope = slope.fetchone()

for k in hasilslope:
    print(k)

ca = dbase.cursor()
ca.execute(
    "SELECT ca from datasetcoba ORDER BY id desc limit 1")
hasilca = ca.fetchone()

for l in hasilca:
    print(l)

thal = dbase.cursor()
thal.execute(
    "SELECT thal from datasetcoba ORDER BY id desc limit 1")
hasilthal = thal.fetchone()

for m in hasilthal:
    print(m)

model_file = 'bagging_classification_model.sav'
loaded_model = joblib.load(model_file)
data = (a,b,c,d,e,f,g,h,i,j,k,l,m)
data1 = np.reshape(data, (1, -1))


#if(result == np.False_):
 #   output = "positif"
#else:
 #   output = "negatif"

#print(output)  
# scaler = preprocessing.StandardScaler().fit(data1)
# scaled_feature = scaler.transform(data1)
result = loaded_model.predict(data1)

((np.round(result[0], 2)))
if (np.round(result)) == 1:
    output = "positif penyakit jantung"

elif(np.round(result)) == 0:
    output = "negatif penyakit jantung"
    
print(output) 