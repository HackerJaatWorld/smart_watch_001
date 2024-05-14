
setInterval(()=>{
    if ('getBattery' in navigator) {
        navigator.getBattery().then(function (battery) {
            // Function to update battery level and start/stop animation
            function updateBatteryInfo() {
                var batteryLevel = document.getElementById('batteryLevel');
                var percentage = battery.level * 100;
                batteryLevel.style.width = percentage + '%';
                if(percentage <= 50){
                    batteryLevel.style.background = 'rgb(254, 133, 133)';
                }else if(percentage < 20){
                    batteryLevel.style.background = 'red';
                }else if(percentage == 100){
                    batteryLevel.style.background = 'yellow';
                }
                document.getElementById("status_battery_per").textContent = percentage.toFixed(0) + '%';
                if (battery.charging) {
                    if(percentage == 100){
                        batteryLevel.classList.remove('charging-animation');
                    }else{
                        batteryLevel.classList.add('charging-animation');
                    }
                } else {
                        batteryLevel.classList.remove('charging-animation');
                }
            }
    
    
            // Update battery level initially
            updateBatteryInfo();
    
            // Update battery info whenever it changes
            battery.addEventListener('levelchange', updateBatteryInfo);
            battery.addEventListener('chargingchange', updateBatteryInfo);
            battery.addEventListener('dischargingtimechange', updateBatteryInfo);
        });
    } else {
        console.log('Battery Status API is not supported');
    }
},100);
