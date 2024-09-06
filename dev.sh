#!/bin/bash
service pmon2 stop
killall ping
echo -ne "/etc/pmon2/pmon.conf\r"
cp service/pmon.conf /etc/pmon2/pmon.conf
sleep 0.5
echo -ne "/etc/pmon2/hosts.list\r"
cp service/hosts.list /etc/pmon2/hosts.list
sleep 0.5
echo -ne "/etc/init.d/pmon2            \r"
cp service/pmon-service /etc/init.d/pmon

sleep 0.5
echo -ne "/var/lib/pmon/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon/.....\r"
cp lib/* /var/lib/pmon2
echo -ne "Copying triggers...\r" 
rm -fr /var/lib/pmon2/GUI
cp -r GUI /var/lib/pmon2/GUI
cp service/pmond /bin/pmond
cp pmon.sh /usr/bin/pmon
echo "Dev OK                      "
