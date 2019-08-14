<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogAlert extends Controller
{
    function show() {
        return view('welcome');
    }

    function addAlerts(Request $request) {
        $api_key = $request['api_key'];
        $app_key = $request['app_key'];

        $ch = curl_init("https://api.datadoghq.com/api/v1/monitor?api_key=$api_key&application_key=$app_key");

        if(isset($request['basicMonitors'])) {
            foreach($request['basicMonitors'] as $mon) {
                $data = $this->$mon();
                if($this->postAlert($ch, $data)) {
                    $success[$mon] = true;
                } else {
                    $success[$mon] = false;
                }
            }
        }

        if(isset($request['basicMysqlMonitors'])) {
            foreach($request['basicMysqlMonitors'] as $mon) {
                $data = $this->$mon();
                if($this->postAlert($ch, $data)) {
                    $success[$mon] = true;
                } else {
                    $success[$mon] = false;
                }
            }
        }

        curl_close($ch);
        return view('welcome', ['success' => $success]);
    }

    function postAlert($ch, $data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: '.strlen($data)
        ));

        $result = curl_exec($ch);
        if(strstr($result, 'renotify_interval')) {
            return true;
        } else {
            return false;
        }
    }

    function hostIsntReporting() {
        $data = array(
            'name'      => '{{host.name}} isn\'t reporting',
            'type'      => 'service check',
            'query'     => '"datadog.agent.up".over("*").by("host").last(2).count_by_status()',
            'message'   => '{{#is_alert}}{{host.name}} isn\'t reporting{{/is_alert}} \n{{#is_recovery}}{{host.name}} is reporting{{/is_recovery}}',
            'tags'      => '',
            'options'   => array(
                'notify_audit'      => 'true',
                'locked'            => 'true',
                'timeout_h'         => '0',
                'silenced'          => '{}',
                'include_tags'      => 'true',
                'new_host_delay'    => '300',
                'notify_no_data'    => 'true',
                'renotify_interval' => '0',
                'no_data_timeframe' => '2',
                'thresholds'        => array(
                    'critical'          => '1',
                    'warning'           => '1',
                    'ok'                => '1'
                )
            )
        );
        return json_encode($data);
    }

    function cpuUsage() {
        return '{
            "name": "High CPU usage on {{host.name}} ",
            "type": "metric alert",
            "query": "avg(last_5m):100 - avg:system.cpu.idle{*} by {host} > 90",
            "message": "{{#is_alert}}High CPU usage on {{host.name}} {{/is_alert}} \n{{#is_recovery}}High CPU recovered on {{host.name}} {{/is_recovery}} ",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "include_tags": true,
                "no_data_timeframe": null,
                "thresholds": {
                    "critical": 90,
                    "warning": 80,
                    "critical_recovery": 85,
                    "warning_recovery": 75
                }
            }
        }';
    }

    function cpuLoad() {
        return '{
            "name": "CPU load is high on {{host.name}} ",
            "type": "metric alert",
            "query": "avg(last_5m):avg:system.load.5{*} by {host} > 10",
            "message": "{{#is_alert}}CPU load is high on {{host.name}}{{/is_alert}} \n{{#is_recovery}}CPU load is high on {{host.name}}{{/is_recovery}} ",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "no_data_timeframe": null,
                "include_tags": true,
                "thresholds": {
                    "critical": 10,
                    "warning": 8,
                    "critical_recovery": 9,
                    "warning_recovery": 7
                }
            }
        }';
    }

    function lowDiskSpace() {
        return '{
            "name": "Low disk space on disk {{device.name}} on {{host.name}}",
            "type": "query alert",
            "query": "avg(last_5m):avg:system.disk.free{!device:devtmpfs,!device:tmpfs} by {device} < 2000000000",
            "message": "{{#is_alert}}Low disk space on disk {{device.name}} on {{host.name}}{{/is_alert}}\n{{#is_recovery}}Low disk space recovered on disk {{device.name}} on {{host.name}}{{/is_recovery}}",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "no_data_timeframe": null,
                "include_tags": true,
                "thresholds": {
                    "critical": 2000000000,
                    "warning": 20000000000,
                    "critical_recovery": 5000000000,
                    "warning_recovery": 25000000000
                }
            }
        }';
    }

    function netTraffic() {
        return '{
            "name": "High network traffic on {{host.name}} ",
            "type": "metric alert",
            "query": "avg(last_5m):avg:docker.net.bytes_rcvd{*} by {host} > 40000000",
            "message": "{{#is_alert}}High network traffic on {{host.name}}{{/is_alert}} \n{{#is_recovery}}High network traffic on {{host.name}}{{/is_recovery}}",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "no_data_timeframe": null,
                "include_tags": true,
                "thresholds": {
                    "critical": 40000000,
                    "warning": 10000000,
                    "critical_recovery": 35000000,
                    "warning_recovery": 9000000
                }
            }
        }';
    }

    function mysqlHighQPS() {
        return '{
            "name": "High number of MySQL queries on {{host.name}} ",
            "type": "metric alert",
            "query": "avg(last_5m):avg:mysql.performance.queries{*} by {host} > 40000",
            "message": "{{#is_alert}}High number of MySQL queries on {{host.name}} {{/is_alert}} \n{{#is_recovery}} High number of MySQL queries recovered on {{host.name}} {{/is_recovery}} ",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "include_tags": true,
                "no_data_timeframe": null,
                "thresholds": {
                    "critical": 40000,
                    "warning": 25000,
                    "critical_recovery": 35000,
                    "warning_recovery": 20000
                }
            }
        }';
    }

    function mysqlSlowQueries() {
        return '{
            "name": "High number of MySQL slow queries on {{host.name}} ",
            "type": "metric alert",
            "query": "avg(last_5m):avg:mysql.performance.slow_queries{*} by {host} > 20",
            "message": "{{#is_alert}}High number of MySQL slow queries on {{host.name}} {{/is_alert}} \n{{#is_recovery}}High number of MySQL slow queries recovered on {{host.name}} {{/is_recovery}} ",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "include_tags": true,
                "no_data_timeframe": null,
                "thresholds": {
                    "critical": 20,
                    "warning": 10,
                    "critical_recovery": 15,
                    "warning_recovery": 5
                }
            }
        }';
    }

    function mysqlHighAbortedClients() {
        return '{
            "name": "High MySQL aborted clients on {{host.name}} ",
            "type": "metric alert",
            "query": "avg(last_5m):avg:mysql.net.aborted_clients{*} by {host} > 50",
            "message": "{{#is_alert}}High MySQL aborted clients on {{host.name}} {{/is_alert}} \n{{#is_recovery}}High MySQL aborted clients on {{host.name}} {{/is_recovery}} ",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": false,
                "renotify_interval": "0",
                "escalation_message": "",
                "include_tags": true,
                "no_data_timeframe": null,
                "thresholds": {
                    "critical": 50,
                    "warning": 20,
                    "critical_recovery": 40,
                    "warning_recovery": 15
                }
            }
        }';
    }

    function mysqlSlaveLag() {
        return '{
            "name": "MYSQL Slave is behind master on {{host.name}}",
            "type": "metric alert",
            "query": "avg(last_1m):avg:mysql.replication.seconds_behind_master{*} by {host} > 5",
            "message": "{{#is_alert}} MYSQL Slave is behind master on {{host.name}}{{/is_alert}}\n{{#is_recovery}} MYSQL Slave behind master recovered on {{host.name}}{{/is_recovery}}",
            "tags": [],
            "options": {
                "notify_audit": true,
                "locked": true,
                "timeout_h": 0,
                "new_host_delay": 300,
                "require_full_window": true,
                "notify_no_data": true,
                "renotify_interval": "0",
                "escalation_message": "",
                "no_data_timeframe": 2,
                "include_tags": true,
                "thresholds": {
                    "critical": 5,
                    "warning": 2,
                    "critical_recovery": 3,
                    "warning_recovery": 1
                }
            }
        }';
    }
}
