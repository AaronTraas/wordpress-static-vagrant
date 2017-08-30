#!/bin/sh
### BEGIN INIT INFO
# Provides:          staticsync
# Required-Start:    $remote_fs $syslog
# Required-Stop:     $remote_fs $syslog
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: Syncs export directory on file change
# Description:       Syncs export directory on file change
### END INIT INFO

while true; do
    inotifywait -r /var/www/export/* -o /var/log/staticsync.log
    su ubuntu -c "rsync -o StrictHostKeyChecking=no -avz /var/www/export/ ubuntu@10.99.0.3:/var/www/html/"
done

