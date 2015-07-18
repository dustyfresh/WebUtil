<?php
set_time_limit(0);

if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "bot")){
	header("HTTP/1.0 404 Not Found");
        print "Sorry, no bots allowed to the party :(";
        die();
}

require 'vendor/autoload.php';
$app = new \Slim\Slim();

$app->notFound(function () use ($app) {
	header("HTTP/1.0 404 Not Found");
	print "404";
});

$app->get('/curl/:curlhost', function ($curlhost) {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("curl -Iv ".escapeshellarg(htmlentities($curlhost))) . "</pre>";
	$app->etag(md5($data));
	print $data;
});

$app->get('/dig/:dighost', function ($dighost) {
	$app = \Slim\Slim::getInstance();
	$data = shell_exec("dig any ".escapeshellarg($dighost));
	print "<pre>" . $data . "</pre>";
});

$app->get('/ping/:pinghost', function ($pinghost) {
	$app = \Slim\Slim::getInstance();
        $data = shell_exec("ping -c4  ".escapeshellarg($pinghost));
        print "<pre>" . $data . "</pre>";
});

$app->get('/whois/:whoishost', function ($whoishost) {
	$app = \Slim\Slim::getInstance();
        $data = shell_exec("whois  ".escapeshellarg($whoishost));
        print "<pre>" . $data . "</pre>";
});

$app->get('/mtr/:mtrhost', function ($mtrhost) {
	$app = \Slim\Slim::getInstance();
        $data = shell_exec("mtr --report -c 30  ".escapeshellarg($mtrhost));
        print "<pre>" . $data . "</pre>";
});

$app->get('/speedtest', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("speedtest");
        print "<pre>" . $data . "</pre>";
});

$app->get('/etc/resolv.conf', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /etc/resolv.conf");
        print "<pre>" . $data . "</pre>";
});

$app->get('/etc/hosts', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /etc/hosts");
        print "<pre>" . $data . "</pre>";
});

$app->get('/proc/cpuinfo', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /proc/cpuinfo");
        print "<pre>" . $data . "</pre>";
});

$app->get('/proc/meminfo', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /proc/cpuinfo");
        print "<pre>" . $data . "</pre>";
});

$app->get('/proc/modules', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /proc/modules");
        print "<pre>" . $data . "</pre>";
});

$app->get('/vmstat', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("vmstat -Sm");
        print "<pre>" . $data . "</pre>";
});

$app->get('/top', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("top -n1 -b");
        print "<pre>" . $data . "</pre>";
});

$app->get('/ps', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("ps faux");
        print "<pre>" . $data . "</pre>";
});

$app->get('/uptime', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("uptime");
        print "<pre>" . $data . "</pre>";
});

$app->get('/lsof', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("lsof");
        print "<pre>" . $data . "</pre>";
});

$app->get('/dmesg', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("dmesg");
        print "<pre>" . $data . "</pre>";
});

$app->get('/netstat', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("netstat -natp");
        print "<pre>" . $data . "</pre>";
});

$app->get('/ifconfig', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("ifconfig");
        print "<pre>" . $data . "</pre>";
});

$app->get('/df', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("df -hT");
        print "<pre>" . $data . "</pre>";
});

$app->get('/last', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("last");
        print "<pre>" . $data . "</pre>";
});

$app->get('/w', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("w");
        print "<pre>" . $data . "</pre>";
});

$app->run();

?>
