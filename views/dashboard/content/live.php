
<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
    <style>
        .chat-container {
            margin-top: 20px;
            width: 100%;
            max-width: 400px;
        }
        #message-container {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'content'; 
        require ADMIN . 'includes/sidebar.inc.php' ?>
       
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                <div class='container alert'>
                    <h2><?php echo $this->videodata['v_title'] ?></h2>
                    
                    <!-- Local video stream container with explicit dimensions -->
                    <div id="local-stream" style="min-width:300px; height: 380px; background-color: #000;"></div>
                    
                    <!-- Remote view showing viewer avatars and viewer count -->
                    <div class="viewer-container">
                        <h3>Viewers: <span id="viewer-count">0</span></h3>
                        <div id="viewer-list" style="display: flex; flex-wrap: wrap;">
                            <!-- Viewer avatars will be inserted here dynamically -->
                        </div>
                    </div>

                    <!-- End Livestream button -->
                    <button id="copy" class="btn btn-success">Copy live link</button>
                    <button id="end-livestream-btn" class="btn btn-danger">End Livestream</button>
                    <?php if (!empty($this->attachment) ) { ?> 
                    <hr>
                        <?php // if ( $this->attachment['type'] == 'service' ) { ?>
                        <h5>Theme: Promotion of <?php echo $this->attachment['type'] ?> <a href='<?php echo $this->attachment['full_url'] ?>' target='_blank' class='text-danger'><?php echo $this->attachment['title'] ?></a> </h5>
                        
                    <?php } ?>
                    <hr>
                    <div class="chat-container">
                        <div id="message-container" style="height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;"></div>
                        <input type="text" id="message-input" placeholder="Type your message" />
                        <button id="send-message">Send</button>
                    </div>
                    <hr>
                    <p><?php echo $this->videodata['v_desc'] ?></p>
                </div>
            </div>
        </div> 
        
        <?php require ADMIN .'includes/footer.inc.php' ?>
        <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
        <script>
            $(function() {
                $("#send-message").click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('message',$('#message-input').val() );
                    form.append('sender', '<?php echo Session::get('userid') ?>');
                    form.append('receiver','');
                    form.append('product','');
                    form.append('seller','<?php echo $this->videodata['v_url'] ?>');
                    form.append('href', `https://www.miziziclassifieds.com/content/<?php echo $this->videodata['v_url'] ?>`);
                    form.append('live', true);
                    var data = _data(form, "send-messages");
                    if(data['error'] == 'false')  $('#message-input').val('');
                    updatevideo();
                })
            
            $("#copy").click(function(e) {
            const data1 = "https://miziziclassifieds.com/content/<?php echo $this->videodata['v_url'] ?>";
            navigator.clipboard.writeText(data1)
                      .then(() => {
                        // Optional: Display a success message
                        //$('.mod').toggleClass('hidden');
                        alert("Link copied to clipboard! You can share it however.");
                      })
                      .catch(err => {
                        console.error("Failed to copy text: ", err);
                      });
            });
            
            
                const client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' });
                const appId = '728cc7afddc640e29529be4811c71f81'; // Use your Agora app ID
                const channelName = '<?php echo $this->videodata['v_url'] ?>'; // Ensure this follows Agora's restrictions.
                let viewerCount = 0;
                let localTracks = [];
    
              async function startCall() {
                try {
                    console.log("Joining the channel...");
                    await client.join(appId, channelName, null, null);
                    console.log("Joined the channel successfully.");
            
                    // Check if the device is an iPhone (iOS)
                    const isiOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
            
                    // Create local audio and video tracks with user interaction on iOS
                    console.log("Creating local audio and video tracks...");
                    if (isiOS) {
                        // Display prompt for iOS users to enable microphone
                        alert("Please ensure microphone access is enabled in your browser settings to use audio on iOS devices.");
                    }
            
                    localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();
            
                    const [audioTrack, videoTrack] = localTracks;
                    console.log("Local tracks created:", localTracks);
            
                    // Play local video in the div immediately
                    videoTrack.play('local-stream');
                    console.log("Local video is playing.");
            
                    // Publish the local audio and video tracks
                    await client.publish([audioTrack, videoTrack]);
                    console.log("Local audio and video tracks published.");
                    
                    // Additional code for updating viewer count and managing events
                    var form = new FormData();
                    form.append('url', '<?php echo $this->videodata['v_url'] ?>');
                    form.append('joined', viewerCount );
                    _data(form, 'activatelive');
                    
                } catch (error) {
                    console.error("Error during startCall:", error);
                }
            
                client.on('user-joined', (user) => {
                    console.log("User joined:", user.uid);
                    addViewer(user.uid);
                });
            
                client.on('user-left', (user) => {
                    console.log("User left:", user.uid);
                    removeViewer(user.uid);
                });
            
                window.addEventListener('beforeunload', async () => {
                    await endLivestream();
                });
            
                document.getElementById('end-livestream-btn').addEventListener('click', async () => {
                    await endLivestream();
                });
            }

                // Function to add a viewer
                function addViewer(uid) {
                    viewerCount++;
                    document.getElementById('viewer-count').textContent = viewerCount;
                    
                    // Add a viewer avatar (use a default placeholder or dynamic user image)
                    const viewerList = document.getElementById('viewer-list');
                    const avatar = document.createElement('img');
                    avatar.src = '/public/assets/uploads/Screenshot_16.png'; // Placeholder image for viewer
                    avatar.alt = 'Viewer ' + uid;
                    avatar.style.margin = '5px';
                    avatar.setAttribute('id', 'viewer-' + uid);
                    viewerList.appendChild(avatar);
                }
    
                // Function to remove a viewer
                function removeViewer(uid) {
                    viewerCount--;
                    document.getElementById('viewer-count').textContent = viewerCount;
                    
                    // Remove the viewer avatar
                    const viewerAvatar = document.getElementById('viewer-' + uid);
                    if (viewerAvatar) {
                        viewerAvatar.remove();
                    }
                }
    
                // Function to end the livestream
                async function endLivestream() {
                    try {
                        // Unpublish local tracks
                        console.log("Unpublishing local tracks...");
                        await client.unpublish(localTracks);
    
                        // Stop and close both the audio and video tracks
                        console.log("Stopping and closing local tracks...");
                        localTracks.forEach(track => {
                            if (track) {
                                track.stop();  // Stops the track from continuing to play
                                track.close(); // Closes the track and releases resources
                            }
                        });
    
                        // Leave the Agora channel
                        console.log("Leaving the Agora channel...");
                        await client.leave();
                        console.log('Livestream ended, left the channel.');
                        var form = new FormData();
                        form.append('url', '<?php echo $this->videodata['v_url'] ?>');
                        _data(form, 'end-live');
                        window.location.href='/dashboard/content';
    
                        // Optionally, redirect the user or show a confirmation message
                        //alert('Livestream has ended.');
                    } catch (error) {
                        console.error("Error during endLivestream:", error);
                    }
                }
    
                startCall();
                
                setInterval(()=> {
                    updatevideo();
                }, 2000);
                
                updatevideo();
                
                function updatevideo() {
                  var form = new FormData();
                    form.append('url', '<?php echo $this->videodata['v_url'] ?>');
                    form.append('joined', viewerCount );
                    var msgdata = _data(form, 'activatelive');
                    $('#message-container').html("<div></div>");
                    for(var i = 0; i < msgdata['msg'].length; i++ ) {
                        displayMessage(msgdata['msg'][i]['senderId'], msgdata['msg'][i]['message']);
                    }
                }
                
                
                    function displayMessage(senderId, message) {
                        const messageContainer = document.getElementById('message-container');
                        const messageElement = document.createElement('div');
                        messageElement.innerHTML  = `${senderId}: ${message}`;
                        //messageElement.html(`${senderId}: ${message}`)
                        messageContainer.appendChild(messageElement);
                        messageContainer.scrollTop = messageContainer.scrollHeight; // Auto-scroll to the latest message
                    }
               
                
            })
        </script>
    </main> 
</body>

</html>
