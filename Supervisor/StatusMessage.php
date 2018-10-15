<?php

/**
 * User: wujie
 * Date: 2016/12/22
 * @desc
 */
class StatusMessage
{

    public static $message
        = [
            "PROCESS_STATE"                     => "进程状态发生改变",
            "PROCESS_STATE_STARTING"            => "进程状态从其他状态转换为正在启动(Supervisord的配置项中有startsecs配置项，是指程序启动时需要程序至少稳定运行x秒才认为程序运行正常，在这x秒中程序状态为正在启动)",
            "PROCESS_STATE_RUNNING"             => " 进程状态由正在启动转换为正在运行",
            "PROCESS_STATE_BACKOFF"             => "进程状态由正在启动转换为失败",
            "PROCESS_STATE_STOPPING"            => "进程状态由正在运行转换为正在停止",
            "PROCESS_STATE_EXITED"              => "进程状态由正在运行转换为退出",
            "PROCESS_STATE_STOPPED"             => " 进程状态由正在停止转换为已经停止(exited和stopped的区别是exited是程序自行退出，而stopped为人为控制其退出)",
            "PROCESS_STATE_FATAL"               => "进程状态由正在运行转换为失败",
            "PROCESS_STATE_UNKNOWN"             => "未知的进程状态",
            "EMOTE_COMMUNICATION"              => "使用Supervisord的RPC接口与Supervisord进行通信",
            "PROCESS_LOG"                       => "进程产生日志输出，包括标准输出和标准错误输出",
            "PROCESS_LOG_STDOUT"                => "进程产生标准输出",
            "PROCESS_LOG_STDERR"                => "进程产生标准错误输出",
            "PROCESS_COMMUNICATION"             => " 进程的日志输出包含 和",
            "PROCESS_COMMUNICATION_STDOUT"      => " 进程的标准输出包含 和",
            "PROCESS_COMMUNICATION_STDERR"      => "进程的标准错误输出包含 和",
            "UPERVISOR_STATE_CHANGE_RUNNING"   => " Supervisord启动",
            "UPERVISOR_STATE_CHANGE_STOPPING " => "Supervisord停止",
        ];

    public static function getMessage($status){
        if (array_key_exists($status , self::$message)){
            return self::$message[$status];
        }
        return $status;
    }
}