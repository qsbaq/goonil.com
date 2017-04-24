<!--正文结束-->
<hr>
<?php if (!empty(Flight::get('flight.settings')['ads_bottom'])): ?>
    <div class="jads"><?= Flight::get('flight.settings')['ads_bottom'] ?></div>
<?php endif ?>    
<div class="footer jads">        
    <p><?= Flight::get('flight.settings')['description'];?></p>
    <p>© <?= date('Y') ?> <a href="<?= Flight::get('flight.base_url');?>" title="<?= Flight::get('flight.settings')['description'];?>">Goonil.com</a> . Licensed under MIT license.
        <a href="http://www.miitbeian.gov.cn/" rel="nofollow" target="_blank">苏ICP备16052022号-2</a>
    </p>
    <div id="jcontent" class="jads"></div>
</div>
    
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php if (!empty(Flight::get('flight.settings')['external_js'])): ?>
    <script src="<?= Flight::get('flight.base_url');?><?= Flight::get('flight.settings')['external_js'] ?>"></script>
<?php endif ?>
    
<script type='text/javascript'>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?469f8d6fd30c5d9008ee1202bf4074e3";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>