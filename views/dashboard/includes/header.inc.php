
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
 
<title><?php echo $this->title ?> </title>
<meta property="twitter:title" content="Introduction" />
<meta name="csrf_token" content="<?= CSRF::get() ?>" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="/assets/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="/assets/css/docs.css">
<link rel="stylesheet" href="/assets/css/highlighter.css">
<link rel="stylesheet" href="/assets/css/adminlte.min.css">
<link rel="shortcut icon" type="image/png" href="/public/assets/system/favicon.png"/>
 <style>
        :root {
            --blend: #fcb129;
            --second-blend: #0c9c88
        }

        .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 0.5rem 1.25rem rgba(0, 0, 0, 0.08) !important;
        }

        .tracking-wide {
        letter-spacing: 0.05em;
        font-size: 0.75rem;
        }
        .page-item a {
            color:initial;
            text-decoration: none;
        }
        .page-item.active a{
            color:white;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        ::placeholder {
            font-size: 12px;
            font-style: italic;
        }
    </style>
    