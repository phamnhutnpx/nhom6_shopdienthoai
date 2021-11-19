<!-- Thẻ Chứa Slideshow -->
<div class="slideshow-container">
  <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
   <div class="mySlides fade">
     <div class="numbertext">1 / 3</div>
     <img src="https://cdn.tgdd.vn/2021/11/banner/cbfold3-830-300-830x300.png" style="width:100%">
     <div class="text"></div>
   </div>
  <div class="mySlides fade">
     <div class="numbertext">2 / 3</div>
     <img src="https://cdn.tgdd.vn/2021/10/banner/renno6-seri-830-300-830x300-3.png" style="width:100%">
     <div class="text"></div>
   </div>
  <div class="mySlides fade">
     <div class="numbertext">3 / 3</div>
     <img src="https://cdn.tgdd.vn/2021/11/banner/830-300-830x300-3.png" style="width:100%">
     <div class="text"></div>
   </div>
  <!-- Nút điều khiển mũi tên-->
   <a class="prev" onclick="plusSlides(-1)">❮</a>
   <a class="next" onclick="plusSlides(1)">❯</a>
 </div>
 <br>
<!-- Nút tròn điều khiển slideshow-->
 <div style="text-align:center">
   <span class="dot" onclick="currentSlide(1)"></span>
   <span class="dot" onclick="currentSlide(2)"></span>
   <span class="dot" onclick="currentSlide(3)"></span>
 </div>

 <style>
     * {box-sizing:border-box}
/* thiết lập style cho slideshow container */
 .slideshow-container {
   max-width: 1000px;
   position: relative;
   margin: auto;
 }
/* ẩn hình ảnh cho phần tử slideshow */
 .mySlides {
   display: none;
 }
/* thiết kế nút mũi tên*/
 .prev, .next {
   cursor: pointer;
   position: absolute;
   top: 50%;
   width: auto;
   margin-top: -22px;
   padding: 16px;
   color: white;
   font-weight: bold;
   font-size: 18px;
   transition: 0.6s ease;
   border-radius: 0 3px 3px 0;
   user-select: none;
 }
/* thiết kế nút mũi tên next nằm phía bên phải */
 .next {
   right: 0;
   border-radius: 3px 0 0 3px;
 }
/* hiệu ứng thay đổi background khi hover vào nút mũi tên*/
 .prev:hover, .next:hover {
   background-color: rgba(0,0,0,0.8);
 }
/* Thiết lập style cho nội dung của mỗi phần tử slideshow */
 .text {
   color: #f2f2f2;
   font-size: 15px;
   padding: 8px 12px;
   position: absolute;
   bottom: 8px;
   width: 100%;
   text-align: center;
 }
/* Thiết lập style cho số hiển thị của phần tử */
 .numbertext {
   color: #f2f2f2;
   font-size: 12px;
   padding: 8px 12px;
   position: absolute;
   top: 0;
 }
/* thiết lập style  nút tròn điều khiển*/
 .dot {
   cursor: pointer;
   height: 15px;
   width: 15px;
   margin: 0 2px;
   background-color: #bbb;
   border-radius: 50%;
   display: inline-block;
   transition: background-color 0.3s ease;
 }
.active, .dot:hover {
   background-color: #717171;
 }
/* tạo hiệu ứng chuyển động fade */
 .fade {
	 opacity: 1 !important;
   -webkit-animation-name: fade;
   -webkit-animation-duration: .1s;
   animation-name: fade;
   animation-duration: .1s;
 }
@-webkit-keyframes fade {
   from {opacity: .7}
   to {opacity: 1}
 }
@keyframes fade {
   from {opacity: .3}
   to {opacity: 1}
 }
 </style>
 <script>
     var slideIndex = 1;
 showSlides(slideIndex);
function plusSlides(n) {
   showSlides(slideIndex += n);
 }
function currentSlide(n) {
   showSlides(slideIndex = n);
 }
function showSlides(n) {
   var i;
   var slides = document.getElementsByClassName("mySlides");
   var dots = document.getElementsByClassName("dot");
   if (n > slides.length) {slideIndex = 1}
   if (n < 1) {slideIndex = slides.length}
   for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
   }
   for (i = 0; i < dots.length; i++) {
       dots[i].className = dots[i].className.replace(" active", "");
   }
   slides[slideIndex-1].style.display = "block";
   dots[slideIndex-1].className += " active";
 }
 </script>