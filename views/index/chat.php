<!DOCTYPE html>
<html lang="en">

<head>

    <?php require 'public/includes/header.inc.php' ?>
    <style>
        #chat-box {
            background-color: #f8f9fa;
        }

        .text-start {
            background-color: #e9ecef;
            border-radius: 10px;
            padding: 10px;
            max-width: 70%;
        }

        .text-end {
            background-color: #353639;
            color: white;
            border-radius: 10px;
            padding: 10px;
            max-width: 70%;
            margin-left: auto;
        }

        .hidden {
            display: none !important;
        }

        .mod {
            max-width: 300px;
            border: 1px solid var(--blend);
        }

        .text-end a {
            color: white;
        }
        .main-header .main-navbar {
            background: hsl(var(--black));
            padding: 0;
        }
    </style>
</head>

<body>
    <?php require 'public/includes/navbar.inc.php' ?>

    <main>
        <section class="properties-two-section py-120">
            <div class="container mt-5">
                <h4>Chat with User <?php echo $this->receiver['user_fname']; ?> <?php if ($this->data['p_user_fk'] == Session::get('userid')) { ?>
                        <button type="button" class="btn openmod" style="background: hsl(var(--base));"> Modify Price</button> <?php } ?> | [<a style='font-size:14px' class='text-danger' href='#/market/<?php echo $this->data['p_url'] ?>'>
                        <?php echo CustomFunctions::trimTitle(htmlspecialchars($this->data['p_title'])); ?></a>]
                </h4>
                <div class='mod hidden alert'>
                    <form id='newprice' class=''>
                        <div class='form-group'>
                            <label>New Price</label>
                            <input type='number' class='form-control' id='nprice' value='<?php echo $this->data['p_price'] ?>'>
                        </div>

                        <div class='form-group'>
                            <input type='submit' class='form-control btn ' style="background: hsl(var(--green));" value='Submit'>
                        </div>

                    </form>

                    <!--<div class='form-group newproductrink hidden '>-->
                    <!--    <label>New product link</label><br>-->
                    <!--    <input type='number' class='newuri' value='' ><button id='copy' class='btn btn-secondary'>Copy to clip board</button><br>-->
                    <!--    <small class='text-danger'>Click to copy link and paste to chat</small>-->
                    <!--</div>-->
                </div>

                <div id="chat-box" class="border p-3 mb-3" style="height: 300px; overflow-y: scroll;">
                    <!-- Messages will appear here -->
                </div>

                <form id="chatform">
                    <div class="input-group">
                        <input list="suggested" type="text" id="message" class="form-control" placeholder="Type a message" required>
                        <button type="button" class="btn btn-secondary" id="locationButton"><i class="fa fa-map-marker"></i></button>
                        <button class="btn " style="background: hsl(var(--base));" type="submit">Send</button>
                    </div>

                    <datalist id="suggested">
                        <option value="What is the delivery fee to my location?">
                        <option value="Can I get a negotiated price?">
                        <option value="I need a specific variation.">
                    </datalist>

                </form>
            </div>
            <br>




            </div>
        </section>
        <?php require 'public/includes/footer.inc.php' ?>
        <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script-->
        <script>
            $(function() { //$("#exampleModal").modal('show')

                document.getElementById('locationButton').addEventListener('click', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;


                            // You can use the latitude and longitude to:
                            // 1. Display the location on a map
                            // 2. Send the location data to a server
                            // 3. Use it for other purposes

                            // For example, to display the location on a map:
                            const mapUrl = `https://maps.google.com/?q=${latitude},${longitude}`;
                            //window.open(mapUrl, '_blank');

                            // Or, to send the location data to the server:
                            const messageInput = document.getElementById('message');
                            messageInput.value += `https://maps.google.com/?q=${latitude},${longitude}`;
                        });
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                });

                const currentUser = '<?php echo Session::get('userid'); ?>';
                const receiverId = '<?php echo $this->receiver['user_ID']; ?>';
                const seller = '<?php echo $this->seller_url ?>';
                const product = '<?php echo $this->product_url ?>';

                $('.openmod').click(function(e) {
                    e.preventDefault();
                    $('.mod').toggleClass('hidden'); //attr('style', "display:block!important");
                });

                $('#newprice').submit(function(e) {
                    e.preventDefault();
                    const price = $('#nprice').val();

                    $.ajax({
                        url: '/myapp/add-discount',
                        method: 'POST',
                        data: {
                            sender: currentUser,
                            receiver: receiverId,
                            price: price,
                            product: product,
                            seller: seller,
                            href: window.location.href
                        },
                        success: function(data) {
                            //$('.newuri').val(data);
                            $('#message').val(`${data}`);
                            $('.mod').toggleClass('hidden');

                        }
                    });
                });
                // $("#copy").click(function() {
                //     const textToCopy = $(".newuri").val();

                //     navigator.clipboard.writeText(textToCopy)
                //       .then(() => {
                //         // Optional: Display a success message
                //         $('.mod').toggleClass('hidden');
                //         alert("Text copied to clipboard!");
                //       })
                //       .catch(err => {
                //         console.error("Failed to copy text: ", err);
                //       });
                //   });

                // Fetch messages periodically
                function fetchMessages() { 
                    $.ajax({
                        url: '/myapp/fetch-messages',
                        method: 'POST',
                        data: {
                            sender: currentUser,
                            receiver: receiverId,
                            product: product,
                            seller: seller,
                            href: window.location.href
                        },
                        success: function(data) {
                            $('#chat-box').html(data);
                            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                            $('.text-start a').attr('style', 'color:black;text-decoration:underline;');
                        }
                    });
                }

                // Polling every 2 seconds
                setInterval(fetchMessages, 2000);

                // Handle message submission
                $('#chatform').submit(function(e) {
                    e.preventDefault();
                    const message = $('#message').val();

                    $.ajax({
                        url: '/myapp/send-messages',
                        method: 'POST',
                        data: {
                            sender: currentUser,
                            receiver: receiverId,
                            message: message,
                            product: product,
                            seller: seller,
                            href: window.location.href
                        },
                        success: function() {
                            $('#message').val('');
                            fetchMessages();
                        }
                    });
                });

                // Initial fetch
                fetchMessages();
            })
        </script>
    </main>
</body>

</html>