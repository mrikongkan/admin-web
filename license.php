<?php
    include 'voltas/config.php';

    $result = [
    	'success' => false,
    	'message' => "Your license key is expired",
    	'leftDays' => 0,
    	'tokens' => null,
    	'appVersion' => null,
    	'ipList' => null,
    	'ShortMessage' => null,
    	'News' => null,
    	'KeyType' => null,
    	'PaidStatus' => null,
    ];
    $user_name =  $_REQUEST['userName'];
    $query = "SELECT sn, user_id, mac, expiry_date FROM `u241746118_voltas`.`details` WHERE `user_id` = '$user_name'";
    $stmnt = $conn->prepare($query);
   // $stmnt->bindParam('$user_name', $_REQUEST['userName']);
    $stmnt->execute();
    $count = $stmnt->rowCount();
    //$user = $stmnt->fetch(PDO::FETCH_ASSOC);
    // print_r($user);
    if ($count > 0) {
        $user = $stmnt->fetch(PDO::FETCH_ASSOC);
        print_r($user);
        $user_id = $user['sn'];
      // print_r( $user_id );
        $today = date('Y-m-d H:i:s');
        if (empty($user["mac"]) || $user["mac"] == "not_registered") {
            $mac = $_REQUEST['macAddress'];
            $query = "UPDATE `u241746118_voltas`.`details` SET `mac` = '$mac' WHERE `sn` = '$user_id'";
            $stmnt = $conn->prepare($query);
            //$stmnt->bindParam('$mac', $_REQUEST['macAddress']);
            //$stmnt->bindParam('$user_id', $user['sn']);
            $stmnt->execute();
        } else if (($user["mac"] != $_REQUEST['macAddress']) || ($user['expiry_date'] < $today)) {
            exit(json_encode($result));
        }
        
        $expireDateTime = new DateTime($user['expiry_date']);
        $todayDateTime = new DateTime($today);
        // $expiredate = strtotime($expireDateTime);
        // $todaydate = strtotime($todayDateTime);
        $interval = ($todayDateTime->diff($expireDateTime)); //ceil(($expiredate - $todaydate) / 60 / 60 / 24);

        $result = [
        	'success' => true,
        	'leftDays' => intval($interval->format('%a')),
        	'tokens' => null,
        	'appVersion' => '1.0.2.71',
        	'ipList' => null,
        	'ShortMessage' => "Dear User :- Google Chrome Latest Version ( 90 ) Install Kar Len@@@ DEAR USER AGAR KISI KA RECAPCHA 9.57, 10.57 TAK OPEN NEHI HOTA HE TO TUM LOG MENUAL RECAPCHA PAR CLICK KAR LE@by Voltas grup@",
        	'News' => null,
        	'KeyType' => "monthly",
        	'PaidStatus' => "Paid",
        ];
    }

echo json_encode($result);