<?=$header_content;?>
    
    <!--标签卡开始-->
    <ul id="myTab" class="nav nav-tabs">
        <li data="random" class="active"><a href="#random" data-toggle="tab" data="random">随机密码</a></li>
        <li data="passwd"><a href="#passwd" data-toggle="tab">加密解密</a></li>
	<li data="snapshot"><a href="#snapshot" data-toggle="tab">搜索快照检测</a></li>
    </ul>
    <div id="myTabContent" class="tab-content" style="padding-top: 12px;">
        <!--随机密码选项卡开始-->
        <div class="tab-pane fade in active" id="random">
            <form class="gorandom" action="/random" method="post">               
                <table class="table table-bordered">
                    <caption>随机密码生成</caption>
                    <thead>
                        <tr>
                            <th>所用字符</th>
                            <th>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="type[]" value="AZ" > A-Z 
                                </label>
                                <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" value="az"> a-z
                                </label>                                
                                <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" value="09"> 0-9
                                </label>                                
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="type[]" value="other"> !@#$%^&*()-_[]{}<>~`+=,.;:/?|
                                </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>密码长度</td>
                            <td><div class="col-md-2"><input type="text" class="form-control " name="length"  placeholder="" value="<?=$length?>" ></div></td>
                        </tr>
                        <tr>
                            <td>生成结果</td>
                            <td><div class="getrandom"><?=$getrandom;?></div></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group jads">
                    <button type="submit" class="btn btn-default btn-getrandom">生成</button>
                </div>
            </form>
            <h3>随机密码</h3>
            <p>密码是一种用来混淆的技术，它希望将正常的（可识别的）信息转变为无法识别的信息。当然，对一小部分人来说，这种无法识别的信息是可以再加工并恢复的。密码在中文里是“口令”（password）的通称。登录网站、电子邮箱和银行取款时输入的“密码”其实严格来讲应该仅被称作“口令”，因为它不是本来意义上的“加密代码”，但是也可以称为秘密的号码。</p>
        </div>
        <!--随机密码选项卡结束-->
        
        <!--密码选项卡开始-->
        <div class="tab-pane fade" id="passwd">
            <div class="gopasswd">
                <div class="form-group  col-md-8">
                    <input type="text" class="form-control word" name="word"  placeholder="Please input the word." value="<?=$word;?>">
                </div>                        
                <div class="form-group">
                <button type="submit" class="btn btn-default btn-md5">加密</button>
                <!--<button type="submit" class="btn btn-default btn-pass">MD5解密</button>-->
                </div>
            </div>
            <?=$md5_content;?>
            <h3>M5</h3>
            <p>Message Digest Algorithm MD5（中文名为消息摘要算法第五版）为计算机安全领域广泛使用的一种散列函数，用以提供消息的完整性保护。该算法的文件号为RFC 1321（R.Rivest,MIT Laboratory for Computer Science and RSA Data Security Inc. April 1992）。
            <p>MD5即Message-Digest Algorithm 5（信息-摘要算法5），用于确保信息传输完整一致。是计算机广泛使用的杂凑算法之一（又译摘要算法、哈希算法），主流编程语言普遍已有MD5实现。将数据（如汉字）运算为另一固定长度值，是杂凑算法的基础原理，MD5的前身有MD2、MD3和MD4。</p>
            <p>MD5算法具有以下特点：<p>
            <p>1、压缩性：任意长度的数据，算出的MD5值长度都是固定的。</p>
            <p>2、容易计算：从原数据计算出MD5值很容易。</p>
            <p>3、抗修改性：对原数据进行任何改动，哪怕只修改1个字节，所得到的MD5值都有很大区别。</p>
            <p>4、强抗碰撞：已知原数据和其MD5值，想找到一个具有相同MD5值的数据（即伪造数据）是非常困难的。</p>
            <p>MD5的作用是让大容量信息在用数字签名软件签署私人密钥前被压缩成一种保密的格式（就是把一个任意长度的字节串变换成一定长的十六进制数字串）。除了MD5以外，其中比较有名的还有sha-1、RIPEMD以及Haval等。</p>

            <h3>SHA1</h3>
            <p>安全哈希算法（Secure Hash Algorithm）主要适用于数字签名标准（Digital Signature Standard DSS）里面定义的数字签名算法（Digital Signature Algorithm DSA）。对于长度小于2^64位的消息，SHA1会产生一个160位的消息摘要。该算法经过加密专家多年来的发展和改进已日益完善，并被广泛使用。该算法的思想是接收一段明文，然后以一种不可逆的方式将它转换成一段（通常更小）密文，也可以简单的理解为取一串输入码（称为预映射或信息），并把它们转化为长度较短、位数固定的输出序列即散列值（也称为信息摘要或信息认证代码）的过程。散列函数值可以说是对明文的一种“指纹”或是“摘要”所以对散列值的数字签名就可以视为对此明文的数字签名。</p>
        </div>
        <!--密码选项卡开始-->
        
        <!--搜索快照选项卡开始-->
        <div class="tab-pane fade" id="snapshot">
            <form action="/snapshot" class="snapshot">
                <div class="form-group  col-md-2">
                    <select class="form-control spider-agent" name="agent">
                    <?php foreach(Flight::get('flight.spider_agent') as $k => $v): ?>
                        <option value="<?=$k;?>"><?=$k;?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group  col-md-8">
                    <input type="text" class="form-control url" name="url"  placeholder="请输入网址" value="<?=$url;?>">
                </div>                        

                <button type="submit" class="btn btn-default btn-snapshot">提交</button>
            </form>
            <div class="col-md-12">
                <?=$snapshot_content?>
                <h3>搜索快照劫持</h3>
                <p>快照劫持是利用黑客技术拿到了你的ftp，趁你不注意、蜘蛛正抓取你网站的时候把数据换掉（通常是晚上操作），等蜘蛛抓取完你的快照后再把数据换回来，这样你的网站快照就被劫持了，而且你检查代码也发现不了问题，由于修改主站标题、关键词、描述导致快照停留时间长。</p>
            </div>
        </div>
        <!--搜索快照选项卡结束-->
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var str = '<?=$type?>';
            var type=str.split('-');
            for(var i=0;i<type.length;i++){
                var check = type[i];
                $(".gorandom input[type='checkbox']").each(function(j){
                    if( $(this).val() == check ){
                        $(this).attr("checked",true);
                    }
                });
            }
            
            $(".btn-md5").click(function(){
                var word= $('.gopasswd .word').val();
                if( ! word ){
                    alert('Please input the word.');
                    return false;
                }
                window.location = '/passwd/'+word;
            });
            
            $(".btn-snapshot").click(function(){
                var spider_agent = $('.spider-agent').val();
                var url = $(".snapshot .url").val();
                if( !url ){
                    alert("Please input url.请输入URL");
                    return false;
                }
            });
            
            <?php if( $agent ){ ?>
                $('.spider-agent').find("option[value=\"<?= $agent?>\"]").attr('selected',true);
            <?php } ?>
            
            var myTab = function(id){
                $('#myTab li').removeClass('active');
                $('#myTabContent .tab-pane').removeClass('active').removeClass('in');
                $('#myTab li[data='+id+']').addClass('active');
                $('#myTabContent .tab-pane[id='+id+']').addClass('active').addClass('in');
            }
            myTab('<?=$tabId?>');
        });
    </script>
    <!--选项卡标签结束-->
    
<?=$footer_content;?>