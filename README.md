# UECS DB Access Web API

UECS DBへアクセスするためのWeb API

**Version 1.00**

## 対象DB

 volga上の uecs0

## 機能一覧

|     名称         |             機能概要               | Version |
|:----------------:|:-----------------------------------|:-------:|
| getdata.php      | 日付をキーにデータを取得する       |  1.00   |
| getdatabyccm.php | CCMtypeをキーにデータを取得する    |  1.00   |
| getdatabyip.php  | IPアドレスをキーにデータを取得する |  1.00   |
| listip.php       | IPアドレスの一覧を取得する         |  1.00   |
| listccm.php      | CCMtypeの一覧を取得する            |  1.00   |

出力は、JSONになる。

## 機能詳細

### getdata

 日付をキーにデータを取得する。  
 CCMtypeやIPを無視して日付内のデータを全て(制限個数まで)取得する。
 データ数がめちゃくちゃ多くなるので、DB保存の指定した範囲か、
 1,000レコードまでなどの出力量になる。

| **オプション**          | **意味**                                                                     |
|:------------------------|:-----------------------------------------------------------------------------|
| s="YYYY-MM-DD HH:MM:SS" | 開始年月日 時刻                                                              |
| e="YYYY-MM-DD HH:MM:SS" | 終了年月日 時刻                                                              |
| l=1000                  | 出力上限数 1日分だと120万レコードくらいになるので既定値では1,000レコードまで |
| r=1                     | SORTINGを逆順にしたいときにr=1をつける                                       |

 出力は、JSON形式になる。

| **Tag**  |        **意味**                                 |
|:--------:|:------------------------------------------------|
| tod      | 日時                                            |
| ccmtype  | CCM type                                        |
| room     | ROOM                                            |
| region   | REGION                                          |
| ord      | ORDER                                           |
| priority | PRIORITY                                        |
| value    | データ・小数点下18桁くらいの固定小数点          |
| ip       | IPアドレス                                      |
| serialid | Serial ID レコードを特定する際に有効            |

    【出力例】
     [
       {"tod":"2020-05-01 00:00:00+09","ccmtype":"cnd.aXX","room":1,"region":2,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.178","serialid":147820624},
       {"tod":"2020-05-01 00:00:00+09","ccmtype":"cnd.aXX","room":1,"region":11,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.162","serialid":147820625},
       {"tod":"2020-05-01 00:00:00+09","ccmtype":"InAirTemp.mIC","room":1,"region":3,"ord":1,"priority":29,"value":"14.900000000000000000","ip":"192.168.0.191","serialid":147820626},
       {"tod":"2020-05-01 00:00:00+09","ccmtype":"InAirHumid.mIC","room":1,"region":3,"ord":1,"priority":29,"value":"99.400000000000000000","ip":"192.168.0.191","serialid":147820627},
       {"tod":"2020-05-01 00:00:00+09","ccmtype":"InAirHumidDef.mIC","room":1,"region":3,"ord":1,"priority":29,"value":"0.070000000000000000","ip":"192.168.0.191","serialid":147820628}
     ]


### getdatabyccm 

 CCMtypeをキーにデータを取得する。
 データ数がめちゃくちゃ多くなるので、DB保存の指定した範囲か、
 1,000レコードまでなどの出力量になる。

| **オプション**          | **意味**                                                                     |
|:------------------------|:-----------------------------------------------------------------------------|
| c=CCM type              | CCM type  省略不可 完全一致                                                  |
| s="YYYY-MM-DD HH:MM:SS" | 開始年月日 時刻                                                              |
| e="YYYY-MM-DD HH:MM:SS" | 終了年月日 時刻                                                              |
| l=1000                  | 出力上限数 1日分だと120万レコードくらいになるので既定値では1,000レコードまで |
| r=1                     | SORTINGを逆順にしたいときにr=1をつける                                       |

 出力は、JSON形式になる。

| **Tag**  |        **意味**                                 |
|:--------:|:------------------------------------------------|
| tod      | 日時                                            |
| ccmtype  | CCM type                                        |
| room     | ROOM                                            |
| region   | REGION                                          |
| ord      | ORDER                                           |
| priority | PRIORITY                                        |
| value    | データ・小数点下18桁くらいの固定小数点          |
| ip       | IPアドレス                                      |
| serialid | Serial ID レコードを特定する際に有効            |

    【出力例】
       入力：http://volga/getdatabyccm.php?l=10&c=funcsel.mCD
     [
       {"tod":"2020-05-03 14:34:02+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710511},
       {"tod":"2020-05-03 14:34:03+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710536},
       {"tod":"2020-05-03 14:34:04+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710549},
       {"tod":"2020-05-03 14:34:05+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710562},
       {"tod":"2020-05-03 14:34:06+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710575},
       {"tod":"2020-05-03 14:34:07+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710588},
       {"tod":"2020-05-03 14:34:08+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710601},
       {"tod":"2020-05-03 14:34:09+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710615},
       {"tod":"2020-05-03 14:34:11+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710629},
       {"tod":"2020-05-03 14:34:11+09","ccmtype":"funcsel.mCD","room":100,"region":1,"ord":1,"priority":15,"value":"253.000000000000000000","ip":"192.168.0.220","serialid":150710664}
     ]


### getdatabyip

 IPアドレスをキーにデータを取得する。
 データ数がめちゃくちゃ多くなるので、DB保存の指定した範囲か、
 1,000レコードまでなどの出力量になる。

| **オプション**          | **意味**                                                                     |
|:------------------------|:-----------------------------------------------------------------------------|
| i="XXX.XXX.XXX.XXX"     | IPアドレス 省略不可 完全一致                                                 |
| s="YYYY-MM-DD HH:MM:SS" | 開始年月日 時刻                                                              |
| e="YYYY-MM-DD HH:MM:SS" | 終了年月日 時刻                                                              |
| l=1000                  | 出力上限数 1日分だと120万レコードくらいになるので既定値では1,000レコードまで |
| r=1                     | SORTINGを逆順にしたいときにr=1をつける                                       |

 出力は、JSON形式になる。

| **Tag**  |        **意味**                                 |
|:--------:|:------------------------------------------------|
| tod      | 日時                                            |
| ccmtype  | CCM type                                        |
| room     | ROOM                                            |
| region   | REGION                                          |
| ord      | ORDER                                           |
| priority | PRIORITY                                        |
| value    | データ・小数点下18桁くらいの固定小数点          |
| ip       | IPアドレス                                      |
| serialid | Serial ID レコードを特定する際に有効            |

    【出力例】
       入力： http://volga/getdatabyip.php?l=10&i=192.168.0.70
     [
       {"tod":"2020-05-03 15:03:36+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740024},
       {"tod":"2020-05-03 15:03:37+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740037},
       {"tod":"2020-05-03 15:03:38+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740054},
       {"tod":"2020-05-03 15:03:39+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740067},
       {"tod":"2020-05-03 15:03:40+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740080},
       {"tod":"2020-05-03 15:03:41+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740093},
       {"tod":"2020-05-03 15:03:42+09","ccmtype":"cnd.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.000000000000000000","ip":"192.168.0.70","serialid":150740106},
       {"tod":"2020-05-03 15:03:42+09","ccmtype":"InAirTemp.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"23.500000000000000000","ip":"192.168.0.70","serialid":150740107},
       {"tod":"2020-05-03 15:03:42+09","ccmtype":"InAirCO2.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"433.000000000000000000","ip":"192.168.0.70","serialid":150740108},
       {"tod":"2020-05-03 15:03:42+09","ccmtype":"InRadiation.cMC","room":1,"region":1,"ord":1,"priority":1,"value":"0.100000000000000000","ip":"192.168.0.70","serialid":150740109}
     ]



### listip.php

 IPアドレスの一覧を取得する。
 日付をs,eとも省略した時には、今から24時間前までの間のデータになる。


| **オプション**          | **意味**                               |
|:------------------------|:---------------------------------------|
| s="YYYY-MM-DD HH:MM:SS" | 開始年月日 時刻                        |
| e="YYYY-MM-DD HH:MM:SS" | 終了年月日 時刻                        |
| l=1000                  | 出力上限数 既定値では100レコードまで   |


 出力は、IPアドレスのJSON形式になる。

    【出力例】
     [
       {"ip":"192.168.0.70"},
       {"ip":"192.168.0.161"},
       {"ip":"192.168.0.162"},
       {"ip":"192.168.0.178"},
       {"ip":"192.168.0.191"},
       {"ip":"192.168.0.210"},
       {"ip":"192.168.0.220"}
     ]

### listccm.php

 CCMtypeの一覧を取得する。
 日付をs,eとも省略した時には、今から24時間前までの間のデータになる。


| **オプション**          | **意味**                               |
|:------------------------|:---------------------------------------|
| s="YYYY-MM-DD HH:MM:SS" | 開始年月日 時刻                        |
| e="YYYY-MM-DD HH:MM:SS" | 終了年月日 時刻                        |
| l=1000                  | 出力上限数 既定値では100レコードまで   |


 出力は、IPアドレスとCCMtypeのペアのJSON形式になる。

    【出力例】
     [
       {"ip":"192.168.0.70","ccmtype":"cnd.cMC"},
       {"ip":"192.168.0.70","ccmtype":"opr.cMC"},
       {"ip":"192.168.0.161","ccmtype":"Relayopr.1.aXX"},
       {"ip":"192.168.0.161","ccmtype":"Relayopr.10.aXX"},
       {"ip":"192.168.0.161","ccmtype":"Relayopr.2.aXX"},
       {"ip":"192.168.0.161","ccmtype":"Relayopr.3.aXX"}
     ]


