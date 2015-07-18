WebUtil
==========

Perform basic HTTP requests to make your server do things. You can use utilities from your server in your web browser!

This is good if you want to write custom calls to HTTP for your system. I recommend protecting this with HTTP authentication.

## Security
Basic measures have been taken within the code to save you some security headaches against things like XSS and invalid filtering on command arguments. 
However, this is an experimental project and should not be used in production environments for security concerns. At the very least add HTTP Auth and SSL so this sensitive data is encrypted in-transit.

## Installation
* Ensure you have nginx installed with PHP functioning

*  speedtest-cli installed

*  command for the necessary call you wish to use has to be installed

```
$ git clone https://github.com/dustyfresh/HTTP-Linux.git; cd HTTP-Linnux && mv -v /etc/nginx/sites-enabled/default ~/default.bak
$ mv -v ./* /var/www/html/
$ ln -s /var/www/html/.config/default /etc/nginx/sites-enabled/default && /etc/init.d/nginx reload
```

## Demo
![alt tag](http://i.imgur.com/MWLjZ9o.gif)

## Methods

```
https://endpoint.tld/curl/{host} - curl a host
https://endpoint.tld/host/{domain} - run host on a domain name
https://endpoint.tld/ping/{host} - perform a ping from the server to a host of your choosing
https://endpoint.tld/whois/{domain or IP} - whois command
https://endpoint.tld/mtr/{host} - check the route with MTR (like traceroute but prettier)
https://endpoint.tld/speedtest - run a speed-test check from the server running WebUtil
https://endpoint.tld/etc/resolv.conf - returns the contents of /etc/resolv.conf
https://endpoint.tld/etc/hosts - returns the contents of /etc/hosts
https://endpoint.tld/proc/cpuinfo - returns the contents of /proc/cpuinfo
https://endpoint.tld/proc/meminfo - returns the contents of /proc/meminfo
https://endpoint.tld/proc/modules - returns the contents of /proc/modules
https://endpoint.tld/vmstat - prints vmstat output
https://endpoint.tld/top - displays top snapshot
https://endpoint.tld/ps - fetches the output of the ps command
https://endpoint.tld/uptime - displays server uptime
https://endpoint.tld/lsof - pulls a list of open files in the system
https://endpoint.tld/dmesg - displays dmesg output
https://endpoint.tld/netstat - issues the netstat command
https://endpoint.tld/ifconfig - displays ifconfig information
https://endpoint.tld/df - shows disk layout
https://endpoint.tld/last - list of users and their previous login times and history
https://endpoint.tld/w - display current logged-in users
https://endpoint.tld/etc/init.d/{service_name}/{service_action}
https://endpoint.tld/uname - prints uname output
```
