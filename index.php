<html>
<head>
<title>
WEB WHITE BOARD by OLA STEPHEN
</title>
<style>
.colorbox {width:100%;}
.color {width:40px; height:40px;float:left;border:black 1px solid;}
.color:hover {width:40px; height:40px;float:left;border:white 1px solid;}
</style>
<script src="jquery.js"></script>

</head>
<body style="margin:0px;overflow:scroll;width:100%;" contenteditable='false' onresize="bsize()" onload="bsize()">

<div id='content' style="width:800px;height:400px;">

<div style="width:800px;height:400px; overflow:none; z-index:400; " id='cdiv'>
<canvas id="myCanvas" class="myCanvas" width="800" height="800" style='border:red 0px dotted; cursor:;
background:;' onclick="pin();"  ondblclick="/*movein=0;*/ liner();">nnn</canvas>
</div>

<div style="width:800px;height:400px; overflow:none;  z-index:-2000; position:fixed;top:0px; opacity:1;" id='cdiv2'>
<canvas id="myCanvas2" class="myCanvas2" width="720" height="390" style='border:red 0px dotted;cursor:crosshair;
background:;' onclick="pin();" >nnn</canvas>
</div>

</div>
<div id="toolbox" style="position:fixed; bottom:0px; background:grey; width:100%;">

<b>Size</b>
<input type="number" onchange="s=this.value;" onmouseout="s=this.value;" value="1" size="1">
<select>
<option onclick="s=this.innerHTML;">1</option>
<option onclick="s=this.innerHTML;">5</option>
<option onclick="s=this.innerHTML;">10</option>
<option onclick="s=this.innerHTML;">20</option>
<option onclick="s=this.innerHTML;">40</option>
<option onclick="s=this.innerHTML;">60</option>
<option onclick="s=this.innerHTML;">80</option>
<option onclick="s=this.innerHTML;">100</option>
<option onclick="s=this.innerHTML;">200</option>

</select>

<div  class="colorbox">
<center>
<div style="background:pink;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:orange;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:blue;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:white;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:red;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:lime;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:black;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:yellow;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:green;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:purple;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:brown;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:grey;" class="color" onclick="v=this.style.backgroundColor;"> </div>
<div style="background:maroon;" class="color" onclick="v=this.style.backgroundColor;"> </div>
</center>

</div>
<div id='coor' style='font-size:small; display:none;'>

</div>
<!--
<img src="" id="result" width="20px" style="position:fixed; top:0px;right:0px; border:red 1px black" />
-->

<div id='Tools'><button onclick="movein=1;">Pan</button> <button  onclick="movein=0;">Draw</button><button onclick="clearb();clear_b()">Clear Board</button>
<input type='text' value='0' id='maxnum'>
<div class="out">
</div>
</div>


<div id='track' style="width:10px; height:10px; border:1px dotted red; position:fixed;z-index:200005;"></div>
</div>

<script>
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;

var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight; 
//alert(w + "---" + h);
cdivid = document.getElementById("cdiv");
cdivid.style.width = w;
cdivid.style.height = h-70;

cdivid2 = document.getElementById("cdiv2");
cdivid2.style.width = w;
cdivid2.style.height = h-70;

myCanvas = document.getElementById("myCanvas");
myCanvas.width = w;
myCanvas.height = h-70;

myCanvas2 = document.getElementById("myCanvas2");
myCanvas2.width = w;
myCanvas2.height = h-70;

//setTimeout(function (){alert(5687)}, 1500);
//bsize();

</script>



<script>

var canvas = document.getElementById("myCanvas");
var canvas2 = document.getElementById("myCanvas2");
var vcan = document.getElementById("content");
var ctx = canvas.getContext("2d");
var ctx2 = canvas2.getContext("2d");
var relativeX, relativeX = 0;

var linexx1 = 0; 
var lineyy1 = 0;
var lx= 0;
var ly = 0;


v="black";

//////HOVER
/// $("#myCanvas").hover(function () {


////

s="1"; //Default Brush sizes

//container div
can = $("body");
canx = $("#myCanvas");
//$("#cdiv").scrollTop(60);


////////////////PRINTING//////////
function inprint(e){

//////***********///////
if (movein == 0){
ctx.strokeStyle=v;
ctx.lineWidth=s;
ctx.lineCap="round";
ctx.lineJoin="miter";
ctx.miterLimit=5;
ctx.beginPath();
xx2 = e.clientX + can.scrollLeft() + canx.scrollLeft();
yy2 = e.clientY + can.scrollTop() + canx.scrollTop();
ctx.moveTo(xx1,yy1);
ctx.lineTo(xx2,yy2);
////to database ////
x1 = xx1;   y1 = yy1;
x2= xx2;    y2 = yy2;
getpic();
///end to database //////
//ctx.stroke();
xx1 = xx2;
yy1 = yy2;
//alert(yy2);
document.getElementById("coor").innerHTML = xx2 + " --- " + yy2 + " --- " + can.scrollLeft();

}

else
{}

}
////////////////PRINTING///////////


canvas.addEventListener("mousemove", mouseMoveHandler, false);


up = 1;
function mouseMoveHandler(e) {
canvas.addEventListener("mouseup", mouseUpHandler, false);

//alert(xx1 + "-" + relativeY);


function mouseUpHandler(e) {
up = 1;
}

canvas.addEventListener("mousedown", mouseDownHandler, false);


function mouseDownHandler(e) {
xx1 = e.clientX + can.scrollLeft() + canx.scrollLeft();
yy1 = e.clientY + can.scrollTop()  + canx.scrollTop();



up = 0;
}


if(up==0)
{
inprint(e);
}

}
canvas.addEventListener("click", mouseClickHandler, false);
//function moused(e){
function mouseClickHandler(e) {
ctx.beginPath();
xx1 = e.clientX + parseInt(can.scrollLeft()) + parseInt(canx.scrollLeft()) + 1; // no stroking on same sport
yy1 = e.clientY + parseInt(can.scrollTop()) + parseInt(canx.scrollTop());
if (movein==0){
ctx.lineWidth=s;
ctx.strokeStyle=v;
ctx.moveTo(xx1,yy1);
ctx.lineTo(xx1,yy1);
ctx.stroke();
}
inprint(e);
}
//}

/////line drawing /////
vcan.addEventListener("dblclick", liner, false);
times = 0;
function liner(e)
{
track = document.getElementById("track");

lx = e.clientX + parseInt(can.scrollLeft()) + parseInt(canx.scrollLeft());
ly = e.clientY + parseInt(can.scrollTop()) + parseInt(canx.scrollTop());
times += 1;
//alert(times);
if(times == 1)
{

linediv = document.getElementById("cdiv2");
linediv.style.zIndex = "20000";
//alert(linediv.style.zIndex);
linexx1 = lx;
lineyy1 = ly;
track.style.top=e.clientY - 5;
track.style.left=e.clientX - 5;
track.style.display="";
lxt = e.clientX;
lyt = e.clientY;
active = 1;
trig();


}
else
{
linediv = document.getElementById("cdiv2");
linediv.style.zIndex = "-20000";
//alert(linediv.style.zIndex);
linexx2 = lx;
lineyy2 = ly;
times = 0;
ctx.beginPath();
ctx.moveTo(linexx1,lineyy1); 
ctx.lineTo(linexx2,lineyy2);
ctx.stroke();
////to database ////
x1 = linexx1;   y1 = lineyy1;
x2= linexx2;    y2 = lineyy2;
getpic();
///end to database //////
track.style.display="none";
active = 0;
vcan.removeEventListener("mousemove", drawl);
ctx2.clearRect(0, 0, 1000, 1000);
//////get pic//////


}






}






active = 0;
//trig
function trig(){
vcan.addEventListener("mousemove", drawl, true);
drawl(e);
function drawl(e) {

if (active == 1)
{
ctx2.clearRect(0, 0, w+100, h+100);
ctx2.lineWidth=s;
ctx2.strokeStyle=v;
ctx2.lineCap="round";
ctx2.lineJoin="miter";
ctx2.miterLimit=5;
ctx.lineWidth=s;
ctx.strokeStyle=v;
ctx.lineCap="round";
ctx.lineJoin="miter";
ctx.miterLimit=5;

ctx2.beginPath();
ctx2.moveTo(lxt,lyt);
lxx = e.clientX;
lyy = e.clientY;
ctx2.lineTo(lxx,lyy);
ctx2.stroke();
}
else
{
ctx2.clearRect(0, 0, w+100, h+100);
}


}

}


///trig



////End line drawing ////

x1 = 0;   x2 = 0;
y1= 0;    y2 = 0;

/*
ctx.moveTo(xx1,yy1);
ctx.lineTo(xx2,yy2);
*/
function getpic()
{
//u = document.getElementById('result').src = 
//u = x1 + "," + x2 + "," + y1 + "," + y2;
/*
ctx.lineWidth=s;
ctx.strokeStyle=v;
ctx.lineCap="round";
ctx.lineJoin="miter";
ctx.miterLimit=5;
*/
u = "ctx.moveTo(" + x1 + "," + y1 + "); ctx.lineTo(" + x2 + "," + y2 + ");ctx.strokeStyle=\"" + v + "\";ctx.lineWidth=" + s + "; ctx.stroke();";

//u=  canvas.toDataURL();

//document.getElementById('result').src = u;


$(document).ready(function(){

  $.post("upload2.php",{img:u},function(result){
    $(".out").html(result);
  });
//alert(4668790);
ctx.stroke();
});


} 


//*/

///////  

//End hover
////});

function clearb(){
ctx.clearRect(0, 0, w, h);
}
</script>
<!------- GETTER --->

<script>
//var canvas = document.getElementById("myCanvas");
//var ctx = canvas.getContext("2d");
ctx.lineCap="round";
ctx.lineJoin="miter";
ctx.miterLimit=5;
//ctx.moveTo(10,10);ctx.lineTo(40,100);ctx.stroke();
//ctx.moveTo(60,219);ctx.lineTo(100,219);ctx.stroke();
//lastid =  document.getElementById("maxnum");
lastid =  0;
function rget()
{
$(document).ready(function(){

  $.post("getter.php",{img:lastid},function(result){
    $(".out").html(result);
  });
//alert(4668790);
});
//alert(000);
 }
 setInterval(rget, 500);
</script>
<script>

function clear_b()
{
$(document).ready(function(){

  $.post("clear.php",{img:888},function(result){
   // $(".out").html(result);
  });
//alert(4668790);
});
//alert(000);
 }
 setInterval(rget, 500);
</script>
<!------- END GETTER --->
</body>
</html>