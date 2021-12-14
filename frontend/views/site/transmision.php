<?php
$this->title = 'Transmisión';

use common\helpers\Core;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

function fechaFormat($_date, $meses) {
    $date = new DateTime($_date);
    $fecha_hora = '' . $date->format('d') . ' de ' . $meses[intval($date->format('m')) - 1] . ' ' . $date->format('Y') .
            ' - ' . $date->format('h:i a');
    return $fecha_hora;
}

echo "<script> meses = " . json_encode($meses) . " </script>";
?>
<?php $path = Yii::getAlias('@web') ?>
<!DOCTYPE html>
<html>

    <head>
        <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>
        <?php $this->registerCssFile('@web/emoji/css/emoji_keyboard.css'); ?>
        <?php $this->registerCssFile('@web/css/video.chat.css'); ?>
        <?php $this->registerCssFile('@web/dist/emojioneareamaster/emojionearea.min.css'); ?>

    </head>

    <body>
        <div class="row mx-auto col-md-10">
            <div class="video-chat-container">
                <div class="wrapper-content">
                    <div class="inner-wrapper">
                        <div class="left pane">
                            <div id="videos">
                                <div id="subscriber">
                                    <div class="position-h1">
                                        <h1>Modelo fuera de línea</h1>
                                    </div>
                                </div>
                            </div>
                            <div style="position: absolute;bottom: 5px;right:5px;">
                                <a href="javascript:void(0)" id="toggle_fullscreen" title="Pantalla Completa" style="text-decoration: none;color: #dedede;">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="right pane">

                            <div class="card direct-chat direct-chat-primary">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>

                                    <div class="card-tools">
                                        <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>

                                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                            <i class="fas fa-comments"></i>
                                        </button>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- Conversations are loaded here -->
                                    <div class="direct-chat-messages">
                                        <?php
                                        if (false) {
                                            $reversed = array_reverse($chat);
                                            foreach ($reversed as $message) {
                                                if ($message['from_user_id'] == $fromUserId) {
                                                    ?>
                                                    <div class="direct-chat-msg">
                                                        <div class="direct-chat-infos clearfix">
                                                            <span class="direct-chat-name float-left"></span>

                                                            <span class="direct-chat-timestamp float-right"><?= fechaFormat($message['fecha'], $meses) ?></span>
                                                        </div>
                                                        <img class="direct-chat-img user-image img-circle elevation-2" src="<?= Yii::getAlias('@web') ?>/images/young-user-icon.png" alt="message user image">

                                                        <div class="direct-chat-text">
                                                            <?= str_replace("&#38;#38;", "&", $message['mensaje']) ?>
                                                        </div>
                                                    </div>
                                                <?php } else {
                                                    ?>
                                                    <div class="direct-chat-msg right">
                                                        <div class="direct-chat-infos clearfix">
                                                            <span class="direct-chat-name float-right"><?= $message['username'] ?></span>

                                                            <span class="direct-chat-timestamp float-left"><?= fechaFormat($message['fecha'], $meses) ?></span>
                                                        </div>
                                                        <img class="direct-chat-img user-image img-circle elevation-2" src="<?= Yii::getAlias('@web') ?>/images/young-user-icon.png" alt="message user image">

                                                        <div class="direct-chat-text">
                                                            <?= '' //$message['mensaje'] 
                                                            ?>
                                                            <?= str_replace("&#38;#38;", "&", $message['mensaje']) ?>
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
                                    <div class="direct-chat-contacts">
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
                                    $form = ActiveForm::begin([
                                                'id' => 'form-chat', 'enableClientValidation' => true, 'enableAjaxValidation' => true,
                                                'action' => ['/livechat/sendmessage']
                                    ]);
                                    ?>


                                    <div class="input-group chat-box-content">
                                        <?= \mervick\emojionearea\Widget::widget(['name' => 'message', 'id' => 'message', 'class' => 'form-control']); ?>
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


                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Todo el Contenido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Contenido Gratuito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Contenido Premium</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                            <div class="col-md-12 card-width">
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <?php
                                    $background = "";
                                    if (isset($image_profile->adjunto_galeria)) {
                                        $background = Core::getBaseUrlBackend() . $image_profile->adjunto_galeria;
                                    }
                                    ?>
                                    <div class="widget-user-header text-white" style="background: url('<?= $background ?>') center center;background-repeat: no-repeat; background-size: 100%;">
                                        <h3 class="widget-user-username text-right"><?= ucfirst($modelo_info->nickname) ?></h3>
                                        <h5 class="widget-user-desc text-right"><?= $modelo_info->edad ?></h5>
                                    </div>
                                    <div class="widget-user-image box-img">
                                        <img class="img-circle" src="<?= Core::getBaseUrlBackend() . $image_profile_circle->adjunto_foto_perfil ?>" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <span class="description-text">CLASIFICACIÓN</span>
                                                    <h5 class="description-header">4 Estrellas</h5>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <span class="description-text">SEGUIDORES</span>
                                                    <h5 class="description-header">45678</h5>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <span class="description-text">GENERO</span>
                                                    <h5 class="description-header"><?= $modelo_info->genero ?></h5>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <!-- <div class="card-header text-muted border-bottom-0">
                                        Información de la Modelo
                                    </div> -->
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h2 class="lead"><b><?= ucfirst($modelo_info->nickname) ?></b></h2>
                                                    <h4 class="lead"><b><?= ucfirst($modelo_info->genero) ?></b></h4>
                                                    <p class="text-muted text-sm"><b>Descripción: </b> <?= $modelo_info->descripcion ?> </p>
                                                    <span class="description-text">INTRODUCCIÓN</span>
                                                    <h5 class="description-header"><?= $model_introduction->introduction ?></h5>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <span class="description-text">PAÍS DE ORIGEN</span>
                                                    <h5 class="description-header"><?= $modelo_info->pais_origen ?></h5>
                                                    <span class="description-text">MIS GUSTOS Y DISGUSTOS</span>
                                                    <h5 class="description-header"><?= $model_introduction->what_I_like_the_most . '/' . $model_introduction->what_I_do_not_like ?></h5>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4" style="transform: translate(30%, 20%);">
                                                <div class="description-block">
                                                    <div class="col-5 text-center box-img-card2">
                                                        <img src="<?= Core::getBaseUrlBackend() . $image_profile_circle->adjunto_foto_perfil ?>" alt="user-avatar" class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-sm bg-teal">
                                                <i class="fas fa-comments"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <div class="row">
                                <?php
                                $count = 0;
                                $div1 = '<div class="column">';
                                $div2 = '</div>';
                                foreach ($galleries_free as $gallery) {
                                    if ($count == 0) {
                                        echo $div1;
                                    }
                                    if ($count < $galleries_count_free) {
                                        ?>
                                        <img src="<?= Core::getBaseUrlBackend() . $gallery['adjunto_galeria'] ?>" style="width:100%">

                                        <?php
                                        $count++;
                                    }
                                    if ($count == $galleries_count_free) {
                                        echo $div2;
                                        $count = 0;
                                    }
                                }
                                if ($galleries_residue_free > 0) {
                                    echo $div2;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                            <div class="row">
                                <?php
                                $count = 0;
                                $div1 = '<div class="column">';
                                $div2 = '</div>';
                                foreach ($galleries_premium as $gallery) {
                                    if ($count == 0) {
                                        echo $div1;
                                    }
                                    if ($count < $galleries_count_premium) {
                                        ?>
                                        <img src="<?= Core::getBaseUrlBackend() . $gallery['adjunto_galeria'] ?>" style="width:100%">
                                        <?php
                                        $count++;
                                    }
                                    if ($count == $galleries_count_premium) {
                                        echo $div2;
                                        $count = 0;
                                    }
                                }
                                if ($galleries_residue_premium > 0) {
                                    echo $div2;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </body>

</html>
<script>
    var apiKey = '<?= $model->api_key; ?>';
    var sessionId = '<?= $model->sessionId; ?>'
    var token = '<?= $model->token_subscriber; ?>'

    function handleError(error) {
        if (error) {
            console.error(error);
        }
    }
    initializeSession()

    function initializeSession() {
        var session = OT.initSession(apiKey, sessionId);


        session.on('sessionDisconnected', function sessionDisconnected(event) {
            console.log('You were disconnected from the session.', event.reason);
        });

        // Connect to the session
        session.connect(token, function callback(error) {
            if (error) {
                handleError(error);
            } else {
                // If the connection is successful, publish the publisher to the session
                //session.publish(publisher, handleError);
            }
        });

        session.on('streamCreated', function (event) {
            var subscriberProperties = {
                insertMode: 'append',
                width: '100%',
                height: '100%',
                resolution: '1280x720'
            };
            var subscriber = session.subscribe(event.stream,
                    'subscriber',
                    subscriberProperties,
                    function (error) {
                        if (error) {
                            console.log(error);
                        } else {
                            console.log('Subscriber added.');
                        }
                    });
        });
    }

    function emojiUnicode(emoji) {
        var comp;
        if (emoji.length === 1) {
            comp = emoji.charCodeAt(0);
        }

        comp = (
                (emoji.charCodeAt(0) - 0xD800) * 0x400 +
                (emoji.charCodeAt(1) - 0xDC00) + 0x10000
                );
        if (comp < 0) {
            comp = emoji.charCodeAt(0);
        }
        console.log('emojiUnicode: ', comp);
        return comp
        return comp.toString("16");
    }
    ;

    const widthOutput = document.querySelector('#subscriber');
    function reportWindowSize() {
        let f = $('#subscriber').width();
        let a = (f * 100) / 177.7;
        $('#subscriber').height(a)
        $('.card.direct-chat.direct-chat-primary').height(a)
        $('.right.pane').height(a)
        $('.left.pane').height(a);
        $('.right.pane .direct-chat-contacts').height(a - 70);

        if ($(window).width() <= 790) {
            $('.video-chat-container').height((a + 25) * 2);
            console.log('resizable disabled', $(window).width());
            $('.left.pane').removeClass('ui-resizable');
        } else {
            $('.video-chat-container').height(a + 50);
            $('.left.pane').addClass('ui-resizable');
        }
    }
    window.onresize = reportWindowSize;
</script>
<?php
$idd = Yii::$app->user->id;
$script = <<< JS
        function fecha(fecha = null){
        let d = new Date();
        if(fecha){
            d = new Date(fecha);
        }else{
             d = new Date();
        }
        
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
        function getMessages(){
        
            $.ajax({
                url: "$angularConfig/getMessages",
                data: {
                    channel:'public_message$arrChannel[0]_$arrChannel[1]'
                },
                type: 'POST',
                dataType: 'json',
            }).done(function (data) {
                console.log('success: ', data);
                let chat = '';
                data.messages.forEach(function(d){
                chat = '';
                if($fromUserId == d.fromUserId){
        
                        chat = '<div class="direct-chat-msg">'+
                            '<div class="direct-chat-infos clearfix">'+
                                '<span class="direct-chat-name float-left"></span>'+
                                
                            '</div>'+
                            

                            '<div class="direct-chat-text">'+
                                ''+(d.mensaje).replaceAll('&#38;','&')+''+
                            '</div>'+
                        '</div>';
        
                    }else{
                    chat = '<div class="direct-chat-msg right">'+
                        '<div class="direct-chat-infos clearfix">'+
                        '</div>'+
                        
                        '<div class="direct-chat-text">'+
                            '<b>'+d.username+'</b> '+(d.mensaje).replaceAll('&#38;','&')+''+
                        '</div>'+
                    '</div>';
                    }
        
                    $('.direct-chat-messages').append(chat);
                });
                let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
                myDiv.scrollTop = myDiv.scrollHeight;
                
            }).fail(function (xhr, textStatus, errorThrown) {
                //alert(xhr.responseText);
            }).always(function () {
                console.log('finished');
            });
        }
        
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
        getMessages();
        function scrollBottom(){
            let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
            myDiv.scrollTop = myDiv.scrollHeight;
        }
        scrollBottom();
    
        
        const socket = io.connect('$angularConfig',{query:"data=$fromUserId,$username"});
        
        console.log('start...');
        
        socket.on("message-from-public-to-server", function(msg) {
            console.log('my message...',msg);
        });
        
        socket.on('public_message$arrChannel[0]_$arrChannel[1]', function (data) {
            console.log('Client sidexx: ',data);
        if(data.error != undefined && data.error == true){
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 9000
            });
            Toast.fire({
              icon: 'error',
            title: data.message
            });
            $('.direct-chat-msg:last-child .direct-chat-text').css('background-color', '#fdc8c8');
            return;
        }
            if(false){
                console.log('my message...');
            }else{
            console.log('data.message: ',data.message);
                let chat = '';
                if($fromUserId == data.fromUserId){
        
                        chat = '<div class="direct-chat-msg">'+
                            '<div class="direct-chat-infos clearfix">'+
                                '<span class="direct-chat-name float-left"></span>'+
                            '</div>'+

                            '<div class="direct-chat-text">'+
                                ''+(data.message).replaceAll('&#38;','&')+''+
                            '</div>'+
                        '</div>';
        
                    }else{
                        chat = '<div class="direct-chat-msg right">'+
                        '<div class="direct-chat-infos clearfix">'+
                            
                        '</div>'+

                        '<div class="direct-chat-text">'+
                            '<b>'+data.username+'</b> '+(data.message).replaceAll('&#38;','&')+''+
                        '</div>'+
                    '</div>';
                    }
        
                    $('.direct-chat-messages').append(chat);
            let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
            if (myDiv.scrollHeight - myDiv.scrollTop <= myDiv.clientHeight + 300)
            {
                myDiv.scrollTop = myDiv.scrollHeight;
            }
        
            }
        });
        
        socket.on('message-from-public-to-server', function (data) {   console.log('message-from-public-to-server',data); });
        function htmlEscape(str){
            return str.replace(/[&<>'"]/g,x=>'&#'+x.charCodeAt(0)+';')
        }
        $('#btn-send').on('click',function(event){
                event.preventDefault();
                //alert();
              sendMessage();
        });
        function sendMessage(){
        
            var text = $('#message').val();
            if(!text){
                console.log('text: ',text);
                return;
            }
            console.log('text2: ',text);
            if($fromUserId === 0){
                window.location.replace('$urlLogin');
                return;
            }
            console.log('Mensaje:',$('.emojionearea-editor').html(' '));
        
            var messagePacket = {
                message: ($('#message').val()),
                fromUserId: $fromUserId,
                toUserId: $toUserId,
                username:'$username',
                channel:'public_message$arrChannel[0]_$arrChannel[1]',
                channel_type:$channel_type//publico
            }
            $('#message').val(' ');
            count++;
            
            console.log('messagePacket: ',messagePacket);
            socket.emit('message-from-public-to-server', messagePacket);
                let chat = '<div class="direct-chat-msg">'+
                '<div class="direct-chat-infos clearfix">'+
                    '<span class="direct-chat-name float-left"></span>'+
                    
                '</div>'+
                '<div class="direct-chat-text">'+
                    ''+(messagePacket.message.replaceAll('&#38;','&'))+''+
                '</div>'+
            '</div>';
                
            $('.direct-chat-messages').append(chat);
            $('#message').val('');
            $('#message').val(text);
            $('.emojionearea-editor').focus();
            let myDiv = document.getElementsByClassName("direct-chat-messages")[0];
            if (myDiv.scrollHeight - myDiv.scrollTop <= myDiv.clientHeight + 300)
            {
                myDiv.scrollTop = myDiv.scrollHeight;
            }
            $('.emojionearea-editor').html('');
        }
        
        $('#form-chat').on('beforeSubmit', function(e) {
        if($('#message').val() == ''){
            return;
        }
        
        }).on('submit', function(e){
            e.preventDefault();
        });
        
        $('.emojionearea-editor').on('keydown',function(event){
            if(event.which == 13){
                event.preventDefault();
                
                $('#btn-send').focus();
                $('#btn-send').click();
                $(this).focus();
                
            }
        });
        $('.emojionearea-editor').on('keyup',function(event){
            if(event.which == 13){
                event.preventDefault();
                
            }
        });
        $(function () {
            $(".left.pane").resizable({
                handles: "e, w"
            });
        });
        $(function(){//382.902px
        $('.video-chat-container').fadeIn();
            let f = $('#subscriber').width();
            let a = (f * 100)/ 177.7;
            $('#subscriber').height(a);
            $('.card.direct-chat.direct-chat-primary').height(a);
            $('.right.pane').height(a);
            $('.left.pane').height(a);
            $('.right.pane .direct-chat-contacts').height(a - 70);
            
            if($(window).width() <= 790){
            $('.video-chat-container').height( (a + 25) * 2);
                //console.log('resizable disabled',$(window).width());
                $('.left.pane').removeClass('ui-resizable');
            }else{
                $('.video-chat-container').height(a + 50);
                $('.left.pane').addClass('ui-resizable');
            }
        });
        
        $('#toggle_fullscreen').on('click', function(){
            if (
              document.fullscreenElement ||
              document.webkitFullscreenElement ||
              document.mozFullScreenElement ||
              document.msFullscreenElement
            ) {
              if (document.exitFullscreen) {
                document.exitFullscreen();
              } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
              } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
              } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
              }
            } else {
              element = $('#subscriber').get(0);
              if (element.requestFullscreen) {
                element.requestFullscreen();
              } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
              } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
              } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
              }
            }
        });
    });
JS;

$this->registerJsFile('https://cdn.jsdelivr.net/npm/fuse.js/dist/fuse.js', ['position' => \yii\web\View::POS_HEAD]);

$this->registerJs($script);
