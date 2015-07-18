<?php
set_time_limit(0);

if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "bot")){
	header("HTTP/1.0 404 Not Found");
        die("Sorry, no bots allowed to the party :(");
}

if(empty($_SERVER['HTTPS'])){
        print "<h2><mark style='background-color: #FF8080;'><strong>You are not using SSL</strong></mark></h2>";
}

require 'vendor/autoload.php';
$app = new \Slim\Slim();

$app->notFound(function () use ($app) {
	header("HTTP/1.0 404 Not Found");
	print "404";
});

$app->get('/curl/:curlhost', function ($curlhost) {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("curl -A 'WebUtil' -Iv ".escapeshellarg($curlhost));
	$app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/dig/:dighost', function ($dighost) {
	$app = \Slim\Slim::getInstance();
	$data = shell_exec("dig any ".escapeshellarg($dighost));
	$app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/ping/:pinghost', function ($pinghost) {
	$app = \Slim\Slim::getInstance();
        $data = shell_exec("ping -c4  ".escapeshellarg($pinghost));
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/whois/:whoishost', function ($whoishost) {
	$app = \Slim\Slim::getInstance();
        $data = shell_exec("whois  ".escapeshellarg($whoishost));
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/mtr/:mtrhost', function ($mtrhost) {
	$app = \Slim\Slim::getInstance();
        $data = shell_exec("mtr --report -c 30  ".escapeshellarg($mtrhost));
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/speedtest', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("speedtest");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/etc/resolv.conf', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /etc/resolv.conf");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/etc/hosts', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /etc/hosts");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/proc/cpuinfo', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /proc/cpuinfo");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/proc/meminfo', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /proc/cpuinfo");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/proc/modules', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("cat /proc/modules");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/vmstat', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("vmstat -Sm");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/top', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("top -n1 -b");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/ps', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("ps faux");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/uptime', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("uptime");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/lsof', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("lsof");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/dmesg', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("dmesg");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/netstat', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("netstat -natp");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/ifconfig', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("ifconfig");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/df', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("df -hT");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/last', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("last");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->get('/w', function () {
        $app = \Slim\Slim::getInstance();
        $data = shell_exec("w");
        $app->etag(md5($data));
        print "<pre>" . filter_var($data, FILTER_SANITIZE_STRING) . "</pre>";
});

$app->run();

?>
