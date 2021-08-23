var mqtt;
var reconnectTimeout = 2000;
var host = "103.31.39.42"; //change this
var port = 9001;

function onFailure(message) {
    console.log("Connection Attempt to Host " + host + " Failed");
    setTimeout(MQTTconnect, reconnectTimeout);
}
function onMessageArrived(msg) {
    // document.getElementById("changeText").innerHTML = "<h1>"+msg.payloadString+"</h1>";
    console.log(msg);

    out_msg = "Message received " + msg.payloadString + "<br>";
    if (msg.destinationName == "/event/pintu") {
        var pesan = "" + msg.payloadString;
        var data = JSON.parse(pesan);
        if (data.SP1 == "0") {
            document.getElementById("SP1").innerHTML = "terbuka";
        } else {
            document.getElementById("SP1").innerHTML = "tertutup";
        }

        if (data.SP2 == "0") {
            document.getElementById("SP2").innerHTML = "terbuka";
        } else {
            document.getElementById("SP2").innerHTML = "tertutup";
        }

        if (data.MAG == "0") {
            document.getElementById("MAG").innerHTML = "tidak terkunci";
        } else {
            document.getElementById("MAG").innerHTML = "terkunci";
        }
    }
    if (msg.destinationName == "/event/beban") {
        var pesan = "" + msg.payloadString;
        var data = JSON.parse(pesan);
        // console.log(data);
        if (data.PROX == "0") {
            document.getElementById("PROX").innerHTML = "tidak aman";
        } else {
            document.getElementById("PROX").innerHTML = "aman";
        }
        document.getElementById("LC").innerHTML = data.LC;
    }
    if (msg.destinationName == "/event/base") {
        var pesan = "" + msg.payloadString;
        var data = JSON.parse(pesan);
        // console.log(data);
        if (data.PB == "0") {
            document.getElementById("PB").innerHTML = "bahaya";
        } else {
            document.getElementById("PB").innerHTML = "aman";
        }
        if (data.RS == "0") {
            document.getElementById("RS").innerHTML = "mati";
        } else {
            document.getElementById("RS").innerHTML = "nyala";
        }
        if (data.DRI == "0") {
            document.getElementById("DRI").innerHTML = "stabil";
        } else {
            document.getElementById("DRI").innerHTML = "tidak stabil";
        }
        if (data.DRO == "0") {
            document.getElementById("DRO").innerHTML = "tidak mengantuk";
        } else {
            document.getElementById("DRO").innerHTML = "mengantuk";
        }
        document.getElementById("LAT").innerHTML = data.LAT;
        document.getElementById("LON").innerHTML = data.LON;
        changeMarker(parseFloat(data.LAT), parseFloat(data.LON));
    }

    //  TAMBAHAN MULAI DISINI

    if (msg.destinationName == "/event/rfid") {
        var pesan = "" + msg.payloadString;
        var data = JSON.parse(pesan);
        if (data.id == "b1") {
            if (data.dt == "0") {
                document.getElementById("rfid1").innerHTML = "undetected";
            } else {
                document.getElementById("rfid1").innerHTML = "detected";
            }

            if (data.status == "0") {
                document.getElementById("status1").innerHTML = "keluar";
            } else {
                document.getElementById("status1").innerHTML = "masuk";
            }
        }

        if (data.id == "b2") {
            if (data.dt == "0") {
                document.getElementById("rfid2").innerHTML = "undetected";
            } else {
                document.getElementById("rfid2").innerHTML = "detected";
            }

            if (data.status == "0") {
                document.getElementById("status2").innerHTML = "keluar";
            } else {
                document.getElementById("status2").innerHTML = "masuk";
            }
        }

        if (data.id == "b3") {
            if (data.dt == "0") {
                document.getElementById("rfid3").innerHTML = "undetected";
            } else {
                document.getElementById("rfid3").innerHTML = "detected";
            }

            if (data.status == "0") {
                document.getElementById("status3").innerHTML = "keluar";
            } else {
                document.getElementById("status3").innerHTML = "masuk";
            }
        }

        if (data.id == "b4") {
            if (data.dt == "0") {
                document.getElementById("rfid4").innerHTML = "undetected";
            } else {
                document.getElementById("rfid4").innerHTML = "detected";
            }

            if (data.status == "0") {
                document.getElementById("status4").innerHTML = "keluar";
            } else {
                document.getElementById("status4").innerHTML = "masuk";
            }
        }
    }
    // TAMBAHAN BERAKHIR DISINI
}

function onConnect() {
    console.log("Connected ");
    mqtt.subscribe("/event/#");
    //TAMBAHAN MULAI DISINI
    var kiriminit = new Paho.MQTT.Message("cek");
    kiriminit.destinationName = "/init/data";
    mqtt.send(kiriminit);
    //TAMBAHAN BERAKHIR DISINI
}

function MQTTconnect() {
    console.log("connecting to " + host + " " + port);
    var x = Math.floor(Math.random() * 10000);
    var cname = "orderform-" + x;
    mqtt = new Paho.MQTT.Client(host, port, cname);
    var options = {
        timeout: 3,
        onSuccess: onConnect,
        onFailure: onFailure,
    };
    mqtt.onMessageArrived = onMessageArrived;

    mqtt.connect(options);
}

function lockPintu() {
    var pesankirimlock = new Paho.MQTT.Message("p1");
    pesankirimlock.destinationName = "/control/mag";
    mqtt.send(pesankirimlock);
}

function unlockPintu() {
    var pesankirimunlock = new Paho.MQTT.Message("p0");
    pesankirimunlock.destinationName = "/control/mag";
    mqtt.send(pesankirimunlock);
}

function engineOnpub() {
    var pesanengineOn = new Paho.MQTT.Message("b0");
    pesanengineOn.destinationName = "/control/eng";
    mqtt.send(pesanengineOn);
}

function engineOffpub() {
    var pesanengineOff = new Paho.MQTT.Message("b1");
    pesanengineOff.destinationName = "/control/eng";
    mqtt.send(pesanengineOff);
}
