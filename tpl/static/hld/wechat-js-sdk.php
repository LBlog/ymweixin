echo 123;
echo 465;
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=JYTBZ-6GD3V-ZTZPJ-U35RX-EZMGQ-45BTF&libraries=place"></script>
<script>

    var loading = layer.open({type: 2});
    wx.config({
    debug: false,
            appId: '<?php echo $signPackage["appId"]; ?>',
            timestamp: <?php echo $signPackage["timestamp"]; ?>,
            nonceStr: '<?php echo $signPackage["nonceStr"]; ?>',
            signature: '<?php echo $signPackage["signature"]; ?>',
            jsApiList: [
                    // 所有要调用的 API 都要加到这个列表中
<?php if (isset($getLocation)) { ?>
    <?= $getLocation ?>
<?php } ?>
<?php if (isset($chooseImage)) { ?>
    <?= $chooseImage ?>
<?php } ?>
            'uploadImage',
            ]
    });
    wx.ready(function () {
<?php if (isset($getLocation)) { ?>
        wx.getLocation({
        type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
                success: function (res) {
                //地址和经纬度之间进行转换服务
                var lat = parseFloat(res.latitude);
                var lng = parseFloat(res.longitude);
                var latLng = new qq.maps.LatLng(lat, lng);
                geocoder = new qq.maps.Geocoder({
                complete: function (result) {
                $(".top_add").html('<img src="/public_source/wap/img/icon.png" width="12" />' + result.detail.addressComponents.city);
                $("#city").val(result.detail.addressComponents.city);
                ajax_next();
                layer.close(loading);
                }
                });
                geocoder.getAddress(latLng);
                }
        });
<?php } ?>
    });
</script>