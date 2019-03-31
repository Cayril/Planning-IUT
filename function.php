<?php
    //sous-function
    function getcalendar($promo) {
            // récupération des calendrier
            if($promo!=null){
                if($promo === "1A1"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214628e9ee67d520db5e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1A2"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021444b2068d37814033e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1B1"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214e3b4fdf609d53024e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1B2"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214e7816c0755e34543e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1C1"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc387320021473110dcf0fad1631e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1C2"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc38732002148ac4e83c0ad230abe0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1D1"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214d5d9f8710563f588e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b470ee97407c72c318d3f4109b6629391');}
                elseif($promo === "1D2"){
                    $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214c281cf3d512a92b6e0fa50826f0818af4a82a8fde6ce3f14906f45af276f59ae8fac93f781e86152aa9968683a1f1049521e5a8e68029dc8c2973627c2eb073b3ed16e4ed8dfec978d3f4109b6629391');}
                elseif($promo === "2A1"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2A2"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2B1"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2B2"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2C1"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2C2"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2D1"){
                    $calendrier = file_get_contents('');}
                elseif($promo === "2D2"){
                    $calendrier = file_get_contents('');}
            }
            return $calendrier;
        }
    function compressionJM(&$tt,&$d,&$moisTT,&$annee) {
        // compression jour/mois
        while((($tt+$d)>31)||($moisTT==2 && $tt+$d>28)||($moisTT%2==1 && $tt+$d>30)){
            if($moisTT==2 && $tt+$d>28){
                $tt=$tt-28;
                $moisTT=$moisTT+1;
            }
            elseif($moisTT%2==1 && $tt+$d>30){
                $tt=$tt-30;
                $moisTT=$moisTT+1;
            }
            elseif($tt+$d>31){
                $tt=$tt-31;
                $moisTT=$moisTT+1;
            }
        }
        while($tt<0){
            if($moisTT==2 && $tt<0){
                $tt=$tt+28;
                $moisTT=$moisTT-1;
            }
            elseif($moisTT%2==1 && $tt<0){
                $tt=$tt+31;
                $moisTT=$moisTT-1;
            }
            elseif($tt<0){
                $tt=$tt+30;
                $moisTT=$moisTT-1;
            }
            
            if($tt==0){
                $tt=1;
            }
            
        }
        
        if($moisTT>12){
            $annee=$annee+1;
            $moisTT=$moisTT-12;
        }
        if($moisTT<=0){
            $annee=$annee-1;
            $moisTT=12+$moisTT;
        }
    }
    function horaire($hor,$temps2) {
                    $c=(10+$hor)*100+$temps2;
                    return $c;
        }
    function getJour(){
            $jourL["Mon"]="Lundi";
            $jourL["Tue"]="Mardi";
            $jourL["Wed"]="Mercredi";
            $jourL["Thu"]="Jeudi";
            $jourL["Fri"]="Vendredi";
            $jourL["Sat"]="Samedi";
            $jourL["Sun"]="Dimanche";
            return $jourL;
        }
    function getMois(){
            $moisL["1"]="Janvier";
            $moisL["2"]="Février";
            $moisL["3"]="Mars";
            $moisL["4"]="Avril";
            $moisL["5"]="Mai";
            $moisL["6"]="Juin";
            $moisL["7"]="Juillet";
            $moisL["8"]="Août";
            $moisL["9"]="Septembre";
            $moisL["10"]="Octobre";
            $moisL["11"]="Novembre";
            $moisL["12"]="Décembre";
            return $moisL;
        }
    function getSalle(){
            $salleL["126"]="B126 ";
            $salleL["141"]="B141 ";
            $salleL["024"]="B024 ";
            $salleL["029"]="B026 ";
            $salleL["003"]="B003 ";
            $salleL["005"]="B005 ";
            $salleL["022"]="B022 ";
            $salleL["028"]="B028 ";
            $salleL["035"]="B035 ";
            $salleL["037"]="B037 ";
            return $salleL;
        }
    function typeCase($match){
        $typeCase = "NUL";
        if(strpos($match,"CM")){
            $typeCase = "CM";
        }
        if(strpos($match,"TD")){
            $typeCase = "TD";
        }
        if(strpos($match,"TP")){
            $typeCase = "TP";
        }
        return $typeCase;
    }
    function getEmplacement($heure,$min,$temps1,$temps2){
        $ret=(2+($heure-8)*4+$min/15)."/".(3+($temps1-8)*4+$temps2/15);
        if((2+($heure-8)*4+$min/15)<0)
            $ret="0/0";
        return "style='grid-row:".$ret.";'";
    }
    
    //function retourne info String
    function getTitre(){
        //affichage mois annee menu sup
        if(isset($_GET["D"])){
            $jD=$_GET["D"]*7+1;
        }
        else{
            $jD=0;
        }
        $jourA=intval(date("d")+$jD);
        $moisA=date("m");
        $anneeA=date("Y");
        $jD=0;
        compressionJM($jourA,$jD,$moisA,$anneeA);
        $moisL=getMois();
        $moisA=intval($moisA);
        return $moisL[$moisA]." ".$anneeA;
    }
    function getGroup(){
        if($_GET["group"]!=null && $_GET["annee"]!=null){
            $group=$_GET["group"];
            $annee=$_GET["annee"];
            return "planning : ".$annee.$group;
        }
        else{
            return "";
        }
    }
    function getSalleLibre(){
        $calendrier = file_get_contents('https://planning.univ-ubs.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?data=8241fc3873200214d31fc22145ae5a6cec380acd54f6ef25e1268055ef30541b9a26113b894fb6da29a910ab7215b887c302758449fbd53d8090dc208afc81e5136669d5d81b5e7ff495e3e8910fd4f00234b9d7b7225c8ea1274940c72ac622ccc019f28c3c7ac7d185f78efad292c1dad50f9fd694f7ca66ac3b5bb16186c9fa4f195065c394d2c620cd00283f4678fe6ab6da2293ad64ccf919b9001e989c65927d16c1d48c75726fb359153126e7d1bb95aa76bef7d8d0227a9394e52778fb6e940cb2d3a56888ba8c04e1d259f061540aba384fd665b32d4d8861081fe4aaa7c6ceb5591f3946551e502748cea27c5ae48e50baec33fa071546b18e95a20708d34c57a1da7a7750cf289ce6252e6bd86c85873e1c03b30d31395117d746e7f559b7bccd65af84d53637f997c2bbc0eedfac82f8d3b4da002bcfa505c0761a787b160c28c9a281387a2f046e602bdd2d76016b33c64a702ee0a972bd97defd66a78bd25745edf6150f206ca035a50f8fe6833571a4dc62da66decc7af531d58d0e49222e3438c9ecd866fc6c483b019a969a850bab1d3e80ce50c697a6cbdfec911fef26aa4301a92bd24b3ff5897adb757bc75e7989f8a8107660e456f83281813fc5508b8931158c3605c92f1b555888d70acd5cc474870aa232b90d7dc5b2f46281e2f62068482f72fa02eaa7722c6408a02313ba269e6232c8774b7ed07358d414703280a2af4afcdcd9ed9be971c9a61f4bd352a65d5e30d44e96a8e65f7b70e4ed7ec1728da241243ca80c473dd584ba796ed8f287e3b203dcea3ec25333f96991f10666eebe4cb3d7b137948aacbf38926fd37f0ddabcb03f08cb128c93bc4fcb6de69584c3bcdb178ee67ee5dd161cc423ab504cdf3c1acef8543cfd5b81b930e6b6cec0db97247709248af069ff1fd12df955944ed43e152021893c651df862915e9dacf760c9a92ce180bab4d2ceceb0fc');
        $regExpMatch = '/SUMMARY:(.*)/';
        $regExpDate = '/DTSTART:(.*)/';
        $regExpLoc = '/LOCATION:(.*)/';
        $regExpDesc = '/DESCRIPTION:(.*)/';
        $regExpStamp = '/DTEND:(.*)/';
        //vairable sale
        $salleL=getSalle();
        // Varaible utile balise
        $br='<br>';
        // Variable info .ics
        $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);
        for ($j=0 ; $j < $n ; ++$j){
            $annee = substr($dateTableau[0][$j], 8, 4);
            $mois = substr($dateTableau[0][$j], 12, 2);
            if(intval($mois)>=4){
                $Hdécalage=2;
            }
            else{
                $Hdécalage=1;
            }
            $jour = substr($dateTableau[0][$j], 14, 2);
            $heure = substr($dateTableau[0][$j], 17, 2)+$Hdécalage;
            $min = substr($dateTableau[0][$j], 19, 2);
            $match = substr($matchTableau[0][$j], 8);
            $loc = substr($locTableau[0][$j], 11);
            $desc = substr($descTableau[0][$j], 12);
            $temps1 = substr($StampTableau[0][$j], 15, 2)+$Hdécalage;
            $temps2 = substr($StampTableau[0][$j], 17, 2);
            if($heure<=date("G") && $min<=date("i") && $temps1>=date("G") && $temps2>=date("i") && $jour==date("d") && $mois==date("m")){
                $salleL[substr($loc,2,3)]="";
            }
        }
        return implode("",$salleL);
    }

    //function principale
    function testDataPost(){
        if(isset($_GET["group"])){
            $group=$_GET["group"];
        }
        else{
            $group="";
        }
        if(isset($_GET["annee"])){
            $annee=$_GET["annee"];
        }
        else{
            $annee="";
        }
        $promo=$annee.$group;
        if($promo==""){
            if($_COOKIE["planning"]!="annee=&group=" && $_COOKIE["planning"]!=null){
                echo "<meta http-equiv='refresh' content='0; URL=./?".$_COOKIE["planning"]."'>";
                exit();
            }
                else{
                echo "<meta http-equiv='refresh' content='0; URL=./?annee=1&group=A1'>";
                exit();
            }
        }
    }
    function affichage(){
        // si aucune info GET: sortir
        if(isset($_GET["group"])){
            $group=$_GET["group"];
        }
        else{
            $group="";
        }
        if(isset($_GET["annee"])){
            $annee=$_GET["annee"];
        }
        else{
            $annee="";
        }
        $promo=$annee.$group;
        // récupère jD
        if(isset($_GET["D"])){
            $jD=$_GET["D"]*7;
        }
        else{
            $jD=0;
        }
        if($jD<0){
            $jD=$jD+1;
        }
        
        // Variable récuperer méthode GET
        $Dcontenu =array("vide","vide","vide","vide","vide","vide","vide");
        //date du jour
        $jourTT=(date("d")+$jD);
        $moisTT=date("m");
        $année=date("Y");
        $calendrier = getcalendar($promo);
        // décalge pour afficher à partir du lundi.
        $jDL=date("N")-1;
        if($jDL>4){
            $jDL=7-$jDL+$jD;
        }
        else{
            $jDL=$jDL*(-1);
        }
        compressionJM($jourTT,$jDL,$moisTT,$annee);
        $tt=$jDL;
        $jDL=0;
        compressionJM($jourTT,$jDL,$moisTT,$annee);
        
        // Variable type info .ics
        $regExpMatch = '/SUMMARY:(.*)/';
        $regExpDate = '/DTSTART:(.*)/';
        $regExpLoc = '/LOCATION:(.*)/';
        $regExpDesc = '/DESCRIPTION:(.*)/';
        $regExpStamp = '/DTEND:(.*)/';
        // Varaible utile balise
        $br='<br>';
        // Variable info .ics
        $n = preg_match_all($regExpMatch, $calendrier, $matchTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpDate, $calendrier, $dateTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpLoc, $calendrier, $locTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpDesc, $calendrier, $descTableau, PREG_PATTERN_ORDER);
        preg_match_all($regExpStamp, $calendrier, $StampTableau, PREG_PATTERN_ORDER);
        
        $jourL=getJour();
        $moisL=getMois();
        
        $tt=$jourTT;
        
        for($d=0 ; $d < 7; ++$d){
            // compression jour/mois
            compressionJM($tt,$d,$moisTT,$annee);
            if(intval($moisTT)>=4){
                $Hdécalage=2;
            }
            else{
                $Hdécalage=1;
            }
            for ($j=0 ; $j < $n ; ++$j){
                $pos = "p".$d.$j;
                $div1='<div class=$pos id="box">';
                // Récupération des données
                $annee = substr($dateTableau[0][$j], 8, 4);
                $mois = substr($dateTableau[0][$j], 12, 2);
                $jour = substr($dateTableau[0][$j], 14, 2);
                $heure = substr($dateTableau[0][$j], 17, 2)+$Hdécalage;
                $min = substr($dateTableau[0][$j], 19, 2);
                $match = substr($matchTableau[0][$j], 8);
                $loc = substr($locTableau[0][$j], 11);
                $desc = substr($descTableau[0][$j], 12);
                $temps1 = substr($StampTableau[0][$j], 15, 2)+$Hdécalage;
                $temps2 = substr($StampTableau[0][$j], 17, 2);
                $descTab = explode("\\n",$desc);
                // Mise en forme
                $date = $jour."/".$mois."/".$annee;
                $date2 = ($tt+$d)."/".$moisTT."/".$annee;
                $horaire = " ".$heure."h".$min."-".$temps1."h".$temps2;
                $hor = $heure."-".$min;
                //horaire 1h30
                $c=horaire($hor,$temps2);
                //couleur case
                $typeCase = typeCase($match);
                //affichage cours
                if($annee==$année){
                    if(($jour==$tt+$d && $mois==$moisTT)){
                        //si jour vide (ne pas afficher sur portable)
                        if($jour==$tt+$d){
                            $Dcontenu[$d] = "";
                        }
                        echo "<div id='boxP' class='p".$d." c".$c." ".$typeCase." nonePC' style='order: ".($d+1)."0".($c+1).";grid-column: 1;'>";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>";   
                    }
                    if(($jour==$tt+$d && $mois==$moisTT)&&($d<5)){
                        //si jour vide (ne pas afficher sur portable)
                        if($jour==$tt+$d){
                            $Dcontenu[$d] = "";
                        }
                        $emp=getEmplacement($heure,$min,$temps1,$temps2);
                        echo "<div id='box' class='p".$d." ".$typeCase." noneP'".$emp.">";
                        echo $match.$br.$horaire."  ".$loc.$br;
                        echo $descTab[2];
                        echo "</div>"; 
                    }
                }
            }
            $timestamp = mktime(0, 0, 0, $moisTT, ($tt+$d), $annee);
            $jourC = date('D', $timestamp);
            $moisG = date('m', $timestamp);
            $moisG=intval($moisG);
            echo "<div class='p".$d." c-1 ".$Dcontenu[$d]." nonePC' style='order: ".($d+1)."00000;grid-column: 1; '>".$jourL[$jourC].' '.($tt+$d).' '.$moisL[$moisG]."</div>";
            if($d<5){
                echo "<div class='p".$d." c-1 ".$Dcontenu[$d]." noneP'>".$jourL[$jourC].' '.($tt+$d).' '.$moisL[$moisG]."</div>";
            }
        }
    } 
?>