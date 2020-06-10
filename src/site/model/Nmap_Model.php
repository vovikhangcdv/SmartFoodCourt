<?php
// if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

/**
 * @func: checkipformat
 * @param: string ip
 * @desc: Check if the variable $ip is a valid IP address
 * @return: boolean
 */
function checkipformat($ip) {
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        return true;
    }
    return false;
}
/**
 * @func: nmap_parser
 * @param: the out put of : nmap -sV -oG - $ip
 * @desc: parser to text
 * @return: false if not found or array(id,port,state,protocol,owner,service,rpc_info,version)
 */
function nmap_parser($text) {
    if (!preg_match("/Ports: (.+)\t/s", $text, $matches)) return false;
    $matches = explode(", ", $matches[1]);
    // print_r($matches);
    for ($i = 0;$i < count($matches);$i++) {
        $output[$i] = explode("/", $matches[$i]);
        unset($output[$i][7]);
    }
    return $output;
}
/**
 * @func: nmap_scan
 * @param string: ip adress
 * @desc: scan ip with nmap
 * @return: return array output of nmap
 */
function nmap_scan($ip) {
    if (!checkipformat($ip)) return false;
    exec("nmap -sV -oG - " . $ip, $output);
    $output = implode("\n", $output);
    return nmap_parser($output);
}
// $text ="nmap -sV -oG - 74.125.24.138
// # Nmap 7.80 scan initiated Sun Mar  8 12:12:02 2020 as: nmap -sV -oG - 74.125.24.138
// Host: 74.125.24.138 ()	Status: Up
// Host: 74.125.24.138 ()	Ports: 80/open/tcp//http//gws/, 443/open/tcp//ssl|https//gws/	Ignored State: filtered (998)
// # Nmap done at Sun Mar  8 12:13:31 2020 -- 1 IP address (1 host up) scanned in 88.38 seconds";
// var_dump(nmap_scan('74.125.24.138'));
