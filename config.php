<?php
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//======= 𝓣𝓞𝓚𝓔𝓝 =========
$API_KEY = "sidepath"; //Token
$sudo = ["523853682", ""]; //Id Adadi Admins
$channel = "sidepath";
$channel2 = "sidepath_gp"; 
$channel3 = "sidepathstore"; 
$botusername = '@golabinumbot';//user bot ba @
$kanal="@sidepath"; //kanal ba @
$poshtibani="@meysam_s71"; //poshtibani ba @
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//======= 𝓓𝓔𝓣𝓐 𝓑𝓐𝓢𝓔 =========
$username = "sidepath_meysam"; // database username MySql
$password = "sidepath"; // database password MySql
$dbname = "sidepath"; // database name MySql
$db = new mysqli('localhost', $username , $password , $dbname );
$db->set_charset("utf8mb4");

//======= 𝓣𝓐𝓑𝓛𝓔 𝓢𝓠𝓛 =========
if ($db->query("SELECT * FROM `user`") == false) {
   mysqli_query($db, "CREATE TABLE `user` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `step` VARCHAR(20),
  `token` VARCHAR(200) ,
  `link` VARCHAR(200)
  ) default charset = utf8mb4;
    ");
}
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
if ($db->query("SELECT * FROM `sendall`") == false) {
    mysqli_query($db, "CREATE TABLE `sendall` (
  `step` varchar(20) DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `chat` varchar(100) DEFAULT NULL,
  `user` int DEFAULT '0'
  )"
    );
	$db->query("INSERT INTO `sendall` () VALUES ()");
}

$db->query('CREATE TABLE spam (
id INT(50) PRIMARY KEY ,
block VARCHAR(10) CHARACTER SET utf8mb4,
spam INT(50) ,
timee INT(50)
)');

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/





