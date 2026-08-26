<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'content';
        require 'public/includes/counties.php';
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form id='editvideo'>
                                            <input type='hidden' name='url' class='form-control'   value='<?php echo $this->data['v_url'] ?? '' ?>' >
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Title of the video</label>
                                            <input type='text' name='title' class='form-control' required value='<?php echo $this->data['v_title'] ?? '' ?>' >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Video joining price [Zero means it's free]</label>
                                            <input type='number' name='price' class='form-control' required value='<?php echo $this->data['v_price'] ?? '' ?>'  >
                                        </div>
                                    </div>
                                </div>
  
                                
                               
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Video Description</label>
                                            <textarea type='text' id='ckeditor' class='form-control' ><?php echo $this->data['v_desc'] ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-success' value='Proceed Now'>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='feedback mt-2'></div>
                            </form>
                        </div>
                     
                        
                          <div id="local-stream" style="width: 640px; height: 480px; background-color: #000;"></div>
    <div id="remote-stream" style="width: 640px; height: 480px; background-color: #000;"></div>
    
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script>
            navigator.mediaDevices.getUserMedia({ video: true, audio: true })
              .then(function(stream) {
                const videoElement = document.querySelector('video');
                videoElement.srcObject = stream;
              })
              .catch(function(err) {
                console.log("Error: ", err);
              });
              
              const signalingServer = new WebSocket('wss://miziziclassifieds.com:465');
                
                signalingServer.onmessage = function(message) {
                  // Handle incoming signaling messages
                };
                
                signalingServer.onopen = function() {
                  console.log('Connected to signaling server');
                };
                
                // const peerConnection = new RTCPeerConnection();

                // // Add the media stream to the peer connection
                // stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
                
                // // Handle ICE candidates
                // peerConnection.onicecandidate = function(event) {
                //   if (event.candidate) {
                //     // Send ICE candidate to the signaling server
                //     signalingServer.send(JSON.stringify({ ice: event.candidate }));
                //   }
                // };



        </script>
        <!--<script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>-->
         <script>
                // const client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' });
        
                // const appId = '728cc7afddc640e29529be4811c71f81';
                // const channelName = 'testChannel';
        
                // async function startCall() {
                //     await client.join(appId, channelName, null, null);
        
                //     const localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();
        
                //     localTracks[1].play('local-stream');
                //     await client.publish(localTracks);
        
                //     client.on('user-published', async (user, mediaType) => {
                //         await client.subscribe(user, mediaType);
        
                //         if (mediaType === 'video') {
                //             const remoteContainer = document.getElementById('remote-stream');
                //             user.videoTrack.play(remoteContainer);
                //         }
                //     });
                // }
        
                // startCall();
            </script>
        <script  > 
     
        //<![CDATA[
        CKEDITOR.replace( 'ckeditor');
        //]]>
    </script>
    </main> 
 
</body>

</html>