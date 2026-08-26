<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <style>
        .main-header .main-navbar {
            background: hsl(var(--black));
            padding: 0;
        }
    </style>
</head>

<body>
    <?php require 'public/includes/navbar.inc.php' ?>

    <section class="properties-two-section py-60">
        <div class="container mt-5 mb-5">
            <h2>Your Conversations</h2>
            <ul class="list-group mt-3">
                <?php if (!empty($this->heads)) {
                    $data = []; ?>
                    <?php foreach ($this->heads as $chat) {
                        if (in_array($chat['chathref'], $data)) {
                            continue;
                        }
                        $data[] = $chat['chathref'];  ?>
                        <li class="list-group-item d-flex justify-content-start align-items-center">
                            <a href="<?= $chat['chathref']; ?>" class="list-group-itemx d-flex justify-content-start align-items-center">
                                Chat with <?= htmlspecialchars($chat['user_fname']); ?> - [<span class='text-danger' xhref='#/market/<?php echo $chat['p_url'] ?>'>
                                    <?= CustomFunctions::trimTitle(htmlspecialchars($chat['p_title'])); ?></span>]
                            </a>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <li class="list-group-item text-center">No previous conversations found.</li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <?php require 'public/includes/footer.inc.php' ?>
</body>

</html>