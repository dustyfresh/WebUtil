HTTP-Linux
==========

Perform basic HTTP requests to make your server do things. You can use utilities from your server in your web browser!

This is good if you want to write custom calls to HTTP for your system. I recommend protecting this with HTTP authentication.

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
![alt tag](http://i.imgur.com/mllKc76.gif)

## Methods

```
http://endpoint.tld/curl/{host} - curl a host
http://endpoint.tld/dig/{domain} - run dig on a domain name
http://endpoint.tld/ping/{host} - perform a ping from the server to a host of your choosing
http://endpoint.tld/whois/{domain or IP} - whois command
http://endpoint.tld/mtr/{host} - check the route with MTR (like traceroute but prettier)
http://endpoint.tld/speedtest - run a speed-test check on 
http://endpoint.tld/etc/resolv.conf - returns the contents of /etc/resolv.conf
http://endpoint.tld/etc/hosts - returns the contents of /etc/hosts
http://endpoint.tld/proc/cpuinfo - returns the contents of /proc/cpuinfo
http://endpoint.tld/proc/meminfo - returns the contents of /proc/meminfo
http://endpoint.tld/proc/modules - returns the contents of /proc/modules
http://endpoint.tld/vmstat - prints vmstat output
http://endpoint.tld/top - displays top snapshot
http://endpoint.tld/ps - fetches the output of the ps command
http://endpoint.tld/uptime - displays server uptime
http://endpoint.tld/lsof - pulls a list of open files in the system
http://endpoint.tld/dmesg - displays dmesg output
http://endpoint.tld/netstat - issues the netstat command
http://endpoint.tld/ifconfig - displays ifconfig information
http://endpoint.tld/df - shows disk layout
http://endpoint.tld/last - list of users and their previous login times and history
http://endpoint.tld/w - display current logged-in users
```
