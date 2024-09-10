<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
         /* Ensure the preloader covers the entire screen */
         body{
            background-color: #bbbba9;
        }
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000; /* High z-index to appear above everything */
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden; /* Hide the spinner initially */
        }

        .spinner-grow {
    width: 3rem;
    height: 3rem;
    background-color: #3498db; /* Customize the color as needed */
    border-radius: 50%;
    animation: grow 0.75s ease-in-out infinite;
}

@keyframes grow {
    0%, 100% {
        transform: scale(0.8);
        opacity: 0.7;
    }
    50% {
        transform: scale(1);
        opacity: 1;
    }
}
    </style>
</head>
<body>
     <!-- Preloader Spinner -->
     <div id="preloader">
    <div class="spinner-grow"></div>
</div>



</body>
</html>