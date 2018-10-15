<?php
require_once __DIR__ . '/Supervisor/EventListener.php';
require_once __DIR__ . '/Supervisor/EventNotification.php';
require_once __DIR__ . '/Supervisor/SupervisorClient.php';
require_once __DIR__ . '/Supervisor/StatusMessage.php';
require_once __DIR__ . '/Supervisor/CCurl.php';

$hostname = @gethostname();
$url = "http://www.dizhi.com/monitor";
$curl = new CCurl();
$listener = new EventListener();
$listener->listen(function (EventListener $listener, EventNotification $event) use ($hostname , $url, $curl) {
    $state = $event->getEventName();
    if (strpos($state, 'PROCESS_STATE_') !== false) {
        $groupname   = $event->getData('groupname');
        $processname = $event->getData('processname');
        if ($groupname) {
            $name = $groupname . ":" . $processname;
        } else {
            $name = $processname;
        }

        /**
         * 进程异常退出
         */
        if ($state == EventNotification::PROCESS_STATE_FATAL) {
            $message = [
                'domain'   => "php",
                'receiver' => "",
                'title'    => $name,
                'content'  => StatusMessage::getMessage(EventNotification::PROCESS_STATE_FATAL),
                'type'     => "",
            ];
            $curl->sendMessage($url, $message);
        }
    }
    return true;
});
