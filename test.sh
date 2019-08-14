#!/bin/bash

api_key=3fcc952796a04f6437153765cd5751fc
app_key=ea95ab0c381e86c53f8e8e7d529e578ec78bfba3

curl -X POST -H "Content-type: application/json" \
-d '{
      "type": "metric alert",
      "query": "avg(last_5m):sum:system.net.bytes_rcvd{host:host0} > 100",
      "name": "Bytes received on host0",
      "message": "We may need to add web hosts if this is consistently high.",
      "tags": ["app:webserver", "frontend"],
      "options": {
      	"notify_no_data": true,
      	"no_data_timeframe": 20
      }
}' \
    "https://api.datadoghq.com/api/v1/monitor?api_key=${api_key}&application_key=${app_key}"

