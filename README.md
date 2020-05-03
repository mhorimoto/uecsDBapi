# UECS DB Access Web API

UECS DBへアクセスするためのWeb API

**Version 0.00**

## 対象DB

 volga上の uecs0

## 機能一覧

|     名称     |             機能概要               | 状況 |
|:------------:|:-----------------------------------|:----:|
| getdata      | 日付をキーにデータを取得する       |  未  |
| getdatabyccm | CCMtypeをキーにデータを取得する    |  未  |
| getdatabyip  | IPアドレスをキーにデータを取得する |  未  |
| listip       | IPアドレスの一覧を取得する         |  未  |
| listccm      | CCMtypeの一覧を取得する            |  未  |

## 機能詳細

### getdata

 日付をキーにデータを取得する。  
 CCMtypeやIPを無視して日付内のデータを全て(制限個数まで)取得する。
 データ数がめちゃくちゃ多くなるので、DB保存の指定した範囲か、
 1,000レコードまでなどの出力量になる。

| オプション | 意味 |
|:-----------|:-----|
| s="YYYY-MM-DD HH:MM:SS" | 開始年月日 時刻                                                              |
| e="YYYY-MM-DD HH:MM:SS" | 終了年月日 時刻                                                              |
| l=1000                  | 出力上限数 1日分だと120万レコードくらいになるので既定値では1,000レコードまで |
| r=1                     | 開始と終了の日時関係が、s > e のときには r=1 をつける                        |


### getdatabyccm 

 CCMtypeをキーにデータを取得する。

### getdatabyip

 IPアドレスをキーにデータを取得する。


### listip

 IPアドレスの一覧を取得する。


### listccm

 CCMtypeの一覧を取得する。


