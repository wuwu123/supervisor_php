## 任务监控

根据监控supervisor的状态变化，执行脚本，脚本的代码是从**网上**下载的，然后改了一下，已经忘记了源地址在哪里了。

```
[eventlistener:listener]
command = /usr/local/bin/php /home/www/supervisor/Supervisor.php
process_name = %(program_name)s
autostart = true
autorestart = unexpected
startretries = 10
startsecs = 10
stopwaitsecs = 120
user = www
events = PROCESS_STATE_EXITED,PROCESS_STATE_STOPPED,PROCESS_STATE_FATAL,PROCESS_LOG_STDERR
stopsignal = TERM
```

