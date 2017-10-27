<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

$user_rec = array();
if (false === $fgmembersite->GetUserFromEmail($fgmembersite->UserEmail(), $user_rec))
    $user_id = 0;
else
    $user_id = intval($user_rec['id_user']);
?>


<!-- This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

    Note template created by Charles Yost / Joseph Moran --
    -- Contributors:
    -- Jesse N. Richardson 
    -- Thomas Edwards   
    -- Brett Bryant
    -->
<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <link rel="icon" type="image/png" href="favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <title>Note Template</title>
        <script src="https://use.fontawesome.com/4251d2427b.js"></script>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//status.templateace.xyz/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    _paq.push(['setUserId', '<?php echo $user_id; ?>']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
    </head>
<body onbeforeunload="return confirm('Are you sure you want to close this ');" class="theme-background">
    <button onclick="scrollToTop(1000)" class="theme-background theme-background-light-hover" id="scrollbutt"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
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
        <!--    <div class="alert">
        <span class="closebtn">&times;</span>
        <strong>Warning:&nbsp;</strong> VDSL and Bonded lines are now performing modem replacements as normal. Please follow a LOLA workflow to contact the modem replacement team instead of placing a ticket.
    </div> -->
            <div class="alert warning">
        <span class="closebtn">&times;</span>  
        <strong>Alert:&nbsp;</strong>Make sure you are using the new AOHD DSL CLLI tool to determine if the customer is in an Area of High Demand <a target="_blank" href="http://nmars.corp.pvt/dashboards/lola/dslamCheck.php">AOHD Tool</a>
    </div>
    <div class="alert info">
        <div class="closebtn">&times;</div>
        <div>  
            <strong>Info:</strong> The copy button on the DSL template is in beta testing. Enjoy!
        </div>
    </div>
<textarea name="stickynotes" placeholder="This is a memo section" id="stickynotes" cols="2" rows="3"></textarea>
<div class="form">

    <div align="center" class="main-nav clear">
        <span class="theme-background theme-background-light-hover" v-for="type in types" @click="setCurrentType(type)">{{ type.name | capitalize }}</span>
    </div>

    <hr>


    <label for="issue">Issue</label>
    <input type="text" placeholder="Reason For Calling (ex. No Internet, Email Issue, No Dial Tone)" name="issue" v-model="issue"/>

    <hr>

    <div v-if="current.name === 'FiOS'"> <!-- FIOS START -->
        <div class="wrapper"><label for="btn">BTN</label>
            <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#btn"></button></div><br /><br />

        <div class="wrapper"><label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#ctn"></button></div>

        <div class="wrapper"><label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" id="account-holder" type="text" name="account-holder" v-model="accountHolder" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#account-holder"></button></div>

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <div class="wrapper"><label for="email">Email</label>
        <input id="email"  type="text" placeholder="Email (ex. brie.yoe@telenetwork.com)"  name="email" v-model="email" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#email"></button></div>

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">

        <hr>
        <label for="router">Broadband Home Router</label>
        <select name="router" v-model="router"  onchange="if ($('select[name=router]').val() == 'Other') { $('input[name=otherrouter]').css('display', 'block'); } else { $('input[name=otherrouter]').css('display', 'none').val(''); } ">>
            <option v-for="option in routerOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="otherrouter"></label>
        <input type="text" name="otherrouter" v-model="otherrouter" style="display: none;" placeholder="Other Router" value="" />

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
        <select name="Optical-Network-Terminal" v-model="opticalNetworkTerminal" onchange="updateMDU()">
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

        <div class="wrapper"><label for="btn">BTN</label>
            <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#btn"></button></div><br /><br />

        <div class="wrapper"><label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#ctn"></button></div>

        <div class="wrapper"><label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" id="account-holder" type="text" name="account-holder" v-model="accountHolder" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#account-holder"></button></div>

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <div class="wrapper"><label for="email">Email</label>
        <input id="email"  type="text" placeholder="Email (ex. brie.yoe@telenetwork.com)"  name="email" v-model="email" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#email"></button></div>

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

        <div class="wrapper"><label for="btn">BTN</label>
            <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#btn"></button></div><br /><br />

        <div class="wrapper"><label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#ctn"></button></div>

        <div class="wrapper"><label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" id="account-holder" type="text" name="account-holder" v-model="accountHolder" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#account-holder"></button></div>

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <div class="wrapper"><label for="email">Email</label>
        <input id="email"  type="text" placeholder="Email (ex. brie.yoe@telenetwork.com)"  name="email" v-model="email" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#email"></button></div>

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">
        
        <hr>
        
        <label for="modem">Modem</label>
        <select name="modem" v-model="modem"  onchange="if ($('select[name=modem]').val() == 'Other') { $('input[name=othermodem]').css('display', 'block'); } else { $('input[name=othermodem]').css('display', 'none').val(''); } ">
            <option v-for="option in modemOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="othermodem"></label>
        <input type="text" name="othermodem" v-model="othermodem" style="display: none;" placeholder="Other Modem" value="" />

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
        <label for="area-of-high-demand">NMARS Results</label>
        <input placeholder="LAVLOHAGBB0	Congestion Exists for Device. Area of High Demand" type="text" name="AOHD" v-model="AOHD">

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

        <div class="wrapper"><label for="btn">BTN</label>
            <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#btn"></button></div><br /><br />

        <div class="wrapper"><label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#ctn"></button></div>

        <div class="wrapper"><label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" id="account-holder" type="text" name="account-holder" v-model="accountHolder" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#account-holder"></button></div>

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <div class="wrapper"><label for="email">Email</label>
        <input id="email"  type="text" placeholder="Email (ex. brie.yoe@telenetwork.com)"  name="email" v-model="email" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#email"></button></div>

        <hr>
        <label for="crisid">Cris ID</label>
        <input type="text" placeholder="CRIS ID (ex. 978274 Abby)" name="crisid" v-model="crisid"/>

        <label for="issue">Issue</label>
        <input type="text" name="issue" value="PHAT Call" v-model="issue"/>

        <label for="troubleshooting">Troubleshooting/Call Notes</label>
        <textarea placeholder="What steps did you take during the call?" name="troubleshooting" cols="30" rows="10" v-model="troubleshooting"></textarea>
    </div>

    <div v-if="current.name === 'SAT'">

        <div class="wrapper"><label for="btn">BTN</label>
            <!-- maxlength="10" --><input id="btn" placeholder="BTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="btn" v-model="btn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#btn"></button></div><br /><br />

        <div class="wrapper"><label for="ctn">CTN</label>
        <input id="ctn" placeholder="CTN (ex. 5553271423)" onchange="this.value=this.value.replace(/[([).*:+='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\]\\-]/g,'')" type="text" name="ctn" v-model="ctn" /><button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#ctn"></button></div>

        <div class="wrapper"><label for="account-holder">Acct Holder</label>
        <input placeholder="Account Holder's Name" id="account-holder" type="text" name="account-holder" v-model="accountHolder" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#account-holder"></button></div>

        <label for="speaking-with">Speaking With</label>
        <input type="text" placeholder="Caller's Name" name="speaking-with" v-model="speakingWith" />

        <label for="verified">Verified</label>
        <select name="verified" v-model="verified">
            <option v-for="option in verifiedOptions" :value="option">{{ option }}</option>
        </select>

        <div class="wrapper"><label for="email">Email</label>
        <input id="email"  type="text" placeholder="Email (ex. brie.yoe@telenetwork.com)"  name="email" v-model="email" />
            <button id="copy" class="fa fa-1x fa-clipboard" data-copytarget="#email"></button></div>

        <label for="Outage">Outage</label>
        <select name="outage" v-model="outage">
            <option v-for="option in outageOptions" :value="option">{{ option }}</option>
        </select>
        
        <label for="OpenSO">Open TT/SO</label>
        <input type="text" placeholder="(ex. 000000123 RES PHY CHNG)" name="OpenSO" v-model="OpenSO">

        <hr>
        <label for="SATmodem">Modem</label>
        <select name="SATmodem" v-model="SATmodem">
            <option v-for="option in SATmodemOptions" :value="option">{{ option }}</option>
        </select>

        <label for="SATrouter">Router</label>
        <input type="text" name="SATrouter" v-model="SATrouter">

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
                            {name: 'issue', display: '(!) Issue'}
                        ],
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
                            {name: 'othermodem', display: 'Modem'},
                            {name: 'lights', display: 'Lights'},
                            {name: 'lightsAfterPc', display: 'Lights After PC'},
                            {name: 'dsllightso', display: 'Other Lights'}

                        ],
                        [
                            {name: 'AOHD', display: 'NMARS'},
                            {name: 'filters', display: 'Filters'},
                            {name: 'radius', display: 'Radius'},
                            {name: 'loopcare', display: 'Loopcare/ALU 5530'}

                        ],
                        [
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
                    uniqueFields: ['modem', 'othermodem', 'lights', 'lightsAfterPc', 'areaOfHighDemand', 'loopcare', 'radius', 'dsllightso']
                },
                {
                    name: 'FiOS',
                    attributes: [
                        [
                            {name: 'issue', display: '(!) Issue'}
                        ],
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
                            {name: 'router', display: 'Router'},
                            {name: 'otherrouter', display: 'Router'},
                            {name: 'routerlights', display: "Router Lights"},
                            {name: 'setTopBox', display: 'Set Top-Box'},
                            {name: 'phoneType', display: 'Phone Type'},
                            {name: 'opticalNetworkTerminal', display: 'Optical Network Terminal'},
                            {name: 'ontstatus', display: "ONT Status"},
                            {name: 'multiDwellingUnit', display: 'Multi-Dwelling Unit'},
                            {name: 'staticIp', display: 'Static IP'}
                        ],
                        [
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
                    uniqueFields: ['router', 'otherrouter', 'ontstatus', 'setTopBox', 'phoneType', 'opticalNetworkTerminal', 'multiDwellingUnit', 'staticIp']
                },
                {
                    name: 'PHAT',
                    attributes: [
                        [
                            {name: 'issue', display: '(!) Issue'}
                        ],
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
                            {name: 'troubleshooting', display: 'Troubleshooting/Call Notes'}
                        ]
                    ],
                    uniqueFields: ['crisid', 'issue']
                },
                {
                    name: 'SAT',
                    attributes: [
                          [
                            {name: 'issue', display: '(!) Issue'}
                        ],
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
                            {name: 'SATmodem', display: 'Modem'},
                            {name: 'SATrouter', display: 'Router'},
                            {name: 'satlights', display: 'Lights'},
                            {name: 'SANID', display: "SAN ID"},
                            {name: 'diag', display: "Diagnostics"}
                        ],
                        [
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
                    uniqueFields: ['SATrouter', 'SATmodem', 'SANID', 'diag', 'satcase', 'satlights']
                },
                {
                    name: 'POTS',
                    attributes: [
                        [
                            {name: 'issue', display: '(!) Issue'}
                        ],
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
                othermodem: '',
                satcase:'',
                diag:'',
                SATmodem:'',
                SATrouter:'',
                verified: '',
                modem: '',
                lights: '',
                lightsAfterPc: '',
                AOHD: '',
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
                SATmodemOptions: [
                    '',
                    'HN9000',
                    'HT1000',
                    'HT1100'
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
                    'Westell 9100VM',
                    'Other'
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

                $("input[name^=other]").hide();
                $("select[name=multi-dwelling-unit]").val('');

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

                        if (attributeName == "Multi-Dwelling Unit") {
                            attribute = $('select[name=multi-dwelling-unit]').val();
                        }

                        if (attribute.trim() !== '' && 
                            (group[index].name != "modem" || !this['othermodem'].length) &&
                            (group[index].name != "router" || !this['otherrouter'].length)) {
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
<script tpye="text/javascript" src="js/mdu-auto-select.js"></script>
        <center>
                <br/>
                <a href="javascript:window.open('/feedback', 'Feedback', 'width=650,height=370');" class="btn theme-background theme-background-light-hover">Suggestions/Bugs</a><br /><a href="javascript:window.open('https://www.gnu.org/licenses/agpl-3.0.html', 'Feedback', 'width=650,height=370');"><br /><img style="width:44px;height:16px;" src="https://www.gnu.org/graphics/gplv3-88x31.png" /> </a>
            </center>
        </div>
    </div>

<script type="text/javascript">
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scrollbutt").style.display = "block";
    } else {
        document.getElementById("scrollbutt").style.display = "none";
    }
}
</script>
            <script>
function scrollToTop(scrollDuration) {
const   scrollHeight = window.scrollY,
        scrollStep = Math.PI / ( scrollDuration / 15 ),
        cosParameter = scrollHeight / 2;
var     scrollCount = 0,
        scrollMargin,
        scrollInterval = setInterval( function() {
            if ( window.scrollY != 0 ) {
                scrollCount = scrollCount + 1;  
                scrollMargin = cosParameter - cosParameter * Math.cos( scrollCount * scrollStep );
                window.scrollTo( 0, ( scrollHeight - scrollMargin ) );
            } 
            else clearInterval(scrollInterval); 
        }, 15 );
}
</script>
    <script type="text/javascript">/*
    Copy text from any appropriate field to the clipboard
  By Craig Buckler, @craigbuckler
  use it, abuse it, do whatever you like with it!
*/
(function() {

    'use strict';
  
  // click events
  document.body.addEventListener('click', copy, true);

    // event handler
    function copy(e) {

    // find target element
    var 
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);
      
    // is element selectable?
    if (inp && inp.select) {
      
      // select text
      inp.select();

      try {
        // copy text
        document.execCommand('copy');
        inp.blur();
        
        // copied animation
        t.classList.add('copied');
        setTimeout(function() { t.classList.remove('copied'); }, 1500);
      }
      catch (err) {
        alert('please press Ctrl/Cmd+C to copy');
      }
      
    }
    
    }

})();
    </script>
</body>
</html>
