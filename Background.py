#! /usr/bin/python3
#-*- coding: utf-8 -*-

import pymysql
import datetime
import logging as log

log.basicConfig(filename='./Back.log', level=log.INFO)
#! Python - MySQL Connection
link = pymysql.connect(host="localhost", user="root", passwd="4thMemorize", db="GW", charset="utf8")
cur = link.cursor()
cur.execute("set names utf8")
#! Date Functions
date = datetime.datetime
weekno = date.today().weekday()
time = date.now()
#! Manage Config File
file = open('./Back.conf', mode='rw')
fileread = file.readlines()
RecentMonth_value = fileread[0].split(':')[1]
PrimaryKey_value = bool(fileread[1].split(':')[1])

if RecentMonth_value<int(time.month):
    cur.execute("CREATE TABLE IF NOT EXISTS `{month}월`
               (SELECT ID, Grade, Class, Number, Name FROM `Identify`)
               ".format(month=time.month))
    link.commit()
    log.info("Program created table \'{month}월\' successfully. ".format(month=time.month))
    Config_Month = "RecentMonth : {month}".format(month = time.month)

    cur.execute("ALTER TABLE `{month}월`
                MODIFY COLUMN ID int(3) PRIMARY KEY
                ".format(month=time.month))
    link.commit()
    file.write(Config_Month)


cur.execute("ALTER TABLE `{month}월` ADD `{day}일`
            varchar(99) default '불출석'
            ".format(month=time.month, day=time.day))
link.commit()
log.info("Program created column \'{day}일\' on Table \'{month}월\' successfully.
        ".format(month=time.month, day=time.day))

link.close()
# if time.day<18:
#     cur.execute("CREATE TABLE IF NOT EXISTS `{month}월` (SELECT ID, Grade, Class, Number, Name FROM `Identify`)".format(month=time.month))
#     link.commit()
#     cur.execute("ALTER TABLE `{month}월` MODIFY COLUMN ID int(3) PRIMARY KEY".format(month=time.month))
#     link.commit()
#     log.info("Program created table \'{month}월\' successfully. ".format(month=time.month))
#
# if weekno<5:
#     cur.execute("ALTER TABLE `{month}월` ADD `{day}일` varchar(99) default '불출석'".format(month=time.month, day=time.day))
#     link.commit()
#     log.info("Program created column \'{day}일\' on Table \'{month}월\' successfully. ".format(month=time.month, day=time.day))
#
#
# link.close()
