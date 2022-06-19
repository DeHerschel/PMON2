#!/bin/bash
function isRoot() {
	[ "$EUID" -ne 0 ] && echo "Execute as root" && exit
}
isRoot

echo -ne "Intalling dependencies...\n";
sleep 1
[[ `which php` ]] || {
	echo -ne "Installing php...\r"
	sleep 1;
	apt install php libapache2-mod-pho
}
[[ `which node` ]] || {
	echo -ne "Installing nodejs...\r"
	curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -
	sleep 1;
	apt install nodejs npm build-essential
}
[[ `which composer` ]] || {
	echo -ne "Installing composer...\r"
	sleep 1;
	apt install composer
}
[[ `which sqlite3` ]] || {
	echo -ne "Installing sqlite3...\r"
	sleep 1;
	apt install sqlite3 php-sqlite3
}
[[ `which arp-scan` ]] || {
	echo -ne "Installing arp-scan...\r";
	sleep 1;
	apt install arp-scan
}
[[ `which ifconfig` ]] || {
	echo -ne "Installing net-tools...\r";
	sleep 1;
	apt install net-tools
}
echo 'ok'
sleep 1
if [[ -d /var/lib/pmon2 ]]; then
	echo "It appears that pmon2 is alredy installed, do you want to continue? (y/n)";
	read yesorno;
	if [[ $yesorno == "y" ]] || [[ $yesorno == "yes" ]]; then
		systemctl stop pmon2
		echo -ne "Removing files...\r"
		rm -rf /var/lib/pmon2
		rm /usr/bin/pmon
		rm /bin/pmond
		rm /etc/init.d/pmon2
		if [ -f /var/log/pmon2.log ]; then
			rm /var/log/pmon2.log
		fi
		if [ -f /var/log/pmon2.err.log ]; then
			rm /var/log/pmon2.err.log
		fi
		rm -r /etc/pmon2
		rm -r /tmp/pmon2
	else 
		exit 1;
	fi  
fi
echo -ne "Making directories...\n"
sleep 2
echo -ne "/var/lib/pmon2                 \r"
sleep 0.5
mkdir /var/lib/pmon2
sleep 0.5
echo -ne "/etc/pmon2                      \r"
sleep 0.5
mkdir /etc/pmon2
mkdir /tmp/pmon2
echo -ne "ok                                  \n"

echo -ne "Copying files...                     \n"
sleep 0.5
sleep 0.5
echo -ne "/etc/pmon2/pmon2.conf\r"
cp service/pmon2.conf /etc/pmon2/pmon2.conf
sleep 0.5
echo -ne "/etc/init.d/pmon2            \r"
cp service/pmon-service /etc/init.d/pmon2

cp lib/* /var/lib/pmon2/ &
sleep 0.5
echo -ne "/var/lib/pmon2/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon2/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon2/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon2/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon2/.....\r"
sleep 0.5
echo -ne "/var/lib/pmon2/\n"
cp service/pmond /var/lib/pmon2/pmond
cp pmon.sh /var/lib/pmon2/pmon.sh
cp -r GUI /var/lib/pmon2/GUI
cp pmon2db.sqlite /etc/pmon2/pmon2db.sqlite
php /var/lib/pmon2/GUI/artisan migrate:fresh

sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'roles' ('name') values ('superadmin')"
sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'roles' ('name') values ('sysadmin')"
sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'roles' ('name') values ('programmer')"

php /var/lib/pmon2/GUI/artisan migrate --seed
sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'targets' ('name', 'IP', 'domain') values ('Google', '8.8.8.8', 'google.com')"
date=`date +"%Y-%m-%d %H:%M:%S"`
sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'role_target' ('target_id', 'role_id') values ('1', '1')"
sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'role_target' ('target_id', 'role_id') values ('1', '2')"
sqlite3 /etc/pmon2/pmon2db.sqlite "INSERT INTO 'role_target' ('target_id', 'role_id') values ('1', '3')"


sleep 1
echo -ne "ok                              \n"
echo -ne "Making symlinks....\n"

ln /var/lib/pmon2/pmond /bin/pmond
ln /var/lib/pmon2/pmon.sh /usr/bin/pmon
echo -ne "ok                                \n"
echo -ne "Making tweaks...\n" 
cd /var/lib/pmon2/GUI
rm -r public/storage
php artisan storage:link
echo -ne "ok\n"

echo "Dow you want to enable pmon at the init? (y/n)";
read yesorno;
if [[ $yesorno == "y" ]] || [[ $yesorno == "yes" ]]; then 
	systemctl enable pmon2
fi
systemctl daemon-reload
systemctl start pmon2
echo "Installed!. Now you can log in with User: Admin and Password: password on http://localhost:7000"

