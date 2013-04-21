<?php
/**
* @Author Pasindu De Silva
* @license GNU Affero General Public License http://www.gnu.org/licenses/
* @vatsim : 1165770
*/
include 'vatsim.php';
$obj    = new Vatsim;
$client = $obj->clients();

if ($_GET['format'])
    $type = $_GET['format'];
	
if ($_GET['data'])
    $datatype = $_GET['data'];
	
if (isset($_GET['callback']))
    $callback = $_GET['callback'];
	
if (!$_GET['format'])
    $type = "json";
	
if (isset($type) && isset($datatype)) {
   if ($type == "json") {
        header('Content-type: application/json');
        if (isset($_GET['callback']))
           echo "/**/ " . $callback . "(";
    } else {
        header('Content-type: text/xml');
        print '<markers>';
    }
	
	$client_arrary = array(
            'callsign', 'cid', 'realname', 'clienttype', 'frequency', 'latitude', 'longitude', 'altitude', 'groundspeed','planned_aircraft', 'planned_tascruise', 'planned_depairport', 'planned_altitude', 'planned_destairport', 'server',
            'protrevision', 'rating', 'transponder', 'facilitytype', 'visualrange', 'planned_revision', 'planned_flighttype', 'planned_deptime', 'planned_actdeptime', 'planned_hrsenroute','planned_minenroute', 'planned_hrsfuel', 'planned_minfuel',
            'planned_altairport', 'planned_remarks', 'planned_route','planned_depairport_lat', 'planned_depairport_lon', 'planned_destairport_lat', 'planned_destairport_lon', 'atis_message', 'time_last_atis_received', 'time_logon', 'heading', 'QNH_iHg', 'QNH_Mb'
         );
		 
		 
    for ($i = 1; $i < sizeof($client); $i++) {
	
		$data_arrary = array();
		for ($e = 0; $e < 41; $e++) {
				$data_arrary[$e]=$client[$i][$i][$e];
		}		
										
		if($type=='json')
		{	
					unset($arry);
				for ($e = 0; $e < 41; $e++) {
					$arry[]=array(	$client_arrary[$e] =>	$data_arrary[$e]);
				}	

					$marks []= $arry ;
		
        } else
		{
		
				
					print '<marker ';
					print '
		callsign = " ' . $callsign . ' " 
		cid =" ' . $cid . ' "
		realname  =" ' . $realname . ' "
		clienttype  ="' . $clienttype . ' "
		frequency  =" ' . $frequency . ' " latitude  ="  ' . $latitude . ' "
		longitude  =" ' . $longitude . ' "
		altitude  ="' . $altitude . ' "
		groundspeed  ="' . $groundspeed . ' "
		planned_aircraft  ="' . $planned_aircraft . '"
		planned_tascruise  ="' . $planned_tascruise . '"
		planned_depairport  ="' . $planned_depairport . '"
		planned_altitude  ="' . $planned_altitude . '"
		planned_destairport  ="' . $planned_destairport . '"
		server  ="' . $server . '"
		protrevision  ="' . $protrevision . '"
		rating  ="' . $rating . '"
		transponder  ="' . $transponder . '"
		facilitytype  ="' . $facilitytype . '"
		visualrange  ="' . $visualrange . '"
		planned_revision  ="' . $planned_revision . '"
		planned_flighttype  ="' . $planned_flighttype . '"
		planned_deptime  ="' . $planned_deptime . '"
		planned_actdeptime  ="' . $planned_actdeptime . '"
		planned_hrsenroute  ="' . $planned_hrsenroute . '"
		planned_minenroute  ="' . $planned_minenroute . '"
		planned_hrsfuel  ="' . $planned_hrsfuel . '"
		planned_minfuel  ="' . $planned_minfuel . '"
		planned_altairport  ="' . $planned_altairport . '"
		planned_route  ="' . $planned_route . '"
		planned_depairport_lat  ="' . $planned_depairport_lat . '"
		planned_depairport_lon  ="' . $planned_depairport_lon . '"
		planned_destairport_lat  ="' . $planned_destairport_lat . '"
		planned_destairport_lon  ="' . $planned_destairport_lon . '"
		time_last_atis_received  ="' . $time_last_atis_received . '"
		time_logon  ="' . $time_logon . '"
		heading  ="' . $heading . '"
		QNH_iHg  ="' . $QNH_iHg . '"
		QNH_Mb  ="' . $QNH_Mb . '" />';
        }
    }
    //$doc+=']}';
    if ($type == "json") {
	echo'{ "data":'. json_encode( $marks ).'}';
	   if (isset($_GET['callback']))
	   echo ")";
     
    } else {
        print '</markers>';
    }
}else{

		echo "Error";

}
	
?>
