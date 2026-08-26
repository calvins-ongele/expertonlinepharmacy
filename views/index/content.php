<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet" />
    <link href="/public/css/content.css?v=<?php echo rand() ?>" rel="stylesheet" />
     <style>
        /* Style for the blinking effect */
        .blinking {
            color: red!important; /* Initial color */
            animation: blink-animation 1s steps(5, start) infinite; /* Animation */
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Bold text */
        }

        /* Keyframes for blinking animation */
        @keyframes blink-animation {
            to {
                visibility: hidden; /* Hide element during animation */
            }
        }
    </style>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
    <!-- ==================== Header End Here ==================== -->
    <main>
        
     <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="breadcrumb py-120 bg-img" data-background-image="<?= $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb__wrapper">
                            <h2 class="breadcrumb__title">Video Content</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Content </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->

     <section class='section1'>
        <div></div>
        
        <div class='divv'> 
              <div class="footer-item mb-3">  
                    <form action="#">
                        <input type="text" placeholder="Search videos " class="footer-form__input searchinputv">
                        <button class="footer-form__btn searchbtnv"><i class="fa fa-search"></i></button>
                    </form>
              </div>
            
                 
             <?php  
             
             if (count($this->data) == 0) {
                 echo "<div class='alert alert-sm alert-danger'> No content was found. Pleas come back later or add one <u><a href='/login'>here</a></u> </div>";
             }
              
             
             foreach ($this->data as $row ) { $unique_id = $row['b_url']; //uniqid('video_');  ?>
                <div class="container shadow mb-3" style='border-radius:4px'>
                    <!-- Post content section -->
                    <div class="post-card">
                        <div class='post-carddiv'>
                            <div class="post-avatar"></div>
                            <div class='utime'>
                                <h5><?php echo "{$row['user_fname']} {$row['user_lname']}" ?></h5>
                                <span><?php echo CustomFunctions::timeago($row['v_date']) ?></span>
                            </div>
                        </div>
                        <div class="post-content"> 
                            <p> <?php echo CustomFunctions::trimTitle($row['v_desc'], 40)  ?> 
                            
                            <?php echo ($row['v_type'] == 'Live') ? "<a href='/content/$unique_id' class='blinking'>LIVE</a>" : '' ?>
                            </p> 
                        </div>
                    </div>
                    <!-- Video player -->
                    <div class="video-container">
                        <video rel="<?php echo $row['v_type'] ?>" id="<?php echo $unique_id ?>" class="video-js" controls preload="auto"style='width:99%' height="300" 
                        data-setup="{}" playsinline webkit-playsinline mutecd preload="auto" 
                        <?php echo ($row['v_type'] == 'Live')? 'poster="/public/assets/uploads/thumbnail-download.jpeg"' :'' ?>
                        >
                            <source src="https://cdn.miziziclassifieds.com/videos/classiefieds/<?php echo $row['v_file'] ?>" type="video/mp4" />
                            <!-- Replace with your own video URL -->
                            Your browser does not support the video tag.
                        </video>
                        
                        
                    </div>
            
                    <!-- Interaction Section (Like, Comment, Share) -->
                    <div class="interaction-section">
                        <div class="reaction-summary">
                            <img src="/public/assets/system/thumps-up.svg" alt="Like Icon" />
                            <span class='l<?php echo $row['v_url']   ?>'><?php echo $row['v_likes'] ?> likes</span>
                        </div>
                        <div></div>
                    </div>
                    
                    <div class="actions">
                        <button class='likeit'  rel='<?php echo $row['v_url']   ?>' >
                            <img src="/public/assets/system/thumps-up.svg" alt="Like Icon" />
                            Like
                        </button>
                        <!--<button>-->
                        <!--    <img src="/public/assets/system/comment.svg" alt="Comment Icon" />-->
                        <!--    Comment-->
                        <!--</button>-->
                        <button class='shareit'  rel='<?php echo $row['v_url']   ?>'  >
                            <img src="/public/assets/system/share.svg" alt="Share Icon" />
                            Share
                        </button>
                    </div>
            
             
            </div>
            <?php } ?>
        </div>
        
        <div></div>
    </section>
        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
    <script src="https://vjs.zencdn.net/7.18.1/video.js"></script>
    <script>
     document.addEventListener('DOMContentLoaded', () => {
        const videoElements = document.querySelectorAll('.video-js');
    
        if (videoElements.length === 0) {
            console.error("No video elements found");
            return;
        }
    
        const isiOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    
        videoElements.forEach((videoElement) => {
            const player = videojs(videoElement.id);
            const videoId = videoElement.getAttribute('id');
    
            player.on('play', () => {
                console.log(`Video with ID ${videoElement.id} started playing`);
                const relValue = videoElement.getAttribute('rel');
                if (relValue == 'Live') {
                    window.location.href = `/content/${videoId}?t=${player.currentTime()}`;
                    return;
                }
    
                if (isiOS) {
                    // Special handling for iOS
                    let timer = setTimeout(() => {
                        if (player.currentTime() >= 10) {
                            player.pause();
                            console.log(`Redirecting video ${videoId} at 10 seconds for iOS`);
                            let form = new FormData();
                            form.append('time', 10);
                            form.append('url', videoId);
                            _data(form, 'video-time');
                            window.location.href = `/content/${videoId}?t=${player.currentTime()}`;
                        }
                    }, 10000); // 10 seconds in milliseconds
    
                    player.on('pause', () => {
                        clearTimeout(timer);
                    });
    
                } else {
                    // Normal handling for other devices
                    player.on('timeupdate', () => {
                        if (player.currentTime() >= 10) {
                            player.pause();
                            console.log(`Redirecting video ${videoId} at 10 seconds`);
                            let form = new FormData();
                            form.append('time', 10);
                            form.append('url', videoId);
                            _data(form, 'video-time');
                            window.location.href = `/content/${videoId}?t=${player.currentTime()}`;
                        }
                    });
                }
            });
        });
    });



        $(function() {
             
            
            $('.likeit').click(function() {
                var uri = $(this).attr('rel');
                var form = new FormData();
                form.append('vid', uri);
                const data = _data(form, 'likevideo');
                $('.l' + uri).text(data['msg'] + ' likes');
                
            });
            
            
             function shareLink(uri) {
                let shareData = {
                    title: 'I just viewed an awesome video!',
                    text: 'The video was fun and worth sharing!',
                    url: 'https://www.miziziclassifieds.com/content/'+uri //window.location.href
                };
            
                navigator.share(shareData).catch(console.error);
            }
             $('.shareit').click(function() {
                var uri = $(this).attr('rel'); 
                shareLink(uri);
            });
            
            $('.searchbtnv').click(function(e) {
                e.preventDefault(); 
                location.href='/content?q=' + $('.searchinputv').val();
            })
        });
    </script>


</body>

</html>