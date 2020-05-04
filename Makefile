DIR=/var/www/html
LISTCCM=listccm.php
LISTIP=listip.php
GETDATA=getdata.php
GETDATABYCCM=getdatabyccm.php
GETDATABYIP=getdatabyip.php
PASSWDF=uecsdbconnect

/var/www/etc/${PASSWDF}: ${PASSWDF}
	/bin/cp ${PASSWDF} /var/www/etc/${PASSWDF}

${DIR}/${LISTCCM}: ${LISTCCM}
	/bin/cp ${LISTCCM} ${DIR}/${LISTCCM}

${DIR}/${LISTIP}: ${LISTIP}
	/bin/cp ${LISTIP} ${DIR}/${LISTIP}

${DIR}/${GETDATA}: ${GETDATA}
	/bin/cp ${GETDATA} ${DIR}/${GETDATA}

${DIR}/${GETDATABYCCM}: ${GETDATABYCCM}
	/bin/cp ${GETDATABYCCM} ${DIR}/${GETDATABYCCM}

${DIR}/${GETDATABYIP}: ${GETDATABYIP}
	/bin/cp ${GETDATABYIP} ${DIR}/${GETDATABYIP}

all: /var/www/etc/${PASSWDF} ${DIR}/${LISTCCM} ${DIR}/${LISTIP} ${DIR}/${GETDATA} ${DIR}/${GETDATABYCCM} ${DIR}/${GETDATABYIP}
