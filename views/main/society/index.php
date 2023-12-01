<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/products/vng/skin-2021/dist/main/images/header-slide/header6.jpg" class="d-block w-100" alt="...">
            <div class="position-absolute text-white t-60 l-0 p-5 rounded-4">
                <div class="fs-100px fw-bold">TRÁCH NHIỆM CỘNG ĐỒNG</div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container mwidth-1200 my-5">
    <h4 class="c-orange fs-30px mb-4">Tin tức</h4>
    <div class="container">
        <div class="row">
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onclick="getType('all')">Tất cả</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onclick="getType('Trách nhiệm xã hội')">Trách nhiệm xã hội</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onclick="getType('Cộng đồng công nghệ')">Cộng đồng công nghệ</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onclick="getType('phát triển đối tác')">Phát triển đối tác</div>
        </div>
    </div>
    <div class="container mt-5" id="jsonDataContainer">

    </div>
</div>


<script>
    function getType(type, lengthMAX = 2) {
        // Gỡ bỏ lớp "active" từ tất cả các nút
        $('.row div').removeClass('active');

        // Thêm lớp "active" cho nút được nhấn
        $(event.target).addClass('active');

        // Gửi AJAX request khi nút được nhấn
        $.ajax({
            url: 'http://localhost/index.php?page=main&controller=society&action=getByType',
            method: 'GET',
            data: { type: type },
            success: function(jsonDataArray) {


                // Xử lý phản hồi từ API ở đây
                var jsonDataContainer = document.getElementById("jsonDataContainer");
                jsonDataContainer.innerHTML = "";
                var yourObject = JSON.parse(jsonDataArray);
                var message = yourObject.message;
                for (var i = 0; i < lengthMAX; i++) {
                    var jsonData = message[i];

                    var colDiv = document.createElement("div");
                    colDiv.className = "col-4 mt-4";

                    var aElement = document.createElement("a");
                    aElement.className = "card hover-shadow rounded-5 h-100 text-decoration-none";
                    aElement.href = "http://localhost/index.php?page=main&controller=society&action=article&article_id=1";

                    var bgDiv = document.createElement("div");
                    bgDiv.className = "bg-orange text-white text-center rounded-top-5";

                    var h5Element = document.createElement("h5");
                    h5Element.className = "mt-3 mb-3 fw-bold fs-25px";
                    h5Element.innerText = jsonData.title;

                    var imgElement = document.createElement("img");
                    imgElement.className = "card-img-top h-200px";
                    imgElement.src = "https://corp.vcdn.vn/products/upload/vng/source/News/cong-ty-vng-la-gi.png";
                    imgElement.alt = "...";

                    var cardBodyDiv = document.createElement("div");
                    cardBodyDiv.className = "card-body h-100 p-4";

                    var dateP = document.createElement("p");
                    dateP.className = "c-gray";
                    dateP.innerText = new Date(jsonData.date).toLocaleString();

                    var contentP = document.createElement("p");
                    contentP.className = "c-gray";
                    contentP.innerText = jsonData.contentTitle;

                    // Gắn các phần tử con vào các phần tử cha
                    bgDiv.appendChild(h5Element);
                    aElement.appendChild(bgDiv);
                    aElement.appendChild(imgElement);
                    cardBodyDiv.appendChild(dateP);
                    cardBodyDiv.appendChild(contentP);
                    aElement.appendChild(cardBodyDiv);
                    colDiv.appendChild(aElement);

                    // Thêm phần tử colDiv vào container
                    jsonDataContainer.appendChild(colDiv);
                }

                var rowDiv = document.createElement("div");
                rowDiv.className = "row mt-4";

                var colDiv = document.createElement("div");
                colDiv.className = "col-auto";

                var containerDiv = document.createElement("div");
                containerDiv.className = "container c-gray hover-bg-gray hover-c-white border-c-gray rounded-5 fst-italic";
                containerDiv.textContent = "Xem thêm";
                containerDiv.onclick = function() {
                    getType('all', message.length);
                };

                colDiv.appendChild(containerDiv);
                rowDiv.appendChild(colDiv);
                jsonDataContainer.appendChild(rowDiv);

            },
            error: function(error) {
                // Xử lý lỗi nếu có
                console.error('Error:', error);
            }
        });
    }
</script>

<?php require_once("views/main/footer.php") ?>