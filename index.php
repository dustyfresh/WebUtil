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
	$data = "<pre>" . shell_exec("dig any ".escapeshellarg($dighost)) . "</pre>";
	$app->etag(md5($data));
	print $data;
});

$app->get('/ping/:pinghost', function ($pinghost) {
	$app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("ping -c4  ".escapeshellarg($pinghost)) . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/whois/:whoishost', function ($whoishost) {
	$app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("whois  ".escapeshellarg($whoishost)) . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/mtr/:mtrhost', function ($mtrhost) {
	$app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("mtr --report -c 30  ".escapeshellarg($mtrhost)) . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/speedtest', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("speedtest") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/etc/resolv.conf', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("cat /etc/resolv.conf") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/etc/hosts', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("cat /etc/hosts") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/proc/cpuinfo', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("cat /proc/cpuinfo") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/proc/meminfo', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("cat /proc/cpuinfo") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/proc/modules', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("cat /proc/modules") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/vmstat', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("vmstat -Sm") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/top', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("top -n1 -b") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/ps', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("ps faux") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/uptime', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("uptime") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/lsof', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("lsof") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/dmesg', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("dmesg") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/netstat', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("netstat -natp") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/ifconfig', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("ifconfig") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/df', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("df -hT") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/last', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>" . shell_exec("last") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->get('/w', function () {
        $app = \Slim\Slim::getInstance();
        $data = "<pre>>" . shell_exec("w") . "</pre>";
        $app->etag(md5($data));
	print $data;
});

$app->run();

?>
