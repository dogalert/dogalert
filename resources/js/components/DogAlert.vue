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
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="lowDiskSpace" id="lowDiskSpace" v-model="lowDiskSpaceChecked">
            <label class="form-check-label" for="lowDiskSpace">
                Low disk space per device
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMonitors[]" value="netTraffic" id="netTraffic" v-model="netTrafficChecked">
            <label class="form-check-label" for="netTraffic">
                High network traffic per host
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="basicMysql" id="basicMysql" v-model="basicMysqlSetChecked" @click="basicMysqlSetToggle">
            <label class="form-check-label" for="basicMysql">
                Basic MySQL set
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicMysqlMonitors[]" value="mysqlHighQPS" id="mysqlHighQPS" v-model="mysqlHighQPSChecked">
            <label class="form-check-label" for="mysqlHighQPS">
                MySQL high number of queries per second per host
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
            <input class="form-check-input" type="checkbox" name="basicNginxMonitors[]" value="nginxHighRequests" id="nginxHighRequests" v-model="nginxHighRequestsChecked">
            <label class="form-check-label" for="nginxHighRequests">
                Nginx high requests per second
            </label>
        </div>

        <div class="form-check ml-3">
            <input class="form-check-input" type="checkbox" name="basicNginxMonitors[]" value="nginxHighErrors" id="nginxHighErrors" v-model="nginxHighErrorsChecked">
            <label class="form-check-label" for="nginxHighErrors">
                Nginx high errors per second
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
                lowDiskSpaceChecked: true,
                netTrafficChecked: true,
                basicMysqlSetChecked: true,
                mysqlHighQPSChecked: true,
                mysqlSlowQueriesChecked: true,
                mysqlHighAbortedClientsChecked: true,
                mysqlSlaveLagChecked: true,
                basicNginxSetChecked: true,
                nginxHighRequestsChecked: true,
                nginxHighErrorsChecked: true
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
                    this.lowDiskSpaceChecked=true
                    this.netTrafficChecked=true
                } else if(this.basicSetChecked == true) {
                    this.basicSetChecked=false
                    this.hostIsntReportingChecked=false
                    this.cpuUsageChecked=false
                    this.cpuLoadChecked=false
                    this.lowDiskSpaceChecked=false
                    this.netTrafficChecked=false
                }
            },
            basicMysqlSetToggle(e) {
                if(this.basicMysqlSetChecked == false) {
                    this.basicMysqlSetChecked=true
                    this.mysqlHighQPSChecked=true
                    this.mysqlSlowQueriesChecked=true
                    this.mysqlHighAbortedClientsChecked=true
                    this.mysqlSlaveLagChecked=true
                } else if(this.basicMysqlSetChecked == true) {
                    this.basicMysqlSetChecked=false
                    this.mysqlHighQPSChecked=false
                    this.mysqlSlowQueriesChecked=false
                    this.mysqlHighAbortedClientsChecked=false
                    this.mysqlSlaveLagChecked=false
                }
            },
            basicNginxSetToggle(e) {
                if(this.basicNginxSetChecked == false) {
                    this.basicNginxSetChecked=true
                    this.nginxHighRequestsChecked=true
                    this.nginxHighErrorsChecked=true
                } else if(this.basicNginxSetChecked == true) {
                    this.basicNginxSetChecked=false
                    this.nginxHighRequestsChecked=false
                    this.nginxHighErrorsChecked=false
                }
            },
            checkBasic(e) {
                if(this.hostIsntReportingChecked == false || 
                    this.cpuUsageChecked == false ||
                    this.cpuLoadChecked == false ||
                    this.lowDiskSpaceChecked == false ||
                    this.netTrafficChecked == false) {
                        this.basicSetChecked=false
                }
                if(this.hostIsntReportingChecked == true &&
                    this.cpuUsageChecked == true &&
                    this.cpuLoadChecked == true &&
                    this.lowDiskSpaceChecked == true &&
                    this.netTrafficChecked == true) {
                        this.basicSetChecked=true
                }
            },
            checkBasicMysql(e) {
                if(this.mysqlHighQPSChecked == false || 
                    this.mysqlSlowQueriesChecked == false ||
                    this.mysqlHighAbortedClientsChecked == false ||
                    this.mysqlSlaveLagChecked == false) {
                        this.basicMysqlSetChecked=false
                }
                if(this.mysqlHighQPSChecked == true && 
                    this.mysqlSlowQueriesChecked == true && 
                    this.mysqlHighAbortedClientsChecked == true &&
                    this.mysqlSlaveLagChecked == true) {
                        this.basicMysqlSetChecked=true
                }
            },
            checkBasicNginx(e) {
                if(this.nginxHighRequestsChecked == false || 
                    this.nginxHighErrorsChecked== false) {
                        this.basicNginxSetChecked=false
                }
                if(this.nginxHighRequestsChecked == true && 
                    this.nginxHighErrorsChecked == true) {
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
            lowDiskSpaceChecked: function(val) {
                this.checkBasic()
            },
            netTrafficChecked: function(val) {
                this.checkBasic()
            },
            mysqlHighQPSChecked: function(val) {
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
            nginxHighRequestsChecked: function(val) {
                this.checkBasicNginx()
            },
            nginxHighErrorsChecked: function(val) {
                this.checkBasicNginx()
            }
        }
    }
</script>
