<div class="container mwidth-1200 my-5">
    <h4 class="c-orange fs-30px mb-4">Tin tức</h4>
    <div class="container">
        <div class="row">
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white active" onClick="getType('all')">Tất cả</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onClick="getType('Công nghệ')">Công nghệ</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onClick="getType('Sản phẩm ')">Sản phẩm</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onClick="getType('Con người')">Con người</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white" onClick="getType('Doanh nghiệp')">Doanh nghiệp</div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card hover-shadow rounded-5 h-100">
                    <img src="https://corp.vcdn.vn/products/upload/vng/source/News/cong-ty-vng-la-gi.png" class="card-img-top h-200px rounded-top-5" alt="...">
                    <div class="card-body h-100 p-4">
                        <h5 class="fw-bold">VNG là công ty gì? Thông tin về VNG có thể bạn chưa biết </h5>
                        <p class="c-gray">08:00 AM | 22/11/2023</p>
                        <p class="c-gray">VNG là công ty công nghệ sở hữu hệ sinh thái kỹ thuật số hàng đầu Việt Nam được thành lập năm 2004. Công ty cổ phần VNG ...</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card hover-shadow rounded-5 h-100">
                    <img src="https://corp.vcdn.vn/products/upload/vng/source/News/VNG%20signed.jpg" class="card-img-top h-200px rounded-top-5" alt="...">
                    <div class="card-body h-100 p-4">
                        <h5 class="fw-bold">VNG Solutions Inked MSA With INFINITE PL To Mark Presence in Saud ...</h5>
                        <p class="c-gray">07:00 PM | 15/11/2023</p>
                        <p class="c-grayy">VNG Solutions, a subsidiary of VNG, recently signed an Agreement with Infinite pl, a prominent logistics-led tech compan ...</p>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card hover-shadow rounded-5 h-100">
                    <img src="https://corp.vcdn.vn/products/upload/vng/source/News/VNG%20daily%20news/ZLPxGojek-1.jpg" class="card-img-top h-200px rounded-top-5" alt="...">
                    <div class="card-body h-100 p-4">
                        <h5 class="fw-bold">ZaloPay và Gojek công bố hợp tác, cung cấp thêm lựa chọn thanh to ...</h5>
                        <p class="c-gray">09:00 AM | 14/11/2023</p>
                        <p class="c-gray">ZaloPay và Gojek công bố hợp tác, cung cấp thêm lựa chọn thanh toán không dùng tiền mặt cho người dùng Gojek tại Việt Na ...</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-auto">
                <div class="container c-gray hover-bg-gray hover-c-white border-c-gray rounded-5 fst-italic">Xem thêm</div>
            </div>
        </div>
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
            data: {
                type: type
            },
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