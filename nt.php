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
 <!-- Note template created by Charles Yost / Joseph Moran --
    -- Contributors:
    -- Jesse N. Richardson 
    -- Thomas Edwards     
    -->
<head>
    <link rel="icon" type="image/png" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>Note Template</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

        html {background: #cfe7fa; /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover, #cfe7fa 0%, #6393c1 100%); /* FF3.6-15 */
            background: -webkit-radial-gradient(center, ellipse cover, #cfe7fa 0%,#6393c1 100%); /* Chrome10-25,Safari5.1-6 */
            background: radial-gradient(ellipse at center, #cfe7fa 0%,#6393c1 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cfe7fa', endColorstr='#6393c1',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
            font-family: 'roboto', 'sans-serif';
        }

        body {
            background-color: #EEE;
            padding: 10px;
            margin: 20px auto;
            max-width: 678px;
            border: 2px solid rgba(255, 255, 255, 0);
            border-radius: 5px;
            box-shadow: 0 0 2px #000000;
        }

        h1 {
            color: #333;
            font-size: 1.6em;
            text-shadow: 0 0 1px #29b;
            text-align: center;
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

        input:not(.checkbox), select{
            width: 100%;
            padding: 5px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        textarea{
            width: 100%;
            padding: 5px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;}

        label {
            margin-top: 1px;
            margin-bottom: 2px;
            word-wrap: normal;

        }

        #copy-button, #reset-button{
            width: 48%;
            -moz-box-shadow:inset 2px 10px 6px -4px #29bbff;
            -webkit-box-shadow:inset 2px 10px 6px -4px #29bbff;
            box-shadow:inset 2px 10px 6px -4px #29bbff;
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2dabf9), color-stop(1, #0688fa));
            background:-moz-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:-webkit-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:-o-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:-ms-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2dabf9', endColorstr='#0688fa',GradientType=0);
            background-color:#2dabf9;
            -moz-border-radius:4px;
            -webkit-border-radius:4px;
            border-radius:4px;
            border:1px solid #0b0e07;
            box-sizing: border-box;
            display: inline-block;
            cursor:pointer;
            color:#ffffff;
            margin: 10px 0;
            font-family:Verdana;
            font-size:18px;
            font-weight:bold;
            padding:3px 10px;
            text-decoration:none;
            text-shadow:0px 1px 0px #263666;
        }

        .main-nav > span{
            width: 15%;
            -moz-box-shadow:inset 2px 10px 6px -4px #29bbff;
            -webkit-box-shadow:inset 2px 10px 6px -4px #29bbff;
            box-shadow:inset 2px 10px 6px -4px #29bbff;
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2dabf9), color-stop(1, #0688fa));
            background:-moz-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:-webkit-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:-o-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:-ms-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
            background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2dabf9', endColorstr='#0688fa',GradientType=0);
            background-color:#2dabf9;
            -moz-border-radius:4px;
            -webkit-border-radius:4px;
            border-radius:4px;
            border:1px solid #0b0e07;
            box-sizing: border-box;
            display: inline-block;
            cursor:pointer;
            color:#ffffff;
            margin: 10px 0;
            font-family:Verdana;
            font-size:18px;
            font-weight:bold;
            padding:3px 10px;
            text-decoration:none;
            text-shadow:0px 1px 0px #263666;
        }

        #copy-button {
            float: left;
        }

        #reset-button {
            float: right;
        }

        .clear {
            clear: both;
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

        #reset-button:hover, #copy-button:hover, .main-nav > span:hover {
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0688fa), color-stop(1, #2dabf9));
            background:-moz-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
            background:-webkit-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
            background:-o-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
            background:-ms-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
            background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0688fa', endColorstr='#2dabf9',GradientType=0);
            background-color:#0688fa;
        }

        .hidden {
            display: none;
        }
    </style>
    <link href="dist/jquery.colorpanel.css" rel="stylesheet">
    <link href="skins/default.css" id="cpswitch" rel="stylesheet">
    <script src="dist/jquery.colorpanel.js"></script>
</head>
<body onbeforeunload="return confirm('Are you sure you want to close this ');">
    <?php include_once("analyticstracking.php") ?>
 <div id="colorPanel" class="colorPanel">
        <a id="cpToggle" href="#"></a>
        <ul></ul>
    </div>
<h1>Note Template</h1>
    <div class="alert info">
        <div class="closebtn">&times;</div>
        <div>  
            <strong>Los Angeles Router Upgrade 17th July:</strong> We will be doing a network upgrade in our Los Angeles location on July 17, 2017 at 4pm CST.  We anticipate a network interruption of approximately 1 hour. The website will be down during this period.
        </div>
    </div>
<textarea name="stickynotes" placeholder="This is a memo section" id="stickynotes" cols="2" rows="2"></textarea>
<div class="form">

    <div align="center" class="main-nav clear">
        <span v-for="type in types" @click="setCurrentType(type)">{{ type.name | capitalize }}</span>
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

<button name="copy-button" id="copy-button" data-clipboard-target="#copy-input">Copy</button>
<button name="clear-button" id="reset-button" type="reset" @click="reset">Reset</button>

<hr class="clear" />

<h1>Results</h1> <font color="EEEEEE" align="right"> Steven D</font>
<textarea name="copy" id="copy-input" cols="35" rows="20">{{ summary }}</textarea>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
<script>
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
                    'Customer is in an Outage',
                    'Customer is Trending'
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
<center><b><a href="https://goo.gl/DMeCli" target="_blank">Suggestions/Bugs</a></b></center>
</body>
</html>