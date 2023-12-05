<div class="container mwidth-1200 my-5">
    <h4 class="c-orange fs-30px mb-4">Tin tức</h4>
    <div class="container">
        <div class="row">
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white hover-mouse mb-3 active" onClick="getType('all'<?php if (isset($numOfNews)) echo ',' . $numOfNews; ?>)" id="btn_all">Tất cả</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white hover-mouse mb-3" onClick="getType('Công nghệ'<?php if (isset($numOfNews)) echo ',' . $numOfNews; ?>)" id="btn_congNghe">Công nghệ</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white hover-mouse mb-3" onClick="getType('Sản phẩm '<?php if (isset($numOfNews)) echo ',' . $numOfNews; ?>)" id="btn_sanPham">Sản phẩm</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white hover-mouse mb-3" onClick="getType('Con người'<?php if (isset($numOfNews)) echo ',' . $numOfNews; ?>)" id="btn_conNguoi">Con người</div>
            <div class="col-auto fst-italic border-c-gray c-gray mx-2 rounded-4 hover-bg-gray hover-c-white hover-mouse mb-3" onClick="getType('Doanh nghiệp'<?php if (isset($numOfNews)) echo ',' . $numOfNews; ?>)" id="btn_doanhNghiep">Doanh nghiệp</div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row" id="jsonDataContainer">
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-auto"><a href="?page=main&controller=blog&action=index" class="text-decoration-none border-c-gray c-gray hover-bg-gray hover-c-white rounded-4 py-1 px-2 fst-italic">Xem thêm</a></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // getType('all');
        document.getElementById('btn_all').addEventListener('click', getType('all'
            <?php if (isset($numOfNews)) echo ',' . $numOfNews; ?>));
    });

    function getType(type, lengthMAX = 3) {
        if (event) {
            $('.row div').removeClass('active');
            $(event.target).addClass('active');
        }
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
                if (message.length < lengthMAX) lengthMAX = message.length;
                for (var i = 0; i < lengthMAX; i++) {
                    var jsonData = message[i];

                    var a = document.createElement("a")
                    var col_4 = document.createElement("div")
                    var card = document.createElement("div")
                    var img = document.createElement("img")
                    var card_body = document.createElement("div")
                    var h5 = document.createElement("h5")
                    var p1 = document.createElement("p")
                    var p2 = document.createElement("p")

                    a.className = "text-decoration-none"
                    col_4.className = "col-lg-4 col-sm-12 mb-3"
                    card.className = "card hover-shadow rounded-5 h-100"
                    img.className = "card-img-top rounded-top-5 h-200px object-fit-cover"
                    card_body.className = "card-body p-4"
                    h5.className = "fw-bold"
                    p1.className = "c-gray"
                    p2.className = "c-gray"

                    img.alt = "thumbnaill picture"

                    a.href = "?page=main&controller=society&action=article&article_id=" + jsonData.id;

                    img.src = jsonData.content;

                    h5.innerText = jsonData.title;
                    p1.innerText = new Date(jsonData.date).toLocaleString();
                    p2.innerText = jsonData.subtitle.substr(0, 150) + "...";

                    jsonDataContainer.appendChild(col_4);
                    col_4.appendChild(a);
                    a.appendChild(card);
                    card.appendChild(img);
                    card.appendChild(card_body);
                    card_body.appendChild(h5);
                    card_body.appendChild(p1);
                    card_body.appendChild(p2);


                }
            },
            error: function(error) {
                // Xử lý lỗi nếu có
                console.error('Error:', error);
            }
        });
    }
</script>