<template>
    <div class="container">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="basic" id="basic" v-model="basicSetChecked" @click="basicSetToggle">
            <label class="form-check-label" for="basic">
                Basic Dogalert set
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="hostIsntReporting" id="hostIsntReporting" v-model="hostIsntReportingChecked">
            <label class="form-check-label" for="hostIsntReporting">
                Host isn't reporting
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="cpuUsage" id="cpuUsage" v-model="cpuUsageChecked">
            <label class="form-check-label" for="cpuUsage">
                CPU usage per host
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="cpuLoad" id="cpuLoad" v-model="cpuLoadChecked">
            <label class="form-check-label" for="cpuLoad">
                CPU load per host
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="cpuIOWait" id="cpuIOWait" v-model="cpuIOWaitChecked">
            <label class="form-check-label" for="cpuIOWait">
                CPU IO wait per host
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="lowDiskSpace" id="lowDiskSpace" v-model="lowDiskSpaceChecked">
            <label class="form-check-label" for="lowDiskSpace">
                Low available space per disk
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="highDiskReads" id="highDiskReads" v-model="highDiskReadsChecked">
            <label class="form-check-label" for="highDiskReads">
                High read percentage per disk
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="highDiskWrites" id="highDiskWrites" v-model="highDiskWritesChecked">
            <label class="form-check-label" for="highDiskWrites">
                High write percentage per disk
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="netInboundTraffic" id="netInboundTraffic" v-model="netInboundTrafficChecked">
            <label class="form-check-label" for="netInboundTraffic">
                High inbound network traffic per host
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="netOutboundTraffic" id="netOutboundTraffic" v-model="netOutboundTrafficChecked">
            <label class="form-check-label" for="netOutboundTraffic">
                High outbound network traffic per host
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="basicMysql" id="basicMysql" v-model="basicMysqlSetChecked" @click="basicMysqlSetToggle">
            <label class="form-check-label" for="basicMysql">
                Basic MySQL set
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlQPSChange" id="mysqlQPSChange" v-model="mysqlQPSChangeChecked">
            <label class="form-check-label" for="mysqlQPSChange">
                MySQL number of queries changed per host
            </label>
        </div>
        
        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlSelectChange" id="mysqlSelectChange" v-model="mysqlSelectChangeChecked">
            <label class="form-check-label" for="mysqlSelectChange">
                MySQL number of selects changed per host
            </label>
        </div>
        
        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlInsertChange" id="mysqlInsertChange" v-model="mysqlInsertChangeChecked">
            <label class="form-check-label" for="mysqlInsertChange">
                MySQL number of inserts changed per host
            </label>
        </div>
        
        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlUpdateChange" id="mysqlUpdateChange" v-model="mysqlUpdateChangeChecked">
            <label class="form-check-label" for="mysqlUpdateChange">
                MySQL number of updates changed per host
            </label>
        </div>
        
        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlDeleteChange" id="mysqlDeleteChange" v-model="mysqlDeleteChangeChecked">
            <label class="form-check-label" for="mysqlDeleteChange">
                MySQL number of deletes changed per host
            </label>
        </div>
        
        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlSlowQueries" id="mysqlSlowQueries" v-model="mysqlSlowQueriesChecked">
            <label class="form-check-label" for="mysqlSlowQueries">
                MySQL high number of slow queries per host
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlHighAbortedClients" id="mysqlHighAbortedClients" v-model="mysqlHighAbortedClientsChecked">
            <label class="form-check-label" for="mysqlHighAbortedClients">
                MySQL high aborted clients per host
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlSlaveLag" id="mysqlSlaveLag" v-model="mysqlSlaveLagChecked">
            <label class="form-check-label" for="mysqlSlaveLag">
                MySQL high slave lag per host
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="basicNginx" id="basicNginx" v-model="basicNginxSetChecked" @click="basicNginxSetToggle">
            <label class="form-check-label" for="basicNginx">
                Basic Nginx set
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicNginxMonitors[]" value="nginxRequestsPerSecondChanged" id="nginxRequestsPerSecondChanged" v-model="nginxRequestsPerSecondChangedChecked">
            <label class="form-check-label" for="nginxRequestsPerSecondChanged">
                Nginx requests per second changed
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicNginxMonitors[]" value="nginxDroppedConnections" id="nginxDroppedConnections" v-model="nginxDroppedConnectionsChecked">
            <label class="form-check-label" for="nginxDroppedConnections">
                Nginx dropped connections per second
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                basicSetChecked: true,
                hostIsntReportingChecked: true,
                cpuUsageChecked: true,
                cpuLoadChecked: true,
                cpuIOWaitChecked: true,
                lowDiskSpaceChecked: true,
                highDiskReadsChecked: true,
                highDiskWritesChecked: true,
                netInboundTrafficChecked: true,
                netOutboundTrafficChecked: true,
                basicMysqlSetChecked: true,
                mysqlQPSChangeChecked: true,
                mysqlSelectChangeChecked: true,
                mysqlInsertChangeChecked: true,
                mysqlUpdateChangeChecked: true,
                mysqlDeleteChangeChecked: true,
                mysqlSlowQueriesChecked: true,
                mysqlHighAbortedClientsChecked: true,
                mysqlSlaveLagChecked: true,
                basicNginxSetChecked: true,
                nginxRequestsPerSecondChangedChecked: true,
                nginxDroppedConnectionsChecked: true
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            basicSetToggle(e) {
                if(this.basicSetChecked == false) {
                    this.basicSetChecked=true
                    this.hostIsntReportingChecked=true
                    this.cpuUsageChecked=true
                    this.cpuLoadChecked=true
                    this.cpuIOWaitChecked=true
                    this.lowDiskSpaceChecked=true
                    this.highDiskReadsChecked=true
                    this.highDiskWritesChecked=true
                    this.netInboundTrafficChecked=true
                    this.netOutboundTrafficChecked=true
                } else if(this.basicSetChecked == true) {
                    this.basicSetChecked=false
                    this.hostIsntReportingChecked=false
                    this.cpuUsageChecked=false
                    this.cpuLoadChecked=false
                    this.cpuIOWaitChecked=false
                    this.lowDiskSpaceChecked=false
                    this.highDiskReadsChecked=false
                    this.highDiskWritesChecked=false
                    this.netInboundTrafficChecked=false
                    this.netOutboundTrafficChecked=false
                }
            },
            basicMysqlSetToggle(e) {
                if(this.basicMysqlSetChecked == false) {
                    this.basicMysqlSetChecked=true
                    this.mysqlQPSChangeChecked=true
                    this.mysqlSelectChangeChecked=true
                    this.mysqlInsertChangeChecked=true
                    this.mysqlUpdateChangeChecked=true
                    this.mysqlDeleteChangeChecked=true
                    this.mysqlSlowQueriesChecked=true
                    this.mysqlHighAbortedClientsChecked=true
                    this.mysqlSlaveLagChecked=true
                } else if(this.basicMysqlSetChecked == true) {
                    this.basicMysqlSetChecked=false
                    this.mysqlQPSChangeChecked=false
                    this.mysqlSelectChangeChecked=false
                    this.mysqlInsertChangeChecked=false
                    this.mysqlUpdateChangeChecked=false
                    this.mysqlDeleteChangeChecked=false
                    this.mysqlSlowQueriesChecked=false
                    this.mysqlHighAbortedClientsChecked=false
                    this.mysqlSlaveLagChecked=false
                }
            },
            basicNginxSetToggle(e) {
                if(this.basicNginxSetChecked == false) {
                    this.basicNginxSetChecked=true
                    this.nginxRequestsPerSecondChangedChecked=true
                    this.nginxDroppedConnectionsChecked=true
                } else if(this.basicNginxSetChecked == true) {
                    this.basicNginxSetChecked=false
                    this.nginxRequestsPerSecondChangedChecked=false
                    this.nginxDroppedConnectionsChecked=false
                }
            },
            checkBasic(e) {
                if(this.hostIsntReportingChecked == false || 
                    this.cpuUsageChecked == false ||
                    this.cpuLoadChecked == false ||
                    this.cpuIOWaitChecked == false ||
                    this.lowDiskSpaceChecked == false ||
                    this.highDiskReadsChecked == false ||
                    this.highDiskWritesChecked == false ||
                    this.netInboundTrafficChecked == false ||
                    this.netOutboundTrafficChecked == false) {
                        this.basicSetChecked=false
                }
                if(this.hostIsntReportingChecked == true &&
                    this.cpuUsageChecked == true &&
                    this.cpuLoadChecked == true &&
                    this.cpuIOWaitChecked == true &&
                    this.lowDiskSpaceChecked == true &&
                    this.highDiskReadsChecked == true &&
                    this.highDiskWritesChecked == true &&
                    this.netInboundTrafficChecked == true &&
                    this.netOutboundTrafficChecked == true) {
                        this.basicSetChecked=true
                }
            },
            checkBasicMysql(e) {
                if(this.mysqlQPSChangeChecked == false || 
                    this.mysqlSelectChangeChecked == false ||
                    this.mysqlInsertChangeChecked == false ||
                    this.mysqlUpdateChangeChecked == false ||
                    this.mysqlDeleteChangeChecked == false ||
                    this.mysqlSlowQueriesChecked == false ||
                    this.mysqlHighAbortedClientsChecked == false ||
                    this.mysqlSlaveLagChecked == false) {
                        this.basicMysqlSetChecked=false
                }
                if(this.mysqlQPSChangeChecked == true && 
                    this.mysqlSelectChangeChecked == true && 
                    this.mysqlInsertChangeChecked == true && 
                    this.mysqlUpdateChangeChecked == true && 
                    this.mysqlDeleteChangeChecked == true && 
                    this.mysqlSlowQueriesChecked == true && 
                    this.mysqlHighAbortedClientsChecked == true &&
                    this.mysqlSlaveLagChecked == true) {
                        this.basicMysqlSetChecked=true
                }
            },
            checkBasicNginx(e) {
                if(this.nginxRequestsPerSecondChangedChecked == false || 
                    this.nginxDroppedConnectionsChecked== false) {
                        this.basicNginxSetChecked=false
                }
                if(this.nginxRequestsPerSecondChangedChecked == true && 
                    this.nginxDroppedConnectionsChecked == true) {
                        this.basicNginxSetChecked=true
                }
            }
        },

        watch: {
            hostIsntReportingChecked: function(val) {
                this.checkBasic()
            },
            cpuUsageChecked: function(val) {
                this.checkBasic()
            },
            cpuLoadChecked: function(val) {
                this.checkBasic()
            },
            cpuIOWaitChecked: function(val) {
                this.checkBasic()
            },
            lowDiskSpaceChecked: function(val) {
                this.checkBasic()
            },
            highDiskReadsChecked: function(val) {
                this.checkBasic()
            },
            highDiskWritesChecked: function(val) {
                this.checkBasic()
            },
            netInboundTrafficChecked: function(val) {
                this.checkBasic()
            },
            netOutboundTrafficChecked: function(val) {
                this.checkBasic()
            },
            mysqlQPSChangeChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlSelectChangeChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlInsertChangeChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlUpdateChangeChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlDeleteChangeChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlSlowQueriesChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlHighAbortedClientsChecked: function(val) {
                this.checkBasicMysql()
            },
            mysqlSlaveLagChecked: function(val) {
                this.checkBasicMysql()
            },
            nginxRequestsPerSecondChangedChecked: function(val) {
                this.checkBasicNginx()
            },
            nginxDroppedConnectionsChecked: function(val) {
                this.checkBasicNginx()
            }
        }
    }
</script>
