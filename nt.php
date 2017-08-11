<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Note template created by Charles Yost / Joseph Moran --
    -- Contributors:
    -- Jesse N. Richardson 
    -- Thomas Edwards   
    -- Brett Bryant
    -->
    <head>
        <link rel="icon" type="image/png" href="favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title>Note Template</title>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

            body {
                background: white;
                font-family: 'roboto', 'sans-serif';
            }
            #content {
                max-width: 678px;
                margin: 20px auto;
            }
            #panel {
                background-color: #EEE;
                padding: 10px;
                box-shadow: 1px 1px 2px rgba(0, 0, 0, .25);
                position:relative;
            }
            #pickerButton {
                position:absolute;
                right:0;
                top:0;
                margin-top:26px;
                margin-right:26px;
                padding:10px;
            }
            #pickerButton:hover {
                background:#606060;
                fill: #eeeeee;
                cursor:pointer;
            }
            #pickerButton.active {
                background:linear-gradient(to right, #dbdbdb 5%, #606060);
                fill: #eeeeee;
                cursor:pointer;
            }
            #colourSelector {
                margin-right:26px;
                margin-top:26px;
                padding:5px;
                background:#dbdbdb;
                display:none;
                position:absolute;
                right:40px;
                top:0;
                overflow:hidden;
            }
            #colourSelector.active {
                display:flex;
            }
            #colourSelector .swatch {
                width:32px;
                height:32px;
                background-color:#111;
                display:inline-block;
            }
            input:not(.checkbox), select{
            width: 100%;
            padding: 5px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
            hr {
            margin: 20px 0;
            display: block;
        }
        ::-webkit-input-placeholder { /* Chrome */
            color: #e3dfe1;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #e3dfe1;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #e3dfe1;
            opacity: 1;
        }

        label, button, textarea {
            display: block;
        }

            #hue {
                margin-left:5px;
                width: 30px;
                height: 180px;
                position:relative;
                background: -moz-linear-gradient(bottom, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
                background: -ms-linear-gradient(bottom, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
                background: -o-linear-gradient(bottom, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
                background: -webkit-gradient(linear, bottom, top, from(#ff0000), color-stop(0.17, #ffff00), color-stop(0.33, #00ff00), color-stop(0.5, #00ffff), color-stop(0.67, #0000ff), color-stop(0.83, #ff00ff), to(#ff0000));
                background: -webkit-linear-gradient(bottom, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
                background: linear-gradient(to top, #ff0000 0%, #ffff00 17%, #00ff00 33%, #00ffff 50%, #0000ff 67%, #ff00ff 83%, #ff0000 100%);
            }
            #brightness {
                background: #f06;
                background: radial-gradient(circle at top right, red 20%, transparent 80%);
                min-height: 100%;
                width:256px;
                height:256px;  
                position:relative;
                z-index:1;
                width:180px;
                height: 180px;
            }
            #brightness:before, #brightness:after {
                content:'';
                position:absolute;
                width:100%;
                height:100%;
                opacity: 0.8;
            }
            #brightness:after {
                background: linear-gradient(transparent 5%, black 90%);
                z-index:3;
                bottom:0;
                right:0;
            }
            #brightness .picker {
                position:absolute;
                left: 88.2px;
                top: 43.2px;
                width:6px;
                height:6px;
                border:solid 1px white;
                background:rgba(0,0,0,0.5);
                border-radius:100%;
                z-index:4;
                transform: translate(-3px, -3px);
                pointer-events: none;
            }

            #hue .picker {
                height:4px;
                width:100%;
                border:solid 1px white;
                background:rgba(0,0,0,0.5);
                position:absolute;
                top:75.49px;
                transform: translate(-1px, -3px);
                pointer-events: none;
            }

            #ie-1 {
                height:17%;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0000', endColorstr='#ffff00');
            }
            #ie-2 {
                height:16%;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffff00', endColorstr='#00ff00');
            }
            #ie-3 {
                height:17%;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ff00', endColorstr='#00ffff');
            }
            #ie-4 {
                height:17%;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffff', endColorstr='#0000ff');
            }
            #ie-5 {
                height:16%;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0000ff', endColorstr='#ff00ff');
            }
            #ie-6 {
                height:17%;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff00ff', endColorstr='#ff0000');
            }


            h1 {
                color: #333;
                font-size: 1.6em;
                text-align: center;
            }
            hr {
                margin: 20px 0;
                display: block;
                border-color: silver;
                border-width:1px;
            }
            ::-webkit-input-placeholder { /* Chrome */
                color: #e3dfe1;
            }
            :-ms-input-placeholder { /* IE 10+ */
                color: #e3dfe1;
            }
            ::-moz-placeholder { /* Firefox 19+ */
                color: #e3dfe1;
                opacity: 1;
            }

            label, button, textarea {
                display: block;
            }

            input:not(.checkbox), select{
                width: 100%;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border:none;
                outline:none;
                font-family:inherit;
            }
            textarea{
                width: 100%;
                padding: 5px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border: none;
                resize: none;
                padding: 10px;
                outline:none;
                font-family:inherit;
            }

            #copy-button, #reset-button{
                width: 48%;
                border:none;
                box-sizing: border-box;
                display: inline-block;
                cursor:pointer;
                color:#ffffff;
                margin: 10px 0;
                font-size:18px;
                padding:10px 10px;
                text-decoration:none;
            }

            .main-nav > span{
                width: 15%;
                box-sizing: border-box;
                display: inline-block;
                cursor:pointer;
                color:#ffffff;
                margin: 10px 0;
                font-size:18px;
                padding:3px 10px;
                text-decoration:none;
                margin-left:5px;
                margin-right:5px;
            }

            #reset-button {
                float: right;
            }

            .clear {
                clear: both;
            }

            .hidden {
                display: none;
            }
            .alert.info {background-color: #2196F3;}
            .alert {
                padding: 10px;
                background-color: #f44336;
                color: white;
                opacity: 1;
                transition: opacity 0.6s;
                margin-bottom: 8px;
                display:flex;
            }
            .closebtn {
                margin-right: 5px;
                margin-left: 5px;
                color: white;
                font-weight: bold;
                float: left;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            .alert.success {background-color: #4CAF50;}
            .alert.info {background-color: #2196F3;}
            .alert.warning {background-color: #ff9800;}

            .closebtn:hover {
                color: black;
            }
            a {
                color:inherit;
                font-weight:100;
                text-decoration:none;
            }
            a.btn {
                color: whiteSmoke;
                padding-left:20px;
                padding-right:20px;
                padding-top:10px;
                padding-bottom:10px;
                display:inline-block;
            }
            @media only screen and (max-width: 414px) {
                body {
                    margin:0;
                }
                #content {
                    max-width:100vw;
                    margin:0;
                }
                #colourSelector {
                    position:relative;
                    margin:5px auto;
                    right:initial;
                    left:50%;
                    transform:translateX(-50%);
                }
            }
        </style>
    </head>
<body onbeforeunload="return confirm('Are you sure you want to close this ');" class="theme-background">
    <?php include_once("analyticstracking.php") ?>
    <div id="content">
        <div id="panel">
        <h1>Note Template</h1>
        <div id="pickerButton">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
            <title></title>
            <g id="icomoon-ignore">
            </g>
            <path d="M493.255 18.745c-24.994-24.993-65.516-24.993-90.51 0l-86.059 86.059-60.686-60.686-67.882 67.882 53.213 53.213-236.059 236.059c-4.024 4.024-5.734 9.479-5.15 14.728h-0.122v80c0 8.837 7.164 16 16 16h80c0 0 1.332 0 2 0 4.606 0 9.213-1.758 12.728-5.272l236.059-236.059 53.213 53.213 67.882-67.882-60.686-60.686 86.059-86.059c24.993-24.994 24.993-65.516 0-90.51zM86.545 480h-54.545v-54.545l234.787-234.786 54.544 54.544-234.786 234.787z"></path>
            </svg>
        </div>
        <div id="colourSelector">
            <div id="brightness">
                <div class="picker"></div>
            </div>
            <div id="hue">
                <div class="picker"></div>
            </div>
        </div>
    <div class="alert info">
        <div class="closebtn">&times;</div>
        <div>  
            <strong>Info:</strong> Welcome Team Marchon~! Please don't hesitate to provide feedback for any issues you encounter or things you'd like added!
        </div>
    </div>
<textarea name="stickynotes" placeholder="This is a memo section" id="stickynotes" cols="2" rows="2"></textarea>
<div class="form">

    <div align="center" class="main-nav clear">
        <span class="theme-background theme-background-light-hover" v-for="type in types" @click="setCurrentType(type)">{{ type.name | capitalize }}</span>
    </div>

    <hr>


    <label for="issue">Issue</label>
    <input type="text" placeholder="Reason For Calling (ex. No Internet, Email Issue, No Dial Tone)" name="issue" v-model="issue"/>

    <hr>

    <div v-if="current.name === 'FiOS'"> <!-- FIOS START -->
        <label for="btn">BTN</label>
        <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" />

        <label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" />

        <label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" type="text" name="account-holder" v-model="accountHolder" />

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <label for="email">Email</label>
        <input type="text" placeholder="Email (ex. loremipsum@mail.com)"  name="email" v-model="email" />

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">

        <hr>
        <label for="router">Broadband Home Router</label>
        <select name="router" v-model="router">
            <option v-for="option in routerOptions" :value="option">{{ option }}</option>
        </select>

        <label for="routerlights">Router Lights</label>
        <input type="text" placeholder="Router lights (ex. WAN Light Green, Wifi Off, Amber Internet)" name="routerlights" v-model="routerlights" />

        <label for="Set-Top-Box">Set Top-Box</label>
        <select name="setTopBox" v-model="setTopBox">
            <option v-for="option in setTopBoxOptions" :value="option">{{ option }}</option>
        </select>

        <label for="Phone-Type">Phone Type</label>
        <select name="phoneType" v-model="phoneType">
            <option v-for="option in phoneTypeOptions" :value="option">{{ option }}</option>
        </select>

        <label for="Optical-Network-Terminal">Optical Network Terminal</label>
        <select name="Optical-Network-Terminal" v-model="opticalNetworkTerminal">
            <option v-for="option in opticalNetworkTerminalOptions" :value="option">{{ option }}</option>
        </select>

        <label for="ontstatus">ONT Status</label>
        <select name="ontstatus" v-model="ontstatus">
            <option v-for="option in ontstatusOptions" :value="option">{{ option }}</option>
        </select>

        <label for="multi-dwelling-unit">Multi-Dwelling Unit</label>
        <select name="multi-dwelling-unit" v-model="multiDwellingUnit">
            <option v-for="option in multiDwellingUnitOptions" :value="option">{{ option }}</option>
        </select>

        <label for="static-ip">Static IP</label>
        <select name="static-ip" v-model="staticIp">
            <option v-for="option in staticIpOptions" :value="option">{{ option }}</option>
        </select>

        <hr>

        <label for="issue">Issue</label>
        <input type="text" placeholder="Reason For Calling (ex. No Internet, Email Issue)" name="issue" v-model="issue" />

        <label for="troubleshooting">Troubleshooting/Call Notes</label>
        <textarea placeholder="What steps did you take during the call?" name="troubleshooting" cols="30" rows="10" v-model="troubleshooting"></textarea>
        <hr>

        <label for="approved-by">Approved By</label>
        <input type="text" name="approved-by" placeholder="Who Approved Your Ticket (ex. L2 Charles)" v-model="approvedBy" />

        <label for="ticket">Ticket Information</label>
        <textarea placeholder="Ticket Number 003249143
Commit Time 22:00
Commit Date 4/17" type="text" name="ticket" v-model="ticket" cols="20" rows="3"></textarea>

        <hr>

        <label for="offered-f-secure">Offered F-Secure</label>
        <select name="offered-f-secure" v-model="offeredFSecure">
            <option v-for="option in offeredFSecureOptions" :value="option.value">{{ option.name }}</option>
        </select>

        <label for="has-Credit"></label>
        <div v-for="option in hasCreditOptions">
            <input type="radio" v-model="hasCredit" class="checkbox" :value="option"> {{ option }}
        </div>

        <label for="survey">Survey</label>
        <select name="survey" v-model="survey">
            <option v-for="option in surveyOptions" :value="option">{{ option }}</option>
        </select>

    </div>
    <div v-if="current.name === 'POTS'">

        <label for="btn">BTN</label>
        <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" />

        <label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" />

        <label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" type="text" name="account-holder" v-model="accountHolder" />

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <label for="email">Email</label>
        <input type="text" placeholder="Email (ex. loremipsum@mail.com)"  name="email" v-model="email" />

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">

        <hr>
        <label for="filters">Checked Filters</label>
        <select name="filters" v-model="filters">
            <option v-for="option in filtersOptions" :value="option">{{ option }}</option>
        </select>
        <hr>

        <label for="issue">Issue</label>
        <input type="text" placeholder="Reason For Calling (ex. No Dial Tone, Can't Call Out)" name="issue" v-model="issue"/>

        <label for="troubleshooting">Troubleshooting/Call Notes</label>
        <textarea placeholder="What steps did you take during the call?" name="troubleshooting" cols="30" rows="10" v-model="troubleshooting"></textarea>

        <hr>

        <label for="approved-by">Approved By</label>
        <input type="text" name="approved-by" placeholder="Who Approved Your Ticket (ex. L2 Charles)" v-model="approvedBy" />

        <label for="ticket">Ticket Information</label>
        <textarea type="text" placeholder="(Ticket Number 003249143
Commit Time 22:00
Commit Date 4/17)" name="ticket" v-model="ticket" cols="20" rows="3"></textarea>

        <hr>

        <label for="offered-f-secure">Offered F-Secure</label>
        <select name="offered-f-secure" v-model="offeredFSecure">
            <option v-for="option in offeredFSecureOptions" :value="option.value">{{ option.name }}</option>
        </select>

        <label for="has-Credit"></label>
        <div v-for="option in hasCreditOptions">
            <input type="radio" v-model="hasCredit" class="checkbox" :value="option"> {{ option }}
        </div>

        <label for="survey">Survey</label>
        <select name="survey" v-model="survey">
            <option v-for="option in surveyOptions" :value="option">{{ option }}</option>
        </select>
    </div>

    <div v-if="current.name === 'DSL'">

        <label for="btn">BTN</label>
        <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" />

        <label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" />

        <label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" type="text" name="account-holder" v-model="accountHolder" />

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <label for="email">Email</label>
        <input type="text" placeholder="Email (ex. loremipsum@mail.com)"  name="email" v-model="email" />

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">
        
        <hr>
        
        <label for="modem">Modem</label>
        <select name="modem" v-model="modem">
            <option v-for="option in modemOptions" :value="option">{{ option }}</option>
        </select>

        <label for="lights">Lights</label>
        <select name="lights" v-model="lights">
            <option v-for="option in lightOptions" :value="option">{{ option }}</option>
        </select>

        <label for="lights-after-pc">Lights After PC</label>
        <select name="lights-after-pc" v-model="lightsAfterPc">
            <option v-for="option in lightOptions" :value="option">{{ option }}</option>
        </select>

        <label for="dsllightso">Other Lights</label>
        <input type="text" placeholder="Other Lights (ex. Ethernet Light Off, Wifi Light Off" name="dsllightso" v-model="dsllightso" />

        <hr>
        <label for="area-of-high-demand">AOHD</label>
        <select name="area-of-high-demand" v-model="areaOfHighDemand">
            <option v-for="option in areaOfHighDemandOptions" :value="option">{{ option }}</option>
        </select>

        <label for="filters">Checked Filters</label>
        <select name="filters" v-model="filters">
            <option v-for="option in filtersOptions" :value="option">{{ option }}</option>
        </select>

        <label for="radius">Radius</label>
        <input placeholder="What credentials are they using? What are the cause of the drops? How many drops?" type="text" name="radius" v-model="radius">
		
		<label for="loopcare">Loopcare/ALU 5530</label>
        <textarea placeholder="VER 0U Recommendation
TEST OK - LINE IN USE
PORT ADMIN STATUS: IN SERVICE - NORMAL
OBSERVED NOISE MARGIN (DB):15 15
SIGNAL ATTENUATION (DB):29 14" name="loopcare" cols="20" rows="5" v-model="loopcare"></textarea>

        <hr >

        <label for="issue">Issue</label>
        <input type="text" placeholder="Reason For Calling (ex. No Internet, Email Issue)" name="issue" v-model="issue" />

        <label for="troubleshooting">Troubleshooting/Call Notes</label>
        <textarea placeholder="What steps did you take during the call" name="troubleshooting" cols="30" rows="10" v-model="troubleshooting"></textarea>

        <hr>

        <label for="approved-by">Approved By</label>
        <input type="text" name="approved-by" placeholder="Who Approved Your Ticket (ex. L2 Charles)" v-model="approvedBy" />

        <label for="ticket">Ticket Information</label>
        <textarea placeholder="Ticket Number 003249143
Commit Time 22:00
Commit Date 4/17" type="text" name="ticket" v-model="ticket" cols="20" rows="3"></textarea>

        <hr>

        <label for="offered-f-secure">Offered F-Secure</label>
        <select name="offered-f-secure" v-model="offeredFSecure">
            <option v-for="option in offeredFSecureOptions" :value="option.value">{{ option.name }}</option>
        </select>

        <label for="has-Credit"></label>
        <div v-for="option in hasCreditOptions">
            <input type="radio" v-model="hasCredit" class="checkbox" :value="option"> {{ option }}
        </div>

        <label for="survey">Survey</label>
        <select name="survey" v-model="survey">
            <option v-for="option in surveyOptions" :value="option">{{ option }}</option>
        </select>
    </div>

    <div v-if="current.name === 'PHAT'">

        <label for="btn">BTN</label>
        <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" />

        <label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" />

        <label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" type="text" name="account-holder" v-model="accountHolder" />

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <label for="email">Email</label>
        <input type="text" placeholder="Email (ex. loremipsum@mail.com)"  name="email" v-model="email" />

        <hr>
        <label for="crisid">Cris ID</label>
        <input type="text" placeholder="CRIS ID (ex. 978274 Abby)" name="crisid" v-model="crisid"/>

        <label for="issue">Issue</label>
        <input type="text" name="issue" value="PHAT Call" v-model="issue"/>

        <label for="troubleshooting">Troubleshooting/Call Notes</label>
        <textarea placeholder="What steps did you take during the call?" name="troubleshooting" cols="30" rows="10" v-model="troubleshooting"></textarea>
    </div>

    <div v-if="current.name === 'SAT'">

        <label for="btn">BTN</label>
        <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" />

        <label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" />

        <label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" type="text" name="account-holder" v-model="accountHolder" />

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <label for="email">Email</label>
        <input type="text" placeholder="Email (ex. loremipsum@mail.com)"  name="email" v-model="email" />

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">

        <hr>
        <label for="modem">Modem</label>
        <input type="text" name="modem" v-model="modem">

        <label for="router">Router</label>
        <input type="text" name="router" v-model="router">

        <label for="satlights">Lights</label>
        <input type="text" name="satlights" v-model="satlights">

        <label for="SANID">SAN ID</label>
        <input type="text" name="SANID" placeholder="Site ID (ex. FN1234567)" v-model="SANID">

        <label for="diag">Diagnostics</label>
        <input type="text" name="diag" v-model="diag">

        <hr>

        <label for="issue">Issue</label>
        <input type="text" name="issue" v-model="issue" />

        <label for="troubleshooting">Troubleshooting/Call Notes</label>
        <textarea placeholder="What steps did you take during the call?" name="troubleshooting" cols="30" rows="10" v-model="troubleshooting"></textarea>

        <hr>

        <label for="approved-by">Approved By</label>
        <input type="text" name="approved-by" placeholder="Who Approved Your Ticket (ex. LT Travis)" v-model="approvedBy" />

        <label for="satcase">Case Number</label>
        <input type="text" name="satcase" v-model="satcase" />

        <label for="ticket">Ticket Information</label>
        <textarea placeholder="Ticket Number 003249143
Commit Time 22:00
Commit Date 4/17" type="text" name="ticket" v-model="ticket" cols="20" rows="3"></textarea>

        <hr>

        <label for="offered-f-secure">Offered F-Secure</label>
        <select name="offered-f-secure" v-model="offeredFSecure">
            <option v-for="option in offeredFSecureOptions" :value="option.value">{{ option.name }}</option>
        </select>

        <label for="has-Credit"></label>
        <div v-for="option in hasCreditOptions">
            <input type="radio" v-model="hasCredit" class="checkbox" :value="option"> {{ option }}
        </div>

        <label for="survey">Survey</label>
        <select name="survey" v-model="survey">
            <option v-for="option in surveyOptions" :value="option">{{ option }}</option>
        </select>
    </div>

</div>
<hr />

<button name="copy-button" class="theme-background theme-background-light-hover" id="copy-button" data-clipboard-target="#copy-input">Copy</button>
<button name="clear-button" class="theme-background theme-background-light-hover" id="reset-button" type="reset" @click="reset">Reset</button>

<hr class="clear" />

<h1>Results</h1> <font color="EEEEEE" align="right"> Steven D</font>
<textarea name="copy" id="copy-input" cols="35" rows="20">{{ summary }}</textarea>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
<script>

    $(document).ready( () => {
        $('#colourSelector .swatch').each(function(){
            $(this).css("background-color", $(this).attr("data-colour") );
        });
        $('#colourSelector').on('click', '.swatch', function(){
            let colour = $(this).attr("data-colour");
            changeTheme(colour);
        });
        $("#hue").click(function(ev){
            let y = ev.offsetY;
            if (y < 0 ) y = 0;
            if (y > $(this).height() ) y = $(this).height();
            $(this).children().css("top", y);
            updateColours();
        });
        $("#hue").on('mousemove', function(ev){
            if (ev.buttons != 1) return;

            let y = ev.offsetY;
            if (y < 0 ) y = 0;
            if (y > $(this).height() ) y = $(this).height();
            $(this).children().css("top", y);
            updateColours();
        })

        $("#brightness").click(function(ev){
            let x = ev.offsetX;
            let y = ev.offsetY;

            if (x < 0 ) x = 0;
            if (x > $(this).width() ) x = $(this).width();

            if (y < 0) y = 0;
            if (y > $(this).height() ) y = $(this).height();

            $(this).children().css("left", x);
            $(this).children().css("top", y);

            updateColours();
        });
        $("#brightness").on('mousemove', function(ev){
            if (ev.buttons != 1) return;
            let x = ev.offsetX;
            let y = ev.offsetY;

            if (x < 0 ) x = 0;
            if (x > $(this).width() ) x = $(this).width();

            if (y < 0) y = 0;
            if (y > $(this).height() ) y = $(this).height();

            $(this).children().css("left", x);
            $(this).children().css("top", y);

            updateColours();
        });

        $('#pickerButton').click(function(ev){
            if ($("#colourSelector").hasClass("active")) {
                $("#colourSelector").removeClass("active");
                $('#pickerButton').removeClass("active");
            } else {
                $("#colourSelector").addClass("active");
                $('#pickerButton').addClass("active");
            }
            ev.stopPropagation();
        });
        $('body').click(function(ev){
            if (
                ev.target != $("#colourSelector")[0] &&
                ev.target != $("#pickerButton")[0] &&
                ev.target != $("#brightness")[0] &&
                ev.target != $("#hue")[0]
            ) {
                $("#colourSelector").removeClass("active");
                $('#pickerButton').removeClass("active");
            }
        });
        updateColours();
    });
    function updateColours() {
        let height = $('#hue').height();


        let hue = 1- parseInt( $('#hue .picker').css('top'), 10) / height;
        let sat = parseInt( $('#brightness .picker').css('left'), 10) / height;
        let val = 1 - (parseInt( $('#brightness .picker').css('top'), 10) / height);


        let rgb = HSVtoRGB(hue, sat, val);

        // Update broader picker
        // background: radial-gradient(circle at top right, red 20%, transparent 80%);
        let rgb_max = HSVtoRGB(hue, 1, 1);
        $('#brightness').css('background', `radial-gradient(circle at top right, rgb(${rgb_max.r},${rgb_max.g},${rgb_max.b}) 20%, transparent 80%)`)
        
        let r = rgb.r.toString(16);
        let g = rgb.g.toString(16);;
        let b = rgb.b.toString(16);
        
        if (r.length <= 1) r = `0${r}`;
        if (g.length <= 1) g = `0${g}`;
        if (b.length <= 1) b = `0${b}`;

        let hex = `#${r}${g}${b}`;
        changeTheme(hex);

    }
    function changeTheme(colour) {
        let colourLight = modifyColour(colour, 0.2);
        let colourDark = modifyColour(colour, -0.2);
        $("style[data-theme]").remove();
        $("head").append(`
            <style data-theme="${colour}">
                .theme-background {
                    background:${colour};
                }
                .theme-color {
                    color:${colour};
                }
                .theme-background-hover:hover {
                    background:${colour};
                }
                .theme-color-hover:hover {
                    color:${colour};
                }

                .theme-background-dark {
                    background:${colourDark};
                }
                .theme-color-dark {
                    color: ${colourDark};
                }
                .theme-background-dark-hover:hover {
                    background: ${colourDark};
                }
                .theme-color-dark-hover:hover {
                    color: ${colourDark};
                }

                .theme-background-light {
                    background: ${colourLight};
                }
                .theme-color-light {
                    color: ${colourLight};
                }
                .theme-background-light-hover:hover {
                    background: ${colourLight};
                }
                .theme-color-light-hover:hover {
                    color: ${colourLight};
                }
            </style>
        `);
    }
    // Source: https://stackoverflow.com/a/17243070/1522641
    function HSVtoRGB(h, s, v) {
        var r, g, b, i, f, p, q, t;
        if (arguments.length === 1) {
            s = h.s, v = h.v, h = h.h;
        }
        i = Math.floor(h * 6);
        f = h * 6 - i;
        p = v * (1 - s);
        q = v * (1 - f * s);
        t = v * (1 - (1 - f) * s);
        switch (i % 6) {
            case 0: r = v, g = t, b = p; break;
            case 1: r = q, g = v, b = p; break;
            case 2: r = p, g = v, b = t; break;
            case 3: r = p, g = q, b = v; break;
            case 4: r = t, g = p, b = v; break;
            case 5: r = v, g = p, b = q; break;
        }
        return {
            r: Math.round(r * 255),
            g: Math.round(g * 255),
            b: Math.round(b * 255)
        };
    }
    function modifyColour(hex, lum) {

        // validate hex string
        hex = String(hex).replace(/[^0-9a-f]/gi, '');
        if (hex.length < 6) {
            hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
        }
        lum = lum || 0;

        // convert to decimal and change luminosity
        var rgb = "#", c, i;
        for (i = 0; i < 3; i++) {
            c = parseInt(hex.substr(i*2,2), 16);
            c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
            rgb += ("00"+c).substr(c.length);
        }

        return rgb;
    }
    var vm = new Vue({
        el: 'body',
        ready: function() {
            new Clipboard('#copy-button');
        },
        data: function() {
            var types = [
                {
                    name: 'DSL',
                    attributes: [
                        [
                            {name: 'btn', display: 'BTN'},
                            {name: 'ctn', display: 'CTN'},
                            {name: 'accountHolder', display: 'Acct Holder'},
                            {name: 'speakingWith', display: 'Speaking With'},
                            {name: 'verified', display: 'Verified'},
                            {name: 'email', display: 'Email'},
                            {name: 'outage', display: 'Outage'},
                            {name: 'OpenSO', display: 'Open TT/SO'}
                        ],
                        [
                            {name: 'modem', display: 'Modem'},
                            {name: 'lights', display: 'Lights'},
                            {name: 'lightsAfterPc', display: 'Lights After PC'},
                            {name: 'dsllightso', display: 'Other Lights'}

                        ],
                        [
                            {name: 'areaOfHighDemand', display: 'AOHD'},
                            {name: 'filters', display: 'Filters'},
                            {name: 'radius', display: 'Radius'},
                            {name: 'loopcare', display: 'Loopcare/ALU 5530'}

                        ],
                        [
                            {name: 'issue', display: 'Issue'},
                            {name: 'troubleshooting', display: 'Troubleshooting/Call Notes'}
                        ],
                        [
                            {name: 'approvedBy', display: 'Approved By'},
                            {name: 'ticket', display: 'Ticket Information'}
                        ],
                        [
                            {name: 'offeredFSecure', display: 'Offered F-Secure'},
                            {name: 'hasCredit', display: 'Credit'},
                            {name: 'survey', display: 'Survey'}
                        ]
                    ],
                    uniqueFields: ['modem', 'lights', 'lightsAfterPc', 'areaOfHighDemand', 'loopcare', 'radius', 'dsllightso']
                },
                {
                    name: 'FiOS',
                    attributes: [
                        [
                            {name: 'btn', display: 'BTN'},
                            {name: 'ctn', display: 'CTN'},
                            {name: 'accountHolder', display: 'Acct Holder'},
                            {name: 'speakingWith', display: 'Speaking With'},
                            {name: 'verified', display: 'Verified'},
                            {name: 'email', display: 'Email'},
                            {name: 'outage', display: 'Outage'},
                            {name: 'OpenSO', display: 'Open TT/SO'}
                        ],
                        [
                            {name: 'router', display: 'Broadband Home Router'},
                            {name: 'routerlights', display: "Router Lights"},
                            {name: 'setTopBox', display: 'Set Top-Box'},
                            {name: 'phoneType', display: 'Phone Type'},
                            {name: 'opticalNetworkTerminal', display: 'Optical Network Terminal'},
                            {name: 'ontstatus', display: "ONT Status"},
                            {name: 'multiDwellingUnit', display: 'Multi-Dwelling Unit'},
                            {name: 'staticIp', display: 'Static IP'}
                        ],
                        [
                            {name: 'issue', display: 'Issue'},
                            {name: 'troubleshooting', display: 'Troubleshooting/Call Notes'}
                        ],
                        [
                            {name: 'approvedBy', display: 'Approved By'},
                            {name: 'ticket', display: 'Ticket Information'}
                        ],
                        [
                            {name: 'offeredFSecure', display: 'Offered F-Secure'},
                            {name: 'hasCredit', display: 'Credit'},
                            {name: 'survey', display: 'Survey'}
                        ]
                    ],
                    uniqueFields: ['router', 'ontstatus', 'setTopBox', 'phoneType', 'opticalNetworkTerminal', 'multiDwellingUnit', 'staticIp']
                },
                {
                    name: 'PHAT',
                    attributes: [
                        [
                            {name: 'btn', display: 'BTN'},
                            {name: 'ctn', display: 'CTN'},
                            {name: 'accountHolder', display: 'Acct Holder'},
                            {name: 'speakingWith', display: 'Speaking With'},
                            {name: 'verified', display: 'Verified'},
                            {name: 'crisid', display: 'Cris ID'},
                            {name: 'email', display: 'Email'}
                        ],
                        [
                            {name: 'issue', display: 'Issue'},
                            {name: 'troubleshooting', display: 'Troubleshooting/Call Notes'}
                        ]
                    ],
                    uniqueFields: ['crisid', 'issue']
                },
                {
                    name: 'SAT',
                    attributes: [
                        [
                            {name: 'btn', display: 'BTN'},
                            {name: 'ctn', display: 'CTN'},
                            {name: 'accountHolder', display: 'Acct Holder'},
                            {name: 'speakingWith', display: 'Speaking With'},
                            {name: 'verified', display: 'Verified'},
                            {name: 'email', display: 'Email'},
                            {name: 'outage', display: 'Outage'},
                            {name: 'OpenSO', display: 'Open TT/SO'}
                        ],
                        [
                            {name: 'modem', display: 'Modem'},
                            {name: 'router', display: 'Router'},
                            {name: 'satlights', display: 'Lights'},
                            {name: 'SANID', display: "SAN ID"},
                            {name: 'diag', display: "Diagnostics"}
                        ],
                        [
                            {name: 'issue', display: 'Issue'},
                            {name: 'troubleshooting', display: 'Troubleshooting/Call Notes'}
                        ],
                        [
                            {name: 'approvedBy', display: 'Approved By'},
                            {name: 'satcase' , display: 'SAT Case'},
                            {name: 'ticket', display: 'Ticket Information'}
                        ],
                        [
                            {name: 'offeredFSecure', display: 'Offered F-Secure'},
                            {name: 'hasCredit', display: 'Credit'},
                            {name: 'survey', display: 'Survey'}
                        ]
                    ],
                    uniqueFields: ['router', 'SANID', 'diag', 'satcase', 'satlights']
                },
                {
                    name: 'POTS',
                    attributes: [
                        [
                            {name: 'btn', display: 'BTN'},
                            {name: 'ctn', display: 'CTN'},
                            {name: 'accountHolder', display: 'Acct Holder'},
                            {name: 'speakingWith', display: 'Speaking With'},
                            {name: 'verified', display: 'Verified'},
                            {name: 'email', display: 'Email'},
                            {name: 'outage', display: 'Outage'},
                            {name: 'OpenSO', display: 'Open TT/SO'}
                        ],
                        [
                            {name: 'filters', display: 'Filters'}
                        ],
                        [
                            {name: 'issue', display: 'Issue'},
                            {name: 'troubleshooting', display: 'Troubleshooting/Call Notes'}
                        ],
                        [
                            {name: 'approvedBy', display: 'Approved By'},
                            {name: 'ticket', display: 'Ticket Information'}
                        ],
                        [
                            {name: 'offeredFSecure', display: 'Offered F-Secure'},
                            {name: 'hasCredit', display: 'Credit'},
                            {name: 'survey', display: 'Survey'}
                        ]
                    ]
                }
            ];
            return {
                current: types[0],
                types: types,
                btn: '',
                ctn: '',
                SANID:'',
                dsllightso: '',
                accountHolder: '',
                speakingWith: '',
                email: '',
                satcase:'',
                diag:'',
                verified: '',
                modem: '',
                lights: '',
                lightsAfterPc: '',
                areaOfHighDemand: '',
                router:'',
                dslcable:'',
                setTopBox:'',
                phoneType:'',
                opticalNetworkTerminal:'',
                multiDwellingUnit: '',
                staticIp: '',
                OpenSO: '',
                outage:'',
                filters: '',
                ontstatus: '',
                issue: '',
                routerlights: '',
                troubleshooting: '',
                loopcare: '',
                radius: '',
                approvedBy: '',
                crisid: '',
                satlights: '',
                ticket: '',
                offeredFSecure: '',
                hasCredit: [],
                survey: '',
                outageOptions: [
                    '',
                    'No Outages Present',
                    'Customer is in an Outage'
                ],
                filtersOptions: [
                    '',
                    'Yes',
                    'Yes - Has No Filters',
                    'No - DSL Only',
                    'No - POTS Only'
                ],
                verifiedOptions: [
                    '',
                    'Yes - SSN',
                    'Yes - PIN',
                    'Yes - DOB',
                    'Yes - Security Q',
                    'Yes - Tax ID',
                    'Yes - Cris ID',
                    'Yes - Called BTN',
                    'No'
                ],
                ontstatusOptions: [
                    '',
                    'Up',
                    'Down',
                    'Anything But Down',
                    'Other'
                ],
                modemOptions: [
                    '',
                    'Actiontec F2250',
                    'Actiontec FV2200',
                    'Actiontec GT704WG',
                    'Actiontec GT784WNV',
                    'Arris NVG443B',
                    'D-Link DSL-2750B',
                    'Netgear 7550',
                    'Netgear D2200D',
                    'Siemens SE567',
                    'Speed Stream 5200',
                    'Speed Stream 6520',
                    'Westell 327W',
                    'Westell 6100',
                    'Westell 7500',
                    'Other'
                ],
                lightOptions: [
                    '',
                    'DSL Blinking, Inet Off',
                    'DSL Blinking, Inet Red',
                    'DSL Solid, Inet Blue',
                    'DSL Solid, Inet Green',
                    'DSL Solid, Inet Red',
                    'DSL Solid, Inet Off',
                    'DSL Orange',
                    'DSL Red',
                    'Power Red',
                    'No Lights'
                ],
                areaOfHighDemandOptions: [
                    '',
                    'Yes',
                    'No'
                ],

                phoneTypeOptions: [
                    '',
                    'TDM POTS',
                    'TDM FTTP',
                    'SIP CS2k',
                    'FDV Broadsoft',
                    'FDV Legacy WIO'
                ],
                routerOptions: [
                    '',
                    'Arris NVG468MQ',
                    'Quantum 1100',
                    'D-Link DL-624S',
                    'MI424WR FP GigE',
                    'MI424WR REV. I',
                    'MI424WR REV. E/F',
                    'MI424WR',
                    'Westell 9100EM',
                    'Zyxel/HPNA',
                    'Westell 9100VM'
                ],
                setTopBoxOptions: [
                    '',
                    'Arris VMS 1100',
                    'Arris IPC 1100',
                    'Arris IP815',
                    'Motorola 7232 DVR',
                    'Motorola 7216 DVR',
                    'Motorola 7100',
                    'Motorola 7100 P2',
                    'Motorola 2500',
                    'Motorola DCT-700'
                ],
                opticalNetworkTerminalOptions: [
                    '',
                    'Tellabs 610',
                    'Tellabs 611',
                    'Tellabs 612',
                    'Tellabs 613',
                    'Tellabs 621',
                    'Tellabs 625',
                    'Motorola 1000V',
                    'Motorola 1000M',
                    'Motorola 1000G',
                    'Motorola 1500GT',
                    'Motorola 1500GTI',
                    'Motorola 6000BET',
                    'Motorola 6000BVT',
                    'Motorola 6000MDU',
                    'Motorola 6000VDSL',
                    'ALTL O-24121V',
                    'ALTL O-211',
                    'ALTL I-211',
                    'ALTL I-211M',
                    'ALTL O-821G-D',
                    'ALTL O-821M',
                    'CALIX 722GX',
                    'CALIX 722GE',
                    'CALIX 727GE'
                ],
                multiDwellingUnitOptions: [
                    '',
                    'Yes',
                    'No'
                ],
                staticIpOptions: [
                    '',
                    'Yes',
                    'No'
                ],
                offeredFSecureOptions: [
                    {name: '', value: ''},
                    {name: 'Yes', value: 'Yes'},
                    {name: 'Yes - Sold', value: 'Yes - Sold'},
                    {name: 'Yes - Sold Range Extender', value: 'Yes - Sold Smart Mesh Wifi Extender (AirTies) Dual Pack' + '\nCust Agrees to 3 Installments of $48'},
                    {name: 'Yes - Sold Computer Security', value: 'Yes - Sold Computer Security' + '\nCust Agrees to 5.99/mo'},
                    {name: 'Yes - Sold Identity Security Bundle', value: 'Yes - Sold Identity Security Bundle' + '\nCust Agrees to 9.99/mo'},
                    {name: 'Yes - Sold Personal Security Bundle', value: 'Yes - Sold Personal Security Bundle' + '\nCust Agrees to 9.99/mo'},
                    {name: 'Yes - Sold Personal Security Plus Bundle', value: 'Yes - Sold Personal Security Plus Bundle' + '\nCust Agrees to 14.99/mo'},
                    {name: 'Yes - Sold Personal Security Ultimate Bundle', value: 'Yes - Sold Personal Security Ultimate Bundle' + '\nCust Agrees to 19.99/mo'},
                    {name: 'Yes - Sold Premiere Protection Bundle', value: 'Yes - Sold Premiere Protection Bundle' + '\nCust Agrees to $24.99/mo'},
                    {name: 'No - Other', value: 'No - Other'},
                    {name: 'No - Upset Customer', value: 'No - Upset Customer'},
                    {name: 'No - Not Authorized', value: 'No - Not Authorized'},
                    {name: 'Do NOT sell', value: 'Do NOT sell products to this customer'}
                ],
                hasCreditOptions: [
                    'Yes - Has $5 Credit',
                    'No - Not Eligible'
                ],
                surveyOptions: [
                    '',
                    'Yes',
                    'No - Customer Has No Email',
                    'No - Customer Refused',
                    'No'
                ]
            }
        },
        methods: {
            reset: function() {
                if (!this.current) {
                    return false;
                }

                var group;
                for (groupIndex in this.current.attributes) {
                    group = this.current.attributes[groupIndex];
                    for (index in group) {
                        if (!this[group[index].name]) {
                            continue;
                        };
                        if (Array.isArray(this[group[index].name])) {
                            this[group[index]] = [];
                            continue;
                        }
                        this[group[index].name] = '';
                    }
                }

                this.scrollToTop(150);

            },
            scrollToTop: function (scrollDuration) {
                var scrollStep = -window.scrollY / (scrollDuration / 15),
                        scrollInterval = setInterval(function(){
                            if ( window.scrollY != 0  && window.Position != 0 ) {
                                window.scrollBy(0,scrollStep);
                            }
                            else {
                                clearInterval(scrollInterval);

                            }
                        }, 15);
            },
            setCurrentType: function(type) {
                for (index in this.current.uniqueFields) {
                    if (Array.isArray(this[this.current.uniqueFields[index]])) {
                        this[this.current.uniqueFields[index]] = [];
                        continue;
                    }
                    this[this.current.uniqueFields[index]] = '';
                }

                this.current = type;
            }
        },
        computed: {
            summary: function() {
                var summary = '';
                var attribute, attributeName;
                for (groupIndex in this.current.attributes) {
                    group = this.current.attributes[groupIndex];
                    for (index in group) {
                        attribute = this[group[index].name];
                        attributeName = group[index].display;
                        if (Array.isArray(attribute)) {
                            if (attribute.length === 0) {
                                continue;
                            }
                            summary += attributeName + ': ' + attribute.join(', ') + '\n';
                            continue;
                        }

                        if (attribute.trim() !== '') {
                            summary += attributeName + ': ' + attribute + '\n';
                        }
                    }

                    summary += '\n';
                    summary = summary.replace('\n\n\n', '\n\n');
                }

                return summary.trim();
            }
        }
    });
</script>
    <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
            <center>
                <br/>
                <a href="javascript:window.open('/feedback', 'Feedback', 'width=650,height=370');" class="btn theme-background theme-background-light-hover">Suggestions/Bugs</a>
            </center>
        </div>
    </div>
</body>
</html>