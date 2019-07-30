# Calerepo2

## 環境バージョン情報

vagrant -v
Vagrant 2.2.3

vagrant plugin install vagrant-vbguest
Installed the plugin 'vagrant-vbguest (0.17.2)'!

vagrant plugin install vagrant-hostmanager
Installed the plugin 'vagrant-hostmanager (1.8.9)'!


## Homesteadをインストールする

インストール先はcalerepo2の直下

git clone https://github.com/laravel/homestead.git Homestead

## Homestead.ymlとVagrantfileをHomesteadディレクトリにコピーする

cp Homestead.yml Homestead/Homestead.yml
cp Vagrantfile Homestead/Vagrantfile

## vagrantがhostsファイルを書き換えるためパーミッションやユーザーの設定をしておく

## ./Homestead vagrant upを実行する

## 下記でアクセス可能

http://dev.calerepo2.com/

## Google Cloud Platformで発行したcredentialをLaravel/config/client.jsonに配置

https://console.developers.google.com/start/api?id=calendar

## /.envに下記を設定

GOOGLE_APPLICATION_CREDENTIALS=/home/vagrant/code/config/client.json
