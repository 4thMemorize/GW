#! /usr/bin/python3
#-*- coding: utf-8 -*-

import pymysql
import datetime
import logging as log

log.basicConfig(filename='./log/Back.log', level=log.INFO)
#! Python - MySQL Connection
link = pymysql.connect(host="localhost", user="root", passwd="4thMemorize", db="GW", charset="utf8")
cur = link.cursor()
cur.execute("set names utf8")
#! Date Functions
date = datetime.datetime
weekno = date.today().weekday()
time = date.now()
month = int(time.month)
#! Manage Config File
file = open('./log/Back.conf', mode='r')
record = open('./log/record.conf', mode='a')
fileread = file.readlines()
RecentMonth_value = int(fileread[0].split(': ')[1])

print(RecentMonth_value)
print(month)

if RecentMonth_value != month:
    print(RecentMonth_value)
    cur.execute("""CREATE TABLE IF NOT EXISTS `{month}월`
               (SELECT ID, Grade, Class, Number, Name FROM `Identify`)
               """.format(month=time.month))
    link.commit()
    log.info("Program created table \'{month}월\' successfully. ".format(month=time.month))
    Config_Month = "RecentMonth : {month}".format(month = time.month)

    cur.execute("""ALTER TABLE `{month}월`
                MODIFY COLUMN ID int(3) PRIMARY KEY
                """.format(month=time.month))
    link.commit()
    filewrite = open('./log/Back.conf', mode='w')
    filewrite.write(Config_Month)
    record.write(str(month))
    record.write("/")


cur.execute("""ALTER TABLE `{month}월` ADD `{day}일`
            varchar(99) default '불출석'
            """.format(month=time.month, day=time.day))
link.commit()
log.info("""Program created column \'{day}일\' on Table \'{month}월\' successfully.
        """.format(month=time.month, day=time.day))

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
#     link.commit(uto
#     log.info("Program created column \'{day}일\' on Table \'{month}월\' successfully. ".format(month=time.month, day=time.day))
#
#
# link.close()
