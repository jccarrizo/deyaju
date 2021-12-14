<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$id = Yii::$app->user->identity->id;
$nombre = Yii::$app->user->identity->username;


$channel = '';
//print_r($chats);
$select_channel = 'chat_1_3';
$id_reciever = 0;

$chatsArray = $chatModel['mensajes'];
//die( print_r($chatsArray) );
echo '<script>_CHANNEL = "' . $select_channel . '" </script>';
?>
<h1>livechat/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
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
        <div id="chat-box" class="direct-chat-messages">
            <?php
            $fecha = "";
            if ($chatsArray) {
                
                $user_chat = [];
                foreach ($chatsArray as $chat) {
                    if ($chat['id_chat'] == $select_channel) {
                        array_push($user_chat, $chat);
                    }
                }
                foreach ($user_chat as $ch) {
                    //print_r($user_chat);
                    //die();
                    $id_user = ($ch['id_user']);
                    $date = new DateTime($ch['fecha']);
                    $fecha = $date->format('h:i:s a - d/m/Y');
                    if ($ch['mensaje'])
                        if ($id_user == $id) {
                            ?>
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left"><?= $ch['username'] ?></span>
                                    <span class="direct-chat-timestamp float-right"><?= $fecha ?></span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    <?= $ch['mensaje'] ?>
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                        <?php } else { ?>
                            <!-- /.direct-chat-msg -->

                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right"><?= $ch['username'] ?></span>
                                    <span class="direct-chat-timestamp float-left"> <?= $fecha ?></span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    <?= $ch['mensaje'] ?>
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                            <?php
                        }
                }
            }
            ?>

            <!-- /.direct-chat-msg -->

        </div>
        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div  class="direct-chat-contacts">
            <ul class="contacts-list">
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

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
                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

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
                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

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
                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

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
                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

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
                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

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
<?php
$script = <<< JS
$(document).ready(function(){
    $('#form-chat').on('beforeSubmit', function(e) {
        if($('#message').val() == ''){
            return;
        }
        addMessageMe({'message':$('#message').val()});
            $('#channel').val(_CHANNEL);
            $('#receiver').val(3);
            var form = $(this);
            
            var formData = form.serialize();
            $.ajax({
                url: form.attr("action"),
                type: form.attr("method"),
                data: formData,
                success: function (data) {
                    
                     $('#message').val('');
                },
                error: function () {
                    
                }
            });
        }).on('submit', function(e){
            e.preventDefault();
        });
        
        
        
        function addMessageMe(data){
        let message = ''+
        '<div class="direct-chat-msg">'+
                            '<div class="direct-chat-infos clearfix">'+
                                '<span class="direct-chat-name float-left">$nombre</span>'+
                                '<span class="direct-chat-timestamp float-right">$fecha</span>'+
                            '</div>'+
                            <!-- /.direct-chat-infos -->
                            '<img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">'+
                            <!-- /.direct-chat-img -->
                            '<div class="direct-chat-text">'+
                               ''+data.message+''+
                            '</div>'
                            <!-- /.direct-chat-text -->
                        '</div>';
        $('.direct-chat-messages').append( message );
        var element = document.getElementById('chat-box');
        element.scrollTop = element.scrollHeight - element.clientHeight;
    }   
        
}); 
JS;
$this->registerJs($script);
