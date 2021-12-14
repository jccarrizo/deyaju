<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$toUserId = 0;
$fromUserId = Yii::$app->user->identity->id;
$toUserId = Yii::$app->request->get()['id'];

$username = Yii::$app->user->identity->username;

//print_r($chat);
$arrChannel = array(
    $fromUserId, $toUserId
);
sort($arrChannel);
$contacto_username = $contacto['username'];
$channel_type = 1;//canal privado
$meses = ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'May.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Nov.', 'Dic.'];
echo "<script> meses = " . json_encode($meses) . " </script>";

function fechaFormat($_date, $meses) {

    $date = new DateTime($_date);
    $fecha_hora = '' . $date->format('d') . ' de ' . $meses[intval($date->format('m')) - 1] . ' ' . $date->format('Y') .
            ' - ' . $date->format('H:i a');
    return $fecha_hora;
}
?>
<?php $path = Yii::getAlias('@web') ?>
<style>
    
</style>
<h1>livechat/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<p>
    <?= Html::a('<i class="fas fa-users"></i> Contactos', ['livechat/',], ['class' => 'btn btn-sm btn-primary']) ?>

</p>
<div class="card direct-chat direct-chat-primary">
    <div class="card-header">
        <h3 class="card-title">Direct Chat</h3>

        <div class="card-tools">
            <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                    data-widget="chat-pane-toggle">
                <i class="fas fa-comments"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">
            <?php
            if ($chat) {
                foreach ($chat as $message) {
                    if ($message['from_user_id'] == $fromUserId) {
                        ?>
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left"></span>

                                <span class="direct-chat-timestamp float-right"><?= fechaFormat($message['fecha'], $meses) ?></span>
                            </div>
                            <img class="direct-chat-img user-image img-circle elevation-2" src="<?= Yii::getAlias('@web') ?>/images/young-user-icon.png" alt="message user image">

                            <div class="direct-chat-text">
                                <?= $message['mensaje'] ?>
                            </div>
                        </div>
                    <?php } else {
                        ?>
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right"><?= $contacto_username ?></span>

                                <span class="direct-chat-timestamp float-left"><?= fechaFormat($message['fecha'], $meses) ?></span>
                            </div>
                            <img class="direct-chat-img user-image img-circle elevation-2" src="<?= Yii::getAlias('@web') ?>/images/young-user-icon.png" alt="message user image">

                            <div class="direct-chat-text">
                                <?= $message['mensaje'] ?>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>

        </div>
        <div class="button-scroll-box">
            <div class="popupscroll">
                <div class="popupscroll-box">
                    <div style="text-align: center;">
                        <i class="fas fa-angle-double-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div  class="direct-chat-contacts">
            <ul class="contacts-list">
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $path ?>/dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $path ?>/dist/img/user7-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Sarah Doe
                                <small class="contacts-list-date float-right">2/23/2015</small>
                            </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $path ?>/dist/img/user3-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Nadia Jolie
                                <small class="contacts-list-date float-right">2/20/2015</small>
                            </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $path ?>/dist/img/user5-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Nora S. Vans
                                <small class="contacts-list-date float-right">2/10/2015</small>
                            </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $path ?>/dist/img/user6-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                John K.
                                <small class="contacts-list-date float-right">1/27/2015</small>
                            </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="<?= $path ?>/dist/img/user8-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Kenneth M.
                                <small class="contacts-list-date float-right">1/4/2015</small>
                            </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
            </ul>
            <!-- /.contacts-list -->
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <?php
        $form = ActiveForm::begin(['id' => 'form-chat', 'enableClientValidation' => true, 'enableAjaxValidation' => true,
                    'action' => ['/livechat/sendmessage']]);
        ?>
        <div class="input-group">
            <input id="message" type="text" name="message" placeholder="Type Message ..." class="form-control">
            <input type="hidden" name="channel" id="channel">
            <input type="hidden" name="receiver" id="receiver">

            <span class="input-group-append">

                <?= Html::submitButton('Enviar', ['id' => 'btn-send', 'class' => 'btn btn-primary']) ?>
            </span>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.card-footer-->
</div>
<script type="text/javascript">

</script>

<?php
$idd = Yii::$app->user->id;
$script = <<< JS
    var count = 0;
        let popup = false;
        let divScroll = document.getElementsByClassName("direct-chat-messages")[0];
        divScroll.addEventListener('scroll', function(event)
        {
            var element = event.target;
            if (    element.scrollHeight - element.scrollTop >= element.clientHeight + 200  )
            {  
                
            if(!popup){
                popup = true;
                $('.button-scroll-box').fadeIn();
            }
                
            }else{
                if(popup){
                    popup = false;
                    $('.button-scroll-box').fadeOut();
                }
            }
        });
        
        $('.popupscroll .popupscroll-box').on('click',function(){
            let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
            myDiv.scrollTop = myDiv.scrollHeight; 
        });
        
        
    $(document).ready(function(){
    let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
    myDiv.scrollTop = myDiv.scrollHeight;        
        
    function fecha(){
        let d = new Date();
        let h = (d.getHours() > 12 ? ( d.getHours() -12 ): ((d.getHours() == 0)?12:d.getHours()) );
        if(h < 10){
            h = '0'+h+'';
        }
        let ampm = (d.getHours() >= 12?'pm':'am');
        let min = d.getMinutes();
        if(min < 10){
            min = '0'+min+'';
        }
        let ss = d.getSeconds();
        if(ss < 10){
            ss = '0'+ss+'';
        }
        let mont =  (d.getMonth());
        if(mont < 10){
            //mont = '0'+mont+'';
        }
        mont = meses[mont];
        return ''+d.getDate()+' de '+( mont )+' '+d.getFullYear() + ' - '+h+':'+min+' '+ampm;
    }
        
        const socket = io.connect('http://localhost:3018',{query:"data=$fromUserId,$username"});
        
        console.log('start...');
        
        socket.on("message-from-server-to-client", function(msg) {
            //document.getElementById('message').value = (msg);
        });
        
        socket.on('private_message$arrChannel[0]_$arrChannel[1]', function (data) {
            console.log('Client side: ',data);
            if(data.fromUserId === $fromUserId){
                console.log('my message...');
            }else{
                let chat = '<div class="direct-chat-msg right">'+
                        '<div class="direct-chat-infos clearfix">'+
                            '<span class="direct-chat-name float-right">'+data.username+'</span>'+
                            '<span class="direct-chat-timestamp float-left">'+fecha()+'</span>'+
                        '</div>'+
                        '<img class="direct-chat-img user-image img-circle elevation-2" src="$path/images/young-user-icon.png" alt="message user image">'+

                        '<div class="direct-chat-text">'+
                            ''+data.message+''+
                        '</div>'+
                    '</div>';
                $('.direct-chat-messages').append(chat);
            let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
            if (myDiv.scrollHeight - myDiv.scrollTop <= myDiv.clientHeight + 300)
            {
                myDiv.scrollTop = myDiv.scrollHeight;
            }
        
            }
        });
        
        socket.on('message', function (data) {   console.log(data); });
        
        $('#btn-send').on('click',function(){
            var messagePacket = {
                message: $('#message').val(),
                fromUserId: $fromUserId,
                toUserId: $toUserId,
                username:'$username',
                channel_type:$channel_type,//privado
                channel:'private_message$arrChannel[0]_$arrChannel[1]'//privado
            }
        
            count++;
            socket.emit('message-from-client-to-server', messagePacket);
                let chat = '<div class="direct-chat-msg">'+
                '<div class="direct-chat-infos clearfix">'+
                    '<span class="direct-chat-name float-left"></span>'+
                    '<span class="direct-chat-timestamp float-right">'+fecha()+'</span>'+
                '</div>'+
                '<img class="direct-chat-img user-image img-circle elevation-2" src="$path/images/young-user-icon.png" alt="message user image">'+
                
                '<div class="direct-chat-text">'+
                    ''+messagePacket.message+''+
                '</div>'+
            '</div>';
                
            $('.direct-chat-messages').append(chat);
            $('#message').val('');
            
        
        
        
            let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
            if (myDiv.scrollHeight - myDiv.scrollTop <= myDiv.clientHeight + 300)
            {
                myDiv.scrollTop = myDiv.scrollHeight;
            }
              
        });
        
        
        
        
        
        $('#form-chat').on('beforeSubmit', function(e) {
        if($('#message').val() == ''){
            return;
        }
        
        }).on('submit', function(e){
            e.preventDefault();
        });
        
        
    });
JS;
$this->registerJs($script);
