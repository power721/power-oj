<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>OnlineJudge F.A.Q</title>
<link href="<?php echo base_url() ?>misc/css/faq.css" rel="stylesheet" type="text/css" />
<link type='text/css' rel='stylesheet' href='<?php echo base_url() ?>misc/js/dp.SyntaxHighlighter/Styles/SyntaxHighlighter.css'/>
    <script src='<?php echo base_url() ?>misc/js/dp.SyntaxHighlighter/Scripts/shCore.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>misc/js/dp.SyntaxHighlighter/Scripts/shBrushCpp.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>misc/js/dp.SyntaxHighlighter/Scripts/shBrushJava.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>misc/js/dp.SyntaxHighlighter/Scripts/shBrushDelphi.js' type='text/javascript'></script>
    <script src='<?php echo base_url() ?>misc/js/dp.SyntaxHighlighter/Scripts/shBrushXml.js' type='text/javascript'></script>
    <script language='javascript' type='text/javascript'>
    function getCode(name,css)
    {
        document.getElementById(name).className = css;
        dp.SyntaxHighlighter.ClipboardSwf = 'dp.SyntaxHighlighter/Scripts/clipboard.swf';   
        dp.SyntaxHighlighter.HighlightAll(name);        
    }
    </script>
</head>
﻿<body>
<div align="center" class="page">
<div class="bg">
 <div class="box">
<div class="faq">
	<div class="faq_title"><img width="32px" height="32px" src="<?php echo base_url() ?>misc/image/search.gif" /><b> Frequently Asked Questions</b></div>
	<div class="faq_content"><br /><br />
<a name=io></a>
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：我的程序要在哪里输入和输出数据？</div>
<font color="green"><b>A</b></font>：你的程序必须从stdin（基本输入）读入数据并且从stdout（基本输出）输出数据. 例如，你使用C语言的话，使用scanf输入数据，使用printf输出数据，使用C++语言的话，还可以使用cin和cout读入输出数据。<br />
<!--请注意，你不能进行任何文件的读写操作，否则会返回错误&quot;<font color=#b8860b>Runtime Error</font>&quot;或者&quot;<font color=#b8860b>Wrong Answer</font>&quot;。-->
读写创建文件及调用其它程序等操作将会被系统忽略。
<br /><br /huoz>
<a name=gcc></a>
<hr />
<!--
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：评测服务器的性能怎样？</div>
<font color="green"><b>A</b></font>：正常情况下，在我们OJ的1000题上使用GNU C++编译器提交以下代码，评测结果为使用时间接近1秒。<br />
<div class="data">#include&lt;stdio.h&gt;
int main()
{
    int a,b,i;
    while(scanf("%d%d",&a,&b)!=EOF)
        printf("%d\n",a+b);
    for(i=0;i&lt;450000000;++i) ++a;
    return 0;
}</div>
<br />
<hr />
-->
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：本OnlineJudge提供哪些编译器？编译环境是怎么样的？</div>
<font color="green"><b>A</b></font>：本OJ目前提供GNU C/C++、Free Pascal、Java等编译器，它们的编译参数是：<br />
G++:<font color=blue>g++.exe -fno-asm -s -w -O1 -DONLINE_JUDGE -o %PATH%%NAME% %PATH%%NAME%.%EXT%</font><br />
GCC:<font color=blue>gcc.exe -fno-asm -s -w -O1 -DONLINE_JUDGE -o %PATH%%NAME% %PATH%%NAME%.%EXT%</font><br />
Pascal:<font color=blue>fpc.exe -Sg -dONLINE_JUDGE %PATH%%NAME%.%EXT%</font><br />
Java:<font color=blue>Java.bat %PATH%</font><br />
Masm32:<font color=blue>masm32.bat %PATH% %NAME% %EXT%</font><br />
<!--
GNU C: <font color=blue>gcc Main.c -o Main.exe -ansi -fno-asm -w -lm --static -DONLINE_JUDGE</font><br />
C++: <font color=blue>g++ Main.cpp -o Main.exe -ansi -fno-asm -w -lm --static -DONLINE_JUDGE</font><br />
Free Pascal(FPC): <font color=blue>fpc Main.pas -oMain.exe -Co -Cr -Ct -Ci -dONLINE_JUDGE</font><br />
Java: <font color=blue>javac -J-Duser.language=en Main.java</font><br />
-->
<br />
我们的服务器运行在Windows NT平台下，提供的编译器的版本分别是：<br>
<li>Gcc/G++ Version 3.4.2 (mingw special)</li>
<li>FFree Pascal Compiler version 1.0.10 [2003/06/27] for i386</li>
<li>Java SDK Version 1.6.0_22</li>
<br /><br />
<a name=ce></a>
<hr />
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：为什么我得到了CE？而在我的电脑上运行的很好？</div>
<font color="green"><b>A</b></font>：不同的编译器之间有一些语法的差异，请使用相应的编译器进行提交。<br />
另外，我们的OJ对编译器所使用的资源有所限制，限制是：CPU时间5秒，内存使用128MB，如果你使用的编译器在编译你的程序时超过这个资源限制，将被判为CE。当你使用G++、GCC时main()函数返回值必须是int，否则你可能会得到CE。
<br /><br />
<a name=sj></a>
<hr />
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：有些题目上面有“Special Judge”是什么意思？</div>
<font color="green"><b>A</b></font>：Special Judge是指本题可能有多个正确的解。你的程序的答案将被一个SPJ的检测程序检测，以判断你的程序是否正确。</br>
请注意：SPJ的题目一般不会判出PE，所以请确保你的程序输出格式正确。
<br /><br />
<a name=int64></a>
<hr />
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：我要怎么使用64-bit整形？</div>
<font color="green"><b>A</b></font>：在C/C++和Pascal语言中，你可以用以下方法使用64-bit整形：
<ul>
<li>
有符号64-bit整形，取值范围为：-9223372036854775808 到 9223372036854775807。
	<center><table border=1 style="width:650px;">
	<tr align=center>
		<td>语言</td>
		<td>GCC/G++</td>
		<td>Pascal</td>
		<td>VC/VC++</td>
	</tr>
	<tr align=center>
		<td>类型名称</td>
		<td>long long</td>
		<td>int64</td>
		<td>__int64<br />long long</td>
	</tr>
	<tr align=center>
		<td>输入方法</td>
		<td>scanf("%I64d", &amp;x);<br />cin >> x;</td>
		<td>read(x);</td>
		<td>scanf("%I64d", &amp;x);<br />cin >> x;</td>
	</tr>
	<tr align=center>
		<td>输出方法</td>
		<td>printf("%I64d", x);<br />cout &lt;&lt; x;</td>
		<td>write(x);</td>
		<td>printf("%I64d", x);<br />cout &lt;&lt; x;</td>
	</tr>
	</table></center>
</li>
<li>
无符号64-bit整形，取值范围为：0 到 18446744073709551615。
	<center><table border=1 style="width:650px;">
	<tr align=center>
		<td>语言</td>
		<td>GCC/G++</td>
		<td>Pascal</td>
		<td>VC/VC++</td>
	</tr>
	<tr align=center>
		<td>类型名称</td>
		<td>unsigned long long</td>
		<td>qword</td>
		<td>unsigned __int64<br />unsigned long long</td>
	</tr>
	<tr align=center>
		<td>输入方法</td>
		<td>scanf("%I64u", &x);<br />cin >> x;</td>
		<td>read(x);</td>
		<td>scanf("%I64u", &x);<br />cin >> x;</td>
	</tr>
	<tr align=center>
		<td>输出方法</td>
		<td>printf("%I64u", x);<br />cout &lt;&lt; x;</td>
		<td>write(x);</td>
		<td>printf("%I64u", x);<br />cout &lt;&lt; x;</td>
	</tr>
	</table></center>
</li>
</ul>
<br />
<a name=r></a>
<hr />
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：OJ返回的结果分别是什么意思？</div>
<font color="green"><b>A</b></font>：以下是OJ可能返回的结果和其意义：<br />
<br /><center><table border=1 style="width:800px;">
<tr><td width="17%"><font color=red>Accepted</font></td><td style="text-align:left">OK! 你的程序是正确的。</td></tr>
<tr><td><font color=#ff03fa>Presentation Error</font></td><td style="text-align:left">你的输出结果是正确的，但格式不正确，可能是你多输出或少输出了空格、Tab(\t)、换行(\n)等，请检查你的程序输出。</td></tr>
<tr><td><font color=1aae00>Wrong Answer</font></td><td style="text-align:left">你的程序输出的结果不正确。</td></tr>
<tr><td><font color=#ff9900>Time Limit Exceed</font></td><td style="text-align:left">你的程序尝试使用超过题目限制的时间，可能是你的程序内存在死循环或者你的程序的算法效率太低。</td></tr>
<tr><td><font color=#0692ff>Memory Limit Exceed</font></td><td style="text-align:left">你的程序尝试使用超过题目限制的内存。</td></tr>
<tr><td><font color=#bb338f>Runtime Error</font></td><td style="text-align:left">你的程序发生了运行时错误。可能是由于除于0、内存访问违规等运行时问题。</td></tr>
<tr><td><font color=#1e9e00>Compile Error</font></td><td style="text-align:left">你的程序不能通过编译，请点击该结果可以查看编译器提示。</td></tr>
<tr><td><font color=#999999>Output Limit Exceed</font></td><td style="text-align:left">你的程序的输出超过了系统限制。请检查你的程序是否存在死循环问题。目前系统的限制是8MB。</td></tr>
<tr>
  <td><font color=#ff3030><b>Waiting</b></font></td>
  <td style="text-align:left">你的程序正在评测当中，请稍候。</td></tr>
<tr><td><font color=green>Queuing</font></td><td style="text-align:left">OJ正在评测其它用户的提交，请你稍等片刻。</td></tr>
<tr><td><font color=black>System Error</font></td>
<td style="text-align:left">未知错误，如果有该评测结果，请及时联系管理员。</td>
</tr>
</table></center>
注意：对于Java语言，有极少部分可能将RFC与RE判成WA。
<br /><br />
<a name=key></a>
<hr />
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：我提交代码时能使用快捷键吗？</div>
<font color="green"><b>A</b></font>：
下面是提交页面的快捷键:
</br>
ALT+S    :提交
</br>
ALT+U    :用户名（未登陆时）
</br>
ALT+L    :语言选项
</br>
ALT+P    :问题编号
<br /><br />
<hr />
<a name=1000></a>
<div class="faq_content_Q"><font color="#FF8040"><b>Q</b></font>：1000题怎么解答？</div>
<font color="green"><b>A</b></font>：以下是1000题的各种语言的参考程序：<br />
C++语言:<br /><div class="data">
<textarea align='left' id='code' name='code' class='cpp' style='width: 600px;'>
#include &lt;iostream&gt;
using namespace std;
int main()
{
  int a,b;
  while(cin&gt;&gt;a&gt;&gt;b) 
	cout&lt;&lt;a+b&lt;&lt;endl;
  return 0;
}
</textarea>
</div>
C语言：<br /><div class="data">
<textarea align='left' id='code' name='code' class='c' style='width: 600px;'>
#include &lt;stdio.h&gt;
int main()
{
  int a,b;
  while(scanf("%d%d",&a,&b)!=EOF) 
    printf("%d\n",a+b);
  return 0;
}
</textarea>
</div>
PASCAL语言：<div class="data">
<textarea align='left' id='code' name='code' class='Delphi' style='width: 600px;'>
var
  a,b:integer;
begin
  while not eof do begin
    readln(a,b);
    writeln(a+b);
  end;
end.
</textarea>
</div>
Java语言：<div class="data">
<textarea align='left' id='code' name='code' class='java' style='width: 600px;'>
import java.io.*;
import java.util.*;
public class Main
{
	public static void main(String[] args)
	{
		Scanner cin = new Scanner(new BufferedInputStream(System.in));
		int a,b;
		while(cin.hasNext())
		{
			a = cin.nextInt();
			b = cin.nextInt();
			System.out.println(a+b);
		}
	}
}
</textarea>
</div>
<br />
</div>
</div>
</div>
</div><!-- bg -->
</div><!-- center -->
<script language='javascript' type='text/javascript'>dp.SyntaxHighlighter.HighlightAll('code');</script>
</body>
</html>
